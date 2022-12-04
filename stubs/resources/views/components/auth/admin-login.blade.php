<x-layouts.clean meta-title="Login" meta-description="Login">
    <x-layout.main wrapper>
        <x-form action="{{ route('admin.login') }}" class="auth-form">

            <x-form.errors class="" :errors="$errors" />

            <x-form.label>
                {{ __('Email') }}
                <x-form.input-email id="email" class="" :value="old('email')" required autofocus />
            </x-form.label>

            <x-form.label>
                {{ __('Password') }}
                <x-form.input-password id="password" class="" :value="old('password')" required
                    autocomplete="current-password" />
            </x-form.label>

            <x-form.label class="flex">
                <x-form.input-remember-me id="remember-me" class="" />
                <span>{{ __('Remember me') }}</span>
            </x-form.label>

            <div class="form__submit flex">
                {{-- <a class="" href="{{ route('password.request') }}"> --}}
                <a class="" href="{{ url('password/request') }}">
                    {{ __('Forgot your password?') }}
                </a>

                <x-form.submit class="btn_common">
                    {{ __('Login') }}
                </x-form.submit>
            </div>

        </x-form>
    </x-layout.main>
</x-layouts.clean>
