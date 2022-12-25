@extends('layouts.parent')

@section('content')
    <div id="filter">
        <div class="d-block m-auto" id="clientFreelancer">
            <div class="middle d-flex align-items-center justify-content-center">
                <label class="m-2">
                    <input type="radio" name="radio" value="0" required/>

                    <div class="front-end box">
                        <span>
                            <i class="bi bi-file-person"></i>
                            <br>
                            I’m a client, hiring for a project
                        </span>
                    </div>
                </label>

                <label class="m-2">
                    <input type="radio" name="radio" value="1" required/>
                    <div class="back-end box">
                        <span>
                            <i class="bi bi-code-slash"></i>
                            <br>
                            I’m a freelancer, looking for work
                        </span>
                    </div>
                </label>
            </div>
            <button class="m-auto d-flex btn mt-5 mb-3 w-50 submit_btn" onclick="checkUser()" id="submit_btn"><span
                    class="w-100 fw-bold">Continue</span></button>
        </div>
        <div id="signup_wrapper" class="d-none">
            <p id="signin" class="mt-3 mb-2" style="font-family: 'Poppins';">Sign Up</p>

            <div class="text-center mb-2 pb-0">
                <p class="mb-0 pb-0 pt-0 mt-0">-----------------------------------------------------------------</p>
            </div>

            {{-- <x-auth-validation-errors class=" text-danger mb-4" :errors="$errors" /> --}}
            <form action="{{ route('register') }}" method="POST" class="mainform" enctype="multipart/form-data">
                @csrf
                <div class="inputsAll p-2">
                    <div id="rightImg">
                        <label for="imgSelector" id="imgUploader">
                            <i class="bi bi-images" id="iconimg"></i>
                            <img src="" alt="" id="imgContainer">
                        </label>
                        <input type="file" accept="image/*" id="imgSelector" name="image" required
                               class="@error('image') is-invalid @enderror">
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <input type="text" name="first_name" id="first_name"
                           class="form-control input-group form_inputs m-auto mb-2 bg-light @error('first_name') is-invalid @enderror"
                           placeholder="First Name" required value="{{ @old('first_name') }}">
                    @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <input type="text" name="last_name" id="last_name"
                           class="form-control input-group form_inputs m-auto mb-2 bg-light @error('last_name') is-invalid @enderror"
                           placeholder="Last Name" required value="{{ @old('last_name') }}">
                    @error('last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <input type="email" name="email" id="email"
                           class="form-control input-group form_inputs m-auto mb-2 bg-light @error('last_name') is-invalid @enderror"
                           placeholder="Email Address" required value="{{ @old('email') }}">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <input type="password" name="password"
                           class="form-control input-group form_inputs m-auto mb-2 bg-light @error('password') is-invalid @enderror"
                           placeholder="Password" required :value="old('password')" autocomplete="new-password">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="form-control input-group form_inputs m-auto mb-2 bg-light @error('password_confirmation') is-invalid @enderror"
                           placeholder="Confirm Password" required>
                    @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <select
                        class="selectpicker countrypicker w-100 form-control input-group form_inputs m-auto mb-2 bg-light @error('country_id') is-invalid @enderror"
                        data-live-search="true" name="country_id" id="country" required
                        :value="{{ @old('country_id') }}">

                        <option value="" disabled selected>Select Your country</option>

                        @foreach ($data['countries'] as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @error('country_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <select
                        class="selectpicker countrypicker w-100 form-control input-group form_inputs m-auto mb-2 bg-light  @error('gender') is-invalid @enderror"
                        data-live-search="true" name="gender" id="gender" required>

                        <option value="{{ @old('gender') }}"@selected(old('gender'))>Select Your Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Better not to mention</option>
                    </select>
                    @error('gender')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div id="limited_inputs">

                        <select
                            class="selectpicker countrypicker w-100 form-control input-group form_inputs m-auto mb-2 bg-light  @error('qualification') is-invalid @enderror"
                            data-live-search="true" name="qualification" id="qualification"
                            :value="{{ @old('qualification') }}">
                            <option value="" disabled selected>Your Highest Qualification</option>
                            <option value="Matriculation">Matriculation</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Bachelors">Bachelors</option>
                            <option value="Masters">Masters</option>
                            <option value="Phd">Phd</option>
                        </select>
                        @error('qualification')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div>
                            <div class="multipleSelection w-100">
                                <div class="selectBox w-100 form-control input-group form_inputs m-auto mb-2 bg-light"
                                     onclick="showExpertise()">
                                    <select class="p-0 m-0 form-control" data-live-search="true" id="expertise"
                                            required>
                                        <option disabled selected>Choose Expertise</option>
                                    </select>
                                    <div class="overSelect"></div>
                                </div>


                                <div id="Expertise">
                                    <div class="row w-100 m-1 m-auto">
                                        <div class="col-8">
                                            @foreach ($data['expertises'] as $expertise)
                                                <label>
                                                    <input type="checkbox" id="ex-{{ $expertise->id }}"
                                                           value="{{ $expertise->id }}" name="expertise[]"
                                                           :value="{{ @old('expertise') }}"/>
                                                    {{ $expertise->name }}
                                                </label>
                                            @endforeach

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="multipleSelection w-100">
                                <div class="selectBox w-100 form-control input-group form_inputs m-auto mb-2 bg-light"
                                     onclick="showSkills()">
                                    <select class="p-0 m-0 form-control" data-live-search="true" required>
                                        <option disabled selected>Choose Skills</option>
                                    </select>
                                    <div class="overSelect"></div>
                                </div>

                                <div id="skills">
                                    <div class="row w-100 m-1 m-auto">
                                        <div class="col-8">
                                            @foreach ($data['skill_tags'] as $skill_tag)
                                                <label>
                                                    <input type="checkbox" id="sk-{{ $skill_tag->id }}"
                                                           value="{{ $skill_tag->id }}" name="skills[]"
                                                           :value="{{ @old('skills') }}"/>
                                                    {{ $skill_tag->name }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="m-auto mt-2 d-flex btn  text-center logos mb-3 submit_btn w-100">
                    <span class="text-center w-100 fw-bold">Continue</span>
                </button>

            </form>

            <hr>

            <div id="signup">
                <p class="text-center">Already have an account?
                    <a href="{{ route('login') }}" class="links_group" style="font-family: 'Poppins';">Sign In</a>
                </p>
            </div>

        </div>
    </div>
@endsection
