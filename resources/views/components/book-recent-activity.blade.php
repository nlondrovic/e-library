<div class="p-4 pt-[15px] border-t-[1px] border-[#e4dfdf]">
        <h4 class="text-center mb-[5px]">{{ __('Recent activities') }}</h4>
    @foreach($activities as $activity)
        @if($activity->type == 'Checkout')
            @include('components/dashboard/checkout-card')
        @elseif($activity->type == 'Checkin')
            @include('components/dashboard/checkin-card')
        @elseif($activity->type == 'Lost book')
            @include('components/dashboard/lost-card')
        @elseif($activity->type == 'Reservation')
            @include('components/dashboard/reservation-card')
        @endif
    @endforeach

    @if(count($activities))
        <div class="inline-block w-[90%] mt-4 px-2 py-2">
            <a href="{{ route('activities', ['book_id' => $book->id]) }}" class="btn-animation block text-center w-full px-4 py-2 text-sm tracking-wider
                        text-gray-600 transition duration-300 ease-in border-[1px] border-gray-400 rounded hover:bg-gray-200
                        focus:outline-none focus:ring-[1px] focus:ring-gray-300  shadow-md">
                {{ __('Show all') }}
            </a>
        </div>
    @endif
</div>
