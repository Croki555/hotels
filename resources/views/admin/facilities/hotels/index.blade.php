<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid xl:grid-cols-2 gap-6">
                <div>
                    <h2 class="text-2xl mb-4">Удобства отелей</h2>
                    <table class="w-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-6">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Отель</th>
                            <th scope="col" class="px-4 py-3">Фото</th>
                            <th scope="col" class="px-4 py-3">Удобства</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hotels as $hotel)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-4 py-3">{{ $hotel->title }}</td>
                                <td class="px-4 py-3">
                                    <img class="h-10 w-20" src="{{ route('index') }}/images/hotels/{{ $hotel->poster_url }}"
                                         alt="Отель {{ $hotel->title }}">
                                </td>
                                <td class="px-4 py-3">
                                    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                        @foreach($hotel->facilities as $facility)
                                            <li>
                                                <div class="inline-flex gap-4">
                                                    <span class="text-gray-500">{{ $facility->title }}</span>
                                                    <form class="w-auto" action="{{ route('admin.hotels.facility.del', ['hotel' => $hotel->id, 'facility' => $facility->id]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-undo" aria-label="Close">
                                                            <span class="sr-only">Close</span>
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $hotels->links() }}
                </div>
                <div>
                    <h2 class="text-2xl mb-4">Изменить удобства</h2>
                    <form action="{{ route('admin.hotels.facility') }}" method="post">
                        @csrf
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
                            <x-label for="hotel">Удобства</x-label>
                            <ul class="grid grid-cols-2 gap-4 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @foreach($facilities as $facility)
                                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <x-input name="facility[]" id="facility-{{ $facility->id }}" type="checkbox" value="{{ $facility->id }}"></x-input>
                                            <label for="facility-{{ $facility->id }}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $facility->title }}</label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
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
        </div>
    </div>
</x-admin-layout>
