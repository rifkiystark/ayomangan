<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Place;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data['active'] = 'dashboard';
        return view('dashboard', $data);
    }
    public function place()
    {
        $data['active'] = 'place';
        $data['places'] = Place::all();
        return view('place', $data);
    }
    public function addTempat(Request $request)
    {
        $name = $request->name;
        $owner = $request->owner;
        $phone = $request->phone;
        $address = $request->address;
        $description = $request->description;

        $place = new Place();
        $place->name = $name;
        $place->owner = $owner;
        $place->phone = $phone;
        $place->address = $address;
        $place->description = $description;

        $place->save();

        Alert::success('Berhasil', 'Berhasil Menambahkan Data');

        return redirect('/place');
    }

    public function editTempat(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $owner = $request->owner;
        $phone = $request->phone;
        $address = $request->address;
        $description = $request->description;

        $place = Place::find($id);
        $place->name = $name;
        $place->owner = $owner;
        $place->phone = $phone;
        $place->address = $address;
        $place->description = $description;

        $place->save();

        Alert::success('Berhasil', 'Berhasil Memperbarui Data');

        return redirect('/place');
    }

    public function deleteTempat(Request $request, $id)
    {
        Place::find($id)->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Data');

        return redirect('/place');
    }

    public function menu(Request $request, $id)
    {
        $data['active'] = 'place';
        $data['placeId'] = $id;
        $data['menus'] = Menu::all();
        return view('menu', $data);
    }

    public function addMenu(Request $request)
    {
        $name = $request->name;
        $price = $request->price;
        $description = $request->description;
        $place_id = $request->place_id;

        $menu = new Menu();
        $menu->name = $name;
        $menu->price = $price;
        $menu->description = $description;
        $menu->place_id = $place_id;
        $menu->save();

        Alert::success('Berhasil', 'Berhasil Menambah Data');

        return redirect('menu/'.$place_id);
    }

    public function editMenu(Request $request)
    {
        $place_id = $request->place_id;
        $id = $request->id;
        $name = $request->name;
        $price = $request->price;
        $description = $request->description;

        $menu = Menu::find($id);
        $menu->name = $name;
        $menu->price = $price;
        $menu->description = $description;
        $menu->save();

        Alert::success('Berhasil', 'Berhasil Memperbarui Data');

        return redirect('menu/'.$place_id);
    }

    public function deleteMenu(Request $request, $place_id, $id)
    {
        Menu::find($id)->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Data');

        return redirect('menu/'.$place_id);
    }

}
