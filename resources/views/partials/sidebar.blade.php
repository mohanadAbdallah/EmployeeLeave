<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <!-- Divider -->

    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active mt-5">
        <a class="nav-link" href="{{route('dashboard')}}">
            <span>الرئيسية</span>
            <i class="fas fa-fw fa-tachometer-alt"></i>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <span>إدارة المستخدمين</span>
            <i class="fas fa-fw fa-cog"></i>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded text-right">
                <a class="collapse-item" href="{{route('employees.create')}}">إضافة</a>
                <a class="collapse-item" href="{{route('employees.index')}}">عرض الكل</a>
            </div>
        </div>
    </li>


    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="{{route('leave-types.index')}}">
            <span>إدارة الإجازات</span>
            <i class="fas fa-fw fa-list"></i>
        </a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="{{route('leave-requests.index')}}">
            <span>طلبات الإجازة </span>
            <i class="fas fa-fw fa-person-booth"></i>
        </a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="{{route('denied-leave-requests.index')}}">
            <span>الإجازات المرفوضة </span>
            <i class="fas fa-fw fa-person-booth"></i>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
