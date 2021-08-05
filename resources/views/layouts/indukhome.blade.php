<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!-- Important to make website responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ayo Mangan Website</title>
  <link rel="shortcut icon" href="images/logo.png') }}" type="image/x-icon" alt="Restaurant Logo" class="img-responsive">
  <meta name="description" content="Website Informasi dan Database Rating Makanan" />
  <meta name="author" content="Aditya Budi ['18102002@aditya.if06sc1.xyz']" />
  <meta name="group" content="ID ['id@id.if06sc1.xyz']" />

  <!-- Link our CSS file -->
  <link rel="stylesheet" href="{{asset('home/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('home/css/style2.css')}}">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
  <style>
    sticknav {
      background: #FAEBD7;
      height: 123px;
      width: 100%;
      margin-right: 0px;
      margin-left: 0px;
      left: 0px;
      right: 0px;
      position: relative;
      z-index: 9999;
    }

    .fixed {
      position: fixed;
    }
  </style>
</head>

<body>
  <!-- Navbar Section Starts Here -->

  <!--Kode HTML Navigasi Menu Anda di Sini-->

  <section class="navbar">
    <sticknav>
      <div class="container">
        <div class="logo">
          <a href="#" title="Logo">
            <img src="{{ asset('home/images/logo.png') }}" alt="Restaurant Logo" class="img-responsive">
          </a>
        </div>

        <div class="menu text-right">
          <ul>
            <li>
              <a href="{{ url('/') }}">Home</a>
            </li>
            <li>
              <a href="{{ url('restaurants') }}">Restaurants</a>
            </li>
            <li>
              <a href="{{ url('menus') }}">Menus</a>
            </li>
            @if (Route::has('login'))
            @auth
            @if(Auth::user()->role == 'admin')
            <li>
              <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
            </li>
            @endif
            <li>
              <a href="{{ url('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
            @else
            <li>

              <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
            </li>

            @if (Route::has('register'))
            <li>

              <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            </li>
            @endif
            @endauth
            @endif
          </ul>
        </div>

        <div class="clearfix"></div>
      </div>
    </sticknav>
  </section>
  <!-- Navbar Section Ends Here -->

  @yield('content')

  <!-- social Section Starts Here -->
  <section class="social">
    <div class="container text-center">
      <ul>
        <li>
          <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png" /></a>
        </li>
        <li>
          <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" /></a>
        </li>
        <li>
          <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png" /></a>
        </li>
      </ul>
    </div>
  </section>
  <!-- social Section Ends Here -->

  <!-- footer Section Starts Here -->
  <section class="footer">
    <div class="container text-center">
      <p>All rights reserved. Designed By <a href="#">Aditya Budi | ID</a></p>

    </div>
  </section>
  <!-- footer Section Ends Here -->

  <script type="text/javascript">
    $(document).ready(function() {
      var aboveHeight = $('header').outerHeight();
      $(window).scroll(function() {
        if ($(window).scrollTop() > aboveHeight) {
          $('sticknav').addClass('fixed').css('top', '0').next().css('padding-top', '60px');
        } else {
          $('sticknav').removeClass('fixed').next().css('padding-top', '0');
        }
      });
    });
  </script>
</body>

</html>