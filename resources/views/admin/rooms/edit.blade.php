<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap mb-12">
                <div class="w-full flex justify-start md:w-1/3 mb-8 md:mb-0">
                    <img class="h-full rounded-l-sm" src="{{ route('index') }}/images/rooms/{{ $room->poster_url }}"
                         alt="Отель {{ $room->title }}">
                </div>
                <div class="w-full md:w-2/3 px-4">
                    <div class="text-2xl font-bold">
                        <h1>Комната: <span class="text-gray-500">{{ $room->title }}</span></h1>
                    </div>
                    <ul>
                        <li>
                            <h3>Тип комнаты: <span class="text-gray-500">{{ $room->floor_area }}</span></h3>
                        </li>
                        <li>
                            <h3>Цена: <span class="text-gray-500">{{ $room->price }}₽</span></h3>
                        </li>
                        <li>
                            <h3>Описание: <span class="text-gray-500">{{ $room->description }}</span></h3>
                        </li>
                        <li>
                            <h3>Отель: <span class="text-gray-500">{{ $room->hotel->title }}</span></h3>
                        </li>
                        <li>
                            <h3>Создано: <span class="text-gray-500">{{ $room->created_at }}</span></h3>
                        </li>
                        <li>
                            <h3>Последнее обновление: <span class="text-gray-500">{{ $room->updated_at }}</span></h3>
                        </li>
                    </ul>
                </div>
            </div>
            <form class="max-w-sm" action="{{ route('admin.rooms.edit', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

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
