<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-900 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>
 
 <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 sm:w-[17%] h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="flex flex-col justify-between h-full px-6 py-4 gap-y-6 overflow-y-auto bg-[#1F2937]">
        <div>
            <a href="#" class="flex justify-center items-center py-6 gap-x-2 text-white">
                <i class="fa-solid fa-mug-hot md:fa-sm lg:fa-2xl"></i>
                <span class="md:text-sm lg:text-xl font-semibold whitespace-nowrap">Coffee Shop</span>
            </a>
            <ul class="space-y-2 py-4 font-medium border-y">
                <li>
                    <a href="/cashier"
                        class="flex items-center p-2 hover:text-gray-900 rounded-lg hover:bg-white group {{ Route::currentRouteName() == 'cashier' ? 'bg-white text-gray-900' : ' text-white' }}">
                        <i class="fa-solid fa-cash-register md:fa-xs lg:fa-lg"></i>
                        <span class="ms-3 whitespace-nowrap md:text-xs lg:text-base">Cashier</span>
                    </a>
                </li>
                <li>
                    <a href="/table"
                        class="flex items-center p-2 hover:text-gray-900 rounded-lg hover:bg-white group {{ Route::currentRouteName() == 'table' ? 'bg-white text-gray-900' : ' text-white' }}">
                        <i class="fa-solid fa-table md:fa-xs lg:fa-lg"></i>
                        <span class="ms-3 whitespace-nowrap md:text-xs lg:text-base">Table</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-white hover:text-gray-900 rounded-lg hover:bg-white group">
                        <i class="fa-solid fa-burger md:fa-xs lg:fa-lg"></i>
                        <span class="ms-3 whitespace-nowrap md:text-xs lg:text-base">Menu List</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-white hover:text-gray-900 rounded-lg hover:bg-white group">
                        <i class="fa-solid fa-print md:fa-xs lg:fa-lg"></i>
                        <span class="ms-3 whitespace-nowrap md:text-xs lg:text-base">Report</span>
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <li class="font-medium">
                <a href="#"
                    class="flex justify-center items-center p-2 text-white hover:text-gray-900 rounded-lg hover:bg-white group">
                    <i class="fa-solid fa-right-from-bracket md:fa-xs lg:fa-lg"></i>
                    <span class="ms-3 whitespace-nowrap md:text-xs lg:text-base">Log out</span>
                </a>
            </li>
        </div>
    </div>
 </aside>
 