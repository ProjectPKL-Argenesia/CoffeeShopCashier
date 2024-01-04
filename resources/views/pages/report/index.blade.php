@extends('layouts.backend.main')

@section('content')
    <section class="h-screen p-10 bg-gray-300">
        <div class="flex justify-between pb-5">
            <h1 class="text-3xl font-bold text-black/80">Report</h1>
        </div>
        <div class="flex flex-wrap items-center justify-end pb-4 space-y-4 gap-x-2 flex-column md:flex-row md:space-y-0">
            <div id=""
                class="flex justify-center items-center border-none text-gray-500 bg-white rounded-lg">
                <input type="date" name="date_payment" id="" class="p-1.5 text-gray-500 rounded-lg focus:ring-0 border-none">
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                    <i class="pt-1 text-gray-500 fa-solid fa-search fa-md"></i>
                </div>
                <input type="search" id="table-search-users"
                    class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search UID Transaksi">
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
                            UID Transaction
                        </th>
                        <th class="px-6 py-4">
                            Date Transaction
                        </th>
                        <th class="px-6 py-4">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataMenuHistory as $item)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $item->menu_name }}</td>
                            <td class="px-6 py-4">{{ $item->created_at }}</td>
                            <td class="flex px-6 py-4">

                                <!-- Button Info -->
                                <div>
                                    <button data-modal-target="popup-modal-info-{{ $item->id }}"
                                        data-modal-toggle="popup-modal-info-{{ $item->id }}"
                                        class="block px-1 text-sm font-medium text-center text-blue-500" type="button">
                                        <i class="px-1 fa-solid fa-file-signature"></i>Info
                                    </button>

                                    <div id="popup-modal-info-{{ $item->id }}" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-[40%] min-w-[35%] max-h-full">
                                            <div class="relative bg-white rounded-lg shadow">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="popup-modal-info-{{ $item->id }}">
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
                                                    <div class="grid grid-cols-12 px-8 pt-16 pb-10 gap-y-2">
                                                        <div class="grid grid-cols-12 col-span-12">
                                                            <div
                                                                class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                                                                <label for="menu_name"
                                                                    class="whitespace-nowrap">Name</label>
                                                            </div>
                                                            <div class="flex items-center justify-center col-span-1">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9">
                                                                <input type="text" name="menu_name" id="menu_name"
                                                                    readonly disabled
                                                                    class="w-full px-2 py-1 text-gray-900 bg-gray-200 rounded-lg focus:ring-0"
                                                                    value="{{ $item->menu_name }}">
                                                            </div>
                                                        </div>
                                                        <div class="grid grid-cols-12 col-span-12">
                                                            <div
                                                                class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                                                                <label for="type">Type</label>
                                                            </div>
                                                            <div class="flex items-center justify-center col-span-1">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="flex col-span-9 py-2 gap-x-2">
                                                                <div
                                                                    class="flex items-center justify-between px-2 py-1 text-gray-900 bg-gray-200 border border-gray-500 rounded-lg gap-x-4">
                                                                    <label for="food">Food</label>
                                                                    <input type="radio" name="type" id="food"
                                                                        value="Food" class="text-gray-500 focus:ring-0"
                                                                        {{ $item->type == 'Food' ? 'checked' : '' }}
                                                                        readonly disabled>
                                                                </div>
                                                                <div
                                                                    class="flex items-center justify-between px-2 py-1 text-gray-900 bg-gray-200 border border-gray-500 rounded-lg gap-x-2">
                                                                    <label for="drink">Drink</label>
                                                                    <input type="radio" name="type" id="drink"
                                                                        value="Drink" class="text-gray-500 focus:ring-0"
                                                                        {{ $item->type == 'Drink' ? 'checked' : '' }}
                                                                        readonly disabled>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="grid grid-cols-12 col-span-12">
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
                                                                    class="w-full px-2 py-1 text-gray-900 bg-gray-200 rounded-lg focus:ring-0"
                                                                    value="{{ $item->menu_category->category_name }}"
                                                                    readonly disabled>
                                                            </div>
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
                                                                <input type="text" name="stock" id="stock"
                                                                    class="w-full px-2 py-1 text-gray-900 bg-gray-200 rounded-lg focus:ring-0"
                                                                    value="{{ $item->stock }}" readonly disabled>
                                                            </div>
                                                        </div>

                                                        <div class="grid grid-cols-12 col-span-12">
                                                            <div
                                                                class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                                                                <label for="price"
                                                                    class="whitespace-nowrap">Price</label>
                                                            </div>
                                                            <div class="flex items-center justify-center col-span-1">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9">
                                                                <input type="text" name="price" id="price"
                                                                    class="w-full px-2 py-1 text-gray-900 bg-gray-200 rounded-lg focus:ring-0"
                                                                    value="{{ $item->price }}" readonly disabled>
                                                            </div>
                                                        </div>

                                                        <div class="grid grid-cols-12 col-span-12">
                                                            <div
                                                                class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                                                                <label for="tax"
                                                                    class="whitespace-nowrap">Tax</label>
                                                            </div>
                                                            <div class="flex items-center justify-center col-span-1">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9">
                                                                <input type="text" name="tax" id="tax"
                                                                    class="w-full px-2 py-1 text-gray-900 bg-gray-200 rounded-lg focus:ring-0"
                                                                    value="{{ $item->tax }}" readonly disabled>
                                                            </div>
                                                        </div>

                                                        <div class="grid grid-cols-12 col-span-12 pb-20">
                                                            <div
                                                                class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                                                                <label for="date"
                                                                    class="whitespace-nowrap">Date</label>
                                                            </div>
                                                            <div class="flex items-center justify-center col-span-1">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9">
                                                                <input type="datetime-local" name="date"
                                                                    id="date"
                                                                    class="w-full px-2 py-1 text-gray-900 bg-gray-200 rounded-lg focus:ring-0"
                                                                    value="{{ $item->created_at }}" readonly disabled>
                                                            </div>
                                                        </div>

                                                        <button type="submit"
                                                            class="col-span-12 py-2 text-gray-100 bg-gray-800 rounded-lg">Print</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                                <form action="{{ route('table.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="grid grid-cols-12 px-8 pt-16 pb-10 gap-y-2">
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

                                                        <button type="submit"
                                                            class="col-span-12 py-2 text-gray-100 bg-gray-800 rounded-lg">Done</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button Hapus -->

                                <form action="{{ route('menuHistory.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-500"
                                        onclick="return confirm('Yakin?')"><i
                                            class="px-1 fa-solid fa-trash-can"></i>Hapus</button>
                                </form>
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
    </script>
@endsection
