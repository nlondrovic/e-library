@extends('layouts.app')
@section('main')

    <div class="mt-2">
        <div class="heading mt-[7px]">
            <h1 class="pl-[50px] pb-[21px]  border-b-[1px] border-[#e4dfdf]">
                {{__('Activities')}}
            </h1>
        </div>
    </div>

    <div class="flex flex-row justify-between pl-[50px] overflow-auto scroll height-dashboard pb-[30px] mt-[0px]">
        <div class="mr-[30px]">
            <p class="mb-[20px] mt-[20px]">
                {{ __('Results found: ') }} {{ count($activities) }}
            </p>
            <!-- Activity Cards -->
            @foreach($activities as $activity)
                @if($activity->type == 'Checkout')
                    @include('components/dashboard/checkout-card')
                @elseif($activity->type == 'Checkin')
                    @include('components/dashboard/checkin-card')
                @elseif($activity->type == 'Lost Book')
                    @include('components/dashboard/lost-card')
                @elseif($activity->type == 'Reservation')
                    @include('components/dashboard/reservation-card')
                @endif
            @endforeach
            <div class="inline-block w-full mt-4 mb-[30px]">
                <button type="button"
                        class="btn-animation w-full px-4 py-2 text-sm tracking-wider text-gray-600 transition
                            duration-300 ease-in border-[1px] border-gray-400 rounded activity-showMore hover:bg-gray-200
                            focus:outline-none focus:ring-[1px] focus:ring-gray-300">
                    {{ __('Show more') }}
                </button>
            </div>
        </div>
        <div class="mr-[50px]">
            <h1 class="mb-[20px] mt-[20px]">{{__('Filters')}}</h1>
            <form action="{{ route(Route::currentRouteName(), request()->all()) }}" method="get">
                {{-- Type --}}
                <div>
                    <p>{{__('Type')}}</p>
                    <select class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                            shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                            name="type">
                        <option value="">{{__('None')}}</option>
                        <option value="Checkout" @if(request()->get('type') == "Checkout") selected @endif>{{__('Checkout')}}
                        </option>
                        <option value="Checkin" @if(request()->get('type') == "Checkin") selected @endif>{{__('Checkin')}}
                        </option>
                        <option value="Lost book" @if(request()->get('type') == "Lost book") selected @endif>{{__('Lost book')}}
                        </option>
                        <option value="Reservation" @if(request()->get('type') == "Reservation") selected @endif>{{__('Reservation')}}
                        </option>
                    </select>
                </div>
                {{-- Book --}}
                <div class="mt-[20px]">
                    <p>{{__('Book')}}</p>
                    <select class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                            shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                            name="book_id">
                        <option value="">{{__('None')}}</option>
                        @foreach ($books as $book)
                            @if(request()->get('book_id') == $book->id)
                               {{__('yes')}} {{ $book->id }}
                            @endif
                            <option
                                @if(request()->get('book_id') == $book->id) selected @endif
                            value="{{ $book->id }}">
                                {{ $book->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- Student --}}
                <div class="mt-[20px]">
                    <p>{{__('Student')}}</p>
                    <select class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                            shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                            name="student_id">
                        <option value="">{{__('None')}}</option>
                        @foreach ($students as $student)
                            <option
                                @if(request()->get('student_id') == $student->id) selected @endif
                            value="{{ $student->id }}">
                                {{ $student->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- Librarian --}}
                <div class="mt-[20px]">
                    <p>{{__('Librarian')}}</p>
                    <select class="search-select flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                            shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                            name="librarian_id">
                        <option value="">{{__('None')}}</option>
                        @foreach ($librarians as $librarian)
                            <option
                                @if(request()->get('librarian_id') == $librarian->id) selected @endif
                            value="{{ $librarian->id }}">
                                {{ $librarian->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- Start date --}}
                <div class="mt-[20px]">
                    <p>{{__('Start date')}}</p>
                    <input type="date" name="start_date" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border
                        border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                           value="{{ request()->get('start_date') }}"/>
                </div>
                {{-- End date --}}
                <div class="mt-[20px]">
                    <p>{{__('End date')}}</p>
                    <input type="date" name="end_date" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border
                        border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                           value="{{ request()->get('end_date') }}"/>
                </div>

                <div class="pt-[20px]">
                    <button type="submit" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition
                            duration-300ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                        <i class="fas fa-search"></i>&nbsp;{{__('Filter')}}
                    </button>
                </div>
            </form>

            @if(request()->get('type') || request()->get('book_id')
                || request()->get('student_id') || request()->get('librarian_id')
                || request()->get('start_date') || request()->get('end_date'))
                <a href="{{ route(Route::currentRouteName()) }}" class="">
                    <button class="mt-[20px] btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300
                                    ease-in rounded-[5px] tracking-wider text-white bg-[#F44336] rounded hover:bg-[#F55549]">
                        <i class="fas fa-times ml-[4px]"></i>&nbsp;{{__('Reset')}}
                    </button>
                </a>
            @endif

        </div>
    </div>
    <script>
        $(document).ready(function () {
            if ($('.activity-card').length > 6) {
                $('.activity-card:gt(6)').hide();
                $('.activity-showMore').show();
                $(this).text('Show more');
            }

            $('.activity-showMore').on('click', function () {
                $('.activity-card:gt(6)').toggle();
                if ($(this).text() == 'Show less') {
                    $(this).text('Show more')
                } else {
                    $(this).text('Show less');
                }
            });
        });
    </script>
@endsection
