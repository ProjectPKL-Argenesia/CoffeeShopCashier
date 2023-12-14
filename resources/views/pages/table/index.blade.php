@extends('layouts.backend.main')

@section('content')
    <section class="bg-gray-300 h-screen p-10">
        <div class="flex justify-between pb-5">
            <h1 class="text-3xl font-bold text-black/80">Table</h1>
            <div>
                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                    class="block text-gray-200 bg-gray-700 hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2 text-center"
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
                            <form action="">
                                <div class="grid grid-cols-12 pt-16 pb-10 px-8">
                                    <div class="col-span-12 grid grid-cols-12">
                                        <div
                                            class="flex justify-start items-center col-span-2 text-center font-semibold gap-x-4 text-sm">
                                            <label for="nama" class="whitespace-nowrap">Table Name</label>
                                        </div>
                                        <div class="col-span-1 flex justify-center items-center">
                                            <span>:</span>
                                        </div>
                                        <div class="col-span-9">
                                            <input type="text" name="nama" id="nama"
                                                class="w-full py-1 px-2 focus:ring-0 rounded-lg" placeholder="Table 1, Lt. 2">
                                        </div>
                                    </div>

                                    <div class="col-span-12 grid grid-cols-12 pb-20">
                                        <div
                                            class="flex justify-start items-center col-span-2 text-center font-semibold gap-x-4 text-sm">
                                            <label for="nama">Status</label>
                                        </div>
                                        <div class="col-span-1 flex justify-center items-center">
                                            <span>:</span>
                                        </div>
                                        <div class="col-span-9 py-2 grid grid-cols-3 gap-x-2">
                                            <div
                                                class="flex py-1 px-2 justify-between items-center border border-gray-500 text-gray-900 text-sm bg-gray-200 gap-x-2 rounded-lg">
                                                <label for="empty">Empty</label>
                                                <input type="radio" name="status" id="empty"
                                                    class="text-gray-500 focus:ring-0">
                                            </div>
                                            <div
                                                class="flex py-1 px-2 justify-between items-center border border-gray-500 text-gray-900 text-sm bg-red-200 gap-x-2 rounded-lg">
                                                <label for="broken">Broken</label>
                                                <input type="radio" name="status" id="broken"
                                                    class="text-red-400 focus:ring-0">
                                            </div>
                                            <div
                                                class="flex py-1 px-2 justify-between items-center border border-gray-500 text-gray-900 text-sm bg-green-200 gap-x-2 rounded-lg">
                                                <label for="filled">Filled</label>
                                                <input type="radio" name="status" id="filled"
                                                    class="text-green-400 focus:ring-0">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit"
                                        class="py-2 col-span-12 bg-gray-800 rounded-lg text-sm text-gray-100">Done</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center gap-x-2 justify-end flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4">
            <div>
                <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                    class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2"
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
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <i class="fa-solid fa-search fa-md text-gray-500 pt-1"></i>
                </div>
                <input type="search" id="table-search-users"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search Table">
            </div>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
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
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">1.</td>
                        <td class="px-6 py-4">Table 1, Lt. 2</td>
                        <td class="px-6 py-4">Empty</td>
                        <td class="flex px-6 py-4">

                            <!-- Button Edit -->
                            <div>
                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                    class="block text-yellow-400 font-medium text-sm px-1 text-center"
                                    type="button">
                                    <i class="fa-solid fa-file-signature px-1"></i>Edit
                                </button>

                                <div id="popup-modal" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-[40%] min-w-[35%] max-h-full">
                                        <div class="relative bg-white rounded-lg shadow">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="popup-modal">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <form action="">
                                                <div class="grid grid-cols-12 pt-16 pb-10 px-8">
                                                    <div class="col-span-12 grid grid-cols-12">
                                                        <div
                                                            class="flex justify-start items-center col-span-2 text-center font-semibold gap-x-4 text-sm">
                                                            <label for="nama">Table Name</label>
                                                        </div>
                                                        <div class="col-span-1 flex justify-center items-center">
                                                            <span>:</span>
                                                        </div>
                                                        <div class="col-span-9">
                                                            <input type="text" name="nama" id="nama"
                                                                class="w-full py-1 px-2 focus:ring-0 rounded-lg" placeholder="Table 1, Lt. 2">
                                                        </div>
                                                    </div>

                                                    <div class="col-span-12 grid grid-cols-12 pb-20">
                                                        <div
                                                            class="flex justify-start items-center col-span-2 text-center font-semibold gap-x-4 text-sm">
                                                            <label for="nama">Status</label>
                                                        </div>
                                                        <div class="col-span-1 flex justify-center items-center">
                                                            <span>:</span>
                                                        </div>
                                                        <div class="col-span-9 py-2 grid grid-cols-3 gap-x-2">
                                                            <div
                                                                class="flex py-1 px-2 justify-between items-center border border-gray-500 text-gray-900 bg-gray-200 gap-x-2 rounded-lg">
                                                                <label for="empty">Empty</label>
                                                                <input type="radio" name="status" id="empty"
                                                                    class="text-gray-500 focus:ring-0">
                                                            </div>
                                                            <div
                                                                class="flex py-1 px-2 justify-between items-center border border-gray-500 text-gray-900 bg-red-200 gap-x-2 rounded-lg">
                                                                <label for="broken">Broken</label>
                                                                <input type="radio" name="status" id="broken"
                                                                    class="text-red-400 focus:ring-0">
                                                            </div>
                                                            <div
                                                                class="flex py-1 px-2 justify-between items-center border border-gray-500 text-gray-900 bg-green-200 gap-x-2 rounded-lg">
                                                                <label for="filled">Filled</label>
                                                                <input type="radio" name="status" id="filled"
                                                                    class="text-green-400 focus:ring-0">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit"
                                                        class="py-2 col-span-12 bg-gray-800 rounded-lg text-gray-100">Done</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Button Hapus -->
                            <a href="#" class="font-medium text-red-500"><i
                                    class="fa-solid fa-trash-can px-1"></i>Hapus</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
