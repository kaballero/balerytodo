@extends('layouts.tabler')

@section('content')
    <div class="page-body">
        @if(!$quotations)
            <x-empty
                title="No se encontraron cotizaciones"
                message="Intenta ajustar la búsqueda o filtro para encontrar lo que buscas."
                button_label="{{ __('Agrega tu primera cotización') }}"
                button_route="{{ route('quotations.create') }}"
            />
        @else
            <div class="container-xl">
                @livewire('tables.quotation-table')
            </div>
        @endif
    </div>
@endsection
