@extends('layouts.indukhome')
@section('content')
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

@endsection