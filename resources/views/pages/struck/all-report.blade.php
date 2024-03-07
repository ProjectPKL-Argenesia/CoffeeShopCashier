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
    <section class="mx-2 my-20 overflow-x-hidden rounded-lg shadow-md">
        <table class="w-full text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr class="text-center bg-gray-400">
                    <th class="px-4 py-4">
                        No.
                    </th>
                    <th class="px-4 py-4">
                        UID Transaction
                    </th>
                    <th class="px-4 py-4">
                        Date Transaction
                    </th>
                    <th class="px-4 py-4">
                        Table
                    </th>
                    <th class="px-4 py-4">
                        Cashier
                    </th>
                    <th class="px-4 py-4">
                        Sub Total
                    </th>
                    <th class="px-4 py-4">
                        Tax
                    </th>
                    <th class="px-4 py-4">
                        Total
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($dataPayment->isEmpty())
                    <tr class="text-center">
                        <td colspan="8" class="py-5 text-lg font-semibold bg-white">Tidak ada transaksi
                        </td>
                    </tr>
                @else
                    @foreach ($dataPayment as $item)
                        <tr class="text-xs text-center bg-white border-b">
                            <td class="px-4 py-4">{{ $loop->iteration }}</td>
                            <td class="px-4 py-4">{{ $item->order->no_receipt }}</td>
                            <td class="px-4 py-4">{{ $item->date_payment }}</td>
                            <td class="px-4 py-4">{{ $item->order->table->name }}</td>
                            <td class="px-4 py-4">{{ $item->cashier->name }}</td>
                            <td class="px-4 py-4">{{ $item->sub_total }}</td>
                            <td class="px-4 py-4">{{ $item->tax }}</td>
                            <td class="px-4 py-4">{{ $item->total }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </section>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>
