<div
	class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
	id="recog"
	aria-hidden="true"
	tabindex="-1">
	<div class="relative max-h-full w-full max-w-2xl p-4">
		<!-- Modal content -->
		<div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
			<!-- Modal header -->
			<div class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
				<h3 class="text-xl font-semibold text-gray-900 dark:text-white">
					Pengaturan Face Recognition
				</h3>
				<button
					class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
					data-modal-hide="recog"
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
			<form method="post"
				enctype="multipart/form-data"
				action="{{ route("recog.update", [$dashboard["recog"][0]["id"]]) }}">
				@csrf
				<!-- Modal body -->
				<div class="space-y-4 p-4 md:p-5">
					<div class="flex flex-col justify-center gap-3">
						<div>
							<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
								for="similarity">Sensitivitas Wajah <span class="text-xs text-red-500">(Disarankan di bawah 100%)</span></label>
							<div class="flex flex-row items-center gap-3">
								<span class="text-xs font-thin dark:text-white">0%</span>
								<input class="h-2 w-full cursor-pointer appearance-none rounded-lg bg-gray-200 dark:bg-white"
									id="similarity"
									name="similarity"
									type="range"
									value="{{ intval($dashboard["recog"][0]["similarity"]) }}"
									step="1"
									max="100">
								<span class="text-xs font-thin dark:text-white">100%</span>
							</div>
						</div>
						<div>
							<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
								for="countries">Masker Wajah</label>
							<select
								class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
								id="countries"
								name="mask">
								<option value="with_mask">Menggunakan masker</option>
								<option value="without_mask">Tanpa masker</option>
							</select>
						</div>
					</div>
				</div>
				<!-- Modal footer -->
				<div class="flex items-center rounded-b border-t border-gray-200 p-4 dark:border-gray-600 md:p-5">
					<button
						class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
						data-modal-hide="recog"
						type="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
