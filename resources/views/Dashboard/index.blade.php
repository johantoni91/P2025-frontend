@extends("Layouts.body")
@section("content")
	@include("Additional.breadcumbs", ["current" => null])
	<div class="mb-5 flex flex-row flex-wrap items-center justify-start gap-5 p-3 dark:text-white">
		@if (count($dashboard["users"]) != 0)
			@if (current($dashboard["users"])["dashboard"] == "1")
				<div
					class="flex w-full flex-col items-center rounded-lg bg-slate-300 p-5 shadow-md shadow-slate-400 dark:bg-gray-800 dark:shadow-blue-500 sm:w-auto">
					<dt class="mb-2 text-3xl font-extrabold">{{ $data["users"] }}</dt>
					<dd class="text-gray-500 dark:text-gray-400">Users</dd>
				</div>
			@endif
		@endif
		@if (count($dashboard["log"]) != 0)
			@if (current($dashboard["log"])["dashboard"] == "1")
				<div
					class="flex w-full flex-col items-center rounded-lg bg-slate-300 p-5 shadow-md shadow-slate-400 dark:bg-gray-800 dark:shadow-blue-500 sm:w-auto">
					<dt class="mb-2 text-3xl font-extrabold">{{ $data["logs"] }}</dt>
					<dd class="text-gray-500 dark:text-gray-400">Log Aktivitas</dd>
				</div>
			@endif
		@endif
		@if (count($dashboard["role"]) != 0)
			@if (current($dashboard["role"])["dashboard"] == "1")
				<div
					class="flex w-full flex-col items-center rounded-lg bg-slate-300 p-5 shadow-md shadow-slate-400 dark:bg-gray-800 dark:shadow-blue-500 sm:w-auto">
					<dt class="mb-2 text-3xl font-extrabold">{{ $data["role"] }}</dt>
					<dd class="text-gray-500 dark:text-gray-400">Role</dd>
				</div>
			@endif
		@endif
	</div>

	<h1 class="inline-flex items-center gap-2 text-xl font-semibold text-gray-700 dark:text-gray-400"> <img
			class="dark:invert"
			src="{{ asset("assets/components/graph.ico") }}"
			alt=""
			width="20"
			height="20">
		Aktivitas Aplikasi</h1>
	<div class="flex flex-row flex-wrap items-center justify-start gap-5 p-3 dark:text-white">
		@include("Dashboard.graph")
	</div>
@endsection