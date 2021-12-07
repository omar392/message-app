
    @jquery
    @toastr_js
    @toastr_render    
    <!-- jQuery  -->
    <script src="{{asset('dashboard/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/metismenu.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/waves.min.js')}}"></script>

    <!--Morris Chart-->
    <script src="{{asset('dashboard/assets/js/morris.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/raphael.min.js')}}"></script>

    <script src="{{asset('dashboard/assets/pages/dashboard.init.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('dashboard/assets/js/app.js')}}"></script>

            <!-- Required datatable js -->
            <script src="{{asset('dashboard/assets/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('dashboard/assets/datatables/dataTables.bootstrap4.min.js')}}"></script>
            <!-- Buttons examples -->
            <script src="{{asset('dashboard/assets/datatables/dataTables.buttons.min.js')}}"></script>
            <script src="{{asset('dashboard/assets/datatables/buttons.bootstrap4.min.js')}}"></script>
            <script src="{{asset('dashboard/assets/datatables/jszip.min.js')}}"></script>
            <script src="{{asset('dashboard/assets/datatables/pdfmake.min.js')}}"></script>
            <script src="{{asset('dashboard/assets/datatables/vfs_fonts.js')}}"></script>
            <script src="{{asset('dashboard/assets/datatables/buttons.html5.min.js')}}"></script>
            <script src="{{asset('dashboard/assets/datatables/buttons.print.min.js')}}"></script>
            <script src="{{asset('dashboard/assets/datatables/buttons.colVis.min.js')}}"></script>
            <!-- Responsive examples -->
            <script src="{{asset('dashboard/assets/datatables/dataTables.responsive.min.js')}}"></script>
            <script src="{{asset('dashboard/assets/datatables/responsive.bootstrap4.min.js')}}"></script>
    
            <!-- Datatable init js -->
            <script src="{{asset('dashboard/assets/pages/datatables.init.js')}}"></script> 
            

            <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
            <!-- SweetAlert Plugin Js --> 
            <script src="{{asset('dashboard/assets/vendor/sweetalert/sweetalert.min.js')}}"></script> 
            <script>
                const fileImage = document.querySelector(".input-preview__src");
                const filePreview = document.querySelector(".input-preview");
                fileImage.onchange = function () {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        filePreview.style.backgroundImage = "url(" + e.target.result + ")";
                        filePreview.classList.add("has-image");
                    };
                    reader.readAsDataURL(this.files[0]);
                };
            </script>
    <script>
        setTimeout(function(){
            $('#alert').slideUp();
        },4000);
    </script>
    @yield('scripts')