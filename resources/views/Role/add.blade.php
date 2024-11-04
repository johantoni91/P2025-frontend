<button
	class="mb-2 me-2 inline-flex items-center rounded-lg bg-[#24292F] px-5 py-2.5 text-center text-sm font-medium font-medium text-white hover:bg-[#24292F]/90 focus:outline-none focus:ring-4 focus:ring-[#24292F]/50 dark:hover:bg-[#050708]/30 dark:focus:ring-gray-500"
	data-modal-target="addRole"
	data-modal-toggle="addRole"
	type="button">
	Tambah Role
</button>

<div
	class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
	id="addRole"
	data-modal-backdrop="static"
	aria-hidden="true"
	tabindex="-1">
	<div class="relative max-h-full w-full max-w-2xl">
		<!-- Modal content -->
		<div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
			<!-- Modal header -->
			<div class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
				<h3 class="text-xl font-semibold text-gray-900 dark:text-white">
					Tambah Role
				</h3>
				<button
					class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
					data-modal-toggle="addRole"
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
				<form action="{{ route("role.store") }}"
					method="post">
					@csrf
					<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
						for="name">Nama Role</label>
					<input
						class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
						id="name"
						name="role_name"
						type="text"
						required />
					<small class="text-xs font-semibold text-red-500">Peringatan : Role tidak bisa dihapus, hanya bisa
						di-nonaktifkan!</small>
					<div class="flex justify-end">
						<button
							class="my-2 inline-flex items-center rounded-lg bg-[#24292F] px-5 py-2.5 text-center text-sm font-medium font-medium text-white hover:bg-[#24292F]/90 focus:outline-none focus:ring-4 focus:ring-[#24292F]/50 dark:hover:bg-[#050708]/30 dark:focus:ring-gray-500"
							data-modal-target="addRole"
							data-modal-toggle="addRole"
							type="button">
							Tambah
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
