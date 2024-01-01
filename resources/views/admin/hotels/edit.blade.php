<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap mb-12">
                <div class="w-full flex justify-start md:w-1/3 mb-8 md:mb-0">
                    <img class="h-full rounded-l-sm" src="{{ route('index') }}/images/hotels/{{ $hotel->poster_url }}"
                         alt="Отель {{ $hotel->title }}">
                </div>
                <div class="w-full md:w-2/3 px-4">
                    <div class="text-2xl font-bold">
                        <h1>Отель: <span class="text-gray-500">{{ $hotel->title }}</span></h1>
                    </div>
                    <ul>
                        <li>
                            <h3>Адрес: <span class="text-gray-500">{{ $hotel->address }}</span></h3>
                        </li>
                        <li>
                            <h3>Описание: <span class="text-gray-500">{{ $hotel->description }}</span></h3>
                        </li>
                        <li>
                            <h3>Создано: <span class="text-gray-500">{{ $hotel->created_at }}</span></h3>
                        </li>
                        <li>
                            <h3>Последнее обновление: <span class="text-gray-500">{{ $hotel->updated_at }}</span></h3>
                        </li>
                    </ul>
                </div>
            </div>
            <form class="max-w-sm" action="{{ route('admin.hotels.edit', ['id' => $id]) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <x-label for="title">Название</x-label>
                    <x-input name="title" class="w-full p-2.5" type="text" id="title"
                             value="{{ old('title') }}" required></x-input>
                    <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                </div>
                <div class="mb-5">
                    <x-label for="description">Описание</x-label>
                    <label for="description"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                    <x-textarea class="w-full p-2.5" name="description" id="description"
                                value="{{ old('description') }}" required></x-textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>
                <div class="mb-5">
                    <x-label for="address">Адрес</x-label>
                    <x-input name="address" class="w-full p-2.5" type="text" id="address"
                             value="{{ old('address') }}" required></x-input>
                    <x-input-error :messages="$errors->get('address')" class="mt-2"/>
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
