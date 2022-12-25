@extends('userDashboard')
@section('content')
    <link rel="stylesheet" href="css/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Readex Pro' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <div class="container">
        <div class="main-body">
            <form class="wt-formtheme wt-userform" method="POST" action="{{ route('profileUpdate') }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <div class="row gutters-sm mt-2">
                    <div class="col-md-4 mb-3 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div id="rightImg">
                                        <label for="imgSelector" id="imgUploader">
                                            <img src="{{ 'storage/images/profileimages/' . $user->image }}"
                                                 alt="Image Disappeared" height="100">
                                        </label>
                                        <input type="file" accept="image/*" id="imgSelector" name="image"
                                               class="@error('image') is-invalid @enderror" :value="old('image')">
                                        @error('image')
                                        @enderror

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">First Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="first_name" id="first_name"
                                               class="form-control input-group form_inputs m-auto mb-2 bg-light"
                                               value="{{ $user->first_name }}" :value="old('first_name')">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Last Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="last_name" id="last_name"
                                               class="form-control input-group form_inputs m-auto mb-2 bg-light"
                                               value="{{ $user->last_name }}" :value="old('last_name')">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" name="email" id="email" value="{{ $user->email }}"
                                               readonly :value="old('email')" style="border: 0px">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Country</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select
                                            class="selectpicker countrypicker w-100 form-control input-group form_inputs m-auto mb-2 bg-light h-100"
                                            data-live-search="true" name="country_id" id="country">
                                            <option value="{{ $user->country->id }}" selected>{{ $user->country->name }}
                                            </option>

                                            @foreach ($user['countries'] as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Gender</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" value="{{ $user->gender }}" :value="old('email')"
                                               name="gender" readonly style="border: 0px">
                                    </div>
                                </div>
                                <hr>
                                @if ($user->hasRole('Freelancer'))
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Qualification</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select
                                                class="selectpicker w-100 form-control input-group form_inputs m-auto mb-2 bg-light h-100"
                                                data-live-search="true" name="qualification" id="qualification">
                                                <option value=" {{ $user->freelancers->qualification }}">
                                                    {{ $user->freelancers->qualification }}
                                                </option>
                                                <option value="Matriculation">Matriculation</option>
                                                <option value="Intermediate">Intermediate</option>
                                                <option value="Bachelors">Bachelors</option>
                                                <option value="Masters">Masters</option>
                                                <option value="Phd">Phd</option>
                                            </select>
                                        </div>
                                    </div>

                                    <hr>
                                    <br>

                                    <div id="limited_inputs">
                                        <div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Expertise</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">

                                                    <div class="multipleSelection w-100">
                                                        <div
                                                            class="selectBox w-100 form-control input-group form_inputs m-auto mb-2 bg-light"
                                                            onclick="showExpertise()">
                                                            <select class="p-0 m-0 form-control" data-live-search="true"
                                                                    id="expertise" required>
                                                                <option disabled selected>Click to View Expertise
                                                                </option>
                                                            </select>
                                                            <div class="overSelect"></div>
                                                        </div>


                                                        <div id="Expertise">
                                                            <div class="row w-100 m-1 m-auto">
                                                                <div class="col-8">

                                                                    @foreach ($user->expertises as $expertise)
                                                                        <label>
                                                                            <input type="checkbox" id=""
                                                                                   value="{{ $expertise->id }}"
                                                                                   checked="checked"
                                                                                   name="expertise[]"/>
                                                                            {{ $expertise->name }}
                                                                        </label>
                                                                    @endforeach

                                                                    @foreach ($user['expertise'] as $expertises)
                                                                        <label>
                                                                            <input type="checkbox"
                                                                                   value="{{ $expertises->id }}"
                                                                                   name="expertise[]"/>
                                                                            {{ $expertises->name }}
                                                                        </label>
                                                                    @endforeach

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <div>
                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Skills</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <div class="multipleSelection w-100">
                                                                <div
                                                                    class="selectBox w-100 form-control input-group form_inputs m-auto mb-2 bg-light"
                                                                    onclick="showSkills()">

                                                                    <select class="p-0 m-0 form-control"
                                                                            data-live-search="true" required>
                                                                        <option disabled selected>Click to View Skills
                                                                        </option>
                                                                    </select>
                                                                    <div class="overSelect"></div>
                                                                </div>

                                                                <div id="skills">
                                                                    <div class="row w-100 m-1 m-auto">
                                                                        <div class="col-8">
                                                                            @foreach ($user->skills as $skill)
                                                                                <label>
                                                                                    <input type="checkbox"
                                                                                           value="{{ $skill->id }}"
                                                                                           checked="checked"
                                                                                           name="skills[]"/>
                                                                                    {{ $skill->name }}
                                                                                </label>
                                                                            @endforeach
                                                                            @foreach ($user['skill_tags'] as $skill)
                                                                                <label>
                                                                                    <input type="checkbox"
                                                                                           value="{{ $skill->id }}"
                                                                                           name="skills[]"/>
                                                                                    {{ $skill->name }}
                                                                                </label>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <button
                                                                class="m-auto mt-2 d-flex btn text-center logos mb-3 submit_btn"
                                                                type="submit">
                                                                <span class="text-center w-100 fw-bold">Save</span>
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <form action="{{ route('deleteUser') }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger bi bi-trash"> Delete Account</button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                    <div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    
                            </div>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>

@endsection
