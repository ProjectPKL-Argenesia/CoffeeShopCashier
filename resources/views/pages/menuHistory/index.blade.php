@extends('layouts.backend.main')

@section('content')
    <section class="h-screen bg-gray-300 p-10">
        <div class="flex justify-between pb-5">
            <h1 class="text-3xl font-bold text-black/80">Menu History</h1>
        </div>
        <div class="flex-column flex flex-wrap items-center justify-end gap-x-2 space-y-4 pb-4 md:flex-row md:space-y-0">
            <div class="flex gap-x-2">
                <div class="flex items-center justify-center gap-x-2 rounded-lg border border-gray-300 bg-white p-2 text-gray-500 md:w-[75px] lg:w-[100px]"
                    id="foodType-Filter">
                    <label class="text-black/70" for="food-filter">Food</label>
                    <input class="text-gray-500 focus:ring-white" id="food-filter" name="type" type="radio"
                        value="Food">
                </div>

                <div class="flex items-center justify-center gap-x-2 rounded-lg border border-gray-300 bg-white p-2 text-gray-500 md:w-[75px] lg:w-[100px]"
                    id="drinkType-Filter">
                    <label for="drink-filter">Drink</label>
                    <input class="text-gray-500 focus:ring-white" id="drink-filter" name="type" type="radio"
                        value="Drink">
                </div>
            </div>
            <div
                class="flex items-center justify-center gap-x-2 rounded-lg border border-gray-300 text-gray-500 md:w-[150px] lg:w-[200px]">
                <select class="w-full rounded-lg border-none p-2 focus:ring-0 md:text-xs lg:text-sm" id="menu-filter"
                    name="menu-filter">
                    <option selected hidden>Menu Category</option>
                    <option value="Show All">Show All</option>
                    @foreach ($dataMenuCategory as $item)
                        <option data-type="{{ $item->type }}" value="{{ $item->id }}">{{ $item->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center justify-center rounded-lg border-none text-gray-500" id="date-Filter">
                <input class="rounded-lg border-none bg-white p-1.5 text-gray-500 focus:ring-0" id="date-filter"
                    name="date_payment" type="date">
                <button class="ml-2 rounded-lg bg-gray-400 px-4 py-2 font-bold text-white hover:bg-gray-500"
                    id="filter-btn">Filter</button>
            </div>
            <form id="searchForm" action="{{ route('menuHistory.index') }}" method="GET">
                <div
                    class="relative flex w-80 items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-500">
                    <label class="absolute left-0 mx-1.5 flex w-[10%] items-center justify-end" for="search"><i
                            class="fa-solid fa-search fa-md"></i></label>
                    <input class="w-[70%] border-none text-start text-gray-500 focus:ring-0 md:text-xs lg:text-sm"
                        id="search" name="search" type="text" value="{{ request('search') }}"
                        placeholder="Search Menu History">
                    <span
                        class="{{ request('search') ? '' : 'hidden' }} absolute right-0 mx-1.5 w-[10%] cursor-pointer rounded-sm bg-gray-300 px-1.5 text-center font-bold hover:bg-gray-400"
                        id="clearSearch">x</span>
                </div>
            </form>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-left text-sm text-gray-500 rtl:text-right" id="tableData">
                <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                    <tr class="bg-gray-400">
                        <th class="px-6 py-4">
                            No.
                        </th>
                        <th class="px-6 py-4">
                            Name
                        </th>
                        <th class="px-6 py-4">
                            Menu Type
                        </th>
                        <th class="px-6 py-4">
                            Menu Category
                        </th>
                        <th class="px-6 py-4">
                            Date
                        </th>
                        <th></th>
                        <th class="px-6 py-4">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataMenuHistory as $item)
                        <tr class="menu-item border-b bg-white" data-category-id="{{ $item->menu_category->id }}">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $item->menu_name }}</td>
                            <td class="type-cell px-6 py-4">{{ $item->type }}</td>
                            <td class="px-6 py-4">{{ $item->menu_category->category_name }}</td>
                            <td class="px-6 py-4">{{ $item->created_at }}</td>
                            @if ($item->status == 'create')
                                <td class="px-6 py-4 text-sky-500">Created by {{ $item->nama }}</td>
                            @endif
                            @if ($item->status == 'edit')
                                <td class="px-6 py-4 text-sky-500">Edited by {{ $item->nama }}</td>
                            @endif
                            @if ($item->status == 'restock')
                                <td class="px-6 py-4 text-sky-500">Restock by {{ $item->nama }}</td>
                            @endif
                            <td class="flex px-6 py-4">

                                <!-- Button Info -->
                                <div>
                                    <button class="block px-1 text-center text-sm font-medium text-blue-500"
                                        data-modal-target="popup-modal-info-{{ $item->id }}"
                                        data-modal-toggle="popup-modal-info-{{ $item->id }}" type="button">
                                        <i class="fa-solid fa-file-signature px-1"></i>Info
                                    </button>

                                    <div class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
                                        id="popup-modal-info-{{ $item->id }}" tabindex="-1">
                                        <div class="relative max-h-full w-full min-w-[35%] max-w-[40%] p-4">
                                            <div class="relative rounded-lg bg-white shadow">
                                                <button
                                                    class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-500 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="popup-modal-info-{{ $item->id }}" type="button">
                                                    <svg class="h-3 w-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <form action="">
                                                    <div class="grid grid-cols-12 gap-y-2 px-8 pb-10 pt-16">
                                                        <div class="col-span-12 grid grid-cols-12">
                                                            <div
                                                                class="col-span-2 flex items-center justify-start gap-x-4 text-center text-sm font-semibold">
                                                                <label class="whitespace-nowrap"
                                                                    for="menu_name">Name</label>
                                                            </div>
                                                            <div class="col-span-1 flex items-center justify-center">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9">
                                                                <input
                                                                    class="w-full rounded-lg bg-gray-200 px-2 py-1 text-gray-900 focus:ring-0"
                                                                    id="menu_name" name="menu_name" type="text"
                                                                    value="{{ $item->menu_name }}" readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-span-12 grid grid-cols-12">
                                                            <div
                                                                class="col-span-2 flex items-center justify-start gap-x-4 text-center text-sm font-semibold">
                                                                <label for="type">Type</label>
                                                            </div>
                                                            <div class="col-span-1 flex items-center justify-center">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9 flex gap-x-2 py-2">
                                                                <div
                                                                    class="flex items-center justify-between gap-x-4 rounded-lg border border-gray-500 bg-gray-200 px-2 py-1 text-gray-900">
                                                                    <label for="food">Food</label>
                                                                    <input class="text-gray-500 focus:ring-0"
                                                                        id="food" name="type" type="radio"
                                                                        value="Food"
                                                                        {{ $item->type == 'Food' ? 'checked' : '' }}
                                                                        readonly disabled>
                                                                </div>
                                                                <div
                                                                    class="flex items-center justify-between gap-x-2 rounded-lg border border-gray-500 bg-gray-200 px-2 py-1 text-gray-900">
                                                                    <label for="drink">Drink</label>
                                                                    <input class="text-gray-500 focus:ring-0"
                                                                        id="drink" name="type" type="radio"
                                                                        value="Drink"
                                                                        {{ $item->type == 'Drink' ? 'checked' : '' }}
                                                                        readonly disabled>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-span-12 grid grid-cols-12">
                                                            <div
                                                                class="col-span-2 flex items-center justify-start gap-x-4 text-center text-sm font-semibold">
                                                                <label class="whitespace-nowrap" for="category_name">Menu
                                                                    Category</label>
                                                            </div>
                                                            <div class="col-span-1 flex items-center justify-center">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9">
                                                                <input
                                                                    class="w-full rounded-lg bg-gray-200 px-2 py-1 text-gray-900 focus:ring-0"
                                                                    id="category_name" name="category_name"
                                                                    type="text"
                                                                    value="{{ $item->menu_category->category_name }}"
                                                                    readonly disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-span-12 grid grid-cols-12">
                                                            <div
                                                                class="col-span-2 flex items-center justify-start gap-x-4 text-center text-sm font-semibold">
                                                                <label class="whitespace-nowrap"
                                                                    for="stock">Stock</label>
                                                            </div>
                                                            <div class="col-span-1 flex items-center justify-center">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9">
                                                                <input
                                                                    class="w-full rounded-lg bg-gray-200 px-2 py-1 text-gray-900 focus:ring-0"
                                                                    id="stock" name="stock" type="text"
                                                                    value="{{ $item->stock }}" readonly disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-span-12 grid grid-cols-12">
                                                            <div
                                                                class="col-span-2 flex items-center justify-start gap-x-4 text-center text-sm font-semibold">
                                                                <label class="whitespace-nowrap"
                                                                    for="price">Price</label>
                                                            </div>
                                                            <div class="col-span-1 flex items-center justify-center">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9">
                                                                <input
                                                                    class="w-full rounded-lg bg-gray-200 px-2 py-1 text-gray-900 focus:ring-0"
                                                                    id="price" name="price" type="text"
                                                                    value="{{ $item->price }}" readonly disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-span-12 grid grid-cols-12">
                                                            <div
                                                                class="col-span-2 flex items-center justify-start gap-x-4 text-center text-sm font-semibold">
                                                                <label class="whitespace-nowrap"
                                                                    for="tax">Tax</label>
                                                            </div>
                                                            <div class="col-span-1 flex items-center justify-center">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9">
                                                                <input
                                                                    class="w-full rounded-lg bg-gray-200 px-2 py-1 text-gray-900 focus:ring-0"
                                                                    id="tax" name="tax" type="text"
                                                                    value="{{ $item->tax }}" readonly disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-span-12 grid grid-cols-12 pb-20">
                                                            <div
                                                                class="col-span-2 flex items-center justify-start gap-x-4 text-center text-sm font-semibold">
                                                                <label class="whitespace-nowrap"
                                                                    for="date">Date</label>
                                                            </div>
                                                            <div class="col-span-1 flex items-center justify-center">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9">
                                                                <input
                                                                    class="w-full rounded-lg bg-gray-200 px-2 py-1 text-gray-900 focus:ring-0"
                                                                    id="date" name="date" type="datetime-local"
                                                                    value="{{ $item->created_at }}" readonly disabled>
                                                            </div>
                                                        </div>

                                                        <button
                                                            class="col-span-12 rounded-lg bg-gray-800 py-2 text-gray-100"
                                                            type="submit">Print</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button Hapus -->
                                <button class="font-medium text-red-500"
                                    data-modal-target="popup-modal-delete-{{ $item->id }}"
                                    data-modal-toggle="popup-modal-delete-{{ $item->id }}" type="button"><i
                                        class="fa-solid fa-trash-can px-1"></i>
                                    Hapus
                                </button>

                                <div class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
                                    id="popup-modal-delete-{{ $item->id }}" tabindex="-1">
                                    <div class="relative max-h-full w-full max-w-md p-4">
                                        <div class="relative rounded-lg bg-white shadow">
                                            <button
                                                class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900"
                                                data-modal-hide="popup-modal-delete-{{ $item->id }}" type="button">
                                                <svg class="h-3 w-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 text-center md:p-5">
                                                <svg class="mx-auto mb-4 h-12 w-12 text-gray-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500">Are
                                                    you sure you want to delete {{ $item->menu_name }}?</h3>
                                                <form class="inline-flex"
                                                    action="{{ route('menuHistory.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="me-2 inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300"
                                                        type="submit">
                                                        Yes, I'm sure
                                                    </button>
                                                </form>

                                                <button
                                                    class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200"
                                                    data-modal-hide="popup-modal-delete-{{ $item->id }}"
                                                    type="button">No,
                                                    cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <script>
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

        //filter menu
        document.getElementById('menu-filter').addEventListener('change', function() {
            const selectedCategoryId = this.value;
            const menuItems = document.querySelectorAll(
                '.menu-item');

            menuItems.forEach(function(menuItem) {
                if (selectedCategoryId === 'Show All' || menuItem.dataset.categoryId ===
                    selectedCategoryId) {
                    menuItem.style.display = 'table-row';
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
                            'table-row';
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
            const contentMenu = document.querySelectorAll('.menu-item');

            contentMenu.forEach(row => {
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


        document.getElementById('filter-btn').addEventListener('click', function() {
            const dateFilter = document.getElementById('date-filter').value;

            if (dateFilter) {
                const tableRows = document.querySelectorAll('#tableData tr');

                tableRows.forEach(function(row, index) {
                    if (index !== 0) {
                        const rowData = row.getElementsByTagName('td');
                        const rowDate = rowData[4].innerText.substr(0, 10);

                        if (rowDate === dateFilter) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                });
            } else {
                alert('Silakan pilih tanggal terlebih dahulu.');
            }
        });


        //search
        $(document).ready(function() {
            const searchInput = $('#search');
            const clearSearch = $('#clearSearch');
            let formSubmitted = {{ request()->has('search') ? 'true' : 'false' }};

            if (searchInput.val().trim().length > 0) {
                clearSearch.show();
            }

            searchInput.on('input', function() {
                if ($(this).val().trim().length > 0) {
                    clearSearch.show();
                } else {
                    clearSearch.hide();
                }
            });

            searchInput.keypress(function(e) {
                if (e.which == 13) {
                    e.preventDefault();
                    $('#searchForm').submit();
                }
            });

            clearSearch.click(function() {
                searchInput.val('');
                clearSearch.hide();
                if (formSubmitted) {
                    window.location.href = "{{ route('menuHistory.index') }}";
                }
            });
        });
    </script>
@endsection
