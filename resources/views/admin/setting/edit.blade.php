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
                        <h4 class="page-title" style="font-family: cairo;">إعدادات الموقع</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="{{ route('adminhome') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item active">الاعدادات</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <form action="{{ route('updatesetting', $setting->id) }}" method="POST">
                                @csrf

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">البريد
                                        الالكترونى</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="email" value="{{ $setting->email }}"
                                            id="example-text-input" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">الهاتف</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="phone" value="{{ $setting->phone }}"
                                            id="example-text-input" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">الوتساب </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="whatsapp" value="{{ $setting->whatsapp }}"
                                            id="example-text-input" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">الفيس بوك </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="facebook" value="{{ $setting->facebook }}"
                                            id="example-text-input" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">لينكد ان </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="linkedin" value="{{ $setting->linkedin }}"
                                            id="example-text-input" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">تويتر</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="twitter" value="{{ $setting->twitter }}"
                                            id="example-text-input" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">اليوتيوب</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="youtube" value="{{ $setting->youtube }}"
                                            id="example-text-input" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">سناب شات</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="snapchat" value="{{ $setting->snapchat }}"
                                            id="example-text-input" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">انستجرام</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="instagram" value="{{ $setting->instagram }}"
                                            id="example-text-input" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">العنوان </label>
                                    <div class="col-sm-10">
                                        <textarea name="address_ar" class="form-control" id="" cols="30"
                                            rows="10">{{ $setting->address_ar }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <textarea name="address_en" class="form-control" id="" cols="30"
                                            rows="10">{{ $setting->address_en }}</textarea>
                                    </div>
                                </div>
                                @if(Auth::guard('admin')->user()->hasPermission('settings-update'))
                                <div class="form-group text-center m-t-20">
                                    <div class="col-12">
                                        <button class="btn btn-success btn-block btn-lg" name="submit"
                                            type="submit">تعديل</button>
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
