@extends('admin.layouts.master')
@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            @include('admin.layouts.notification')
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title" style="font-family: cairo;">الرئيسية</h4>
                    </div>
                    {{-- <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Stexo</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div> --}}
                </div>
                <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row">

            @if (Auth::guard('admin')->user()->hasPermission('admins-read'))
                <div class="col-sm-6 col-xl-4">
                    <a href="{{ route('admins.index') }}">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-human-male-female bg-primary text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16" style="font-family: cairo;">الاداريين</h5>
                                </div>
                                <h3 class="mt-4">{{ \App\Models\Admin::count() }}</h3>
                                <div class="progress mt-4" style="height: 4px;">
                                    <div class="progress-bar bg-primary" role="progressbar"
                                        style="width: {{ \App\Models\Admin::count() }}%" aria-valuenow=""
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-2 mb-0">عدد الاداريين<span
                                        class="float-right">{{ \App\Models\Admin::count() }}</span></p>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if (Auth::guard('admin')->user()->hasPermission('messages-read'))
                <div class="col-sm-6 col-xl-4">
                    <a href="{{ route('message.index') }}">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-message-processing bg-primary text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16" style="font-family: cairo;">الرسائل</h5>
                                </div>
                                <h3 class="mt-4">{{ \App\Models\Message::count() }}</h3>
                                <div class="progress mt-4" style="height: 4px;">
                                    <div class="progress-bar bg-primary" role="progressbar"
                                        style="width: {{ \App\Models\Message::count() }}%" aria-valuenow=""
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-2 mb-0">عدد الرسائل<span
                                        class="float-right">{{ \App\Models\Message::count() }}</span></p>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if (Auth::guard('admin')->user()->hasPermission('references-read'))
                <div class="col-sm-6 col-xl-4">
                    <a href="{{ route('reference.index') }}">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-book-open bg-primary text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16" style="font-family: cairo;">المراجع و المصادر</h5>
                                </div>
                                <h3 class="mt-4">{{ \App\Models\Reference::count() }}</h3>
                                <div class="progress mt-4" style="height: 4px;">
                                    <div class="progress-bar bg-primary" role="progressbar"
                                        style="width: {{ \App\Models\Reference::count() }}%" aria-valuenow=""
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-2 mb-0">عدد المراجع و المصادر<span
                                        class="float-right">{{ \App\Models\Reference::count() }}</span></p>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if (Auth::guard('admin')->user()->hasPermission('users-read'))
                <div class="col-sm-12 col-xl-12">
                    <a href="{{ route('user.index') }}">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-human-child bg-primary text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16" style="font-family: cairo;">المستخدمين</h5>
                                </div>
                                <h3 class="mt-4">{{ \App\Models\User::count() }}</h3>
                                <div class="progress mt-4" style="height: 4px;">
                                    <div class="progress-bar bg-primary" role="progressbar"
                                        style="width: {{ \App\Models\User::count() }}%" aria-valuenow=""
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-2 mb-0">المستخدمين<span
                                        class="float-right">{{ \App\Models\User::count() }}</span></p>
                            </div>
                        </div>
                    </a>
                </div>
            @endif

            </div>

            <!-- end row -->


        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
@endsection
