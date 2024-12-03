<div class="flex h-screen justify-center bg-gray-100 text-gray-900 dark:bg-slate-800">
	@if ($layout["fullscreen"] == "0")
		<div
			class="m-0 flex max-w-screen-xl flex-1 justify-center rounded-lg bg-white shadow-md shadow-green-500 dark:bg-slate-900 sm:m-24">
	@endif
	<div class="flex w-full flex-col justify-center p-6 sm:p-12 lg:w-1/2 xl:w-5/12">
		<h1 class="mb-5 text-center font-bold uppercase dark:text-white">{{ $layout["app_name"] }}</h1>
		<div>
			<img class="mx-auto"
				src="{{ $layout["icon"] ?? asset("assets/images/logo.png") }}"
				width="100"
				height="100" />
		</div>
		<div class="mt-12 flex flex-col items-center">
			<div class="w-full flex-1">
				@include("Auth.Login.form")
			</div>
		</div>
	</div>
	<div class="{{ $layout["fullscreen"] == "0" ? "rounded-r-lg" : "" }} hidden flex-1 bg-green-100 text-center lg:flex">
		<div class="{{ $layout["fullscreen"] == "0" ? "rounded-r-lg" : "" }} w-full bg-cover bg-center bg-no-repeat"
			style="background-image: url('{{ $layout["img_login_bg"] ?? asset("assets/images/auth.jpg") }}');">
		</div>
	</div>
	@if ($layout["fullscreen"] == "0")
</div>
@endif
</div>
