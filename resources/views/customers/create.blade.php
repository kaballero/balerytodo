@extends('layouts.tabler')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center mb-3">
            <div class="col">
                <h2 class="page-title">
                    {{ __('Registrar Cliente') }}
                </h2>
            </div>
        </div>

        
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">

            <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{ __('Imagen del Cliente') }}
                                </h3>

                                <img class="img-account-profile rounded-circle mb-2" src="{{ asset('assets/img/demo/user-placeholder.svg') }}" alt="" id="image-preview" />

                                <div class="small font-italic text-muted mb-2">JPG o PNG de no más de 2 MB</div>

                                <input class="form-control @error('photo') is-invalid @enderror" type="file"  id="image" name="photo" accept="image/*" onchange="previewImage();">

                                @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{ __('Detalles del Cliente') }}
                                </h3>

                                <div class="row row-cards">
                                    <div class="col-md-12">
                                        <x-input name="name" :required="true" label="Nombre"/>

                                        <x-input name="email" label="Correo electrónico" :required="true"/>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input label="Teléfono" name="phone" :required="true"/>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <label for="bank_name" class="form-label">
                                            Institución Bancaria
                                        </label>

                                        <select class="form-select form-control-solid @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name">
                                            <option selected="" disabled="">Seleccionar Banco:</option>
                                            <option value="ABC CAPITAL" @if(old('bank_name') == 'ABC CAPITAL') selected="selected" @endif>ABC CAPITAL</option>
											<option value="ACTINVER" @if(old('bank_name') == 'ACTINVER') selected="selected" @endif>ACTINVER</option>
											<option value="AFIRME" @if(old('bank_name') == 'AFIRME') selected="selected" @endif>AFIRME</option>
											<option value="ARCUS" @if(old('bank_name') == 'ARCUS') selected="selected" @endif>ARCUS</option>
											<option value="ASP INTEGRA OPC" @if(old('bank_name') == 'ASP INTEGRA OPC') selected="selected" @endif>ASP INTEGRA OPC</option>
											<option value="AUTOFIN" @if(old('bank_name') == 'AUTOFIN') selected="selected" @endif>AUTOFIN</option>
											<option value="AZTECA" @if(old('bank_name') == 'AZTECA') selected="selected" @endif>AZTECA</option>
											<option value="BaBien" @if(old('bank_name') == 'BaBien') selected="selected" @endif>BaBien</option>
											<option value="BAJIO" @if(old('bank_name') == 'BAJIO') selected="selected" @endif>BAJIO</option>
											<option value="BANAMEX" @if(old('bank_name') == 'BANAMEX') selected="selected" @endif>BANAMEX</option>
											<option value="BANCO COVALTO" @if(old('bank_name') == 'BANCO COVALTO') selected="selected" @endif>BANCO COVALTO</option>
											<option value="BANCOMEXT" @if(old('bank_name') == 'BANCOMEXT') selected="selected" @endif>BANCOMEXT</option>
											<option value="BANCOPPEL" @if(old('bank_name') == 'BANCOPPEL') selected="selected" @endif>BANCOPPEL</option>
											<option value="BANCO S3" @if(old('bank_name') == 'BANCO S3') selected="selected" @endif>BANCO S3</option>
											<option value="BANCREA" @if(old('bank_name') == 'BANCREA') selected="selected" @endif>BANCREA</option>
											<option value="BANJERCITO" @if(old('bank_name') == 'BANJERCITO') selected="selected" @endif>BANJERCITO</option>
											<option value="BANKAOOL" @if(old('bank_name') == 'BANKAOOL') selected="selected" @endif>BANKAOOL</option>
											<option value="BANK OF AMERICA" @if(old('bank_name') == 'BANK OF AMERICA') selected="selected" @endif>BANK OF AMERICA</option>
											<option value="BANK OF CHINA" @if(old('bank_name') == 'BANK OF CHINA') selected="selected" @endif>BANK OF CHINA</option>
											<option value="BANOBRAS" @if(old('bank_name') == 'BANOBRAS') selected="selected" @endif>BANOBRAS</option>
											<option value="BANORTE" @if(old('bank_name') == 'BANORTE') selected="selected" @endif>BANORTE</option>
											<option value="BANREGIO" @if(old('bank_name') == 'BANREGIO') selected="selected" @endif>BANREGIO</option>
											<option value="BANSI" @if(old('bank_name') == 'BANSI') selected="selected" @endif>BANSI</option>
											<option value="BANXICO" @if(old('bank_name') == 'BANXICO') selected="selected" @endif>BANXICO</option>
											<option value="BARCLAYS" @if(old('bank_name') == 'BARCLAYS') selected="selected" @endif>BARCLAYS</option>
											<option value="BBASE" @if(old('bank_name') == 'BBASE') selected="selected" @endif>BBASE</option>
											<option value="BBVA MEXICO" @if(old('bank_name') == 'BBVA MEXICO') selected="selected" @endif>BBVA MEXICO</option>
											<option value="BMONEX" @if(old('bank_name') == 'BMONEX') selected="selected" @endif>BMONEX</option>
											<option value="CAJA POP MEXICA" @if(old('bank_name') == 'CAJA POP MEXICA') selected="selected" @endif>CAJA POP MEXICA</option>
											<option value="CAJA TELEFONIST" @if(old('bank_name') == 'CAJA TELEFONIST') selected="selected" @endif>CAJA TELEFONIST</option>
											<option value="CB INTERCAM" @if(old('bank_name') == 'CB INTERCAM') selected="selected" @endif>CB INTERCAM</option>
											<option value="CBM BANCO" @if(old('bank_name') == 'CBM BANCO') selected="selected" @endif>CBM BANCO</option>
											<option value="CIBANCO" @if(old('bank_name') == 'CIBANCO') selected="selected" @endif>CIBANCO</option>
											<option value="CI BOLSA" @if(old('bank_name') == 'CI BOLSA') selected="selected" @endif>CI BOLSA</option>
											<option value="CLS" @if(old('bank_name') == 'CLS') selected="selected" @endif>CLS</option>
											<option value="CoDi Valida" @if(old('bank_name') == 'CoDi Valida') selected="selected" @endif>CoDi Valida</option>
											<option value="COMPARTAMOS" @if(old('bank_name') == 'COMPARTAMOS') selected="selected" @endif>COMPARTAMOS</option>
											<option value="CONSUBANCO" @if(old('bank_name') == 'CONSUBANCO') selected="selected" @endif>CONSUBANCO</option>
											<option value="CREDICAPITAL" @if(old('bank_name') == 'CREDICAPITAL') selected="selected" @endif>CREDICAPITAL</option>
											<option value="CREDICLUB" @if(old('bank_name') == 'CREDICLUB') selected="selected" @endif>CREDICLUB</option>
											<option value="CRISTOBAL COLON" @if(old('bank_name') == 'CRISTOBAL COLON') selected="selected" @endif>CRISTOBAL COLON</option>
											<option value="Cuenca" @if(old('bank_name') == 'Cuenca') selected="selected" @endif>Cuenca</option>
											<option value="DONDE" @if(old('bank_name') == 'DONDE') selected="selected" @endif>DONDE</option>
											<option value="FINAMEX" @if(old('bank_name') == 'FINAMEX') selected="selected" @endif>FINAMEX</option>
											<option value="FINCOMUN" @if(old('bank_name') == 'FINCOMUN') selected="selected" @endif>FINCOMUN</option>
											<option value="FOMPED" @if(old('bank_name') == 'FOMPED') selected="selected" @endif>FOMPED</option>
											<option value="FONDEADORA" @if(old('bank_name') == 'FONDEADORA') selected="selected" @endif>FONDEADORA</option>
											<option value="FONDO (FIRA)" @if(old('bank_name') == 'FONDO (FIRA)') selected="selected" @endif>FONDO (FIRA)</option>
											<option value="GBM" @if(old('bank_name') == 'GBM') selected="selected" @endif>GBM</option>
											<option value="HIPOTECARIA FED" @if(old('bank_name') == 'HIPOTECARIA FED') selected="selected" @endif>HIPOTECARIA FED</option>
											<option value="HSBC" @if(old('bank_name') == 'HSBC') selected="selected" @endif>HSBC</option>
											<option value="ICBC" @if(old('bank_name') == 'ICBC') selected="selected" @endif>ICBC</option>
											<option value="INBURSA" @if(old('bank_name') == 'INBURSA') selected="selected" @endif>INBURSA</option>
											<option value="INDEVAL" @if(old('bank_name') == 'INDEVAL') selected="selected" @endif>INDEVAL</option>
											<option value="INMOBILIARIO" @if(old('bank_name') == 'INMOBILIARIO') selected="selected" @endif>INMOBILIARIO</option>
											<option value="INTERCAM BANCO" @if(old('bank_name') == 'INTERCAM BANCO') selected="selected" @endif>INTERCAM BANCO</option>
											<option value="INVEX" @if(old('bank_name') == 'INVEX') selected="selected" @endif>INVEX</option>
											<option value="JP MORGAN" @if(old('bank_name') == 'JP MORGAN') selected="selected" @endif>JP MORGAN</option>
											<option value="KLAR" @if(old('bank_name') == 'KLAR') selected="selected" @endif>KLAR</option>
											<option value="KUSPIT" @if(old('bank_name') == 'KUSPIT') selected="selected" @endif>KUSPIT</option>
											<option value="LIBERTAD" @if(old('bank_name') == 'LIBERTAD') selected="selected" @endif>LIBERTAD</option>
											<option value="MASARI" @if(old('bank_name') == 'MASARI') selected="selected" @endif>MASARI</option>
											<option value="Mercado Pago W" @if(old('bank_name') == 'Mercado Pago W') selected="selected" @endif>Mercado Pago W</option>
											<option value="MIFEL" @if(old('bank_name') == 'MIFEL') selected="selected" @endif>MIFEL</option>
											<option value="MIZUHO BANK" @if(old('bank_name') == 'MIZUHO BANK') selected="selected" @endif>MIZUHO BANK</option>
											<option value="MONEXCB" @if(old('bank_name') == 'MONEXCB') selected="selected" @endif>MONEXCB</option>
											<option value="MUFG" @if(old('bank_name') == 'MUFG') selected="selected" @endif>MUFG</option>
											<option value="MULTIVA BANCO" @if(old('bank_name') == 'MULTIVA BANCO') selected="selected" @endif>MULTIVA BANCO</option>
											<option value="NAFIN" @if(old('bank_name') == 'NAFIN') selected="selected" @endif>NAFIN</option>
											<option value="NU MEXICO" @if(old('bank_name') == 'NU MEXICO') selected="selected" @endif>NU MEXICO</option>
											<option value="NVIO" @if(old('bank_name') == 'NVIO') selected="selected" @endif>NVIO</option>
											<option value="PAGATODO" @if(old('bank_name') == 'PAGATODO') selected="selected" @endif>PAGATODO</option>
											<option value="PROFUTURO" @if(old('bank_name') == 'PROFUTURO') selected="selected" @endif>PROFUTURO</option>
											<option value="SABADELL" @if(old('bank_name') == 'SABADELL') selected="selected" @endif>SABADELL</option>
											<option value="SANTANDER" @if(old('bank_name') == 'SANTANDER') selected="selected" @endif>SANTANDER</option>
											<option value="SCOTIABANK" @if(old('bank_name') == 'SCOTIABANK') selected="selected" @endif>SCOTIABANK</option>
											<option value="SHINHAN" @if(old('bank_name') == 'SHINHAN') selected="selected" @endif>SHINHAN</option>
											<option value="STP" @if(old('bank_name') == 'STP') selected="selected" @endif>STP</option>
											<option value="TESORED" @if(old('bank_name') == 'TESORED') selected="selected" @endif>TESORED</option>
											<option value="TRANSFER" @if(old('bank_name') == 'TRANSFER') selected="selected" @endif>TRANSFER</option>
											<option value="UNAGRA" @if(old('bank_name') == 'UNAGRA') selected="selected" @endif>UNAGRA</option>
											<option value="VALMEX" @if(old('bank_name') == 'VALMEX') selected="selected" @endif>VALMEX</option>
											<option value="VALUE" @if(old('bank_name') == 'VALUE') selected="selected" @endif>VALUE</option>
											<option value="VECTOR" @if(old('bank_name') == 'VECTOR') selected="selected" @endif>VECTOR</option>
											<option value="VE POR MAS" @if(old('bank_name') == 'VE POR MAS') selected="selected" @endif>VE POR MAS</option>
											<option value="VOLKSWAGEN" @if(old('bank_name') == 'VOLKSWAGEN') selected="selected" @endif>VOLKSWAGEN</option>

                                        </select>

                                        @error('bank_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>


                                    <div class="col-sm-6 col-md-6">
                                        <x-input label="Titular de la cuenta" name="account_holder" />
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input label="Número de cuenta" name="account_number" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="address" class="form-label required">
                                            Dirección
                                        </label>

                                        <textarea name="address"
                                                  id="address"
                                                  rows="3"
                                                  class="form-control form-control-solid @error('address') is-invalid @enderror"
                                            >{{ old('address') }}</textarea>

                                        @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">
                                    {{ __('Guardar') }}
                                </button>

                                <a class="btn btn-outline-primary" href="{{ route('customers.index') }}">
                                    {{ __('Cancelar') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@pushonce('page-scripts')
    <script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endpushonce
