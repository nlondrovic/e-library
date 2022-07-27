@extends('layouts.app')
@section('main')

    <!-- Heading of content -->
    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[50px] pt-[10px] pb-[20px] flex flex-col">
                <h1>{{ $student->name }}</h1>
            </div>

            <div class="pt-[24px] mr-[30px]">
                <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-[#e4dfdf]
                            dotsKnjigaOsnovniDetalji hover:text-[#606FC7]">
                    <i class="fas fa-ellipsis-v"></i>
                </p>
                <div class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95
                            -translate-y-2 dropdown-knjiga-osnovni-detalji">
                    <div class="absolute right-0 w-56 mt-[7px] origin-top-right bg-white border border-gray-200
                                divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                         aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">

                        <div class="py-1">
                            <a href="{{ route('students.edit', $student) }}" tabindex="0"
                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                               role="menuitem">
                                <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Edit student</span>
                            </a>
                            <form action="{{ route('students.destroy', $student) }}" method="post">
                                @csrf
                                @method('delete')
                                <p tabindex="0" class="flex w-full px-4 py-2 text-sm leading-5 text-left
                                            text-gray-700 outline-none hover:text-blue-600" role="menuitem">
                                    <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                    <button type="submit" class="px-4 py-0">Delete student</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div class="height-ucenikProfile pb-[30px]">
        <!-- Space for content -->
        <div class="pl-[50px] section- mt-[20px]">
            <div class="flex flex-row">
                <div class="mr-[30px]">
                    <div class="mt-[20px]">
                        <span class="text-gray-500">Ime i prezime</span>
                        <p class="font-medium">{{ $student->name }}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">User type</span>
                        <p class="font-medium">{{ $student->role->name }}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">JMBG</span>
                        <p class="font-medium">{{ $student->jmbg }}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">Email</span>
                        <a href="#" class="block font-medium text-[#2196f3]">{{ $student->email }}</a>
                    </div>

                </div>
                <div class="ml-[100px]  mt-[20px]">
                    <img class="p-2 border-2 border-gray-300" width="300px" src="{{ $student->picture }}" alt="">
                </div>
            </div>
        </div>

@endsection
