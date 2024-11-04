@extends("Layouts.body")
@section("content")
	<div class="flex flex-row items-center justify-between">
		@include("Additional.breadcumbs", ["current" => null])
		@include("Role.add")
	</div>
	<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
		<ul class="-mb-px flex flex-wrap text-center text-sm font-medium"
			id="default-tab"
			data-tabs-toggle="#default-tab-content"
			role="tablist">
			@foreach ($data["role"] as $role)
				<li class="me-2"
					role="presentation">
					<button class="inline-block rounded-t-lg border-b-2 p-4"
						id="{{ $role["name"] }}-tab"
						data-tabs-target="#{{ $role["name"] }}"
						type="button"
						role="tab"
						aria-controls="{{ $role["name"] }}"
						aria-selected="false">{{ ucwords($role["name"]) }}</button>
				</li>
			@endforeach
		</ul>
	</div>
	@include("Role.content")
@endsection
