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
        <div class="gap-y-2 px-8 pb-10 pt-16 text-black">
            <div class="mb-5 flex w-full flex-col items-center">
                <span class="text-xl font-semibold">{{ $item->store->name }}</span>
                <span>{{ $item->store->address }}</span>
            </div>

            <div class="grid grid-cols-2 border-t border-dashed border-black py-5">
                <span class="justify-self-start">Struk {{ $item->order->no_receipt }}</span>
                <span class="justify-self-end">{{ $item->date_payment }}</span>
                <span class="justify-self-start">{{ $item->order->table->name }}</span>
                <span class="justify-self-end">Cashier : {{ $item->cashier->name }}</span>
            </div>

            <div class="mb-5 border-b border-dashed border-black py-4 text-left">
                <div class="mb-4 grid w-full grid-cols-4 border-b border-dashed border-black">
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

            <div class="mb-4 flex justify-between border-b border-dashed border-black pb-4">
                <div class="grid">
                    <span class="justify-self-start">Sub Total</span>
                    <span class="justify-self-start">tax</span>
                    <span class="justify-self-start text-xl font-semibold">Total</span>
                </div>
                <div class="grid">
                    <span class="justify-self-end">Rp. {{ $item->sub_total }}</span>
                    <span class="justify-self-end">Rp. {{ $item->tax }}</span>
                    <span class="justify-self-end text-xl font-semibold">Rp. {{ $item->total }}</span>
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
        window.onafterprint = function() {
            // Mengarahkan pengguna ke route 'transaction.index' setelah print selesai
            window.location.href = "{{ route('transaction.index') }}"; // Ganti dengan URL atau route Anda
        };
    </script>
</body>

</html>
