<header class="z-20 small:hidden flex items-center text-white justify-between w-full h-[71px] pr-[30px] mx-auto
    bg-[#4558BE]">
    <div class="logo-font inline-flex py-[18px] {{--px-[20px]--}}">
        <div class="block">
            <a href="{{ route('dashboard') }}" class="text-[20px] font-medium">
                <div class="flex items-center">
                    <div class="bg-[#3F51B5] flex items-center justify-center w-[83px] h-[71px] mx-auto bg-[#4558BE]">
                        <img src='{{ asset('assets/img/logo.svg') }}' alt="" width="35px" height="35px">
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="flex-initial">
        <div class="relative flex items-center justify-end">
            <div class="flex items-center">
                <a class="inline-block border-gray-300 mr-[10px] px-3" href="#" aria-label="Add something"
                   id="dropdownCreate">
                        <span class="transition duration-300 ease-in bg-[#606FC7] text-[25px] rounded-full
                            px-[11px] py-[7px]">
                            <i class="fas fa-plus"></i>
                        </span>
                </a>
                <div
                    class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-create">
                    <div class="absolute right-[12px] w-56 mt-[35px] origin-top-right bg-white border border-gray-200
                    divide-y divide-gray-100 rounded-md shadow-lg outline-none">
                        <div class="py-1">
                            <a href="{{ route('students.create') }}" tabindex="0"
                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                <i class="fas fa-users mr-[5px] ml-[3px] py-1"></i>
                                <span class="px-4 py-0">{{ __('Student') }}</span>
                            </a>
                            <a href="{{ route('books.create') }}" tabindex="0" class="flex w-full px-4 py-2 text-sm
                                leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                <i class="far fa-copy mr-[10px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">{{ __('Book') }}</span>
                            </a>
                            <a href="{{ route('authors.create') }}" tabindex="0" class="flex w-full px-4 py-2 text-sm
                                leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                <i class="far fa-address-book mr-[10px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">{{ __('Author') }}</span>
                            </a>
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('librarians.create') }}" tabindex="0"
                                   class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                    <i class="fas fa-user-tie mr-[8px] ml-[5px] py-1"></i>
                                    <span class="px-4 py-0">{{ __('Librarian') }}</span>
                                </a>
                                <a href="{{ route('admins.create') }}" tabindex="0"
                                   class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                    <i class="fas fa-user-shield mr-[8px] ml-[5px] py-1"></i>
                                    <span class="px-4 py-0">{{ __('Admin') }}</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- User Profile Icon -->
                <div class="ml-[10px] relative block">
                    <a href="#" class="relative inline-block px-3 py-2 focus:outline-none" id="dropdownProfile"
                       aria-label="User profile">
                        <div class="flex items-center h-5">
                            <div class="w-[40px] h-[40px] mt-[15px]">
                                <img class="rounded-full w-[40px] h-[40px]" src="{{ auth()->user()->picture }}" alt="">
                            </div>
                        </div>
                    </a>
                </div>

                <div
                    class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-profile">
                    <div class="absolute right-[12px] w-56 mt-[35px] origin-top-right bg-white border border-gray-200 divide-y
                        divide-gray-100 rounded-md shadow-lg outline-none">
                        <div class="py-1">
                            <a href="{{ route(strtolower(auth()->user()->role->name).'s.show', auth()->user()) }}"
                               tabindex="0"
                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                <i class="fas fa-file mr-[8px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">{{ __('My profile') }}</span>
                            </a>


                            <a href="#" tabindex="0"
                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                <i class="fas fa-sign-out-alt mr-[5px] ml-[5px] py-1"></i>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    @method('post')
                                    <button class="inline-block px-4 py-0">{{ __('Log out') }}</button>
                                </form>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="px-5 w-[145px]">
                    @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang == App::getLocale())
                            <li class="nav-item dropdown">
                                <a class="" href="{{ route('lang.switch', $lang) }}">{{$language['display']}}</a>
                            </li>
                        @else
                            <a class="" href="{{ route('lang.switch', $lang) }}">{{$language['display']}}</a>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</header>
