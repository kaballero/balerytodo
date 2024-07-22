@extends('layouts.tabler')

@section('content')
<div class="page-body">
    @if(!$customers)
        <x-empty
            title="No se encontraron clientes"
            message="Intenta ajustar la búsqueda o filtro para encontrar lo que buscas."
            button_label="{{ __('Registra tu primer cliente') }}"
            button_route="{{ route('customers.create') }}"
        />
    @else
        <div class="container-xl">

            {{---
            <div class="card">
                <div class="card-body">
                    <livewire:power-grid.customers-table/>
                </div>
            </div>
            ---}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <h3 class="mb-1">Éxito</h3>
                    <p>{{ session('success') }}</p>

                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            @endif
            @livewire('tables.customer-table')
        </div>
    @endif
</div>
@endsection
