@php
    use App\Models\Booking;
    $cancelBooking = Booking::where('room_id', $room->id)->count();
@endphp
<div {{ $attributes->merge(['class' => 'flex flex-col md:flex-row shadow-md']) }}>
    <div class="h-full w-full md:w-2/5">
        <div class="h-64 w-full bg-cover bg-center bg-no-repeat" style="background-image: url({{route('index')}}/images/rooms/{{ $room->poster_url }})">
        </div>
    </div>
    <div class="p-4 w-full md:w-3/5 flex flex-col justify-between">
        <div class="pb-2">
            <div class="text-xl font-bold">
                {{ $room->title }}
            </div>
            <div>
               <span>•</span> {{ $room->floor_area }}
            </div>
            <div>
                    @foreach($room->facilities as $facility)
                        <span>• {{ $facility->title }} </span>
                    @endforeach
            </div>
        </div>
        <hr>
        <div class="flex justify-end pt-2">
            <div class="flex flex-col">
                @if($booked)
                    <h2 class="text-2xl">Забронирована</h2>
                    @else
                    <span class="text-lg font-bold price">{{ $room->price }} руб.</span>
                    <span>за 1 ночь</span>
                @endif
            </div>
            @if($cancelBooking !== 1)
                <form class="ml-4" method="POST" action="{{ route('bookings.store', ['id' => $room->id] ) }}">
                    @csrf
                    <input type="date" class="hidden" name="started_at" value="{{ $startDate }}">
                    <input type="date" class="hidden" name="finished_at" value="{{ $endDate }}">
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <x-the-button class=" h-full w-full">{{ __('Book') }}</x-the-button>
                </form>
            @endif
        </div>
    </div>
</div>
