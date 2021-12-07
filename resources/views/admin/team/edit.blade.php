@extends('admin.layouts.master')
@section('content')


<div class="content">
    <div class="container-fluid">
        @include('admin.layouts.notification')
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title" style="font-family: cairo;">فريق العمل</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{route('adminhome')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">فريق العمل</li>
                    </ol>
                </div>
            </div> <!-- end row -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <form action="{{route('team.update',$team->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">الاسم</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="name_ar" value="{{$team->name_ar}}"
                                            id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="name_en" value="{{$team->name_en}}"
                                            id="example-text-input" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">الوظيفة</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="job_ar" value="{{$team->job_ar}}"
                                            id="example-text-input" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Job</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="job_en" value="{{$team->job_en}}"
                                            id="example-text-input" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="input-preview" for="img">أضف صورة</label>
                                    <div class="col-sm-10">
                                        <input class="input-preview__src" id="img" name="image" type="file" value="{{url(public_path('upload/team/' . $team->images))}}" />
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">الحالة</label>
                                    <div class="col-sm-10">
                                        <select name="status" class="form-control show-tick">
                                            <option value="">--الحالة--</option>
                                            <option value="active" {{old('status')=='active'?'selected':''}}>مفعل</option>
                                            <option value="inactive" {{old('status')=='inactive'?'selected':''}}>غير مفعل</option>
                                        </select>
                                    </div>
                                </div> --}}
                            
                                <div class="form-group text-center m-t-20">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-block btn-lg" name="submit"
                                            type="submit">إضافة</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> 
        </div>
    </div>
</div>


@endsection