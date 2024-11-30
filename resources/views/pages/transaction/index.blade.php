@extends('layouts.backend.main')

@section('content')
    <section class="grid grid-cols-12">
        <div class="col-span-9 h-full bg-gray-200 px-10">
            <div class="bg-gray-200 py-10">
                <div class="flex items-start justify-start pb-10">
                    <h1 class="text-3xl font-bold text-black/80">Cashier</h1>
                </div>
                <div class="flex items-center justify-end gap-x-2 md:text-xs lg:text-sm">
                    <div class="flex items-center justify-center gap-x-2 rounded-lg border border-gray-300 bg-white p-2 text-gray-500 md:w-[75px] lg:w-[100px]"
                        id="foodType-Filter">
                        <label class="text-black/70" for="food-filter">Food</label>
                        <input class="text-gray-500 focus:ring-white" id="food-filter" name="type" type="radio"
                            value="Food">
                    </div>

                    <div class="flex items-center justify-center gap-x-2 rounded-lg border border-gray-300 bg-white p-2 text-gray-500 md:w-[75px] lg:w-[100px]"
                        id="drinkType-Filter">
                        <label for="drink-filter">Drink</label>
                        <input class="text-gray-500 focus:ring-white" id="drink-filter" name="type" type="radio"
                            value="Drink">
                    </div>

                    <div
                        class="flex items-center justify-center gap-x-2 rounded-lg border border-gray-300 text-gray-500 md:w-[150px] lg:w-[200px]">
                        <select class="w-full rounded-lg border-none p-2 focus:ring-0 md:text-xs lg:text-sm"
                            id="menu-filter" name="menu-filter">
                            <option selected hidden>Menu Category</option>
                            <option value="Show All">Show All</option>
                            @foreach ($dataMenuCategory as $item)
                                <option data-type="{{ $item->type }}" value="{{ $item->id }}">
                                    {{ $item->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <form id="searchForm" action="{{ route('transaction.index') }}" method="GET">
                        <div
                            class="relative flex items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-500 md:w-[150px] lg:w-[200px]">
                            <label class="absolute left-0 mx-1.5 flex w-[10%] items-center justify-end" for="search"><i
                                    class="fa-solid fa-search fa-md"></i></label>
                            <input class="w-[70%] border-none text-start text-gray-500 focus:ring-0 md:text-xs lg:text-sm"
                                id="search" name="search" type="text" value="{{ request('search') }}"
                                placeholder="Search Menu">
                            <span
                                class="{{ request('search') ? '' : 'hidden' }} absolute right-0 mx-1.5 w-[10%] cursor-pointer bg-gray-200 px-1.5 font-bold hover:bg-gray-300"
                                id="clearSearch">x</span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-x-5 gap-y-5">
                @foreach ($dataMenu as $item)
                    @if ($item->stock >= 1)
                        <div class="menu-item flex min-h-[175px] w-full flex-col gap-3 rounded-lg border border-gray-300 bg-white p-3"
                            data-category-id="{{ $item->menu_category->id }}">
                            <div
                                class="flex max-h-[150px] min-h-[120px] items-center justify-center overflow-hidden rounded-[5.5px] 2xl:max-h-[180px] 2xl:min-h-[160px]">
                                <img class="object-contain" src="{{ asset('storage/' . $item->image) }}" alt="gambar">
                            </div>
                            <p class="type-cell hidden">{{ $item->type }}</p>
                            <div class="hidden">
                                <select class="w-full rounded-lg bg-gray-200 px-2 py-1 text-xs focus:ring-0 2xl:text-sm"
                                    id="menu_category_id" name="menu_category_id" required>
                                    <option selected hidden>Menu Category</option>
                                    @foreach ($dataMenuCategory as $itemMenuCategory)
                                        <option class="menu-cell" value="{{ $itemMenuCategory->id }}"
                                            {{ $item->menu_category_id == $itemMenuCategory->id ? 'selected' : '' }}>
                                            {{ $itemMenuCategory->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid grid-cols-2 justify-items-stretch">
                                <div class="flex flex-col capitalize">
                                    <p class="font-semibold">{{ $item->menu_name }}</p>
                                    <p class="mb-2 text-sm text-slate-500" id="stock_{{ $item->id }}">Stock:
                                        {{ $item->stock }}</p>
                                    <p class="harga-menu">Rp. {{ $item->price }}</p>
                                </div>
                                <div class="grid items-center justify-items-end">
                                    <button class="rounded-md bg-gray-200 px-3 py-2 font-medium text-gray-800"
                                        onclick="addOrderCart({{ $item }})">Order</button>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <form class="col-span-3 h-screen w-full bg-white" action="{{ route('transaction.store') }}" method="POST">
            @csrf
            <div class="flex items-center justify-between p-4">
                <p class="text-3xl font-semibold">Current Order</p>
                <button class="right-2 top-2 z-40" type="button" onclick="clearContent()">
                    <img class="" src="{{ asset('assets/images/clear.svg') }}" alt="clear">
                </button>
            </div>
            <div class="flex items-center justify-between p-4">
                <div>
                    <select
                        class="w-full rounded-lg border border-gray-200 bg-white px-2 py-1 text-xs focus:ring-0 2xl:text-sm"
                        id="table_id" name="table_id" required onchange="handleTableChange()">
                        <option selected hidden>Table</option>
                        @foreach ($dataTable as $item)
                            @if ($item->status == 'Empty')
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <p class="text-sm" id="tanggal"></p>
                </div>
            </div>
            <div class="h-screen max-h-[500px] w-full overflow-y-auto px-3" id="containerOrder">
            </div>
            <div class="flex flex-col gap-y-2 p-10">
                <div class="z-50 grid min-h-[180px] w-full grid-cols-1 gap-y-3 rounded-lg border border-gray-300 p-4">
                    <div class="flex items-center justify-between">
                        <p>Sub Total</p>
                        <p>Rp. <span id="sub-total"></span></p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p>Tax</p>
                        <p>Rp. <span id="tax"></span></p>
                    </div>
                    <div class="mt-0 flex items-center justify-between border-t-4 border-gray-300 text-lg font-bold">
                        <p>Total</p>
                        <p>Rp. <span id="total-harga"></span></p>
                    </div>
                </div>
                <button class="w-full cursor-pointer rounded-lg bg-green-500 p-4 text-center font-semibold text-white"
                    id="buttonCharge" data-modal-target="popup-modal-charge" data-modal-toggle="popup-modal-charge"
                    type="button" disabled onclick="chargeItem()">
                    <span>Charge</span>
                </button>

                @include('pages.transaction.charge')

            </div>
        </form>

    </section>

    <script>
        let cart_item = [];

        let order_info = [];

        refreshCart();

        function refreshCart() {
            let cart_session = sessionStorage.getItem("cart_item");
            let sub_total = 0;
            let tax = 0;
            let total = 0;

            let template_item_html = `
                        <div class="grid grid-cols-3 my-3 justify-items-stretch ">
                                <div class="flex flex-col capitalize ">
                                    <p class="font-semibold border-none">!menu_name!</p>
                                    <p>!menu_price!</p>
                                </div>
                                <div class="flex gap-2 justify-items-center min-w-[150px] items-center">
                                    <button type="button" class="px-2 py-1 border border-gray-300 rounded-md" onclick="counter_kurang(!menu_id!)">-</button>
                                    <input type="number" name="qty" id="counter_!menu_id!" class="w-full px-3 py-1 font-semibold text-center bg-gray-200 border border-gray-300 rounded-md" value="!qty!" placeholder="Qty" max="!menu_stock!" min="1" onchange="counter_change(!menu_id!)" required>
                                    <button type="button" class="px-2 py-1 border border-gray-300 rounded-md cursor-pointer" onclick="counter_tambah(!menu_id!)">+</button>
                                </div>
                                <div class="flex justify-end items-center max-w-[50px] justify-self-end">
                                    <button type="button" onclick="deleteOrderCart(!menu_id!)" class="px-3 py-2 font-semibold text-gray-700 bg-gray-300 rounded-md button-hapus">
                                        <i class="fa-solid fa-trash-can fa-lg"></i>
                                    </button>
                                </div>
                            </div>
                        `;

            cart_item = JSON.parse(cart_session) || [];

            if (!cart_item || cart_item.length === 0) {
                $("#containerOrder").html(
                    '<p class="mt-5 italic text-center text-md text-slate-500 font-italic">Keranjang Orderan Masih Kosong...</p>'
                );
                $("#sub-total").html(sub_total);
                $("#tax").html(tax);
                $("#total-harga").html(total);
                return;

                order_info = {};
            }

            let cartItemExist = cart_item.length > 0 && cart_item[0].table_id;
            let selectedTableId;
            if (cartItemExist) {
                selectedTableId = cart_item[0].table_id;
                sessionStorage.setItem('selected_table_id', selectedTableId);
            } else {
                selectedTableId = sessionStorage.getItem('selected_table_id');
            }

            let tableSelect = document.getElementById("table_id");
            for (let i = 0; i < tableSelect.options.length; i++) {
                if (tableSelect.options[i].value === selectedTableId) {
                    tableSelect.options[i].selected = true;
                    break;
                }
            }


            $("#containerOrder").html('');
            cart_item.forEach((menu) => {
                menu.table_id = selectedTableId;

                total_price = parseInt(menu.price) * parseInt(menu.qty);
                menu.total_price = total_price;

                $("#containerOrder").append(
                    template_item_html
                    .replaceAll("!menu_id!", menu.id)
                    .replaceAll("!menu_name!", menu.menu_name)
                    .replaceAll("!menu_price!", "Rp. " + menu.price)
                    .replaceAll("!menu_stock!", menu.stock)
                    .replaceAll("!qty!", menu.qty)
                );


                sub_total += parseInt(menu.price) * parseInt(menu.qty);
            });

            tax = (10 / 100) * sub_total;

            total = sub_total + tax;

            order_info = {
                sub_total: sub_total,
                tax: tax,
                total: total
            };

            $("#sub-total").html(sub_total.toLocaleString('id-ID'));
            $("#tax").html(tax.toLocaleString('id-ID'));
            $("#total-harga").html(total.toLocaleString('id-ID'));

            checkChargeButtonStatus();
        }


        function handleTableChange() {
            var selectedTableId = document.getElementById('table_id').value;
            sessionStorage.setItem('selected_table_id', selectedTableId);
            updateTableIdInOrderItems(selectedTableId);
            refreshCart();
            checkChargeButtonStatus();
        }

        function updateTableIdInOrderItems(tableId) {
            cart_item.forEach((item) => {
                item.table_id = tableId;
            });
            sessionStorage.setItem("cart_item", JSON.stringify(cart_item));
        }

        function addOrderCart(item) {
            var selectedTableId = sessionStorage.getItem('selected_table_id');
            item.table_id = selectedTableId;
            if (sessionStorage.getItem("cart_item")) {
                cart_item = JSON.parse(sessionStorage.getItem("cart_item"));
                if (cart_item.some(menu => menu.id === item.id)) {
                    cart_item.forEach((menu) => {
                        if (menu.id === item.id) {
                            menu.qty = menu.qty + 1;
                        }
                    });
                    sessionStorage.setItem("cart_item", JSON.stringify(cart_item));
                    refreshCart();
                    return;
                }
            }
            item.qty = 1
            cart_item.push(item);
            sessionStorage.setItem("cart_item", JSON.stringify(cart_item));
            refreshCart();
        }

        function clearContent() {
            cart_item = [];
            sessionStorage.removeItem("cart_item");
            sessionStorage.removeItem("selected_table_id");
            refreshCart();
            $("#table_id").val("Table");
            checkChargeButtonStatus();
        }

        function checkChargeButtonStatus() {
            let tableSelect = document.getElementById("table_id");
            let chargeButton = document.getElementById("buttonCharge");

            if (tableSelect.value !== "Table" && cart_item.length > 0) {
                chargeButton.removeAttribute("disabled");
            } else {
                chargeButton.setAttribute("disabled", "disabled");
            }
        }

        function simpanButtonClick() {

            calculateChange();

            const requestData = {
                cart_item: cart_item,
                order_info: order_info,
                amount_paid: window.amountPaidValue,
                change: window.changeAmount
            };
            const csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '{{ route('transaction.store') }}',
                type: 'POST',
                dataType: 'json',
                data: JSON.stringify(requestData),
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    clearContent();
                    // Mengambil ID pembayaran dari respons
                    const paymentId = response.paymentId;

                    // Membentuk URL untuk menuju ke laporan berdasarkan ID pembayaran
                    const reportUrl = `struck/report?payment_id=${paymentId}`;

                    // Mengarahkan halaman ke URL laporan
                    window.location.href = reportUrl;
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(error);
                }
            });
        }

        function deleteOrderCart(menu_id) {
            var keranjang_id = cart_item.findIndex(element => element.id === menu_id);
            cart_item.splice(keranjang_id, 1);
            sessionStorage.setItem("cart_item", JSON.stringify(cart_item));
            refreshCart();
        }

        function counter_tambah(menu_id) {
            cart_item.forEach((menu) => {
                if (menu.id === menu_id && menu.qty < menu.stock) {
                    menu.qty = parseInt(menu.qty) + 1;
                }
            });
            sessionStorage.setItem("cart_item", JSON.stringify(cart_item));
            refreshCart();
        }

        function counter_kurang(menu_id) {
            cart_item.forEach((menu) => {
                if (menu.id === menu_id && menu.qty > 1) {
                    menu.qty = parseInt(menu.qty) - 1;
                }
            });
            sessionStorage.setItem("cart_item", JSON.stringify(cart_item));
            refreshCart();
        }

        function counter_change(menu_id) {
            let current_value = $("#counter_" + menu_id).val();
            cart_item.forEach((menu) => {
                if (menu.id === menu_id) {
                    if (menu.qty < 1) {
                        menu.qty = 1;
                        return;
                    }
                    menu.qty = current_value;
                }
            });
            sessionStorage.setItem("cart_item", JSON.stringify(cart_item));
            refreshCart();
        }

        function viewMenu() {
            const menuItemsHTML = cart_item.map(item => `
                <span class="justify-self-start">${item.menu_name}</span>
                <span class="justify-self-center">${formatToRupiah(item.price)}</span>
                <span class="justify-self-end">x ${item.qty}</span>
                <span class="justify-self-end">${formatToRupiah(item.total_price)}</span>
            `).join('');

            detailOrder.innerHTML = menuItemsHTML;
        }

        viewMenu();

        function formatToRupiah(amount) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(amount);
        }

        // Fungsi untuk mengubah angka menjadi format mata uang Rupiah

        // charge item
        function chargeItem() {
            // table
            let selectedElement = document.getElementById('table_id');
            let selectedTableId = selectedElement.value;
            let selectedTableName = selectedElement.options[selectedElement.selectedIndex].text;

            document.getElementById('table_name').innerText = selectedTableName;

            // order detail
            viewMenu();
            let detailOrder = document.getElementById("detailOrder");

            // sub total
            let sub_total = order_info.sub_total;
            document.getElementById('subTotal').innerText = formatToRupiah(sub_total);

            // tax
            let tax = order_info.tax;
            document.getElementById('pajak').innerText = formatToRupiah(tax);

            // total
            let total = order_info.total;
            document.getElementById('total').innerText = total;
            document.getElementById('totalText').innerText = formatToRupiah(total);
        }

        //Script Tanggal
        var today = new Date();

        var namaBulan = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        var dd = today.getDate();
        var mm = namaBulan[today.getMonth()];
        var yyyy = today.getFullYear();

        let date = dd + ' ' + mm + ' ' + yyyy;

        document.getElementById('tanggal').innerHTML = date;


        //filter radio button
        document.addEventListener("DOMContentLoaded", function() {
            const divFood = document.getElementById("foodType-Filter");
            const radioFood = document.getElementById("food-filter");

            divFood.addEventListener("click", function() {
                radioFood.checked = true;

                radioFood.dispatchEvent(new Event('change'));
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const divDrink = document.getElementById("drinkType-Filter");
            const radioDrink = document.getElementById("drink-filter");

            divDrink.addEventListener("click", function() {
                radioDrink.checked = true;

                radioDrink.dispatchEvent(new Event('change'));
            });
        });


        //filter menu
        document.getElementById('menu-filter').addEventListener('change', function() {
            const selectedCategoryId = this.value;
            const menuItems = document.querySelectorAll(
                '.menu-item');

            menuItems.forEach(function(menuItem) {
                if (selectedCategoryId === 'Show All' || menuItem.dataset.categoryId ===
                    selectedCategoryId) {
                    menuItem.style.display = 'flex';
                } else {
                    menuItem.style.display = 'none';
                }
            });
        });



        document.querySelectorAll('div[id$="-Filter"]').forEach(function(div) {
            const radioBtn = div.querySelector('input[type="radio"]');
            if (radioBtn) {
                div.addEventListener('click', function() {
                    radioBtn.checked = true;
                    radioBtn.dispatchEvent(new Event('change'));
                });
            }
        });

        document.querySelectorAll('input[name="type"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                const selectedType = this.id.split('-')[0];
                const menuOptions = document.querySelectorAll('#menu-filter option');
                menuOptions.forEach(function(option) {
                    const optionType = option.textContent.trim();
                    if (optionType === 'Show All' || (selectedType === 'food' && option.dataset
                            .type === 'Food') || (selectedType === 'drink' && option.dataset
                            .type === 'Drink')) {
                        option.style.display =
                            'block';
                    } else {
                        option.style.display = 'none';
                    }
                });
            });
        });



        //filter menu radio button
        document.getElementById('food-filter').addEventListener('change', function() {
            const selectedType = this.value;
            const contentMenu = document.querySelectorAll('.menu-item');

            contentMenu.forEach(row => {
                const menuType = row.querySelector('.type-cell');

                if (selectedType === 'Type Table') {
                    row.style.display = 'flex';
                } else {
                    if (menuType.textContent === selectedType) {
                        row.style.display = 'flex';
                    } else {
                        row.style.display =
                            'none';
                    }
                }

            });
        });

        document.getElementById('drink-filter').addEventListener('change', function() {
            const selectedType = this.value;
            const contentMenu = document.querySelectorAll('.menu-item');

            contentMenu.forEach(row => {
                const menuType = row.querySelector('.type-cell');

                if (selectedType === 'Type Table') {
                    row.style.display = 'flex';
                } else {
                    if (menuType.textContent === selectedType) {
                        row.style.display = 'flex';
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
            })
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
                    window.location.href = "{{ route('transaction.index') }}";
                }
            });
        });
    </script>
@endsection
