<div class="w-auto max-w-sm rounded-lg bg-white shadow-lg dark:bg-gray-800 dark:shadow-blue-500">
	<div class="flex justify-between">
		<div class="w-full px-2 py-3 md:py-5">
			<h5 class="mb-2 ms-5 text-2xl font-semibold leading-none text-gray-900 dark:text-white">Log Aktivitas</h5>
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
	<div id="area-chart"></div>
	{{-- <div class="grid grid-cols-1 items-center justify-between border-t border-gray-200 dark:border-gray-700">
			<div class="flex items-center justify-between px-2 py-2 md:py-4">
				<!-- Button -->
				<button
					class="inline-flex items-center text-center text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
					id="dropdownDefaultButton"
					data-dropdown-toggle="lastDaysdropdown"
					data-dropdown-placement="bottom"
					type="button">
					Last 7 days
					<svg class="m-2.5 ms-1.5 w-2.5"
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
				<!-- Dropdown menu -->
				<div class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700"
					id="lastDaysdropdown">
					<ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
						aria-labelledby="dropdownDefaultButton">
						<li>
							<a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
								href="#">Yesterday</a>
						</li>
						<li>
							<a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
								href="#">Today</a>
						</li>
						<li>
							<a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
								href="#">Last 7 days</a>
						</li>
						<li>
							<a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
								href="#">Last 30 days</a>
						</li>
						<li>
							<a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
								href="#">Last 90 days</a>
						</li>
					</ul>
				</div>
				<a
					class="inline-flex items-center rounded-lg px-3 py-2 text-sm font-semibold uppercase text-blue-600 hover:bg-gray-100 hover:text-blue-700 dark:border-gray-700 dark:hover:bg-gray-700 dark:hover:text-blue-500 dark:focus:ring-gray-700"
					href="#">
					Users Report
					<svg class="ms-1.5 h-2.5 w-2.5 rtl:rotate-180"
						aria-hidden="true"
						xmlns="http://www.w3.org/2000/svg"
						fill="none"
						viewBox="0 0 6 10">
						<path stroke="currentColor"
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							d="m1 9 4-4-4-4" />
					</svg>
				</a>
			</div>
		</div> --}}
</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
	const options = {
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
			name: "New users",
			data: [6500, 6418, 6456, 6526, 6356, 6456],
			color: "#1A56DB",
		}, ],
		xaxis: {
			categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February',
				'07 February'
			],
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

	if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
		const chart = new ApexCharts(document.getElementById("area-chart"), options);
		chart.render();
	}
</script>
