    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0 text-primary"><i class="far fa-hospital me-3"></i>Clinic</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                @auth
                    
                @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('list')}}" class="nav-item nav-link">Appointment Table</a>
                @endif
                @endauth
                <a href="/" class="nav-item nav-link active">Home</a>
                <a href="{{ route('about')}}" class="nav-item nav-link">About</a>
                <a href="{{ route('service')}}" class="nav-item nav-link">Service</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                        <a href="{{ route('feature.index')}}" class="dropdown-item">Feature</a>
                        <a href="{{ route('doctor.index')}}" class="dropdown-item">Our Doctor</a>
                        <a href="{{ route('appointment.index')}}" class="dropdown-item">Appointment</a>


                    </div>
                </div>
                <a href="{{ route('contact')}}" class="nav-item nav-link">Contact</a>
            </div>
            <a href="{{ route('appointment.index')}}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Appointment<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->