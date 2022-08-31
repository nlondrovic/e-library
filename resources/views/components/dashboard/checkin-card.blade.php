<div class="activity-card flex flex-row mb-[25px]">
    <div class="mt-[5px] flex flex-col">
        <div class="text-gray-500 mb-[5px]">
            <span class="capitalize">{{ __('Checkin') }}
                <p class="inline font-medium text-black"> - {{ format_activity_time($activity->time)  }} </p>
            </span>
        </div>
        <div>
            <p>
                <a href="{{ route('students.show', $activity->student) }}" class="text-[#2196f3] hover:text-blue-600">
                    {{ $activity->student->name }}
                </a>
                {{ __('returned') }}
                @if(\Request::is('books/*'))
                {{ __('the book') }}
                @else
                    <a href="{{ route('books.show', $activity->book) }}" class="text-[#2196f3] hover:text-blue-600">
                        {{ $activity->book->title }}
                    </a>
                @endif
                {{__('to')}}
                <a href="{{ route('librarians.show', $activity->librarian) }}" class="text-[#2196f3] hover:text-blue-600">
                    {{ $activity->librarian->name }}
                </a><br>
                <a href="{{ route('checkouts.show', $activity->activity_id) }}" class="text-[#2196f3] hover:text-blue-600">
                    {{ __('show details') }} &gt;&gt;
                </a>
            </p>
        </div>
    </div>
</div>
