@extends('transactions.index')
@section('title', __('Checkins'))
@section('transactions-title', __('Checkins'))
@section('transactions-subtitle')
    <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
    <a href="{{ route('checkouts.index') }}">{{ __('Transactions') }}</a> >
    <a href="{{ route('checkins.index') }}">{{ __('Checkins') }}</a>
@endsection
@section('table')

    <table class="w-full overflow-hidden shadow-lg rounded-xl" id="myTable">
        <thead class="bg-[#EFF3F6]">
        <tr class="border-b-[1px] border-[#e4dfdf]">
            <th class="flex items-center px-4 py-4 leading-4 tracking-wider text-left">{{__('Book')}}</th>
            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">{{__('Student')}}</th>
            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">{{__('Checkout librarian')}}</th>
            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">{{__('Checkin librarian')}}</th>
            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">{{__('Start time')}}</th>
            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">{{__('End time')}}</th>
            <th class="px-4 py-4"></th>
        </tr>
        </thead>
        <tbody class="bg-white">
        @foreach($checkouts as $checkout)
            <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                <td class="flex flex-row items-center px-4 py-3">
                    <img class="object-cover mr-2" width="40"
                         onerror="this.onerror=null; this.src='{{ \App\Models\Book::DEFAULT_BOOK_PICTURE_PATH }}'"
                         src="{{ getPictureFilePath($checkout->book->picture) }}" alt=""/>
                    <a href="{{ route('books.show', $checkout->book) }}">
                        <span class="font-medium text-center">{{ $checkout->book->title }}</span>
                    </a>
                </td>
                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                    <a href="{{ route('students.show', $checkout->student) }}">
                        <span class="font-medium text-center">{{ $checkout->student->name }}</span>
                    </a>
                </td>
                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                    <a href="{{ route('librarians.show', $checkout->checkout_librarian) }}">
                        <span class="font-medium text-center">{{ $checkout->checkout_librarian->name }}</span>
                    </a>
                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                    <a href="{{ route('librarians.show', $checkout->checkin_librarian) }}">
                        <span class="font-medium text-center">{{ $checkout->checkin_librarian->name }}</span>
                    </a>
                </td>
                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ format_time($checkout->start_time) }}</td>
                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ format_time($checkout->end_time) }}</td>
                <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                    <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsKnjige hover:text-[#606FC7]">
                        <i class="fas fa-ellipsis-v"></i>
                    </p>
                    <div
                        class="relative right-20 z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-knjige">
                        <div class="absolute w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y d
                            ivide-gray-100 rounded-md shadow-lg outline-none">
                            <div class="py-1">
                                <a href="{{ route('checkouts.show', $checkout) }}" tabindex="0"
                                   class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                    <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                    <span class="px-4 py-0">{{__('Show details')}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <p class="mt-[20px]">
        {{ $checkouts->links("pagination::tailwind") }}
    </p>

@endsection
