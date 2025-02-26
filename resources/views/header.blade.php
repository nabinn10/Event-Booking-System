<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- font awesome cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body>
    <nav class="flex px-20 py-2 bg-white justify-between items-center shadow-lg sticky top-0 z-30">
        <a href="{{route('home')}}"><img src="{{ asset('logo/logo.png') }}" alt="" class="h-16"></a>
        <form action="{{ route('search') }}" method="GET"
            class="flex items-center justify-center space-x-2 w-full max-w-md mx-auto">
            <input type="search" name="query"
                class="border border-gray-300 p-2 w-full sm:w-2/3 md:w-1/2 rounded-l-lg"
                placeholder="Search Any Packages">
            <button type="submit" class="bg-blue-600 text-white p-2 rounded-r-lg flex items-center">
                <i class="ri-search-line"></i>
            </button>
        </form>

        <div class="flex gap-5">
            <a href="{{ route('home') }}"><i class="ri-home-line"></i> Home</a>
            <a href="{{ route('about') }}"><i class="ri-information-line"></i> About</a>
            <a href="{{ route('contact') }}"><i class="ri-contacts-line"></i> Contact</a>
            @auth
                <div class="relative group">
                    <i class="ri-user-fill p-2 cursor-pointer bg-gray-100 rounded-full"></i>
                    <div class="absolute right-0 top-7 w-48 bg-gray-100 rounded-lg hidden group-hover:block">
                        <p class="p-2 hover:bg-gray-200 cursor-pointer rounded-lg">Hi, {{ auth()->user()->name }}</p>
                        <a href="{{ route('cart.index') }}" class="p-2 block hover:bg-gray-200 cursor-pointer rounded-lg">
                            <i class="ri-shopping-cart-line"></i> My Cart
                        </a>
                        <a href="{{ route('myorders') }}" class="p-2 block hover:bg-gray-200 cursor-pointer rounded-lg">
                            <i class="ri-shopping-bag-line"></i> My Orders
                        </a>
                        <form action="{{ route('logout') }}" method="post" class="p-2 hover:bg-gray-200 rounded-lg">
                            @csrf
                            <button type="submit">
                                <i class="ri-logout-box-line"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <a href="{{ route('login') }}">Login</a>
        @endauth
        </div>
    </nav>

    @yield('content')

    <footer class="bg-blue-600 mt-10 py-4 px-20 ">
        <p class="text-center text-white">Copyright &copy; {{ date('Y') }} | All Rights Reserved | Event Booking
            System </p>
    </footer>
</body>

</html>
