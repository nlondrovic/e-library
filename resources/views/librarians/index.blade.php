@extends('layouts.app')
@section('main')
    {{-- Heading of content --}}
    <div class="mt-2">
        <div class="heading mt-[7px]">
            <h1 class="pl-[50px] pb-[21px]  border-b-[1px] border-[#e4dfdf]">
                Librarians
            </h1>
        </div>
    </div>

    {{-- Space for content --}}
    <div class="scroll height-dashboard">

        {{-- Above table --}}
        <div class="flex items-center justify-between px-[50px] py-4 space-x-3 rounded-lg">
            {{-- Add librarian button --}}
            <a href="{{ route('librarians.create') }}" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300
            ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                <i class="fas fa-plus mr-[15px]"></i> New librarian
            </a>
        </div>

        {{-- Librarians table --}}
        <div class="flex items-center justify-between px-[50px] py-4 space-x-3 rounded-lg">

            <table class="overflow-hidden shadow-lg rounded-xl min-w-full border-[1px] border-[#e4dfdf]" id="myTable">
                <thead class="bg-[#EFF3F6]">
                <tr class="border-b-[1px] border-[#e4dfdf]">
                    <th class="px-4 py-4 leading-4 tracking-wider text-left">Name</th>
                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Email</th>
                    <th class="px-4 py-4"></th>
                </tr>
                </thead>
                <tbody class="bg-white">

                @foreach($librarians as $librarian)
                    <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                        <td class="flex flex-row items-center px-4 py-4">
                            <img class="object-cover w-8 h-8 mr-2 rounded-full" src="{{ $librarian->picture }}" alt=""/>
                            <a href="{{ route('librarians.show', $librarian) }}">
                                <span class="font-medium text-center">{{ $librarian->name }}</span>
                            </a>
                        </td>
                        <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $librarian->email }}</td>
                        <td class="px-4 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsStudent
                            hover:text-[#606FC7]">
                                <i class="fas fa-ellipsis-v"></i>
                            </p>
                            <div class="absolute z-10 hidden transition-all duration-300 origin-top-right transform
                                scale-95 -translate-y-2 dropdown-student">
                                <div class="absolute right-[50px] w-56 mt-[7px] origin-top-right bg-white border
                                    border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                     aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117"
                                     role="menu">
                                    <div class="py-1">
                                        <a href="{{ route('librarians.show', $librarian) }}" tabindex="0"
                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700
                                           outline-none hover:text-blue-600"
                                           role="menuitem">
                                            <i class="far fa-file mr-[5px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">Show details</span>
                                        </a>
                                        <a href="{{route('librarians.edit', $librarian)}}" tabindex="0"
                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700
                                           outline-none hover:text-blue-600"
                                           role="menuitem">
                                            <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">Edit librarian</span>
                                        </a>

                                        <form action="{{ route('librarians.destroy', $librarian) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Delete librarian</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <span>
                {{ $librarians->links("pagination::tailwind") }}
            </span>
        </div>
    </div>
@endsection
