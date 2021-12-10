@extends('admin.layouts.master')
@section('content')

    <div class="content">
        <div class="container-fluid">
            @include('admin.layouts.notification')
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title" style="font-family: cairo;">الصفحة الافتتاحية</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="{{ route('adminhome') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item active">الصفحة الافتتاحية</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
                <br>
                <div class="row align-items-center">
                    @if (Auth::guard('admin')->user()->hasPermission('introductions-create'))
                        <div class="text-center">
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                data-target=".bs-example-modal-lg"><i class="fas fa-plus-circle"></i>إضافة رسالة
                                جديدة</button>
                        </div>
                    @endif
                    <!--  Modal content for the above example -->
                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myLargeModalLabel" style="font-family: cairo;">إضافة
                                        رسالة جديدة</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <form action="{{ route('introduction.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="example-text-input"
                                                    class="col-sm-2 col-form-label">عنوان الافتتاحية</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="title_ar"
                                                        id="example-text-input" placeholder="عنوان الافتتاحية " required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input"
                                                    class="col-sm-2 col-form-label">introduction Title</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="title_en" id="example-text-input"
                                                        placeholder="introduction Title" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">محتوى الافتتاحية</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="message_ar"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">introduction Content</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="message_en"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input"
                                                    class="col-sm-2 col-form-label">الحالة</label>
                                                <div class="col-sm-10">
                                                    <select name="status" class="form-control show-tick">
                                                        <option value="">--الحالة--</option>
                                                        <option value="active"
                                                            {{ old('status') == 'active' ? 'selected' : '' }}>
                                                            مفعل</option>
                                                        <option value="inactive"
                                                            {{ old('status') == 'inactive' ? 'selected' : '' }}>غير مفعل
                                                        </option>
                                                    </select>
                                                </div>
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
                                            <th>عنوان الافتتاحية</th>
                                            <th>introduction Title</th>
                                            <th>الحالة</th>
                                            <th>التحكم</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($introduction as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->title_ar }}</td>
                                                <td>{{ $item->title_en }}</td>
                                                <td>
                                                    <input type="checkbox" name="toogle" value="{{ $item->id }}"
                                                        data-toggle="toggle"
                                                        {{ $item->status == 'active' ? 'checked' : '' }} data-on="مفعل"
                                                        data-off="غير مفعل" data-size="sm" data-onstyle="success"
                                                        data-offstyle="danger">
                                                </td>
                                                <td>
                                                    @if (Auth::guard('admin')->user()->hasPermission('introductions-update'))
                                                        <button type="button" data-toggle="modal"
                                                            data-target="#myModal{{ $item->id }}"
                                                            class="float-left btn btn-info" data-size="sm" title="Edit"><i
                                                                class="fa fa-edit"></i></button>
                                                    @endif
                                                    &ensp;
                                                    @if (Auth::guard('admin')->user()->hasPermission('introductions-delete'))
                                                        <form class="float-left ml-1"
                                                            action="{{ route('introduction.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <a data-toggle="tooltip" title="delete"
                                                                data-id="{{ $item->id }}"
                                                                class="dltBtn"><button type="button"
                                                                    data-type="confirm" class="btn btn-danger js-sweetalert"
                                                                    title="Delete"><i
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
                                                                style="font-family: cairo;">تعديل  الصفحة الافتتاحية</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card-body">
                                                                <form action="{{ route('introduction.update', $item->id) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('patch')

                                                                    <div class="form-group row">
                                                                        <label for="example-text-input"
                                                                            class="col-sm-2 col-form-label">عنوان الافتتاحية</label>
                                                                        <div class="col-sm-10">
                                                                            <input class="form-control" type="text"
                                                                                name="title_ar" id="example-text-input"
                                                                                placeholder="عنوان الافتتاحية"
                                                                                value="{{ $item->title_ar }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="example-text-input"
                                                                            class="col-sm-2 col-form-label">introduction Title</label>
                                                                        <div class="col-sm-10">
                                                                            <input class="form-control" name="title_en"
                                                                                id="example-text-input"
                                                                                placeholder="introduction"
                                                                                value="{{ $item->title_en }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="example-text-input" class="col-sm-2 col-form-label">محتوى الافتتاحية</label>
                                                                        <div class="col-sm-10">
                                                                            <textarea class="form-control" name="message_ar">{!! $item->message_ar !!}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="example-text-input" class="col-sm-2 col-form-label">introduction Content</label>
                                                                        <div class="col-sm-10">
                                                                            <textarea class="form-control" name="message_ar">{!! $item->message_ar !!}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="example-text-input" class="col-sm-2 col-form-label">الحالة</label>
                                                                        <div class="col-sm-10">
                                                                            <select name="status" class="form-control show-tick">
                                                                                <option value="">--الحالة--</option>
                                                                                <option value="active" {{old('status')=='active'?'selected':''}}>مفعل</option>
                                                                                <option value="inactive" {{old('status')=='inactive'?'selected':''}}>غير مفعل</option>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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
                url: "{{ route('introduction.status') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    mode: mode,
                    id: id,
                },
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.msg);
                    } else {
                        alert('من فضلك حاول مرة أخرى')
                    }
                }
            })
        });
    </script>
@endsection
