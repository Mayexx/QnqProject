<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="{{ asset('imgs/qnq_logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Quirk 'N Quill Stationery</title>
</head>
<body>
    <nav class="header">
        <div class="logo">QUIRK 'N QUILL</div>
        <form action="{{url('search')}}" method="get" class="form-inline">
            <input class="form-control" type="search" name="search" placeholder="Search.....">
            <button class="btn btn-success" type="submit" value="Search" name="search">Search</button>
        </form>
        <ul class="menu">
            <li><a href=""><i class="fa-solid fa-heart"></i></a></li>
            <li><a href="{{url('show_cart')}}"><i class="fa-solid fa-bag-shopping"></i></a></li>
            <li>
                @if (Route::has('login'))
                <div class="dropdown">
                    <a href="{{ __('Dashboard') }}" class="dropbtn"><i class="fa-solid fa-user"></i><a href=""></a></a>
                    <div class="dropdown-content">
                        @auth
                        <a class="nav-link" href="#logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                        @endif
                        @endauth
                    </div>
                </div>
                @endif
            </li>
        </ul>
    </nav>

<div class="navbar">
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">New</a></li>
        <li><a href="#">Category <i class="bx bx-chevron-down"></i></a>
            <ul class="dropdown">
                @foreach ($category as $category)
                <li><a href="#">{{ $category->category_name }}</a></li>
                @endforeach
            </ul>
        </li>    
        <li><a href="#">Brands <i class="bx bx-chevron-down"></i></a>
            <ul class="dropdown">
                <li><a href="#">Pilot</a></li>
                <li><a href="#">Muji</a></li>
                <li><a href="#">Jetstream</a></li>
                <li><a href="#">Stabilo</a></li>
                <li><a href="#">Faber-Castell</a></li>
            </ul>
        </li>
        <li><a href="#">Accessories <i class="bx bx-chevron-down"></i></i></a>
            <ul class="dropdown">
                <li><a href="#">Keychains</a></li>
                <li><a href="#">Pouches & Laptop Sleeves</a></li>
                <li><a href="#">Enamel Pins</a></li>
                <li><a href="#">Desk Lights</a></li>
            </ul>
        </li>    
        <li><a href="#">Themes <i class="bx bx-chevron-down"></i></a>
            <ul class="dropdown">
                <li><a href="#">Studio Ghibli</a></li>
                <li><a href="#">Sanrio Characters</a></li>
                <li><a href="#">Rilakkuma</a></li>
                <li><a href="#">BT21</a></li>
                <li><a href="#">Vintage</a></li>
            </ul>
        </li>    
    </ul>
</div>
    <div class="container-fluid hero">
        <div id="heroCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#heroCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#heroCarousel" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/imgs/THEME_STUDIO-GHIBLI.png" class="d-block w-100" alt="Theme 1">
                </div>
                <div class="carousel-item">
                    <img src="/imgs/THEME_SANRIO.png" class="d-block w-100" alt="Theme 2">
                </div>
                <div class="carousel-item">
                    <img src="/imgs/THEME_RILAKKUMA.png" class="d-block w-100" alt="Theme 3">
                </div>
                <div class="carousel-item">
                    <img src="/imgs/THEME_BT21.png" class="d-block w-100" alt="Theme 4">
                </div>
                <div class="carousel-item">
                    <img src="/imgs/THEME_VINTAGE.png" class="d-block w-100" alt="Theme 5">
                </div>
            </div>
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    
    <h5 class="heading">Aesthetic School Supplies</h5>
    <div class="card-aesthetic">
        <div class="card border-0">
            <img src="/imgs/products/Minimalist.jpg" class="card-img-top" alt="Minimalist School Supplies">
            <h1>Minimalist School Supplies</h1>
        </div>
        <div class="card border-0">
            <img src="/imgs/products/Pastel.jpg" class="card-img-top" alt="Pastel Colors School Supplies">
            <h1>Pastel Colors School Supplies</h1>
        </div>
        <div class="card border-0">
            <img src="/imgs/products/Gothic or Dark Aesthetics.jpg" class="card-img-top" alt="Dark Aesthetics School Supplies">
            <h1>Dark Aesthetics School Supplies</h1>
        </div>
    </div>
    

    <div class="collection">
        <h5>New Collection</h5>
    </div>
    
    <!--Featured Collection -->
    @include('user.product')  

    <footer>
        <div class="container">
            <section id="information">
                <div class="info-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">About Us</a>
                    <a href="#">Frequently Asked Questions</a>
                    <a href="#">Terms and Conditions</a>
                    <a href="#">Contact Us</a>
                    <a href="#">Store Locator</a>
                    <a href="#">Call To Deliver</a>
                    <a href="#">Legal Notice</a>
                </div>
                <div class="social-media">
                    <p>Join the Q 'n Q Community</p>
                    <a href="#" class="facebook-icon"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="instagram-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="twitter-icon"><i class="fab fa-twitter"></i></a>
                    <p>&copy; 2024 Quirk 'N Quill Stationery.</p>   
                </div>
            </section>
        </div>
    </footer>
</body>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
