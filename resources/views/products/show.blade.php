@extends('layouts.tabler')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center mb-3">
                <div class="col">
                    <h2 class="page-title">
                        {{ $product->name }}
                    </h2>
                </div>
            </div>

            
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{ __('Imagen del Producto') }}
                                </h3>

                                <img style="width: 90px;" id="image-preview"
                                    src="{{ $product->product_image ? asset('storage/' . $product->product_image) : asset('assets/img/products/default.webp') }}"
                                    alt="" class="img-account-profile mb-2">
                            </div>
                        </div>
                    </div>
                  
                    

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{ __('Detalles del Producto') }}
                                </h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered card-table table-vcenter text-nowrap datatable">
                                    <tbody>
                                        <tr>
                                            <td>Nombre</td>
                                            <td>{{ $product->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Código</td>
                                            <td>{{ $product->code }}</td>
                                        </tr>
                                        <tr>
                                            <td>Código de Barras</td>
                                            <td>{!! $barcode !!}</td>
                                        </tr>
										  <tr>
                                            <td>País de Origen</td>
                                            <td> {{ $product->country }}</td>
                                        </tr>
										 <tr>
                                            <td>Marca</td>
                                            <td>
                                                <a href="{{ route('brands.show', $product->brand) }}"
                                                    class="badge bg-blue-lt">
                                                    {{ $product->brand->name }}
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Categoría</td>
                                            <td>
                                                <a href="{{ route('categories.show', $product->category) }}"
                                                    class="badge bg-blue-lt">
                                                    {{ $product->category->name }}
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Unidad</td>
                                            <td>
                                                <a href="{{ route('units.show', $product->unit) }}"
                                                    class="badge bg-blue-lt">
                                                    {{ $product->unit->short_code }}
                                                </a>
                                            </td>
                                        </tr>
										

                                        <tr>
                                            <td>Cantidad</td>
                                            <td>{{ $product->quantity }}</td>
                                        </tr>
                                       <tr>
                                            <td>Calidad</td>
                                            <td>{{ $product->quality }}</td>
                                        </tr>
										 <tr>
                                            <td>Caja</td>
                                            <td>{{ $product->box }}</td>
                                        </tr>
										 <tr>
                                            <td>Registro</td>
                                            <td>{{ $product->registry }}</td>
                                        </tr>
										 <tr>
                                            <td>Salida</td>
                                            <td>{{ $product->site }}</td>
                                        </tr>
										 <tr>
                                            <td>Empaque</td>
                                            <td>{{ $product->package }}</td>
                                        </tr>
										<tr>
                                            <td>Piezas por Empaque</td>
                                            <td>{{ $product->pieces }}</td>
                                        </tr>

                                        <tr>
                                            <td>Precio</td>
                                            <td>{{ $product->buying_price }}</td>
                                        </tr>
                                        <tr>
                                            <td>Precio de Venta</td>
                                            <td>{{ $product->selling_price }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td>{{ __('Notas') }}</td>
                                            <td>{{ $product->notes }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer text-end">
                                <a class="btn btn-info" href="{{ url()->previous() }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l14 0" />
                                        <path d="M5 12l6 6" />
                                        <path d="M5 12l6 -6" />
                                    </svg>
                                    {{ __('Regrsar') }}
                                </a>
                                <a class="btn btn-info" href="{{ route('products.edit', $product->uuid) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                        <path d="M13.5 6.5l4 4" />
                                    </svg>
                                    {{ __('Editar') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
