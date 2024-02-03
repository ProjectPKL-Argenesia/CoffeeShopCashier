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

                @include('pages.menuCategory.add')

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

                                    @include('pages.menuCategory.edit')

                                </div>

                                <!-- Button Hapus -->
                                <button data-modal-target="popup-modal-delete-{{ $item->id }}"
                                    data-modal-toggle="popup-modal-delete-{{ $item->id }}"
                                    class="font-medium text-red-500" type="button"><i
                                        class="px-1 fa-solid fa-trash-can"></i>
                                    Hapus
                                </button>

                                @include('pages.menuCategory.delete')

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
