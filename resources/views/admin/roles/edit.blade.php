@extends('admin.layouts.master')
@section('content')


<div class="content">
    <div class="container-fluid">
        @include('admin.layouts.notification')
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title" style="font-family: cairo;">الصلاحيات</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{route('adminhome')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">الصلاحيات</li>
                    </ol>
                </div>
            </div> <!-- end row -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <form action="{{route('roles.update',$role->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">اسم الصلاحية</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="name"
                                            id="example-text-input" placeholder="اسم الصلاحية" value="{{$role->name}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>القسم</th>
                                                <th>الصلاحيات</th>
                                            </tr>

                                            @foreach($models as $index=>$model)
                                            @if($model == 'settings')
                                            <?php $actions = ['read', 'update']; ?>
                                            @endif
                                            @if($model == 'abouts')
                                            <?php $actions = ['read', 'update']; ?>
                                            @endif
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{__('web.'.$model)}}</td>
                                                <td class="col-sm-8 col-xl-4 m-b-30">
                                                        @foreach($actions as $index=>$action)
                                                        <label for="">{{__('web.'.$action)}}</label>
                                                        <input type="checkbox" name="permissions[]" value="{{$model.'-'.$action}}" {{$role->hasPermission($model.'-'.$action) ? 'checked':''}} />
                                                        @endforeach
                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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