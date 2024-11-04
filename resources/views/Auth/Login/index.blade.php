@extends("Layouts.body")
@section("content")
	@if ($layout["header"] == "1")
		@include("Auth.header")
	@endif
	@if ($layout["login_position"] == "center")
		@include("Auth.Login.center")
	@elseif($layout["login_position"] == "right")
		@include("Auth.Login.right")
	@else
		@include("Auth.Login.default")
	@endif
	@if ($layout["footer"] == "1")
		@include("Layouts.footer")
	@endif
@endsection
