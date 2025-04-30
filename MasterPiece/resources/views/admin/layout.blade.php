<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- إضافة أي ملفات CSS هنا -->
</head>

<body>
    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3"> 
        <nav class="navbar bg-light navbar-light">
            <div class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
            </div>
            
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="{{ asset('images/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">Jhon Doe</h6>
                    <span>Admin</span>
                </div>
            </div>
            
            <div class="navbar-nav w-100">
                <!-- Dashboard Link -->
                <a href="{{ route('dashboard') }}" class="nav-item nav-link active">
                    <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                </a>
    
                <!-- Widgets Link -->
                <a href="{{ route('widget') }}" class="nav-item nav-link">
                    <i class="fa fa-th me-2"></i>Widgets
                </a>
    
                <!-- Tables Link -->
                <a href="{{ route('table') }}" class="nav-item nav-link">
                    <i class="fa fa-table me-2"></i>Tables
                </a>
    
                <!-- Charts Link -->
                <a href="{{ route('chart') }}" class="nav-item nav-link">
                    <i class="fa fa-chart-bar me-2"></i>Charts
                </a>
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->

    <!-- محتوى الصفحة -->
    <main>
        @yield('content') <!-- سيظهر هنا محتوى الصفحة الفعلي -->
    </main>

    <!-- الفوتر -->
    <footer>
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-start">
                        &copy; 2025 <a href="#">Calmora</a>, All Right Reserved.
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-end">
                        Designed By <a href="https://yourwebsite.com">Majd Aburman</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- نهاية الفوتر -->

    <!-- إضافة أي ملفات JavaScript هنا -->
</body>

</html>
