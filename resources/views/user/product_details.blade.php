<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="{{ asset('imgs/qnq_logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="admin/assets/css/maps/home.css">
    <link rel="stylesheet" href="admin/assets/css/maps/product_details.css">
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
                    <a href="#" class="dropbtn"><i class="fa-solid fa-user"></i></a>
                    <div class="dropdown-content">
                        @auth
                        <a href="{{ __('Dashboard') }}">Dashboard</a>
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
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{url('/new_collection')}}">New</a></li>
        <li><a href="#">Category <i class="bx bx-chevron-down"></i></a>
            <ul class="dropdown">
                <li><a href="#">Eraser</a></li>
                <li><a href="#">Stickers</a></li>
                <li><a href="#">Notepad</a></li>
                <li><a href="#">Pens</a></li>
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
    <section class="product-section">
        <div class="container">
            <div class="row">
                <!-- Product Image Carousel -->
                <div class="col-md-6">
                    <div id="productCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Slide 1 -->
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="/productimage/{{$data->image}}" alt="{{$data->title}} Image 1">
                            </div>
                        </div>
                        <!-- Carousel Controls -->
                        <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <!-- Product Description -->
                <div class="col-md-6 product-section">
                    <div class="product-details">
                        <h2 class="title">{{$data->title}}</h2>
                        <p class="form-group">
                            <span>{{$data->category}}</span>
                        </p>
                        <p class="form-group">
                            <span>₱{{$data->price}}</span>
                        </p>
                        <p class="form-group">
                            <label for="description"></label>
                            <span>{{$data->description}}</span>
                        </p>
                        <p class="form-group">
                            <label for="quantity">Available Quantity:</label>
                            <span>{{$data->quantity}}</span>
                        </p>
                        <div class="icons">
                            <form action="{{url('add_cart', $data->id)}}" method="Post">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="quantity" class="form-label mb-0">Quantity:</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1">
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block mt-3">Add to Cart</button>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block mt-3">Buy Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
                    
            </div>
        </div>
    </section>

    {{-- <form action="{{url('add_cart', $data->id)}}" method="Post">
        @csrf
    <div class="container mt-5">
        <!-- Product Details Section -->
        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="/productimage/{{$data->image}}" alt="{{$data->title}}" class="img-fluid" alt="Product Image">
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                <h1 class="product-title">{{$data->title}}</h1>
                <p class="product-price">₱{{$data->price}}</p>
                <p class="product-description">{{$data->description}}</p>
                <p class="product-quantity">
                    <label for="quantity">Available Quantity:</label>
                    <span>{{$data->quantity}}</span>
                </p>
                
                <!-- Quantity Selector -->
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" id="quantity" class="form-control" value="1" min="1">
                </div>
                
                <!-- Buttons -->
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Buy Now</button>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form> --}}

    <!--Featured Collection -->
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
