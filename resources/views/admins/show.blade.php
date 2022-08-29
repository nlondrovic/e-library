@extends('layouts.app')
@section('main')

    <!-- Heading of content -->
    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="pt-[1px]">
                <div class="pl-[50px] pt-[8px] pb-[20px] flex flex-col">
                    <h1>{{ $admin->name }}</h1>
                </div>
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
                        >

                        <div class="py-1">
                            <a href="{{ route('admins.edit', $admin) }}" tabindex="0"
                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                              >
                                <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Edit admin</span>
                            </a>
                            <form action="{{ route('admins.destroy', $admin) }}" method="post">
                                @csrf
                                @method('delete')
                                <p tabindex="0" class="flex w-full px-4 py-2 text-sm leading-5 text-left
                                            text-gray-700 outline-none hover:text-blue-600">
                                    <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                    <button type="submit" class="px-4 py-0">Delete admin</button>
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
                        <span class="text-gray-500">Name and surname</span>
                        <p class="font-medium">{{ $admin->name }}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">User type</span>
                        <p class="font-medium">{{ $admin->role->name }}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">JMBG</span>
                        <p class="font-medium">{{ $admin->jmbg }}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">Email</span>
                        <p class="font-medium">{{ $admin->email }}</p>
                    </div>

                </div>
                <div class="ml-[100px]  mt-[20px]">
                    <img class="rounded-full border-2 border-blue-600 p-2" width="300px" src="{{ asset($admin->picture) }}" alt="admin image">
                </div>
            </div>
        </div>

@endsection
