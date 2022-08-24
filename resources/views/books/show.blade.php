@extends('layouts.app')
@section('main')

    <!-- Heading of content -->
    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="py-[10px] flex flex-row">
                <div class="pl-[50px] pb-[14px] flex flex-col">
                    <h1>{{ $book->title }}</h1>
                </div>
            </div>

            <div class="pt-[15px] mr-[30px]">
                <a href="{{ route('checkouts.index', ['book_id' => $book->id]) }}" class="inline hover:text-blue-600 ml-[20px] pr-[10px]">
                    <i class="fas fa-exchange-alt mr-[3px]"></i>
                    Transactions
                </a>
                <a href="{{ route('checkouts.create', $book) }}" class="inline hover:text-blue-600 ml-[20px] pr-[10px]">
                    <i class="far fa-hand-scissors mr-[3px]"></i>
                    Check out
                </a>
                <a href="{{ route('reservations.create', $book) }}" class="inline hover:text-blue-600 ml-[20px] pr-[10px]">
                    <i class="far fa-calendar-check mr-[3px]"></i>
                    Reserve
                </a>
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
                            <a href="{{ route('books.edit', $book) }}" tabindex="0"
                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                               role="menuitem">
                                <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Edit book</span>
                            </a>
                            <form action="{{ route('books.destroy', $book) }}" method="post">
                                @csrf
                                @method('delete')
                                <p tabindex="0" class="flex w-full px-4 py-2 text-sm leading-5 text-left
                                            text-gray-700 outline-none hover:text-blue-600" role="menuitem">
                                    <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                    <button type="submit" class="px-4 py-0">Delete book</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div class="flex flex-row overflow-auto height-osnovniDetalji">
        <div class="w-[100%]">
            <!-- Space for content -->
            <div class="pl-[50px] pr-[30px] pb-[30px] mt-[20px]">
                <div class="flex flex-row justify-between">

                    <div class="">
                        <div class="mt-[20px]">
                            <span class="text-gray-500 text-[14px]">Title</span>
                            <p class="font-medium">{{ $book->title }}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Author</span>
                            <p class="font-medium">{{ $book->author->name }}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Category</span>
                            <p class="font-medium">{{ $book->category->name }}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Genre</span>
                            <p class="font-medium">{{ $book->genre->name }}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Publisher</span>
                            <p class="font-medium">{{ $book->publisher->name }}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Date of publishing</span>
                            <p class="font-medium">{{ format_date($book->publish_date . " 00:00:00") }}</p>
                        </div>
                    </div>

                    <div class="">
                        <div class="mt-[20px]">
                            <span class="text-gray-500 text-[14px]">ISBN</span>
                            <p class="font-medium">{{ $book->isbn }}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Number of pages</span>
                            <p class="font-medium">{{ $book->page_count }}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Script</span>
                            <p class="font-medium">{{ $book->script->name }}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Binding</span>
                            <p class="font-medium">{{ $book->binding->name }}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Size</span>
                            <p class="font-medium">{{ $book->size->name }}</p>
                        </div>
                    </div>

                    <div class="w-[560px]">
                        <div class="mt-[20px]">
                            <span class="text-gray-500 text-[14px]">Content</span>
                            <p class="font-medium">{{ $book->content }}</p>
                        </div>
                        <img class="p-2 border-2 border-gray-300 mt-[20px]" width="400px" src="{{ asset($book->picture) }}" alt="Book image">
                    </div>

                </div>
            </div>
        </div>

        @include('components.book-sidebar')

    </div>

@endsection
