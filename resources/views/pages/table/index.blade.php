@extends('layouts.backend.main')

@section('content')
    <section class="min-h-screen p-10 bg-gray-300">
        <div class="flex justify-between pb-5">
            <h1 class="text-3xl font-bold text-black/80">Table</h1>
            <div>
                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button"
                    class="block px-5 py-2 text-sm font-medium text-center text-gray-200 bg-gray-700 rounded-lg hover:bg-gray-800">
                    + Add Table
                </button>

                @include('pages.table.add')

            </div>
        </div>
        <div class="flex flex-wrap items-center justify-end pb-4 space-y-4 gap-x-2 flex-column md:flex-row md:space-y-0">
            <div>
                <div>
                    <select name="status_table" id="status_table"
                        class="w-full p-2 text-xs text-gray-500 border-none rounded-lg 2xl:text-sm bg-gray-50 focus:ring-0">
                        <option selected hidden>Status Table</option>
                        <option value="Show All">Show All</option>
                        <option value="Empty">Empty</option>
                        <option value="Broken">Broken</option>
                        <option value="Filled">Filled</option>
                    </select>
                </div>
            </div>
            <form action="{{ route('table.index') }}" method="GET" id="searchForm">
                <div
                    class="relative flex items-center justify-center text-gray-500 bg-white border border-gray-300 rounded-lg w-80">
                    <label for="search" class="absolute mx-1.5 left-0 flex justify-end items-center w-[10%]"><i
                            class="fa-solid fa-search fa-md"></i></label>
                    <input type="text" name="search" id="search"
                        class="text-gray-500 border-none md:text-xs lg:text-sm text-start focus:ring-0 w-[70%]"
                        placeholder="Search Table" value="{{ request('search') }}">
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
                            Table Name
                        </th>
                        <th class="px-6 py-4">
                            Status
                        </th>
                        <th class="px-6 py-4">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataTable as $item)
                        @if ($item->status == 'Empty')
                            <tr class="bg-gray-100">
                            @elseif ($item->status == 'Broken')
                            <tr class="bg-red-100">
                            @elseif ($item->status == 'Filled')
                            <tr class="bg-green-100">
                        @endif
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $item->name }}</td>
                        <td class="px-6 py-4 status-cell">{{ $item->status }}</td>
                        <td class="flex px-6 py-4">

                            <!-- Button Edit -->
                            <div>
                                <button data-modal-target="popup-modal-edit-{{ $item->id }}"
                                    data-modal-toggle="popup-modal-edit-{{ $item->id }}"
                                    class="block px-1 text-sm font-medium text-center text-yellow-400" type="button">
                                    <i class="px-1 fa-solid fa-file-signature"></i>Edit
                                </button>

                                @include('pages.table.edit')

                            </div>

                            <!-- Button Hapus -->
                            <button data-modal-target="popup-modal-delete-{{ $item->id }}"
                                data-modal-toggle="popup-modal-delete-{{ $item->id }}" class="font-medium text-red-500"
                                type="button"><i class="px-1 fa-solid fa-trash-can"></i>
                                Hapus
                            </button>

                            @include('pages.table.delete')

                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <script>
        //add radio button
        document.addEventListener("DOMContentLoaded", function() {
            const divElement = document.getElementById("emptyTable");
            const radioElement = document.getElementById("empty");

            divElement.addEventListener("click", function() {
                radioElement.checked = true;
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const divElement = document.getElementById("brokenTable");
            const radioElement = document.getElementById("broken");

            divElement.addEventListener("click", function() {
                radioElement.checked = true;
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const divElement = document.getElementById("filledTable");
            const radioElement = document.getElementById("filled");

            divElement.addEventListener("click", function() {
                radioElement.checked = true;
            });
        });


        //edit radio button
        document.addEventListener("DOMContentLoaded", function() {
            const divElement = document.getElementById("emptyTable-Edit");
            const radioElement = document.getElementById("empty-edit");

            divElement.addEventListener("click", function() {
                radioElement.checked = true;
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const divElement = document.getElementById("brokenTable-Edit");
            const radioElement = document.getElementById("broken-edit");

            divElement.addEventListener("click", function() {
                radioElement.checked = true;
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const divElement = document.getElementById("filledTable-Edit");
            const radioElement = document.getElementById("filled-edit");

            divElement.addEventListener("click", function() {
                radioElement.checked = true;
            });
        });


        //filter status table
        document.getElementById('status_table').addEventListener('change', function() {
            const selectedStatus = this.value;
            const tableRows = document.querySelectorAll('#tableData tbody tr');

            tableRows.forEach(row => {
                const statusCell = row.querySelector('.status-cell');

                if (selectedStatus === 'Status Table') {
                    row.style.display = 'table-row';
                } else if (selectedStatus === 'Show All') {
                    row.style.display = 'table-row';
                } else {
                    if (statusCell.textContent === selectedStatus) {
                        row.style.display = 'table-row';
                    } else {
                        row.style.display =
                            'none';
                    }
                }

            });
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
                    window.location.href = "{{ route('table.index') }}";
                }
            });
        });
    </script>
@endsection
