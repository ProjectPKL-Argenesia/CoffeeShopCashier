@extends('layouts.backend.main')


@section('content')
    <section class="grid grid-cols-12">
        <div class="h-full col-span-9 bg-gray-200">
            <div class="px-5 py-10 bg-gray-200">
                <div class="flex items-start justify-start pb-10">
                    <h1 class="text-3xl font-bold text-black/80">Cashier</h1>
                </div>
                <div class="flex items-center justify-end gap-x-2 md:text-xs lg:text-sm">
                    <div
                        class="flex p-2 justify-center items-center border border-gray-300 text-gray-500 bg-white gap-x-2 rounded-lg md:w-[75px] lg:w-[100px]">
                        <label for="food" class="text-black/70">Food</label>
                        <input type="radio" name="food-drink" id="food" class="text-gray-500 focus:ring-white">
                    </div>

                    <div
                        class="flex p-2 justify-center items-center border border-gray-300 text-gray-500 bg-white gap-x-2 rounded-lg md:w-[75px] lg:w-[100px]">
                        <label for="drink">Drink</label>
                        <input type="radio" name="food-drink" id="drink" class="text-gray-500 focus:ring-white">
                    </div>

                    <div
                        class="flex justify-center items-center border border-gray-300 text-gray-500 gap-x-2 rounded-lg md:w-[150px] lg:w-[200px]">
                        <select name="menu" id="menu"
                            class="w-full p-2 border-none rounded-lg md:text-xs lg:text-sm focus:ring-0">
                            <option selected hidden>Menu Category</option>
                            <option value="Menu 1">Menu 1</option>
                            <option value="Menu 2">Menu 2</option>
                            <option value="Menu 3">Menu 3</option>
                            <option value="Menu 4">Menu 4</option>
                            <option value="Menu 5">Menu 5</option>
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
            <div class="grid grid-cols-3 gap-3 px-5 place-items-center">

                <div
                    class="flex flex-col gap-3 p-3 bg-white border border-gray-300 rounded-lg w-[250px] min-h-[175px] 2xl:w-[310px] 2xl:max-h-[250px]">
                    <div
                        class="flex items-center justify-center  rounded-[5.5px] overflow-hidden min-h-[120px] max-h-[150px] 2xl:max-h-[180px] 2xl:min-h-[160px]">
                        <img src="{{ asset('/assets/images/background.jpg') }}" class=" object-cover" alt="gambar">
                    </div>
                    <div class="grid justify-items-stretch grid-cols-2">
                        <div class="flex flex-col capitalize ">
                            <h2 class="font-semibold">Coffee</h2>
                            <span>6500</span>
                        </div>
                        <div class="grid justify-items-end items-center">
                            <button
                                class="order-button px-3 py-2 bg-gray-200 rounded-md font-medium text-gray-800">Order</button>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-col gap-3 p-3 bg-white border border-gray-300 rounded-lg w-[250px] min-h-[175px] 2xl:w-[310px] 2xl:max-h-[250px]">
                    <div
                        class="flex items-center justify-center  rounded-[5.5px] overflow-hidden min-h-[120px] max-h-[150px] 2xl:max-h-[180px] 2xl:min-h-[160px]">
                        <img src="https://i0.wp.com/umsu.ac.id/berita/wp-content/uploads/2023/08/nanas-kandungan-dan-manfaat.jpg?fit=1200%2C675&ssl=1-"
                            class=" object-cover" alt="gambar">
                    </div>
                    <div class="grid justify-items-stretch grid-cols-2">
                        <div class="flex flex-col capitalize ">
                            <h2 class="font-semibold">nanas</h2>
                            <span>6500</span>
                        </div>
                        <div class="grid justify-items-end items-center">
                            <button
                                class="order-button px-3 py-2 bg-gray-200 rounded-md font-medium text-gray-800">Order</button>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-col gap-3 p-3 bg-white border border-gray-300 rounded-lg w-[250px] min-h-[175px] 2xl:w-[310px] 2xl:max-h-[250px]">
                    <div
                        class="flex items-center justify-center  rounded-[5.5px] overflow-hidden min-h-[120px] max-h-[150px] 2xl:max-h-[180px] 2xl:min-h-[160px]">
                        <img src="https://images.unsplash.com/photo-1481349518771-20055b2a7b24?q=80&w=1539&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class=" object-cover" alt="gambar">
                    </div>
                    <div class="grid justify-items-stretch grid-cols-2">
                        <div class="flex flex-col capitalize ">
                            <h2 class="font-semibold">pisang</h2>
                            <span>6500</span>
                        </div>
                        <div class="grid justify-items-end items-center">
                            <button
                                class="order-button px-3 py-2 bg-gray-200 rounded-md font-medium text-gray-800">Order</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="w-full h-full bg-white col-span-3">
            <div class="flex justify-between items-center p-4">
                <p class="text-3xl font-semibold">Current Order</p>
                <button class=" right-2 top-2 z-40" id="clearContent">
                    <img src="{{ asset('assets/images/clear.svg') }}" alt="clear" class="">
                </button>
            </div>
            <div id="containerOrder" class="h-screen w-full max-h-[500px] overflow-y-auto mt-3 border-l border-gray-300 px-3 py-10">

            </div>
            <div class="flex flex-col gap-y-2 p-10">
                <div
                    class=" min-h-[180px] w-full border p-4 rounded-lg border-gray-300 z-50 grid grid-cols-1 gap-y-3">
                    <div class="flex justify-between items-center">
                        <p>Sub Total</p>
                        <p id="sub-total">Rp. 0</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p>Tax</p>
                        <p id="tax">Rp. 0</p>
                    </div>
                    <div class="flex justify-between items-center border-t-4 border-gray-300 mt-0">
                        <p>Total</p>
                        <p id="total-harga">Rp. 0</p>
                    </div>
                </div>
                <div class="flex justify-between bg-gray-400 rounded-lg items-center font-semibold p-4">
                    <p class="">Change</p>
                    <p id="change">Rp. 0</p>
                </div>
            </div>
        </div>

    </section>




    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {



            // initial function 
            function changeCounter() {
                $("#counter").html(counter);
            }



            // initial varibalke
            let order = [];
            let initialDataCounter = 0;
            let counter = initialDataCounter;
            changeCounter();



            // order button click 2x clixk
            $('.order-button').click(function(e) {
                let element = this.parentElement.parentElement.children[0].children;
                const name = element[0].textContent;
                const price = parseInt(element[1].textContent);

                let newData = {
                    name,
                    harga: price,
                    price,
                    count: 0
                }
                ubahConteinerCount(newData)
            });




            $('#clearContent').click(function(e) {
                order = [];
                return generatePesanan();

            });


            // pesanan button 
            $('#containerOrder').on('click', '.button-tambah', function() {
                let element = this.parentElement.parentElement.children[0].children;
                let counter = this.parentElement.children[1]
                $(counter).html(parseInt(counter.textContent) + 1);
                ubahCounter('tambah', element)


            });
            $('#containerOrder').on('click', '.button-kurang', function() {
                let element = this.parentElement.parentElement.children[0].children;
                let counter = this.parentElement.children[1]
                $(counter).html(parseInt(counter.textContent) - 1);


                ubahCounter('kurang', element)

                if (counter.textContent <= 0) {
                    let newVariabel = order;
                    let keyChar = element[0].textContent;
                    let newData = [...newVariabel.filter((item) => item.name != keyChar)];
                    order = newData;
                    return generatePesanan();
                }
            });

            $('#containerOrder').on('click', '.button-hapus', function(e) {
                let newVariabel = order;
                let keyChar = $(this).data('name');
                let newData = [...newVariabel.filter((item) => item.name != keyChar)];
                order = newData;
                generatePesanan();
            });



            // function
            function ubahConteinerCount({
                name,
                price,
                harga,
                count
            }) {
                let getIndex = order.findIndex((item) => item.name == name);
                if (getIndex != -1) {
                    let cloneOrder = order;
                    let finalTotal = cloneOrder[getIndex].count += 1
                    let finalPrice = finalTotal * harga;
                    let finalNewData = {
                        name,
                        price: finalPrice,
                        harga,
                        count: finalTotal
                    }
                    cloneOrder[getIndex] = finalNewData;
                    order = cloneOrder;
                } else {
                    let finalTotal = count += 1
                    let finalPrice = finalTotal * harga;
                    let newData = {
                        name,
                        price,
                        harga,
                        count: finalTotal
                    }
                    order.push(newData)

                }



                generatePesanan();
            }


            function generatePesanan() {
                const PAJAK = 11 / 100;
                let data = order.map(e => e.price)
                let sum = data.reduce((total, number) => {
                    return total + number
                }, 0)
                let pajak = (sum * PAJAK);
                let totalDibayar = sum + pajak;

                $("#sub-total").html(`Rp. ${sum}`);
                $("#tax").html(`Rp. ${pajak}`);
                $("#total-harga").html(`Rp. ${totalDibayar}`);
                $("#change").html(`Rp. ${totalDibayar}`);

                $("#containerOrder").html('');
                $.map(order, function(item, index) {

                    $('#containerOrder').append(`
                        <div  class="grid justify-items-stretch grid-cols-3 my-5 ">
                        <div class="flex flex-col capitalize ">
                            <h2 class="font-semibold">${item.name}</h2>
                            <span>${item.price}</span>
                        </div>
                        <div class="grid grid-cols-3 justify-items-center min-w-[150px] items-center">
                            <button class="button-kurang px-2 rounded-md py-1 border border-gray-300">-</button>
                            <div id="counter" class=" py-1 px-3 border border-gray-300 bg-gray-200 font-semibold rounded-md ">${item.count}</div>
                            <button  class="button-tambah px-2 rounded-md py-1 border border-gray-300 cursor-pointer">+</button>
                        </div>
                        <div class=" flex justify-end items-center max-w-[50px] justify-self-end">
                            <button data-name="${item.name}" class="button-hapus px-3 bg-gray-300 py-2 text-gray-700 font-semibold rounded-md">
                                <i class="fa-solid fa-trash-can fa-lg"></i>
                            </button>
                        </div>
                    </div> 
                    `);
                });
            }


            function ubahCounter(param, element) {
                const name = element[0].textContent;
                const price = parseInt(element[1].textContent);
                let getIndex = order.findIndex((item) => item.name == name);

                let cloneOrder = order;
                let finalTotal;
                let finalPrice;
                if (param == 'tambah') {
                    finalTotal = cloneOrder[getIndex].count + 1
                    finalPrice = cloneOrder[getIndex].harga * finalTotal;
                } else {
                    finalTotal = cloneOrder[getIndex].count - 1
                    finalPrice = cloneOrder[getIndex].harga * finalTotal;
                }

                let finalHarga = cloneOrder[getIndex].harga;


                if (finalTotal == 0) {
                    return console.info('selesai');;
                } else {
                    let finalNewData = {
                        name,
                        price: finalPrice,
                        harga: finalHarga,
                        count: finalTotal
                    }
                    // console.table(finalNewData);
                    cloneOrder[getIndex] = finalNewData;
                    order = cloneOrder;

                    generatePesanan()
                }
            }

        });
    </script>
@endsection
