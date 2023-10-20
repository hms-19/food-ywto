
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>Food Delivery</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">

        
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
        
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        
        <!-- Libraries Stylesheet -->
        <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        
        <!-- Customized Bootstrap Stylesheet -->
        <link href="assets/css/style.css" rel="stylesheet">

        
    </head>
    <body>
        <!-- Navbar Start -->
        <div class="container-fluid">
            <div class="row border-top px-xl-5">
                <div class="col-lg-12">
                    <nav class="fixed-top  navbar navbar-expand-lg bg-light navbar-light shadow-sm px-4 py-3 py-lg-0 px-0">
                        <a href="/" class="text-decoration-none">
                            <img src="{{ asset('img/logo.png') }}" width="80px" height="80px" style="object-fit: cover;" alt="">
                        </a>
                           
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav py-0">
                            </div>
                            <div class="navbar-nav ml-auto py-0">
                                <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                                <a href="{{ url('/menus') }}" class="nav-item nav-link">Menu</a>
                                @if (auth()->user())
                                <div class="nav-item dropdown mobile-dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Settings</a>
                                    <div class="dropdown-menu rounded-0 m-0  text-center">                                        
                                        @if(auth()->user()->role_id == 1) 
                                            <a href="/admin" class="dropdown-item text-left">Dashboard</a>
                                        @else
                                            <a href="/order" class="dropdown-item text-left">Orders</a>
                                        @endif
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button type="submit" href="/logout" class=" dropdown-item text-left">Logout</button>
                                        </form>
                                    </div>
                                </div>
                                @else
                                <a href="{{ route('login') }}" class="nav-item btn btn-success pt-3">Login</a>
                                @endif

                                @auth
                                    <a href="{{ url('/cart') }}" class="btn pt-3 border">
                                        <i class="fas fa-shopping-cart text-primary"></i>
                                        <span class="badge" id="cart-data">{{ count(\Cart::getContent()) }}</span>                                    
                                    </a>
                                @endauth
                            </div>
                        </div>

                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar End -->
        {{ $slot }}
        <!-- Footer Start -->
        <div class="container-fluid bg-secondary text-dark pt-5">
            <div class="row px-xl-5 pt-5">
                <div class="col-lg-6 col-md-12 mb-5 pr-3 pr-xl-5">
                    <a href="/" class="text-decoration-none">
                        <img src="{{ asset('img/logo.png') }}" width="80px" height="80px" style="object-fit: cover;" alt="">
                    </a>
                    <p>Food Delivery, where convenience meets delectable dishes right at your doorstep. We are passionate about bringing you the finest culinary experiences with a seamless ordering process and lightning-fast delivery.</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-dark mb-2" href="{{ url('/') }}"><i class="fa fa-angle-right mr-2"></i>Home</a>
                                <a class="text-dark mb-2" href="{{ route('login') }}"><i class="fa fa-angle-right mr-2"></i>Login</a>
                                <a class="text-dark mb-2" href="{{ route('register') }}"><i class="fa fa-angle-right mr-2"></i>Register</a>
                                <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                            <div class="d-flex flex-column justify-content-end">
                                <a class="text-dark mb-2" href="userprofile.php"><i class="fa fa-angle-right mr-2"></i>User profile</a>
                                <a class="text-dark mb-2" href="changepassword.php"><i class="fa fa-angle-right mr-2"></i>Change Password</a>
                                <a class="text-dark mb-2" href="checkout.php"><i class="fa fa-angle-right mr-2"></i>Check Out</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row border-top border-light mx-xl-5 py-4">
                <div class="col-md-6 px-xl-0">
                    <p class="mb-md-0 text-center text-md-left text-dark">
                        &copy; <a class="text-dark font-weight-semi-bold" href="#">DL.Dolphin</a>. All Rights Reserved.
                    </p>
                </div>
                <div class="col-md-6 px-xl-0 text-center text-md-right">
                    <img class="img-fluid" src="img/payments.png" alt="">
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        
        <!-- Back to Top -->
        <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
        
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="assets/lib/easing/easing.min.js"></script>
        <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="assets/mail/jqBootstrapValidation.min.js"></script>
        <script src="assets/mail/contact.js"></script>
        
        <!-- Template Javascript -->
        <script src="assets/js/main.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </body>
    
    </html>