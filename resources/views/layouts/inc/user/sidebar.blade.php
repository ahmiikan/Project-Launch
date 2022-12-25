<!--Sidebar Start-->
<div id="wt-sidebarwrapper" class="wt-sidebarwrapper">
    <div id="wt-btnmenutoggle" class="wt-btnmenutoggle">
        <span class="menu-icon">
            <em></em>
            <em></em>
            <em></em>
        </span>
    </div>
    <div id="wt-verticalscrollbar" class="wt-verticalscrollbar">
        <div class="wt-companysdetails wt-usersidebar">
            <figure class="wt-companysimg">
                <img src="{{ asset('assets/images/sidebar/img-01.jpg') }}" alt="img description">
            </figure>
            <div class="wt-companysinfo">
                <figure><img src="{{ url('storage/images/profileimages/' . Auth::user()->image) }}" alt="profile">
                </figure>
                <div class="wt-title">
                    <h2><a href="{{ route('profileView') }}"> @auth
                                {{ Auth::user()->first_name }}
                            @endauth
                        </a>
                    </h2>
                    <span>@auth
                            {{ Auth::user()->last_name }}
                        @endauth
                    </span>
                </div>
                @auth
                    @if (Auth::user()->hasRole('Freelancer'))
                        <div class="wt-btnarea"><a href="{{ route('gigs.index') }}" class="wt-btn">Gigs</a></div>
                    @elseif (Auth::user()->hasRole('Client'))
                        <div class="wt-btnarea"><a href="{{ route('projects.index') }}" class="wt-btn">Projects</a>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
        <nav id="wt-navdashboard" class="wt-navdashboard">
            <ul>
                @auth
                    @if (Auth::user()->hasRole('Freelancer'))
                        <li>
                            <a href="{{ route('projectList') }}">
                                <i class="bi bi-speedometer2"></i>
                                <span>Project List</span>
                            </a>
                        </li>
                    @elseif (Auth::user()->hasRole('Client'))
                        <li>
                            <a href="{{ route('gigView') }}">
                                <i class="bi bi-speedometer2"></i>
                                <span>Gig List</span>
                            </a>
                    @endif
                @endauth

                @auth
                    @if (Auth::user()->hasRole('Freelancer'))
                        <li>
                            <a href="{{ route('gigSales') }}">
                                <i class="bi bi-pencil-square"></i>
                                <span>Orders</span>
                            </a>
                        </li>
                    @elseif (Auth::user()->hasRole('Client'))
                        <li>
                            <a href="{{route('gigPurchases')}}">
                                <i class="bi bi-pencil-square"></i>
                                <span>Orders</span>
                            </a>
                    @endif
                @endauth

                {{-- Project List for Admin --}}
                @auth
                    @if (Auth::user()->hasRole('Admin'))
                        <li>
                            <a href="{{ route('showClientProjects') }}">
                                <i class="bi bi-speedometer2"></i>
                                <span>Project List</span>
                            </a>
                        </li>
                    @endif
                @endauth
                @auth
                    @if (Auth::user()->hasRole('Admin'))
                        <li>
                            <a href="{{ route('showFreelancerGigs') }}">
                                <i class="bi bi-card-checklist"></i>
                                <span>Gig List</span>
                            </a>
                        </li>
                    @endif
                @endauth

                @auth
                    @if (Auth::user()->hasRole('Admin'))
                        <li>
                            <a href="{{ route('gigCategories.index') }}">
                                <i class="bi bi-card-checklist"></i>
                                <span>Gig Categories</span>
                            </a>
                        </li>
                    @endif
                @endauth

                @auth
                    @if (Auth::user()->hasRole('Admin'))
                        <li>
                            <a href="{{ route('expertises.index') }}">
                                <i class="bi bi-card-checklist"></i>
                                <span>Freelancer Expertises</span>
                            </a>
                        </li>
                    @endif
                @endauth

                @auth
                    @if (Auth::user()->hasRole('Admin'))
                        <li>
                            <a href="{{ route('skills.index') }}">
                                <i class="bi bi-card-checklist"></i>
                                <span>Freelancer Skills</span>
                            </a>
                        </li>
                    @endif
                @endauth

                <li class="wt-active">
                    <a href="{{ route('profileView') }}">
                        <i class="bi bi-briefcase"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li class="wt-active">
                    <a href="{{ route('changepassword') }}">
                        <i class="bi bi-key"></i>
                        <span>Change Passowrd</span>
                    </a>
                </li>
                <li>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <i class="bi bi-box-arrow-right"></i><span>
                                {{ __('Log Out') }}</span>
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
        </nav>
        <div class="wt-navdashboard-footer">
            <span>Project Launch. © 2022 All Rights Reserved.</span>
        </div>
    </div>
</div>
<!--Sidebar Start-->
