<button class="font-medium hover:animate-pulse"
	data-modal-target="{{ $i["id"] }}"
	data-modal-toggle="{{ $i["id"] }}"
	type="button">
	<img src="{{ asset("assets/components/edit.ico") }}"
		alt=""
		width="25"
		height="25">
</button>

<div
	class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
	id="{{ $i["id"] }}"
	data-modal-backdrop="static"
	aria-hidden="true"
	tabindex="-1">
	<div class="relative max-h-full w-full max-w-2xl">
		<!-- Modal content -->
		<div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
			<!-- Modal header -->
			<div class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
				<h3 class="text-xl font-semibold text-gray-900 dark:text-white">
					Ubah User {{ $i["name"] }}
				</h3>
				<button
					class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
					data-modal-toggle="{{ $i["id"] }}"
					type="button">
					<svg class="h-3 w-3"
						aria-hidden="true"
						xmlns="http://www.w3.org/2000/svg"
						fill="none"
						viewBox="0 0 14 14">
						<path stroke="currentColor"
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
					</svg>
					<span class="sr-only">Close modal</span>
				</button>
			</div>
			<!-- Modal body -->
			<div class="space-y-4 overflow-x-scroll p-4 md:p-5">
				<form method="POST"
					action="{{ route("users.update", $i["id"]) }}"
					enctype="multipart/form-data">
					@csrf
					@method("PUT")
					<div class="mb-6">
						<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
							for="file_input">Foto Profil</label>
						<img class="mx-auto mb-2 rounded-full"
							id="foto_profil{{ $i["id"] }}"
							src='{{ $i["photo"] ? env("API_IMG", "http://localhost:8001/") . "user/" . $i["photo"] : asset("assets/images/user.ico") }}'
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
							onchange='loadfile{{ $i["id"] }}(event)'>
						<script>
							var loadfile{{ $i["id"] }} = function(event) {
								var photo = document.getElementById('foto_profil{{ $i["id"] }}');
								photo.src = URL.createObjectURL(event.target.files[0]);
								photo.onload = function() {
									URL.revokeObjectURL(photo.src)
								}
							};
						</script>
					</div>
					<div class="mb-6">
						<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
							for="name{{ $i["id"] }}">Nama</label>
						<input
							class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
							id="name{{ $i["id"] }}"
							name="name"
							type="text"
							value="{{ $i["name"] }}"
							required />
					</div>
					<div class="mb-6 grid gap-6 md:grid-cols-2">
						<div>
							<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
								for="role{{ $i["id"] }}">Role</label>
							<select
								class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
								id="role{{ $i["id"] }}"
								name="role">
								@foreach ($roles as $role)
									<option value="{{ $role["id"] }}"
										{{ $i["role"] == $role["id"] ? "selected" : "" }}>{{ $role["name"] }}</option>
								@endforeach
							</select>

						</div>
						<div>
							<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
								for="email{{ $i["id"] }}">Email</label>
							<input
								class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
								id="email{{ $i["id"] }}"
								name="email"
								type="email"
								value="{{ $i["email"] }}"
								required />
						</div>
					</div>
					<div class="mb-6 grid gap-6 md:grid-cols-2">
						<div>
							<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
								for="password{{ $i["id"] }}">Password</label>
							<input
								class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
								id="password{{ $i["id"] }}"
								name="password"
								type="password" />
						</div>
						<div>
							<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
								for="confirm_password{{ $i["id"] }}">Konfirmasi Password</label>
							<input
								class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
								id="confirm_password{{ $i["id"] }}"
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
			</div>
		</div>
	</div>
</div>
