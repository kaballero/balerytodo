@extends('layouts.tabler')

@section('content')
    <div class="page-body">
        @if (!$brands)
            <x-empty title="No encontramos marcas"
                message="Intenta ajustar tu búsqueda e intenta de nuevo."
                button_label="{{ __('Agrega tu primera Marca') }}" button_route="{{ route('brands.create') }}" />
        @else
            
            <div class="container-xl">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <h3 class="mb-1">Éxito</h3>
                        <p>{{ session('success') }}</p>

                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                @endif
                @livewire('tables.brand-table')
            </div>
        @endif
    </div>
@endsection
