<div class="flex min-h-screen flex-col justify-center bg-cover bg-center bg-no-repeat py-12 sm:px-6 lg:px-8"
	style="background-image: url('{{ $layout["img_login_bg"] ?? asset("assets/images/auth.jpg") }}')">
	<div class="sm:mx-auto sm:w-full sm:max-w-md">
		<h2 class="mb-6 text-center text-3xl font-extrabold leading-9 text-gray-900 dark:text-white">
			{{ $layout["app_name"] }}
		</h2>
		<img class="mx-auto"
			src="{{ $layout["icon"] ?? asset("assets/images/logo.png") }}"
			alt="logo"
			width="100"
			height="100">
	</div>
	<div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
		<div class="bg-white px-4 py-8 shadow shadow-md shadow-green-500 dark:bg-slate-900 sm:rounded-lg sm:px-10">
			@include("Auth.Login.form")
		</div>
	</div>
</div>
