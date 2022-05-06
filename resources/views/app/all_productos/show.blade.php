@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-productos.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_productos.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.all_productos.inputs.nombre')</h5>
                    <span>{{ $productos->nombre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_productos.inputs.precio')</h5>
                    <span>{{ $productos->precio ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_productos.inputs.imagen')</h5>
                    @if($productos->imagen)
                    <a
                        href="{{ \Storage::url($productos->imagen) }}"
                        target="blank"
                        ><i class="icon ion-md-download"></i>&nbsp;Download</a
                    >
                    @else - @endif
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_productos.inputs.observacion')</h5>
                    <span>{{ $productos->observacion ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-productos.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Productos::class)
                <a
                    href="{{ route('all-productos.create') }}"
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
