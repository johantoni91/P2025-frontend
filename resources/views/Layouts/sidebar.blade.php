@include("Layouts.navbar")
<aside
	class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full border-r border-gray-200 bg-white pt-20 transition-transform dark:border-gray-700 dark:bg-gray-800 sm:translate-x-0"
	id="logo-sidebar"
	aria-label="Sidebar">
	<div class="h-full overflow-y-auto bg-white px-3 pb-4 dark:bg-gray-800">
		<ul class="space-y-2 font-medium">
			@if (count($dashboard["dashboard"]) != 0)
				@if (current($dashboard["dashboard"])["status"] == "1")
					<li>
						<a
							class="{{ request()->routeIs("dashboard") ? "bg-slate-600/50 dark:bg-slate-400/50" : "" }} group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
							href="{{ route("dashboard") }}">
							<img src="{{ asset("assets/components/dashboard.ico") }}"
								alt=""
								width="35"
								height="35">
							<span class="ms-3">Dashboard</span>
						</a>
					</li>
				@endif
			@endif
			@if (count($dashboard["users"]) != 0)
				@if (current($dashboard["users"])["status"] == "1")
					<li>
						<a
							class="{{ request()->routeIs("users.index") ? "bg-slate-600/50 dark:bg-slate-400/50" : "" }} group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
							href="{{ route("users.index") }}">
							<img src="{{ asset("assets/components/users.ico") }}"
								alt=""
								width="35"
								height="35">
							<span class="ms-3 flex-1 whitespace-nowrap">Manajemen Users</span>
							{{-- <span
						class="ms-3 inline-flex items-center justify-center rounded-full bg-gray-100 px-2 text-sm font-medium text-gray-800 dark:bg-gray-700 dark:text-gray-300">Pro</span> --}}
						</a>
					</li>
				@endif
			@endif
			@if (count($dashboard["log"]) != 0)
				@if (current($dashboard["log"])["status"] == "1")
					<li>
						<a
							class="{{ request()->routeIs("log") ? "bg-slate-600/50 dark:bg-slate-400/50" : "" }} group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
							href="{{ route("log") }}">
							<img src="{{ asset("assets/components/logs.ico") }}"
								alt=""
								width="35"
								height="35">
							<span class="ms-3 flex-1 whitespace-nowrap">Log Aktivitas</span>
							{{-- <span
						class="ms-3 inline-flex h-3 w-3 items-center justify-center rounded-full bg-blue-100 p-3 text-sm font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-300">3</span> --}}
						</a>
					</li>
				@endif
			@endif
			@if (count($dashboard["role"]) != 0 || count($dashboard["layout"]) != 0)
				<li>
					<button
						class="group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
						data-collapse-toggle="dropdown-example"
						type="button"
						aria-controls="dropdown-example">
						<img src="{{ asset("assets/components/gears.ico") }}"
							alt=""
							width="35"
							height="35">
						<span class="ms-3 flex-1 whitespace-nowrap text-left rtl:text-right">Pengaturan</span>
						<svg class="h-3 w-3"
							aria-hidden="true"
							xmlns="http://www.w3.org/2000/svg"
							fill="none"
							viewBox="0 0 10 6">
							<path stroke="currentColor"
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								d="m1 1 4 4 4-4" />
						</svg>
					</button>
					<ul class="hidden space-y-2 py-2"
						id="dropdown-example">
						@if (current($dashboard["role"])["status"] == "1")
							<li>
								<a
									class="{{ request()->routeIs("role.index") ? "bg-slate-600/50 dark:bg-slate-400/50" : "" }} group flex w-full items-center gap-3 rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
									href="{{ route("role.index") }}"><img src="{{ asset("assets/components/role.ico") }}"
										alt=""
										width="35"
										height="35"> Role</a>
							</li>
						@endif
						@if (current($dashboard["layout"])["status"] == "1")
							<li>
								<a
									class="{{ request()->routeIs("layout.index") ? "bg-slate-600/50 dark:bg-slate-400/50" : "" }} group flex w-full items-center gap-3 rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
									href="{{ route("layout.index") }}"><img src="{{ asset("assets/components/layout.ico") }}"
										alt=""
										width="35"
										height="35"> Tampilan</a>
							</li>
						@endif
					</ul>
				</li>
			@endif
		</ul>
	</div>
</aside>
