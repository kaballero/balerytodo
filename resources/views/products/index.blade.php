@extends('layouts.tabler')

@section('content')
    <div class="page-body">
        @if (!$products)
            <x-empty title="No hay productos registrados" message="Intenta ajustar la búsqueda o filtro para encontrar lo que buscas."
                button_label="{{ __('Agrega tu primer producto') }}" button_route="{{ route('products.create') }}" />

            <div style="text-center" style="padding-top:-25px">
                <center>
                    <a href="{{ route('products.import.view') }}" class="">
                        {{ __('Importar Productos') }}
                    </a>
                </center>
            </div>
        @else
            <div class="container-xl">
                <x-alert />
                @livewire('tables.product-table')
            </div>
        @endif
    </div>
@endsection
