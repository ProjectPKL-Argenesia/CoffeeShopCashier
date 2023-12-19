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
                            <form action="{{ route('menuList.store') }}" method="POST" >
                                @csrf
                                <div class="grid grid-cols-12 gap-x-2 pt-16 pb-10 px-8">
                                    <div class="flex flex-col gap-y-2 justify-center items-center col-span-3">
                                        <div
                                            class="grid grid-cols-1 place-items-center border border-gray-800 border-dashed rounded-lg w-[150px] h-[150px]">
                                            <img class="w-full h-full img-preview rounded-lg">
                                        </div>
                                        <div class="flex justify-center">
                                            <input type="file" name="image" id="image" onchange="previewImage()"
                                                required
                                                class="block w-[150px] text-xs file:text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-200 focus:outline-none">
                                        </div>
                                    </div>

                                    <div class="col-span-9 grid grid-cols-1 gap-y-6">
                                        <div class="col-span-1 grid grid-cols-12 gap-2">
                                            <div class="col-span-2 font-semibold gap-x-4 text-xs 2xl:text-sm text-start">
                                                <label for="menu_name" class="whitespace-nowrap">Menu Name</label>
                                            </div>
                                            <div class="col-span-1 text-center text-xs 2xl:text-sm">
                                                <span>:</span>
                                            </div>
                                            <div class="col-span-9">
                                                <input type="text" name="menu_name" id="menu_name" required
                                                    class="w-full px-2 py-1 text-xs 2xl:text-sm rounded-lg focus:ring-0 bg-gray-200"
                                                    placeholder="ex : Espresso">
                                            </div>
                                        </div>
                                        <div class="col-span-1 grid grid-cols-12 gap-2">
                                            <div class="col-span-2 font-semibold gap-x-4 text-xs 2xl:text-sm text-start">
                                                <label for="type" class="whitespace-nowrap">Menu Type</label>
                                            </div>
                                            <div class="col-span-1 text-center text-xs 2xl:text-sm">
                                                <span>:</span>
                                            </div>
                                            <div class="flex items-center gap-x-2 col-span-9">
                                                <div
                                                    class="flex items-center justify-between px-2 gap-x-4 py-1 text-xs 2xl:text-sm text-gray-900 bg-gray-200 border border-gray-500 rounded-lg">
                                                    <label for="food">Food</label>
                                                    <input type="radio" name="type" id="food" value="Food"
                                                        required class="text-gray-500 focus:ring-0">
                                                </div>
                                                <div
                                                    class="flex items-center justify-between px-2 gap-x-4 py-1 text-xs 2xl:text-sm text-gray-900 bg-gray-200 border border-gray-500 rounded-lg">
                                                    <label for="drink">Drink</label>
                                                    <input type="radio" name="type" id="drink" value="Drink"
                                                        required class="text-gray-500 focus:ring-0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-1 grid grid-cols-12 gap-2">
                                            <div class="col-span-2 font-semibold gap-x-4 text-xs 2xl:text-sm text-start">
                                                <label for="menu_category_id" class="whitespace-nowrap">Menu Category</label>
                                            </div>
                                            <div class="col-span-1 text-center text-xs 2xl:text-sm">
                                                <span>:</span>
                                            </div>
                                            <div class="col-span-9">
                                                <select name="menu_category_id" id="menu_category_id" required
                                                    class="w-full px-2 py-1 bg-gray-200 rounded-lg text-xs 2xl:text-sm focus:ring-0">
                                                    <option selected hidden>Menu Category</option>
                                                    @foreach ($dataMenuCategory as $item)
                                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-span-1 grid grid-cols-12 gap-2">
                                            <div class="col-span-2 font-semibold gap-x-4 text-xs 2xl:text-sm text-start">
                                                <label for="price" class="whitespace-nowrap">Price</label>
                                            </div>
                                            <div class="col-span-1 text-center text-xs 2xl:text-sm">
                                                <span>:</span>
                                            </div>
                                            <div class="col-span-9">
                                                <input type="text" name="price" id="price" required
                                                    class="w-full px-2 py-1 text-xs 2xl:text-sm rounded-lg focus:ring-0 bg-gray-200"
                                                    placeholder="8000">
                                            </div>
                                        </div>
                                        <div class="col-span-1 grid grid-cols-12 gap-2">
                                            <div class="col-span-2 font-semibold gap-x-4 text-xs 2xl:text-sm text-start">
                                                <label for="tax" class="whitespace-nowrap">Tax</label>
                                            </div>
                                            <div class="col-span-1 text-center text-xs 2xl:text-sm">
                                                <span>:</span>
                                            </div>
                                            <div class="col-span-9">
                                                <input type="text" name="tax" id="tax" required
                                                    class="w-full px-2 py-1 text-xs 2xl:text-sm rounded-lg focus:ring-0 bg-gray-200"
                                                    placeholder="0.11">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-20 col-span-12">
                                        <button type="submit"
                                            class="py-2 w-full bg-gray-800 rounded-lg text-gray-100">Done</button>
                                    </div>
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
                <label for="food-filter" class="text-black/70">Food</label>
                <input type="radio" name="type" id="food-filter" class="text-gray-500 focus:ring-white">
            </div>

            <div
                class="flex p-2 justify-center items-center border border-gray-300 text-gray-500 bg-white gap-x-2 rounded-lg md:w-[75px] lg:w-[100px]">
                <label for="drink-filter">Drink</label>
                <input type="radio" name="type" id="drink-filter" class="text-gray-500 focus:ring-white">
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
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-0"
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
                                <button data-modal-target="popup-modal-edit" data-modal-toggle="popup-modal-edit"
                                    class="block text-yellow-400 font-medium text-sm whitespace-nowrap px-1 text-center"
                                    type="button">
                                    <i class="fa-solid fa-file-signature px-1"></i>Edit
                                </button>

                                <div id="popup-modal-edit" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div
                                        class="relative p-4 w-full max-w-[55%] min-w-[50%] 2xl:max-w-[50%] 2xl:min-w-[45%] max-h-full">
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
                                            <form action="">
                                                <div class="grid grid-cols-12 gap-x-2 pt-16 pb-10 px-8">
                                                    <div class="grid place-items-center col-span-3">
                                                        <div
                                                            class="grid grid-cols-1 place-items-center border border-gray-800 border-dashed rounded-lg w-[150px] h-[150px]">
                                                            <img class="w-full h-full img-preview2 rounded-lg z-40">
                                                        </div>
                                                        <div class="flex justify-center">
                                                            <input type="file" name="image" id="image2"
                                                                onchange="previewImage2()" required
                                                                class="block w-[150px] text-xs file:text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-200 focus:outline-none">
                                                        </div>
                                                    </div>

                                                    <div class="col-span-9 grid grid-cols-1 gap-y-6">
                                                        <div class="col-span-1 grid grid-cols-12 gap-2">
                                                            <div
                                                                class="col-span-2 font-semibold gap-x-4 text-xs 2xl:text-sm text-start">
                                                                <label for="menu_name" class="whitespace-nowrap">Menu
                                                                    Name</label>
                                                            </div>
                                                            <div class="col-span-1 text-center text-xs 2xl:text-sm">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9">
                                                                <input type="text" name="menu_name" id="menu_name"
                                                                    required
                                                                    class="w-full px-2 py-1 text-xs 2xl:text-sm rounded-lg focus:ring-0 bg-gray-200"
                                                                    placeholder="ex : Espresso">
                                                            </div>
                                                        </div>
                                                        <div class="col-span-1 grid grid-cols-12 gap-2">
                                                            <div
                                                                class="col-span-2 font-semibold gap-x-4 text-xs 2xl:text-sm text-start">
                                                                <label for="menu_name" class="whitespace-nowrap">Menu
                                                                    Type</label>
                                                            </div>
                                                            <div class="col-span-1 text-center text-xs 2xl:text-sm">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="flex items-center gap-x-2 col-span-9">
                                                                <div
                                                                    class="flex items-center justify-between px-2 gap-x-4 py-1 text-xs 2xl:text-sm text-gray-900 bg-gray-200 border border-gray-500 rounded-lg">
                                                                    <label for="food">Food</label>
                                                                    <input type="radio" name="type" id="food"
                                                                        required value="Food"
                                                                        class="text-gray-500 focus:ring-0">
                                                                </div>
                                                                <div
                                                                    class="flex items-center justify-between px-2 gap-x-4 py-1 text-xs 2xl:text-sm text-gray-900 bg-gray-200 border border-gray-500 rounded-lg">
                                                                    <label for="drink">Drink</label>
                                                                    <input type="radio" name="type" id="drink"
                                                                        required value="Drink"
                                                                        class="text-gray-500 focus:ring-0">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-span-1 grid grid-cols-12 gap-2">
                                                            <div
                                                                class="col-span-2 font-semibold gap-x-4 text-xs 2xl:text-sm text-start">
                                                                <label for="menu_name" class="whitespace-nowrap">Menu
                                                                    Category</label>
                                                            </div>
                                                            <div class="col-span-1 text-center text-xs 2xl:text-sm">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9">
                                                                <select name="menu" id="menu" required
                                                                    class="w-full px-2 py-1 text-xs 2xl:text-sm bg-gray-200 rounded-lg focus:ring-0">
                                                                    <option selected hidden>Menu Category</option>
                                                                    <option value="Menu 1">Menu 1</option>
                                                                    <option value="Menu 2">Menu 2</option>
                                                                    <option value="Menu 3">Menu 3</option>
                                                                    <option value="Menu 4">Menu 4</option>
                                                                    <option value="Menu 5">Menu 5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-span-1 grid grid-cols-12 gap-2">
                                                            <div
                                                                class="col-span-2 font-semibold gap-x-4 text-xs 2xl:text-sm text-start">
                                                                <label for="menu_name"
                                                                    class="whitespace-nowrap">Price</label>
                                                            </div>
                                                            <div class="col-span-1 text-center text-xs 2xl:text-sm">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9">
                                                                <input type="text" name="menu_name" id="menu_name"
                                                                    required
                                                                    class="w-full px-2 py-1 text-xs 2xl:text-sm rounded-lg focus:ring-0 bg-gray-200"
                                                                    placeholder="Rp. xx.xxx">
                                                            </div>
                                                        </div>
                                                        <div class="col-span-1 grid grid-cols-12 gap-2">
                                                            <div
                                                                class="col-span-2 font-semibold gap-x-4 text-xs 2xl:text-sm text-start">
                                                                <label for="menu_name"
                                                                    class="whitespace-nowrap">Tax</label>
                                                            </div>
                                                            <div class="col-span-1 text-center text-xs 2xl:text-sm">
                                                                <span>:</span>
                                                            </div>
                                                            <div class="col-span-9">
                                                                <input type="text" name="menu_name" id="menu_name"
                                                                    required
                                                                    class="w-full px-2 py-1 text-xs 2xl:text-sm rounded-lg focus:ring-0 bg-gray-200"
                                                                    placeholder="Rp. xx.xxx">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pt-20 col-span-12">
                                                        <button type="submit"
                                                            class="py-2 w-full bg-gray-800 rounded-lg text-gray-100">Done</button>
                                                    </div>
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
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        function previewImage2() {
            const image2 = document.querySelector('#image2');
            const imgPreview2 = document.querySelector('.img-preview2');

            imgPreview2.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image2.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview2.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
