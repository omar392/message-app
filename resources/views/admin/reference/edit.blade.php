@extends('admin.layouts.master')
@section('content')


<div class="content">
    <div class="container-fluid">
        @include('admin.layouts.notification')
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title" style="font-family: cairo;">المرجع  </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{route('adminhome')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">المرجع  </li>
                    </ol>
                </div>
            </div> <!-- end row -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <form action="{{route('reference.update',$reference->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">الرابط</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="url"
                                            id="example-text-input" placeholder="الرابط" value="{{$reference->url}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">الاسم</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="name_ar"
                                            id="example-text-input" placeholder="الاسم" value="{{$reference->name_ar}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="name_en"
                                            id="example-text-input" placeholder="Name" value="{{$reference->name_en}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">الوصف</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description_ar">{!! $reference->description_ar !!}</textarea>
                            
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Descrition</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description_en">{!! $reference->description_en !!}</textarea>
                                   
                                    </div>
                                </div>
                                <div class="form-group text-center m-t-20">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-block btn-lg" name="submit"
                                            type="submit">تعديل</button>
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