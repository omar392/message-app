<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title> Admin & Dashboard</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/morris.css')}}">

    <!-- DataTables -->
    <link href="{{asset('dashboard/assets/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/assets/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/switch-button-bootstrap/css/bootstrap-switch-button.css')}}">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">

    <link href="{{asset('dashboard/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('dashboard/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('dashboard/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('dashboard/assets/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    @toastr_css
</head>
<style>
      body {
        font-family: 'Cairo';
        /* font-size: 22px; */
    }
    body {
	font-size: 1rem;
	/* display: flex; */
	min-height: 100vh;
	margin: 0 auto;
	/* justify-content: center; */
	/* align-items: center; */
	flex-direction: column;
	color: rgb(20, 20, 28);
}
.input-preview {
	border-radius: 4px;
	width: 200px;
	height: 200px;
	display: flex;
	justify-content: center;
	align-items: center;
	background-size: contain;
	background-repeat: no-repeat;
	background-position: center;
	position: relative;
	transition: ease-in-out 750ms;
}
</style>