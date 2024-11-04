<div id="default-tab-content">
	@foreach ($data["role"] as $roles)
		<div class="hidden rounded-lg bg-gray-50 p-4 dark:bg-gray-800"
			id="{{ $roles["name"] }}"
			role="tabpanel"
			aria-labelledby="{{ $roles["name"] }}-tab">
			<div class="relative overflow-x-auto">
				<table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
					<thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
						<tr>
							<th class="px-6 py-3"
								scope="col">
								Modul
							</th>
							<th class="px-6 py-3 text-center"
								scope="col">
								Akses
							</th>
							<th class="px-6 py-3 text-center"
								scope="col">
								Fungsi
							</th>
							<th class="px-6 py-3 text-center"
								scope="col">
								Dashboard
							</th>
							<th class="px-6 py-3 text-center"
								scope="col">
								Aksi
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($data["modul"] as $i)
							<?php
							$get_access = array_filter($data["access"], function ($val) use ($roles, $i) {
							    return $val["modules_id"] == $i["id"] && $val["roles_id"] == $roles["id"];
							});
							?>
							<form action="{{ route("role.update", [$roles["id"]]) }}"
								method="post">
								@csrf
								@method("PUT")
								<tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
									<th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
										scope="row">
										<label for="modul_{{ $i["id"] }}">{{ $i["name"] }}</label>
										<input name="modul"
											type="text"
											value="{{ $i["id"] }}"
											hidden
											readonly>
									</th>
									<td class="px-6 py-4">
										<div class="flex items-center justify-center gap-2">
											<div class="flex items-center">
												<input
													class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
													id="status{{ $i["id"] }}1"
													name="status"
													type="radio"
													value="0"
													{{ current($get_access)["status"] == "0" ? "checked" : "" }}>
												<label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
													for="status{{ $i["id"] }}1">Nonaktif</label>
											</div>
											<div class="flex items-center">
												<input
													class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
													id="status{{ $i["id"] }}2"
													name="status"
													type="radio"
													value="1"
													{{ current($get_access)["status"] == "1" ? "checked" : "" }}>
												<label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
													for="status{{ $i["id"] }}2">Aktif</label>
											</div>
										</div>
									</td>
									<td class="px-6 py-4">
										<div class="flex items-center justify-center gap-3">
											<div class="flex flex-col items-center justify-center md:flex-row">
												<input
													class="h-4 w-4 items-center rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
													id="create{{ $i["id"] }}"
													name="permission[]"
													type="checkbox"
													value="create"
													{{ current($get_access)["create"] == "1" ? "checked" : "" }}>
												<label class="ms-1 text-sm font-medium text-gray-900 dark:text-gray-300"
													for="create{{ $i["id"] }}">Create</label>
											</div>
											<div class="flex flex-col items-center justify-center md:flex-row">
												<input
													class="h-4 w-4 items-center rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
													id="update{{ $i["id"] }}"
													name="permission[]"
													type="checkbox"
													value="update"
													{{ current($get_access)["update"] == "1" ? "checked" : "" }}>
												<label class="ms-1 text-sm font-medium text-gray-900 dark:text-gray-300"
													for="update{{ $i["id"] }}">Update</label>
											</div>
											<div class="flex flex-col items-center justify-center md:flex-row">
												<input
													class="h-4 w-4 items-center rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
													id="delete{{ $i["id"] }}"
													name="permission[]"
													type="checkbox"
													value="delete"
													{{ current($get_access)["delete"] == "1" ? "checked" : "" }}>
												<label class="ms-1 text-sm font-medium text-gray-900 dark:text-gray-300"
													for="delete{{ $i["id"] }}">Delete</label>
											</div>
										</div>
									</td>
									<td class="px-6 py-4">
										<div class="flex items-center justify-center gap-2">
											<div class="flex items-center">
												<input
													class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
													id="dashboard_{{ $i["id"] }}_1"
													name="dashboard"
													type="radio"
													value="0"
													{{ current($get_access)["dashboard"] == "0" ? "checked" : "" }}>
												<label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
													for="dashboard_{{ $i["id"] }}_1">Nonaktif</label>
											</div>
											<div class="flex items-center">
												<input
													class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
													id="dashboard_{{ $i["id"] }}_2"
													name="dashboard"
													type="radio"
													value="1"
													{{ current($get_access)["dashboard"] == "1" ? "checked" : "" }}>
												<label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
													for="dashboard_{{ $i["id"] }}_2">Aktif</label>
											</div>
										</div>
									</td>
									<td class="px-6 py-4">
										<div class="flex items-center justify-center">
											<button class="font-medium hover:animate-pulse"
												id="save"
												data-tooltip-target="tooltip-light"
												data-tooltip-style="light"
												data-tooltip-placement="left"
												type="submit"><img src="{{ asset("assets/components/save.ico") }}"
													alt=""
													width="25"
													height="25"></button>
											<div
												class="tooltip invisible absolute z-10 inline-block rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 opacity-0 shadow-sm"
												id="tooltip-light"
												role="tooltip">
												Simpan
												<div class="tooltip-arrow"
													data-popper-arrow></div>
											</div>
										</div>
									</td>
								</tr>
							</form>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	@endforeach
</div>
