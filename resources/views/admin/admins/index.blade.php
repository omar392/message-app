@extends('admin.layouts.master')
@section('content')

    <div class="content">
        <div class="container-fluid">
            @include('admin.layouts.notification')
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title" style="font-family: cairo;">المديرين</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="{{ route('adminhome') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item active">المديرين</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
                <br>
                <div class="row align-items-center">
                    @if(Auth::guard('admin')->user()->hasPermission('admins-create'))
                    <div class="text-center">
                        <!-- Large modal -->
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                            data-target=".bs-example-modal-lg"><i class="fas fa-plus-circle"></i>إضافة مدير</button>
                    </div>
                    @endif
                    <!--  Modal content for the above example -->
                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myLargeModalLabel" style="font-family: cairo;">إضافة مدير</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <form action="{{ route('admins.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="example-text-input"
                                                    class="col-sm-2 col-form-label">الاسم</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="name"
                                                        id="example-text-input" placeholder="الاسم" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">البريد الالكترونى</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="email" type="email"
                                                        id="example-text-input" placeholder="البريد الالكترونى" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">الرقم السرى</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="password" type="password"
                                                        id="example-text-input" placeholder="البريد الالكترونى" required>
                                                </div>
                                            </div>

                                            
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">الصلاحية</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control form-control-round" name="role_id" id="role_id" required>
                                                    <option value="">---</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input"
                                                    class="col-sm-2 col-form-label">الحالة</label>
                                                <div class="col-sm-10">
                                                    <select name="status" class="form-control show-tick">
                                                        <option value="">--الحالة--</option>
                                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>
                                                            مفعل</option>
                                                        <option value="inactive"
                                                            {{ old('status') == 'inactive' ? 'selected' : '' }}>غير مفعل</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group text-center m-t-20">
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-block btn-lg" name="submit"
                                                        type="submit">إضافة</button>
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
                                            <th>الاسم </th>
                                            <th>البريد الالكترونى</th>
                                            <th>الحالة</th>
                                            <th>التحكم</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($admins as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    <input type="checkbox" name="toogle" value="{{ $item->id }}"
                                                        data-toggle="toggle" {{ $item->status == 'active' ? 'checked' : '' }}
                                                        data-on="مفعل" data-off="غير مفعل" data-size="sm"
                                                        data-onstyle="success" data-offstyle="danger">
                                                </td>
                                                <td>
                                                    @if(Auth::guard('admin')->user()->hasPermission('admins-update'))
                                                    <button type="button" data-toggle="modal"
                                                    data-target="#myModal{{ $item->id }}"
                                                    class="float-left btn btn-info" data-size="sm" title="Edit"><i
                                                        class="fa fa-edit"></i></button>
                                                    @endif
                                                    &ensp;
                                                    @if(Auth::guard('admin')->user()->hasPermission('admins-delete'))
                                                    <form class="float-left ml-1"
                                                        action="{{ route('admins.destroy', $item->id) }}" method="POST">
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
                                                    <!--  Modal content for the above example -->
                                                    <div id="myModal{{ $item->id }}" class="modal fade" tabindex="-1"
                                                        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title mt-0" id="myLargeModalLabel"
                                                                        style="font-family: cairo;">تعديل  المديرين</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <form action="{{ route('admins.update', $item->id) }}"
                                                                            method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('patch')
        
                                                                            <div class="form-group row">
                                                                                <label for="example-text-input"
                                                                                    class="col-sm-2 col-form-label">الاسم</label>
                                                                                <div class="col-sm-10">
                                                                                    <input class="form-control" type="text" name="name"
                                                                                        id="example-text-input" placeholder="الاسم" value="{{$item->name}}" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="example-text-input" class="col-sm-2 col-form-label">البريد الالكترونى</label>
                                                                                <div class="col-sm-10">
                                                                                    <input class="form-control" name="email" type="email"
                                                                                        id="example-text-input" placeholder="البريد الالكترونى" value="{{$item->email}}" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="example-text-input" class="col-sm-2 col-form-label">الرقم السرى</label>
                                                                                <div class="col-sm-10">
                                                                                    <input class="form-control" name="password" type="password"
                                                                                        id="example-text-input" placeholder="الرقم السرى" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-2 col-form-label">@lang('admin.role')</label>
                                                                                <div class="col-sm-10">
                                                                                    <select class="form-control form-control-round" name="role_id" id="role_id" required>
                                                                                    <option value="">---</option>
                                                                                    @foreach($roles as $role)
                                                                                    <option  value="{{$role->id}}" {{$item->hasRole($role->name) == 'true'? 'selected':''}}>{{$role->name}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
        
                                                                            <div class="form-group text-center m-t-20">
                                                                                <div class="col-12">
                                                                                    <button class="btn btn-primary btn-block btn-lg"
                                                                                        name="submit"
                                                                                        type="submit">تــعــديــل</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
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
    <script>
        $('input[name=toogle]').change(function() {
            var mode = $(this).prop('checked');
            var id = $(this).val();
            // alert(id);
            $.ajax({
                url: "{{ route('admins.status') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    mode: mode,
                    id: id,
                },
                success: function(response) {
                    if (response.status) {
                        // alert(response.msg);
                    } else {
                        alert('من فضلك حاول مرة أخرى')
                    }
                }
            })
        });
    </script>
@endsection