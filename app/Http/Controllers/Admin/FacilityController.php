<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facilitie;
use App\Models\FacilitiyHotel;
use App\Models\FacilitiyRoom;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facilitie::paginate(8);
        return view('admin.facilities.index', [
            'facilities'=> $facilities
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'unique:facilities,title'
        ],[
            'title.unique' => 'Данное удобство уже существует'
        ]);
    }

    public function deleteFacility(int $id)
    {
        $facility = Facilitie::find($id);
        $facility->delete();
        return redirect(route('admin.facilities'));
    }

    public function hotelsFacility()
    {
        $hotels = Hotel::paginate(5);
        $facilities = Facilitie::all();
        return view('admin.facilities.hotels.index', [
            'hotels' => $hotels,
            'facilities'=> $facilities
        ]);
    }

    public function editHotelsFacility(Request $request)
    {
        FacilitiyHotel::where('hotel_id', $request->hotel)->delete();
        foreach ($request->facility as $facility) {
            $facilityHotel = new FacilitiyHotel();
            $facilityHotel->facilitie_id = $facility;
            $facilityHotel->hotel_id = $request->hotel;
            $facilityHotel->save();
        }
        return redirect(route('admin.hotels.facility'))->with('status', 'success');
    }

    public function delFacilityForHotel(int $hotel, int $facility)
    {
        FacilitiyHotel::where('hotel_id', $hotel)->where('facilitie_id', $facility)->delete();
        return redirect(route('admin.hotels.facility'));
    }

    public function roomsFacility()
    {
        $rooms = Room::paginate(5);
        $facilities = Facilitie::all();
        return view('admin.facilities.rooms.index', [
            'rooms' => $rooms,
            'facilities'=> $facilities
        ]);
    }

    public function editRoomsFacility(Request $request)
    {
        FacilitiyRoom::where('room_id', $request->room)->delete();
        foreach ($request->facility as $facility) {
            $facilityRoom = new FacilitiyRoom();
            $facilityRoom->facilitie_id = $facility;
            $facilityRoom->room_id = $request->room;
            $facilityRoom->save();
        }
        return redirect(route('admin.rooms.facility'))->with('status', 'success');
    }

    public function delFacilityForRoom(int $room, int $facility)
    {
        FacilitiyRoom::where('room_id', $room)->where('facilitie_id', $facility)->delete();
        return redirect(route('admin.rooms.facility'));
    }


}
