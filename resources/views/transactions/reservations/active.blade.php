@extends('transactions.index')
@section('transactions-title', 'Active reservations')
@section('table')

    <table class="overflow-hidden shadow-lg rounded-xl w-full border-[1px] border-[#e4dfdf] rezervacije" id="myTable">
        <thead class="bg-[#EFF3F6]">
        <tr class="border-b-[1px] border-[#e4dfdf]">
            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left">Book title</th>
            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left">Student</th>
            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left">Reservation date</th>
            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left">Reservation due</th>
            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
        </tr>
        </thead>
        <tbody class="bg-white">
        @foreach($reservations as $reservation)
            <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                <td class="flex flex-row items-center px-4 py-3">
                    <img class="object-cover w-8 mr-2 h-11" src="{{ $reservation->book->picture }}" alt=""/>
                    <a href="{{ route('books.show', $reservation->book) }}">
                        <span class="font-medium text-center">{{ $reservation->book->title }}</span>
                    </a>
                </td>
                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                    <a href="{{ route('students.show', $reservation->student) }}">
                        <span class="font-medium text-center">{{ $reservation->student->name }}</span>
                    </a>
                </td>
                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ format_date($reservation->start_time) }}</td>
                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ format_date($reservation->supposed_end_time) }}</td>
                <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                    <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300
                        dotsArhiviraneRezervacije hover:text-[#606FC7]">
                        <i class="fas fa-ellipsis-v"></i>
                    </p>
                    <div
                        class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 arhivirane-rezervacije">
                        <div
                            class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                            aria-labelledby="headlessui-menu-button-1"
                            id="headlessui-menu-items-117" role="menu">
                            <div class="py-1">
                                <form method="post" action="{{ route('reservations.checkOut', $reservation) }}">
                                    @csrf
                                    @method('patch')
                                    <button type="submit" tabindex="0"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                            role="menuitem">
                                        <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Checkout</span>
                                    </button>
                                </form>
                                <form method="post" action="{{ route('reservations.cancel', $reservation) }}" class="">
                                    @csrf
                                    @method('patch')
                                    <button type="submit" tabindex="0"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                            role="menuitem">
                                        <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Cancel reservation</span>
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
        {{ $reservations->links("pagination::tailwind") }}
    </span>
@endsection
