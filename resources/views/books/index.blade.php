@extends('layouts.app')
@section('main')

    <!-- Heading of content -->
    <div class="mt-2">
        <div class="heading mt-[7px]">
            <h1 class="pl-[50px] pb-[21px] border-b-[1px] border-[#e4dfdf]">
                Books
            </h1>
        </div>
    </div>

    <!-- Space for content -->
    <div class="scroll height-evidencija">
        {{-- New Book --}}
        <div class="flex items-center justify-between px-[50px] py-4 space-x-3 rounded-lg">
            <a href="{{ route('books.create') }}"
               class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300
                       ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                <i class="fas fa-plus mr-[15px]"></i> New book
            </a>
        </div>

        <div class="px-[50px] pt-2 bg-white">
            <div class="w-full mt-2">

                <!-- Table -->
                <table class="w-full overflow-hidden shadow-lg rounded-xl" id="myTable">
                    <!-- Table head-->
                    <thead class="bg-[#EFF3F6]">
                    <tr class="border-b-[1px] border-[#e4dfdf]">
                        <th class="flex items-center px-4 py-4 leading-4 tracking-wider text-left">Title</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Author</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Category</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Free</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Reserved</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Checked out</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Total</th>
                        <th class="px-4 py-4"></th>
                    </tr>
                    </thead>
                    {{-- Tabe body --}}
                    <tbody class="bg-white">
                    @foreach($books as $book)
                        <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                            <td class="flex flex-row items-center px-4 py-4">
                                <img class="object-cover w-8 mr-2 h-11" src="{{ $book->picture }}" alt=""/>
                                <a href="{{ route('books.show', $book) }}">
                                    <span class="font-medium text-center">{{ $book->title }}</span>
                                </a>
                            </td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $book->author->name }}</td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $book->category->name }}</td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $book->total_count - ($book->checkouts_count + $book->reserved_count) }}</td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $book->reserved_count }}</td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $book->checkouts_count }}</td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $book->total_count }}</td>
                            <td class="px-6 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                                <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsKnjige hover:text-[#606FC7]">
                                    <i
                                        class="fas fa-ellipsis-v"></i>
                                </p>
                                <div
                                    class="absolute z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-knjige">
                                    <div
                                        class="absolute right-20 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                        aria-labelledby="headlessui-menu-button-1"
                                        id="headlessui-menu-items-117" role="menu">
                                        <div class="py-1">
                                            <a href="{{ route('checkouts.index', ['book_id' => $book->id]) }}" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700
                                           outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-exchange-alt mr-[3px]"></i>
                                                <span class="px-4 py-0">Transactions</span>
                                            </a>
                                            <a href="{{ route('books.show', $book) }}" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Show details</span>
                                            </a>
                                            <a href="{{ route('checkouts.create', $book) }}" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-hand-scissors mr-[6px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Check out</span>
                                            </a>
                                            <a href="{{ route('reservations.create', $book) }}" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-calendar-check mr-[6px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Reserve</span>
                                            </a>
                                            <a href="{{ route('books.edit', $book) }}" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-edit mr-[6px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Edit book</span>
                                            </a>
                                            <form action="{{ route('books.destroy', $book) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                    <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Delete the book</span>
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
                    {{ $books->links("pagination::tailwind") }}
                </span>
            </div>
        </div>
    </div>
@endsection
