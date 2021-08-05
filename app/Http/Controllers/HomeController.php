<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Place;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $restaurants = Place::with(['images'])->limit(6)->get();
        $menus = Menu::with(['images'])->limit(6)->get();
        // return json_encode($restaurants);
        return view('welcome', ['restaurants' => $restaurants, 'menus' => $menus]);
    }
    public function restaurants()
    {
        $restaurants = Place::with(['images'])->get();
        // return json_encode($restaurants);
        return view('restaurants', ['restaurants' => $restaurants]);
    }

    public function menus(Request $request)
    {
        $s = $request->s;

        if($s && $s != ''){
            $menus = Menu::where('name','like', '%'.$s.'%')->with(['images'])->get();
        } else {
            $menus = Menu::with(['images'])->get();
        }
        // return json_encode($restaurants);
        return view('menus', ['menus' => $menus, 's' => $s]);
    }
    public function menuresto(Request $request, $id)
    {
        $s = $request->s;

        $resto = Place::find($id);

        if($s && $s != ''){
            $menus = Menu::where('place_id','=',$id)->where('name','like', '%'.$s.'%')->with(['images'])->get();
        } else {
            $menus = Menu::where('place_id','=',$id)->with(['images'])->get();
        }
        // return json_encode($restaurants);
        return view('menuresto', ['menus' => $menus, 's' => $s,'id' => $id, 'resto' => $resto]);
    }
}
