<div id="popup-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-[40%] min-w-[35%] max-h-full">
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
