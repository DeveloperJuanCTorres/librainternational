<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="/">
                <img src="/images/icons/logo-1.png" alt="IMG-LOGO" class="w-100 h-20">
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf


            <div class="mb-2">
                <x-jet-label for="type_user" value="Tipo de usuario" />
                <ul class="items-center w-full text-sm font-medium  border border-gray-200 rounded-lg sm:flex ">
                    <li class="w-full">
                        <div class="flex items-center pl-3">
                            <input id="horizontal-list-radio-license" type="radio" value="person" name="list-radio" class="w-4 h-4 text-blue-600 " checked>
                            <label for="horizontal-list-radio-license" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Persona Natural </label>
                        </div>
                    </li>
                    <li class="w-full">
                        <div class="flex items-center pl-3">
                            <input id="horizontal-list-radio-id" type="radio" value="busines" name="list-radio" class="w-4 h-4 text-blue-600">
                            <label for="horizontal-list-radio-id" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Empresa</label>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Persona Natural -->
            <div id="person">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <x-jet-label for="first_name" value="Nombre" />
                        <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"   autofocus autocomplete="first_name" />
                    </div>
                    <div >
                        <x-jet-label for="last_name" value="Apellidos" />
                        <x-jet-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"   autofocus autocomplete="last_name" />
                    </div>
                </div>
                <div class="mt-4">
                    <x-jet-label for="dni" value="DNI" />
                    <x-jet-input id="dni" class="block mt-1 w-full" type="number" name="dni" :value="old('dni')"  autofocus autocomplete="dni" />
                </div>
            </div>
            <!---------------------->
            <!-- Empresa -->
            <div id="busines">
                <div >
                    <x-jet-label for="busines" value="Nombre comersial" />
                    <x-jet-input id="busines" class="block mt-1 w-full" type="text" name="busines" :value="old('busines')"   autofocus autocomplete="busines" />
                </div>
                <div class="mt-4">
                    <x-jet-label for="ruc" value="RUC" />
                    <x-jet-input id="ruc" class="block mt-1 w-full" type="number" name="ruc" :value="old('ruc')"   autofocus autocomplete="ruc" />
                </div>
            </div>
            <!---------------------->

            <div class="mt-4">
                <x-jet-label for="mobile" value="Teléfono (Perú)" />
                <div class="flex">
                    <span class="mt-1 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        +51
                    </span>
                    <x-jet-input id="mobile" class="block mt-1 w-full" type="number" name="mobile" :value="old('mobile')" style="border-radius: 0 0.375rem 0.375rem 0;" required />
                </div> 
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="Correo" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="Contraseña" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="Confirmar contraseña" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    ¿Ya estás registrado?
                </a>

                <x-jet-button class="ml-4">
                    Registrar
                </x-jet-button>
            </div>
        </form>
        
    </x-jet-authentication-card>

    <script type="text/javascript">
        /*funcion Boleta/Factura*/
        $(document).ready(function() {
            $('#person').show();
            $('#busines').hide();
        })

        $('input[name="list-radio"]').click(function() {

            console.log('dante');

            if ($(this).attr("value") == "person") {
                $("#person").show();
                $("#busines").hide();
            }
            if ($(this).attr("value") == "busines") {
                $("#person").hide();
                $("#busines").show();
            }
        });

    </script>
</x-guest-layout>
