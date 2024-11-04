<!DOCTYPE html>
<html lang="id">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
			content="width=device-width, initial-scale=1.0">
		<title>
			{{ session("layout") ? ucwords(strtok($home, ".")) . " " . session("layout")[0]["short_app_name"] : $layout["short_app_name"] }}
		</title>
		{{-- <title>{{ isset($home) ? ucwords(strtok($home, ".")) . " | Project 2025" : "Project 2025" }}</title> --}}
		@vite(["resources/css/app.css", "resources/js/app.js"])
		{{-- <link href="{{ asset("assets/css/animate.css") }}"
			rel="stylesheet"> --}}
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

	<body class="overflow-x-hidden dark:bg-[#36383F]"
		data-sidebar-size="default"
		data-theme-layout="vertical">
		@include("sweetalert::alert")

		@if (!request()->routeIs("login"))
			@include("Layouts.sidebar")
			<div class="p-4 sm:ml-64">
				<div class="my-14 rounded-lg p-4">
		@endif
		<div class='{{ !request()->routeIs("login") ? "h-[78vh] overflow-y-scroll" : "" }}'>
			@yield("content")
			@include("Additional.errors")
		</div>

		@if (!request()->routeIs("login"))
			</div>
			</div>
			@include("Layouts.footer")
		@endif
	</body>
	<script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
	<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>

</html>
