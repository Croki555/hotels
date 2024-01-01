<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function rooms()
    {
        $rooms = Room::latest()->paginate(5);
        $hotels = Hotel::all();
        return view('admin.rooms.index', [
            'rooms' => $rooms,
            'hotels' => $hotels
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['unique:rooms,title'],
            'image' => 'image',
        ], [
            'title.unique' => 'Комната с данным названием уже существует',
            'image.image' => 'Файл должен быть изображением'
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }else {
            $image = $request->file('image');
            $exten = $image->getClientOriginalExtension();
            $imageName = Str::random(10) . '.' . $exten;

            $room = new Room();
            $room->title = $request->title;
            $room->description = $request->description;
            $room->poster_url = $imageName;
            Storage::putFileAs('./public/images/rooms', $image, $imageName);
            $room->floor_area = $request->floor_area;
            $room->type = $request->type;
            $room->price = $request->price;
            $room->hotel_id = $request->hotel;
            $room->save();
            return redirect()->route('admin.rooms')->with('status', 'success');
        }
    }

    public function roomsEdit(int $id)
    {
        $room = Room::findOrFail($id);
        $hotels = Hotel::all();
        return view('admin.rooms.edit', [
            'id' => $id,
            'room' => $room,
            'hotels' => $hotels
        ]);
    }

    public function editRoom(int $id, Request $request)
    {
        $room = Room::find($id);
        $validator = Validator::make($request->all(), [
            'title' => ['unique:rooms,title'],
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

            Storage::delete("./public/images/rooms/$room->poster_url");
            Storage::putFileAs('./public/images/rooms', $image, $imageName);
            $room = Room::where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'floor_area' => $request->floor_area,
                'type'=> $request->type,
                'price'=> $request->price,
                'hotel_id'=> $request->hotel,
                'poster_url' => $imageName,
                'updated_at' => now()
            ]);
            return redirect()->route('admin.rooms.edit', ['id' => $id])->with('status', 'success');
        }
    }

    public function deleteRoom(int $id)
    {
        $room = Room::find($id);
        Storage::delete("./public/images/rooms/$room->poster_url");
        $room->delete();
        return redirect(route('admin.rooms'));
    }
}
