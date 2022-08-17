@extends('layouts.app')
@section('main')

    <!-- Heading of content -->
    <div class="mt-2">
        <div class="heading mt-[7px]">
            <h1 class="pl-[50px] pb-[21px]  border-b-[1px] border-[#e4dfdf]">
                Authors
            </h1>
        </div>
    </div>

    <!-- Space for content -->
    <div class="scroll height-evidencija">
        {{-- New Book --}}
        <div class="flex items-center justify-between px-[50px] py-4 space-x-3 rounded-lg">
            <a href="{{ route('authors.create') }}"
               class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300
                       ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                <i class="fas fa-plus mr-[15px]"></i>New author
            </a>
        </div>

        <div class="px-[50px] pt-2 bg-white">
            <div class="w-full mt-2">
                <!-- Table -->
                <table class="overflow-hidden shadow-lg rounded-xl min-w-full border-[1px] border-[#e4dfdf]"
                       id="myTable">
                    <thead class="bg-[#EFF3F6]">
                    <tr class="border-b-[1px] border-[#e4dfdf]">
                        <th class="px-4 py-4 leading-4 tracking-wider text-left">Name<a href="#"></a></th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">About</th>
                        <th class="px-4 py-4"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach($authors as $author)
                        <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                            <td class="flex flex-row items-center px-4 py-3">
                                <img class="object-cover w-8 mr-2 h-11" src="{{ asset($author->picture) }}" alt=""/>
                                <a href="{{ route('authors.show', $author) }}">
                                    <span class="mr-2 font-medium text-center">{{ $author->name }}</span>
                                </a>
                            </td>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ Str::limit($author->about )}}</td>
                            <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsAutori hover:text-[#606FC7]">
                                    <i class="fas fa-ellipsis-v"></i>
                                </p>
                                <div class="absolute z-10 hidden transition-all duration-300 origin-top-right transform
                            scale-95 -translate-y-2 dropdown-autori">
                                    <div class="absolute right-[55px] w-56 mt-[7px] origin-top-right bg-white border
                                border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                         aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117"
                                         role="menu">
                                        <div class="py-1">
                                            <a href="{{ route('authors.show', $author) }}" tabindex="0" class="flex w-full
                                        px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-file mr-[5px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">View more</span>
                                            </a>

                                            <a href="{{ route('authors.edit', $author) }}" tabindex="0" class="flex w-full px-4 py-2 text-sm leading-5
                                            text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Edit author</span>
                                            </a>

                                            <form method="post" action="{{ route('authors.destroy', $author) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" tabindex="0" class="flex w-full px-4 py-2 text-sm leading-5
                                            text-left text-gray-700 outline-none hover:text-blue-600" role="menuitem">
                                                    <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Delete author</span>
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
                <p class="mt-[20px]">
                    {{ $authors->links("pagination::tailwind") }}
                </p>
            </div>
        </div>
    </div>
@endsection
