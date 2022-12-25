@extends('layouts.parent')
@section('content')

    <body>
    <div id="main_wrapper">
        <div id="filter">
            <div id="login_wrapper">
                <p id="signin" class="mt-3 mb-4">Reset Password</p>
                <p id="subpara" class="mt-3 mb-4">Please enter your email address and we'll send you a link to reset
                    your password.</p>

                <form method="POST" action="{{ route('password.email') }}" class="mainform">
                    <input type="email" class="form-control input-group form_inputs m-auto mb-3 bg-light"
                           placeholder="Enter Your Email Address" name="email" :value="old('email')" required
                           @error('email') is-invalid @enderror>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <button class="m-auto d-flex btn  text-center logos mb-3 submit_btn w-100"><span
                            class="text-center w-100 fw-bold">Continue</span></button>
                </form>

                <hr>

                <div id="signup">
                    <p class="text-center"><a href="{{ route('login') }}" class="links_group"> Back to Sign In</a></p>
                </div>

            </div>
        </div>

    </div>

    <script src="js/bootstrap.js"></script>
    </body>

    </html>
@endsection
