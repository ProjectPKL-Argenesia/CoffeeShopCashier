@extends('layouts.backend.main')

@section('content')
    <section class="p-10 bg-gray-200">
        <div class="flex justify-between pb-5">
            <h1 class="text-3xl font-bold text-black/80">Store</h1>
            @if ($dataStore->isempty())
                <div>
                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button"
                        class="block px-5 py-2 text-sm font-medium text-center text-gray-200 bg-gray-700 rounded-lg hover:bg-gray-800">
                        + Add Store Info
                    </button>

                    @include('pages.store.add')

                </div>
            @else
                <div>
                    <button data-modal-target="popup-modal-edit" data-modal-toggle="popup-modal-edit" type="button"
                        class="flex items-center gap-3 px-5 py-2 text-sm font-medium text-center text-gray-200 bg-gray-700 rounded-lg hover:bg-gray-800">
                        <span class="material-symbols-outlined">
                            edit
                        </span>
                        <span>Edit Store Info</span>
                    </button>

                    @include('pages.store.edit', ['dataStore' => $dataStore])

                </div>
            @endif
        </div>
        <div class="flex justify-center items-center mb-10">
            <div
                class="flex flex-col items-center border border-gray-300 bg-white w-fit rounded-lg shadow-lg p-5 gap-5 transition-all hover:scale-105">
                @if ($dataStore->isempty())
                    <div class="flex items-center gap-5">
                        <span class="material-symbols-rounded md:text-xl lg:text-6xl">
                            store
                        </span>
                        <div class="flex flex-col">
                            <span class="text-xl font-semibold">...</span>
                            <span>at ...</span>
                            <span>Call center <span class="italic font-semibold">...</span></span>
                        </div>
                    </div>
                    <span class="font-semibold text-xl">Please add some information about your store &lt;3 </span>
                @else
                    <div class="flex items-center gap-5">
                        <span class="material-symbols-rounded md:text-xl lg:text-6xl">
                            store
                        </span>
                        @foreach ($dataStore as $itemStore)
                            <div class="flex flex-col">
                                <span class="text-xl font-semibold">{{ $itemStore->name }}</span>
                                <span>at {{ $itemStore->address }}</span>
                                <span>Call center <span
                                        class="italic font-semibold">{{ $itemStore->phone_number }}</span></span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="p-5 border border-gray-300 bg-white rounded-lg shadow-lg mb-10">
            {!! $chart->container() !!}
        </div>

        <div class="mb-10">
            <h1 class="text-2xl font-semibold text-black/80 mb-5">Top 3 Order</h1>
            <div class="flex justify-center gap-10 mb-5">
                <div class="flex flex-col items-center mt-3 transition-all hover:shadow-yellow-300 hover:scale-105">
                    <span class="font-semibold bg-slate-950/30 px-4 pt-1 rounded-t-3xl">2nd</span>
                    <div
                        class="menu-item flex flex-col gap-3 p-3 bg-white border border-gray-300 rounded-lg shadow-lg w-[250px] min-h-[180px] 2xl:w-[320px] 2xl:max-h-[240px]">
                        <div
                            class="flex items-center justify-center rounded-[5.5px] overflow-hidden min-h-[100px] max-h-[115px] 2xl:max-h-[170px] 2xl:min-h-[150px]">
                            <img src="{{ asset('storage/' . $dataTopOrder[1]->images) }}" class="object-contain"
                                alt="gambar">
                        </div>
                        <div class="grid items-center grid-cols-2">
                            <div class="flex flex-col text-xs capitalize 2xl:text-sm">
                                <h2 class="font-semibold">{{ $dataTopOrder[1]->menu_name }}</h2>
                                <span>Rp. {{ $dataTopOrder[1]->prices }}</span>
                            </div>
                            <div class="flex items-center justify-end">
                                <span class="text-sm">Sell Amount : {{ $dataTopOrder[1]->total_qty }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center transition-all hover:scale-105">
                    <span class="font-semibold bg-yellow-400/40 px-5 pt-1 rounded-t-3xl">1st</span>
                    <div
                        class="menu-item flex flex-col gap-3 p-3 bg-white border border-gray-300 rounded-lg shadow-lg w-[250px] min-h-[180px] 2xl:w-[320px] 2xl:max-h-[240px]">
                        <div
                            class="flex items-center justify-center rounded-[5.5px] overflow-hidden min-h-[100px] max-h-[115px] 2xl:max-h-[170px] 2xl:min-h-[150px]">
                            <img src="{{ asset('storage/' . $dataTopOrder[0]->images) }}" class="object-contain"
                                alt="gambar">
                        </div>
                        <div class="grid items-center grid-cols-2">
                            <div class="flex flex-col text-xs capitalize 2xl:text-sm">
                                <h2 class="font-semibold">{{ $dataTopOrder[0]->menu_name }}</h2>
                                <span>Rp. {{ $dataTopOrder[0]->prices }}</span>
                            </div>
                            <div class="flex items-center justify-end">
                                <span class="text-sm">Sell Amount : {{ $dataTopOrder[0]->total_qty }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center mt-5 transition-all hover:scale-105">
                    <span class="font-semibold bg-amber-950/40 px-4 pt-1 rounded-t-3xl">3rd</span>
                    <div
                        class="menu-item flex flex-col gap-3 p-3 bg-white border border-gray-300 rounded-lg shadow-lg w-[250px] min-h-[180px] 2xl:w-[320px] 2xl:max-h-[240px]">
                        <div
                            class="flex items-center justify-center rounded-[5.5px] overflow-hidden min-h-[100px] max-h-[115px] 2xl:max-h-[170px] 2xl:min-h-[150px]">
                            <img src="{{ asset('storage/' . $dataTopOrder[2]->images) }}" class="object-contain"
                                alt="gambar">
                        </div>
                        <div class="grid items-center grid-cols-2">
                            <div class="flex flex-col text-xs capitalize 2xl:text-sm">
                                <h2 class="font-semibold">{{ $dataTopOrder[2]->menu_name }}</h2>
                                <span>Rp. {{ $dataTopOrder[2]->prices }}</span>
                            </div>
                            <div class="flex items-center justify-end">
                                <span class="text-sm">Sell Amount : {{ $dataTopOrder[2]->total_qty }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col mb-10">
            <h1 class="text-2xl font-semibold text-black/80 mb-5">Cashier info</h1>
            <div class="grid grid-cols-5 gap-5 mb-2">
                @if ($dataCashier->isempty())
                    <div
                        class="flex items-center gap-5 border border-black bg-slate-200 rounded-md w-full p-3 transition-all hover:scale-105">
                        <span class="material-symbols-rounded md:text-xl lg:text-6xl">
                            close
                        </span>
                        <div class="flex flex-col">
                            <span class="text-xl font-semibold">Doesn't have cashier</span>
                        </div>
                    </div>
                @else
                @endif
                @foreach ($dataCashier as $itemCashier)
                    <div
                        class="flex items-center gap-5 border border-gray-300 bg-white rounded-md shadow-lg w-full p-3 transition-all hover:scale-105">
                        <span class="material-symbols-rounded md:text-xl lg:text-6xl">
                            {{ $itemCashier->gender == 'Male' ? 'face_6' : 'face_3' }}
                        </span>
                        <div class="flex flex-col">
                            <span class="text-xl font-semibold">{{ $itemCashier->name }}</span>
                            <span>{{ $itemCashier->gender }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div onclick="window.location.href='{{ route('cashier.index') }}'" class="cursor-pointer mb-5">
                <span>Check another cashier..</span>
            </div>
        </div>

        <div class="flex flex-col mb-10">
            <h1 class="text-2xl font-semibold text-black/80">Menu info</h1>
            <div class="flex flex-col gap-y-3">
                <span>Category</span>
                <div class="grid grid-cols-3 gap-5">
                    @foreach ($dataMenuCategory as $itemMenuCategory)
                        <div
                            class="flex items-center gap-5 border border-gray-300 bg-white rounded-md shadow-lg w-full p-3 transition-all hover:scale-105">
                            <span class="material-symbols-rounded md:text-xl lg:text-6xl">
                                {{ $itemMenuCategory->type == 'Food' ? 'lunch_dining' : 'coffee' }}
                            </span>
                            <div class="flex flex-col">
                                <span class="text-xl font-semibold">{{ $itemMenuCategory->category_name }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div onclick="window.location.href='{{ route('menuCategory.index') }}'" class="cursor-pointer mb-5">
                    <span>Check another menu category..</span>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-3 mb-10">
            <span>List</span>
            <div class="flex justify-between">
                @foreach ($dataMenu as $itemMenu)
                    <div
                        class="menu-item flex flex-col gap-3 p-3 bg-white border border-gray-300 rounded-lg shadow-lg w-[250px] min-h-[180px] 2xl:w-[320px] 2xl:max-h-[240px] transition-all hover:scale-105">
                        <div
                            class="flex items-center justify-center rounded-[5.5px] overflow-hidden min-h-[100px] max-h-[115px] 2xl:max-h-[170px] 2xl:min-h-[150px]">
                            <img src="{{ asset('storage/' . $itemMenu->image) }}" class="object-contain" alt="gambar">
                        </div>
                        <div class="grid items-center grid-cols-2">
                            <div class="flex flex-col text-xs capitalize 2xl:text-sm">
                                <h2 class="font-semibold">{{ $itemMenu->menu_name }}</h2>
                                <span>Rp {{ number_format($itemMenu->price, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex items-center justify-end">
                                <span class="text-sm">Stock : {{ $itemMenu->stock }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div onclick="window.location.href='{{ route('menuList.index') }}'" class="cursor-pointer mb-5">
                <span>Check another menu..</span>
            </div>
        </div>

    </section>

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
@endsection
