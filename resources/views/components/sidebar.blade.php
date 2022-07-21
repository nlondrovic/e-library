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
                            <div class="transition duration-300 ease-in group-hover:text-[#576cdf]">
                                <a href="{{route('dashboard')}}" aria-label="Dashboard">
                                    <i class=" px-[5px] pt-[4px] pb-[5px] fas fa-tachometer-alt text-[19px] rounded-[3px] text-[#707070]"></i>
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
                            <div>
                                <a href="{{ route('librarians.index') }}" aria-label="Librarians">
                                    <i class="text-[25px] text-[#707070] far fa-address-book transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                    <div class="hidden sidebar-item">
                                        <p class=" inline text-[15px] ml-[20px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                            Librarians
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Students Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div>
                                <a href="{{ route('students.index') }}" aria-label="Students">
                                    <i class="text-[18px] transition duration-300 ease-in group-hover:text-[#576cdf] text-[#707070] fas fa-users"></i>
                                    <div class="hidden sidebar-item">
                                        <p class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                                            Students
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Books Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div>
                                <a href="{{route('books.index')}}" aria-label="Books">
                                    <i class="text-[25px] transition duration-300 ease-in group-hover:text-[#576cdf] text-[#707070] far fa-copy"></i>
                                    <div class="hidden sidebar-item">
                                        <p class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                                            Books
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Authors Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div>
                                <a href="{{route('authors.index')}}" aria-label="Authors">
                                    <i class="text-[25px] transition duration-300 ease-in group-hover:text-[#576cdf] text-[#707070] far fa-address-book"></i>
                                    <div class="hidden sidebar-item">
                                        <p class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                                            Authors
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Renting Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div>
                                <a href="#" aria-label="RentingBooks">
                                    <i class="text-[22px] transition duration-300 ease-in group-hover:text-[#576cdf] text-[#707070] fas fa-exchange-alt"></i>
                                    <div class="hidden sidebar-item">
                                        <p class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                                            Renting Books
                                        </p>
                                    </div>
                                </a>
                            </div>
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
                            <i class="transition duration-300 ease-in group-hover:text-[#576cdf] text-[22px] text-[#707070] fas fa-cog"></i>
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
