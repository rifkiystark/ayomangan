<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Menu;
use App\Models\Place;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function dashboard()
    {
        $data['active'] = 'dashboard';
        $data['menu'] = Menu::count();
        $data['place'] = Place::count();
        return view('dashboard', $data);
    }
    public function place()
    {
        $data['active'] = 'place';
        $data['places'] = Place::with(['images'])->get();
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
        $place = Place::with(['images', 'menus', 'menus.images'])->find($id);

        foreach ($place->images as $image) {
            $path = public_path() . "/image/" . $image->name;
            unlink($path);

            $image->delete();
        }

        foreach ($place->menus as $menu) {
            foreach ($menu->images as $image) {
                $path = public_path() . "/image/" . $image->name;
                unlink($path);

                $image->delete();
            }

            $menu->delete();
        }

        $place->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Data');

        return redirect('/place');
    }

    public function menu(Request $request, $id)
    {
        $data['active'] = 'place';
        $data['placeId'] = $id;
        $data['place'] = Place::find($id);
        $data['menus'] = Menu::with(['images'])->where('place_id', $id)->get();
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

        return redirect('menu/' . $place_id);
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

        return redirect('menu/' . $place_id);
    }

    public function deleteMenu(Request $request, $place_id, $id)
    {
        $menu = Menu::with(['images'])->find($id);
        foreach ($menu->images as $image) {
            $path = public_path() . "/image/" . $image->name;
            unlink($path);

            $image->delete();
        }

        $menu->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Data');

        return redirect('menu/' . $place_id);
    }

    public function deleteImage(Request $request, $place_id, $id)
    {
        $image = Image::find($id);

        $path = public_path() . "/image/" . $image->name;
        unlink($path);

        $image->delete();


        Alert::success('Berhasil', 'Berhasil Menghapus Data');

        if ($place_id == -1) {
            return redirect('place');
        } else {
            return redirect('menu/' . $place_id);
        }
    }

    public function addImage(Request $request)
    {
        $type = $request->type;
        $id = $request->id;
        if ($type == 1) {
            $typeName = "place";
        } else {
            $typeName = "menu";
        }
        $file = $request->file('file');
        $tujuan_upload = 'image'; //nama folder
        $uuid = (string) Str::uuid();
        $filename = $typeName . '-' . $uuid . '-' . $id . '.' . $file->getClientOriginalExtension();
        $file->move($tujuan_upload, $filename);

        $image = new Image();
        $image->type = $type;
        $image->name = $filename;
        if ($type == 1) {
            $image->place_id = $id;
        } else {
            $image->menu_id = $id;
            $id = Menu::find($id)->place_id;
        }
        $image->save();

        if ($type == 1) {
            return redirect('place');
        } else {
            return redirect('menu/' . $id);
        }
    }
}
