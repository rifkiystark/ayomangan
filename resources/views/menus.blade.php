@extends('layouts.indukhome')
@section('content')
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="{{ url('menus') }}" method="GET">
            <input type="search" name="s" value="@if($s && $s != ''){{ $s }}@endif" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->
@if($s && $s != '')
<section class="food-search text-center" style="background: #48b4d1;">
    <div class="container">

        <h2>Foods on Your Search <a href="#" class="text-white">"{{ $s }}"</a></h2>

    </div>
</section>
@endif


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

</section>

@endsection