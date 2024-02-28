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
            <form action="{{ route('store.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-12 px-8 pt-16 pb-10 gap-y-4">
                    <div class="grid grid-cols-12 col-span-12">
                        <div
                            class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                            <label for="name" class="whitespace-nowrap">Name</label>
                        </div>
                        <div class="flex items-center justify-center col-span-1">
                            <span>:</span>
                        </div>
                        <div class="col-span-9">
                            <input type="text" name="name" id="name"
                                class="w-full px-2 py-1 bg-gray-200 rounded-lg focus:ring-0" placeholder="store name"
                                required>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 col-span-12">
                        <div
                            class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                            <label for="address" class="whitespace-nowrap">Address</label>
                        </div>
                        <div class="flex items-center justify-center col-span-1">
                            <span>:</span>
                        </div>
                        <div class="col-span-9">
                            <input type="text" name="address" id="address"
                                class="w-full px-2 py-1 bg-gray-200 rounded-lg focus:ring-0"
                                placeholder="village, subdistric, city, province, state" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 col-span-12">
                        <div
                            class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                            <label for="callCenter" class="whitespace-nowrap">Call Center</label>
                        </div>
                        <div class="flex items-center justify-center col-span-1">
                            <span>:</span>
                        </div>
                        <div class="col-span-9">
                            <input type="text" name="callCenter" id="callCenter"
                                class="w-full px-2 py-1 bg-gray-200 rounded-lg focus:ring-0" placeholder="08********"
                                required>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 col-span-12">
                        <div
                            class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                            <label for="email" class="whitespace-nowrap">Email</label>
                        </div>
                        <div class="flex items-center justify-center col-span-1">
                            <span>:</span>
                        </div>
                        <div class="col-span-9">
                            <input type="text" name="email" id="email"
                                class="w-full px-2 py-1 bg-gray-200 rounded-lg focus:ring-0"
                                placeholder="example@gmail.com" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 col-span-12">
                        <div
                            class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                            <label for="password" class="whitespace-nowrap">Password</label>
                        </div>
                        <div class="flex items-center justify-center col-span-1">
                            <span>:</span>
                        </div>
                        <div class="col-span-9">
                            <input type="password" name="password" id="password"
                                class="w-full px-2 py-1 bg-gray-200 rounded-lg focus:ring-0" placeholder="*****"
                                required>
                        </div>
                    </div>

                    <button type="submit"
                        class="col-span-12 py-2 text-sm text-gray-100 bg-gray-800 rounded-lg">Done</button>
                </div>
            </form>
        </div>
    </div>
</div>
