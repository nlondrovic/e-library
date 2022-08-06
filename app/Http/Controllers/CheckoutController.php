<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCheckoutRequest;
use App\Models\Book;
use App\Models\Checkout;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkouts()
    {
        $checkouts = Checkout::where('end_time', null)->get();
        return view('master.transactions.checkouts.index', compact('checkouts'));
    }

    public function checkins()
    {
        $checkouts = Checkout::where('end_time', '!=', null)->get();
        return view('master.transactions.checkouts.checkins', compact('checkouts'));
    }

    public function overdue()
    {
        $checkouts = Checkout::where('start_time', '<', Carbon::now()->subDays(20)->toDateTimeString())
            ->where('end_time', null)
            ->get();

        return view('master.transactions.checkouts.overdue', compact('checkouts'));
    }

    public function lost()
    {
        $checkouts = Checkout::where('end_time', '!=', null)
            ->where('checkout_end_reason_id', 2)->get();
        return view('master.transactions.checkouts.lost', compact('checkouts'));
    }

    public function show(Checkout $checkout)
    {
        return view('master.transactions.checkouts.show', compact('checkout'));
    }

    public function create(Request $request)
    {
        $book = Book::findOrFail($request['book']);
        $students = User::where('role_id', 3)->get();
        return view('master.transactions.checkouts.create', compact('book', 'students'));
    }

    public function store(StoreCheckoutRequest $request)
    {
        $book = Book::findOrFail($request['book_id']);
        if ($book->available_count <= 0) {
            return redirect()->back()->withErrors([
                'message' => 'All copies of this book are checked out or reserved.'
            ]);
        }

        $inputs = $request->validated();
        $inputs['start_time'] = Carbon::parse(now());
        Checkout::create($inputs);

        $book->update(['checkouts_count' => ++$book->checkouts_count]);

        return redirect()->route('books.index');
    }

    public function checkIn($id)
    {
        $checkout = Checkout::findOrFail($id);
        $checkout->update([
            'end_time' => date("Y-m-d H:i:s", strtotime("now")),
            'checkin_librarian_id' => auth()->id(),
            'checkout_end_reason_id' => 1
        ]);

        $book = Book::findOrFail($checkout['book_id']);
        $book->update([
            'checkouts_count' => --$book->checkouts_count
        ]);

        return redirect()->route('checkouts.index');
    }

    public function writeOff($id)
    {
        $checkout = Checkout::findOrFail($id);
        if ($checkout->end_date)
            return redirect()->route('checkouts.index'); // Prevents writing off checked in books

        $checkout->update([
            'end_time' => date("Y-m-d H:i:s", strtotime("now")),
            'checkin_librarian_id' => auth()->id(),
            'checkout_end_reason_id' => 2
        ]);

        $book = Book::findOrFail($checkout->book_id);
        $book->update([
            'total_count' => --$book->total_count,
            'checkouts_count' => --$book->checkouts_count
        ]);

        return redirect()->route('checkouts.index');
    }
}
