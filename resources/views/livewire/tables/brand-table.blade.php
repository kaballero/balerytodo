<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">
                {{ __('Marcas') }}
            </h3>
        </div>

        <div class="card-actions">
            <x-action.create route="{{ route('brands.create') }}" />
        </div>
    </div>

    <div class="card-body border-bottom py-3">
        <div class="d-flex">            <div class="text-secondary">
                Mostrar
                <div class="mx-2 d-inline-block">
                    <select wire:model.live="perPage" class="form-select form-select-sm" aria-label="result per page">
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="150">150</option>
                            <option value="250">250</option>
                        </select>
                </div>
                registros
            </div>
            <div class="ms-auto text-secondary">
                Buscar:
                <div class="ms-2 d-inline-block">
                    <input type="text" wire:model.live="search" class="form-control form-control-sm"
                        aria-label="Search invoice">
                </div>
            </div>
        </div>
    </div>

    <x-spinner.loading-spinner />

    <div class="table-responsive">
        <table wire:loading.remove class="table table-bordered card-table table-vcenter text-nowrap datatable">
            <thead class="thead-light">
                <tr>
                    <th class="align-middle text-center w-1">
                        {{ __('ID') }}
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('name')" href="#" role="button">
                            {{ __('Nombre') }}
                            @include('inclues._sort-icon', ['field' => 'name'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center d-none d-sm-table-cell">
                        <a wire:click.prevent="sortBy('slug')" href="#" role="button">
                            {{ __('Slug') }}
                            @include('inclues._sort-icon', ['field' => 'slug'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center d-none d-sm-table-cell">
                        <a wire:click.prevent="sortBy('slug')" href="#" role="button">
                            {{ __('No. de Productos') }}
                            @include('inclues._sort-icon', ['field' => 'products'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center d-none d-sm-table-cell">
                        <a wire:click.prevent="sortBy('created_at')" href="#" role="button">
                            {{ __('Fecha') }}
                            @include('inclues._sort-icon', ['field' => 'created_at'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        {{ __('Acciones') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($brands as $brand)
                    <tr>
                        <td class="align-middle text-center" style="width: 10%">
                            {{ $loop->index }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $brand->name }}
                        </td>
                        <td class="align-middle text-center d-none d-sm-table-cell">
                            {{ $brand->slug }}
                        </td>
                        <td class="align-middle text-center d-none d-sm-table-cell">
                            {{ $brand->products->count() }}
                        </td>
                        <td class="align-middle text-center d-none d-sm-table-cell" style="width: 15%">
                            {{ $brand->created_at ? $brand->created_at->format('d-m-Y') : '--' }}
                        </td>
                        <td class="align-middle text-center" style="width: 15%">
                            <x-button.show class="btn-icon" route="{{ route('brands.show', $brand) }}" />
                            <x-button.edit class="btn-icon" route="{{ route('brands.edit', $brand) }}" />
                            <x-button.delete class="btn-icon" route="{{ route('brands.destroy', $brand) }}"
                                onclick="return confirm('Are you sure to remove brand {{ $brand->name }} ?!')" />
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="align-middle text-center" colspan="8">
                            No se encontraron resultados
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer d-flex align-items-center"> <p class="m-0 text-secondary">
                Mostrando <span>{{ $brands->firstItem() }}</span> a <span>{{ $brands->lastItem() }}</span> de <span>{{ $brands->total() }}</span> registros
        </p>

        <ul class="pagination m-0 ms-auto">
            {{ $brands->links() }}
        </ul>
    </div>
</div>