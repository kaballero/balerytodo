@extends('layouts.tabler')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center mb-3">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Editar Producto') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">

                <form action="{{ route('products.update', $product->uuid) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">
                                        {{ __('Imagen del Producto') }}
                                    </h3>

                                    <img class="img-account-profile mb-2"
                                        src="{{ $product->product_image ? asset('storage/' . $product->product_image) : asset('assets/img/products/default.webp') }}"
                                        alt="" id="image-preview">

                                    <div class="small font-italic text-muted mb-2">
                                        JPG o PNG no mayor a 2 MB
                                    </div>

                                    <input type="file" accept="image/*" id="image" name="product_image"
                                        class="form-control @error('product_image') is-invalid @enderror"
                                        onchange="previewImage();">

                                    @error('product_image')
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
                                        {{ __('Detalles del Producto') }}
                                    </h3>

                                    <div class="row row-cards">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">
                                                    {{ __('Nombre') }}
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <input type="text" id="name" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Product name" value="{{ old('name', $product->name) }}">

                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
										
										<div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label for="country" class="form-label">
                                                País de origen
                                                <span class="text-danger">*</span>
                                            </label>

                                            
                                                <select name="country" id="country"
                                                        class="form-select @error('country') is-invalid @enderror"
                                                >
                                                 
                                                   <option value="AF" @if(old('country', $product->country) == "AF") selected="selected" @endif>(AF) Afganistán</option>
													<option value="AL" @if(old('country', $product->country) == "AL") selected="selected" @endif>(AL) Albania</option>
													<option value="DZ" @if(old('country', $product->country) == "DZ") selected="selected" @endif>(DZ) Argelia</option>
													<option value="AS" @if(old('country', $product->country) == "AS") selected="selected" @endif>(AS) Samoa Americana</option>
													<option value="AD" @if(old('country', $product->country) == "AD") selected="selected" @endif>(AD) Andorra</option>
													<option value="AO" @if(old('country', $product->country) == "AO") selected="selected" @endif>(AO) Angola</option>
													<option value="AI" @if(old('country', $product->country) == "AI") selected="selected" @endif>(AI) Anguila</option>
													<option value="AQ" @if(old('country', $product->country) == "AQ") selected="selected" @endif>(AQ) Antártida</option>
													<option value="AG" @if(old('country', $product->country) == "AG") selected="selected" @endif>(AG) Antigua y Barbuda</option>
													<option value="AR" @if(old('country', $product->country) == "AR") selected="selected" @endif>(AR) Argentina</option>
													<option value="AM" @if(old('country', $product->country) == "AM") selected="selected" @endif>(AM) Armenia</option>
													<option value="AW" @if(old('country', $product->country) == "AW") selected="selected" @endif>(AW) Aruba</option>
													<option value="AU" @if(old('country', $product->country) == "AU") selected="selected" @endif>(AU) Australia</option>
													<option value="AT" @if(old('country', $product->country) == "AT") selected="selected" @endif>(AT) Austria</option>
													<option value="AZ" @if(old('country', $product->country) == "AZ") selected="selected" @endif>(AZ) Azerbaiyán</option>
													<option value="BS" @if(old('country', $product->country) == "BS") selected="selected" @endif>(BS) Bahamas</option>
													<option value="BH" @if(old('country', $product->country) == "BH") selected="selected" @endif>(BH) Baréin</option>
													<option value="BD" @if(old('country', $product->country) == "BD") selected="selected" @endif>(BD) Bangladesh</option>
													<option value="BB" @if(old('country', $product->country) == "BB") selected="selected" @endif>(BB) Barbados</option>
													<option value="BY" @if(old('country', $product->country) == "BY") selected="selected" @endif>(BY) Bielorrusia</option>
													<option value="BE" @if(old('country', $product->country) == "BE") selected="selected" @endif>(BE) Bélgica</option>
													<option value="BZ" @if(old('country', $product->country) == "BZ") selected="selected" @endif>(BZ) Belice</option>
													<option value="BJ" @if(old('country', $product->country) == "BJ") selected="selected" @endif>(BJ) Benín</option>
													<option value="BM" @if(old('country', $product->country) == "BM") selected="selected" @endif>(BM) Bermudas</option>
													<option value="BT" @if(old('country', $product->country) == "BT") selected="selected" @endif>(BT) Bután</option>
													<option value="BO" @if(old('country', $product->country) == "BO") selected="selected" @endif>(BO) Bolivia</option>
													<option value="BA" @if(old('country', $product->country) == "BA") selected="selected" @endif>(BA) Bosnia y Herzegovina</option>
													<option value="BW" @if(old('country', $product->country) == "BW") selected="selected" @endif>(BW) Botsuana</option>
													<option value="BV" @if(old('country', $product->country) == "BV") selected="selected" @endif>(BV) Isla Bouvet</option>
													<option value="BR" @if(old('country', $product->country) == "BR") selected="selected" @endif>(BR) Brasil</option>
													<option value="IO" @if(old('country', $product->country) == "IO") selected="selected" @endif>(IO) Territorio Británico del Océano Índico</option>
													<option value="BN" @if(old('country', $product->country) == "BN") selected="selected" @endif>(BN) Brunéi</option>
													<option value="BG" @if(old('country', $product->country) == "BG") selected="selected" @endif>(BG) Bulgaria</option>
													<option value="BF" @if(old('country', $product->country) == "BF") selected="selected" @endif>(BF) Burkina Faso</option>
													<option value="BI" @if(old('country', $product->country) == "BI") selected="selected" @endif>(BI) Burundi</option>
													<option value="CV" @if(old('country', $product->country) == "CV") selected="selected" @endif>(CV) Cabo Verde</option>
													<option value="KH" @if(old('country', $product->country) == "KH") selected="selected" @endif>(KH) Camboya</option>
													<option value="CM" @if(old('country', $product->country) == "CM") selected="selected" @endif>(CM) Camerún</option>
													<option value="CA" @if(old('country', $product->country) == "CA") selected="selected" @endif>(CA) Canadá</option>
													<option value="KY" @if(old('country', $product->country) == "KY") selected="selected" @endif>(KY) Islas Caimán</option>
													<option value="CF" @if(old('country', $product->country) == "CF") selected="selected" @endif>(CF) República Centroafricana</option>
													<option value="TD" @if(old('country', $product->country) == "TD") selected="selected" @endif>(TD) Chad</option>
													<option value="CL" @if(old('country', $product->country) == "CL") selected="selected" @endif>(CL) Chile</option>
													<option value="CN" @if(old('country', $product->country) == "CN") selected="selected" @endif>(CN) China</option>
													<option value="CX" @if(old('country', $product->country) == "CX") selected="selected" @endif>(CX) Isla de Navidad</option>
													<option value="CC" @if(old('country', $product->country) == "CC") selected="selected" @endif>(CC) Islas Cocos</option>
													<option value="CO" @if(old('country', $product->country) == "CO") selected="selected" @endif>(CO) Colombia</option>
													<option value="KM" @if(old('country', $product->country) == "KM") selected="selected" @endif>(KM) Comoras</option>
													<option value="CG" @if(old('country', $product->country) == "CG") selected="selected" @endif>(CG) República del Congo</option>
													<option value="CD" @if(old('country', $product->country) == "CD") selected="selected" @endif>(CD) República Democrática del Congo</option>
													<option value="CK" @if(old('country', $product->country) == "CK") selected="selected" @endif>(CK) Islas Cook</option>
													<option value="CR" @if(old('country', $product->country) == "CR") selected="selected" @endif>(CR) Costa Rica</option>
													<option value="HR" @if(old('country', $product->country) == "HR") selected="selected" @endif>(HR) Croacia</option>
													<option value="CU" @if(old('country', $product->country) == "CU") selected="selected" @endif>(CU) Cuba</option>
													<option value="CY" @if(old('country', $product->country) == "CY") selected="selected" @endif>(CY) Chipre</option>
													<option value="CZ" @if(old('country', $product->country) == "CZ") selected="selected" @endif>(CZ) República Checa</option>
													<option value="DK" @if(old('country', $product->country) == "DK") selected="selected" @endif>(DK) Dinamarca</option>
													<option value="DJ" @if(old('country', $product->country) == "DJ") selected="selected" @endif>(DJ) Yibuti</option>
													<option value="DM" @if(old('country', $product->country) == "DM") selected="selected" @endif>(DM) Dominica</option>
													<option value="DO" @if(old('country', $product->country) == "DO") selected="selected" @endif>(DO) República Dominicana</option>
													<option value="EC" @if(old('country', $product->country) == "EC") selected="selected" @endif>(EC) Ecuador</option>
													<option value="EG" @if(old('country', $product->country) == "EG") selected="selected" @endif>(EG) Egipto</option>
													<option value="SV" @if(old('country', $product->country) == "SV") selected="selected" @endif>(SV) El Salvador</option>
													<option value="GQ" @if(old('country', $product->country) == "GQ") selected="selected" @endif>(GQ) Guinea Ecuatorial</option>
													<option value="ER" @if(old('country', $product->country) == "ER") selected="selected" @endif>(ER) Eritrea</option>
													<option value="EE" @if(old('country', $product->country) == "EE") selected="selected" @endif>(EE) Estonia</option>
													<option value="ET" @if(old('country', $product->country) == "ET") selected="selected" @endif>(ET) Etiopía</option>
													<option value="FK" @if(old('country', $product->country) == "FK") selected="selected" @endif>(FK) Islas Malvinas</option>
													<option value="FO" @if(old('country', $product->country) == "FO") selected="selected" @endif>(FO) Islas Feroe</option>
													<option value="FJ" @if(old('country', $product->country) == "FJ") selected="selected" @endif>(FJ) Fiyi</option>
													<option value="FI" @if(old('country', $product->country) == "FI") selected="selected" @endif>(FI) Finlandia</option>
													<option value="FR" @if(old('country', $product->country) == "FR") selected="selected" @endif>(FR) Francia</option>
													<option value="GF" @if(old('country', $product->country) == "GF") selected="selected" @endif>(GF) Guayana Francesa</option>
													<option value="PF" @if(old('country', $product->country) == "PF") selected="selected" @endif>(PF) Polinesia Francesa</option>
													<option value="TF" @if(old('country', $product->country) == "TF") selected="selected" @endif>(TF) Territorios Australes Franceses</option>
													<option value="GA" @if(old('country', $product->country) == "GA") selected="selected" @endif>(GA) Gabón</option>
													<option value="GM" @if(old('country', $product->country) == "GM") selected="selected" @endif>(GM) Gambia</option>
													<option value="GE" @if(old('country', $product->country) == "GE") selected="selected" @endif>(GE) Georgia</option>
													<option value="DE" @if(old('country', $product->country) == "DE") selected="selected" @endif>(DE) Alemania</option>
													<option value="GH" @if(old('country', $product->country) == "GH") selected="selected" @endif>(GH) Ghana</option>
													<option value="GI" @if(old('country', $product->country) == "GI") selected="selected" @endif>(GI) Gibraltar</option>
													<option value="GR" @if(old('country', $product->country) == "GR") selected="selected" @endif>(GR) Grecia</option>
													<option value="GL" @if(old('country', $product->country) == "GL") selected="selected" @endif>(GL) Groenlandia</option>
													<option value="GD" @if(old('country', $product->country) == "GD") selected="selected" @endif>(GD) Granada</option>
													<option value="GP" @if(old('country', $product->country) == "GP") selected="selected" @endif>(GP) Guadalupe</option>
													<option value="GU" @if(old('country', $product->country) == "GU") selected="selected" @endif>(GU) Guam</option>
													<option value="GT" @if(old('country', $product->country) == "GT") selected="selected" @endif>(GT) Guatemala</option>
													<option value="GG" @if(old('country', $product->country) == "GG") selected="selected" @endif>(GG) Guernsey</option>
													<option value="GN" @if(old('country', $product->country) == "GN") selected="selected" @endif>(GN) Guinea</option>
													<option value="GW" @if(old('country', $product->country) == "GW") selected="selected" @endif>(GW) Guinea-Bisáu</option>
													<option value="GY" @if(old('country', $product->country) == "GY") selected="selected" @endif>(GY) Guyana</option>
													<option value="HT" @if(old('country', $product->country) == "HT") selected="selected" @endif>(HT) Haití</option>
													<option value="HM" @if(old('country', $product->country) == "HM") selected="selected" @endif>(HM) Islas Heard y McDonald</option>
													<option value="VA" @if(old('country', $product->country) == "VA") selected="selected" @endif>(VA) Ciudad del Vaticano</option>
													<option value="HN" @if(old('country', $product->country) == "HN") selected="selected" @endif>(HN) Honduras</option>
													<option value="HK" @if(old('country', $product->country) == "HK") selected="selected" @endif>(HK) Hong Kong</option>
													<option value="HU" @if(old('country', $product->country) == "HU") selected="selected" @endif>(HU) Hungría</option>
													<option value="IS" @if(old('country', $product->country) == "IS") selected="selected" @endif>(IS) Islandia</option>
													<option value="IN" @if(old('country', $product->country) == "IN") selected="selected" @endif>(IN) India</option>
													<option value="ID" @if(old('country', $product->country) == "ID") selected="selected" @endif>(ID) Indonesia</option>
													<option value="IR" @if(old('country', $product->country) == "IR") selected="selected" @endif>(IR) Irán</option>
													<option value="IQ" @if(old('country', $product->country) == "IQ") selected="selected" @endif>(IQ) Irak</option>
													<option value="IE" @if(old('country', $product->country) == "IE") selected="selected" @endif>(IE) Irlanda</option>
													<option value="IM" @if(old('country', $product->country) == "IM") selected="selected" @endif>(IM) Isla de Man</option>
													<option value="IL" @if(old('country', $product->country) == "IL") selected="selected" @endif>(IL) Israel</option>
													<option value="IT" @if(old('country', $product->country) == "IT") selected="selected" @endif>(IT) Italia</option>
													<option value="JM" @if(old('country', $product->country) == "JM") selected="selected" @endif>(JM) Jamaica</option>
													<option value="JP" @if(old('country', $product->country) == "JP") selected="selected" @endif>(JP) Japón</option>
													<option value="JE" @if(old('country', $product->country) == "JE") selected="selected" @endif>(JE) Jersey</option>
													<option value="JO" @if(old('country', $product->country) == "JO") selected="selected" @endif>(JO) Jordania</option>
													<option value="KZ" @if(old('country', $product->country) == "KZ") selected="selected" @endif>(KZ) Kazajistán</option>
													<option value="KE" @if(old('country', $product->country) == "KE") selected="selected" @endif>(KE) Kenia</option>
													<option value="KI" @if(old('country', $product->country) == "KI") selected="selected" @endif>(KI) Kiribati</option>
													<option value="KP" @if(old('country', $product->country) == "KP") selected="selected" @endif>(KP) Corea del Norte</option>
													<option value="KR" @if(old('country', $product->country) == "KR") selected="selected" @endif>(KR) Corea del Sur</option>
													<option value="KW" @if(old('country', $product->country) == "KW") selected="selected" @endif>(KW) Kuwait</option>
													<option value="KG" @if(old('country', $product->country) == "KG") selected="selected" @endif>(KG) Kirguistán</option>
													<option value="LA" @if(old('country', $product->country) == "LA") selected="selected" @endif>(LA) Laos</option>
													<option value="LV" @if(old('country', $product->country) == "LV") selected="selected" @endif>(LV) Letonia</option>
													<option value="LB" @if(old('country', $product->country) == "LB") selected="selected" @endif>(LB) Líbano</option>
													<option value="LS" @if(old('country', $product->country) == "LS") selected="selected" @endif>(LS) Lesoto</option>
													<option value="LR" @if(old('country', $product->country) == "LR") selected="selected" @endif>(LR) Liberia</option>
													<option value="LY" @if(old('country', $product->country) == "LY") selected="selected" @endif>(LY) Libia</option>
													<option value="LI" @if(old('country', $product->country) == "LI") selected="selected" @endif>(LI) Liechtenstein</option>
													<option value="LT" @if(old('country', $product->country) == "LT") selected="selected" @endif>(LT) Lituania</option>
													<option value="LU" @if(old('country', $product->country) == "LU") selected="selected" @endif>(LU) Luxemburgo</option>
													<option value="MO" @if(old('country', $product->country) == "MO") selected="selected" @endif>(MO) Macao</option>
													<option value="MK" @if(old('country', $product->country) == "MK") selected="selected" @endif>(MK) Macedonia</option>
													<option value="MG" @if(old('country', $product->country) == "MG") selected="selected" @endif>(MG) Madagascar</option>
													<option value="MW" @if(old('country', $product->country) == "MW") selected="selected" @endif>(MW) Malaui</option>
													<option value="MY" @if(old('country', $product->country) == "MY") selected="selected" @endif>(MY) Malasia</option>
													<option value="MV" @if(old('country', $product->country) == "MV") selected="selected" @endif>(MV) Maldivas</option>
													<option value="ML" @if(old('country', $product->country) == "ML") selected="selected" @endif>(ML) Malí</option>
													<option value="MT" @if(old('country', $product->country) == "MT") selected="selected" @endif>(MT) Malta</option>
													<option value="MH" @if(old('country', $product->country) == "MH") selected="selected" @endif>(MH) Islas Marshall</option>
													<option value="MQ" @if(old('country', $product->country) == "MQ") selected="selected" @endif>(MQ) Martinica</option>
													<option value="MR" @if(old('country', $product->country) == "MR") selected="selected" @endif>(MR) Mauritania</option>
													<option value="MU" @if(old('country', $product->country) == "MU") selected="selected" @endif>(MU) Mauricio</option>
													<option value="YT" @if(old('country', $product->country) == "YT") selected="selected" @endif>(YT) Mayotte</option>
													<option value="MX" @if(old('country', $product->country) == "MX") selected="selected" @endif>(MX) México</option>
													<option value="FM" @if(old('country', $product->country) == "FM") selected="selected" @endif>(FM) Micronesia</option>
													<option value="MD" @if(old('country', $product->country) == "MD") selected="selected" @endif>(MD) Moldavia</option>
													<option value="MC" @if(old('country', $product->country) == "MC") selected="selected" @endif>(MC) Mónaco</option>
													<option value="MN" @if(old('country', $product->country) == "MN") selected="selected" @endif>(MN) Mongolia</option>
													<option value="ME" @if(old('country', $product->country) == "ME") selected="selected" @endif>(ME) Montenegro</option>
													<option value="MS" @if(old('country', $product->country) == "MS") selected="selected" @endif>(MS) Montserrat</option>
													<option value="MA" @if(old('country', $product->country) == "MA") selected="selected" @endif>(MA) Marruecos</option>
													<option value="MZ" @if(old('country', $product->country) == "MZ") selected="selected" @endif>(MZ) Mozambique</option>
													<option value="MM" @if(old('country', $product->country) == "MM") selected="selected" @endif>(MM) Birmania</option>
													<option value="NA" @if(old('country', $product->country) == "NA") selected="selected" @endif>(NA) Namibia</option>
													<option value="NR" @if(old('country', $product->country) == "NR") selected="selected" @endif>(NR) Nauru</option>
													<option value="NP" @if(old('country', $product->country) == "NP") selected="selected" @endif>(NP) Nepal</option>
													<option value="NL" @if(old('country', $product->country) == "NL") selected="selected" @endif>(NL) Países Bajos</option>
													<option value="AN" @if(old('country', $product->country) == "AN") selected="selected" @endif>(AN) Antillas Neerlandesas</option>
													<option value="NC" @if(old('country', $product->country) == "NC") selected="selected" @endif>(NC) Nueva Caledonia</option>
													<option value="NZ" @if(old('country', $product->country) == "NZ") selected="selected" @endif>(NZ) Nueva Zelanda</option>
													<option value="NI" @if(old('country', $product->country) == "NI") selected="selected" @endif>(NI) Nicaragua</option>
													<option value="NE" @if(old('country', $product->country) == "NE") selected="selected" @endif>(NE) Níger</option>
													<option value="NG" @if(old('country', $product->country) == "NG") selected="selected" @endif>(NG) Nigeria</option>
													<option value="NU" @if(old('country', $product->country) == "NU") selected="selected" @endif>(NU) Niue</option>
													<option value="NF" @if(old('country', $product->country) == "NF") selected="selected" @endif>(NF) Isla Norfolk</option>
													<option value="MP" @if(old('country', $product->country) == "MP") selected="selected" @endif>(MP) Islas Marianas del Norte</option>
													<option value="NO" @if(old('country', $product->country) == "NO") selected="selected" @endif>(NO) Noruega</option>
													<option value="OM" @if(old('country', $product->country) == "OM") selected="selected" @endif>(OM) Omán</option>
													<option value="PK" @if(old('country', $product->country) == "PK") selected="selected" @endif>(PK) Pakistán</option>
													<option value="PW" @if(old('country', $product->country) == "PW") selected="selected" @endif>(PW) Palaos</option>
													<option value="PS" @if(old('country', $product->country) == "PS") selected="selected" @endif>(PS) Palestina</option>
													<option value="PA" @if(old('country', $product->country) == "PA") selected="selected" @endif>(PA) Panamá</option>
													<option value="PG" @if(old('country', $product->country) == "PG") selected="selected" @endif>(PG) Papúa Nueva Guinea</option>
													<option value="PY" @if(old('country', $product->country) == "PY") selected="selected" @endif>(PY) Paraguay</option>
													<option value="PE" @if(old('country', $product->country) == "PE") selected="selected" @endif>(PE) Perú</option>
													<option value="PH" @if(old('country', $product->country) == "PH") selected="selected" @endif>(PH) Filipinas</option>
													<option value="PN" @if(old('country', $product->country) == "PN") selected="selected" @endif>(PN) Islas Pitcairn</option>
													<option value="PL" @if(old('country', $product->country) == "PL") selected="selected" @endif>(PL) Polonia</option>
													<option value="PT" @if(old('country', $product->country) == "PT") selected="selected" @endif>(PT) Portugal</option>
													<option value="PR" @if(old('country', $product->country) == "PR") selected="selected" @endif>(PR) Puerto Rico</option>
													<option value="QA" @if(old('country', $product->country) == "QA") selected="selected" @endif>(QA) Catar</option>
													<option value="RE" @if(old('country', $product->country) == "RE") selected="selected" @endif>(RE) Reunión</option>
													<option value="RO" @if(old('country', $product->country) == "RO") selected="selected" @endif>(RO) Rumanía</option>
													<option value="RU" @if(old('country', $product->country) == "RU") selected="selected" @endif>(RU) Rusia</option>
													<option value="RW" @if(old('country', $product->country) == "RW") selected="selected" @endif>(RW) Ruanda</option>
													<option value="SH" @if(old('country', $product->country) == "SH") selected="selected" @endif>(SH) Santa Elena</option>
													<option value="KN" @if(old('country', $product->country) == "KN") selected="selected" @endif>(KN) San Cristóbal y Nieves</option>
													<option value="LC" @if(old('country', $product->country) == "LC") selected="selected" @endif>(LC) Santa Lucía</option>
													<option value="PM" @if(old('country', $product->country) == "PM") selected="selected" @endif>(PM) San Pedro y Miquelón</option>
													<option value="VC" @if(old('country', $product->country) == "VC") selected="selected" @endif>(VC) San Vicente y las Granadinas</option>
													<option value="WS" @if(old('country', $product->country) == "WS") selected="selected" @endif>(WS) Samoa</option>
													<option value="SM" @if(old('country', $product->country) == "SM") selected="selected" @endif>(SM) San Marino</option>
													<option value="ST" @if(old('country', $product->country) == "ST") selected="selected" @endif>(ST) Santo Tomé y Príncipe</option>
													<option value="SA" @if(old('country', $product->country) == "SA") selected="selected" @endif>(SA) Arabia Saudita</option>
													<option value="SN" @if(old('country', $product->country) == "SN") selected="selected" @endif>(SN) Senegal</option>
													<option value="RS" @if(old('country', $product->country) == "RS") selected="selected" @endif>(RS) Serbia</option>
													<option value="SC" @if(old('country', $product->country) == "SC") selected="selected" @endif>(SC) Seychelles</option>
													<option value="SL" @if(old('country', $product->country) == "SL") selected="selected" @endif>(SL) Sierra Leona</option>
													<option value="SG" @if(old('country', $product->country) == "SG") selected="selected" @endif>(SG) Singapur</option>
													<option value="SK" @if(old('country', $product->country) == "SK") selected="selected" @endif>(SK) Eslovaquia</option>
													<option value="SI" @if(old('country', $product->country) == "SI") selected="selected" @endif>(SI) Eslovenia</option>
													<option value="SB" @if(old('country', $product->country) == "SB") selected="selected" @endif>(SB) Islas Salomón</option>
													<option value="SO" @if(old('country', $product->country) == "SO") selected="selected" @endif>(SO) Somalia</option>
													<option value="ZA" @if(old('country', $product->country) == "ZA") selected="selected" @endif>(ZA) Sudáfrica</option>
													<option value="GS" @if(old('country', $product->country) == "GS") selected="selected" @endif>(GS) Islas Georgias del Sur y Sandwich del Sur</option>
													<option value="ES" @if(old('country', $product->country) == "ES") selected="selected" @endif>(ES) España</option>
													<option value="LK" @if(old('country', $product->country) == "LK") selected="selected" @endif>(LK) Sri Lanka</option>
													<option value="SD" @if(old('country', $product->country) == "SD") selected="selected" @endif>(SD) Sudán</option>
													<option value="SR" @if(old('country', $product->country) == "SR") selected="selected" @endif>(SR) Surinam</option>
													<option value="SJ" @if(old('country', $product->country) == "SJ") selected="selected" @endif>(SJ) Svalbard y Jan Mayen</option>
													<option value="SZ" @if(old('country', $product->country) == "SZ") selected="selected" @endif>(SZ) Suazilandia</option>
													<option value="SE" @if(old('country', $product->country) == "SE") selected="selected" @endif>(SE) Suecia</option>
													<option value="CH" @if(old('country', $product->country) == "CH") selected="selected" @endif>(CH) Suiza</option>
													<option value="SY" @if(old('country', $product->country) == "SY") selected="selected" @endif>(SY) Siria</option>
													<option value="TW" @if(old('country', $product->country) == "TW") selected="selected" @endif>(TW) Taiwán</option>
													<option value="TJ" @if(old('country', $product->country) == "TJ") selected="selected" @endif>(TJ) Tayikistán</option>
													<option value="TZ" @if(old('country', $product->country) == "TZ") selected="selected" @endif>(TZ) Tanzania</option>
													<option value="TH" @if(old('country', $product->country) == "TH") selected="selected" @endif>(TH) Tailandia</option>
													<option value="TL" @if(old('country', $product->country) == "TL") selected="selected" @endif>(TL) Timor-Leste</option>
													<option value="TG" @if(old('country', $product->country) == "TG") selected="selected" @endif>(TG) Togo</option>
													<option value="TK" @if(old('country', $product->country) == "TK") selected="selected" @endif>(TK) Tokelau</option>
													<option value="TO" @if(old('country', $product->country) == "TO") selected="selected" @endif>(TO) Tonga</option>
													<option value="TT" @if(old('country', $product->country) == "TT") selected="selected" @endif>(TT) Trinidad y Tobago</option>
													<option value="TN" @if(old('country', $product->country) == "TN") selected="selected" @endif>(TN) Túnez</option>
													<option value="TR" @if(old('country', $product->country) == "TR") selected="selected" @endif>(TR) Turquía</option>
													<option value="TM" @if(old('country', $product->country) == "TM") selected="selected" @endif>(TM) Turkmenistán</option>
													<option value="TC" @if(old('country', $product->country) == "TC") selected="selected" @endif>(TC) Islas Turcas y Caicos</option>
													<option value="TV" @if(old('country', $product->country) == "TV") selected="selected" @endif>(TV) Tuvalu</option>
													<option value="UG" @if(old('country', $product->country) == "UG") selected="selected" @endif>(UG) Uganda</option>
													<option value="UA" @if(old('country', $product->country) == "UA") selected="selected" @endif>(UA) Ucrania</option>
													<option value="AE" @if(old('country', $product->country) == "AE") selected="selected" @endif>(AE) Emiratos Árabes Unidos</option>
													<option value="GB" @if(old('country', $product->country) == "GB") selected="selected" @endif>(GB) Reino Unido</option>
													<option value="US" @if(old('country', $product->country) == "US") selected="selected" @endif>(US) Estados Unidos</option>
													<option value="UM" @if(old('country', $product->country) == "UM") selected="selected" @endif>(UM) Islas Ultramarinas Menores de Estados Unidos</option>
													<option value="UY" @if(old('country', $product->country) == "UY") selected="selected" @endif>(UY) Uruguay</option>
													<option value="UZ" @if(old('country', $product->country) == "UZ") selected="selected" @endif>(UZ) Uzbekistán</option>
													<option value="VU" @if(old('country', $product->country) == "VU") selected="selected" @endif>(VU) Vanuatu</option>
													<option value="VE" @if(old('country', $product->country) == "VE") selected="selected" @endif>(VE) Venezuela</option>
													<option value="VN" @if(old('country', $product->country) == "VN") selected="selected" @endif>(VN) Vietnam</option>
													<option value="VG" @if(old('country', $product->country) == "VG") selected="selected" @endif>(VG) Islas Vírgenes Británicas</option>
													<option value="VI" @if(old('country', $product->country) == "VI") selected="selected" @endif>(VI) Islas Vírgenes de Estados Unidos</option>
													<option value="WF" @if(old('country', $product->country) == "WF") selected="selected" @endif>(WF) Wallis y Futuna</option>
													<option value="EH" @if(old('country', $product->country) == "EH") selected="selected" @endif>(EH) Sahara Occidental</option>
													<option value="YE" @if(old('country', $product->country) == "YE") selected="selected" @endif>(YE) Yemen</option>
													<option value="ZM" @if(old('country', $product->country) == "ZM") selected="selected" @endif>(ZM) Zambia</option>
													<option value="ZW" @if(old('country', $product->country) == "ZW") selected="selected" @endif>(ZW) Zimbabue</option>
                                                   
                                                </select>
                                           

                                            @error('country')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
									
									<div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label for="brand_id" class="form-label">
                                               Marca del Producto
                                                <span class="text-danger">*</span>
                                            </label>

                                            @if ($brands->count() === 1)
                                                <select name="brand_id" id="brand_id"
                                                        class="form-select @error('brand_id') is-invalid @enderror"
                                                        readonly
                                                >
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}" selected>
                                                            {{ $brand->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select name="brand_id" id="brand_id"
                                                        class="form-select @error('brand_id') is-invalid @enderror"
                                                >


                                                    @foreach ($brands as $brand)
													    
													
                                                        <option value="{{ $brand->id }}" @if (old('brand_id', $product->brand_id) == $brand->id) selected="selected" @endif>
                                                            {{ $brand->name }}
                                                        </option>>
                                                    @endforeach
                                                </select>
                                            @endif

                                            @error('brand_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                       <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">
                                                Categoría del Producto
                                                <span class="text-danger">*</span>
                                            </label>

                                            @if ($categories->count() === 1)
                                                <select name="category_id" id="category_id"
                                                        class="form-select @error('category_id') is-invalid @enderror"
                                                        readonly
                                                >
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" selected>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select name="category_id" id="category_id"
                                                        class="form-select @error('category_id') is-invalid @enderror"
                                                >
                                                    <option selected="" disabled="">
                                                        Seleccionar categoría:
                                                    </option>

                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected="selected" @endif>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif

                                            @error('category_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>


                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="unit_id">
                                                    {{ __('Unidad') }}
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <select name="unit_id" id="unit_id"
                                                    class="form-select @error('unit_id') is-invalid @enderror">
                                                    <option selected="" disabled="">
                                                        Select a unit:
                                                    </option>

                                                    @foreach ($units as $unit)
                                                        <option value="{{ $unit->id }}"
                                                            @if (old('unit_id', $product->unit_id) == $unit->id) selected="selected" @endif>
                                                            {{ $unit->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('unit_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="quantity" class="form-label">
                                                    {{ __('Cantidad') }}
                                                </label>

                                                <input class="form-control" name="quantity" type="text" readonly value="{{ old('quantity', $product->quantity) }}"  required="true" aria-required="true" style="color: var(--tblr-secondary);background-color: var(--tblr-bg-surface-secondary); opacity: 1;"/>
												
												<input type="hidden" id="quantity_alert" name="quantity_alert"
                                                    value="0">
												 <input type="hidden" id="tax" name="tax"
                                                    value="16">
												<input type="hidden" id="tax_type" name="tax_type"
                                                    value="1">


                                            </div>
                                        </div>
										
								<div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label for="quality"  class="form-label">
                                                Calidad del Producto
                                            </label>

                                           
                                                <select name="quality" id="quality"
                                                        class="form-select @error('quality') is-invalid @enderror">
                                                        <option value="AAA" @if(old('quality', $product->quality) == 'AAA') selected="selected" @endif>
                                                           AAA
                                                        </option>
													<option value="AA" @if(old('quality', $product->quality) == 'AA') selected="selected" @endif>
                                                           AA
                                                        </option>
													<option value="A" @if(old('quality', $product->quality) == 'A') selected="selected" @endif>
                                                           A
                                                        </option>
													<option value="BBB" @if(old('quality', $product->quality) == 'BBB') selected="selected" @endif>
                                                           BBB
                                                        </option>
													<option value="BB" @if(old('quality', $product->quality) == 'BB') selected="selected" @endif>
                                                           BB
                                                        </option>
													<option value="B" @if(old('quality', $product->quality) == 'B') selected="selected" @endif>
                                                           B
                                                        </option>
													<option value="CCC" @if(old('quality', $product->quality) == 'CCC') selected="selected" @endif>
                                                           CCC
                                                        </option>
													<option value="CC" @if(old('quality', $product->quality) == 'CC') selected="selected" @endif>
                                                           CC
                                                        </option>
													<option value="C" @if(old('quality', $product->quality) == 'C') selected="selected" @endif>
                                                           C
                                                        </option>
                                                  
                                                </select>
                                           

                                            @error('quality')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>		
										
										<div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="box" class="form-label">
                                                    {{ __('Caja') }}
                                                </label>

                                                <input class="form-control" name="box" type="text" value="{{ old('box', $product->box) }}"  required="true" aria-required="true"/>

                                            </div>
                                        </div>
										<div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="registry" class="form-label">
                                                    {{ __('Registro') }}
                                                </label>

                                                <input class="form-control" name="registry" type="text" value="{{ old('registry', $product->registry) }}"  required="true" aria-required="true"/>

                                            </div>
                                        </div>
										<div class="col-sm-6 col-md-6">
                                       <div class="mb-3">
                                            <label for="site" class="site">
                                                Salida
                                            </label>

                                           
                                                <select name="site" id="site"
                                                        class="form-select @error('site') is-invalid @enderror">
                                                        <option value="LA GAVIA" @if(old('site', $product->site) == 'LA GAVIA') selected="selected" @endif>
                                                           LA GAVIA
                                                        </option>
													<option value="ISEO" @if(old('site', $product->site) == 'ISEO') selected="selected" @endif>
                                                           ISEO
                                                        </option>
													
                                                </select>
                                           
                                        </div>
                                    </div>
									<div class="col-sm-6 col-md-6">
                                       <div class="mb-3">
                                            <label for="package" class="package">
                                                Empaque
                                            </label>

                                           
                                                <select name="package" id="package"
                                                        class="form-select @error('package') is-invalid @enderror">
                                                        <option value="Ninguno" @if(old('package', $product->package) == 'Ninguno') selected="selected" @endif>
                                                           Ninguno
                                                        </option>
													<option value="Caja" @if(old('package', $product->package) == 'Caja') selected="selected" @endif>
                                                           Caja
                                                        </option>
													<option value="Bolsa" @if(old('package', $product->package) == 'Bolsa') selected="selected" @endif>
                                                           Bolsa
                                                        </option>
													<option value="Otro" @if(old('package', $product->package) == 'Otro') selected="selected" @endif>
                                                           Otro
                                                        </option>
													
                                                </select>
                                           
                                        </div>
                                    </div>

										<div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="pieces" class="form-label">
                                                    {{ __('Piezas por empaque') }}
                                                </label>

                                                <input class="form-control" name="pieces" type="number" value="{{ old('pieces', $product->pieces) }}"  required="true" aria-required="true"/>
												
                                            </div>
                                        </div>
										
										<div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="buying_price">
                                                    Precio
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <input type="text" id="buying_price" name="buying_price"
                                                    class="form-control @error('buying_price') is-invalid @enderror"
                                                    placeholder="0"
                                                    value="{{ old('buying_price', $product->buying_price) }}">

                                                @error('buying_price')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-3">
                                                <label for="selling_price" class="form-label">
                                                    Precio de venta
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <input type="text" id="selling_price" name="selling_price"
                                                    class="form-control @error('selling_price') is-invalid @enderror"
                                                    placeholder="0"
                                                    value="{{ old('selling_price', $product->selling_price) }}">

                                                @error('selling_price')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                       
                                        <div class="col-md-12">
                                            <div class="mb-3 mb-0">
                                                <label for="notes" class="form-label">
                                                    {{ __('Notas') }}
                                                </label>

                                                <textarea name="notes" id="notes" rows="5" class="form-control @error('notes') is-invalid @enderror"
                                                    placeholder="Notas del Producto">{{ old('notes', $product->notes) }}</textarea>

                                                @error('notes')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>`
                                    </div>
                                </div>

                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">
                                        {{ __('Actualizar') }}
                                    </button>

                                    <a class="btn btn-primary" href="{{ url()->previous() }}">
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
