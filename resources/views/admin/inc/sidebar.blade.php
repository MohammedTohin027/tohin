<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('main.index') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Main</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#services" aria-expanded="false" aria-controls="services">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Services</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="services">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('service.create') }}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('service.index') }}">List</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#portfolio" aria-expanded="false" aria-controls="portfolio">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Portfolio</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="portfolio">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('portfolio.create') }}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('portfolio.index') }}">List</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#about" aria-expanded="false" aria-controls="about">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">About</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="about">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('about.create') }}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('about.index') }}">List</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
