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

                @include('pages.table.add_table')

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
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                    <i class="pt-1 text-gray-500 fa-solid fa-search fa-md"></i>
                </div>
                <input type="search" id="table-search-users"
                    class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 w-80 bg-gray-50 focus:ring-0"
                    placeholder="Search Table">
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
    </script>
@endsection
