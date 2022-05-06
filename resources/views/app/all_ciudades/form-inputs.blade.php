@php $editing = isset($ciudades) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nombre"
            label="Nombre"
            value="{{ old('nombre', ($editing ? $ciudades->nombre : '')) }}"
            maxlength="255"
            placeholder="Nombre"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="lat"
            label="Lat"
            value="{{ old('lat', ($editing ? $ciudades->lat : '')) }}"
            maxlength="255"
            placeholder="Lat"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="lng"
            label="Lng"
            value="{{ old('lng', ($editing ? $ciudades->lng : '')) }}"
            maxlength="255"
            placeholder="Lng"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
