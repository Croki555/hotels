@php
    $startDate = request()->get('start_date', \Carbon\Carbon::now()->format('Y-m-d'));
    $endDate = request()->get('end_date', \Carbon\Carbon::now()->addDay()->format('Y-m-d'));
@endphp

<x-app-layout>
    <div class="py-14 px-4 md:px-6 2xl:px-20 2xl:container 2xl:mx-auto">
        <div class="flex flex-wrap mb-12">
            <div class="w-full flex justify-start md:w-1/3 mb-8 md:mb-0">
                <img class="h-full rounded-l-sm" src="{{route('index')}}/images/hotels/{{ $hotel->poster_url }}" alt="Room Image">
            </div>
            <div class="w-full md:w-2/3 px-4">
                <div class="text-2xl font-bold">{{ $hotel->title }}</div>
                <div class="flex items-center">
                    {{ $hotel->address }}
                </div>
                <div>{{ $hotel->description }}</div>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="text-2xl text-center md:text-start font-bold">Забронировать комнату</div>

            <form method="get" action="{{ url()->current() }}">
                <div class="flex flex-wrap my-6">
                    <div class="flex flex-wrap items-center mr-5">
                        <div class="relative">
                            <input name="start_date" value="{{ $startDate }}"
                                   placeholder="Дата заезда" type="date"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5">
                        </div>
                        <span class="mx-4 text-gray-500">по</span>
                        <div class="relative">
                            <input name="end_date" type="date" value="{{ $endDate }}"
                                   placeholder="Дата выезда"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5">
                        </div>
                    </div>
                    <div>
                        <x-the-button type="submit" class=" h-full w-full">Загрузить номера</x-the-button>
                    </div>
                </div>
            </form>
            @if(count($rooms) === 0)
                <div>
                    <h2>Нет свободных комнат с {{ $startDate }} по {{ $endDate }}</h2>
                </div>
            @else
                <div class="flex flex-col w-full lg:w-4/5">
                    @foreach($rooms as $room)
                        @if(\App\Models\Booking::where('room_id', $room->id)->first() == true)
                            <x-rooms.room-list-item :booked="true" :room="$room" :startDate="$startDate" :endDate="$endDate" class="mb-4"/>
                            @else
                            <x-rooms.room-list-item :booked="false" :room="$room" :startDate="$startDate" :endDate="$endDate" class="mb-4"/>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
