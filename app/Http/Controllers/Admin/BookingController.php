<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{
    public function index(int $user)
    {
        $user = User::findOrFail($user);
        $bookings = Booking::where('user_id', $user->id)->get();
        return view('admin.bookings.index', [
            'user' => $user,
            'bookings' => $bookings
        ]);
    }

    public function deleteBooking(int $id, int $user)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return Redirect::to("/admin-bookings/{$user}");
    }
}
