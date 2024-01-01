<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-2xl mb-4">Комнаты</h2>
            @if(count($rooms) === 0)
                <h3>Комнат нет</h3>
            @else
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-6">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Название</th>
                            <th scope="col" class="px-6 py-3">Фото</th>
                            <th scope="col" class="px-6 py-3">Описание</th>
                            <th scope="col" class="px-6 py-3">Площадь</th>
                            <th scope="col" class="px-6 py-3">Тип</th>
                            <th scope="col" class="px-6 py-3">Цена</th>
                            <th scope="col" class="px-6 py-3">Отель</th>
                            <th scope="col" class="px-6 py-3">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rooms as $room)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                                <td class="px-6 py-4">{{ $room->title }}</td>
                                <td class="px-6 py-4">
                                    <img class="h-10 w-20" src="{{ route('index') }}/images/rooms/{{ $room->poster_url }}"
                                         alt="Отель {{ $room->title }}">
                                </td>
                                <td class="px-6 py-4">{{ $room->description }}</td>
                                <td class="px-6 py-4">{{ $room->floor_area }}</td>
                                <td class="px-6 py-4">{{ $room->type }}</td>
                                <td class="px-6 py-4">{{ $room->price }}</td>
                                <td class="px-6 py-4">
                                    <img class="h-10 w-20" src="{{ route('index') }}/images/hotels/{{ $room->hotel->poster_url }}"
                                         alt="Отель {{ $room->hotel->id }}">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="inline-flex rounded-md shadow-sm" role="group">
                                        <button
                                            onclick="window.location=(`{{ route('admin.rooms.edit', ['id' => $room->id]) }}`)"
                                            class="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-s-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                            Изменить
                                        </button>
                                        <form class="relative w-full"
                                              action="{{ route('admin.rooms.delete', ['id' => $room->id]) }}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-e-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                                Удалить
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            {{ $rooms->links() }}
            <h2 class="text-2xl mb-6">Добавить комнату</h2>
            <form class="max-w-sm" action="{{ route('admin.rooms') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <x-label for="title">Название</x-label>
                    <x-input name="title" class="w-full p-2.5" type="text" id="title"
                             value="{{ old('title') ?? 'Тест' }}" required></x-input>
                    <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                </div>
                <div class="mb-5">
                    <x-label for="description">Описание</x-label>
                    <label for="description"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                    <x-textarea class="w-full p-2.5" name="description" id="description"
                                value="{{ old('description') ?? 'Тест' }}" required></x-textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>
                <div class="mb-5">
                    <x-label for="type">Тип комнаты</x-label>
                    <x-input name="type" class="w-full p-2.5" type="text" id="type"
                             value="{{ old('type') ?? 'Тест' }}" required></x-input>
                    <x-input-error :messages="$errors->get('type')" class="mt-2"/>
                </div>
                <div class="mb-5">
                    <x-label for="price">Цена</x-label>
                    <x-input name="price" class="w-full p-2.5" type="number" id="price"
                             value="{{ old('price') }}" required></x-input>
                    <x-input-error :messages="$errors->get('price')" class="mt-2"/>
                </div>
                <div class="mb-5">
                    <x-label for="floor_area">Площадь</x-label>
                    <x-input name="floor_area" class="w-full p-2.5" type="text" id="floor_area"
                             value="{{ old('floor_area') }}" required pattern="^[0-9]{1,8}.[0-9]{1,2}$" placeholder="3.2" title="3.2 максимум 99999999.99"></x-input>
                    <x-input-error :messages="$errors->get('floor_area')" class="mt-2"/>
                </div>
                <div class="mb-5">
                    <x-label for="hotel">Выбрать отель</x-label>
                    <select id="hotel" name="hotel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option @if(!old('hotel')) selected @endif disabled>Отель</option>
                        @foreach($hotels as $hotel)
                            <option @if($hotel->id === old('hotel')) selected @endif  value="{{ $hotel->id }}">{{ $hotel->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-5">
                    <x-label for="image">Фото</x-label>
                    <x-input name="image" class="w-full p-2.5" type="file" id="image"
                             value="{{ old('image') }}" required></x-input>
                    <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                </div>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Add') }}</x-primary-button>

                    @if (session('status') === 'success')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
