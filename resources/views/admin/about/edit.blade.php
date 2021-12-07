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
                                    <h4 class="page-title" style="font-family: cairo;">تعرف علينا</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="{{route('adminhome')}}">الرئيسية</a></li>
                                        <li class="breadcrumb-item active">تعرف علينا</li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <form action="{{ route('updateabout', $about->id) }}" method="POST">
                                            @csrf

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">من نحن</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="about_ar">{!! $about->about_ar !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">About Us</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="about_en">{!! $about->about_en !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">الشروط والأحكام</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="mission_ar">{!! $about->mission_ar !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Terms and Conditions</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="mission_en">{!! $about->mission_en !!}</textarea>
                                            </div>
                                        </div>
                                        @if(Auth::guard('admin')->user()->hasPermission('abouts-update'))
                                        <div class="form-group text-center m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-success btn-block btn-lg" name="submit" type="submit">تعديل</button>
                                            </div>
                                        </div>
                                        @endif
                                    </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                    <!-- container-fluid -->

                </div>
                <!-- content -->



            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

@endsection
