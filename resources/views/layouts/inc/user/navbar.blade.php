<!-- Header Start -->
<header id="wt-header" class="wt-header wt-headervtwo wt-haslayout">
    <div class="wt-navigationarea">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="wt-logo"><a href="/">
                            <h3>Project Launch</h3>
                        </a></strong>

                    <div class="wt-rightarea">
                        <div class="wt-loginarea">
                            <figure class="wt-userimg">
                                <img src="{{ asset('assets/images/user-login.png') }}" alt="img description">
                            </figure>
                            <div class="wt-loginoption">
                                <a href="javascript:void(0);" id="wt-loginbtn" class="wt-loginbtn">Login</a>
                                <div class="wt-loginformhold">
                                    <div class="wt-loginheader">
                                        <span>Login</span>
                                        <a href="javascript:;"><i class="fa fa-times"></i></a>
                                    </div>
                                    <form class="wt-formtheme wt-loginform do-login-form">
                                        <fieldset>
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control"
                                                       placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control"
                                                       placeholder="Password">
                                            </div>
                                            <div class="wt-logininfo">
                                                <a href="javascript:;" class="wt-btn do-login-button">Login</a>
                                                <span class="wt-checkbox">
                                                    <input id="wt-login" type="checkbox" name="rememberme">
                                                    <label for="wt-login">Keep me logged in</label>
                                                </span>
                                            </div>
                                        </fieldset>
                                        <div class="wt-loginfooterinfo">
                                            <a href="javascript:;" class="wt-forgot-password">Forgot password?</a>
                                            <a href="register.html">Create account</a>
                                        </div>
                                    </form>
                                    <form class="wt-formtheme wt-loginform do-forgot-password-form wt-hide-form">
                                        <fieldset>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control get_password"
                                                       placeholder="Email">
                                            </div>

                                            <div class="wt-logininfo">
                                                <a href="javascript:;" class="wt-btn do-get-password">Get Pasword</a>
                                            </div>
                                        </fieldset>
                                        <div class="wt-loginfooterinfo">
                                            <a href="javascript:void(0);" class="wt-show-login">Login</a>
                                            <a href="register.html">Create account</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <a href="register.html" class="wt-btn">Join Now</a>
                        </div>
                        <div class="wt-userlogedin">
                            <figure class="wt-userimg">
                                <img src="{{ url('storage/images/profileimages/' . Auth::user()->image) }}"
                                     alt="image description">
                            </figure>
                            <div class="wt-username">
                                <h3>@auth
                                        {{ Auth::user()->first_name }}
                                    @endauth
                                </h3>
                                <span>@auth
                                        {{ Auth::user()->last_name }}
                                    @endauth
                                </span>
                            </div>
                            <nav class="wt-usernav">
                                <ul>
                                    <li>
                                        <a href="{{ route('profileView') }}">
                                            <span>My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('changepassword') }}">
                                            <span>Change Password</span>
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')"
                                                             onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--Header End-->
