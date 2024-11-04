@extends("Additional.modal")
@section("body_content")
	<table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
		<thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
			<tr class="text-center">
				<th class="px-2 py-3">
					Robot
				</th>
				<th class="px-6 py-3"
					scope="col">
					Perangkat
				</th>
				<th class="px-6 py-3"
					scope="col">
					Browser
				</th>
				<th class="px-6 py-3"
					scope="col">
					Referensi
				</th>
				<th class="px-6 py-3"
					scope="col">
					Bahasa
				</th>
				<th class="px-6 py-3"
					scope="col">
					Otorisasi
				</th>
				<th class="px-6 py-3"
					scope="col">
					Port
				</th>
			</tr>
		</thead>
		<tbody>
			<?php $index = ($data["current_page"] - 1) * $data["per_page"] + 1; ?>
			@foreach ($data["data"] as $i)
				<tr class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
					<th class="whitespace-nowrap px-6 py-4 text-center font-medium text-gray-900 dark:text-white"
						scope="row">
						{{ $index++ }}
					</th>
					<td class="px-6 py-4">
						{{ $i["username"] }}
					</td>
					<td class="px-6 py-4">
						{{ $i["action"] }}
					</td>
					<td class="px-6 py-4">
						{{ $i["ip_address"] }}
					</td>
					<td class="px-6 py-4">
						{{ $i["ip_address"] }}
					</td>
					<td class="px-6 py-4">
						{{ $i["ip_address"] }}
					</td>
					<td class="px-6 py-4">
						{{ $i["ip_address"] }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
