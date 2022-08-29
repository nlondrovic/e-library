<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCheckoutRequest;
use App\Models\Activity;
use App\Models\Book;
use App\Models\Checkout;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function checkouts(Request $request)
    {
        $checkoutsQuery = Checkout::where('end_time', null);
        $student = null;
        $book = null;

        if ($request->get('student_id')) {
            $checkoutsQuery->where('student_id', $request->get('student_id'));
            $student = User::findOrFail($request['student_id']);
        }

        if ($request->get('book_id')) {
            $checkoutsQuery->where('book_id', $request->get('book_id'));
            $book = Book::findOrFail($request['book_id']);
        }

        $checkouts = $checkoutsQuery->orderBy('id', 'desc')->paginate(8);
        if (empty($checkouts->toArray())) {
            return view('transactions.index');
        }

        $books_ids = $checkoutsQuery->pluck('book_id')->toArray();
        $student_ids = $checkoutsQuery->pluck('student_id')->toArray();
        $books = Book::whereIn('id', $books_ids)->get();
        $students = User::whereIn('id', $student_ids)->get();

        return view('transactions.checkouts.index',
            compact('checkouts', 'student', 'book', 'students', 'books')
        );
    }

    public function checkins(Request $request)
    {
        $checkoutsQuery = Checkout::where('end_time', '!=', null)
            ->where('checkout_end_reason_id', 1);
        $student = null;
        $book = null;

        if ($request->get('student_id')) {
            $checkoutsQuery->where('student_id', $request->get('student_id'));
            $student = User::findOrFail($request['student_id']);
        }

        if ($request->get('book_id')) {
            $checkoutsQuery->where('book_id', $request->get('book_id'));
            $book = Book::findOrFail($request['book_id']);
        }

        $checkouts = $checkoutsQuery->orderBy('id', 'desc')->paginate(8);
        if (empty($checkouts->toArray())) {
            return view('transactions.index');
        }

        $books_ids = $checkoutsQuery->pluck('book_id')->toArray();
        $student_ids = $checkoutsQuery->pluck('student_id')->toArray();
        $books = Book::whereIn('id', $books_ids)->get();
        $students = User::whereIn('id', $student_ids)->get();

        return view('transactions.checkouts.checkins',
            compact('checkouts', 'student', 'book', 'students', 'books')
        );
    }

    public function overdue(Request $request)
    {
        $holding_time = DB::table('settings')
                ->where('variable', 'Holding time')->first()->value;
        $checkoutsQuery = Checkout::where('end_time', null)
            ->where('start_time', '<', Carbon::now()->subDays($holding_time)->toDateTimeString());
        $student = null;
        $book = null;

        if ($request->get('student_id')) {
            $checkoutsQuery->where('student_id', $request->get('student_id'));
            $student = User::findOrFail($request['student_id']);
        }

        if ($request->get('book_id')) {
            $checkoutsQuery->where('book_id', $request->get('book_id'));
            $book = Book::findOrFail($request['book_id']);
        }

        $checkouts = $checkoutsQuery->orderBy('id', 'desc')->paginate(8);
        if (empty($checkouts->toArray())) {
            return view('transactions.index');
        }

        $books_ids = $checkoutsQuery->pluck('book_id')->toArray();
        $student_ids = $checkoutsQuery->pluck('student_id')->toArray();
        $books = Book::whereIn('id', $books_ids)->get();
        $students = User::whereIn('id', $student_ids)->get();

        return view('transactions.checkouts.overdue',
            compact('checkouts', 'student', 'book', 'students', 'books')
        );
    }

    public function lost(Request $request)
    {
        $checkoutsQuery = Checkout::where('end_time', '!=', null)
            ->where('checkout_end_reason_id', 2);
        $student = null;
        $book = null;

        if ($request->get('student_id')) {
            $checkoutsQuery->where('student_id', $request->get('student_id'));
            $student = User::findOrFail($request['student_id']);
        }

        if ($request->get('book_id')) {
            $checkoutsQuery->where('book_id', $request->get('book_id'));
            $book = Book::findOrFail($request['book_id']);
        }

        $checkouts = $checkoutsQuery->orderBy('id', 'desc')->paginate(8);
        if (empty($checkouts->toArray())) {
            return view('transactions.index');
        }

        $books_ids = $checkoutsQuery->pluck('book_id')->toArray();
        $student_ids = $checkoutsQuery->pluck('student_id')->toArray();
        $books = Book::whereIn('id', $books_ids)->get();
        $students = User::whereIn('id', $student_ids)->get();

        return view('transactions.checkouts.lost',
            compact('checkouts', 'student', 'book', 'students', 'books')
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

        return view('transactions.checkouts.create',
            compact('book', 'students', 'holding_time', 'end_date')
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
            $inputs['start_time'] = Carbon::parse(now());
            $checkout = Checkout::create($inputs);

            $book->update(['checkouts_count' => ++$book->checkouts_count]);

            Activity::create([
                'book_id' => $inputs['book_id'],
                'student_id' => $inputs['student_id'],
                'librarian_id' => $inputs['checkout_librarian_id'],
                'time' => Carbon::now()->format('Y-m-d H:i'),
                'type' => 'Checkout',
                'activity_id' => $checkout['id']
            ]);
        });

        return redirect()->route('books.index');
    }

    public function checkIn(Checkout $checkout)
    {
        DB::transaction(function () use ($checkout) {
            $checkout->update([
                'end_time' => Carbon::parse(now()),
                'checkin_librarian_id' => auth()->id(),
                'checkout_end_reason_id' => 1
            ]);

            $book = Book::findOrFail($checkout['book_id']);
            $book->update(['checkouts_count' => --$book->checkouts_count]);

            Activity::create([
                'book_id' => $checkout['book_id'],
                'student_id' => $checkout['student_id'],
                'librarian_id' => $checkout['checkin_librarian_id'],
                'time' => Carbon::now()->format('Y-m-d H:i'),
                'type' => 'Checkin',
                'activity_id' => $checkout['id']
            ]);
        });

        return redirect()->route('checkouts.index');
    }

    public function writeOff(Checkout $checkout)
    {
        if ($checkout->end_date)
            return redirect()->route('checkouts.index'); // Prevents writing off checked in books

        DB::transaction(function () use ($checkout) {
            $checkout->update([
                'end_time' => Carbon::parse(now()),
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
                'time' => Carbon::now()->format('Y-m-d H:i'),
                'type' => 'Lost Book',
                'activity_id' => $checkout['id']
            ]);
        });

        return redirect()->route('checkouts.index');
    }
}
