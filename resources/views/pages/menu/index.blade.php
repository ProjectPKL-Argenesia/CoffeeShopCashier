@extends('layouts.backend.main')

@section('content')
    <section class="bg-gray-300 h-screen p-10">
        <div class="flex justify-between pb-5">
            <h1 class="text-3xl font-bold text-black/80">Menu List</h1>
            <div>
                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                    class="block text-gray-200 bg-gray-700 hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2 text-center"
                    type="button">
                    + Add Menu
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
                                            <label for="nama">Table Name</label>
                                        </div>
                                        <div class="col-span-1 flex justify-center items-center">
                                            <span>:</span>
                                        </div>
                                        <div class="col-span-9">
                                            <input type="text" name="nama" id="nama"
                                                class="w-full py-1 px-2 focus:ring-0 rounded-lg"
                                                placeholder="Table 1, Lt. 2">
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
        </div>
        <div
            class="flex items-center gap-x-2 justify-end flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 md:text-xs lg:text-sm">
            <div
                class="flex p-2 justify-center items-center border border-gray-300 text-gray-500 bg-white gap-x-2 rounded-lg md:w-[75px] lg:w-[100px]">
                <label for="food" class="text-black/70">Food</label>
                <input type="radio" name="food-drink" id="food" class="text-gray-500 focus:ring-white">
            </div>

            <div
                class="flex p-2 justify-center items-center border border-gray-300 text-gray-500 bg-white gap-x-2 rounded-lg md:w-[75px] lg:w-[100px]">
                <label for="drink">Drink</label>
                <input type="radio" name="food-drink" id="drink" class="text-gray-500 focus:ring-white">
            </div>

            <div
                class="flex justify-center items-center border border-gray-300 text-gray-500 gap-x-2 rounded-lg md:w-[150px] lg:w-[200px]">
                <select name="menu" id="menu"
                    class="w-full p-2 border-none rounded-lg md:text-xs lg:text-sm focus:ring-0">
                    <option selected hidden>Menu Category</option>
                    <option value="Menu 1">Menu 1</option>
                    <option value="Menu 2">Menu 2</option>
                    <option value="Menu 3">Menu 3</option>
                    <option value="Menu 4">Menu 4</option>
                    <option value="Menu 5">Menu 5</option>
                </select>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <i class="fa-solid fa-search fa-md text-gray-500 pt-1"></i>
                </div>
                <input type="search" id="table-search-users"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search Menu">
            </div>
        </div>
        <div class="grid grid-cols-3 xl:grid-cols-4 gap-3 place-items-center">

            <div
                class="flex flex-col gap-3 p-3 bg-white border border-gray-300 rounded-lg w-[250px] min-h-[180px] 2xl:w-[320px] 2xl:max-h-[240px]">
                <div
                    class="flex items-center justify-center rounded-[5.5px] overflow-hidden min-h-[100px] max-h-[115px] 2xl:max-h-[170px] 2xl:min-h-[150px]">
                    <img src="https://images.unsplash.com/photo-1481349518771-20055b2a7b24?q=80&w=1539&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="object-cover" alt="gambar">
                </div>
                <div class="grid items-center grid-cols-2">
                    <div class="flex flex-col capitalize text-sm">
                        <h2 class="font-semibold">pisang</h2>
                        <span>6500</span>
                    </div>
                    <div class="flex justify-end items-center pr-3">
                        <div class="flex justify-center items-center gap-x-3">
                            <!-- Button Edit -->
                            <div>
                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                    class="block text-yellow-400 font-medium text-sm whitespace-nowrap px-1 text-center"
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
                                                                class="w-full py-1 px-2 focus:ring-0 rounded-lg"
                                                                placeholder="Table 1, Lt. 2">
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
                            <div>
                                <!-- Button Hapus -->
                                <a href="#" class="font-medium text-sm whitespace-nowrap text-red-500"><i
                                        class="fa-solid fa-trash-can px-1"></i>Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="flex flex-col gap-3 p-3 bg-white border border-gray-300 rounded-lg w-[250px] min-h-[180px] 2xl:w-[320px] 2xl:max-h-[240px]">
                <div
                    class="flex items-center justify-center rounded-[5.5px] overflow-hidden min-h-[100px] max-h-[115px] 2xl:max-h-[170px] 2xl:min-h-[150px]">
                    <img src="https://images.unsplash.com/photo-1481349518771-20055b2a7b24?q=80&w=1539&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="object-cover" alt="gambar">
                </div>
                <div class="grid items-center grid-cols-2">
                    <div class="flex flex-col capitalize text-sm">
                        <h2 class="font-semibold">pisang</h2>
                        <span>6500</span>
                    </div>
                    <div class="flex justify-end items-center pr-3">
                        <div class="flex justify-center items-center gap-x-3">
                            <!-- Button Edit -->
                            <div>
                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                    class="block text-yellow-400 font-medium text-sm whitespace-nowrap px-1 text-center"
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
                                                                class="w-full py-1 px-2 focus:ring-0 rounded-lg"
                                                                placeholder="Table 1, Lt. 2">
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
                            <div>
                                <!-- Button Hapus -->
                                <a href="#" class="font-medium text-sm whitespace-nowrap text-red-500"><i
                                        class="fa-solid fa-trash-can px-1"></i>Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="flex flex-col gap-3 p-3 bg-white border border-gray-300 rounded-lg w-[250px] min-h-[180px] 2xl:w-[320px] 2xl:max-h-[240px]">
                <div
                    class="flex items-center justify-center rounded-[5.5px] overflow-hidden min-h-[100px] max-h-[115px] 2xl:max-h-[170px] 2xl:min-h-[150px]">
                    <img src="https://images.unsplash.com/photo-1481349518771-20055b2a7b24?q=80&w=1539&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="object-cover" alt="gambar">
                </div>
                <div class="grid items-center grid-cols-2">
                    <div class="flex flex-col capitalize text-sm">
                        <h2 class="font-semibold">pisang</h2>
                        <span>6500</span>
                    </div>
                    <div class="flex justify-end items-center pr-3">
                        <div class="flex justify-center items-center gap-x-3">
                            <!-- Button Edit -->
                            <div>
                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                    class="block text-yellow-400 font-medium text-sm whitespace-nowrap px-1 text-center"
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
                                                                class="w-full py-1 px-2 focus:ring-0 rounded-lg"
                                                                placeholder="Table 1, Lt. 2">
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
                            <div>
                                <!-- Button Hapus -->
                                <a href="#" class="font-medium text-sm whitespace-nowrap text-red-500"><i
                                        class="fa-solid fa-trash-can px-1"></i>Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="flex flex-col gap-3 p-3 bg-white border border-gray-300 rounded-lg w-[250px] min-h-[180px] 2xl:w-[320px] 2xl:max-h-[240px]">
                <div
                    class="flex items-center justify-center rounded-[5.5px] overflow-hidden min-h-[100px] max-h-[115px] 2xl:max-h-[170px] 2xl:min-h-[150px]">
                    <img src="https://images.unsplash.com/photo-1481349518771-20055b2a7b24?q=80&w=1539&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="object-cover" alt="gambar">
                </div>
                <div class="grid items-center grid-cols-2">
                    <div class="flex flex-col capitalize text-sm">
                        <h2 class="font-semibold">pisang</h2>
                        <span>6500</span>
                    </div>
                    <div class="flex justify-end items-center pr-3">
                        <div class="flex justify-center items-center gap-x-3">
                            <!-- Button Edit -->
                            <div>
                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                    class="block text-yellow-400 font-medium text-sm whitespace-nowrap px-1 text-center"
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
                                                                class="w-full py-1 px-2 focus:ring-0 rounded-lg"
                                                                placeholder="Table 1, Lt. 2">
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
                            <div>
                                <!-- Button Hapus -->
                                <a href="#" class="font-medium text-sm whitespace-nowrap text-red-500"><i
                                        class="fa-solid fa-trash-can px-1"></i>Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="flex flex-col gap-3 p-3 bg-white border border-gray-300 rounded-lg w-[250px] min-h-[180px] 2xl:w-[320px] 2xl:max-h-[240px]">
                <div
                    class="flex items-center justify-center rounded-[5.5px] overflow-hidden min-h-[100px] max-h-[115px] 2xl:max-h-[170px] 2xl:min-h-[150px]">
                    <img src="https://images.unsplash.com/photo-1481349518771-20055b2a7b24?q=80&w=1539&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="object-cover" alt="gambar">
                </div>
                <div class="grid items-center grid-cols-2">
                    <div class="flex flex-col capitalize text-sm">
                        <h2 class="font-semibold">pisang</h2>
                        <span>6500</span>
                    </div>
                    <div class="flex justify-end items-center pr-3">
                        <div class="flex justify-center items-center gap-x-3">
                            <!-- Button Edit -->
                            <div>
                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                    class="block text-yellow-400 font-medium text-sm whitespace-nowrap px-1 text-center"
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
                                                                class="w-full py-1 px-2 focus:ring-0 rounded-lg"
                                                                placeholder="Table 1, Lt. 2">
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
                            <div>
                                <!-- Button Hapus -->
                                <a href="#" class="font-medium text-sm whitespace-nowrap text-red-500"><i
                                        class="fa-solid fa-trash-can px-1"></i>Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
