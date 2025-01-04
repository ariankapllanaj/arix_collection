<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <div class="mt-4">
                        <a href="{{ route('pages.admin.add_platform') }}"
                            class="inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                            Add Platform
                        </a>
                        <a href="{{ route('pages.admin.add_generation') }}"
                            class="inline-block px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                            Add Generation
                        </a>
                        <a href="{{ route('pages.admin.add_category') }}"
                            class="inline-block px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                            Add Category
                        </a>
                        <a href="{{ route('pages.admin.add_item') }}"
                            class="inline-block px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                            Add Item
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
