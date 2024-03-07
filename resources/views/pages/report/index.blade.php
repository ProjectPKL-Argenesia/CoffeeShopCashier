@extends('layouts.backend.main')

@section('content')
    <section class="h-screen p-10 bg-gray-300">
        <div class="flex justify-between pb-5">
            <h1 class="text-3xl font-bold text-black/80">Report</h1>
        </div>
        <div class="flex flex-wrap items-center justify-end pb-4 space-y-4 gap-x-2 flex-column md:flex-row md:space-y-0">
            <div>
                <a href="{{ route('struck.allreport') }}" target="_blank" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Print</a>
            </div>
            <div id="date-Filter" class="flex items-center justify-center text-gray-500 border-none rounded-lg">
                <input type="date" name="date_payment" id="date-filter"
                    class="p-2 text-gray-500 bg-white border-none rounded-lg focus:ring-0">
                <button id="filter-btn"
                    class="px-4 py-2 ml-2 font-bold text-white bg-gray-400 rounded-lg hover:bg-gray-500">Filter</button>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                    <i class="pt-1 text-gray-500 fa-solid fa-search fa-md"></i>
                </div>
                <input type="search" id="table-search-users"
                    class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search UID Transaksi">
            </div>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right" id="tableData">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr class="bg-gray-400">
                        <th class="px-6 py-4">
                            No.
                        </th>
                        <th class="px-6 py-4">
                            UID Transaction
                        </th>
                        <th class="px-6 py-4">
                            Date Transaction
                        </th>
                        <th class="px-6 py-4">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($dataPayment->isEmpty())
                        <tr>
                            <td colspan="4" class="py-5 text-xl font-semibold text-center bg-white">Tidak ada transaksi
                            </td>
                        </tr>
                    @else
                        @foreach ($dataPayment as $item)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $item->order->no_receipt }}</td>
                                <td class="px-6 py-4">{{ $item->date_payment }}</td>
                                <td class="flex px-6 py-4">

                                    <!-- Button Info -->
                                    <div>
                                        <button data-modal-target="popup-modal-info-{{ $item->id }}"
                                            data-modal-toggle="popup-modal-info-{{ $item->id }}"
                                            class="block px-1 text-sm font-medium text-center text-blue-500" type="button">
                                            <i class="px-1 fa-solid fa-file-signature"></i>Info
                                        </button>

                                        @include('pages.report.info')

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>

    <script>
        document.getElementById('filter-btn').addEventListener('click', function() {
            const dateFilter = document.getElementById('date-filter').value;

            if (dateFilter) {
                const tableRows = document.querySelectorAll('#tableData tr');

                tableRows.forEach(function(row, index) {
                    if (index !== 0) {
                        const rowData = row.getElementsByTagName('td');
                        const rowDate = rowData[2].innerText.substr(0, 10);
                        console.info(rowDate);
                        if (rowDate === dateFilter) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                });
            } else {
                alert('Silakan pilih tanggal terlebih dahulu.');
            }
        });
    </script>

@endsection
