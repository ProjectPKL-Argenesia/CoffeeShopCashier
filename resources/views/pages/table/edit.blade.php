<div id="popup-modal-edit-{{ $item->id }}" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-[40%] min-w-[35%] max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-modal-edit-{{ $item->id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <form action="{{ route('table.update', $item->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="grid grid-cols-12 px-8 pt-16 pb-10">
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

                    <div class="grid grid-cols-12 col-span-12 pb-20">
                        <div
                            class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                            <label for="status">Status</label>
                        </div>
                        <div class="flex items-center justify-center col-span-1">
                            <span>:</span>
                        </div>
                        <div class="grid grid-cols-3 col-span-9 py-2 gap-x-2">
                            <div id="emptyTable-Edit"
                                class="flex items-center justify-between px-2 py-1 text-gray-900 bg-gray-200 border border-gray-500 rounded-lg gap-x-2">
                                <label for="empty-edit">Empty</label>
                                <input type="radio" name="status" id="empty-edit" value="Empty"
                                    class="text-gray-500 focus:ring-0" {{ $item->status == 'Empty' ? 'checked' : '' }}>
                            </div>
                            <div id="brokenTable-Edit"
                                class="flex items-center justify-between px-2 py-1 text-gray-900 bg-red-200 border border-gray-500 rounded-lg gap-x-2">
                                <label for="broken-edit">Broken</label>
                                <input type="radio" name="status" id="broken-edit" value="Broken"
                                    class="text-red-400 focus:ring-0" {{ $item->status == 'Broken' ? 'checked' : '' }}>
                            </div>
                            <div id="filledTable-Edit"
                                class="flex items-center justify-between px-2 py-1 text-gray-900 bg-green-200 border border-gray-500 rounded-lg gap-x-2">
                                <label for="filled-edit">Filled</label>
                                <input type="radio" name="status" id="filled-edit" value="Filled"
                                    class="text-green-400 focus:ring-0"
                                    {{ $item->status == 'Filled' ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="col-span-12 py-2 text-gray-100 bg-gray-800 rounded-lg">Done</button>
                </div>
            </form>
        </div>
    </div>
</div>
