<div id="popup-modal-charge" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-[40%] min-w-[35%] max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-modal-charge">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            {{-- <form id="chargeForm" action="{{ route('transaction.store') }}" method="POST">
                @csrf --}}
                <div class="grid grid-cols-12 px-8 pt-16 pb-10">

                    {{-- table name --}}
                    <div class="grid grid-cols-12 col-span-12">
                        <div class="col-span-2 text-sm font-semibold text-center justify-self-start gap-x-4">
                            <label for="name" class="whitespace-nowrap">Table Name</label>
                        </div>
                        <div class="col-span-1 justify-self-center">
                            <span>:</span>
                        </div>
                        <div class="col-span-9">
                            <span id="table_name"></span>
                        </div>
                    </div>

                    {{-- order detail --}}
                    <div class="grid grid-cols-12 col-span-12">
                        <div class="col-span-2 text-sm font-semibold text-center justify-self-start gap-x-4">
                            <label for="orderDetail" class="whitespace-nowrap">Order Detail</label>
                        </div>
                        <div class="col-span-1 justify-self-center">
                            <span>:</span>
                        </div>
                        <div id="detailOrder" class="col-span-9">
                        </div>
                    </div>

                    {{-- sub total --}}
                    <div class="grid grid-cols-12 col-span-12">
                        <div class="col-span-2 text-sm font-semibold text-center justify-self-start gap-x-4">
                            <label for="subTotal" class="whitespace-nowrap">Sub Total</label>
                        </div>
                        <div class="col-span-1 justify-self-center">
                            <span>:</span>
                        </div>
                        <div class="col-span-9">
                            <span id="subTotal"></span>
                        </div>
                    </div>

                    {{-- tax --}}
                    <div class="grid grid-cols-12 col-span-12">
                        <div class="col-span-2 text-sm font-semibold text-center justify-self-start gap-x-4">
                            <label for="tax" class="whitespace-nowrap">Tax</label>
                        </div>
                        <div class="col-span-1 justify-self-center">
                            <span>:</span>
                        </div>
                        <div class="col-span-9">
                            <span id="pajak"></span>
                        </div>
                    </div>

                    {{-- total --}}
                    <div class="grid grid-cols-12 col-span-12">
                        <div class="col-span-2 text-sm font-semibold text-center justify-self-start gap-x-4">
                            <label for="name" class="whitespace-nowrap">Total</label>
                        </div>
                        <div class="col-span-1 justify-self-center">
                            <span>:</span>
                        </div>
                        <div class="col-span-9">
                            <span id="total"></span>
                        </div>
                    </div>
                    <a href="#" id="simpannButton" onclick="simpannButtonClick()" class="col-span-12 py-2 text-sm text-center text-gray-100 bg-gray-800 rounded-lg mt-7">Done</a>
                    {{-- <button type="submit"
                        class="col-span-12 py-2 text-sm text-gray-100 bg-gray-800 rounded-lg mt-7">Done</button> --}}
                </div>
            {{-- </form> --}}
        </div>
    </div>
</div>
