@extends('layouts.backend.main')

@section('content')
    <section class="h-screen bg-gray-300 p-10">
        <div class="flex justify-between pb-5">
            <h1 class="text-3xl font-bold text-black/80">Report</h1>
        </div>
        <div class="flex w-full items-end space-y-4 pb-4 md:flex-row md:space-y-0 lg:flex-col">
            <label class="sr-only" for="table-search">Search</label>
            <div class="relative flex items-center gap-x-2">
                <div class="flex items-center justify-center gap-x-2 rounded-lg border-none text-gray-500" id="date-Filter">
                    <input class="rounded-lg border-none bg-white p-2 text-gray-500 focus:ring-0" id="date-filter"
                        name="date_payment" type="date">
                    <button class="rounded-lg bg-gray-400 px-4 py-2 font-bold text-white hover:bg-gray-500"
                        id="filter-btn">Filter</button>
                </div>
                <form id="searchForm" action="{{ route('report.index') }}" method="GET">
                    <div
                        class="relative flex w-80 items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-500">
                        <label class="absolute left-0 mx-1.5 flex w-[10%] items-center justify-end" for="search"><i
                                class="fa-solid fa-search fa-md"></i></label>
                        <input class="w-[70%] border-none text-start text-gray-500 focus:ring-0 md:text-xs lg:text-sm"
                            id="search" name="search" type="text" value="{{ request('search') }}"
                            placeholder="Search Transaction" />
                        <span
                            class="{{ request('search') ? '' : 'hidden' }} absolute right-0 mx-1.5 w-[10%] cursor-pointer rounded-sm bg-gray-300 px-1.5 text-center font-bold hover:bg-gray-400"
                            id="clearSearch">x</span>
                    </div>
                </form>
                <div>
                    <a class="rounded-lg bg-blue-500 px-4 py-2 text-white hover:bg-blue-600"
                        href="{{ route('struck.allreport') }}" target="_blank">Print</a>
                </div>
            </div>
        </div>

        <div class="relative w-full overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-left text-sm text-gray-500 rtl:text-right" id="tableData">
                <thead class="bg-gray-50 text-xs uppercase text-gray-700">
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
                            <td class="bg-white py-5 text-center text-xl font-semibold" colspan="4">Doesn't have
                                transaction
                            </td>
                        </tr>
                    @else
                        @foreach ($dataPayment as $item)
                            <tr class="border-b bg-white">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $item->order->no_receipt }}</td>
                                <td class="px-6 py-4">{{ $item->date_payment }}</td>
                                <td class="flex px-6 py-4">

                                    <!-- Button Info -->
                                    <div>
                                        <button class="block px-1 text-center text-sm font-medium text-blue-500"
                                            data-modal-target="popup-modal-info-{{ $item->id }}"
                                            data-modal-toggle="popup-modal-info-{{ $item->id }}" type="button">
                                            <i class="fa-solid fa-file-signature px-1"></i>Info
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
