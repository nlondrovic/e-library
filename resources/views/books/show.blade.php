@extends('layouts.app')
@section('title', __('Book').' - '.$book->title)
@section('main')

    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[50px] pb-[5px] header-breadcrumbs">
                <h1> {{ $book->title }}</h1>
                <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
                <a href="{{ route('books.index') }}">{{ __('Books') }}</a> >
                <a href="{{ route('books.show', $book) }}">{{ $book->title }}</a>
            </div>

            <div class="pt-[15px] mr-[30px]">
                <a href="{{ route('checkouts.index', ['book_ids[]' => $book->id]) }}"
                   class="inline hover:text-blue-600 ml-[20px] pr-[10px]">
                    <i class="fas fa-exchange-alt mr-[3px]"></i>
                    {{ __('Transactions') }}
                </a>
                <a href="{{ route('checkouts.create', $book) }}" class="inline hover:text-blue-600 ml-[20px] pr-[10px] btn-animation outline-none">
                    <i class="far fa-hand-scissors mr-[3px]"></i>
                    {{ __('Check out') }}
                </a>
                <a href="{{ route('reservations.create', $book) }}"
                   class="inline hover:text-blue-600 ml-[20px] pr-[10px] btn-animation">
                    <i class="far fa-calendar-check mr-[3px]"></i>
                    {{ __('Reserve') }}
                </a>
                <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] dotsKnjigaOsnovniDetalji hover:text-[#606FC7]">
                    <i class="fas fa-ellipsis-v"></i>
                </p>
                <div class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2
                    dropdown-knjiga-osnovni-detalji">
                    <div class="absolute right-0 w-56 mt-[7px] origin-top-right bg-white border border-gray-200
                                divide-y divide-gray-100 rounded-md shadow-lg outline-none">
                        <div class="py-1">
                            <a href="{{ route('books.edit', $book) }}" tabindex="0"
                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600 btn-animation">
                                <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">{{ __('Edit book') }}</span>
                            </a>
                            <form action="{{ route('books.destroy', $book) }}" method="post">
                                @csrf
                                @method('delete')
                                <p tabindex="0" class="flex w-full px-4 py-2 text-sm leading-5 text-left
                                            text-gray-700 outline-none hover:text-blue-600 z-50 btn-animation">
                                    <i class="fa fa-trash mr-[5px] ml-[5px] py-1 text-red-500"></i>
                                    <button type="submit" class="px-4 py-0 text-red-500">{{ __('Delete book') }}</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-row overflow-auto height-osnovniDetalji scroll">
        <div class="w-[100%]">
            <div class="pl-[50px] pb-[30px] mt-[20px]">
                <div class="flex flex-row justify-between">

                    <div class="mr-[15px]">
                        <div class="mt-[20px]">
                            <span class="text-gray-500 text-[14px]">{{ __('Title') }}</span>
                            <p class="font-medium">{{ $book->title }}</p>
                        </div>
                        <div class="mt-[20px]">
                            <span class="text-gray-500 text-[14px]">{{ __('Author') }}</span>
                            <p class="font-medium">{{ $book->author->name }}</p>
                        </div>
                        <div class="mt-[20px]">
                            <span class="text-gray-500 text-[14px]">{{ __('Category') }}</span>
                            <p class="font-medium">{{ $book->category->name }}</p>
                        </div>
                        <div class="mt-[20px]">
                            <span class="text-gray-500 text-[14px]">{{ __('Publisher') }}</span>
                            <p class="font-medium">{{ $book->publisher->name }}</p>
                        </div>
                        <div class="mt-[20px]">
                            <span class="text-gray-500 text-[14px]">{{ __('Content') }}</span>
                            <p class="font-medium max-w-[550px]">{{ $book->content }}</p>
                        </div>
                    </div>
                    <div class="mr-[15px]">
                        <div class="mt-[20px]">
                            <span class="text-gray-500 text-[14px]">{{ __('Date of publishing') }}</span>
                            <p class="font-medium">{{ format_date($book->publish_date . " 00:00:00") }}</p>
                        </div>

                        <div class="mt-[20px]">
                            <span class="text-gray-500 text-[14px]">{{ __('ISBN') }}</span>
                            <p class="font-medium">{{ $book->isbn }}</p>
                        </div>
                        <div class="mt-[20px]">
                            <span class="text-gray-500 text-[14px]">{{ __('Number of pages') }}</span>
                            <p class="font-medium">{{ $book->page_count }}</p>
                        </div>
                        <div class="mt-[20px]">
                            <span class="text-gray-500 text-[14px]">{{ __('Genre') }}</span>
                            <p class="font-medium">{{ $book->genre->name }}</p>
                        </div>
                        <div class="mt-[20px]">
                            <span class="text-gray-500 text-[14px]">{{ __('Script') }}</span>
                            <p class="font-medium">{{ $book->script->name }}</p>
                        </div>
                        <div class="mt-[20px]">
                            <span class="text-gray-500 text-[14px]">{{ __('Binding') }}</span>
                            <p class="font-medium">{{ $book->binding->name }}</p>
                        </div>
                        <div class="mt-[20px]">
                            <span class="text-gray-500 text-[14px]">{{ __('Size') }}</span>
                            <p class="font-medium">{{ $book->size->name }}</p>
                        </div>
                    </div>
                    <div class="mr-[20px]">
                        <img class="p-2 border-2 border-gray-300 mt-[20px]" width="360"
                             src="{{ asset($book->picture) }}" alt="{{ __('Book image') }}"
                             onerror="this.onerror=null; this.src='{{ \App\Models\Book::DEFAULT_BOOK_PICTURE_PATH }}'">
                    </div>
                </div>
            </div>
        </div>

        <div class="min-w-[25%] border-l-[1px] h-full border-[#e4dfdf]">
            @include('components.book-copies')
            @include('components.book-recent-activity')
        </div>
    </div>

@endsection
