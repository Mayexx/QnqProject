<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="{{ asset('imgs/qnq_logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="admin/assets/css/maps/home.css">
    <link rel="stylesheet" href="admin/assets/css/maps/show_cart.css">
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
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="#">New</a></li>
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
@if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session()->get('message') }}
        </div>
@endif

<div class="container">
    <h5 class="title mb-4">Your Cart</h5>

    <div class="cart-table">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $totalprice = 0; ?>
                @foreach ($cart as $item)
                <tr>
                    <td>{{$item->product_title}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>₱{{$item->price}}</td>
                    <td><img src="/productimage/{{$item->image}}" alt="{{$item->product_title}}" class="product-image" width="100"></td>
                    <td><a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this product?')" href="{{url('remove_cart', $item->id)}}">Remove</a></td>
                </tr>
                <?php $totalprice += $item->price; ?>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="total-price mt-4">
        <h5>Total Price: ₱{{$totalprice}}</h5>
    </div>

    <div class="but mt-4">
        <h2 class="mb-3">Proceed to Order</h2>
        <a href="{{url('cash_order')}}" class="btn btn-success">Cash on Delivery</a>
        <a href="{{URL('Stripe')}}" class="btn btn-success">Pay with Card</a>
    </div>
</div>




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
