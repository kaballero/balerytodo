@extends('layouts.tabler')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">
                            {{ __('Crear Marca') }}
                        </h3>
                    </div>
                    <div class="card-actions">
                        <x-action.close route="{{ route('brands.index') }}" />
                    </div>
                </div>
                <form method="POST" action="{{ route('brands.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
							<x-input
                        label="{{ __('Nombre') }}"
                        id="name"
                        name="name"
                        :value="old('name')"
                        required
                    />
						</div>
                    </div>
                    <div class="card-footer text-end">
                        <x-button type="submit">
                            {{ __('Crear') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
