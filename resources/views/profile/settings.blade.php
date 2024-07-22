@extends('layouts.tabler')

@section('content')
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            Configuración de Cuenta
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl px-4 mt-4">
        @include('profile.component.menu')


        <hr class="mt-0 mb-4" />

        @include('partials.session')

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title">
                                {{ __('Cambiar contraseña') }}
                            </h3>
                        </div>
                    </div>

                    <x-form action="{{ route('password.update') }}" method="PUT">
                        <div class="card-body">
                            <x-input type="password" name="current_password" label="Current Password" required />
                            <x-input type="password" name="password" label="New Password" required />
                            <x-input type="password" name="password_confirmation" label="Confirm Password" required />
                        </div>

                        <div class="card-footer text-end">
                            <x-button type="submit">{{ __('Guardar') }}</x-button>
                        </div>
                    </x-form>
                </div>
            </div>

            <div class="col-lg-4">
               <!-- <div class="card mb-4">
                    <div class="card-header">
                       Autenticación de 2 pasos
                    </div>
                    <div class="card-body">
                        <p>
                            Agregue otro nivel de seguridad a su cuenta habilitando la autenticación de dos factores.
 Le enviaremos un mensaje de texto para verificar sus intentos de inicio de sesión en dispositivos no reconocidos y
 navegadores.
                        </p>
                        <form>
                            <div class="form-check">
                                <input class="form-check-input" id="twoFactorOn" type="radio" name="twoFactor"
                                    checked="" />
                                <label class="form-check-label" for="twoFactorOn">Si</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="twoFactorOff" type="radio" name="twoFactor" />
                                <label class="form-check-label" for="twoFactorOff">No</label>
                            </div>
                        </form>
                    </div>
                </div>-->

                <div class="card mb-4">
                    <div class="card-header">
                        Eliminar cuenta
                    </div>
                    <div class="card-body">
                        <p>
                            Eliminar tu cuenta es una acción permanente y no se puede deshacer. Si estás seguro de que quieres
 eliminar tu cuenta, da click en el botón a continuación.
                        </p>
                        <button type="button" class="btn btn-danger-soft text-danger">
                            Eliminar cueenta
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    <script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endpush
