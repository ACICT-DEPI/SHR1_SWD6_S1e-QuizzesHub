<section style="max-width: 39rem">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="current_password"><i class="zmdi zmdi-account material-icons-name"></i>Current Password </label>
            <input type="password" id="current_password"
                style="width: 60%; border-radius: 0.375rem; display: inline-block !important;"
                class="form-control @error('current_password') is-invalid @enderror" name="current_password"
                placeholder="Your Current Password">
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label for="password"><i class="zmdi zmdi-account material-icons-name"></i>New Password </label>
            <input type="password" id="password"
                style="width: 60%; border-radius: 0.375rem; display: inline-block !important;"
                class="form-control @error('password') is-invalid @enderror" name="password"
                placeholder="Your Current password">
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label for="password_confirmation"><i class="zmdi zmdi-account material-icons-name"></i>Confirm Password </label>
            <input type="password" id="password_confirmation"
                style="width: 60%; border-radius: 0.375rem; display: inline-block !important;"
                class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                placeholder="confirm password">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>


        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-success mt-3" style="width: 35%; border-radius: 0.375rem; display: inline-block !important;">
                {{ __('Save') }}

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
