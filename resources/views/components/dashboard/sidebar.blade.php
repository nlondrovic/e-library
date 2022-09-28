<?php
$route_name = \Illuminate\Support\Facades\Route::currentRouteName();
?>
<nav id="sidebar"
     class="fixed z-10 flex flex-col justify-between overflow-x-hidden overflow-y-auto bg-[#EFF3F6] sidebar nav-height">
    <div class="">
        <!-- Hamburger Icon -->
        <div
            class="cursor-pointer text-[#707070] pl-[32px] pt-[28px] pb-[27px] text-[25px] border-b-[1px] border-[#e4dfdf] ">
            <i id="hamburger" class="hamburger-btn fas fa-bars-staggered"></i>
        </div>
        <div class="mt-[16px]">
            <ul class="text-[#2D3B48] sidebar-nav">
                <!-- Dashboard Icon -->
                <li class="pt-[18px] pb-[14px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full fill-current whitespace-nowrap">
                            <div class="transition duration-300 ease-in group-hover:text-blue-600">
                                <a href="{{ route('dashboard') }}" aria-label="Dashboard">
                                        <i class="text-[22px] pt-[4px] pr-1 pb-[5px] fa-solid fa-chart-line rounded-[3px] text-[#707070]
                                        transition duration-300 ease-in group-hover:text-blue-600
                                         @if(str_contains($route_name, 'dashboard')) text-[#576cdf] @endif"></i>
                                    <div class="hidden sidebar-item">
                                        <p class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[20px]">
                                             {{ __('Dashboard') }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Students Icon -->
                <li class="pt-[18px] pb-[14px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                                <a href="{{ route('students.index') }}" aria-label="Students">
                                    <i class="text-[22px] pt-[4px] pb-[5px] transition duration-300 ease-in group-hover:text-blue-600 text-[#707070] fas fa-users
                                         @if(str_contains($route_name, 'students')) text-[#576cdf] @endif"></i>
                                    <div class="hidden sidebar-item">
                                        <p class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[20px]">
                                            {{ __('Students') }}
                                        </p>
                                    </div>
                                </a>
                        </span>
                    </div>
                </li>
                <!-- Authors Icon -->
                <li class="pt-[18px] pb-[14px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                                <a href="{{ route('authors.index') }}" aria-label="Authors">
                                    <i class="text-[22px] pt-[4px] pb-[5px] transition duration-300 ease-in group-hover:text-blue-600 text-[#707070] fas fa-user-pen
                                         @if(str_contains($route_name, 'authors')) text-[#576cdf] @endif"></i>
                                    <div class="hidden sidebar-item">
                                         <p class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[20px]">
                                            {{ __('Authors') }}
                                        </p>
                                    </div>
                                </a>
                        </span>
                    </div>
                </li>
                <!-- Books Icon -->
                <li class="pt-[18px] pb-[14px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                                <a href="{{ route('books.index') }}" aria-label="Books">
                                    <i class="text-[22px] pt-[4px] pb-[5px] pr-2 transition duration-300 ease-in group-hover:text-blue-600 text-[#707070] fas fa-book
                                         @if(str_contains($route_name, 'books')) text-[#576cdf] @endif"></i>
                                    <div class="hidden sidebar-item">
                                         <p class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[20px]">
                                            {{ __('Books') }}
                                        </p>
                                    </div>
                                </a>
                        </span>
                    </div>
                </li>
                <!-- Renting Icon -->
                <li class="pt-[18px] pb-[14px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                                <a href="{{ route('checkouts.index') }}" aria-label="RentingBooks">
                                     <i class="text-[22px] pt-[4px] pb-[5px] pr-1 text-[#707070] fas fa-exchange-alt transition duration-300 ease-in group-hover:text-blue-600
                                         @if(str_contains($route_name, 'checkouts') || str_contains($route_name, 'checkins') ||
                                            str_contains($route_name, 'lost') || str_contains($route_name, 'overdue') ||
                                            str_contains($route_name, 'reservations')) text-[#576cdf] @endif"></i>
                                    <div class="hidden sidebar-item">
                                        <p class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[20px]">
                                           {{ __('Transactions') }}
                                        </p>
                                    </div>
                                </a>
                        </span>

                    </div>
                </li>
                @if(auth()->user()->isAdmin())
                    <!-- Librarian Icon -->
                    <li class="pt-[18px] pb-[14px] group hover:bg-[#EAEAEA] h-[60px]">
                        <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                                <a href="{{ route('librarians.index') }}" aria-label="Librarians">
                                    <i class="text-[22px] pt-[4px] pb-[5px] pr-2 text-[#707070] fa-solid fa-user-tie transition duration-300 ease-in group-hover:text-blue-600
                                         @if(str_contains($route_name, 'librarians')) text-[#576cdf] @endif"></i>
                                    <div class="hidden sidebar-item">
                                          <p class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[20px]">
                                           {{__('Librarians')}}
                                        </p>
                                    </div>
                                </a>
                        </span>
                        </div>
                    </li>
                    <!-- Admin icon -->
                    <li class="pt-[18px] pb-[14px] group hover:bg-[#EAEAEA] h-[60px]">
                        <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                                <a href="{{ route('admins.index') }}" aria-label="RentingBooks">
                                    <i class="text-[22px] pt-[4px] pb-[5px] transition duration-300 ease-in group-hover:text-blue-600 text-[#707070] fa-solid fa-user-shield
                                         @if(str_contains($route_name, 'admins')) text-[#576cdf] @endif"></i>
                                    <div class="hidden sidebar-item">
                                          <p class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[20px]">
                                           {{ __('Admins') }}
                                        </p>
                                    </div>
                                </a>
                        </span>
                        </div>
                    </li>
                @endif

            </ul>
        </div>
    </div>
    <div class="sidebar-nav py-[10px] border-t-[1px] border-[#e4dfdf] pt-[23px] pb-[29px] group hover:bg-[#EFF3F6]">
        <!-- Settings Icon -->
        <ul>
            <li class="h-[60px] pt-[18px] pb-[14px]">
                <a href="{{ route('policy.index') }}" aria-label="Settngs" class="ml-[30px]">
                    <span class="whitespace-nowrap">
                        <i class="transition duration-300 ease-in group-hover:text-[#576cdf] text-[22px] pr-1 text-[#707070] fas fa-cog
                                     @if(str_contains($route_name, 'policy')||
                                        str_contains($route_name, 'categories')||
                                        str_contains($route_name, 'genres')||
                                        str_contains($route_name, 'publishers')||
                                        str_contains($route_name, 'bindings')||
                                        str_contains($route_name, 'sizes')||
                                        str_contains($route_name, 'scripts')) text-[#576cdf] @endif"></i>
                        <div class="hidden sidebar-item">
                             <p class="transition duration-300 ease-in group-hover:text-blue-600 inline text-[15px] ml-[20px]">
                                 {{ __('Settings') }}</p>
                        </div>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</nav>
