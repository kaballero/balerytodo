@extends('layouts.tabler')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title">
                                {{ __('Detalles de la cotización') }}
                            </h3>
                        </div>

                        <div class="card-actions btn-actions">
                            <x-action.close route="{{ route('quotations.index') }}" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row row-cards mb-3">
                            <div class="col-3">
                                <label for="date" class="small mb-1">
                                    {{ __('Fecha') }}
                                </label>

                                <input type="text" id="date" class="form-control"
                                    value="{{ $quotation->date->format('d-m-Y') }}" disabled>
                            </div>

                            <div class="col-3">
                                <label for="purchase_no" class="small mb-1">
                                    {{ __('Referencia') }}
                                </label>
                                <input type="text" id="purchase_no" class="form-control"
                                    value="{{ $quotation->reference }}" disabled>
                            </div>

                            <div class="col-3">
                                <label for="supplier" class="small mb-1">
                                    {{ __('Cliente') }}
                                </label>
                                <input type="text" id="supplier" class="form-control"
                                    value="{{ $quotation->customer_name }}" disabled>
                            </div>

                            <div class="col-3">
                                <label for="create_by" class="small mb-1">
                                    {{ __('IVA %') }}
                                </label>
                                <input type="text" id="create_by" class="form-control"
                                    value="{{ $quotation->tax_percentage ?? null }}" disabled>
                            </div>


                            <div class="col-12">
                                <label for="create_by" class="small mb-1">
                                    {{ __('Notas') }}
                                </label>
                                <textarea name="note" id="note" cols="30" rows="2" class="form-control" disabled>{{ $quotation->note }}</textarea>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped align-middle">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="align-middle text-center">No.</th>
                                            <th scope="col" class="align-middle text-center">Imagen</th>
                                            <th scope="col" class="align-middle text-center">Producto</th>
                                            <th scope="col" class="align-middle text-center">Código</th>
                                            <th scope="col" class="align-middle text-center">Stock actual</th>
                                            <th scope="col" class="align-middle text-center">Cantidad</th>
                                            <th scope="col" class="align-middle text-center">Precio</th>
                                            <th scope="col" class="align-middle text-center">Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quotation->quotationDetails as $item)
                                            <tr>
                                                <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                                <td class="align-middle justify-content-center text-center">
                                                    <div style="max-height: 80px; max-width: 80px;">
                                                        <img class="img-fluid"
                                                            src="{{ $item->product->product_image ? asset('storage/' . $item->product->product_image) : asset('assets/img/products/default.webp') }}">
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ $item->product->name }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge bg-indigo-lt">
                                                        {{ $item->product->code }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge bg-primary-lt">
                                                        {{ $item->product->quantity }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge bg-primary-lt">
                                                        {{ $item->quantity }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ number_format($item->unitcost, 2) }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ number_format($item->total, 2) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- created by --}}
                                        <tr>
                                            <td class="align-middle text-end" colspan="7">
                                                Creada por:
                                            </td>
                                            <td class="align-middle text-center">
                                                {{ $quotation->user->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle text-end" colspan="7">
                                                Total
                                            </td>
                                            <td class="align-middle text-center">
                                                {{ number_format($quotation->total_amount, 2) }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="align-middle text-end" colspan="7">
                                                IVA
                                            </td>
                                            <td class="align-middle text-center">
                                                {{ number_format($quotation->tax_amount, 2) }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="align-middle text-end" colspan="7">
                                                Envío
                                            </td>
                                            <td class="align-middle text-center">
                                                {{ number_format($quotation->shipping_amount, 2) }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="align-middle text-end" colspan="7">
                                                Descuento
                                            </td>
                                            <td class="align-middle text-center">
                                                {{ number_format($quotation->discount_amount, 2) }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="align-middle text-end" colspan="7">
                                                Estado
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ($quotation->status->value == 1)
                                                    <span class="badge bg-success-lt">
                                                        Completeda
                                                    </span>
                                                @elseif ($quotation->status->value == 0)
                                                    <span class="badge bg-warning-lt">
                                                        Pendiente
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger-lt">
                                                        Cancelada
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- complete quotation button --}}
                        @if ($quotation->status->value == 0)
                            <div class="col-4 float-right my-4">
                                <form action="{{ route('quotations.update', $quotation->uuid) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle"></i>
                                        Completar Cotización
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
