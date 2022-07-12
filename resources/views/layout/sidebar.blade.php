<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu mm-show">
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

                                <li class="side-nav-title side-nav-item">Quản lý</li>

                                <li class="side-nav-item">
                                    <a href="{{ route('academicyears.index') }}" class="side-nav-link" aria-expanded="false">
                                        <i class="uil-home-alt"></i>
                                        <span> Khoá </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('majors.index') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Chuyên ngành </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('courses.index') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Lớp </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('subjects.index') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Môn học </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('teachers.index') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Giáo viên </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('students.index') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Sinh viên </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('lessons.index') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Buổi học </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('attendances.index') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Điểm danh </span>
                                    </a>
                                </li>
                                @if(session()->get('role') === 1)
                                <li class="side-nav-title side-nav-item">Đăng ký tài khoản</li>

                                <li class="side-nav-item">
                                    <a href="{{ route('register_ministry') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Giáo vụ </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('register_teacher') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Giáo viên </span>
                                    </a>
                                </li>
                                @endif

                                @if(session()->get('role') === 2)
                                <li class="side-nav-title side-nav-item">Đăng ký tài khoản</li>

                                <li class="side-nav-item">
                                    <a href="{{ route('register_teacher') }}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span class="badge badge-success float-right"></span>
                                        <span> Giáo viên </span>
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