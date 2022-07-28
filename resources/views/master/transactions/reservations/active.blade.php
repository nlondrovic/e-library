@extends('master.transactions.index')
@section('table')

    <table class="overflow-hidden shadow-lg rounded-xl w-full border-[1px] border-[#e4dfdf] rezervacije" id="myTable">
        <thead class="bg-[#EFF3F6]">
        <tr class="border-b-[1px] border-[#e4dfdf]">
            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>
            <th class="flex items-center px-4 py-4 leading-4 tracking-wider text-left">Book title</th>
            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer datumDrop-toggle">Reservation date</th>
            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left">Reservation due</th>
            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left">Student</th>
            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left">Status</th>
            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left"></th>

        </tr>
        </thead>
        <tbody class="bg-white">
            @foreach($reservations as $reservation)
{{--            <tr class="hover:bg-gray-200 hover:shadow-md bg-gray-200 border-b-[1px] border-[#e4dfdf] changeBg">--}}
{{--                <td class="flex flex-row items-center px-4 py-3">--}}
{{--                    <img class="object-cover w-8 mr-2 h-11" src="{{ $reservation->book->picture }}" alt=""/>--}}
{{--                    <a href="{{ route('books.show', $reservation->book) }}">--}}
{{--                        <span class="font-medium text-center">{{ $reservation->book->title }}</span>--}}
{{--                    </a>--}}
{{--                </td>--}}
{{--                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ $reservation->start_time }}</td>--}}
{{--                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ $reservation->supposed_end_time }}</td>--}}
{{--                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">--}}
{{--                    <a href="{{ route('students.show', $reservation->student) }}">--}}
{{--                        <span class="font-medium text-center">{{ $reservation->student->name }}</span>--}}
{{--                    </a>--}}
{{--                </td>--}}
{{--                <td class="px-4 py-3 changeStatus">--}}
{{--                    <a href="#" class="hover:text-green-500 mr-[5px]">--}}
{{--                        <i class="fas fa-check reservedStatus"></i>--}}
{{--                    </a>--}}
{{--                    <a href="#" class="hover:text-red-500 ">--}}
{{--                        <i class="fas fa-times deniedStatus"></i>--}}
{{--                    </a>--}}
{{--                </td>--}}
{{--                <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">--}}
{{--                    <p class="hidden inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsAktivneRezervacije hover:text-[#606FC7]">--}}
{{--                        <i class="fas fa-ellipsis-v"></i>--}}
{{--                    </p>--}}
{{--                    <div--}}
{{--                        class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 aktivne-rezervacije">--}}
{{--                        <div--}}
{{--                            class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"--}}
{{--                            aria-labelledby="headlessui-menu-button-1"--}}
{{--                            id="headlessui-menu-items-117" role="menu">--}}
{{--                            <div class="py-1">--}}
{{--                                <a href="{{ route('reservations.show', $reservation) }}" tabindex="0"--}}
{{--                                   class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"--}}
{{--                                   role="menuitem">--}}
{{--                                    <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>--}}
{{--                                    <span class="px-4 py-0">Show details</span>--}}
{{--                                </a>--}}
{{--                                <form method="post" action="{{ route('reservations.checkOut', $reservation) }}" tabindex="0">--}}
{{--                                    @csrf--}}
{{--                                    @method('post')--}}
{{--                                    <button type="submit" class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"--}}
{{--                                            role="menuitem">--}}
{{--                                        <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>--}}
{{--                                        <span class="px-4 py-0">Check out</span>--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                                <form method="post" action="{{ route('reservations.cancel', $reservation) }}" tabindex="0">--}}
{{--                                    @csrf--}}
{{--                                    @method('delete')--}}
{{--                                    <button type="submit" class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"--}}
{{--                                            role="menuitem">--}}
{{--                                        <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>--}}
{{--                                        <span class="px-4 py-0">Delete reservation</span>--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </td>--}}
{{--            </tr>--}}
            <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                <td class="px-4 py-3 whitespace-no-wrap">
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox">
                    </label>
                </td>
                <td class="flex flex-row items-center px-4 py-3">
                    <img class="object-cover w-8 mr-2 h-11" src="{{ $reservation->book->picture }}" alt=""/>
                    <a href="{{ route('books.show', $reservation->book) }}">
                        <span class="font-medium text-center">{{ $reservation->book->title }}</span>
                    </a>
                </td>
                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ $reservation->start_time }}</td>
                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ $reservation->supposed_end_time }}</td>
                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                    <a href="{{ route('students.show', $reservation->student) }}">
                        <span class="font-medium text-center">{{ $reservation->student->name }}</span>
                    </a>
                </td>
                <td class="px-4 py-3 text-sm leading-5 text-blue-900 whitespace-no-wrap">
                    <div
                        class="inline-block px-[6px] py-[2px] font-medium bg-green-200 rounded-[10px]">
                        <span class="text-xs text-green-800">Knjiga rezervisana</span>
                    </div>
                </td>
                <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                    <p
                        class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsArhiviraneRezervacije hover:text-[#606FC7]">
                        <i class="fas fa-ellipsis-v"></i>
                    </p>
                    <div
                        class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 arhivirane-rezervacije">
                        <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                             aria-labelledby="headlessui-menu-button-1"
                             id="headlessui-menu-items-117" role="menu">
                            <div class="py-1">
                                <a href="izdajKnjigu.php" tabindex="0"
                                   class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                   role="menuitem">
                                    <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                    <span class="px-4 py-0">Izdaj knjigu</span>
                                </a>
                                <a href="izdajKnjigu.php" tabindex="0"
                                   class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                   role="menuitem">
                                    <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                    <span class="px-4 py-0">Izdaj knjigu</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
