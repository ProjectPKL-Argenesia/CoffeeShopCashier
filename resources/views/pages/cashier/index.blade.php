@extends('layouts.backend.main')

@section('content')
    <section class="h-screen p-10 bg-gray-300">
        <div class="flex justify-between pb-5">
            <h1 class="text-3xl font-bold text-black/80">Cashier</h1>
            <div>
                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                    class="block px-5 py-2 text-sm font-medium text-center text-gray-200 bg-gray-700 rounded-lg hover:bg-gray-800"
                    type="button">
                    + Add Cashier
                </button>

                @include('pages.cashier.add')

            </div>
        </div>
        <div class="flex flex-wrap items-center justify-end pb-4 space-y-4 gap-x-2 flex-column md:flex-row md:space-y-0">
            <div>
                <div class="">
                    <select name="gender-filter" id="gender-filter"
                        class="w-full p-2 text-xs text-gray-500 border-none rounded-lg 2xl:text-sm bg-gray-50 focus:ring-0">
                        <option selected hidden>Gender</option>
                        <option value="Show All">Show All</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
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
                    placeholder="Search Cashier">
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
                            Name
                        </th>
                        <th class="px-6 py-4">
                            Email
                        </th>
                        <th class="px-6 py-4">
                            Gender
                        </th>
                        <th class="px-6 py-4">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($dataCashier->isempty())
                        <tr>
                            <td colspan="5" class="text-center font-semibold text-xl bg-white py-5">Doesn't have cashier
                            </td>
                        </tr>
                    @else
                        @foreach ($dataCashier as $item)
                            <tr class="bg-white">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $item->name }}</td>
                                <td class="px-6 py-4">{{ $item->user->email }}</td>
                                <td class="px-6 py-4 gender-cell">{{ $item->gender }}</td>
                                <td class="flex px-6 py-4">

                                    <!-- Button Edit -->
                                    <div>
                                        <button data-modal-target="popup-modal-edit-{{ $item->id }}"
                                            data-modal-toggle="popup-modal-edit-{{ $item->id }}"
                                            class="block px-1 text-sm font-medium text-center text-yellow-400"
                                            type="button">
                                            <i class="px-1 fa-solid fa-file-signature"></i>Edit
                                        </button>

                                        <div id="popup-modal-edit-{{ $item->id }}" tabindex="-1"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-[40%] min-w-[35%] max-h-full">
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <button type="button"
                                                        class="absolute top-3 end-2.5 text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="popup-modal-edit-{{ $item->id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <form action="{{ route('cashier.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="grid grid-cols-12 px-8 pt-16 pb-10 gap-y-4">
                                                            <div class="grid grid-cols-12 col-span-12">
                                                                <div
                                                                    class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                                                                    <label for="name"
                                                                        class="whitespace-nowrap">Name</label>
                                                                </div>
                                                                <div class="flex items-center justify-center col-span-1">
                                                                    <span>:</span>
                                                                </div>
                                                                <div class="col-span-9">
                                                                    <input type="text" name="name" id="name"
                                                                        class="w-full px-2 py-1 text-gray-900 bg-gray-200 rounded-lg focus:ring-0"
                                                                        placeholder="cashier name"
                                                                        value="{{ $item->name }}">
                                                                </div>
                                                            </div>
                                                            <div class="grid grid-cols-12 col-span-12">
                                                                <div
                                                                    class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                                                                    <label for="gender">Gender</label>
                                                                </div>
                                                                <div class="flex items-center justify-center col-span-1">
                                                                    <span>:</span>
                                                                </div>
                                                                <div class="flex items-center col-span-9 gap-x-2">
                                                                    <div id="maleGender-Edit-{{ $item->id }}"
                                                                        class="flex items-center justify-between px-2 py-1 text-gray-900 bg-gray-200 border border-gray-500 rounded-lg gap-x-2">
                                                                        <label
                                                                            for="male-edit-{{ $item->id }}">Male</label>
                                                                        <input type="radio" name="gender"
                                                                            id="male-edit-{{ $item->id }}"
                                                                            value="Male"
                                                                            class="text-gray-500 focus:ring-0"
                                                                            {{ $item->gender == 'Male' ? 'checked' : '' }}>
                                                                    </div>
                                                                    <div id="femaleGender-Edit-{{ $item->id }}"
                                                                        class="flex items-center justify-between px-2 py-1 text-gray-900 bg-gray-200 border border-gray-500 rounded-lg gap-x-2">
                                                                        <label
                                                                            for="female-edit-{{ $item->id }}">Female</label>
                                                                        <input type="radio" name="gender"
                                                                            id="female-edit-{{ $item->id }}"
                                                                            value="Female"
                                                                            class="text-gray-500 focus:ring-0"
                                                                            {{ $item->gender == 'Female' ? 'checked' : '' }}>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="grid grid-cols-12 col-span-12">
                                                                <div
                                                                    class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                                                                    <label for="email"
                                                                        class="whitespace-nowrap">Email</label>
                                                                </div>
                                                                <div class="flex items-center justify-center col-span-1">
                                                                    <span>:</span>
                                                                </div>
                                                                <div class="col-span-9">
                                                                    <input type="text" name="email" id="email"
                                                                        class="w-full px-2 py-1 text-gray-900 bg-gray-200 rounded-lg focus:ring-0"
                                                                        placeholder="example@gmail.com"
                                                                        value="{{ $item->user->email }}">
                                                                </div>
                                                            </div>
                                                            <div class="grid grid-cols-12 col-span-12">
                                                                <div
                                                                    class="flex items-center justify-start col-span-2 text-sm font-semibold text-center gap-x-4">
                                                                    <label for="password"
                                                                        class="whitespace-nowrap">Password</label>
                                                                </div>
                                                                <div class="flex items-center justify-center col-span-1">
                                                                    <span>:</span>
                                                                </div>
                                                                <div class="col-span-9">
                                                                    <input type="password" name="password" id="password"
                                                                        class="w-full px-2 py-1 text-gray-900 bg-gray-200 rounded-lg focus:ring-0"
                                                                        placeholder="*****">
                                                                </div>
                                                            </div>

                                                            <button type="submit"
                                                                class="col-span-12 py-2 text-sm text-gray-100 bg-gray-800 rounded-lg">Done</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Button Hapus -->
                                    <button data-modal-target="popup-modal-delete-{{ $item->id }}"
                                        data-modal-toggle="popup-modal-delete-{{ $item->id }}"
                                        class="font-medium text-red-500" type="button"><i
                                            class="px-1 fa-solid fa-trash-can"></i>
                                        Hapus
                                    </button>

                                    <div id="popup-modal-delete-{{ $item->id }}" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-md max-h-full p-4">
                                            <div class="relative bg-white rounded-lg shadow">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                    data-modal-hide="popup-modal-delete-{{ $item->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 text-center md:p-5">
                                                    <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500">Are
                                                        you sure you want to delete {{ $item->name }}?</h3>
                                                    <form action="{{ route('cashier.destroy', $item->id) }}"
                                                        method="POST" class="inline-flex">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                            Yes, I'm sure
                                                        </button>
                                                    </form>

                                                    <button data-modal-hide="popup-modal-delete-{{ $item->id }}"
                                                        type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No,
                                                        cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <script>
                                //add radio button
                                document.addEventListener("DOMContentLoaded", function() {
                                    const divElement = document.getElementById("maleGender");
                                    const radioElement = document.getElementById("male");

                                    divElement.addEventListener("click", function() {
                                        radioElement.checked = true;
                                    });
                                });

                                document.addEventListener("DOMContentLoaded", function() {
                                    const divElement = document.getElementById("femaleGender");
                                    const radioElement = document.getElementById("female");

                                    divElement.addEventListener("click", function() {
                                        radioElement.checked = true;
                                    });
                                });


                                //edit radio button
                                document.addEventListener("DOMContentLoaded", function() {
                                    const divElement = document.getElementById("maleGender-Edit-{{ $item->id }}");
                                    const radioElement = document.getElementById("male-edit-{{ $item->id }}");

                                    divElement.addEventListener("click", function() {
                                        radioElement.checked = true;
                                    });
                                });

                                document.addEventListener("DOMContentLoaded", function() {
                                    const divElement = document.getElementById("femaleGender-Edit-{{ $item->id }}");
                                    const radioElement = document.getElementById("female-edit-{{ $item->id }}");

                                    divElement.addEventListener("click", function() {
                                        radioElement.checked = true;
                                    });
                                });


                                //filter gender
                                document.getElementById('gender-filter').addEventListener('change', function() {
                                    const selectedStatus = this.value;
                                    const tableRows = document.querySelectorAll('#tableData tbody tr');

                                    tableRows.forEach(row => {
                                        const statusCell = row.querySelector('.gender-cell');

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
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
@endsection
