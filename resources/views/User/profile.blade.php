@extends("Layouts.body")
@section("content")
	<div class="mb-5 flex items-center justify-between px-3">
		@include("Additional.breadcumbs", ["current" => null])
	</div>
	<form class="px-5"
		method="POST"
		action="{{ route("update.profile", [session("user")[0]["id"]]) }}"
		enctype="multipart/form-data">
		@csrf
		<div class="mb-6">
			<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
				for="file_input">Foto Profil</label>
			<img class="mx-auto mb-2 rounded-full"
				id="foto_profil"
				src="{{ $data["photo"] ? env("API_IMG", "http://localhost:8001/") . "user" . "/" . $data["photo"] : asset("assets/images/user.ico") }}"
				alt=""
				width="100"
				height="100">
			<input
				class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
				id="file_input"
				name="photo"
				type="file"
				aria-describedby="file_input_help"
				accept="image/*"
				onchange="loadfile(event)">
			<script>
				var loadfile = function(event) {
					var photo = document.getElementById("foto_profil");
					photo.src = URL.createObjectURL(event.target.files[0]);
					photo.onload = function() {
						URL.revokeObjectURL(photo.src)
					}
				};
			</script>
		</div>
		<div class="mb-6 grid gap-6 md:grid-cols-2">
			<div>
				<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
					for="addName">Nama</label>
				<input
					class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
					id="addName"
					name="name"
					type="text"
					value='{{ $data["name"] }}'
					required />
			</div>
			<div>
				<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
					for="addEmail">Email</label>
				<input
					class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
					id="addEmail"
					name="email"
					type="email"
					value="{{ $data["email"] }}"
					placeholder="test@gmail.com"
					required />
			</div>
		</div>
		<div class="mb-6 grid gap-6 md:grid-cols-2">
			<div>
				<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
					for="addPassword">Password</label>
				<input
					class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
					id="addPassword"
					name="password"
					type="password" />
			</div>
			<div>
				<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
					for="addConfirm_password">Konfirmasi Password</label>
				<input
					class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
					id="addConfirm_password"
					name="confirm_password"
					type="password" />
			</div>
		</div>
		<div class="flex justify-end">
			<button
				class="mb-2 me-2 inline-flex items-center rounded-lg bg-[#24292F] px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-[#24292F]/90 focus:outline-none focus:ring-4 focus:ring-[#24292F]/50 dark:hover:bg-[#050708]/30 dark:focus:ring-gray-500"
				id="submit"
				type="submit">Ubah</button>
		</div>
	</form>
@endsection
