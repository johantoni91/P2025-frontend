@extends("Layouts.body")
@section("content")
	<div class="mb-3 flex flex-col gap-2 px-3">
		<div class="mb-2 flex items-center justify-between">
			@include("Additional.breadcumbs", ["current" => null])
			<div class="flex items-center justify-center gap-3">
				@if (!request()->routeIs("users.index"))
					@include("Additional.link", ["link" => route("users.index"), "title" => "Hapus Pencarian"])
				@endif
				@if (count($dashboard["users"]) != 0)
					@if (current($dashboard["users"])["create"] == "1")
						@include("Additional.link", ["link" => route("users.create"), "title" => "+ User"])
					@endif
				@endif
			</div>
		</div>
		<div class="flex items-center justify-between">
			@include("User.search")
			<div class="flex justify-end gap-2">
				@include("Additional.export", [
					"excel" => route("users.excel"),
					"pdf" => route("users.pdf"),
				])
			</div>
		</div>
	</div>
	<div class="relative mb-5 overflow-x-auto shadow-md sm:rounded-lg">
		<table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
			<thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
				<tr>
					<th class="px-6 py-3"
						scope="col">
						No.
					</th>
					<th class="px-6 py-3"
						scope="col">
						Nama
					</th>
					<th class="px-6 py-3"
						scope="col">
						Email
					</th>
					<th class="px-6 py-3"
						scope="col">
						Gabung
					</th>
					<th class="px-6 py-3 text-center"
						scope="col">
						Aksi
					</th>
				</tr>
			</thead>
			<tbody>
				<?php $index = ($data["current_page"] - 1) * $data["per_page"] + 1; ?>
				@foreach ($data["data"] as $i)
					<tr
						class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 dark:text-white odd:dark:bg-gray-900 even:dark:bg-gray-800">
						<th class="whitespace-nowrap px-6 py-4 font-medium"
							scope="row">
							{{ $index++ }}
						</th>
						<td class="px-6 py-4">
							<div class="flex flex-wrap items-center justify-start gap-3">
								<img class="rounded-full"
									src="{{ $i["photo"] ? env("API_IMG", "http://localhost:8001/") . "user/" . $i["photo"] : asset("assets/components/unknown.ico") }}"
									alt=""
									width="50"
									height="50">
								<h1 class="font-bold">
									{{ $i["name"] }}
								</h1>
							</div>
						</td>
						<td class="px-6 py-4">
							{{ $i["email"] }}
						</td>
						<td class="px-6 py-4">
							{{ Carbon\Carbon::parse(strtotime($i["created_at"]))->translatedFormat("l, d F Y") }}
							<br>
							{{ Carbon\Carbon::parse($i["created_at"])->setTimezone("Asia/Jakarta")->format("H:i:s") }}
						</td>
						<th class="text-center">
							@if ($i["id"] != session("user")[0]["id"])
								<div class="flex items-center justify-center gap-3 px-6 py-4">
									<a class="font-medium hover:animate-pulse"
										href='{{ route("users.getToken", $i["id"]) }}'><img src="{{ asset("assets/components/role.ico") }}"
											alt=""
											width="40"
											height="40"></a>
									<a class="font-medium hover:animate-pulse"
										href='{{ route("users.edit", $i["id"]) }}'><img src="{{ asset("assets/components/edit.ico") }}"
											alt=""
											width="40"
											height="40"></a>
									<button class="font-medium hover:animate-pulse"
										id="del{{ $i["id"] }}"
										type="button"><img src="{{ asset("assets/components/trash.ico") }}"
											alt=""
											width="40"
											height="40"></button>
									<script>
										$(function() {
											$('#del{{ $i["id"] }}').on('click', function() {
												Swal.fire({
													title: '{{ "Hapus Akun " . $i["name"] }} . ?',
													showDenyButton: true,
													confirmButtonText: "Ya",
													denyButtonText: `Batal`,
													denyButtonColor: "#ff0000",
													confirmButtonColor: "#0004ff",
												}).then((result) => {
													if (result.isConfirmed) {
														$.ajax({
															url: '{{ route("users.destroy", $i["id"]) }}',
															success: function(result) {
																Swal.fire({
																	title: "Berhasil",
																	cancelButtonColor: "#0004ff",
																	confirmButtonColor: "#0004ff",
																	text: result['message'],
																	icon: "success"
																});
																setTimeout(() => {
																	location.reload();
																}, 2000);
															},
															error: function(xhr) {
																Swal.fire("Gagal", xhr, "error");
															}
														});
													}
												});
											})
										})
									</script>
								</div>
							@else
								<a
									class="font-medium text-blue-600 hover:text-green-500 hover:underline hover:decoration-green-500 dark:text-blue-500 dark:hover:text-green-500"
									href="{{ route("profile") }}">Ubah Profile</a>
							@endif
						</th>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@include("Additional.pagination")
@endsection
