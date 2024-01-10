@extends('layouts.backend.main')

@section('content')
    <script>
        //Preview Image
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'flex';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

    <section class="h-screen p-10 bg-gray-300">
        <div class="flex justify-between pb-5">
            <h1 class="text-3xl font-bold text-black/80">Menu List</h1>
            <div>
                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                    class="block px-5 py-2 text-sm font-medium text-center text-gray-200 bg-gray-700 rounded-lg hover:bg-gray-800"
                    type="button">
                    + Add Menu
                </button>

                <div id="popup-modal" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-[55%] min-w-[50%] 2xl:max-w-[50%] 2xl:min-w-[45%] max-h-full">
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
                            <form action="{{ route('menuList.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-12 px-8 pt-16 pb-10 gap-x-2">
                                    <div class="flex flex-col items-center justify-center col-span-3 gap-y-2">
                                        <div
                                            class="grid grid-cols-1 place-items-center border border-gray-800 border-dashed rounded-lg w-[150px] h-[150px]">
                                            <img class="w-full h-full rounded-lg img-preview">
                                        </div>
                                        <div class="flex justify-center">
                                            <input type="file" name="image" id="image" onchange="previewImage()"
                                                required
                                                class="block w-[150px] text-xs file:text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-200 focus:outline-none">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 col-span-9 gap-y-6">
                                        <div class="grid grid-cols-12 col-span-1 gap-2">
                                            <div class="col-span-2 text-xs font-semibold gap-x-4 2xl:text-sm text-start">
                                                <label for="menu_name" class="whitespace-nowrap">Menu Name</label>
                                            </div>
                                            <div class="col-span-1 text-xs text-center 2xl:text-sm">
                                                <span>:</span>
                                            </div>
                                            <div class="col-span-9">
                                                <input type="text" name="menu_name" id="menu_name" required
                                                    class="w-full px-2 py-1 text-xs bg-gray-200 rounded-lg 2xl:text-sm focus:ring-0"
                                                    placeholder="ex : Espresso">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-12 col-span-1 gap-2">
                                            <div class="col-span-2 text-xs font-semibold gap-x-4 2xl:text-sm text-start">
                                                <label for="type" class="whitespace-nowrap">Menu Type</label>
                                            </div>
                                            <div class="col-span-1 text-xs text-center 2xl:text-sm">
                                                <span>:</span>
                                            </div>
                                            <div class="flex items-center col-span-9 gap-x-2">
                                                <div id="foodType"
                                                    class="flex items-center justify-between px-2 py-1 text-xs text-gray-900 bg-gray-200 border border-gray-500 rounded-lg gap-x-4 2xl:text-sm">
                                                    <label for="food">Food</label>
                                                    <input type="radio" name="type" id="food" value="Food"
                                                        required class="text-gray-500 focus:ring-0">
                                                </div>
                                                <div id="drinkType"
                                                    class="flex items-center justify-between px-2 py-1 text-xs text-gray-900 bg-gray-200 border border-gray-500 rounded-lg gap-x-4 2xl:text-sm">
                                                    <label for="drink">Drink</label>
                                                    <input type="radio" name="type" id="drink" value="Drink"
                                                        required class="text-gray-500 focus:ring-0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-12 col-span-1 gap-2">
                                            <div class="col-span-2 text-xs font-semibold gap-x-4 2xl:text-sm text-start">
                                                <label for="menu_category_id" class="whitespace-nowrap">Menu
                                                    Category</label>
                                            </div>
                                            <div class="col-span-1 text-xs text-center 2xl:text-sm">
                                                <span>:</span>
                                            </div>
                                            <div class="col-span-9">
                                                <select name="menu_category_id" id="menu_category_id" required
                                                    class="w-full px-2 py-1 text-xs bg-gray-200 rounded-lg 2xl:text-sm focus:ring-0">
                                                    <option selected hidden>Menu Category</option>
                                                    @foreach ($dataMenuCategory as $item)
                                                        <option value="{{ $item->id }}">{{ $item->category_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-12 col-span-1 gap-2">
                                            <div class="col-span-2 text-xs font-semibold gap-x-4 2xl:text-sm text-start">
                                                <label for="price" class="whitespace-nowrap">Price</label>
                                            </div>
                                            <div class="col-span-1 text-xs text-center 2xl:text-sm">
                                                <span>:</span>
                                            </div>
                                            <div class="col-span-9">
                                                <input type="text" name="price" id="price" required
                                                    class="w-full px-2 py-1 text-xs bg-gray-200 rounded-lg 2xl:text-sm focus:ring-0"
                                                    placeholder="8000">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-12 col-span-1 gap-2">
                                            <div class="col-span-2 text-xs font-semibold gap-x-4 2xl:text-sm text-start">
                                                <label for="tax" class="whitespace-nowrap">Tax</label>
                                            </div>
                                            <div class="col-span-1 text-xs text-center 2xl:text-sm">
                                                <span>:</span>
                                            </div>
                                            <div class="col-span-9">
                                                <input type="text" name="tax" id="tax" required
                                                    class="w-full px-2 py-1 text-xs bg-gray-200 rounded-lg 2xl:text-sm focus:ring-0"
                                                    placeholder="0.11">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-12 col-span-1 gap-2">
                                            <div class="col-span-2 text-xs font-semibold gap-x-4 2xl:text-sm text-start">
                                                <label for="nama" class="whitespace-nowrap">Created by</label>
                                            </div>
                                            <div class="col-span-1 text-xs text-center 2xl:text-sm">
                                                <span>:</span>
                                            </div>
                                            <div class="col-span-9">
                                                <input type="text" name="nama" id="nama" required
                                                    class="w-full px-2 py-1 text-xs bg-gray-200 rounded-lg 2xl:text-sm focus:ring-0"
                                                    placeholder="Luthfi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 pt-20">
                                        <button type="submit"
                                            class="w-full py-2 text-gray-100 bg-gray-800 rounded-lg">Done</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="flex flex-wrap items-center justify-end pb-4 space-y-4 gap-x-2 flex-column md:flex-row md:space-y-0 md:text-xs lg:text-sm">
            <div id="foodType-Filter"
                class="flex p-2 justify-center items-center border border-gray-300 text-gray-500 bg-white gap-x-2 rounded-lg md:w-[75px] lg:w-[100px]">
                <label class="text-black/70">Food</label>
                <input type="radio" name="type" id="food-filter" class="text-gray-500 focus:ring-white"
                    value="Food">
            </div>

            <div id="drinkType-Filter"
                class="flex p-2 justify-center items-center border border-gray-300 text-gray-500 bg-white gap-x-2 rounded-lg md:w-[75px] lg:w-[100px]">
                <label class="text-black/70">Drink</label>
                <input type="radio" name="type" id="drink-filter" class="text-gray-500 focus:ring-white"
                    value="Drink">
            </div>

            <div
                class="flex justify-center items-center border border-gray-300 text-gray-500 gap-x-2 rounded-lg md:w-[150px] lg:w-[200px]">
                <select name="menu-filter" id="menu-filter"
                    class="w-full p-2 border-none rounded-lg md:text-xs lg:text-sm focus:ring-0">
                    <option selected hidden>Menu Category</option>
                    <option value="Show All">Show All</option>
                    @foreach ($dataMenuCategory as $item)
                        <option data-type="{{ $item->type }}" value="{{ $item->id }}">{{ $item->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                    <i class="pt-1 text-gray-500 fa-solid fa-search fa-md"></i>
                </div>
                <input type="search" id="table-search-users"
                    class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 w-80 bg-gray-50 focus:ring-0"
                    placeholder="Search Menu">
            </div>
        </div>
        <div class="grid grid-cols-3 gap-3 xl:grid-cols-4 place-items-center">
            @foreach ($dataMenu as $item)
                <div data-category-id="{{ $item->menu_category->id }}"
                    class="menu-item flex flex-col gap-3 p-3 bg-white border border-gray-300 rounded-lg w-[250px] min-h-[180px] 2xl:w-[320px] 2xl:max-h-[240px]">
                    <div
                        class="flex items-center justify-center rounded-[5.5px] overflow-hidden min-h-[100px] max-h-[115px] 2xl:max-h-[170px] 2xl:min-h-[150px]">
                        <img src="{{ asset('storage/' . $item->image) }}" class="object-cover" alt="gambar">
                    </div>
                    <div class="grid items-center grid-cols-2">
                        <div class="flex flex-col text-xs capitalize 2xl:text-sm">
                            <h2 class="font-semibold">{{ $item->menu_name }}</h2>
                            <span>Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex items-center justify-end">
                            <div class="grid grid-cols-2 gap-1 justify-items-center">
                                <!-- Button Restock -->
                                <div class="col-span-2">
                                    <button data-modal-target="popup-modal-restock-{{ $item->id }}"
                                        data-modal-toggle="popup-modal-restock-{{ $item->id }}"
                                        class="block text-xs font-medium text-center text-blue-500 2xl:text-sm whitespace-nowrap"
                                        type="button">
                                        <i class="px-1 fa-solid fa-file-signature"></i>Restock
                                    </button>

                                    <div id="popup-modal-restock-{{ $item->id }}" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div
                                            class="relative p-4 w-full max-w-[55%] min-w-[50%] 2xl:max-w-[50%] 2xl:min-w-[45%] max-h-full">
                                            <div class="relative bg-white rounded-lg shadow">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="popup-modal-restock-{{ $item->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <form action="{{ route('menuList.restock', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="grid grid-cols-12 px-8 pt-16 pb-10 gap-y-10">
                                                        <div class="flex items-center justify-center col-span-12">
                                                            <p class="text-3xl font-bold text-center">
                                                                {{ $item->menu_name }}</p>
                                                        </div>
                                                        <div class="grid grid-cols-12 col-span-12">
                                                            <div
                                                                class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                                                                <label for="stock"
                                                                    class="whitespace-nowrap">Stock</label>
                                                            </div>
                                                            <div class="flex items-center justify-center col-span-1">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9">
                                                                <input type="number" name="stock" id="stock"
                                                                    class="w-full px-2 py-1 text-sm bg-gray-200 rounded-lg focus:ring-0"
                                                                    placeholder="ex : 25">
                                                            </div>
                                                        </div>
                                                        <div class="grid grid-cols-12 col-span-12">
                                                            <div
                                                                class="col-span-2 text-xs font-semibold gap-x-4 2xl:text-sm text-start">
                                                                <label for="nama" class="whitespace-nowrap">Restock
                                                                    by</label>
                                                            </div>
                                                            <div class="col-span-1 text-xs text-center 2xl:text-sm">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9">
                                                                <input type="text" name="nama" id="nama"
                                                                    required
                                                                    class="w-full px-2 py-1 text-sm bg-gray-200 rounded-lg 2xl:text-sm focus:ring-0"
                                                                    placeholder="name">
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

                                <!-- Button Edit -->
                                <div class="col-start-1">
                                    <button data-modal-target="popup-modal-edit-{{ $item->id }}"
                                        data-modal-toggle="popup-modal-edit-{{ $item->id }}"
                                        class="block text-xs font-medium text-center text-yellow-400 2xl:text-sm whitespace-nowrap"
                                        type="button">
                                        <i class="px-1 fa-solid fa-file-signature"></i>Edit
                                    </button>

                                    <div id="popup-modal-edit-{{ $item->id }}" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div
                                            class="relative p-4 w-full max-w-[55%] min-w-[50%] 2xl:max-w-[50%] 2xl:min-w-[45%] max-h-full">
                                            <div class="relative bg-white rounded-lg shadow">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="popup-modal-edit-{{ $item->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <form action="{{ route('menuList.update', $item->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="grid grid-cols-12 px-8 pt-16 pb-10 gap-x-2">
                                                        <div
                                                            class="flex flex-col items-center justify-center col-span-3 gap-y-2">
                                                            <div
                                                                class="grid grid-cols-1 place-items-center border border-gray-800 border-dashed rounded-lg w-[150px] h-[150px]">
                                                                <img class="w-full h-full rounded-lg img-preview2"
                                                                    src="{{ asset('storage/' . $item->image) }}">
                                                            </div>
                                                            <div class="flex justify-center">
                                                                <input type="file" name="image" id="image2"
                                                                    onchange="previewImage2()"
                                                                    class="block w-[150px] text-xs file:text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-200 focus:outline-none">
                                                            </div>
                                                        </div>

                                                        <div class="grid grid-cols-1 col-span-9 gap-y-6">
                                                            <div class="grid grid-cols-12 col-span-1 gap-2">
                                                                <div
                                                                    class="col-span-2 text-xs font-semibold gap-x-4 2xl:text-sm text-start">
                                                                    <label for="menu_name" class="whitespace-nowrap">Menu
                                                                        Name</label>
                                                                </div>
                                                                <div class="col-span-1 text-xs text-center 2xl:text-sm">
                                                                    <span>:</span>
                                                                </div>
                                                                <div class="col-span-9">
                                                                    <input type="text" name="menu_name" id="menu_name"
                                                                        value="{{ $item->menu_name }}" required
                                                                        class="w-full px-2 py-1 text-xs bg-gray-200 rounded-lg 2xl:text-sm focus:ring-0"
                                                                        placeholder="ex : Espresso">
                                                                </div>
                                                            </div>
                                                            <div class="grid grid-cols-12 col-span-1 gap-2">
                                                                <div
                                                                    class="col-span-2 text-xs font-semibold gap-x-4 2xl:text-sm text-start">
                                                                    <label for="type" class="whitespace-nowrap">Menu
                                                                        Type</label>
                                                                </div>
                                                                <div class="col-span-1 text-xs text-center 2xl:text-sm">
                                                                    <span>:</span>
                                                                </div>
                                                                <div class="flex items-center col-span-9 gap-x-2">
                                                                    <p class="hidden type-cell">{{ $item->type }}</p>
                                                                    <div id="foodType-Edit-{{ $item->id }}"
                                                                        class="flex items-center justify-between px-2 py-1 text-xs text-gray-900 bg-gray-200 border border-gray-500 rounded-lg gap-x-4 2xl:text-sm">
                                                                        <label
                                                                            for="food-edit-{{ $item->id }}">Food</label>
                                                                        <input type="radio" name="type"
                                                                            id="food-edit-{{ $item->id }}"
                                                                            value="Food" required
                                                                            class="text-gray-500 focus:ring-0"
                                                                            {{ $item->type == 'Food' ? 'checked' : '' }}>
                                                                    </div>
                                                                    <div id="drinkType-Edit-{{ $item->id }}"
                                                                        class="flex items-center justify-between px-2 py-1 text-xs text-gray-900 bg-gray-200 border border-gray-500 rounded-lg gap-x-4 2xl:text-sm">
                                                                        <label
                                                                            for="drink-edit-{{ $item->id }}">Drink</label>
                                                                        <input type="radio" name="type"
                                                                            id="drink-edit-{{ $item->id }}"
                                                                            value="Drink" required
                                                                            class="text-gray-500 focus:ring-0"
                                                                            {{ $item->type == 'Drink' ? 'checked' : '' }}>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="grid grid-cols-12 col-span-1 gap-2">
                                                                <div
                                                                    class="col-span-2 text-xs font-semibold gap-x-4 2xl:text-sm text-start">
                                                                    <label for="menu_category_id"
                                                                        class="whitespace-nowrap">Menu
                                                                        Category</label>
                                                                </div>
                                                                <div class="col-span-1 text-xs text-center 2xl:text-sm">
                                                                    <span>:</span>
                                                                </div>
                                                                <div class="col-span-9">
                                                                    <select name="menu_category_id" id="menu_category_id"
                                                                        required
                                                                        class="w-full px-2 py-1 text-xs bg-gray-200 rounded-lg 2xl:text-sm focus:ring-0">
                                                                        <option selected hidden>Menu Category</option>
                                                                        @foreach ($dataMenuCategory as $itemMenuCategory)
                                                                            <option value="{{ $itemMenuCategory->id }}"
                                                                                class="menu-cell"
                                                                                {{ $item->menu_category_id == $itemMenuCategory->id ? 'selected' : '' }}>
                                                                                {{ $itemMenuCategory->category_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="grid grid-cols-12 col-span-1 gap-2">
                                                                <div
                                                                    class="col-span-2 text-xs font-semibold gap-x-4 2xl:text-sm text-start">
                                                                    <label for="price"
                                                                        class="whitespace-nowrap">Price</label>
                                                                </div>
                                                                <div class="col-span-1 text-xs text-center 2xl:text-sm">
                                                                    <span>:</span>
                                                                </div>
                                                                <div class="col-span-9">
                                                                    <input type="text" name="price" id="price"
                                                                        value="{{ $item->price }}" required
                                                                        class="w-full px-2 py-1 text-xs bg-gray-200 rounded-lg 2xl:text-sm focus:ring-0"
                                                                        placeholder="8000">
                                                                </div>
                                                            </div>
                                                            <div class="grid grid-cols-12 col-span-1 gap-2">
                                                                <div
                                                                    class="col-span-2 text-xs font-semibold gap-x-4 2xl:text-sm text-start">
                                                                    <label for="tax"
                                                                        class="whitespace-nowrap">Tax</label>
                                                                </div>
                                                                <div class="col-span-1 text-xs text-center 2xl:text-sm">
                                                                    <span>:</span>
                                                                </div>
                                                                <div class="col-span-9">
                                                                    <input type="text" name="tax" id="tax"
                                                                        value="{{ $item->tax }}" required
                                                                        class="w-full px-2 py-1 text-xs bg-gray-200 rounded-lg 2xl:text-sm focus:ring-0"
                                                                        placeholder="0.11">
                                                                </div>
                                                            </div>
                                                            <div class="grid grid-cols-12 col-span-1 gap-2">
                                                                <div
                                                                    class="col-span-2 text-xs font-semibold gap-x-4 2xl:text-sm text-start">
                                                                    <label for="nama" class="whitespace-nowrap">Edited
                                                                        by</label>
                                                                </div>
                                                                <div class="col-span-1 text-xs text-center 2xl:text-sm">
                                                                    <span>:</span>
                                                                </div>
                                                                <div class="col-span-9">
                                                                    <input type="text" name="nama" id="nama"
                                                                        required
                                                                        class="w-full px-2 py-1 text-xs bg-gray-200 rounded-lg 2xl:text-sm focus:ring-0"
                                                                        placeholder="Luthfi">
                                                                </div>
                                                            </div>
                                                            <div class="hidden grid-cols-12 col-span-1 gap-2">
                                                                <div
                                                                    class="col-span-2 text-xs font-semibold gap-x-4 2xl:text-sm text-start">
                                                                    <label for="stock"
                                                                        class="whitespace-nowrap">Stock</label>
                                                                </div>
                                                                <div class="col-span-1 text-xs text-center 2xl:text-sm">
                                                                    <span>:</span>
                                                                </div>
                                                                <div class="col-span-9">
                                                                    <input type="text" name="stock" id="stock"
                                                                        required
                                                                        class="w-full px-2 py-1 text-xs bg-gray-200 rounded-lg 2xl:text-sm focus:ring-0"
                                                                        placeholder="ex : 25"
                                                                        value="{{ $item->stock }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-span-12 pt-20">
                                                            <button type="submit"
                                                                class="w-full py-2 text-gray-100 bg-gray-800 rounded-lg">Done</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button Hapus -->
                                <div>
                                    <form action="{{ route('menuList.destroy', $item->id) }}" method="POST"
                                        class="-my-0.5">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-xs font-medium text-red-500 2xl:text-sm whitespace-nowrap"
                                            onclick="return confirm('Yakin?')"><i
                                                class="px-1 fa-solid fa-trash-can"></i>Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    //Preview Image
                    function previewImage() {
                        const image = document.querySelector('#image');
                        const imgPreview = document.querySelector('.img-preview');

                        imgPreview.style.display = 'flex';

                        const oFReader = new FileReader();
                        oFReader.readAsDataURL(image.files[0]);

                        oFReader.onload = function(oFREvent) {
                            imgPreview.src = oFREvent.target.result;
                        }
                    }

                    function previewImage2() {
                        const image2 = document.querySelector('#image2');
                        const imgPreview2 = document.querySelector('.img-preview2');

                        imgPreview2.style.display = 'flex';

                        const oFReader = new FileReader();
                        oFReader.readAsDataURL(image2.files[0]);

                        oFReader.onload = function(oFREvent) {
                            imgPreview2.src = oFREvent.target.result;
                        }
                    }


                    //add radio button
                    document.addEventListener("DOMContentLoaded", function() {
                        const divElement = document.getElementById("foodType");
                        const radioElement = document.getElementById("food");

                        divElement.addEventListener("click", function() {
                            radioElement.checked = true;
                        });
                    });

                    document.addEventListener("DOMContentLoaded", function() {
                        const divElement = document.getElementById("drinkType");
                        const radioElement = document.getElementById("drink");

                        divElement.addEventListener("click", function() {
                            radioElement.checked = true;
                        });
                    });


                    //filter radio button
                    document.addEventListener("DOMContentLoaded", function() {
                        const divFood = document.getElementById("foodType-Filter");
                        const radioFood = document.getElementById("food-filter");

                        divFood.addEventListener("click", function() {
                            radioFood.checked = true;

                            radioFood.dispatchEvent(new Event('change'));
                        });
                    });

                    document.addEventListener("DOMContentLoaded", function() {
                        const divDrink = document.getElementById("drinkType-Filter");
                        const radioDrink = document.getElementById("drink-filter");

                        divDrink.addEventListener("click", function() {
                            radioDrink.checked = true;

                            radioDrink.dispatchEvent(new Event('change'));
                        });
                    });


                    //edit radio button
                    document.addEventListener("DOMContentLoaded", function() {
                        const divElement = document.getElementById("foodType-Edit-{{ $item->id }}");
                        const radioElement = document.getElementById("food-edit-{{ $item->id }}");

                        divElement.addEventListener("click", function() {
                            radioElement.checked = true;
                        });
                    });

                    document.addEventListener("DOMContentLoaded", function() {
                        const divElement = document.getElementById("drinkType-Edit-{{ $item->id }}");
                        const radioElement = document.getElementById("drink-edit-{{ $item->id }}");

                        divElement.addEventListener("click", function() {
                            radioElement.checked = true;
                        });
                    });


                    //filter menu
                    document.getElementById('menu-filter').addEventListener('change', function() {
                        const selectedCategoryId = this.value;
                        const menuItems = document.querySelectorAll(
                            '.menu-item');

                        menuItems.forEach(function(menuItem) {
                            if (selectedCategoryId === 'Show All' || menuItem.dataset.categoryId ===
                                selectedCategoryId) {
                                menuItem.style.display = 'flex';
                            } else {
                                menuItem.style.display = 'none';
                            }
                        });
                    });



                    document.querySelectorAll('div[id$="-Filter"]').forEach(function(div) {
                        const radioBtn = div.querySelector('input[type="radio"]');
                        if (radioBtn) {
                            div.addEventListener('click', function() {
                                radioBtn.checked = true;
                                radioBtn.dispatchEvent(new Event('change'));
                            });
                        }
                    });

                    document.querySelectorAll('input[name="type"]').forEach(function(radio) {
                        radio.addEventListener('change', function() {
                            const selectedType = this.id.split('-')[0];
                            const menuOptions = document.querySelectorAll('#menu-filter option');
                            menuOptions.forEach(function(option) {
                                const optionType = option.textContent.trim();
                                if (optionType === 'Show All' || (selectedType === 'food' && option.dataset
                                        .type === 'Food') || (selectedType === 'drink' && option.dataset
                                        .type === 'Drink')) {
                                    option.style.display =
                                        'block';
                                } else {
                                    option.style.display = 'none';
                                }
                            });
                        });
                    });



                    //filter menu radio button
                    document.getElementById('food-filter').addEventListener('change', function() {
                        const selectedType = this.value;
                        const contentMenu = document.querySelectorAll('.menu-item');

                        contentMenu.forEach(row => {
                            const menuType = row.querySelector('.type-cell');

                            if (selectedType === 'Type Table') {
                                row.style.display = 'flex';
                            } else {
                                if (menuType.textContent === selectedType) {
                                    row.style.display = 'flex';
                                } else {
                                    row.style.display =
                                        'none';
                                }
                            }

                        });
                    });

                    document.getElementById('drink-filter').addEventListener('change', function() {
                        const selectedType = this.value;
                        const contentMenu = document.querySelectorAll('.menu-item');

                        contentMenu.forEach(row => {
                            const menuType = row.querySelector('.type-cell');

                            if (selectedType === 'Type Table') {
                                row.style.display = 'flex';
                            } else {
                                if (menuType.textContent === selectedType) {
                                    row.style.display = 'flex';
                                } else {
                                    row.style.display =
                                        'none';
                                }
                            }

                        });
                    });
                </script>
            @endforeach
        </div>
    </section>
@endsection
