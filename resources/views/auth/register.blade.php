<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!--<div>
                <x-label for="type_document" value="{{ __('Type document') }}" />
                <x-input id="type_document" class="block mt-1 w-full" type="text" name="type_document" :value="old('type_document')" required autofocus autocomplete="type_document" />
            </div>-->
            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autocomplete="name" />
            </div>

            <div>
                <x-label for="type_document" value="{{ __('Type document') }}" />
                <select class="form-control" id="type_document" name="type_document" :value="old('type_document')" style="border-radius: 5px; width: 100%;">
                    <option value=""></option>
                    <option value="Citizenship card" {{ old('type_document') == 'Citizenship card' ? 'selected' : '' }}>Citizenship card</option>
                    <option value="Identity card" {{ old('type_document') == 'Identity card' ? 'selected' : '' }}>Identity card</option>
                    <option value="Foreigner ID" {{ old('type_document') == 'Foreigner ID' ? 'selected' : '' }}>Foreigner ID</option>
                    <option value="Other" {{ old('type_document') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div>
                <x-label for="number_document" value="{{ __('Number document') }}" />
                <x-input id="number_document" class="block mt-1 w-full" type="text" name="number_document" :value="old('number_document')" autocomplete="number_document" />
            </div>

            <div>
                <x-label for="phone" value="{{ __('Phone') }}" />
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" autocomplete="phone" />
            </div>
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <!--<div>
                <x-label for="role" value="{{ __('Role') }}" />
                <select class="form-control" id="role" name="role" style="border-radius: 5px; width: 100%;">
                    <option value=""></option>
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>-->

            @if($errors -> any())
            <div class="alert alert-danger col-12 mt-4">
                <ul>
                    @foreach($errors -> all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif



            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-label for="terms">
                    <div class="flex items-center">
                        <x-checkbox name="terms" id="terms" required />

                        <div class="ms-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-label>
            </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
