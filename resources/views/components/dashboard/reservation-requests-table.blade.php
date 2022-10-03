<div>
    <table class="xl:w-[560px] w-[450px] table-auto">
        <tbody class="bg-gray-200">
        @foreach($reservation_requests as $reservation_request)
            <tr class="bg-white border-b-[1px] border-[#e4dfdf]">
                <td class="flex flex-row items-center px-2 py-4 xl:max-w-[250px] max-w-[180px]">
                    <img class="object-cover w-8 h-8 rounded-full" src="{{ getPictureFilePath($reservation_request->student->picture) }}"
                         alt="">
                    <a class="truncate ml-[16px] font-medium text-center ml-[5px]"
                       href="{{ route('students.show', ['student' => $reservation_request->student]) }}">
                        {{ $reservation_request->student->name }}
                    </a>
                </td>
                <td class="px-2 py-2 whitespace-nowrap">
                    <a href="{{ route('books.show', $reservation_request->book) }}"
                       class="truncate ml-[16px] font-medium text-center">
                        {{ Str::limit($reservation_request->book->title, 30) }}
                    </a>
                </td>
                <td class="px-2 py-2 whitespace-nowrap">
                <span class="px-[10px] py-[3px] bg-gray-200 text-gray-800 rounded-[10px]">
                    {{ format_time($reservation_request->start_time) }}
                </span>
                </td>
                <td class="px-2 py-2 whitespace-nowrap">
                    <a href="{{ route('reservationRequests.approve', $reservation_request) }}"
                       class="hover:text-green-500 mr-[5px]">
                        <i class="fas fa-check text-[17px]"></i>
                    </a>
                    <a href="{{ route('reservationRequests.reject', $reservation_request) }}"
                       class="hover:text-red-500 ">
                        <i class="fas fa-times text-[17px]"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-right mt-[5px] mr-9">
        <a href="{{ route('reservationRequests.index') }}" class="text-[#2196f3] hover:text-blue-600">
            <i class="fas fa-calendar-alt mr-[4px]" aria-hidden="true"></i>
            {{ __('Show all') }}
        </a>
    </div>
</div>
