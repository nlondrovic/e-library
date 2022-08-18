@extends('layouts.app')

@section('main')

        <!-- Heading of content -->
        <div class="mt-2">
            <div class="heading mt-[7px]">
                <h1 class="pl-[50px] pb-[21px]  border-b-[1px] border-[#e4dfdf] ">
                    {{__('Prikaz aktivnosti')}}
                </h1>
            </div>
        </div>
        <!-- Space for content -->
        <div class="pl-[50px] overflow-auto scroll height-dashboard pb-[30px] mt-[20px]">
            <div class="flex flex-row justify-between">
                <div class="mr-[30px]">
                    <div class="text-[14px] flex flex-row mb-[30px]">
                        <div class="">
                            <div class="rounded">
                                <div class="relative">
                                    <button class="w-auto rounded focus:outline-none uceniciDrop-toggle">
                                            <span class="float-left">{{__('Ucenici: Svi')}} <i
                                                    class="px-[7px] fas fa-angle-down"></i></span>
                                    </button>
                                    <div id="uceniciDropdown"
                                         class="uceniciMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-l border-2 border-gray-300">
                                        <ul class="border-b-2 border-gray-300 list-reset">
                                            <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                       placeholder="{{__('Search')}}"
                                                       onkeyup="filterFunction('searchUcenici', 'uceniciDropdown', 'dropdown-item-izdato')"
                                                       id="searchUcenici"><br>
                                                <button
                                                    class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </li>
                                            <div class="h-[200px] scroll">

                                                <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-izdato">
                                                    <label class="flex items-center justify-start">
                                                        <div
                                                            class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                            <input type="checkbox" class="absolute opacity-0">
                                                            <svg
                                                                class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                viewBox="0 0 20 20">
                                                                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                            </svg>
                                                        </div>
                                                    </label>
                                                    <img width="40px" height="30px" class="ml-[15px] rounded-full"
                                                         src="img/profileStudent.jpg">
                                                    <p
                                                        class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                        Pero Perovic
                                                    </p>
                                                </li>
                                            </div>
                                        </ul>
                                        <div class="flex pt-[10px] text-white ">
                                            <a href="#"
                                               class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                                {{__('Sacuvaj')}} <i class="fas fa-check ml-[4px]"></i>
                                            </a>
                                            <a href="#"
                                               class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                                {{__('Ponisti')}} <i class="fas fa-times ml-[4px]"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-[25px]">
                            <div class="rounded">
                                <div class="relative">
                                    <button class="w-auto rounded focus:outline-none bibliotekariDrop-toggle">
                                            <span class="float-left">{{__('Bibliotekari: Svi')}} <i
                                                    class="px-[7px] fas fa-angle-down"></i></span>
                                    </button>
                                    <div id="bibliotekariDropdown"
                                         class="bibliotekariMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md pin-t pin-l border-2 border-gray-300">
                                        <ul class="border-b-2 border-gray-300 list-reset">
                                            <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                       placeholder="{{__('Search')}}"
                                                       onkeyup="filterFunction('searchBibliotekari', 'bibliotekariDropdown', 'dropdown-item-bibliotekar')"
                                                       id="searchBibliotekari"><br>
                                                <button
                                                    class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </li>
                                            <div class="h-[200px] scroll">
                                                <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-bibliotekar">
                                                    <label class="flex items-center justify-start">
                                                        <div
                                                            class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                            <input type="checkbox" class="absolute opacity-0">
                                                            <svg
                                                                class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                viewBox="0 0 20 20">
                                                                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                            </svg>
                                                        </div>
                                                    </label>
                                                    <img width="40px" height="30px" class="ml-[15px] rounded-full"
                                                         src="img/profileExample.jpg">
                                                    <p
                                                        class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                        {{__('Bibliotekar')}} Bulatovic
                                                    </p>
                                                </li>
                                            </div>
                                        </ul>
                                        <div class="flex pt-[10px] text-white ">
                                            <a href="#"
                                               class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                                {{__('Sacuvaj')}} <i class="fas fa-check ml-[4px]"></i>
                                            </a>
                                            <a href="#"
                                               class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                                {{__('Ponisti')}} <i class="fas fa-times ml-[4px]"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-[25px]">
                            <div class="rounded">
                                <div class="relative">
                                    <button class="w-auto rounded focus:outline-none" id="knjigeMenu">
                                        <i class="px-[7px] fas fa-angle-down"></i></span>
                                    </button>
                                    <div id="knjigeDropdown"
                                         class="knjigeMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md pin-t pin-l border-2 border-gray-300">
                                        <ul class="border-b-2 border-gray-300 list-reset">
                                            <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                       placeholder="{{__('Search')}}"
                                                       onkeyup="filterFunction('searchKnjige', 'knjigeDropdown', 'dropdown-item-knjiga')"
                                                       id="searchKnjige"><br>
                                                <button
                                                    class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </li>
                                            <div class="h-[200px] scroll">
                                                <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-knjiga">
                                                    <label class="flex items-center justify-start">
                                                        <div
                                                            class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                            <input type="checkbox" class="absolute opacity-0">
                                                            <svg
                                                                class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                viewBox="0 0 20 20">
                                                                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                            </svg>
                                                        </div>
                                                    </label>
                                                    <img width="30px" height="30px" class="ml-[15px]"
                                                         src="img/tomsojer.jpg">
                                                    <p
                                                        class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                        Tom Sojer
                                                    </p>
                                                </li>
                                            </div>
                                        </ul>
                                        <div class="flex pt-[10px] text-white ">
                                            <a href="#"
                                               class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                                {{__('Sacuvaj')}} <i class="fas fa-check ml-[4px]"></i>
                                            </a>
                                            <a href="#"
                                               class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                                {{__('Ponisti')}} <i class="fas fa-times ml-[4px]"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-[25px]">
                            <div class="rounded">
                                <div class="relative">
                                    <button class="w-auto rounded focus:outline-none" id="transakcijeMenu">
                                            <span class="float-left">{{__('Transakcije: Sve')}} <i
                                                    class="px-[7px] fas fa-angle-down"></i></span>
                                    </button>
                                    <div id="transakcijeDropdown"
                                         class="transakcijeMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md pin-t pin-l border-2 border-gray-300">
                                        <ul class="border-b-2 border-gray-300 list-reset">
                                            <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                       placeholder="{{__('Search')}}"
                                                       onkeyup="filterFunction('searchTransakcije', 'transakcijeDropdown', 'dropdown-item-transakcije')"
                                                       id="searchTransakcije"><br>
                                                <button
                                                    class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </li>
                                            <div class="h-[200px] scroll">
                                                <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-transakcije">
                                                    <label class="flex items-center justify-start">
                                                        <div
                                                            class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                            <input type="checkbox" class="absolute opacity-0">
                                                            <svg
                                                                class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                viewBox="0 0 20 20">
                                                                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                            </svg>
                                                        </div>
                                                    </label>
                                                    <p
                                                        class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                        {{__('Izdavanje knjiga')}}
                                                    </p>
                                                </li>
                                                <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-transakcije">
                                                    <label class="flex items-center justify-start">
                                                        <div
                                                            class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                            <input type="checkbox" class="absolute opacity-0">
                                                            <svg
                                                                class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                viewBox="0 0 20 20">
                                                                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                            </svg>
                                                        </div>
                                                    </label>
                                                    <p
                                                        class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                        {{__('Vracanje knjiga')}}
                                                    </p>
                                                </li>
                                                <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-transakcije">
                                                    <label class="flex items-center justify-start">
                                                        <div
                                                            class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                            <input type="checkbox" class="absolute opacity-0">
                                                            <svg
                                                                class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                viewBox="0 0 20 20">
                                                                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                            </svg>
                                                        </div>
                                                    </label>
                                                    <p
                                                        class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                        {{__('Unos nove knjige')}}
                                                    </p>
                                                </li>
                                                <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-transakcije">
                                                    <label class="flex items-center justify-start">
                                                        <div
                                                            class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                            <input type="checkbox" class="absolute opacity-0">
                                                            <svg
                                                                class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                viewBox="0 0 20 20">
                                                                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                            </svg>
                                                        </div>
                                                    </label>
                                                    <p
                                                        class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                        {{__('Brisanje knjige')}}
                                                    </p>
                                                </li>
                                            </div>
                                        </ul>
                                        <div class="flex pt-[10px] text-white ">
                                            <a href="#"
                                               class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#009688] bg-[#46A149] rounded-[5px]">
                                                {{__('Sacuvaj')}} <i class="fas fa-check ml-[4px]"></i>
                                            </a>
                                            <a href="#"
                                               class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                                {{__('Ponisti')}} <i class="fas fa-times ml-[4px]"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-[25px]">
                            <div class="rounded">
                                <div class="relative">
                                    <button class="w-auto rounded focus:outline-none datumDrop-toggle">
                                            <span class="float-left">{{__('Datum: Svi')}} <i
                                                    class="px-[7px] fas fa-angle-down"></i></span>
                                    </button>
                                    <div id="datumDropdown"
                                         class="datumMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md pin-t pin-l border-2 border-gray-300">
                                        <div
                                            class="flex justify-between flex-row p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                            <div>
                                                <label class="font-medium text-gray-500">{{__('Period od:')}}</label>
                                                <input type="date"
                                                       class="border-[1px] border-[#e4dfdf]  cursor-pointer focus:outline-none">
                                            </div>
                                            <div class="ml-[50px]">
                                                <label class="font-medium text-gray-500">{{__('Period do:')}}</label>
                                                <input type="date"
                                                       class="border-[1px] border-[#e4dfdf]  cursor-pointer focus:outline-none">
                                            </div>
                                        </div>
                                        <div class="flex pt-[10px] text-white ">
                                            <a href="#"
                                               class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#009688] bg-[#46A149] rounded-[5px]">
                                                {{__('Sacuvaj')}} <i class="fas fa-check ml-[4px]"></i>
                                            </a>
                                            <a href="#"
                                               class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                                {{__('Ponisti')}} <i class="fas fa-times ml-[4px]"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-[35px] cursor-pointer hover:text-blue-600">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                    </div>
                    <!-- Activity Cards -->
                    @foreach($activities2 as $activity)
                        <div class="activity-card flex flex-row mb-[30px]">
                            <div class="h-[60px]">
                                <img class="rounded-full" src="#" alt="">
                            </div>
                            <div class="mt-[5px] flex flex-col">
                                <div class="text-gray-500 mb-[5px]">
                                    <p class="uppercase">
                                        {{__('Book checkout')}}
                                        <span class="inline lowercase"> - {{ $activity->end_time }} </span>
                                    </p>
                                </div>
                                <div class="">
                                    <p>
                                        <a href="#" class="text-[#2196f3] hover:text-blue-600">
                                            {{ $activity->checkout_librarian->name }}
                                        </a>
                                        {{__('checked out')}} <span class="font-medium">{{ $activity->book->name }} </span>{{__('to')}}
                                        <a href="#" class="text-[#2196f3] hover:text-blue-600">
                                            {{ $activity->student->name }}
                                        </a>
                                        {{__('on')}} <span class="font-medium"> {{ $activity->start_time }}</span>
                                        <a href="#" class="text-[#2196f3] hover:text-blue-600">
                                            {{__('show details')}} &gt;&gt;
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="inline-block w-full mt-4">
                        <button type="button"
                                class="btn-animation w-full px-4 py-2 text-sm tracking-wider text-gray-600 transition duration-300 ease-in border-[1px] border-gray-400 rounded activity-showMore hover:bg-gray-200 focus:outline-none focus:ring-[1px] focus:ring-gray-300">
                            {{__('Show more')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Content -->
@endsection
