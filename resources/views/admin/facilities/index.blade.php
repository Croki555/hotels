<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-4">
                <div>
                    <h2 class="text-2xl mb-4">Удобства</h2>
                    <table class="w-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-6">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Название</th>
                            <th scope="col" class="px-6 py-3">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($facilities as $facility)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">{{ $facility->title }}</td>
                                <td class="px-6 py-4">
                                    <form class="relative w-full"
                                          action="{{ route('admin.facilities.delete', ['id' => $facility->id]) }}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                            Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $facilities->links() }}
                </div>
                <div>
                    <h2 class="text-2xl mb-4">Добавить удобства</h2>
                    <form action="{{ url()->current() }}" method="post">
                        @csrf
                        <div class="mb-5">
                            <x-label for="title">Название</x-label>
                            <x-input name="title" class="w-full p-2.5" type="text" id="title"
                                     value="{{ old('title') ?? 'Тест' }}" required></x-input>
                            <x-input-error :messages="$errors->get('title')" class="mt-2"/>
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


        </div>
    </div>
</x-admin-layout>
