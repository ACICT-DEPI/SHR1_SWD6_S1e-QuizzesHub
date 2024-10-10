@section('styles')
<style>
    .container5 {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .left,
    .right {
        flex: 1;
        padding: 10px;
    }

    /* Optional: Adjust for smaller screens */
    @media (max-width: 768px) {
        .container5 {
            flex-direction: column;
            align-items: center;
        }

        .left,
        .right {
            width: 100%;
        }
    }
</style>
@endsection
<section style="max-width: 28rem !important;" class="left">
    @if (session()->has('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <div class="mb-3">
                <label for="fname"><i class="zmdi zmdi-account material-icons-name"></i>Fname </label>
                <input type="text" id="fname" value="{{ old('fname', $user->fname) }}"
                    style="width: 80%; border-radius: 0.375rem; display: inline-block !important;"
                    class="form-control @error('fname') is-invalid @enderror" name="fname"
                    placeholder="Your first name">
                @error('fname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lname"><i class="zmdi zmdi-account material-icons-name"></i>Lname </label>
                <input type="text" id="lname" value="{{ old('lname', $user->lname) }}"
                    style="width: 80%; border-radius: 0.375rem; display: inline-block !important;"
                    class="form-control @error('lname') is-invalid @enderror" name="lname" placeholder="Your last name">
                @error('lname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone"><i class="zmdi zmdi-account material-icons-name"></i>Phone </label>
                <input type="text" id="phone" value="{{ old('phone', $user->phone) }}"
                    style="width: 80%; border-radius: 0.375rem; display: inline-block !important;"
                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                    placeholder="Your phone number">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i>Username </label>
                <input type="text" id="username" value="{{ old('username', $user->username) }}"
                    style="width: 80%; border-radius: 0.375rem; display: inline-block !important;"
                    class="form-control @error('username') is-invalid @enderror" name="username"
                    placeholder="Your username">
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


            <div class="mb-3">
                <label class=" form-control-label" for="email">Email</label>
                <input type="email" id="email" value="{{ old('email', $user->email) }}"
                    style="width: 80%; border-radius: 0.375rem; display: inline-block !important;"
                    class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                    @endif
                </div>
                @endif
            </div>

            <div class="mb-3">
                <label class=" text-end control-label col-form-label "
                    style="position:relative; top:-12px; margin-right:10px;">Gender</label>
                <div class=" col-md-3" style="display: inline-block !important;">
                    <div class="form-check">
                        <input type="radio" class="form-check-input " id="male" name="gender" value="M"
                            @if($user->gender == 'M') checked @endif />
                        <label class="form-check-label mb-0" for="male">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="female" name="gender" value="F"
                            @if($user->gender == 'F') checked @endif />
                        <label class="form-check-label mb-0" for="female">Female</label>
                    </div>
                    @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            @livewire('update-user-form', ['user' => $user])

            <div class="form-group">
                <label class=" form-control-label" for="level_id">Levels</label>
                <div class="input-group">
                    <select class="form-control @error('level_id') is-invalid @enderror" name="level_id" id="level_id">
                        <option value="">Select Level</option>
                        @foreach ($levels as $level)
                        <option value="{{ $level->id }}" @selected(isset($user->level_id) && $user->level_id== $level->id)>
                            {{ $level->name }}</option>
                        @endforeach
                    </select>
                    @error('level_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="btn btn-success mt-3"
                    style="width: 50%; border-radius: 0.375rem; display: inline-block !important;">
                    {{ __('Save') }}

                    @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                    @endif
            </div>
        </div>
    </form>

</section>

<section style="max-width: 25rem !important;" class="right">
    @livewire('update-user-photo', ['user' => $user])
</section>
