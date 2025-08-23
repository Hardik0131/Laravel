<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
    <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
        <div class="nav-profile-image">
            <img src="{{ asset('images/faces/face28.jpg') }}" alt="profile" />
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{ Auth::user()->username }}</span>
            <span class="text-secondary text-small">Project Manager</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard')}}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Basic UI Elements</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item">
            <a class="nav-link" href="{{ route('buttons')}}">Buttons</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('dropdown') }}">Dropdowns</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('typography') }}">Typography</a>
            </li>
        </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
        <span class="menu-title">Forms</span>
        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
        </a>
        <div class="collapse" id="forms">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item">
            <a class="nav-link" href="{{ route('category.create')}}">Category Form</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('post.create')}}">Post Form</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('basic_elements')}}">Form Layouts</a>
            </li>
        </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <span class="menu-title">Charts</span>
        <i class="mdi mdi-chart-bar menu-icon"></i>
        </a>
        <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item">
            <a class="nav-link" href="{{ route('chartjs') }}">ChartJs</a>
            </li>
        </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <span class="menu-title">Tables</span>
        <i class="mdi mdi-table-large menu-icon"></i>
        </a>
        <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item">
            <a class="nav-link" href="{{ route('basic-table') }}">Basic table</a>
            </li>
        </ul>
        </div>
    </li>
    </ul>
</nav>