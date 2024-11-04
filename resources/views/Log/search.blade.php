<button
	class="inline-flex items-center gap-2 rounded border-b-2 px-4 py-2 text-center text-sm font-medium duration-200 hover:border-2 dark:text-white"
	data-modal-target="search"
	data-modal-toggle="search"
	type="button">
	<img class="dark:invert"
		src="{{ asset("assets/components/search.ico") }}"
		alt=""
		width="25"
		height="25">
	<p>Cari</p>
</button>

<div
	class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
	id="search"
	data-modal-backdrop="static"
	aria-hidden="true"
	tabindex="-1">
	<div class="relative max-h-full w-full max-w-2xl">
		<!-- Modal content -->
		<div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
			<!-- Modal header -->
			<div class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
				<h3 class="text-xl font-semibold text-gray-900 dark:text-white">
					Cari Log Aktivitas
				</h3>
				<button
					class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
					data-modal-toggle="search"
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
				<form action="{{ route("search", [$url]) }}">
					<div class="mb-6">
						<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
							for="username">Nama</label>
						<input
							class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
							id="username"
							name="username"
							type="text"
							value="{{ isset($i) ? $i["username"] : "" }}" />
					</div>
					<div class="mb-6 grid gap-6 md:grid-cols-2">
						<div>
							<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
								for="action">Aksi</label>
							<input
								class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
								id="action"
								name="action"
								type="text"
								value="{{ isset($i) ? $i["action"] : "" }}" />
						</div>
						<div>
							<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
								for="ip_address">Alamat IP</label>
							<input
								class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
								id="ip_address"
								name="ip_address"
								type="text"
								value="{{ isset($i) ? $i["ip_address"] : "" }}" />
						</div>
					</div>
					<div class="mb-2">
						<div class="flex flex-row items-center justify-between"
							id="date-range-picker"
							date-rangepicker>
							<div class="mb-2 flex flex-col">
								<label class="block text-sm font-medium text-gray-900 dark:text-white"
									for="start">Dari</label>
								<div class="relative">
									<div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
										<svg class="h-4 w-4 text-gray-500 dark:text-gray-400"
											aria-hidden="true"
											xmlns="http://www.w3.org/2000/svg"
											fill="currentColor"
											viewBox="0 0 20 20">
											<path
												d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
										</svg>
									</div>
									<input
										class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
										id="start"
										name="start"
										type="text"
										placeholder="Pilih tanggal awal">
								</div>
							</div>
							<span class="mx-4 self-center text-gray-500"> - </span>
							<div class="mb-2 flex flex-col">
								<label class="block text-sm font-medium text-gray-900 dark:text-white"
									for="end">Sampai</label>
								<div class="relative">
									<div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
										<svg class="h-4 w-4 text-gray-500 dark:text-gray-400"
											aria-hidden="true"
											xmlns="http://www.w3.org/2000/svg"
											fill="currentColor"
											viewBox="0 0 20 20">
											<path
												d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
										</svg>
									</div>
									<input
										class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
										id="end"
										name="end"
										type="text"
										placeholder="Pilih tanggal akhir">
								</div>
							</div>
						</div>
					</div>
					<div class="flex justify-end">
						<input name="view"
							type="hidden"
							value="{{ $view }}">
						<input name="home"
							type="hidden"
							value="{{ $home }}">
						<button
							class="mb-2 me-2 inline-flex items-center rounded-lg bg-[#24292F] px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-[#24292F]/90 focus:outline-none focus:ring-4 focus:ring-[#24292F]/50 dark:hover:bg-[#050708]/30 dark:focus:ring-gray-500"
							id="submit"
							type="submit">Cari</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@if ($errors->any())
	@foreach ($errors->all() as $error)
		<script>
			Swal.fire(
				title: "Kesalahan",
				text: "{{ $error }}",
				icon: "error"
			)
		</script>
	@endforeach
@endif
