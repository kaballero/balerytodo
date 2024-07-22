<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">
                {{ __('Cotizaciones') }}
            </h3>
        </div>

        <div class="card-actions">
            <x-action.create route="{{ route('quotations.create') }}" />
        </div>
    </div>

    <div class="card-body border-bottom py-3">
        <div class="d-flex">
            <div class="text-secondary">
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
                    <input type="text" wire:model.live="search" class="form-control form-control-sm" aria-label="Search invoice">
                </div>
            </div>
        </div>
    </div>

    <x-spinner.loading-spinner/>

    <div class="table-responsive">
        <table wire:loading.remove class="table table-bordered card-table table-vcenter text-nowrap datatable">
            <thead class="thead-light">
            <tr>
                <th class="align-middle text-center w-1">
                    {{ __('ID') }}
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('reference')" href="#" role="button">
                        {{ __('Cotización No.') }}
                        @include('inclues._sort-icon', ['field' => 'reference'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('date')" href="#" role="button">
                        {{ __('Fecha') }}
                        @include('inclues._sort-icon', ['field' => 'date'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('customer_name')" href="#" role="button">
                        {{ __('Cliente') }}
                        @include('inclues._sort-icon', ['field' => 'customer_name'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('total_amount')" href="#" role="button">
                        {{ __('Total') }}
                        @include('inclues._sort-icon', ['field' => 'total_amount'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('status')" href="#" role="button">
                        {{ __('Estado') }}
                        @include('inclues._sort-icon', ['field' => 'status'])
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    {{ __('Acciones') }}
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse ($quotations as $quotation)
                <tr>
                    <td class="align-middle text-center">
                        {{ $quotation->id }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $quotation->reference }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $quotation->date->format('d-m-Y') }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $quotation->customer->name }}
                    </td>
                    <td class="align-middle text-center">
                        {{ Number::currency($quotation->total_amount, 'MXN') }}
                    </td>
                    <td class="align-middle text-center">
                        {{-- <span class="badge {{ $quotation->status === \App\Enums\QuotationStatus::PENDING ? 'bg-orange' : 'bg-green' }} text-white text-uppercase"> --}}
                        <span class="badge {{ $quotation->status === \App\Enums\QuotationStatus::PENDING ? 'bg-orange' : ($quotation->status === \App\Enums\QuotationStatus::SENT ? 'bg-green' : 'bg-black') }} text-white text-uppercase">
                            {{ $quotation->status->label() }}
                        </span>
                    </td>
                    <td class="align-middle text-center">
                        <x-button.show class="btn-icon" route="{{ route('quotations.show', $quotation->uuid) }}"/>
                        @if ($quotation->status === \App\Enums\QuotationStatus::PENDING)
                            {{-- <x-button.edit class="btn-icon" route="{{ route('quotations.edit', $quotation->uuid) }}"/> --}}
                            <x-button.complete class="btn-icon" route="{{ route('quotations.update', $quotation->uuid) }}" onclick="return confirm('¿Deseas completar la cotización {{ $quotation->reference }}?')"/>
                            <x-button.delete class="btn-icon" route="{{ route('quotations.destroy', $quotation) }}" onclick="return confirm('¿Deseas eliminar la cotización {{ $quotation->reference }}?')"/>
                        @endif
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
                Mostrando <span>{{ $quotations->firstItem() }}</span> a <span>{{ $quotations->lastItem() }}</span> de <span>{{ $quotations->total() }}</span> registros
        </p>

        <ul class="pagination m-0 ms-auto">
            {{ $quotations->links() }}
        </ul>
    </div>
</div>

