<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-2xl mb-6">Отели</h2>
            @if(count($hotels) === 0)
                <h3>Отелей нет</h3>
            @else
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <table class="w-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-6">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Название</th>
                            <th scope="col" class="px-6 py-3">Фото</th>
                            <th scope="col" class="px-6 py-3">Описание</th>
                            <th scope="col" class="px-6 py-3">Адрес</th>
                            <th scope="col" class="px-6 py-3">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hotels as $hotel)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                                <td class="px-6 py-4">{{ $hotel->title }}</td>
                                <td class="px-6 py-4">
                                    <img class="h-10 w-20" src="{{ route('index') }}/images/hotels/{{ $hotel->poster_url }}"
                                         alt="Отель {{ $hotel->title }}">
                                </td>
                                <td class="px-6 py-4">{{ $hotel->description }}</td>
                                <td class="px-6 py-4">{{ $hotel->address }}</td>
                                <td class="px-6 py-4">
                                    <div class="inline-flex rounded-md shadow-sm" role="group">
                                        <button
                                            onclick="window.location=(`{{ route('admin.hotels.edit', ['id' => $hotel->id]) }}`)"
                                            class="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-s-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                            Изменить
                                        </button>
                                        <form class="relative w-full"
                                              action="{{ route('admin.hotels.delete', ['id' => $hotel->id]) }}"
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
            {{ $hotels->links() }}
            <h2 class="text-2xl mb-6">Добавить отель</h2>
            <form class="max-w-xl" action="{{ route('admin.hotels') }}" method="post" enctype="multipart/form-data">
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
                    <x-label for="address">Адрес</x-label>
                    <x-input name="address" class="w-full p-2.5" type="text" id="address"
                             value="{{ old('address') ?? 'Тест' }}" required></x-input>
                    <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                </div>
                <div class="mb-5">
                    <x-label for="image">Фото</x-label>
                    <x-input name="image" class="w-full p-2.5" type="file" id="image"
                             value="{{ old('image') }}" required></x-input>
                    <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                </div>
                <div class="flex items-center gap-4">
                    <x-primary-button type="submit">{{ __('Add') }}</x-primary-button>

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
