@extends('layouts.tabler')

@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <div>
                    <h3 class="card-title">
                        {{ __('Editar Marca') }}
                    </h3>
                </div>

                <div class="card-actions">
                    <x-action.close route="{{ route('brands.index') }}" />
                </div>
            </div>
            <form action="{{ route('brands.update', $brand->slug) }}" method="POST">
                @csrf
                @method('put')
                <div class="card-body">
                    <x-input
                        label="{{ __('Nombre') }}"
                        id="name"
                        name="name"
                        :value="old('name', $brand->name)"
                        required
                    />
                </div>
                <div class="card-footer text-end">
                    <x-button type="submit">
                        {{ __('Actualizar') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@pushonce('page-scripts')
<script>
    // Slug Generator
    const title = document.querySelector("#name");
    const slug = document.querySelector("#slug");
    title.addEventListener("keyup", function() {
        let preslug = title.value;
        preslug = preslug.replace(/ /g,"-");
        slug.value = preslug.toLowerCase();
    });
</script>
@endpushonce
