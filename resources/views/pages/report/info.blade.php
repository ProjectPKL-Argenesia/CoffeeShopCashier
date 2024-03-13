<div id="popup-modal-info-{{ $item->id }}" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-[40%] min-w-[35%] max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-modal-info-{{ $item->id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <form action="">
                <div class="px-8 pt-16 pb-10 gap-y-2 text-black">

                    <div class="flex flex-col items-center w-full mb-5">
                        <span class="text-xl font-semibold">{{ $item->store->name }}</span>
                        <span>{{ $item->store->address }}</span>
                    </div>

                    <div class="grid grid-cols-2 mb-5">
                        <span class="justify-self-start">Struk {{ $item->order->no_receipt }}</span>
                        <span class="justify-self-end">{{ $item->date_payment }}</span>
                        <span class="justify-self-start">{{ $item->order->table->name }}</span>
                        <span class="justify-self-end">Cashier: {{ $item->cashier->name }}</span>
                    </div>

                    <div class="border-y border-black border-dashed grid grid-cols-4 py-2 mb-5">
                        <span class="font-semibold">Barang</span>
                        <span class="font-semibold justify-self-center">Harga</span>
                        <span class="font-semibold justify-self-center">Jumlah</span>
                        <span class="font-semibold justify-self-end">Total</span>
                        @foreach ($item->order->orderDetails as $orderDetail)
                            <span>{{ $orderDetail->menu_name }}</span>
                            <span class="justify-self-center">Rp. {{ $orderDetail->price }}</span>
                            <span class="justify-self-center">x {{ $orderDetail->qty }}</span>
                            <span class="justify-self-end">Rp. {{ $orderDetail->total_price }}</span>
                        @endforeach
                    </div>

                    <div class="grid grid-cols-2 mb-5">
                        <span class="justify-self-start">Sub Total</span>
                        <span class="justify-self-end">{{ $item->sub_total }}</span>
                        <span class="justify-self-start">tax</span>
                        <span class="justify-self-end">{{ $item->tax }}</span>
                        <span class="justify-self-start text-xl font-semibold">Total</span>
                        <span class="justify-self-end text-xl font-semibold">{{ $item->total }}</span>
                    </div>

                    <button type="submit" class="w-full py-2 text-gray-100 bg-gray-800 rounded-lg">Print</button>
                </div>
            </form>
        </div>
    </div>
</div>
