<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		@foreach($routes as $route)
			@php $route = (object)$route; @endphp
			@if(isset($route->active))
				<li class="breadcrumb-item active" aria-current="page">{{ $route->text }}</li>
			@else
				<li class="breadcrumb-item">
					<a href="{{ $route->href }}">{{ $route->text }}</a>
				</li>
			@endif
		@endforeach
	</ol>
</nav>