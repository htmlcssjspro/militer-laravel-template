<x-layouts.app :meta-title="$metaTitle" :meta-description="$metaDescription">
    <x-layout.main wrapper>
        <x-form.errors class="" :errors="$errors" />
        <x-form action="{{ route('register') }}">
            <x-form.label>
                {{ __('WOT NickName') }}
                <x-form.input-text id="nickname" class="" name="nickname" :value="old('nickname')" required autofocus />
            </x-form.label>

            <x-form.label>
                {{ __('Email') }}
                <x-form.input-email id="email" class="" :value="old('email')" required />
            </x-form.label>

            <x-form.label>
                {{ __('Password') }}
                <x-form.input-password id="password" class="" :value="old('password')" required autocomplete="new-password" />
            </x-form.label>

            <x-form.label>
                {{ __('Confirm Password') }}
                <x-form.input-password id="password_confirmation" class="" name="password_confirmation" required />
            </x-form.label>

            <div class="flex">
                <a class="" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-form.submit class="btn btn_common">
                    {{ __('Register') }}
                </x-form.submit>
            </div>
        </x-form>
    </x-layout.main>
</x-layouts.app>
