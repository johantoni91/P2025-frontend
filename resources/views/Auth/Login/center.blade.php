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
			<form method="POST"
				action="{{ route("login.post") }}">
				@csrf
				<div>
					<label class="block text-sm font-medium leading-5 text-gray-700 dark:text-white"
						for="email">
						Email address
					</label>
					<div class="relative mt-1 rounded-md shadow-sm">
						<input
							class="focus:shadow-outline-blue block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out focus:border-blue-300 focus:outline-none sm:text-sm sm:leading-5"
							id="email"
							name="email"
							type="email"
							value="jo@gmail.com"
							required
							placeholder="user@example.com"
							required="">
						<div class="pointer-events-none absolute inset-y-0 right-0 flex hidden items-center pr-3">
							<svg class="h-5 w-5 text-red-500"
								fill="currentColor"
								viewBox="0 0 20 20">
								<path fill-rule="evenodd"
									d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
									clip-rule="evenodd"></path>
							</svg>
						</div>
					</div>
				</div>

				<div class="mt-3">
					<label class="block text-sm font-medium leading-5 text-gray-700 dark:text-white"
						for="password">
						Password
					</label>
					<div class="mt-1 rounded-md shadow-sm">
						<input
							class="focus:shadow-outline-blue block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out focus:border-blue-300 focus:outline-none sm:text-sm sm:leading-5"
							id="password"
							name="password"
							type="password"
							value="123"
							required
							required="">
					</div>
				</div>

				<div class="mt-3">
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
							class="focus:shadow-outline-blue block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out focus:border-blue-300 focus:outline-none sm:text-sm sm:leading-5"
							id="captcha"
							name="captcha"
							type="text"
							placeholder="Masukkan captcha"
							required>
					</div>
				</div>

				<div class="mt-6">
					<span class="block w-full rounded-md shadow-sm">
						<button
							class="focus:shadow-outline-indigo flex w-full justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out hover:bg-blue-500 focus:border-indigo-700 focus:outline-none active:bg-indigo-700"
							type="submit">
							Masuk
						</button>
					</span>
				</div>
			</form>

		</div>
	</div>
</div>
