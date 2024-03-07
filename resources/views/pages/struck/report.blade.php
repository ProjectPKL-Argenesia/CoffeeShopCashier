<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @foreach ($dataPayment as $item)
        <div class="px-8 pt-16 pb-10 text-black gap-y-2">
            <div class="flex flex-col items-center w-full mb-5">
                <span class="text-xl font-semibold">{{ $item->store->name }}</span>
                <span>{{ $item->store->address }}</span>
            </div>

            <div class="grid grid-cols-2 py-5 border-t border-black border-dashed">
                <span class="justify-self-start">Struk {{ $item->order->no_receipt }}</span>
                <span class="justify-self-end">{{ $item->date_payment }}</span>
                <span class="justify-self-start">{{ $item->order->table->name }}</span>
                <span class="justify-self-end">Cashier : {{ $item->cashier->name }}</span>
            </div>

            <div class="py-4 mb-5 text-left border-b border-black border-dashed">
                <div
                    class="grid w-full grid-cols-4 mb-4 border-b border-black border-dashed">
                    <span>Barang</span>
                    <span>Harga</span>
                    <span>Jumlah</span>
                    <span>Total</span>
                </div>
                @foreach ($item->order->orderDetails as $orderDetail)
                    <div class="grid w-full grid-cols-4">
                        <span>{{ $orderDetail->menu_name }}</span>
                        <span>Rp. {{ $orderDetail->price }}</span>
                        <span>X {{ $orderDetail->qty }}</span>
                        <span>Rp. {{ $orderDetail->total_price }}</span>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-between pb-4 mb-4 border-b border-black border-dashed">
                <div class="grid">
                    <span class="justify-self-start">Sub Total</span>
                    <span class="justify-self-start">tax</span>
                    <span class="text-xl font-semibold justify-self-start">Total</span>
                </div>
                <div class="grid">
                    <span class="justify-self-end">Rp. {{ $item->sub_total }}</span>
                    <span class="justify-self-end">Rp. {{ $item->tax }}</span>
                    <span class="text-xl font-semibold justify-self-end">Rp. {{ $item->total }}</span>
                </div>
            </div>
            <div class="flex items-center justify-center py-4 text-center">
                <span class="text-xl font-semibold">Thanks You</span>
            </div>
        </div>
    @endforeach
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>
