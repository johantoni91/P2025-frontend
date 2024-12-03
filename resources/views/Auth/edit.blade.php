@extends("Layouts.body")
@section("content")
	@include("Additional.breadcumbs", ["current" => 'Ubah'])
	<div class="bg-gray-50 dark:bg-gray-800 p-5 rounded-lg mt-5">
		<form method="POST"
				action="{{ route("layout.store") }}"
				enctype="multipart/form-data">
				@csrf
				<div class="mb-6 grid gap-6 md:grid-cols-2">
					<div class="flex flex-col justify-between">
						<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
							for="img_login_bg">Gambar Halaman Login</label>
						<img class="mx-auto mb-2 rounded"
							id="img_login_bg_display"
							src='{{ $data["img_login_bg"] ?? asset("assets/images/logo.png") }}'
							alt=""
							width="200"
							height="200">
						<div class="flex flex-col justify-end">
							<input
								class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
								id="img_login_bg"
								name="img_login_bg"
								type="file"
								aria-describedby="img_login_bg_help"
								onchange="loadbg(event)">
							<div class="flex items-center justify-between">
								<p class="mt-1 text-xs text-gray-500 dark:text-gray-300"
									id="img_login_bg_help">JPG, JPEG, PNG</p>
								<p class="mt-1 text-xs font-bold text-green-500 dark:text-green-300"
									id="img_login_bg_help">(Ukuran maks: 2MB)</p>
							</div>
						</div>
						<script>
							var loadbg = function(event) {
								var photo = document.getElementById('img_login_bg_display');
								photo.src = URL.createObjectURL(event.target.files[0]);
								photo.onload = function() {
									URL.revokeObjectURL(photo.src)
								}
							};
						</script>
					</div>
					<div class="flex flex-col justify-between">
						<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
							for="icon">Gambar Ikon Aplikasi</label>
						<img class="mx-auto mb-2 rounded"
							id="icon_app"
							src='{{ $data["icon"] ?? asset("assets/images/logo.png") }}'
							alt=""
							width="200"
							height="200">
						<div class="flex flex-col justify-end">
							<input
								class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
								id="icon"
								name="icon"
								type="file"
								aria-describedby="icon_help"
								onchange="loadicon(event)">
							<div class="flex items-center justify-between">
								<p class="mt-1 text-xs text-gray-500 dark:text-gray-300"
									id="icon_help">(disarankan .ico)</p>
								<p class="mt-1 text-xs font-bold text-green-500 dark:text-green-300"
									id="icon_help">(Ukuran maks: 2MB)</p>
							</div>
						</div>
						<script>
							var loadicon = function(event) {
								var photo = document.getElementById('icon_app');
								photo.src = URL.createObjectURL(event.target.files[0]);
								photo.onload = function() {
									URL.revokeObjectURL(photo.src)
								}
							};
						</script>
					</div>
				</div>
				<div class="mb-6 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
					<div>
						<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
							for="app_name">Nama Lengkap Aplikasi</label>
						<input
							class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
							id="app_name"
							name="app_name"
							type="text"
							value="{{ old("app_name") ?? $data["app_name"] }}"
							placeholder="Masyarakat Berdedikasi Memperhatikan Angkatan Kerja Rentan" />
					</div>
					<div>
						<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
							for="short_app_name">Nama Pendek Aplikasi</label>
						<input
							class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
							id="short_app_name"
							name="short_app_name"
							type="text"
							value="{{ old("short_app_name") ?? $data["short_app_name"] }}"
							placeholder="Mas Dedi Memang Jantan" />
					</div>
					<div>
						<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
							for="fullscreen">Fullscreen (Login)</label>
						<select
							class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
							id="fullscreen"
							name="fullscreen">
							<option selected
								disabled>Opsi fullscreen</option>
							<option value="1"
								{{ $data["fullscreen"] == "1" ? "selected" : "" }}>Tampilan penuh</option>
							<option value="0"
								{{ $data["fullscreen"] == "0" ? "selected" : "" }}>Potong sebagian</option>
						</select>
					</div>
					<div>
						<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
							for="header">Header (Login)</label>
						<select
							class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
							id="header"
							name="header">
							<option selected
								disabled>Opsi Header</option>
							<option value="1"
								{{ $data["header"] == "1" ? "selected" : "" }}>Tampil (Rekomendasi)</option>
							<option value="0"
								{{ $data["header"] == "0" ? "selected" : "" }}>Hilang</option>
						</select>
					</div>
					<div>
						<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
							for="footer">Footer (Login)</label>
						<select
							class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
							id="footer"
							name="footer">
							<option selected
								disabled>Opsi Footer</option>
							<option value="1"
								{{ $data["footer"] == "1" ? "selected" : "" }}>Tampil</option>
							<option value="0"
								{{ $data["footer"] == "0" ? "selected" : "" }}>Hilang</option>
						</select>
					</div>
					<div>
						<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
							for="login_position">Posisi (Login)</label>
						<select
							class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
							id="login_position"
							name="login_position">
							<option selected
								disabled>Opsi Posisi Login</option>
							<option value="left"
								{{ $data["login_position"] == "left" ? "selected" : "" }}>Kiri (Default)</option>
							<option value="center"
								{{ $data["login_position"] == "center" ? "selected" : "" }}>Tengah</option>
							<option value="right"
								{{ $data["login_position"] == "right" ? "selected" : "" }}>Kanan</option>
						</select>
					</div>
				</div>
				<div class="flex justify-end items-center">
					<button
						class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
						type="submit">Simpan</button>
				</div>
			</form>
	</div>
@endsection
