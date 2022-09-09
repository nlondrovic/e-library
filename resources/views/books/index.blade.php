@extends('layouts.app')
@section('main')

    <div class="pl-[50px] pb-[5px] border-b-[1px] border-[#e4dfdf] header-breadcrumbs">
        <h1> {{__('Books')}}</h1>
        <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
        <a href="{{ route('books.index') }}">{{ __('Books') }}</a>
    </div>

    @if(session()->has('flash-book-store-success'))
        <div class="flash_message success">
            <i class="fa-solid fa-check text-[17px] mr-[8px] justify-center"></i>Success!
            <p class="text-left"> {{ session()->get('flash-book-store-success') }} </p>
        </div>
    @elseif(session()->has('flash-book-update-success'))
        <div class="flash_message success">
            <i class="fa-solid fa-check text-[17px] mr-[8px] justify-center"></i>Success!
            <p class="text-left"> {{ session()->get('flash-book-update-success') }} </p>
        </div>
    @endif

    <div class="scroll height-evidencija">
        <div class="flex items-center justify-between px-[50px] py-4 space-x-3 rounded-lg">
            <a href="{{ route('books.create') }}"
               class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300
                       ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                <i class="fas fa-plus mr-[15px]"></i> {{ __('New book') }}
            </a>
            <form action="{{ route('books.index') }}">
                <div class="wrapper">
                    <div class="search-input">
                        <a href="" hidden></a>
                        <input type="search" name="search" placeholder="{{ __('Search books') }}"
                               value="{{ request()->get('search') }}" autocomplete="off">
                        <div class="autocom-box"></div>
                        <div class="search-icon"><i class="fas fa-search"></i></div>
                    </div>
                </div>
            </form>
            <script>
                let suggestions = [
                    @foreach($search_array as $book)
                        "{{ $book->title }}",
                    @endforeach
                ];
            </script>
        </div>

        <div class="px-[50px] pt-2 bg-white mb-[30px]">
            <div class="w-full mt-2">
                <table class="w-full overflow-hidden shadow-lg rounded-xl" id="myTable">
                    <thead class="bg-[#EFF3F6]">
                    <tr class="border-b-[1px] border-[#e4dfdf]">
                        <th class="flex items-center px-4 py-4 leading-4 tracking-wider text-left">{{ __('Title') }}</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">{{ __('Author') }}</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">{{ __('Category') }}</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">{{ __('Free') }}</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">{{ __('Reserved') }}</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">{{ __('Checked out') }}</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">{{ __('Overdue') }}</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">{{ __('Total') }}</th>
                        <th class="px-4 py-4"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach($books as $book)
                        <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                            <td class="flex flex-row items-center px-4 py-4">
                                <img class="object-cover w-8 mr-2 h-11" src="{{ asset($book->picture) }}" alt=""/>
                                <a href="{{ route('books.show', $book) }}">
                                    <span class="font-medium text-center">{{ $book->title }}</span>
                                </a>
                            </td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $book->author->name }}</td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $book->category->name }}</td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $book->getFreeCount() }}</td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap text-[#2196f3]">
                                <a href="{{ route('reservations.active', ['book_id' => $book->id]) }}">
                                    {{ $book->reserved_count != 0 ? $book->reserved_count : "" }}
                                </a>
                            </td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap text-[#2196f3]">
                                <a href="{{ route('checkouts.index', ['book_id' => $book->id]) }}">
                                    {{ $book->checkouts_count != 0 ? $book->checkouts_count : "" }}
                                </a>
                            </td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap text-[#2196f3]">
                                <a href="{{ route('overdue.index', ['book_id' => $book->id]) }}">
                                    {{ $book->getOverdueCount() != 0 ? $book->getOverdueCount() : "" }}
                                </a>
                            </td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $book->total_count }}</td>
                            <td class="px-6 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                                <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsKnjige hover:text-[#606FC7]">
                                    <i class="fas fa-ellipsis-v"></i>
                                </p>
                                <div
                                    class="absolute z-10 hidden transition-all duration-300 origin-top-right transform
                                    scale-95 -translate-y-2 dropdown-knjige">
                                    <div
                                        class="absolute w-56 mt-2 origin-top-right bg-white border border-gray-200
                                         divide-y divide-gray-100 rounded-md shadow-lg outline-none">
                                        <div class="py-1">
                                            <a href="{{ route('checkouts.index', ['book_id' => $book->id]) }}"
                                               tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700
                                            outline-none hover:text-blue-600">
                                                <i class="fas fa-exchange-alt ml-[5px] mr-[3px]"></i>
                                                <span class="px-4 py-0">{{ __('Transactions') }}</span>
                                            </a>
                                            <a href="{{ route('checkouts.create', $book) }}" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                                <i class="far fa-hand-scissors mr-[6px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">{{ __('Check out') }}</span>
                                            </a>
                                            <a href="{{ route('reservations.create', $book) }}" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                                <i class="far fa-calendar-check mr-[5px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">{{ __('Reserve') }}</span>
                                            </a>
                                            <a href="{{ route('books.show', $book) }}" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                                <i class="far fa-file mr-[10px] ml-[3px] py-1"></i>
                                                <span class="px-4 py-0">{{ __('Show details') }}</span>
                                            </a>
                                            <a href="{{ route('books.edit', $book) }}" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                                <i class="fas fa-edit mr-[5px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">{{ __('Edit book') }}</span>
                                            </a>
                                            <form action="{{ route('books.destroy', $book) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                                    <i class="fa fa-trash mr-[8px] ml-[4px] py-1"></i>
                                                    <span class="px-4 py-0">{{ __('Delete book') }}</span>
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

                @if(isset($pagination))
                    <p class="mt-[20px]">
                        {{ $books->links("pagination::tailwind") }}
                    </p>
                @endif

            </div>
        </div>
    </div>
@endsection
