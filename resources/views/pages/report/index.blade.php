@extends('layouts.backend.main')

@section('content')
    <section class="h-screen p-10 bg-gray-300">
        <div class="flex justify-between pb-5">
            <h1 class="text-3xl font-bold text-black/80">Report</h1>
        </div>
        <div class="flex flex-wrap items-center justify-end pb-4 space-y-4 gap-x-2 flex-column md:flex-row md:space-y-0">
            <div>
                <a href="{{ route('struck.allreport') }}" target="_blank"
                    class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Print</a>
            </div>
            <div id="date-Filter" class="flex items-center justify-center text-gray-500 border-none rounded-lg">
                <input type="date" name="date_payment" id="date-filter"
                    class="p-2 text-gray-500 bg-white border-none rounded-lg focus:ring-0">
                <button id="filter-btn"
                    class="px-4 py-2 ml-2 font-bold text-white bg-gray-400 rounded-lg hover:bg-gray-500">Filter</button>
            </div>
            <form action="{{ route('report.index') }}" method="GET" id="searchForm">
                <div
                    class="relative flex items-center justify-center text-gray-500 bg-white border border-gray-300 rounded-lg w-80">
                    <label for="search" class="absolute mx-1.5 left-0 flex justify-end items-center w-[10%]"><i
                            class="fa-solid fa-search fa-md"></i></label>
                    <input type="text" name="search" id="search"
                        class="text-gray-500 border-none md:text-xs lg:text-sm text-start focus:ring-0 w-[70%]"
                        placeholder="Search Transaction" value="{{ request('search') }}">
                    <span id="clearSearch"
                        class="absolute right-0 w-[10%] px-1.5 text-center rounded-sm mx-1.5 font-bold bg-gray-300 cursor-pointer {{ request('search') ? '' : 'hidden' }} hover:bg-gray-400">x</span>
                </div>
            </form>
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
                            <td colspan="4" class="py-5 text-xl font-semibold text-center bg-white">Doesn't have transaction
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


        //search
        $(document).ready(function() {
            const searchInput = $('#search');
            const clearSearch = $('#clearSearch');
            let formSubmitted = {{ request()->has('search') ? 'true' : 'false' }};

            if (searchInput.val().trim().length > 0) {
                clearSearch.show();
            }

            searchInput.on('input', function() {
                if ($(this).val().trim().length > 0) {
                    clearSearch.show();
                } else {
                    clearSearch.hide();
                }
            });

            searchInput.keypress(function(e) {
                if (e.which == 13) {
                    e.preventDefault();
                    $('#searchForm').submit();
                }
            });

            clearSearch.click(function() {
                searchInput.val('');
                clearSearch.hide();
                if (formSubmitted) {
                    window.location.href = "{{ route('report.index') }}";
                }
            });
        });
    </script>

@endsection
