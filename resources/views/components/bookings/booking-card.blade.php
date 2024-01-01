@php
    use App\Models\Booking;
    $cancelBooking = Booking::where('room_id', $booking->room->id)->where('user_id', auth('web')->user()->id)->count();
    $startDate = request()->get('start_date', \Carbon\Carbon::now()->format('Y-m-d'));
    $endDate = request()->get('end_date', \Carbon\Carbon::now()->addDay()->format('Y-m-d'));
@endphp
<div {{ $attributes->merge(['class' => 'flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8']) }}>
    <div class="flex flex-col justify-start items-start bg-gray-50 px-4 py-4 md:px-6 xl:px-8 w-full">
        <div class="flex flex-col sm:flex-row gap-4 justify-between w-full py-2 border-b border-gray-200">
            <div class="w-auto">
                <p class="text-lg md:text-xl font-semibold leading-6 xl:leading-5 text-gray-800">Бронирование
                    #{{ $booking->id }}</p>
                <p class="text-base font-medium leading-6 text-gray-600 ">{{ $booking->created_at->format('d-m-y H:i') }}</p>
            </div>
            @if($showLink ?? false)
            <div class="flex">
                <x-link-button href="{{ route('bookings.show', ['booking' => $booking]) }}">Подробнее</x-link-button>
            </div>
            @endif
        </div>
        <div class="mt-4 md:mt-6 flex flex-col md:flex-row justify-start items-start md:space-x-6 w-full">
            <div class="pb-4 w-full md:w-2/5">
                <img class="w-full block" src="{{route('index')}}/images/rooms/{{ $booking->room->poster_url }}" alt="image"/>
            </div>
            <div
                class="md:flex-row flex-col flex justify-between items-start w-full md:w-3/5 pb-8 space-y-4 md:space-y-0">
                <div class="w-full flex flex-col justify-start items-start space-y-8">
                    <h3 class="text-xl xl:text-2xl font-semibold leading-6 text-gray-800">{{ $booking->room->title }}</h3>
                    <div class="flex h-full justify-start items-start flex-col space-y-2">
                        <p class="text-sm leading-none text-gray-800"><span>Даты: </span>
                            {{ \Carbon\Carbon::parse($booking->started_at)->format('d.m.Y') }}
                            по
                            {{ \Carbon\Carbon::parse($booking->finished_at)->format('d.m.Y') }}</p>
                        <form action="{{ route('bookings.edit.price', ['id' => $booking->room->id]) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="inline-flex items-center gap-4 text-sm leading-none text-gray-800">
                                <span>Кол-во ночей: <x-input style="max-width: 50px;" name="days" min="1" class="w-auto" type="number" value="{{ $booking->days }}"></x-input></span>
                                <button type="submit" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Изменить</button>
                            </div>
                        </form>
                        @if($cancelBooking === 1)
                            <form method="POST" action="{{ route('bookings.delete', ['id' => $booking->room->id] ) }}">
                                @csrf
                                <x-the-button class="h-full w-full">{{ __('Cancel Booking') }}</x-the-button>
                            </form>
                        @else
                            <form class="ml-0" method="POST" action="{{ route('bookings.store', ['id' => $booking->room->id] ) }}">
                                @csrf
                                <input type="date" class="hidden" name="started_at" value="{{ $startDate }}">
                                <input type="date" class="hidden" name="finished_at" value="{{ $endDate }}">
                                <input type="hidden" name="room_id" value="{{ $booking->room->id }}">
                                <x-the-button class=" h-full w-full">{{ __('Book') }}</x-the-button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col justify-between space-x-8 items-end w-full">
                    <p class="text-base xl:text-lg font-semibold leading-6 text-gray-800">
                        Стоимость: {{ $booking->price }} руб</p>
                </div>
            </div>
        </div>
    </div>
</div>
