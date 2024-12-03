@extends("Layouts.body")
@section("content")
	<div class="mb-3 flex flex-col gap-2 px-3">
		<div class="flex items-center justify-between">
			@include("Additional.breadcumbs", ["current" => null])
			@if (!request()->routeIs("log"))
				@include("Additional.link", ["link" => route("log"), "title" => "Hapus Pencarian"])
			@endif
		</div>
		<div class="flex justify-between gap-3">
			@include("Log.search")
			<div class="flex items-center justify-end gap-3">
				@include("Additional.export", [
					"excel" => route("log.excel"),
					"pdf" => route("log.pdf"),
				])
			</div>
		</div>
	</div>
	<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
		<table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
			<thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
				<tr class="text-center">
					<th class="border-r px-2 py-3 dark:border-gray-700">
						No.
					</th>
					<th class="px-6 py-3"
						scope="col">
						Nama
						</a>
					</th>
					<th class="px-6 py-3"
						scope="col">
						Aksi
					</th>
					<th class="px-6 py-3"
						scope="col">
						IP Address
					</th>
					<th class="px-6 py-3"
						scope="col">
						Waktu
					</th>
					{{-- <th class="px-6 py-3"
						scope="col">
						Tinjau
					</th> --}}
				</tr>
			</thead>
			<tbody>
				<?php $index = ($data["current_page"] - 1) * $data["per_page"] + 1; ?>
				@foreach ($data["data"] as $i)
					<tr class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
						<th
							class="whitespace-nowrap border-r px-6 py-4 text-center font-medium text-gray-900 dark:border-gray-700 dark:text-white"
							scope="row">
							{{ $index++ }}
						</th>
						<td class="px-6 py-4">
							{{ $i["username"] }}
						</td>
						<td class="text-wrap w-24 overflow-x-scroll px-6 py-4">
							{{ strlen($i["action"]) > 35 ? substr($i["action"], 0, 35) . "..." : $i["action"] }}
						</td>
						<td class="px-6 py-4 text-center">
							{{ $i["ip_address"] }}
						</td>
						<td class="px-6 py-4 text-center">
							{{ Carbon\Carbon::parse(strtotime($i["created_at"]))->translatedFormat("l, d F Y") }},
							{{ Carbon\Carbon::parse(strtotime($i["created_at"]))->format("H:i:s") }}
						</td>
						{{-- <td class="flex justify-center px-6 py-4">

						</td> --}}
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@include("Additional.pagination")
@endsection
