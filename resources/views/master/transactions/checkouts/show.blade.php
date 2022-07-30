@extends('layouts.app')
@section('main')

    <!-- Heading of content -->
    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="py-[10px] flex flex-row">
                <div class="pl-[50px] pb-[14px] flex flex-col">
                    <h1>{{ $checkout->book->title }}</h1>
                </div>
            </div>

            <div class="pt-[15px] mr-[30px] grid grid-cols-2">
                @if(!$checkout->end_time)
                    <div class="col">

                    <form action="{{ route('checkIn', $checkout) }}" method="post">
                        @csrf
                        @method('post')
                        <button type="submit" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                            <i class="fas fa-redo-alt mr-[3px] "></i>
                            Check in
                        </button>
                    </form>
                    </div>
                <div class="col">

                    <form action="{{ route('writeOff', $checkout) }}" method="post">
                        @csrf
                        @method('post')
                        <button type="submit" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                            <i class="far fa-calendar-check mr-[3px] "></i>
                            Write off
                        </button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div class="flex flex-row overflow-auto height-osnovniDetalji">
        <div class="w-[100%]">
            <!-- Space for content -->
            <div class="pl-[50px] pr-[30px] pb-[30px] mt-[20px]">
                <div class="flex flex-row justify-start">

                    <div class="">
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Book</span>
                            <p class="font-medium">{{ $checkout->book->title }}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Checkout librarian</span>
                            <p class="font-medium">{{ $checkout->checkout_librarian->name }}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Checkout student</span>
                            <p class="font-medium">{{ $checkout->student->name }}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Checkout time</span>
                            <p class="font-medium">{{ $checkout->start_time }}</p>
                        </div>
                    </div>

                    <div class="ml-[50px]">
                        @if($checkout->end_time)
                            <div class="mt-[40px]">
                                <span class="text-gray-500 text-[14px]">Checkin time</span>
                                <p class="font-medium">{{ $checkout->end_time }}</p>
                            </div>
                            <div class="mt-[40px] mb-[20px]">
                                <span class="text-gray-500 text-[14px]">Checkin librarian</span>
                                <p class="font-medium">{{ $checkout->checkin_librarian->name }}</p>
                            </div>
                        @endif
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Holding for</span>
                            <p class="font-medium">{{ $checkout->holding_time }}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500 text-[14px]">Overdue time</span>
                            <p class="font-medium">{{ $checkout->overdue_time }}</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>

@endsection
