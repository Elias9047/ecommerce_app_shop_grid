
<style>
    .sidebar {
        width: 250px;
        min-height: 100vh;
        background-color: #333433;
        color: #fff;
    }
    .sidebar .nav-link {
        color: #cbd5e1;
        padding: 12px 20px;
    }
    .sidebar .nav-link:hover, .sidebar .nav-link.active {
        background-color: #0f172a;
        color: #fff;
    }
    .sidebar .nav-item .dropdown-menu {
        background-color: #1e293b;
        border: none;
    }
    .sidebar .dropdown-item {
        color: #cbd5e1;
    }
    .sidebar .dropdown-item:hover {
        background-color: #334155;
    }
</style>

<nav class="sidebar d-flex flex-column p-3">
    <a href="{{ route('dashboard') }}" class="d-flex align-items-center mb-4 text-white text-decoration-none">
        <span class="fs-5 fw-bold">Admin Panel</span>
    </a>

    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>
        </li>
        {{-- category --}}
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#categoryMenu1" role="button" aria-expanded="false" aria-controls="categoryMenu">
                <i class="fas fa-layer-group me-2"></i> Category
            </a>
            <div class="collapse" id="categoryMenu1">
                <ul class="nav flex-column ms-3">
                    <li><a class="nav-link" href="{{ route('create_category') }}">Create Category</a></li>
                    <li><a class="nav-link" href="{{ route('index_category')}}">Manage Category</a></li>
                </ul>
            </div>
        </li>
               {{-- sub_category --}}
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#subCategoryMenu2" role="button" aria-expanded="false" aria-controls="subCategoryMenu">
                <i class="fas fa-sitemap me-2"></i> Sub-Category
            </a>
            <div class="collapse" id="subCategoryMenu2">
                <ul class="nav flex-column ms-3">
                    <li><a class="nav-link" href="{{ route('create_sub_category')}}">Create Sub-category</a></li>
                    <li><a class="nav-link" href="{{ route('index_sub_category')}}">Manage Sub-category</a></li>
                </ul>
            </div>
        </li>
               {{-- brand --}}
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#brandMenu3" role="button" aria-expanded="false" aria-controls="brandMenu">
                <i class="fas fa-tags me-2"></i> Brand
            </a>
            <div class="collapse" id="brandMenu3">
                <ul class="nav flex-column ms-3">
                    <li><a class="nav-link" href="{{ route('create_brand')}}">Create Brand</a></li>
                    <li><a class="nav-link" href="{{ route('index_brand')}}">Manage Brand</a></li>
                </ul>
            </div>
        </li>

                 {{-- Product --}}
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#brandMenu4" role="button" aria-expanded="false" aria-controls="brandMenu">
                <i class="fas fa-box me-2"></i> Product
            </a>
            <div class="collapse" id="brandMenu4">
                <ul class="nav flex-column ms-3">
                    <li><a class="nav-link" href="{{ route('create_product')}}">Create Product</a></li>
                    <li><a class="nav-link" href="{{ route('index_product')}}">Manage Product</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>





