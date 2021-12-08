@extends('admin.layouts.master')
@section('content')

    <div class="content">
        <div class="container-fluid">
            @include('admin.layouts.notification')
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title" style="font-family: cairo;">رسائل التواصل</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="{{ route('adminhome') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item active">رسائل التواصل</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
                <br>
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
                                            <th>رقم الهاتف</th>
                                            <th>الرسالة</th>
                                            <th>التحكم</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($contact as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->message }}</td>
                                                <td>
                                                    &ensp;
                                                        <form class="float-left ml-1"
                                                            action="{{ route('contact.destroy', $item->id) }}"
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
 
@endsection
