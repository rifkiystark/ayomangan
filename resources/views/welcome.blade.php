@extends('layouts.indukhome')
@section('content')

<!-- fOOD & Drinks sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <p style="font-family:courier;">Selamat Datang di website Ayo Mangan
        </p>
        <form action="{{ url('menus') }}" method="GET">
            <input type="search" name="s" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>


    </div>
</section>
<!-- fOOD & Drinks sEARCH Section Ends Here -->

<div class="accordian">
    <ul>
        <li>
            <div class="image_title">
                <a href="#">Home</a>
            </div>
            <a href="#">
                <img src="{{ asset('home/slidecard/1.jpg') }}" />
            </a>
        </li>
        <li>
            <div class="image_title">
                <a href="#">Ada pilihan kategori yang bisa dipilih</a>
            </div>
            <a href="#">
                <img src="{{ asset('home/slidecard/2.jpg') }}" />
            </a>
        </li>
        <li>
            <div class="image_title">
                <a href="#">Ada Kategori Makanan</a>
            </div>
            <a href="#">
                <img src="{{ asset('home/slidecard/3.jpg') }}" />
            </a>
        </li>
        <li>
            <div class="image_title">
                <a href="#">Ada Kategori Minuman</a>
            </div>
            <a href="#">
                <img src="{{ asset('home/slidecard/4.jpg') }}" />
            </a>
        </li>

    </ul>
</div>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Restaurants</h2>

        @foreach($restaurants as $restaurant)
        <a href="{{ url('menuresto/'.$restaurant->id )}}">
            <div class="box-3 float-container">
                @if(sizeof($restaurant->images) == 0)
                <img src="{{ asset('home/images/pizza.jpg') }}" alt="{{ $restaurant->name }}" class="img-responsive img-curve">
                @else
                <img src="{{ asset('image/'.$restaurant->images[0]->name) }}" alt="{{ $restaurant->name }}" class="img-responsive img-curve">
                @endif
                <h3 class="float-text text-white">{{ $restaurant->name }}</h3>
            </div>
        </a>

        @endforeach



        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        @foreach($menus as $menu)
        <div class="food-menu-box">
            <div class="food-menu-img">
                @if(sizeof($menu->images) == 0)
                <img src="{{ asset('home/images/menu-pizza.jpg') }}" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                @else
                <img src="{{ asset('image/'.$menu->images[0]->name) }}" alt="{{ $menu->name }}" class="img-responsive img-curve">
                @endif
            </div>

            <div class="food-menu-desc">
                <h4>{{ $menu->name }}</h4>
                <!-- <img src="{{ asset('home/images/m_star.png') }}">
                    <img src="{{ asset('home/images/m_star.png') }}">
                    <img src="{{ asset('home/images/m_star.png') }}">
                    <img src="{{ asset('home/images/m_star.png') }}"> -->

                <p class="food-detail" style="margin-top: 8px;">
                    {{ $menu->description }}
                </p>
                <br>

                <!-- <a href="#" class="btn btn-primary">Rating Now</a> -->
            </div>
        </div>
        @endforeach


        <div class="clearfix"></div>

    </div>

    <p class="text-center">
        <a href="{{ url('menus') }}">See All Foods</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->
@endsection