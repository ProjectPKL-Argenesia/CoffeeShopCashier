@extends('layouts.backend.main')

@section('content')
    <section class="h-screen p-10 bg-gray-300">
        <div class="flex justify-between pb-5">
            <h1 class="text-3xl font-bold text-black/80">Table</h1>
            <div>
                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                    class="block px-5 py-2 text-sm font-medium text-center text-gray-200 bg-gray-700 rounded-lg hover:bg-gray-800"
                    type="button">
                    + Add Table
                </button>

                <div id="popup-modal" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-[40%] min-w-[35%] max-h-full">
                        <div class="relative bg-white rounded-lg shadow">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="popup-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <form action="{{ route('table.store') }}" method="POST">
                                @csrf
                                <div class="grid grid-cols-12 px-8 pt-16 pb-10">
                                    <div class="grid grid-cols-12 col-span-12">
                                        <div
                                            class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                                            <label for="name" class="whitespace-nowrap">Table Name</label>
                                        </div>
                                        <div class="flex items-center justify-center col-span-1">
                                            <span>:</span>
                                        </div>
                                        <div class="col-span-9">
                                            <input type="text" name="name" id="name"
                                                class="w-full px-2 py-1 rounded-lg focus:ring-0"
                                                placeholder="Table 1, Lt. 2">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-12 col-span-12 pb-20">
                                        <div
                                            class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                                            <label for="nama">Status</label>
                                        </div>
                                        <div class="flex items-center justify-center col-span-1">
                                            <span>:</span>
                                        </div>
                                        <div class="grid grid-cols-3 col-span-9 py-2 gap-x-2">
                                            <div
                                                class="flex items-center justify-between px-2 py-1 text-sm text-gray-900 bg-gray-200 border border-gray-500 rounded-lg gap-x-2">
                                                <label for="empty">Empty</label>
                                                <input type="radio" name="status" id="empty" value="Empty"
                                                    class="text-gray-500 focus:ring-0">
                                            </div>
                                            <div
                                                class="flex items-center justify-between px-2 py-1 text-sm text-gray-900 bg-red-200 border border-gray-500 rounded-lg gap-x-2">
                                                <label for="broken">Broken</label>
                                                <input type="radio" name="status" id="broken" value="Broken"
                                                    class="text-red-400 focus:ring-0">
                                            </div>
                                            <div
                                                class="flex items-center justify-between px-2 py-1 text-sm text-gray-900 bg-green-200 border border-gray-500 rounded-lg gap-x-2">
                                                <label for="filled">Filled</label>
                                                <input type="radio" name="status" id="filled" value="Filled"
                                                    class="text-green-400 focus:ring-0">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit"
                                        class="col-span-12 py-2 text-sm text-gray-100 bg-gray-800 rounded-lg">Done</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap items-center justify-end pb-4 space-y-4 gap-x-2 flex-column md:flex-row md:space-y-0">
            <div>
                <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200"
                    type="button">
                    <span class="sr-only">Action button</span>
                    Status Table
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                    <ul class="py-1 text-sm text-gray-700 aria-labelledby="dropdownActionButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Empty</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Filled</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Broken</a>
                        </li>
                    </ul>
                </div>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                    <i class="pt-1 text-gray-500 fa-solid fa-search fa-md"></i>
                </div>
                <input type="search" id="table-search-users"
                    class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search Table">
            </div>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr class="bg-gray-400">
                        <th class="px-6 py-4">
                            No.
                        </th>
                        <th class="px-6 py-4">
                            Table Name
                        </th>
                        <th class="px-6 py-4">
                            Status
                        </th>
                        <th class="px-6 py-4">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataTable as $item)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $item->name }}</td>
                            <td class="px-6 py-4">{{ $item->status }}</td>
                            <td class="flex px-6 py-4">

                                <!-- Button Edit -->
                                <div>
                                    <button data-modal-target="popup-modal-edit" data-modal-toggle="popup-modal-edit"
                                        class="block px-1 text-sm font-medium text-center text-yellow-400" type="button">
                                        <i class="px-1 fa-solid fa-file-signature"></i>Edit
                                    </button>

                                    <div id="popup-modal-edit" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-[40%] min-w-[35%] max-h-full">
                                            <div class="relative bg-white rounded-lg shadow">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="popup-modal-edit">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <form action="{{ route('table.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="grid grid-cols-12 px-8 pt-16 pb-10">
                                                        <div class="grid grid-cols-12 col-span-12">
                                                            <div
                                                                class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                                                                <label for="name">Table Name</label>
                                                            </div>
                                                            <div class="flex items-center justify-center col-span-1">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9">
                                                                <input type="text" name="name" id="name"
                                                                    class="w-full px-2 py-1 text-gray-900 rounded-lg focus:ring-0"
                                                                    value="{{ $item->name }}">
                                                            </div>
                                                        </div>

                                                        <div class="grid grid-cols-12 col-span-12 pb-20">
                                                            <div
                                                                class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                                                                <label for="status">Status</label>
                                                            </div>
                                                            <div class="flex items-center justify-center col-span-1">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="grid grid-cols-3 col-span-9 py-2 gap-x-2">
                                                                <div
                                                                    class="flex items-center justify-between px-2 py-1 text-gray-900 bg-gray-200 border border-gray-500 rounded-lg gap-x-2">
                                                                    <label for="empty-edit">Empty</label>
                                                                    <input type="radio" name="status" id="empty-edit"
                                                                        value="Empty" class="text-gray-500 focus:ring-0"
                                                                        {{ $item->status == 'Empty' ? 'checked' : '' }}>
                                                                </div>
                                                                <div
                                                                    class="flex items-center justify-between px-2 py-1 text-gray-900 bg-red-200 border border-gray-500 rounded-lg gap-x-2">
                                                                    <label for="broken-edit">Broken</label>
                                                                    <input type="radio" name="status" id="broken-edit"
                                                                        value="Broken" class="text-red-400 focus:ring-0"
                                                                        {{ $item->status == 'Broken' ? 'checked' : '' }}>
                                                                </div>
                                                                <div
                                                                    class="flex items-center justify-between px-2 py-1 text-gray-900 bg-green-200 border border-gray-500 rounded-lg gap-x-2">
                                                                    <label for="filled-edit">Filled</label>
                                                                    <input type="radio" name="status" id="filled-edit"
                                                                        value="Filled" class="text-green-400 focus:ring-0"
                                                                        {{ $item->status == 'Filled' ? 'checked' : '' }}>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="submit"
                                                            class="col-span-12 py-2 text-gray-100 bg-gray-800 rounded-lg">Done</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button Hapus -->

                                <form action="{{ route('table.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-500" onclick="return confirm('Yakin?')"><i
                                            class="px-1 fa-solid fa-trash-can"></i>Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
