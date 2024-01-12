@extends('layouts.backend.main')

@section('content')
    <section class="h-screen p-10 bg-gray-300">
        <div class="flex justify-between pb-5">
            <h1 class="text-3xl font-bold text-black/80">Menu Category</h1>
            <div>
                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                    class="block px-5 py-2 text-sm font-medium text-center text-gray-200 bg-gray-700 rounded-lg hover:bg-gray-800"
                    type="button">
                    + Add Category
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
                            <form action="{{ route('menuCategory.store') }}" method="POST">
                                @csrf
                                <div class="grid grid-cols-12 px-8 pt-16 pb-10 gap-y-2">
                                    <div class="grid grid-cols-12 col-span-12">
                                        <div
                                            class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                                            <label for="nama">Menu Type</label>
                                        </div>
                                        <div class="flex items-center justify-center col-span-1">
                                            <span>:</span>
                                        </div>
                                        <div class="flex col-span-9 py-2 gap-x-2">
                                            <div id="foodType"
                                                class="flex items-center justify-between px-2 py-1 text-sm text-gray-900 bg-gray-200 border border-gray-500 rounded-lg gap-x-4">
                                                <label for="food">Food</label>
                                                <input type="radio" name="type" id="food" value="Food"
                                                    class="text-gray-500 focus:ring-0" required>
                                            </div>
                                            <div id="drinkType"
                                                class="flex items-center justify-between px-2 py-1 text-sm text-gray-900 bg-gray-200 border border-gray-500 rounded-lg gap-x-4">
                                                <label for="drink">Drink</label>
                                                <input type="radio" name="type" id="drink" value="Drink"
                                                    class="text-gray-500 focus:ring-0" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-12 col-span-12 pb-20">
                                        <div
                                            class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                                            <label for="category_name" class="whitespace-nowrap">Menu Category</label>
                                        </div>
                                        <div class="flex items-center justify-center col-span-1">
                                            <span>:</span>
                                        </div>
                                        <div class="col-span-9">
                                            <input type="text" name="category_name" id="category_name"
                                                class="w-full px-2 py-1 rounded-lg focus:ring-0" placeholder="ex : Coffee" required>
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
            <div class="flex gap-x-2">
                <div id="foodType-Filter"
                    class="flex p-2 justify-center items-center border border-gray-300 text-gray-500 bg-white gap-x-2 rounded-lg md:w-[75px] lg:w-[100px]">
                    <label for="food-filter" class="text-black/70">Food</label>
                    <input type="radio" name="type" id="food-filter" class="text-gray-500 focus:ring-white"
                        value="Food">
                </div>

                <div id="drinkType-Filter"
                    class="flex p-2 justify-center items-center border border-gray-300 text-gray-500 bg-white gap-x-2 rounded-lg md:w-[75px] lg:w-[100px]">
                    <label for="drink-filter">Drink</label>
                    <input type="radio" name="type" id="drink-filter" class="text-gray-500 focus:ring-white"
                        value="Drink">
                </div>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                    <i class="pt-1 text-gray-500 fa-solid fa-search fa-md"></i>
                </div>
                <input type="search" id="table-search-users"
                    class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search Category">
            </div>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right" id="tableData">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr class="bg-gray-400">
                        <th class="px-6 py-4">
                            No.
                        </th>
                        <th class="px-6 py-4">
                            Menu Type
                        </th>
                        <th class="px-6 py-4">
                            Menu Category
                        </th>
                        <th class="px-6 py-4">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataMenuCategory as $item)
                        <tr id="data-menu-category" class="bg-white border-b">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 type-cell">{{ $item->type }}</td>
                            <td class="px-6 py-4">{{ $item->category_name }}</td>
                            <td class="flex px-6 py-4">

                                <!-- Button Edit -->
                                <div>
                                    <button data-modal-target="popup-modal-edit-{{ $item->id }}"
                                        data-modal-toggle="popup-modal-edit-{{ $item->id }}"
                                        class="block px-1 text-sm font-medium text-center text-yellow-400" type="button">
                                        <i class="px-1 fa-solid fa-file-signature"></i>Edit
                                    </button>

                                    <div id="popup-modal-edit-{{ $item->id }}" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-[40%] min-w-[35%] max-h-full">
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
                                                <form action="{{ route('menuCategory.update', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="grid grid-cols-12 px-8 pt-16 pb-10 gap-y-2">
                                                        <div class="grid grid-cols-12 col-span-12">
                                                            <div
                                                                class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                                                                <label for="status">Type</label>
                                                            </div>
                                                            <div class="flex items-center justify-center col-span-1">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="flex col-span-9 py-2 gap-x-2">
                                                                <div id="foodType-Edit-{{ $item->id }}"
                                                                    class="flex items-center justify-between px-2 py-1 text-gray-900 bg-gray-200 border border-gray-500 rounded-lg gap-x-4">
                                                                    <label
                                                                        for="food-edit-{{ $item->id }}">Food</label>
                                                                    <input type="radio" name="type"
                                                                        id="food-edit-{{ $item->id }}" value="Food"
                                                                        class="text-gray-500 focus:ring-0"
                                                                        {{ $item->type == 'Food' ? 'checked' : '' }}>
                                                                </div>
                                                                <div id="drinkType-Edit-{{ $item->id }}"
                                                                    class="flex items-center justify-between px-2 py-1 text-gray-900 bg-gray-200 border border-gray-500 rounded-lg gap-x-2">
                                                                    <label
                                                                        for="drink-edit-{{ $item->id }}">Drink</label>
                                                                    <input type="radio" name="type"
                                                                        id="drink-edit-{{ $item->id }}"
                                                                        value="Drink" class="text-gray-500 focus:ring-0"
                                                                        {{ $item->type == 'Drink' ? 'checked' : '' }}>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="grid grid-cols-12 col-span-12 pb-20">
                                                            <div
                                                                class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                                                                <label for="category_name" class="whitespace-nowrap">Menu
                                                                    Category</label>
                                                            </div>
                                                            <div class="flex items-center justify-center col-span-1">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9">
                                                                <input type="text" name="category_name"
                                                                    id="category_name"
                                                                    class="w-full px-2 py-1 text-gray-900 rounded-lg focus:ring-0"
                                                                    value="{{ $item->category_name }}">
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
                                <button data-modal-target="popup-modal-delete-{{ $item->id }}"
                                    data-modal-toggle="popup-modal-delete-{{ $item->id }}"
                                    class="font-medium text-red-500"
                                    type="button"><i class="px-1 fa-solid fa-trash-can"></i>
                                    Hapus
                                </button>

                                <div id="popup-modal-delete-{{ $item->id }}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full p-4">
                                        <div class="relative bg-white rounded-lg shadow">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                data-modal-hide="popup-modal-delete-{{ $item->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 text-center md:p-5">
                                                <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500">Are
                                                    you sure you want to delete {{ $item->category_name }}?</h3>
                                                <form action="{{ route('menuCategory.destroy', $item->id) }}" method="POST"
                                                    class="inline-flex">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                        Yes, I'm sure
                                                    </button>
                                                </form>

                                                <button data-modal-hide="popup-modal-delete-{{ $item->id }}"
                                                    type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No,
                                                    cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <script>
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


                            //filter menu radio button
                            document.getElementById('food-filter').addEventListener('change', function() {
                                const selectedType = this.value;
                                const tableRows = document.querySelectorAll('#tableData tbody tr');

                                tableRows.forEach(row => {
                                    const menuType = row.querySelector('.type-cell');

                                    if (selectedType === 'Type Table') {
                                        row.style.display = 'table-row';
                                    } else {
                                        if (menuType.textContent === selectedType) {
                                            row.style.display = 'table-row';
                                        } else {
                                            row.style.display =
                                                'none';
                                        }
                                    }

                                });
                            });

                            document.getElementById('drink-filter').addEventListener('change', function() {
                                const selectedType = this.value;
                                const tableRows = document.querySelectorAll('#tableData tbody tr');

                                tableRows.forEach(row => {
                                    const menuType = row.querySelector('.type-cell');

                                    if (selectedType === 'Type Table') {
                                        row.style.display = 'table-row';
                                    } else {
                                        if (menuType.textContent === selectedType) {
                                            row.style.display = 'table-row';
                                        } else {
                                            row.style.display =
                                                'none';
                                        }
                                    }

                                });
                            });
                        </script>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
