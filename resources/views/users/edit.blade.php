@extends('layouts.app')

@section('title', 'Actualización de Usuario')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('users.index'), 'text'=>'Usuarios'],
			['href'=>route('users.show',['user'=>$user]), 'text'=>$user->name],
			['href'=>route('users.edit',['user'=>$user]), 'text'=>'Actualización', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')
    <div class="row mb-2">
		<div class="col text-right">
			<div class="btn-group mr-2" role="group" aria-label="">
				<a href="{{ route('users.edit',['user'=>$user]) }}" class="btn btn-secondary"><i class='fas fa-redo'></i></a>
			</div>
			@can('users.assignRole')
				<div class="btn-group mr-2" role="group" aria-label="">
					<a class="btn btn-secondary" href="{{ route('users.assignRole', ['user' => $user->id]) }}"><i class='fas fa-user-tag'></i></a>
				</div>
			@endcan
			@can('users.destroy')
				<div class="btn-group" role="group" aria-label="">
					<a class="btn btn-secondary" href="javascript:deleteUser({{ $user->id }});"><i class='fas fa-trash'></i></a>
					<form id="delete-user-{{ $user->id }}" method="POST" action="{{ route('users.destroy',['user' => $user->id]) }}">
						@csrf
						@method('DELETE')
					</form>
				</div>
			@endcan
		</div>
	</div>
	@include('users.includes.form', $user)
@endsection

@push('scripts')
	@include('users.includes.delete-user')
@endpush