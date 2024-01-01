<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    public function hotels()
    {
        $hotels = Hotel::paginate(5);
        $rooms = Room::all();
        return view('admin.hotels.index', [
            'hotels' => $hotels,
            'rooms' => $rooms
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['unique:hotels,title'],
            'image' => 'image',
        ], [
            'title.unique' => 'Отель с данным названием уже существует',
            'image.image' => 'Файл должен быть изображением',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }
        $image = $request->file('image');
        $exten = $image->getClientOriginalExtension();
        $imageName = Str::random(10) . '.' . $exten;
        Storage::putFileAs('./public/images/hotels', $image, $imageName);

        $hotel = new Hotel();
        $hotel->title = $request->title;
        $hotel->description = $request->description;
        $hotel->address = $request->address;
        $hotel->poster_url = $imageName;
        $hotel->save();

        return redirect()->route('admin.hotels')->with('status', 'success');

    }

    public function hotelsEdit(int $id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('admin.hotels.edit', [
            'id' => $id,
            'hotel' => $hotel
        ]);
    }

    public function editHotel(int $id, Request $request)
    {
        $hotel = Hotel::find($id);
        $validator = Validator::make($request->all(), [
            'title' => ['unique:hotels,title'],
            'image' => 'image',
        ], [
            'title.unique' => 'Отель с данным названием уже существует',
            'image.image' => 'Файл должен быть изображением'
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }else {
            $image = $request->file('image');
            $exten = $image->getClientOriginalExtension();
            $imageName = Str::random(10) . '.' . $exten;
            Storage::delete("./public/images/hotels/$hotel->poster_url");
            Storage::putFileAs('./public/images/hotels', $image, $imageName);
            $hotel = Hotel::where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'poster_url' => $imageName,
                'updated_at' => now()
            ]);
            return redirect()->route('admin.hotels.edit', ['id' => $id])->with('status', 'success');
        }
    }

    public function deleteHotel(int $id)
    {
        $hotel = Hotel::find($id);
        Storage::delete("./public/images/hotels/$hotel->poster_url");
        $hotel->delete();
        return redirect(route('admin.hotels'));
    }
}
