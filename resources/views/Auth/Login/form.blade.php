@vite(["resources/js/face.js"])
<meta name="csrf-token"
	content="{{ csrf_token() }}">
<div class="relative w-full"
	id="controls-carousel"
	data-carousel="static">
	<!-- Carousel wrapper -->
	<div class="relative h-96 overflow-hidden rounded-lg">
		<!-- Item 1 -->
		<div class="flex hidden flex-col items-center justify-center duration-700 ease-in-out"
			data-carousel-item>
			<form class="mx-auto max-w-xs"
				method="post"
				action="{{ route("login.post") }}">
				@csrf
				<input
					class="focus:border-blueGray-500 focus:shadow-outline my-3 w-full transform rounded-lg border-transparent bg-gray-200 px-4 py-2.5 text-base text-black placeholder-gray-600 ring-gray-400 ring-offset-2 ring-offset-current transition duration-500 ease-in-out focus:bg-white focus:outline-none focus:ring-2 dark:bg-slate-500 dark:text-white"
					name="email"
					type="email"
					value="jo@gmail.com"
					required
					placeholder="Email" />
				<input
					class="focus:border-blueGray-500 focus:shadow-outline mb-3 mt-2 w-full transform rounded-lg border-transparent bg-gray-200 px-4 py-2.5 text-base text-black placeholder-gray-600 ring-gray-400 ring-offset-2 ring-offset-current transition duration-500 ease-in-out focus:bg-white focus:outline-none focus:ring-2 dark:bg-slate-500 dark:text-white"
					name="password"
					type="password"
					value="123"
					required
					placeholder="Password" />
				<label class="text-sm font-medium text-black dark:text-white"
					for="captcha">Captcha</label>
				<div class="flex flex-col gap-2">
					<div class="flex items-center justify-start gap-2">
						<span class="captcha">{!! captcha_img() !!}</span>
						<button class="p-3 text-xl font-semibold text-black dark:text-white"
							id="reset">&#x21bb;</button>
						<script>
							$(function() {
								$("#reset").click(function() {
									$.ajax({
										type: "GET",
										url: "{{ route("login.captcha") }}",
										success: function(data) {
											$("#captcha").val('');
											$(".captcha").html(data.captcha);
										}
									});
								});
							})
						</script>
					</div>
					<input
						class="focus:border-blueGray-500 focus:shadow-outline mb-3 mt-2 w-full transform rounded-lg border-transparent bg-gray-200 px-4 py-2.5 text-base text-black placeholder-gray-600 ring-gray-400 ring-offset-2 ring-offset-current transition duration-500 ease-in-out focus:bg-white focus:outline-none focus:ring-2 dark:bg-slate-500 dark:text-white"
						id="captcha"
						name="captcha"
						type="text"
						placeholder="Masukkan captcha"
						required>
				</div>
				<button
					class="text-white-500 focus:shadow-outline mt-5 flex w-full items-center justify-center rounded-lg bg-green-400 py-4 font-semibold tracking-wide transition-all duration-300 ease-in-out hover:bg-green-700 focus:outline-none"
					type="submit">
					<span class="ml-">
						Masuk
					</span>
				</button>
			</form>
		</div>
		{{-- Item 2 --}}
		<div class="flex hidden flex-col items-center justify-center duration-700 ease-in-out"
			data-carousel-item>
			<form class="mx-auto max-w-xs"
				method="post"
				action="{{ route("login.token") }}">
				@csrf
				<input
					class="focus:border-blueGray-500 focus:shadow-outline my-3 w-full transform rounded-lg border-transparent bg-gray-200 px-4 py-2.5 text-base text-black placeholder-gray-600 ring-gray-400 ring-offset-2 ring-offset-current transition duration-500 ease-in-out focus:bg-white focus:outline-none focus:ring-2 dark:bg-slate-500 dark:text-white"
					name="token"
					type="text"
					required
					placeholder="Masukkan token" />
				<button
					class="text-white-500 focus:shadow-outline mt-5 flex w-full items-center justify-center rounded-lg bg-green-400 py-4 font-semibold tracking-wide transition-all duration-300 ease-in-out hover:bg-green-700 focus:outline-none"
					type="submit">
					<span class="ml-">
						Masuk
					</span>
				</button>
			</form>
		</div>
		<!-- Item 3 -->
		<div class="hidden duration-700 ease-in-out"
			data-carousel-item="active">
			<div class="flex flex-col justify-between">
				<video class="mx-auto rounded-lg"
					id="video"
					width="400"
					height="300"
					autoPlay></video>
				<canvas class="hidden"
					id="canvas"
					width="400"
					height="300"></canvas>
				<div class="flex justify-center">
					<button
						class="text-white-500 focus:shadow-outline z-10 mt-5 flex w-[8rem] w-full items-center justify-center rounded-lg bg-green-400 py-4 font-semibold tracking-wide transition-all duration-300 ease-in-out hover:bg-green-700 focus:outline-none"
						id="scanFace"
						type="button">
						<span class="ml-">
							Pindai wajah
						</span>
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Slider controls -->
	<button
		class="group absolute start-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
		data-carousel-prev
		type="button">
		<span
			class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
			<svg class="h-4 w-4 text-gray-800 rtl:rotate-180 dark:text-white"
				aria-hidden="true"
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 6 10">
				<path stroke="currentColor"
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="2"
					d="M5 1 1 5l4 4" />
			</svg>
			<span class="sr-only">Previous</span>
		</span>
	</button>
	<button
		class="group absolute end-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
		data-carousel-next
		type="button">
		<span
			class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
			<svg class="h-4 w-4 text-gray-800 rtl:rotate-180 dark:text-white"
				aria-hidden="true"
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 6 10">
				<path stroke="currentColor"
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="2"
					d="m1 9 4-4-4-4" />
			</svg>
			<span class="sr-only">Next</span>
		</span>
	</button>
</div>
