<div class="flex h-screen justify-center bg-gray-100 text-gray-900 dark:bg-slate-800">
	@if ($layout["fullscreen"] == "0")
		<div
			class="m-0 flex max-w-screen-xl flex-1 justify-center rounded-lg bg-white shadow-md shadow-green-500 dark:bg-slate-900 sm:m-24">
	@endif
	<div class="{{ $layout["fullscreen"] == "0" ? "rounded-l-lg" : "" }} hidden flex-1 bg-green-300 text-center lg:flex">
		<div class="{{ $layout["fullscreen"] == "0" ? "rounded-l-lg" : "" }} w-full bg-cover bg-center bg-no-repeat"
			style="background-image: url('{{ $layout["img_login_bg"] ?? asset("assets/images/auth.jpg") }}');">
		</div>
	</div>
	<div class="flex flex-col justify-center p-6 sm:p-12 lg:w-1/2 xl:w-5/12">
		<h1 class="mb-5 text-center font-bold uppercase dark:text-white">{{ $layout["app_name"] }}</h1>
		<div>
			<img class="mx-auto"
				src="{{ $layout["icon"] ?? asset("assets/images/logo.png") }}"
				width="100"
				height="100" />
		</div>
		<div class="mt-12 flex flex-col items-center">
			<div class="mt-3 w-full flex-1">
				<form class="mx-auto max-w-xs"
					method="post"
					action="{{ route("login.post") }}">
					@csrf
					<input
						class="focus:border-blueGray-500 focus:shadow-outline mb-3 w-full transform rounded-lg border-transparent bg-gray-200 px-4 py-2.5 text-base text-black placeholder-gray-600 ring-gray-400 ring-offset-2 ring-offset-current transition duration-500 ease-in-out focus:bg-white focus:outline-none focus:ring-2 dark:text-white dark:focus:bg-gray-800"
						name="email"
						type="email"
						value="jo@gmail.com"
						required
						placeholder="Email" />
					<input
						class="focus:border-blueGray-500 focus:shadow-outline mb-3 mt-2 w-full transform rounded-lg border-transparent bg-gray-200 px-4 py-2.5 text-base text-black placeholder-gray-600 ring-gray-400 ring-offset-2 ring-offset-current transition duration-500 ease-in-out focus:bg-white focus:outline-none focus:ring-2 dark:text-white dark:focus:bg-gray-800"
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
							<button
								class="rounded-full border border-green-900 px-2.5 text-xl font-semibold text-black hover:rotate-90 hover:bg-green-900 hover:text-white dark:text-white dark:text-white dark:hover:bg-blue-800"
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
							class="focus:border-blueGray-500 focus:shadow-outline mb-3 mt-2 w-full transform rounded-lg border-transparent bg-gray-200 px-4 py-2.5 text-base text-black placeholder-gray-600 ring-gray-400 ring-offset-2 ring-offset-current transition duration-500 ease-in-out focus:bg-white focus:outline-none focus:ring-2 dark:text-white dark:focus:bg-gray-800"
							id="captcha"
							name="captcha"
							type="text"
							placeholder="Masukkan captcha"
							required>
					</div>
					<button
						class="text-white-500 focus:shadow-outline mt-5 flex w-full items-center justify-center rounded-lg bg-green-400 py-4 font-semibold tracking-wide transition-all duration-300 ease-in-out hover:bg-green-700 focus:outline-none">
						<span class="ml-">
							Masuk
						</span>
					</button>
				</form>
			</div>
		</div>
	</div>
	@if ($layout["fullscreen"] == "0")
</div>
@endif
</div>
