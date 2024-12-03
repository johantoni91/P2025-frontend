<div class="w-auto max-w-sm rounded-lg bg-white shadow-lg dark:bg-gray-800 dark:shadow-blue-500">
	<div class="flex justify-between">
		<div class="w-full px-2 py-3 md:py-5">
			<h5 class="mb-2 ms-5 text-2xl font-semibold leading-none text-gray-900 dark:text-white">Users</h5>
		</div>
		{{-- <div class="flex items-center px-2.5 py-0.5 text-center text-base font-semibold text-green-500 dark:text-green-500">
				12%
				<svg class="ms-1 h-3 w-3"
					aria-hidden="true"
					xmlns="http://www.w3.org/2000/svg"
					fill="none"
					viewBox="0 0 10 14">
					<path stroke="currentColor"
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						d="M5 13V1m0 0L1 5m4-4 4 4" />
				</svg>
			</div> --}}
	</div>
	<div id="users-chart"></div>
	<div class="grid grid-cols-1 items-center justify-between border-t border-gray-200 dark:border-gray-700">
		<div class="p-5">
			<span class="text-sm font-semibold">Total Users : {{ $data["users"] }}</span>
		</div>
	</div>
</div>
<script>
	const userOptions = {
		chart: {
			height: "100%",
			maxWidth: "100%",
			type: "area",
			fontFamily: "Inter, sans-serif",
			dropShadow: {
				enabled: false,
			},
			toolbar: {
				show: false,
			},
		},
		tooltip: {
			enabled: true,
			x: {
				show: false,
			},
		},
		fill: {
			type: "gradient",
			gradient: {
				opacityFrom: 0.55,
				opacityTo: 0,
				shade: "#1C64F2",
				gradientToColors: ["#1C64F2"],
			},
		},
		dataLabels: {
			enabled: false,
		},
		stroke: {
			width: 6,
		},
		grid: {
			show: false,
			strokeDashArray: 4,
			padding: {
				left: 2,
				right: 2,
				top: 0
			},
		},
		series: [{
			name: "Users",
			data: @json($user["data"]),
			color: "#1A56DB",
		}, ],
		xaxis: {
			categories: @json($user["categories"]),
			labels: {
				show: false,
			},
			axisBorder: {
				show: false,
			},
			axisTicks: {
				show: false,
			},
		},
		yaxis: {
			show: false,
		},
	}

	const users = new ApexCharts(document.getElementById("users-chart"), userOptions);
	users.render();
</script>
