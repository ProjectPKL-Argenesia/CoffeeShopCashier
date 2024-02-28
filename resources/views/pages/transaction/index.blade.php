@extends('layouts.backend.main')

@section('content')
    <section class="grid grid-cols-12">
        <div class="h-full col-span-9 px-10 bg-gray-200">
            <div class="py-10 bg-gray-200">
                <div class="flex items-start justify-start pb-10">
                    <h1 class="text-3xl font-bold text-black/80">Cashier</h1>
                </div>
                <div class="flex items-center justify-end gap-x-2 md:text-xs lg:text-sm">
                    <div id="foodType-Filter"
                        class="flex p-2 justify-center items-center border border-gray-300 text-gray-500 bg-white gap-x-2 rounded-lg md:w-[75px] lg:w-[100px]">
                        <label for="food-filter" class="text-black/70">Food</label>
                        <input type="radio" name="type" id="food-filter" class="text-gray-500 focus:ring-white"
                            value="Food">
                    </div>

                    <div id="drinkType-Filter"
                        class="flex p-2 justify-center items-center border border-gray-300 text-gray-500 bg-white gap-x-2 rounded-lg md:w-[75px] lg:w-[100px]">
                        <label for="drink-filter">Drink</label>
                        <input type="radio" name="type" id="drink-filter" class="text-gray-500 focus:ring-white"
                            value="Drink">
                    </div>

                    <div
                        class="flex justify-center items-center border border-gray-300 text-gray-500 gap-x-2 rounded-lg md:w-[150px] lg:w-[200px]">
                        <select name="menu-filter" id="menu-filter"
                            class="w-full p-2 border-none rounded-lg md:text-xs lg:text-sm focus:ring-0">
                            <option selected hidden>Menu Category</option>
                            <option value="Show All">Show All</option>
                            @foreach ($dataMenuCategory as $item)
                                <option data-type="{{ $item->type }}" value="{{ $item->id }}">
                                    {{ $item->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <form action="">
                        <div
                            class="flex justify-center items-center border border-gray-300 text-gray-500 bg-white rounded-lg md:w-[150px] lg:w-[200px]">
                            <div class="ps-3 z-10 w-[10%]"><i class="fa-solid fa-search fa-md"></i></div>
                            <input type="search" name="search-menu" id="search-menu"
                                class="text-gray-500 border-none md:text-xs lg:text-sm text-start focus:ring-0 rounded-r-lg w-[90%]"
                                placeholder="Search Menu">
                        </div>
                    </form>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-y-5 gap-x-5">
                @foreach ($dataMenu as $item)
                    @if ($item->stock >= 1)
                        <div data-category-id="{{ $item->menu_category->id }}"
                            class="menu-item flex flex-col gap-3 p-3 bg-white border border-gray-300 rounded-lg w-full min-h-[175px]">
                            <div
                                class="flex items-center justify-center  rounded-[5.5px] overflow-hidden min-h-[120px] max-h-[150px] 2xl:max-h-[180px] 2xl:min-h-[160px]">
                                <img src="{{ asset('storage/' . $item->image) }}" class="object-contain " alt="gambar">
                            </div>
                            <p class="hidden type-cell">{{ $item->type }}</p>
                            <div class="hidden">
                                <select name="menu_category_id" id="menu_category_id" required
                                    class="w-full px-2 py-1 text-xs bg-gray-200 rounded-lg 2xl:text-sm focus:ring-0">
                                    <option selected hidden>Menu Category</option>
                                    @foreach ($dataMenuCategory as $itemMenuCategory)
                                        <option value="{{ $itemMenuCategory->id }}" class="menu-cell"
                                            {{ $item->menu_category_id == $itemMenuCategory->id ? 'selected' : '' }}>
                                            {{ $itemMenuCategory->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid grid-cols-2 justify-items-stretch">
                                <div class="flex flex-col capitalize ">
                                    <p class="font-semibold">{{ $item->menu_name }}</p>
                                    <p id="stock_{{ $item->id }}" class="mb-2 text-sm text-slate-500">Stock: {{ $item->stock }}</p>
                                    <p class="harga-menu">Rp. {{ $item->price }}</p>
                                </div>
                                <div class="grid items-center justify-items-end">
                                    <button class="px-3 py-2 font-medium text-gray-800 bg-gray-200 rounded-md"
                                        onclick="addOrderCart({{ $item }})">Order</button>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <form class="w-full h-full col-span-3 bg-white" action="{{ route('transaction.store') }}" method="POST">
            @csrf
            <div class="flex items-center justify-between p-4">
                <p class="text-3xl font-semibold">Current Order</p>
                <button class="z-40 right-2 top-2" onclick="clearContent()" type="button">
                    <img src="{{ asset('assets/images/clear.svg') }}" alt="clear" class="">
                </button>
            </div>
            <div class="flex items-center justify-between p-4">
                <div>
                    <select name="table_id" id="table_id" required onchange="handleTableChange()"
                        class="w-full px-2 py-1 text-xs bg-white border border-gray-200 rounded-lg cursor-pointer 2xl:text-sm focus:ring-0">
                        <option selected hidden>Table</option>
                        @foreach ($dataTable as $item)
                            @if ($item->status == 'Empty')
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <p id="tanggal" class="text-sm"></p>
                </div>
            </div>
            <div id="containerOrder" class="h-screen w-full max-h-[500px] overflow-y-auto px-3">
            </div>
            <div class="flex flex-col p-10 gap-y-2">
                <div class=" min-h-[180px] w-full border p-4 rounded-lg border-gray-300 z-50 grid grid-cols-1 gap-y-3">
                    <div class="flex items-center justify-between">
                        <p>Sub Total</p>
                        <p>Rp. <span id="sub-total"></span></p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p>Tax</p>
                        <p>Rp. <span id="tax"></span></p>
                    </div>
                    <div class="flex items-center justify-between mt-0 text-lg font-bold border-t-4 border-gray-300">
                        <p>Total</p>
                        <p>Rp. <span id="total-harga"></span></p>
                    </div>
                </div>
                <button id="buttonCharge" data-modal-target="popup-modal-charge" disabled
                    data-modal-toggle="popup-modal-charge" type="button" onclick="chargeItem()"
                    class="w-full p-4 font-semibold text-center text-white bg-green-500 rounded-lg cursor-pointer">
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

        function simpannButtonClick() {

            const requestData = {
                cart_item: cart_item,
                order_info: order_info
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
                success: function() {

                    location.reload();
                    clearContent();

                },
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

        // charge item
        function chargeItem() {
            // table
            var selectedElement = document.getElementById('table_id');
            var selectedTableId = selectedElement.value;
            var selectedTableName = selectedElement.options[selectedElement.selectedIndex].text;

            document.getElementById('table_name').innerText = selectedTableName;

            // order detail
            var detailOrder = document.getElementById("detailOrder");

            for (let i = 0; i < cart_item.length; i++) {
                // const id = cart_item[i].id;
                const menu_name = cart_item[i].menu_name;
                const price = cart_item[i].price;
                const qty = cart_item[i].qty;

                var menu = `
                    <div class="flex gap-x-5">
                        <span>${menu_name}</span>
                        <span>Rp. ${price}</span>
                        <span>${qty}</span>
                    </div>
                `;

                detailOrder.innerHTML += menu;
            }

            // sub total
            let sub_total = order_info.sub_total;
            document.getElementById('subTotal').innerText = sub_total;

            // tax
            let tax = order_info.tax;
            document.getElementById('pajak').innerText = tax;

            // total
            let total = order_info.total;
            document.getElementById('total').innerText = total;
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
    </script>
@endsection