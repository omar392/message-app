        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">القائمة</li>
                        <li>
                            <a href="{{route('adminhome')}}" class="waves-effect">
                                <i class="icon-accelerator"></i><span style="font-family: cairo;"> الرئيسية </span>
                            </a>
                        </li>
                        @if(Auth::guard('admin')->user()->hasPermission('admins-read'))
                        <li>
                            <a href="{{route('admins.index')}}" class="waves-effect">
                                <i class="fas fa-user-tag"></i><span style="font-family: cairo;">المديرين</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('roles-read'))
                        <li>
                            <a href="{{route('roles.index')}}" class="waves-effect">
                                <i class="fas fa-user-lock"></i><span style="font-family: cairo;">الصلاحيات</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('users-read'))
                        <li>
                            <a href="{{route('user.index')}}" class="waves-effect">
                                <i class="fas fa-users"></i><span style="font-family: cairo;"> المستخدمين </span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('messages-read'))
                        <li>
                            <a href="{{route('message.index')}}" class="waves-effect">
                                <i class="fas fa-envelope"></i><span style="font-family: cairo;">الرسائل و التدوينات</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('references-read'))
                        <li>
                            <a href="{{route('reference.index')}}" class="waves-effect">
                                <i class="fas fa-book-reader"></i><span style="font-family: cairo;">المراجع والمصادر</span>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="{{route('contact.index')}}" class="waves-effect">
                                <i class="fas fa-envelope"></i><span style="font-family: cairo;">رسائل التواصل</span>
                            </a>
                        </li>
                        {{-- @if(Auth::guard('admin')->user()->hasPermission('teams-read')) --}}
                        {{-- <li>
                            <a href="{{route('team.index')}}" class="waves-effect">
                                <i class="fas fa-user-friends"></i><span style="font-family: cairo;"> فريق العمل  </span>
                            </a>
                        </li> --}}
                        {{-- @endif --}}
                        @if(Auth::guard('admin')->user()->hasPermission('abouts-read'))
                        <li>
                            <a href="{{route('about')}}" class="waves-effect">
                                <i class="fas fa-home"></i><span style="font-family: cairo;">تعرف علينا</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->hasPermission('settings-read'))
                        <li>
                            <a href="{{route('setting')}}" class="waves-effect">
                                <i class="fas fa-cog"></i><span style="font-family: cairo;">الاعدادت العامة</span>
                            </a>
                        </li>
                        @endif
                    </ul>

                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->
