<?php
$route_name = \Illuminate\Support\Facades\Route::currentRouteName();
?>
<nav id="sidebar"
     class="fixed z-10 flex flex-col justify-between overflow-x-hidden overflow-y-auto bg-[#EFF3F6] sidebar nav-height">
    <div class="">
        <!-- Hamburger Icon -->
        <div
            class="cursor-pointer text-[#707070] pl-[30px] pt-[28px] pb-[27px] text-[25px] border-b-[1px] border-[#e4dfdf] ">
            <i id="hamburger" class="hamburger-btn fas fa-bars"></i>
        </div>
        <div class="mt-[30px]">
            <ul class="text-[#2D3B48] sidebar-nav">
                <!-- Dashboard Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA]">
                    <div class="ml-[25px]">
                        <span class="flex justify-between w-full fill-current whitespace-nowrap">
                            <div class="transition duration-300 ease-in group-hover:text-blue-600">
                                <a href="{{ route('dashboard') }}" aria-label="Dashboard">
                                    <i class="px-[5px] pt-[4px] pb-[5px] fas fa-tachometer-alt text-[19px] rounded-[3px] text-[#707070]
                                        transition duration-300 ease-in group-hover:text-blue-600
                                         @if(str_contains($route_name, 'dashboard')) text-[#576cdf] @endif"></i>
                                    <div class="hidden sidebar-item">
                                        <p class="inline text-[15px] ml-[15px]">Dashboard</p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Librarian Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                                <a href="{{ route('librarians.index') }}" aria-label="Librarians">
                                    <i class="text-[25px] text-[#707070] far fa-address-book transition duration-300 ease-in group-hover:text-blue-600
                                         @if(str_contains($route_name, 'librarians')) text-[#576cdf] @endif"></i>
                                    <div class="hidden sidebar-item">
                                        <p class="inline text-[15px] ml-[20px] transition duration-300 ease-in group-hover:text-blue-600">
                                            Librarians
                                        </p>
                                    </div>
                                </a>
                        </span>
                    </div>
                </li>
                <!-- Students Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                                <a href="{{ route('students.index') }}" aria-label="Students">
                                    <i class="text-[18px] transition duration-300 ease-in group-hover:text-blue-600 text-[#707070] fas fa-users
                                         @if(str_contains($route_name, 'students')) text-[#576cdf] @endif"></i>
                                    <div class="hidden sidebar-item">
                                        <p class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[20px]">
                                            Students
                                        </p>
                                    </div>
                                </a>
                        </span>
                    </div>
                </li>
                <!-- Books Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                                <a href="{{ route('books.index') }}" aria-label="Books">
                                    <i class="text-[25px] transition duration-300 ease-in group-hover:text-blue-600 text-[#707070] far fa-copy
                                         @if(str_contains($route_name, 'books')) text-[#576cdf] @endif"></i>
                                    <div class="hidden sidebar-item">
                                        <p class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[20px]">
                                            Books
                                        </p>
                                    </div>
                                </a>
                        </span>
                    </div>
                </li>
                <!-- Authors Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                                <a href="{{ route('authors.index') }}" aria-label="Authors">
                                    <i class="text-[25px] transition duration-300 ease-in group-hover:text-blue-600 text-[#707070] far fa-address-book
                                         @if(str_contains($route_name, 'authors')) text-[#576cdf] @endif"></i>
                                    <div class="hidden sidebar-item">
                                        <p class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[20px]">
                                            Authors
                                        </p>
                                    </div>
                                </a>
                        </span>
                    </div>
                </li>
                <!-- Renting Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                                <a href="{{ route('checkouts.index') }}" aria-label="RentingBooks">
                                    <i class="text-[22px] transition duration-300 ease-in group-hover:text-blue-600 text-[#707070] fas fa-exchange-alt
                                         @if(str_contains($route_name, 'transactions')) text-[#576cdf] @endif"></i>
                                    <div class="hidden sidebar-item">
                                        <p class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[20px]">
                                            Transactions
                                        </p>
                                    </div>
                                </a>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-nav py-[10px] border-t-[1px] border-[#e4dfdf] pt-[23px] pb-[29px]  group hover:bg-[#EFF3F6]">
        <!-- Settings Icon -->
        <ul>
            <li class="h-[60px] pt-[18px] pb-[14px]">
                <a href="{{ route('policy') }}" aria-label="Settngs" class="ml-[30px]">
                        <span class="whitespace-nowrap">
                            <i class="transition duration-300 ease-in group-hover:text-[#576cdf] text-[22px] text-[#707070] fas fa-cog
                                         @if(str_contains($route_name, 'policy')||
                                            str_contains($route_name, 'categories')||
                                            str_contains($route_name, 'genres')||
                                            str_contains($route_name, 'publishers')||
                                            str_contains($route_name, 'bindings')||
                                            str_contains($route_name, 'sizes')||
                                            str_contains($route_name, 'scripts')) text-[#576cdf] @endif"></i>
                            <div class="hidden sidebar-item">
                                <p class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                                    Settings</p>
                            </div>
                        </span>
                </a>
            </li>
        </ul>

    </div>
</nav>
