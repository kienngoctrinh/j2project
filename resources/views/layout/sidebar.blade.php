<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu mm-show">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100 mm-active" id="left-side-menu-container" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden;">
                        <div class="simplebar-content" style="padding: 0px;">

                            <!--- Sidemenu -->
                            <ul class="metismenu side-nav mm-show">

                                <li class="side-nav-title side-nav-item">Manage</li>

                                <li class="side-nav-item">
                                    <a href="{{ route('courses.index') }}" class="side-nav-link" aria-expanded="false">
                                        <i class="uil-home-alt"></i>
                                        <span> Course </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('majors.index') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Major </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('subjects.index') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Subject </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('teachers.index') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Teacher </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('classses.index') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Class </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('students.index') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Student </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('lessons.index') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Lesson </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('slots.index') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Slot </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('attendances.index') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Attendance </span>
                                    </a>
                                </li>
                                @if(session()->get('role') === 1)
                                <li class="side-nav-title side-nav-item">Register</li>

                                <li class="side-nav-item">
                                    <a href="{{ route('register_ministry') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Ministry </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('register_teacher') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Teacher </span>
                                    </a>
                                </li>
                                @endif

                                @if(session()->get('role') === 2)
                                <li class="side-nav-title side-nav-item">Register</li>

                                <li class="side-nav-item">
                                    <a href="{{ route('register_teacher') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Teacher </span>
                                    </a>
                                </li>
                                @endif

                            </ul>

                            <!-- End Sidebar -->

                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 100px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar simplebar-visible" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
            <div class="simplebar-scrollbar simplebar-visible" style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
        </div>
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->