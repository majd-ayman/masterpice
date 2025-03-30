<header>
    <div class="header-top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <ul class="top-bar-info list-inline-item pl-0 mb-0">
                        <li class="list-inline-item"><a href="mailto:support@gmail.com"><i class="icofont-support-faq mr-2"></i>support@novena.com</a></li>
                        <li class="list-inline-item"><i class="icofont-location-pin mr-2"></i> Address: University Street, Amman, Jordan </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="text-lg-right top-right-bar mt-2 mt-lg-0">
                        <a href="tel:+23-345-67890" >
                            <span>Call Now : </span>
                            <span class="h4">077-0467-339</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navigation" id="navbar">
        <div class="container">
             <a class="navbar-brand" href="index.html">
                <img src="images/logo.png" alt="" class="img-fluid">
              </a>

           <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icofont-navigation-menu"></span>
          </button>
      
          <div class="collapse navbar-collapse" id="navbarmain">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{route('index')}}">Home</a>
              </li>
               <li class="nav-item"><a class="nav-link" href="{{route('about')}}">About</a></li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('department')}}">Department</a>
                </li>
                

                <li class="nav-item">
                    <a class="nav-link" href="{{route('doctor')}}">Doctors</a>
                </li>
                

               <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="blog-sidebar.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog <i class="icofont-thin-down"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown05">
                        <li><a class="dropdown-item" href="{{route('blog-sidebar')}}">Blog with Sidebar</a></li>

                        <li><a class="dropdown-item" href="{{route('blog-single')}}">Blog Single</a></li>
                    </ul>
              	</li>
               <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>

               <!-- زر Login و Register -->
               @if(Auth::check())
                    <!-- إذا كان المستخدم مسجلاً دخوله، عرض My Account و Logout -->
                    <li class="nav-item">
                        <a class="btn btn-custom" href="{{route('my-account')}}">My Account</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-custom">Logout</button>
                        </form>
                    </li>
                @else
                    <!-- إذا كان المستخدم غير مسجل دخول، عرض Login و Register -->
                    <li class="nav-item">
                        <a class="btn btn-custom" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-custom" href="{{route('register')}}">Register</a>
                    </li>
                @endif
            </ul>
          </div>
        </div>
    </nav>
</header>
