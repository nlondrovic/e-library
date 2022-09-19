<table class="w-[560px] table-auto">
    <tbody class="bg-gray-200">
    @foreach($reservationRequests as $reservationRequest)
        <tr class="bg-white border-b-[1px] border-[#e4dfdf]">
            <td class="flex flex-row items-center px-2 py-4">
                <img class="object-cover w-8 h-8 rounded-full "
                     src="{{ $reservationRequest->student->picture }}" alt=""/>
                <a href="{{ route('students.show', $reservationRequest->student)}}"
                   class="ml-2 font-medium text-center">{{ $reservationRequest->student->name }}</a>
            <td>
            </td>
            <td class="px-2 py-2">
                <a class="ml-2 font-medium text-center"
                   href="{{ route('books.show', $reservationRequest->book)}}">{{ $reservationRequest->book->title }}</a>
            </td>
            <td class="px-2 py-2">
                            <span
                                class="px-[10px] py-[3px] bg-gray-200 text-gray-800 px-[6px] py-[2px] rounded-[10px]">
                                {{ format_date($reservationRequest->start_time) }}
                            </span>
            </td>
            <td class="px-2 py-2">
                <form action="{{ route('reservationRequests.approve', $reservationRequest) }}"
                      method="post">
                    @csrf
                    @method('post')
                    <button type="submit">
                        <i type="submit" class="fas fa-check hover:text-green-500 mr-[5px]"></i>
                    </button>
                </form>
            </td>
            <td class="px-2 py-2">
                <form action="{{ route('reservationRequests.decline', $reservationRequest) }}"
                      method="post">
                    @csrf
                    @method('post')
                    <button type="submit">
                        <i type="submit" class="fas fa-times hover:text-red-500"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
