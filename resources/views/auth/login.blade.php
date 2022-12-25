@extends('layouts.parent')
@section('content')

    <body>
    <div id="main_wrapper">
        <div id="filter">
            <div id="login_wrapper">
                <p id="signin" class="mt-3 mb-3" style="font-family: 'Poppins';">Sign In</p>
                <div class="text-center mb-3 pb-0">
                    <p class="mb-0 pb-0 pt-0 mt-0">-----------------------------------------------------------------</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class=" text-danger mb-4" :status="session('status')"/>

                <form method="POST" action="{{ route('login') }}" class="mainform">
                    @csrf

                    <input type="email" class="form-control input-group form_inputs m-auto mb-3 bg-light"
                           placeholder="Enter Your Email Address" name="email" id="email" required
                           @error('email') is-invalid @enderror>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <input type="password" class="form-control input-group form_inputs m-auto mb-4 bg-light"
                           placeholder="Enter Password" required autocomplete="current-password" name="password"
                           id="password" @error('password') is-invalid @enderror>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <select
                        class="selectpicker countrypicker w-100 form-control input-group form_inputs m-auto mb-2 bg-light"
                        data-live-search="true" name="role" id="role" required
                        @error('role') is-invalid @enderror>


                        <option value="" disabled selected>Select Your Role</option>
                        <option value="Admin">Admin</option>
                        <option value="Client">Client</option>
                        <option value="Freelancer">Freelancer</option>
                    </select>
                    @error('role')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <button class="m-auto d-flex btn  text-center logos mt-4 mb-3 submit_btn w-100">
                        <span class="text-center w-100 fw-bold">Continue</span>
                    </button>
                </form>
                <div id="remember_wrapper">
                    <div class="float-end">
                        @if (Route::has('password.request'))
                            <a class="links_group" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                </div>
                <hr>
                <div id="signup">
                    <p class="text-center">Not a member yet?
                        <a href="{{ route('register') }}" class="links_group">Join Now</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.js"></script>
    </body>

    </html>
@endsection
