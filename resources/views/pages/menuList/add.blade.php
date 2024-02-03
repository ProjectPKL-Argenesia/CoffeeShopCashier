<div id="popup-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-[55%] min-w-[50%] 2xl:max-w-[50%] 2xl:min-w-[45%] max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <form action="{{ route('menuList.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-12 px-8 pt-16 pb-10 gap-x-2">
                    <div class="flex flex-col items-center justify-center col-span-3 gap-y-2">
                        <div
                            class="grid grid-cols-1 place-items-center border border-gray-800 border-dashed rounded-lg w-[150px] h-[150px]">
                            <img class="w-[150px] h-[150px] object-cover rounded-lg img-preview">
                        </div>
                        <div class="flex justify-center">
                            <input type="file" name="image" id="image" onchange="previewImage()" required
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
                                    <input type="radio" name="type" id="food" value="Food" required
                                        class="text-gray-500 focus:ring-0">
                                </div>
                                <div id="drinkType"
                                    class="flex items-center justify-between px-2 py-1 text-xs text-gray-900 bg-gray-200 border border-gray-500 rounded-lg gap-x-4 2xl:text-sm">
                                    <label for="drink">Drink</label>
                                    <input type="radio" name="type" id="drink" value="Drink" required
                                        class="text-gray-500 focus:ring-0">
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
                                <label for="stock" class="whitespace-nowrap">Stock</label>
                            </div>
                            <div class="col-span-1 text-xs text-center 2xl:text-sm">
                                <span>:</span>
                            </div>
                            <div class="col-span-9">
                                <input type="number" name="stock" id="stock" required
                                    class="w-full px-2 py-1 text-xs bg-gray-200 rounded-lg 2xl:text-sm focus:ring-0"
                                    placeholder="ex : 25">
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
                        <button type="submit" class="w-full py-2 text-gray-100 bg-gray-800 rounded-lg">Done</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
