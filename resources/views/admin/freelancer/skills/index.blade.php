@extends('userDashboard')
@section('content')
    <section class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 float-left">
                <div class="wt-dashboardbox">
                    <div class="wt-dashboardboxtitle">
                        <h2>Add New Skill</h2>
                    </div>
                    <div class="wt-dashboardboxcontent">
                        <form action="{{ route('skills.store') }}"
                              class="wt-formtheme wt-formprojectinfo wt-formcategory"
                              method="POST">
                            @csrf
                            <fieldset>
                                <div class="form-group">
                                    <span class="form-group-title">Enter Skill</span>
                                    <input type="text" name="name" class="form-control mt-2" minlength="3"
                                           maxlength="25" pattern="[A-Za-z\s]{3,}"
                                           @error('name') is-invalid
                                           @enderror
                                           placeholder="Name" required value="{{ @old('name') }}">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group wt-btnarea d-flex justify-content-center">
                                    <button type="submit" class="wt-btn">Add New Skill</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8 float-right">
                <div class="wt-dashboardbox wt-categorys">
                    <div class="wt-dashboardboxtitle wt-titlewithsearch">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <h2>Skills</h2>

                        <form class="wt-formtheme wt-formsearch" method="GET">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" name="search" class="form-control"
                                           value="{{ request()->get('search') }}" placeholder="Search Skill">
                                    <button class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></button>
                                </div>
                            </fieldset>
                        </form>

                    </div>
                    <div class="wt-dashboardboxcontent wt-categoriescontentholder">
                        <table class="wt-tablecategories">
                            <thead>
                            <tr>

                                <th>Skill Id</th>
                                <th>Skill Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($skills as $skill)
                                <tr>
                                    <td class="pl-5">{{ $skill->id }}</td>
                                    <td>{{ $skill->name }}</td>
                                    <td>
                                        <div class="wt-actionbtn justify-content-center">
                                            <a href="{{ route('skills.edit', $skill->id) }}"
                                               class="wt-addinfo wt-skillsaddinfo"><i class="lnr lnr-pencil"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
