@php $editing = isset($productos) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nombre"
            label="Nombre"
            value="{{ old('nombre', ($editing ? $productos->nombre : '')) }}"
            maxlength="255"
            placeholder="Nombre"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="precio"
            label="Precio"
            value="{{ old('precio', ($editing ? $productos->precio : '')) }}"
            maxlength="255"
            placeholder="Precio"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.partials.label
            name="imagen"
            label="Imagen"
        ></x-inputs.partials.label
        ><br />

        <input
            type="file"
            name="imagen"
            id="imagen"
            class="form-control-file"
        />

        @if($editing && $productos->imagen)
        <div class="mt-2">
            <a href="{{ \Storage::url($productos->imagen) }}" target="_blank"
                ><i class="icon ion-md-download"></i>&nbsp;Download</a
            >
        </div>
        @endif @error('imagen') @include('components.inputs.partials.error')
        @enderror
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="observacion"
            label="Observacion"
            maxlength="255"
            required
            >{{ old('observacion', ($editing ? $productos->observacion : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <div class="form-group col-sm-12 mt-4">
        <h4>Assign @lang('crud.all_ciudades.name')</h4>

        @foreach ($allCiudades as $ciudades)
        @php
        $current = isset($productos) ? $productos->allCiudades()->where('ciudades.id', $ciudades->id)->first() : NULL;
        @endphp
        <div>
            <x-inputs.checkbox
                id="ciudades{{ $ciudades->id }}"
                name="allCiudades[{{ $ciudades->id }}]"
                label="{{ ucfirst($ciudades->nombre) }}"
                value="{{ $ciudades->id }}"
                :checked="isset($productos) ? $productos->allCiudades()->where('ciudades.id', $ciudades->id)->exists() : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
            </div>
            <div>
            <x-inputs.text
            name="cantidad[{{ $ciudades->id }}]"
            label="Cantidad en {{ ucfirst($ciudades->nombre) }}"
            value="{{ $current!='' ? $current->pivot->cantidad : 0 }}"
            maxlength="255"
            placeholder="0"
            required
            ></x-inputs.text>
            <?php 
            //dd(isset($productos) ? $productos->allCiudades()->get()->cantidad  : 0);
            //{{ old('cantidad', ($editing ? $productos->allCiudades()->cantidad : '')) }}
            /*
            <x-inputs.text
            name="cantidad"
            label="cantidad"
            value="{{ old('cantidad', ($editing ? $productos->allCiudades()->cantidad : '')) }}"
            maxlength="255"
            placeholder="Cantidad"
            required
            ></x-inputs.text>
            */
            ?>
        </div>
        @endforeach
        
    </div>
</div>
