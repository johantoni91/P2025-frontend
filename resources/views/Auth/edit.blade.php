@extends("Layouts.body")
@section("content")
	@include("Additional.breadcumbs", ["current" => null])
	<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
		<ul class="-mb-px flex flex-wrap text-center text-sm font-medium"
			id="default-tab"
			data-tabs-toggle="#default-tab-content"
			role="tablist">
			<li class="me-2"
				role="presentation">
				<button class="inline-block rounded-t-lg border-b-2 p-4"
					id="layout-tab"
					data-tabs-target="#layout"
					type="button"
					role="tab"
					aria-controls="layout"
					aria-selected="false">Aplikasi</button>
			</li>
		</ul>
	</div>
	<div id="default-tab-content">
		@include("Auth.layout_edit")
	</div>
@endsection
