<nav class="fixed top-0 z-[70] w-full border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
	<div class="px-3 py-3 lg:px-5 lg:pl-3">
		<div class="flex items-center justify-between">
			<div class="flex items-center justify-start rtl:justify-end">
				<button
					class="inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 sm:hidden"
					data-drawer-target="logo-sidebar"
					data-drawer-toggle="logo-sidebar"
					type="button"
					aria-controls="logo-sidebar">
					<span class="sr-only">Open sidebar</span>
					<svg class="h-6 w-6"
						aria-hidden="true"
						fill="currentColor"
						viewBox="0 0 20 20"
						xmlns="http://www.w3.org/2000/svg">
						<path clip-rule="evenodd"
							fill-rule="evenodd"
							d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
						</path>
					</svg>
				</button>
				<a class="ms-2 flex md:me-24"
					href="/">
					<img class="me-3 h-8"
						id="logoP2025"
						src="{{ session("layout")[0]["icon"] ?? asset("assets/images/logo.png") }}"
						alt="Logo_P2025" />
					<span
						class="self-center whitespace-nowrap text-xl font-semibold dark:text-white sm:text-2xl">{{ session("layout")[0]["short_app_name"] }}</span>
				</a>
			</div>
			<div class="flex items-center">
				<div class="ms-3 flex items-center gap-3">
					<button class="flex rounded-full bg-transparent text-sm focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
						data-dropdown-trigger="hover"
						data-dropdown-toggle="dropdown-datetime"
						type="button"
						aria-expanded="true">
						<span class="sr-only">Open user menu</span>
						<img src="{{ asset("assets/components/calendar.ico") }}"
							alt=""
							width="30"
							height="30">
					</button>
					<div class="clock dark:text-white"
						id="clock"></div>
					<div class="z-50 my-4 hidden list-none rounded bg-white text-base shadow dark:divide-gray-600 dark:bg-gray-700"
						id="dropdown-datetime">
						<ul class="p-2"
							role="none">
							<li>
								<div id="datepicker-inline"
									data-date="{{ Carbon\Carbon::now()->format("m/d/Y") }}"
									inline-datepicker></div>
							</li>
						</ul>
					</div>
					<button class="rounded-lg p-2.5 text-sm text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700"
						id="theme-toggle"
						type="button">
						<svg class="hidden h-5 w-5"
							id="theme-toggle-dark-icon"
							fill="currentColor"
							viewBox="0 0 20 20"
							xmlns="http://www.w3.org/2000/svg">
							<path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
						</svg>
						<svg class="hidden h-5 w-5"
							id="theme-toggle-light-icon"
							fill="currentColor"
							viewBox="0 0 20 20"
							xmlns="http://www.w3.org/2000/svg">
							<path
								d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
								fill-rule="evenodd"
								clip-rule="evenodd"></path>
						</svg>
					</button>
					<div>
						<button class="flex rounded-full bg-transparent text-sm focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
							data-dropdown-toggle="dropdown-user"
							type="button"
							aria-expanded="false">
							<span class="sr-only">Open user menu</span>
							<img class="h-8 w-8 rounded-full p-1 shadow shadow-green-500 dark:shadow-white"
								src="{{ session("user")[0]["photo"] ? env("API_IMG", "http://localhost:8001/") . "user/" . session("user")[0]["photo"] : asset("assets/components/unknown.ico") }}"
								alt="user photo">
						</button>
					</div>
					<div
						class="z-50 my-4 hidden list-none divide-y divide-gray-100 rounded bg-white text-base shadow dark:divide-gray-600 dark:bg-gray-700"
						id="dropdown-user">
						<div class="px-4 py-3"
							role="none">
							<p class="text-sm text-gray-900 dark:text-white"
								role="none">
								{{ session("user")[0]["name"] }}
							</p>
							<p class="truncate text-sm font-medium text-gray-900 dark:text-gray-300"
								role="none">
								{{ session("user")[0]["email"] }}
							</p>
						</div>
						<ul class="py-1"
							role="none">
							<li>
								<a
									class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
									href="{{ route("profile") }}"
									role="menuitem">Profil</a>
							</li>
							<li>
								<a
									class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
									href="{{ route("logout") }}"
									role="menuitem">Keluar</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>
<script>
	function updateClock() {
		const now = new Date();
		const hours = String(now.getHours()).padStart(2, '0');
		const minutes = String(now.getMinutes()).padStart(2, '0');
		const seconds = String(now.getSeconds()).padStart(2, '0');
		document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
	}

	setInterval(updateClock, 1000); // Update every second
	updateClock(); // Initial call to set the time immediately
</script>
