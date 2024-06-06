<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <div class="content-center">
                <x-jet-authentication-card-logo />
            </div>



        </x-slot>
        <div class="w-full bg-slate-300">
            <p class="p-4 mb-4 text-lg text-blue-800">Registra tu Empresa Ahora ... y venda Más!</p>
        </div>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf



            <div>
                <x-jet-label for="name" value="{{ __('Nombres y Apellidos') }}" />
                <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="razonsocial" value="{{ __('Nombre de tu Empresa') }}" />
                <x-jet-input id="razonsocial" class="block w-full mt-1" type="text" name="razonsocial" :value="old('razonsocial')" required autofocus autocomplete="razonsocial" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm text-gray-600 underline hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm text-gray-600 underline hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif


            <div class="mt-3">
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Registrate') }}
                </x-jet-button>
            </div>
        </form>



    </x-jet-authentication-card>
</x-guest-layout>
