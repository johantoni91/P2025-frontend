<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="absolute right-5 top-24 flex flex-col items-center justify-center gap-2">
	@if ($errors->any())
		@foreach ($errors->all() as $error)
			<div
				class="flex w-full max-w-xs items-center rounded-lg bg-white p-4 text-gray-500 shadow shadow-red-500 dark:bg-gray-800 dark:text-gray-400"
				id="toast-danger{{ $loop->iteration }}"
				role="alert">
				<div
					class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-red-100 text-red-500 dark:bg-red-800 dark:text-red-200">
					<svg class="h-5 w-5"
						aria-hidden="true"
						xmlns="http://www.w3.org/2000/svg"
						fill="currentColor"
						viewBox="0 0 20 20">
						<path
							d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
					</svg>
					<span class="sr-only">Error icon</span>
				</div>
				<div class="ms-3 text-sm font-normal">{{ $error }}</div>
				<button
					class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
					data-dismiss-target="#toast-danger{{ $loop->iteration }}"
					type="button"
					aria-label="Close">
					<span class="sr-only">Close</span>
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
				</button>
			</div>
		@endforeach
	@endif
</div>
