@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-ciudades.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_ciudades.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.all_ciudades.inputs.nombre')</h5>
                    <span>{{ $ciudades->nombre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_ciudades.inputs.lat')</h5>
                    <span>{{ $ciudades->lat ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_ciudades.inputs.lng')</h5>
                    <span>{{ $ciudades->lng ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-ciudades.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Ciudades::class)
                <a
                    href="{{ route('all-ciudades.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
