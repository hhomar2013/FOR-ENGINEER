<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}"
      dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{config('app.name')}} |  @yield('title')</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{asset('asset/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{asset('asset/site/bootstrap.min.css')}}">

{{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}


    <!-- Custom styles for this template-->
    @if(LaravelLocalization::getCurrentLocale() == 'en')
        <link href="{{asset('asset/admin/css/sb-admin-2.css')}}" rel="stylesheet">
    @else
        <link href="{{asset('asset/admin/css/sb-admin-2-rtl.css')}}" rel="stylesheet">
    @endif

{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />--}}


    <style>
        #container {
            width: 1000px;
            margin: 20px auto;
        }
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }
        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>

{{--    <script src="{{ asset('asset/js/ckeditor.js') }}"></script>--}}
    @livewireStyles

{{--    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>--}}
{{--    <script src="{{ asset('asset/js/tinymce.min.js') }}" referrerpolicy="origin"></script>--}}
{{--    <script src="https://cdn.tiny.cloud/1/t2sw79gdxng6waxh91hdjpjxw6b7c86ejjrrsyq1hdvrdxws/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>--}}
</head>
@if(auth()->user()->status == 0)
    <body>
        <div class="card text-center">
            <img src="{{asset('asset/img/for4.png')}}" class="" style="width: 200px;height: 200px;" >
            <h1 class="text-danger">{{__('Your Account is not activated')}}</h1>

            <div>
                <br>
                <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                    {{__('Go Home')}} <i class="fa fa-arrow-left"></i>
                </a>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </body>
@else
    <body id="page-top" class="text-md">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
    @include('company.company_tools.sidebar')
    <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
            {{-- @include('company.company_tools.topbar') --}}
            @livewire('company.tools.topbar')
            <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')
                    {{-- {{ $slot }} --}}
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>{{__('Copyrights To')}} &copy; {{config('app.name')}} {{date('Y')}}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('t.signout')}}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                {{--            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>--}}
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">{{__('Cancel')}}</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        {{__('t.signout')}}
                    </a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('asset/admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('asset/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('asset/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('asset/admin/js/sb-admin-2.min.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{asset('asset/admin/vendor/chart.js/Chart.min.js')}}"></script>

    {{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>--}}

    <script src="{{asset("asset/admin/js/sweetalert2@11.js")}}"></script>
    {{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}

    <script src="{{asset('asset/site/bootstrap.bundle.min.js')}}"></script>




    <!-- Page level custom scripts -->
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
    </script>{{--End Of MEssage Script--}}



    @yield('js')

    @livewireScripts
    </body>
@endif


</html>
