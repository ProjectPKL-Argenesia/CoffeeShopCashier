@extends('layouts.backend.main')

@section('content')
    <section class="grid grid-cols-12">
        <div class="h-full col-span-9 bg-gray-200">
            <div class="px-5 py-10 bg-gray-200">
                <div class="flex items-start justify-start pb-10">
                    <h1 class="text-3xl font-bold text-black/80">Cashier</h1>
                </div>
                <div class="flex items-center justify-end gap-x-2 md:text-xs lg:text-sm">
                    <div id="foodType-Filter" class="flex p-2 justify-center items-center border border-gray-300 text-gray-500 bg-white gap-x-2 rounded-lg md:w-[75px] lg:w-[100px]">
                        <label for="food-filter" class="text-black/70">Food</label>
                        <input type="radio" name="type" id="food-filter" class="text-gray-500 focus:ring-white" value="Food">
                    </div>

                    <div id="drinkType-Filter" class="flex p-2 justify-center items-center border border-gray-300 text-gray-500 bg-white gap-x-2 rounded-lg md:w-[75px] lg:w-[100px]">
                        <label for="drink-filter">Drink</label>
                        <input type="radio" name="type" id="drink-filter" class="text-gray-500 focus:ring-white" value="Drink">
                    </div>

                    <div class="flex justify-center items-center border border-gray-300 text-gray-500 gap-x-2 rounded-lg md:w-[150px] lg:w-[200px]">
                        <select name="menu-filter" id="menu-filter" class="w-full p-2 border-none rounded-lg md:text-xs lg:text-sm focus:ring-0">
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
                        <div class="flex justify-center items-center border border-gray-300 text-gray-500 bg-white rounded-lg md:w-[150px] lg:w-[200px]">
                            <div class="ps-3 z-10 w-[10%]"><i class="fa-solid fa-search fa-md"></i></div>
                            <input type="search" name="search-menu" id="search-menu" class="text-gray-500 border-none md:text-xs lg:text-sm text-start focus:ring-0 rounded-r-lg w-[90%]" placeholder="Search Menu">
                        </div>
                    </form>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-3 px-5 place-items-center">
                @foreach ($dataMenu as $item)
                    @if ($item->stock >= 1)
                        <div data-category-id="{{ $item->menu_category->id }}" class="menu-item flex flex-col gap-3 p-3 bg-white border border-gray-300 rounded-lg w-[250px] min-h-[175px] 2xl:w-[310px]">
                            <div class="flex items-center justify-center  rounded-[5.5px] overflow-hidden min-h-[120px] max-h-[150px] 2xl:max-h-[180px] 2xl:min-h-[160px]">
                                <img src="{{ asset('storage/' . $item->image) }}" class="object-cover " alt="gambar">
                            </div>
                            <p class="hidden type-cell">{{ $item->type }}</p>
                            <div class="hidden">
                                <select name="menu_category_id" id="menu_category_id" required class="w-full px-2 py-1 text-xs bg-gray-200 rounded-lg 2xl:text-sm focus:ring-0">
                                    <option selected hidden>Menu Category</option>
                                    @foreach ($dataMenuCategory as $itemMenuCategory)
                                        <option value="{{ $itemMenuCategory->id }}" class="menu-cell" {{ $item->menu_category_id == $itemMenuCategory->id ? 'selected' : '' }}>
                                            {{ $itemMenuCategory->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid grid-cols-2 justify-items-stretch">
                                <div class="flex flex-col capitalize ">
                                    <p class="font-semibold">{{ $item->menu_name }}</p>
                                    <p class="text-sm text-slate-500 mb-2">Stock: {{ $item->stock }}</p>
                                    <p class="harga-menu">Rp. {{ $item->price }}</p>
                                </div>
                                <div class="grid items-center justify-items-end">
                                    <button class="px-3 py-2 font-medium text-gray-800 bg-gray-200 rounded-md" onclick="addOrderCart({{ $item }})">Order</button>
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
                <button class="z-40 right-2 top-2" id="clearContent">
                    <img src="{{ asset('assets/images/clear.svg') }}" alt="clear" class="">
                </button>
            </div>
            <div class="flex items-center justify-between p-4">
                <div class="">
                    <select name="menu_category_id" id="menu_category_id" required class="w-full px-2 py-1 text-xs bg-white border border-gray-200 rounded-lg 2xl:text-sm focus:ring-0">
                        <option selected hidden>Table</option>
                        @foreach ($dataTable as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}
                            </option>
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
                    <div class="flex items-center justify-between mt-0 border-t-4 border-gray-300">
                        <p>Total</p>
                        <p>Rp. <span id="total-harga"></span></p>
                    </div>
                </div>
                <div class="flex items-center justify-between p-4 font-semibold bg-gray-400 rounded-lg">
                    <button type="submit" class="">Change</button>
                    <p id="change">0</p>
                </div>
            </div>
        </form>

    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        let cart_item = [];

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
                $("#containerOrder").html('<p class="text-md text-slate-500 font-italic text-center mt-5 italic">Keranjang Orderan Masih Kosong...</p>');
                $("#sub-total").html(sub_total);
                $("#tax").html(tax);
                $("#total-harga").html(total);
                return;
            }

            $("#containerOrder").html('');
            cart_item.forEach((menu) => {
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

            tax = (10/100) * sub_total;

            total = sub_total + tax;
            
            $("#sub-total").html(sub_total.toLocaleString('id-ID'));
            $("#tax").html(tax.toLocaleString('id-ID'));
            $("#total-harga").html(total.toLocaleString('id-ID'));
        }

        function addOrderCart(item) {
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


        // $(document).ready(function() {



        //     // initial function 
        //     function changeCounter() {
        //         $("#counter").html(counter);
        //     }



        //     // initial variable
        //     let order = [];
        //     let initialDataCounter = 0;
        //     let counter = initialDataCounter;
        //     changeCounter();



        //     // order button click 2x clixk
        //     $('.order-button').click(function(e) {
        //         e.preventDefault();
        //         let element = this.parentElement.parentElement.children[0].children;
        //         const name = element[0].value;
        //         const price = parseInt(element[1].value);

        //         let newData = {
        //             name,
        //             harga: price,
        //             price,
        //             count: 0
        //         }
        //         ubahConteinerCount(newData)
        //     });



        //     $('#clearContent').on('click', function(e) {
        //         e.preventDefault();
        //         order = [];
        //         return generatePesanan();
        //     });



        //     // pesanan button 
        //     $('#containerOrder').on('click', '.button-tambah', function(e) {
        //         e.preventDefault();
        //         let element = this.parentElement.parentElement.children[0].children;
        //         let counter = this.parentElement.children[1];
        //         $(counter).val(parseInt($(counter).val()) + 1);
        //         let counterValue = $(counter).val();
        //         console.info(counterValue);
        //         ubahCounter('tambah', element);
        //     });


        //     $('#containerOrder').on('click', '.button-kurang', function(e) {
        //         e.preventDefault();
        //         let element = this.parentElement.parentElement.children[0].children;
        //         let counter = this.parentElement.children[1]
        //         $(counter).val(parseInt($(counter).val()) - 1);
        //         let counterValue = $(counter).val();

        //         ubahCounter('kurang', element)

        //         if (counterValue <= 0) {
        //             let newVariabel = order;
        //             let keyChar = element[0].value;
        //             let newData = [...newVariabel.filter((item) => item.name != keyChar)];
        //             order = newData;
        //             return generatePesanan();
        //         }
        //     })



        //     $('#containerOrder').on('click', '.button-hapus', function(e) {
        //         e.preventDefault();
        //         let newVariabel = order;
        //         let keyChar = $(this).data('name');
        //         let newData = [...newVariabel.filter((item) => item.name != keyChar)];
        //         order = newData;
        //         generatePesanan();
        //     });



        //     // function
        //     function ubahConteinerCount({
        //         name,
        //         price,
        //         harga,
        //         count
        //     }) {
        //         let getIndex = order.findIndex((item) => item.name == name);
        //         if (getIndex != -1) {
        //             let cloneOrder = order;
        //             let finalTotal = cloneOrder[getIndex].count += 1
        //             let finalPrice = finalTotal * harga;
        //             let finalNewData = {
        //                 name,
        //                 price: finalPrice,
        //                 harga,
        //                 count: finalTotal
        //             }
        //             cloneOrder[getIndex] = finalNewData;
        //             order = cloneOrder;
        //         } else {
        //             let finalTotal = count += 1
        //             let finalPrice = finalTotal * harga;
        //             let newData = {
        //                 name,
        //                 price,
        //                 harga,
        //                 count: finalTotal
        //             }
        //             order.push(newData)

        //         }



        //         generatePesanan();
        //     }


        //     function generatePesanan() {
        //         const PAJAK = 11 / 100;
        //         let data = order.map(e => e.price)
        //         let sum = data.reduce((total, number) => {
        //             return total + number
        //         }, 0)
        //         let pajak = (sum * PAJAK);
        //         let totalDibayar = sum + pajak;

        //         $("#sub-total").html(`${sum}`);
        //         $("#tax").val(`${pajak}`);
        //         $("#total-harga").html(`${totalDibayar}`);
        //         $("#change").html(`Rp. ${totalDibayar}`);


        //         $("#containerOrder").html('');
        //         $.map(order, function(item, index) {
        //             $('#containerOrder').append(`
    // <div class="grid grid-cols-3 my-5 justify-items-stretch ">
    //     <div class="flex flex-col capitalize ">
    //         <input name="menu_name" class="font-semibold border-none" value="${item.name}">
    //         <input name="price" class="border-none" value="${item.price}">


    //     </div>
    //     <div class="grid grid-cols-3 justify-items-center min-w-[150px] items-center">
    //         <button class="px-2 py-1 border border-gray-300 rounded-md button-kurang">-</button>
    //         <input name="qty" id="counter" class="w-full px-3 py-1 font-semibold text-center bg-gray-200 border border-gray-300 rounded-md " value="${item.count}">
    //         <button class="px-2 py-1 border border-gray-300 rounded-md cursor-pointer button-tambah">+</button>
    //     </div>
    //     <div class=" flex justify-end items-center max-w-[50px] justify-self-end">
    //         <button data-name="${item.name}" class="px-3 py-2 font-semibold text-gray-700 bg-gray-300 rounded-md button-hapus">
    //             <i class="fa-solid fa-trash-can fa-lg"></i>
    //         </button>
    //     </div>
    // </div> 
    //         `);
        //         });


        //     }


        //     function ubahCounter(param, element) {
        //         const name = element[0].value;
        //         const price = parseInt(element[1].value);
        //         console.info(price);
        //         let getIndex = order.findIndex((item) => item.name == name);

        //         let cloneOrder = order;
        //         let finalTotal;
        //         let finalPrice;
        //         if (param == 'tambah') {
        //             finalTotal = cloneOrder[getIndex].count + 1
        //             finalPrice = cloneOrder[getIndex].harga * finalTotal;
        //         } else {
        //             finalTotal = cloneOrder[getIndex].count - 1
        //             finalPrice = cloneOrder[getIndex].harga * finalTotal;
        //         }

        //         let finalHarga = cloneOrder[getIndex].harga;


        //         if (finalTotal == 0) {
        //             return console.info('selesai');;
        //         } else {
        //             let finalNewData = {
        //                 name,
        //                 price: finalPrice,
        //                 harga: finalHarga,
        //                 count: finalTotal
        //             }
        //             // console.table(finalNewData);
        //             cloneOrder[getIndex] = finalNewData;
        //             order = cloneOrder;

        //             generatePesanan()
        //         }
        //     }


        // });





        //Script Tanggal
        var today = new Date();

        var namaBulan = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        var dd = today.getDate();
        var mm = namaBulan[today.getMonth()];
        var yyyy = today.getFullYear();

        document.getElementById('tanggal').innerHTML = dd + ' ' + mm + ' ' + yyyy;


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
