<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-2xl mb-4">Бронирования пользователя: {{ $user->name }}</h2>
            <div class="overflow-hidden">
                @if($bookings->isNotEmpty())
                    <div class="flex flex-col w-full gap-6">
                        @foreach($bookings as $booking)
                            <div class="flex flex-col @if($loop->even) flex-row-reverse @else sm:flex-row @endif shadow-md">
                                <div class="h-full w-full md:w-2/5">
                                    <div class="h-64 w-full bg-cover bg-center bg-no-repeat"
                                         style="background-image: url({{route('index')}}/images/rooms/{{ $booking->room->poster_url }})">
                                    </div>
                                </div>
                                <div class="p-4 w-full md:w-3/5 flex flex-col justify-between">
                                    <div class="flex justify-between">
                                        <div>
                                            <div class="text-2xl font-bold">
                                                Отель: <span class="text-gray-500">{{ $booking->room->hotel->title }}</span>
                                            </div>
                                            <div class="text-xl font-bold">
                                                Комната: <span class="text-gray-500">{{ $booking->room->title }}</span>
                                            </div>
                                            <div>
                                                <span>•</span> {{ $booking->room->floor_area }}
                                            </div>
                                            <div>
                                                @foreach($booking->room->facilities as $facility)
                                                    <span>• {{ $facility->title }} </span>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div>
                                            <form method="POST" action="{{ route('admin.bookings.delete', ['id' => $booking->id, 'user' => $booking->user_id] ) }}">
                                                @csrf
                                                @method('DELETE')
                                                <x-the-button type="submit" class="h-full w-full">{{ __('Cancel Booking') }}</x-the-button>
                                            </form>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="flex justify-end pt-2">
                                        <div class="flex flex-col">
                                            <span class="text-lg font-bold">{{ $booking->room->price }} руб.</span>
                                            <span>за 1 ночь</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <h1 class="text-lg md:text-xl font-semibold text-gray-800">Нет бронирований</h1>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
