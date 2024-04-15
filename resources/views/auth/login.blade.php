<x-guest-layout>


    <x-jet-authentication-card >
        <x-slot name="logo">
            <a href="/">
                <img src="/images/icons/logo-1.png" alt="IMG-LOGO" class="w-100 h-20">
            </a>
        </x-slot>
        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <p class="text-lg text-gray-600 text-center">Inicia sesión con tu cuenta</p>
            <div>
                <x-jet-label for="email" value="Email" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="Contraseña" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">Mantener sesión activa</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-jet-button >
                     &nbsp; &nbsp; &nbsp; &nbsp; Iniciar sesión &nbsp;  &nbsp; &nbsp; &nbsp;
                </x-jet-button>
            </div>

            
            <hr class="mt-3">
            <div class="flex items-center justify-center mt-3">
                @if (Route::has('register'))
                    <a  class="underline text-sm title-atlifor-m"  href="/register">
                    ¿No tienes cuenta? Regístrate
                    </a>
                @endif
            </div>
            <div class="flex items-center justify-center mt-2 ">
                @if (Route::has('password.request'))
                    <a  class="underline text-sm title-atlifor-m" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif
            </div>
        </form>

    </x-jet-authentication-card>

   
</x-guest-layout>
