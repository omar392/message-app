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
                            <li class="breadcrumb-item"><a href="{{ route('adminhome') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item active">الصلاحيات</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
                <br>
                <div class="row align-items-center">
                    @if(Auth::guard('admin')->user()->hasPermission('roles-create'))
                    <div class="text-center">
                        <!-- Large modal -->
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                            data-target=".bs-example-modal-lg"><i class="fas fa-plus-circle"></i>إضافة صلاحية جديدة</button>
                    </div>
                    @endif
                    <!--  Modal content for the above example -->
                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myLargeModalLabel" style="font-family: cairo;">إضافة صلاحية جديدة</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <form action="{{ route('roles.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="example-text-input"
                                                    class="col-sm-2 col-form-label">اسم الصلاحية</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="name"
                                                        id="example-text-input" placeholder="اسم الصلاحية" required>
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
                                                                    <input type="checkbox" name="permissions[]" value="{{$model.'-'.$action}}"/>
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
                                                        type="submit">إضـــافـــة</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div> <!-- end row -->
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الصلاحية</th>
                                            <th>التحكم</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($role as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    @if(Auth::guard('admin')->user()->hasPermission('roles-update'))
                                                    <a href="{{ route('roles.edit', $item->id) }}"><button type="button"
                                                            class="float-left btn btn-info" data-size="sm" title="Edit"><i
                                                                class="fa fa-edit"></i></button></a>
                                                    @endif
                                                    &ensp;
                                                    @if(Auth::guard('admin')->user()->hasPermission('roles-delete'))
                                                    <form class="float-left ml-1"
                                                        action="{{ route('roles.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <a data-toggle="tooltip" title="delete"
                                                            data-id="{{ $item->id }}" class="dltBtn"><button
                                                                type="button" data-type="confirm"
                                                                class="btn btn-danger js-sweetalert" title="Delete"><i
                                                                    class="fa fa-trash"></i></button></a>
                                                    </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function(e) {
            var form = $(this).closest('form');
            var dataID = $(this).data('id');
            e.preventDefault();
            swal({
                    title: "هل أنت فعلا تريد الحذف ؟",
                    text: "فى حالة الحذف لن تستطيع الإعاده مرة أخرى",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                        swal("تم الحذف بنجاح", {
                            icon: "success",
                        });
                    } else {
                        swal("تم إلغاء الحذف");
                    }
                });
        });
    </script>
@endsection