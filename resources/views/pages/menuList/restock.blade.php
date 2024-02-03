<div id="popup-modal-restock-{{ $item->id }}" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-[55%] min-w-[50%] 2xl:max-w-[50%] 2xl:min-w-[45%] max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-modal-restock-{{ $item->id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
                            <label for="stock" class="whitespace-nowrap">Stock</label>
                        </div>
                        <div class="flex items-center justify-center col-span-1">
                            <span>:</span>
                        </div>
                        <div class="col-span-9">
                            <input type="number" name="stock" id="stock"
                                class="w-full px-2 py-1 text-sm bg-gray-200 rounded-lg focus:ring-0"
                                placeholder="ex : 25" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 col-span-12">
                        <div class="col-span-2 text-xs font-semibold gap-x-4 2xl:text-sm text-start">
                            <label for="nama" class="whitespace-nowrap">Restock
                                by</label>
                        </div>
                        <div class="col-span-1 text-xs text-center 2xl:text-sm">
                            <span>:</span>
                        </div>
                        <div class="col-span-9">
                            <input type="text" name="nama" id="nama" required
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
