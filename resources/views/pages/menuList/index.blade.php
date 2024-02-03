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

                @include('pages.menuList.add')

            </div>
        </div>
        <div
            class="flex flex-wrap items-center justify-end pb-4 space-y-4 gap-x-2 flex-column md:flex-row md:space-y-0 md:text-xs lg:text-sm">
            <div id="foodType-Filter"
                class="flex p-2 justify-center items-center border border-gray-300 text-gray-500 bg-white gap-x-2 rounded-lg md:w-[75px] lg:w-[100px]">
                <label class="text-black/70">Food</label>
                <input type="radio" name="type" id="food-filter" class="text-gray-500 focus:ring-white" value="Food">
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

                                    @include('pages.menuList.restock')
                                </div>

                                <!-- Button Edit -->
                                <div class="col-start-1">
                                    <button data-modal-target="popup-modal-edit-{{ $item->id }}"
                                        data-modal-toggle="popup-modal-edit-{{ $item->id }}"
                                        class="block text-xs font-medium text-center text-yellow-400 2xl:text-sm whitespace-nowrap"
                                        type="button">
                                        <i class="px-1 fa-solid fa-file-signature"></i>Edit
                                    </button>

                                    @include('pages.menuList.edit')

                                </div>

                                <!-- Button Hapus -->
                                <button data-modal-target="popup-modal-delete-{{ $item->id }}"
                                    data-modal-toggle="popup-modal-delete-{{ $item->id }}"
                                    class="text-xs font-medium text-red-500 2xl:text-sm whitespace-nowrap" type="button"><i
                                        class="px-1 fa-solid fa-trash-can"></i>
                                    Hapus
                                </button>

                                @include('pages.menuList.delete')

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
