<!DOCTYPE html>

<html lang="en" dir="ltr">

@include('partials.head')

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('partials.navbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <script>
            const userId = "{{auth()->user()->id}}"
        </script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Footer -->
        @include('partials.footer')
        <!-- End of Footer -->


    </div>
    <!-- End of Content Wrapper -->


    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <!-- Divider -->

            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active mt-5">
                <a class="nav-link" href="{{route('employee-leave-requests',auth()->user()->id)}}">
                    <span>الرئيسية</span>
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                </a>
            </li>


        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="{{route('employee-leave-request.create')}}">
                <span>تقديم طلب إجازة </span>
                <i class="fas fa-fw fa-person-booth"></i>
            </a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item">

            <a class="nav-link" href="{{route('employee-leave-requests',auth()->user()->id)}}">
                <span>إجازاتي </span>
                <i class="fas fa-fw fa-person-booth"></i>
            </a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>


</div>

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
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary bg-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form method="post" action="{{route('logout')}}">
                    @csrf
                    <button type="submit" class="btn btn-primary bg-primary">Logout</button>
                </form>

            </div>
        </div>
    </div>
</div>

@include('partials.scripts')

</html>
