<?php

namespace App\Http\Controllers;

use app\API\Endpoint;
use App\Exports\UserExport;
use App\Helpers\Shortcut;
use App\Http\Requests\UserRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    private $url = 'users';
    private $home = 'users.index';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $res = Endpoint::get($this->url, session('user')[0]['remember_token']);
            $role = Endpoint::get('role', session('user')[0]['remember_token'])['data']['role'];
            return view('User.index', [
                'data' => $res['data'],
                'view' => 'User.index',
                'url'  => $this->url,
                'home' => $this->home,
                'roles' => $role,
                'dashboard' => Shortcut::access()
            ]);
        } catch (\Throwable $th) {
            Session::flush();
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Endpoint::get('role', session('user')[0]['remember_token'])['data']['role'];
        return view('User.add', [
            'home' => $this->home,
            'roles' => $role,
            'dashboard' => Shortcut::access()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $req)
    {
        if ($req->password != $req->confirm_password) {
            Alert::warning('Konfirmasi password tidak sesuai!');
            return back();
        }

        try {
            $param = [
                'name'      => $req->name,
                'email'     => $req->email,
                'face'      => $req->face,
                'role'      => $req->role,
                'password'  => $req->password
            ];

            if ($req->hasFile('photo')) {
                $attach = [
                    'name'      => 'photo',
                    'content'   => file_get_contents($req->file('photo')),
                    'filename'  => rand() . '_' . $req->name . '.' . $req->file('photo')->getClientOriginalExtension()
                ];
                $param['photo'] = $req->file('photo');
                $res = Endpoint::postAttach('register', null, $param, $attach);
            } else {
                $res = Endpoint::post('register', null, $param);
            }

            if ($res['status'] == false) {
                Alert::error('Gagal', $res['error'] ?? $res['message']);
                return back();
            }
            Alert::success('Berhasil', 'User Telah ditambahkan');
            return redirect()->route($this->home);
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $res = Endpoint::get($this->url . '/find' . '/' . $id, session('user')[0]['remember_token']);
        $role = Endpoint::get('role', session('user')[0]['remember_token'])['data']['role'];
        return view('User.update', [
            'data'  => $res['data'],
            'roles' => $role,
            'view'  => 'User.update',
            'url'   => $this->url,
            'home' => $this->home,
            'dashboard' => Shortcut::access()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, $id)
    {
        $data = [
            "name" => $req->name,
            "role" => $req->role,
            "email" => $req->email
        ];
        Validator::validate($data, [
            'name'      => 'required',
            'email'     => 'required|email:rfc',
            'role'      => 'required',
        ], [
            'name.required'     => 'Nama tidak boleh kosong!',
            'email.required'    => 'Email tidak boleh kosong!',
            'email.email:rfc'   => 'Email tidak valid',
            'role.required'     => 'Role tidak boleh kosong!',
        ]);

        if ($req->password != $req->confirm_password) {
            Alert::warning('Konfirmasi password tidak sesuai!');
            return back();
        }

        try {
            $param = [
                'name'      => $req->name,
                'email'     => $req->email,
                'face'      => $req->face,
                'role'      => $req->role,
                'password'  => $req->password
            ];

            if ($req->hasFile('photo')) {
                $attach = [
                    'name'      => 'photo',
                    'content'   => file_get_contents($req->file('photo')),
                    'filename'  => rand() . '_' . $req->name . '.' . $req->file('photo')->getClientOriginalExtension()
                ];
                $param['photo'] = $req->file('photo');
                $res = Endpoint::postAttach($this->url . '/update' . '/' . $id, session('user')[0]['remember_token'], $param, $attach);
            } else {
                $res = Endpoint::post($this->url . '/update' . '/' . $id, session('user')[0]['remember_token'], $param);
            }
            if ($res['status'] == false) {
                Alert::error('Gagal', $res['error'] ?? $res['message']);
                return back();
            }

            if ($id == session('user')[0]['id']) {
                Alert::success('Berhasil', 'Profil anda berhasil diubah');
                return redirect()->route($this->home);
            }

            Alert::success('Berhasil', 'User ' . $req->name . ' Telah diubah');
            return redirect()->route($this->home);
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $res = Endpoint::get($this->url . '/destroy' . '/' . $id, session('user')[0]['remember_token']);
            if ($res['status'] == false) {
                Endpoint::resToView(false, 'User gagal dihapus', 400, $res['error'] ?? $res['message']);
            }
            Endpoint::resToView(true, 'User berhasil dihapus');
        } catch (\Throwable $th) {
            Endpoint::resToView(false, 'User gagal dihapus', 400, $th->getMessage());
        }
    }



    public function getToken($id)
    {
        $res = Endpoint::get($this->url . '/token' . '/' . $id, session('user')[0]['remember_token']);
        if ($res['status'] == false) {
            Alert::error($res['error'] ?? $res['message']);
            return back();
        }
        Alert::success('Token Untuk Login', $res['data']);
        return back();
    }






    public function profile()
    {
        return view('User.profile', [
            'data'  => session('user')[0],
            'view'  => 'User.profile',
            'url'   => $this->url,
            'home' => $this->home,
            'dashboard' => Shortcut::access()
        ]);
    }

    public function updateProfile(Request $req, $id)
    {
        $data = [
            "name" => $req->name,
            "email" => $req->email
        ];
        Validator::validate($data, [
            'name'      => 'required',
            'email'     => 'required|email:rfc',
        ], [
            'name.required'     => 'Nama tidak boleh kosong!',
            'email.required'    => 'Email tidak boleh kosong!',
            'email.email:rfc'   => 'Email tidak valid',
        ]);

        if ($req->password != $req->confirm_password) {
            Alert::warning('Konfirmasi password tidak sesuai!');
            return back();
        }

        try {
            $param = [
                'name'      => $req->name,
                'email'     => $req->email,
                'face'      => $req->face,
                'role'      => session('user')[0]['role'],
                'password'  => $req->password
            ];

            if ($req->hasFile('photo')) {
                $attach = [
                    'name'      => 'photo',
                    'content'   => file_get_contents($req->file('photo')),
                    'filename'  => rand() . '_' . $req->name . '.' . $req->file('photo')->getClientOriginalExtension()
                ];
                $param['photo'] = $req->file('photo');
                $res = Endpoint::postAttach($this->url . '/update' . '/' . $id, session('user')[0]['remember_token'], $param, $attach);
            } else {
                $res = Endpoint::post($this->url . '/update' . '/' . $id, session('user')[0]['remember_token'], $param);
            }
            if ($res['status'] == false) {
                Alert::error('Gagal', $res['error'] ?? $res['message']);
                return back();
            }

            Alert::success('Profil anda berhasil diubah',  'Login kembali untuk memperbarui tampilan');
            return redirect()->route($this->home);
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return back();
        }
    }

    public function pdf()
    {
        $res = Endpoint::get($this->url . '/all', session('user')[0]['remember_token']);
        $pdf = Pdf::loadView('User.pdf', ['data' => $res['data']]);
        return $pdf->download('Rekap_Users_P2025.pdf');
    }

    public function excel()
    {
        return Excel::download(new UserExport, 'Rekap_User_P2025.xlsx');
    }
}
