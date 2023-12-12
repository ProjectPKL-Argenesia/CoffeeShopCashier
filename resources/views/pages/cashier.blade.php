@extends('layouts.main')
@section('title', 'Cashier')
@section('content')
    <section class="grid grid-cols-12">

        <div class="col-span-9 h-screen bg-gray-200">
            <div class="bg-gray-200 px-5 py-10">
                <div class="flex justify-start items-start pb-10">
                    <h1 class="font-bold text-3xl">Cashier</h1>
                </div>
                <div class="flex gap-x-2 justify-end items-center md:text-xs lg:text-sm">
                    <div class="flex p-2 justify-center items-center text-gray-500 bg-white gap-x-2 rounded-lg md:w-[75px] lg:w-[100px]">
                        <label>Food</label>
                        <input type="radio" name="food-drink" id="food" class="text-gray-500 focus:ring-white">
                    </div>

                    <div class="flex p-2 justify-center items-center text-gray-500 bg-white gap-x-2 rounded-lg md:w-[75px] lg:w-[100px]">
                        <label>Drink</label>
                        <input type="radio" name="food-drink" id="drink" class="text-gray-500 focus:ring-white">
                    </div>

                    <div class="flex justify-center items-center text-gray-500 gap-x-2 rounded-lg md:w-[150px] lg:w-[200px]">
                        <select name="menu" id="menu"
                            class="md:text-xs lg:text-sm rounded-lg border-none w-full focus:ring-0 p-2">
                            <option selected hidden>Menu Category</option>
                            <option value="Menu 1">Menu 1</option>
                            <option value="Menu 2">Menu 2</option>
                            <option value="Menu 3">Menu 3</option>
                            <option value="Menu 4">Menu 4</option>
                            <option value="Menu 5">Menu 5</option>
                        </select>
                    </div>

                    <form action="">
                        <div class="flex justify-center items-center text-gray-500 bg-white rounded-lg md:w-[150px] lg:w-[200px]">
                            <div class="ps-3 z-10 w-[10%]"><i
                                    class="fa-solid fa-search fa-md"></i></div>
                            <input type="search" name="search-menu" id="search-menu"
                                class="text-gray-500 border-none md:text-xs lg:text-sm text-start focus:ring-0 rounded-r-lg w-[90%]"
                                placeholder="Search Menu">
                        </div>
                    </form>
                </div>
            </div>
            <div class="grid grid-cols-3 place-items-center px-5 gap-3">
                <div class="border border-gray-500 xl:w-[230px] xl:h-[135px] 2xl:w-[295px] 2xl:h-[200px]">
                    
                </div>
                <div class="border border-gray-500 xl:w-[230px] xl:h-[135px] 2xl:w-[295px] 2xl:h-[200px]">
                    
                </div>
                <div class="border border-gray-500 xl:w-[230px] xl:h-[135px] 2xl:w-[295px] 2xl:h-[200px]">
                    
                </div>
                <div class="border border-gray-500 xl:w-[230px] xl:h-[135px] 2xl:w-[295px] 2xl:h-[200px]">
                    
                </div>
                <div class="border border-gray-500 xl:w-[230px] xl:h-[135px] 2xl:w-[295px] 2xl:h-[200px]">
                    
                </div>
                <div class="border border-gray-500 xl:w-[230px] xl:h-[135px] 2xl:w-[295px] 2xl:h-[200px]">
                    
                </div>
            </div>
        </div>
        <div class="col-span-4 h-screen border-l-2 border-gray-300 bg-white">

        </div>

    </section>
@endsection
