<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ trans('messages.sb_admin') }}</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ trans('messages.dashboard') }}</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>{{ trans('messages.manage_product') }}</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('products.index') }}">{{ trans('messages.list_product') }}</a>
                <a class="collapse-item" href="cards.html">{{ trans('messages.card') }}</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>{{ trans('messages.manage') }}</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('supliers.index') }}">{{ trans('messages.suplier') }}</a>
                <a class="collapse-item" href="{{ route('categories.index') }}">{{ trans('templates.categories') }}</a>
                <a class="collapse-item" href="utilities-animation.html">{{ trans('messages.animations') }}</a>
                <a class="collapse-item" href="utilities-other.html">{{ trans('messages.other') }}</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{ trans('templates.manage_advance') }}</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('roles.index') }}">{{ trans('templates.roles') }}</a>
                <a class="collapse-item" href="register.html">{{ trans('messages.register') }}</a>
                <a class="collapse-item" href="forgot-password.html">{{ trans('messages.forgot_password') }}</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">{{ trans('messages.other_pages') }}:</h6>
                <a class="collapse-item" href="404.html">{{ trans('404_page') }}</a>
                <a class="collapse-item" href="blank.html">{{ trans('messages.blank_page') }}</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>{{ trans('messages.charts') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>{{ trans('messages.tables') }}</span>
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
