@extends('transactions.index')
@section('title', __('Active reservations'))
@section('transactions-title', __('Active reservations'))
@section('transactions-subtitle')
    <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
    <a href="{{ route('checkouts.index') }}">{{ __('Transactions') }}</a> >
    <a href="{{ route('reservations.active') }}">{{ __('Active reservations') }}</a>
@endsection
@section('table')

    <table class="overflow-hidden shadow-lg rounded-xl w-full border-[1px] border-[#e4dfdf] rezervacije" id="myTable">
        <thead class="bg-[#EFF3F6]">
        <tr class="border-b-[1px] border-[#e4dfdf]">
            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left">{{__('Book')}}</th>
            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left">{{__('Student')}}</th>
            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left">{{__('Librarian')}}</th>
            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left">{{__('Reservation date')}}</th>
            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left">{{__('Reservation due')}}</th>
            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
        </tr>
        </thead>
        <tbody class="bg-white">
        @foreach($reservations as $reservation)
            <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                <td class="flex flex-row items-center px-4 py-3">
                    <img class="object-cover mr-2" width="40"
                         onerror="this.onerror=null; this.src='{{ \App\Models\Book::DEFAULT_BOOK_PICTURE_PATH }}'"
                         src="{{ getPictureFilePath($reservation->book->picture) }}" alt=""/>
                    <a href="{{ route('books.show', $reservation->book) }}">
                        <span class="font-medium text-center">{{ $reservation->book->title }}</span>
                    </a>
                </td>
                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                    <a href="{{ route('students.show', $reservation->student) }}">
                        <span class="font-medium text-center">{{ $reservation->student->name }}</span>
                    </a>
                </td>
                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                    <a href="{{ route('librarians.show', $reservation->librarian) }}">
                        <span class="font-medium text-center">{{ $reservation->librarian->name }}</span>
                    </a>
                </td>
                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ format_date($reservation->start_time) }}</td>
                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ format_date($reservation->supposed_end_time) }}</td>
                <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                    <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300
                        dotsArhiviraneRezervacije hover:text-[#606FC7]">
                        <i class="fas fa-ellipsis-v"></i>
                    </p>
                    <div class="relative right-20 z-10 hidden transition-all duration-300 origin-top-right transform scale-95
                    -translate-y-2 arhivirane-rezervacije">
                        <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y
                        divide-gray-100 rounded-md shadow-lg outline-none">
                            <div class="py-1">
                                <form method="post" action="{{ route('reservations.checkOut', $reservation) }}">
                                    @csrf
                                    @method('patch')
                                    <button type="submit" tabindex="0"
                                            onclick="return confirm('{{ __('Are you sure you want to check out this book?')}} ')"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                            style="outline: none">
                                        <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">{{__('Checkout book')}}</span>
                                    </button>
                                </form>
                                <form method="post" action="{{ route('reservations.cancel', $reservation) }}" class="">
                                    @csrf
                                    @method('patch')
                                    <button type="submit" tabindex="0"
                                            onclick="return confirm('{{ __('Are you sure you want to cancel this reservation?')}} ')"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 hover:text-red-500"
                                            style="outline: none">
                                        <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">{{__('Cancel reservation')}}</span>
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
        {{ $reservations->links("pagination::tailwind") }}
    </p>

@endsection
