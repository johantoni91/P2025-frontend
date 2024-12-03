<!DOCTYPE html>
<html lang="id">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
			content="width=device-width, initial-scale=1.0">
		<title>
			{{ session("layout") ? ucwords(strtok($home, ".")) . " | " . session("layout")[0]["short_app_name"] : $layout["short_app_name"] }}
		</title>
		<link href="{{ asset("assets/css/flowbite.min.css") }}"
			rel="stylesheet" />
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
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.3/dist/sweetalert2.all.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.3/dist/sweetalert2.min.css"rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/@vladmandic/face-api/dist/face-api.js"></script>
		<script type="text/javascript"
			src="https://unpkg.com/webcam-easy/dist/webcam-easy.min.js"></script>
		<script src="{{ asset("assets/js/script.min.js") }}"></script>
	</head>

	<body class="overflow-x-hidden dark:bg-[#36383F]"
		data-sidebar-size="default"
		data-theme-layout="vertical">
		@include("sweetalert::alert")

		@if (!request()->routeIs("login"))
			@if (!request()->routeIs("error.404"))
				@vite(["resources/js/toggle.js"])
				@include("Layouts.sidebar")
				<div class="ml-64 p-4"
					id="body-content">
					<div class="my-14 rounded-lg p-4">
			@endif
		@endif
		<div class='{{ !request()->routeIs("login") ? "h-[80dvh] overflow-y-scroll" : "" }}'>
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

</html>
