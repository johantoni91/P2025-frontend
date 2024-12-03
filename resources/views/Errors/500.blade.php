<!DOCTYPE html>
<html lang="id">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
			content="width=device-width, initial-scale=1.0">
		<title>
			Server Error
		</title>
		<link href="{{ asset("assets/css/flowbite.min.css") }}"
			rel="stylesheet" />
		<style>
			.emoji-404 {
				position: relative;
				animation: mymove 2.5s infinite;
			}

			@keyframes mymove {
				33% {
					top: 0px;
				}

				66% {
					top: 20px;
				}

				100% {
					top: 0px
				}
			}
		</style>
		@vite(["resources/css/app.css", "resources/js/app.js"])
		<script>
			// On page load or when changing themes, best to add inline in `head` to avoid FOUC
			if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
					'(prefers-color-scheme: dark)').matches)) {
				document.documentElement.classList.add('dark');
			} else {
				document.documentElement.classList.remove('dark')
			}
		</script>
		<script src="{{ asset("assets/js/script.min.js") }}"></script>
	</head>

	<body>
		<div class="flex h-screen flex-col items-center justify-center gap-5 bg-gray-100">
			<div>
				<svg class="emoji-404"
					id="Layer_1"
					enable-background="new 0 0 226 249.135"
					height="249.135"
					overflow="visible"
					version="1.1"
					viewBox="0 0 226 249.135"
					width="226"
					xml:space="preserve">
					<circle cx="113"
						cy="113"
						fill="#FFE585"
						r="109" />
					<line enable-background="new    "
						fill="none"
						opacity="0.29"
						stroke="#6E6E96"
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="8"
						x1="88.866"
						x2="136.866"
						y1="245.135"
						y2="245.135" />
					<line enable-background="new    "
						fill="none"
						opacity="0.17"
						stroke="#6E6E96"
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="8"
						x1="154.732"
						x2="168.732"
						y1="245.135"
						y2="245.135" />
					<line enable-background="new    "
						fill="none"
						opacity="0.17"
						stroke="#6E6E96"
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="8"
						x1="69.732"
						x2="58.732"
						y1="245.135"
						y2="245.135" />
					<circle cx="68.732"
						cy="93"
						fill="#6E6E96"
						r="9" />
					<path
						d="M115.568,5.947c-1.026,0-2.049,0.017-3.069,0.045  c54.425,1.551,98.069,46.155,98.069,100.955c0,55.781-45.219,101-101,101c-55.781,0-101-45.219-101-101  c0-8.786,1.124-17.309,3.232-25.436c-3.393,10.536-5.232,21.771-5.232,33.436c0,60.199,48.801,109,109,109s109-48.801,109-109  S175.768,5.947,115.568,5.947z"
						enable-background="new    "
						fill="#FF9900"
						opacity="0.24" />
					<circle cx="156.398"
						cy="93"
						fill="#6E6E96"
						r="9" />
					<ellipse cx="67.732"
						cy="140.894"
						enable-background="new    "
						fill="#FF0000"
						opacity="0.18"
						rx="17.372"
						ry="8.106" />
					<ellipse cx="154.88"
						cy="140.894"
						enable-background="new    "
						fill="#FF0000"
						opacity="0.18"
						rx="17.371"
						ry="8.106" />
					<path
						d="M13,118.5C13,61.338,59.338,15,116.5,15c55.922,0,101.477,44.353,103.427,99.797  c0.044-1.261,0.073-2.525,0.073-3.797C220,50.802,171.199,2,111,2S2,50.802,2,111c0,50.111,33.818,92.318,79.876,105.06  C41.743,201.814,13,163.518,13,118.5z"
						fill="#FFEFB5" />
					<circle cx="113"
						cy="113"
						fill="none"
						r="109"
						stroke="#6E6E96"
						stroke-width="8" />
				</svg>
				<div class="mt-5 text-center tracking-widest">
					<span class="block text-6xl text-gray-500"><span>5 0 0</span></span>
					<span class="text-xl text-gray-500">Server Shutdown</span>
				</div>
			</div>
			<a class="rounded-md bg-gray-200 p-3 font-mono text-xl text-gray-500 hover:shadow-md"
				href="{{ route("dashboard") }}">Kembali</a>
		</div>
		{{-- @include("Layouts.footer") --}}
	</body>
	<script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>

</html>
