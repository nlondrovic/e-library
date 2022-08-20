<div class="mx-2 pt-[15px]">
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
</div>
