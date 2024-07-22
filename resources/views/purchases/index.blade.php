@extends('layouts.tabler')

@section('content')
<div class="page-body">
    @if(!$purchases)
    <x-empty
        title="No purchases found"
        message="Intenta ajustar la búsqueda o filtro para encontrar lo que buscas."
        button_label="{{ __('Add your first Purchase') }}"
        button_route="{{ route('purchases.create') }}"
    />
    @else
    <div class="container-xl">
        @livewire('tables.purchase-table')
    @endif
</div>
@endsection
