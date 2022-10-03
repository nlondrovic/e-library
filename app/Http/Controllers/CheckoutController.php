<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCheckoutRequest;
use App\Models\Activity;
use App\Models\Book;
use App\Models\Checkout;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function checkouts(Request $request)
    {
        $checkoutsQuery = Checkout::where('end_time', null);
        $book_ids = $checkoutsQuery->pluck('book_id')->toArray();
        $student_ids = $checkoutsQuery->pluck('student_id')->toArray();
        $librarian_ids = $checkoutsQuery->pluck('checkout_librarian_id')->toArray();
        $books = Book::whereIn('id', $book_ids)->get();
        $students = User::whereIn('id', $student_ids)->get();
        $checkout_librarians = User::whereIn('id', $librarian_ids)->get();

        if ($request->get('student_ids')) {
            $checkoutsQuery->whereIn('student_id', $request->get('student_ids'));
        }
        if ($request->get('checkout_librarian_ids')) {
            $checkoutsQuery->whereIn('checkout_librarian_id', $request->get('checkout_librarian_ids'));
        }
        if ($request->get('book_ids')) {
            $checkoutsQuery->whereIn('book_id', $request->get('book_ids'));
        }
        if ($request->get('start_time')) {
            $checkoutsQuery->where('start_time', '>', $request->get('start_time'));
        }
        if ($request->get('end_time')) {
            $checkoutsQuery->where('start_time', '<', $request->get('end_time'));
        }

        $checkouts = $checkoutsQuery->orderBy('id', 'desc')->paginate(8);
        if (empty($checkouts->toArray())) {
            return view('transactions.index');
        }

        return view('transactions.checkouts.index',
            compact('checkouts', 'students', 'books', 'checkout_librarians')
        );
    }

    public function checkins(Request $request)
    {
        $checkoutsQuery = Checkout::where('end_time', '!=', null)
            ->where('checkout_end_reason_id', 1);
        $book_ids = $checkoutsQuery->pluck('book_id')->toArray();
        $student_ids = $checkoutsQuery->pluck('student_id')->toArray();
        $checkout_librarian_ids = $checkoutsQuery->pluck('checkout_librarian_id')->toArray();
        $checkin_librarian_ids = $checkoutsQuery->pluck('checkin_librarian_id')->toArray();
        $books = Book::whereIn('id', $book_ids)->get();
        $students = User::whereIn('id', $student_ids)->get();
        $checkout_librarians = User::whereIn('id', $checkout_librarian_ids)->get();
        $checkin_librarians = User::whereIn('id', $checkin_librarian_ids)->get();

        if ($request->get('student_ids')) {
            $checkoutsQuery->whereIn('student_id', $request->get('student_ids'));
        }
        if ($request->get('checkout_librarian_ids')) {
            $checkoutsQuery->whereIn('checkout_librarian_id', $request->get('checkout_librarian_ids'));
        }
        if ($request->get('checkin_librarian_ids')) {
            $checkoutsQuery->where('checkin_librarian_id', $request->get('checkin_librarian_ids'));
        }
        if ($request->get('book_ids')) {
            $checkoutsQuery->where('book_id', $request->get('book_ids'));
        }
        if ($request->get('start_time')) {
            $checkoutsQuery->where('start_time', '>', $request->get('start_time'));
        }
        if ($request->get('end_time')) {
            $checkoutsQuery->where('start_time', '<', $request->get('end_time'));
        }

        $checkouts = $checkoutsQuery->orderBy('id', 'desc')->paginate(8);
        if (empty($checkouts->toArray())) {
            return view('transactions.index');
        }

        return view('transactions.checkouts.checkins',
            compact('checkouts', 'students', 'books', 'checkout_librarians', 'checkin_librarians')
        );
    }

    public function overdue(Request $request)
    {
        $holding_time = DB::table('settings')
            ->where('variable', 'Holding time')->first()->value;
        $checkoutsQuery = Checkout::where('end_time', null)
            ->where('start_time', '<', Carbon::now()->subDays($holding_time)->toDateTimeString());
        $book_ids = $checkoutsQuery->pluck('book_id')->toArray();
        $student_ids = $checkoutsQuery->pluck('student_id')->toArray();
        $checkout_librarian_ids = $checkoutsQuery->pluck('checkout_librarian_id')->toArray();
        $checkin_librarian_ids = $checkoutsQuery->pluck('checkin_librarian_id')->toArray();
        $books = Book::whereIn('id', $book_ids)->get();
        $students = User::whereIn('id', $student_ids)->get();
        $checkout_librarians = User::whereIn('id', $checkout_librarian_ids)->get();
        $checkin_librarians = User::whereIn('id', $checkin_librarian_ids)->get();

        if ($request->get('student_ids')) {
            $checkoutsQuery->where('student_id', $request->get('student_ids'));
        }
        if ($request->get('checkout_librarian_ids')) {
            $checkoutsQuery->where('checkout_librarian_id', $request->get('checkout_librarian_ids'));
        }
        if ($request->get('checkin_librarian_ids')) {
            $checkoutsQuery->where('checkin_librarian_id', $request->get('checkin_librarian_ids'));
        }
        if ($request->get('book_ids')) {
            $checkoutsQuery->where('book_id', $request->get('book_ids'));
        }
        if ($request->get('start_time')) {
            $checkoutsQuery->where('start_time', '>', $request->get('start_time'));
        }
        if ($request->get('end_time')) {
            $checkoutsQuery->where('start_time', '<', $request->get('end_time'));
        }

        $checkouts = $checkoutsQuery->orderBy('id', 'desc')->paginate(8);
        if (empty($checkouts->toArray())) {
            return view('transactions.index');
        }

        return view('transactions.checkouts.overdue',
            compact('checkouts', 'students', 'books', 'checkout_librarians', 'checkin_librarians')
        );
    }

    public function lost(Request $request)
    {
        $checkoutsQuery = Checkout::where('end_time', '!=', null)
            ->where('checkout_end_reason_id', 2);
        $book_ids = $checkoutsQuery->pluck('book_id')->toArray();
        $student_ids = $checkoutsQuery->pluck('student_id')->toArray();
        $checkout_librarian_ids = $checkoutsQuery->pluck('checkout_librarian_id')->toArray();
        $checkin_librarian_ids = $checkoutsQuery->pluck('checkin_librarian_id')->toArray();
        $books = Book::whereIn('id', $book_ids)->get();
        $students = User::whereIn('id', $student_ids)->get();
        $checkout_librarians = User::whereIn('id', $checkout_librarian_ids)->get();
        $checkin_librarians = User::whereIn('id', $checkin_librarian_ids)->get();

        if ($request->get('student_ids')) {
            $checkoutsQuery->where('student_id', $request->get('student_ids'));
        }
        if ($request->get('checkout_librarian_ids')) {
            $checkoutsQuery->where('checkout_librarian_id', $request->get('checkout_librarian_ids'));
        }
        if ($request->get('checkin_librarian_ids')) {
            $checkoutsQuery->where('checkin_librarian_id', $request->get('checkin_librarian_ids'));
        }
        if ($request->get('book_ids')) {
            $checkoutsQuery->where('book_id', $request->get('book_ids'));
        }
        if ($request->get('start_time')) {
            $checkoutsQuery->where('start_time', '>', $request->get('start_time'));
        }
        if ($request->get('end_time')) {
            $checkoutsQuery->where('start_time', '<', $request->get('end_time'));
        }

        $checkouts = $checkoutsQuery->orderBy('id', 'desc')->paginate(8);
        if (empty($checkouts->toArray())) {
            return view('transactions.index');
        }

        return view('transactions.checkouts.lost',
            compact('checkouts', 'students', 'books', 'checkout_librarians', 'checkin_librarians')
        );
    }

    public function show(Checkout $checkout)
    {
        return view('transactions.checkouts.show', compact('checkout'));
    }

    public function create(Request $request)
    {
        $book = Book::findOrFail($request['book']);
        $students = User::where('role_id', 3)->get();
        $holding_time = DB::table('settings')
            ->where('variable', 'Holding time')->first()->value;
        $end_date = Carbon::now()->addDays($holding_time)->format('Y-m-d');
        $activities = Activity::where('book_id', $book->id)->orderBy('id', 'desc')->take(4)->get();

        return view('transactions.checkouts.create',
            compact('book', 'students', 'holding_time', 'end_date', 'activities')
        );
    }

    public function store(StoreCheckoutRequest $request)
    {
        $book = Book::findOrFail($request['book_id']);
        $student = User::findOrFail($request['student_id']);

        if (!$student->canCheckoutOrReserveMoreBooks()) {
            return redirect()->back()->withErrors([
                'message' => __('This student has checked out or reserved maximum number of books.')
            ]);
        }

        if ($student->canNotCheckoutBook($book->id)) {
            return redirect()->back()->withErrors([
                'message' => __('This student has already checked out this book and has not returned it yet.')
            ]);
        }

        if ($book->available_count < 1) {
            return redirect()->back()->withErrors([
                'message' => __('All copies of this book are checked out or reserved.')
            ]);
        }

        DB::transaction(function () use ($book, $request) {
            $inputs = $request->validated();
            $inputs['start_time'] = now();
            $inputs['checkout_librarian_id'] = auth()->id();
            $checkout = Checkout::create($inputs);

            $book->update(['checkouts_count' => ++$book->checkouts_count]);

            Activity::create([
                'book_id' => $inputs['book_id'],
                'student_id' => $inputs['student_id'],
                'librarian_id' => $inputs['checkout_librarian_id'],
                'time' => now(),
                'type' => 'Checkout',
                'activity_id' => $checkout['id']
            ]);
        });

        return redirect()->route('books.index')->with('flash-success', __('Checkout created successfully!'));
    }

    public function checkIn(Checkout $checkout)
    {
        DB::transaction(function () use ($checkout) {
            $checkout->update([
                'end_time' => now(),
                'checkin_librarian_id' => auth()->id(),
                'checkout_end_reason_id' => 1
            ]);

            $book = Book::findOrFail($checkout['book_id']);
            $book->update(['checkouts_count' => --$book->checkouts_count]);

            Activity::create([
                'book_id' => $checkout['book_id'],
                'student_id' => $checkout['student_id'],
                'librarian_id' => $checkout['checkin_librarian_id'],
                'time' => now(),
                'type' => 'Checkin',
                'activity_id' => $checkout['id']
            ]);
        });

        return redirect()->route('checkouts.index')->with('flash-success', __('Book checked in successfully!'));
    }

    public function writeOff(Checkout $checkout)
    {
        if ($checkout->end_date)
            return redirect()->route('checkouts.index'); // Prevents writing off checked in books

        DB::transaction(function () use ($checkout) {
            $checkout->update([
                'end_time' => now(),
                'checkin_librarian_id' => auth()->id(),
                'checkout_end_reason_id' => 2
            ]);

            $book = Book::findOrFail($checkout->book_id);
            $book->update([
                'total_count' => --$book->total_count,
                'checkouts_count' => --$book->checkouts_count
            ]);

            Activity::create([
                'book_id' => $checkout['book_id'],
                'student_id' => $checkout['student_id'],
                'librarian_id' => $checkout['checkin_librarian_id'],
                'time' => now(),
                'type' => 'Lost Book',
                'activity_id' => $checkout['id']
            ]);
        });

        return redirect()->route('checkouts.index')->with('flash-success', __('Book written off successfully!'));
    }
}
