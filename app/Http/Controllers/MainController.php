<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Employee;
use App\Models\Material;
use App\Models\Score;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('home', [
            'materials' => Material::all(),
            'materials_trashed' => Material::onlyTrashed()->get()->count(),
            'materials_count' => Material::all()->count(),
            'scores' => Score::all(),
            'scores_count' => Score::all()->count(),
            'employees' => Employee::all(),
            'employees_count' => Employee::all()->count(),
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function review()
    {
        $reviews = new Contact();

        return view('review', ['reviews' => $reviews->all()]);
    }


    public function review_check(Request $request): RedirectResponse
    {
       $request->validate([
            'email' => 'required|min:4|max:100',
            'subject' => 'required|min:4|max:100',
            'message' => 'required|min:15|max:500',
        ]);

        $review = new Contact();

        $review->email = $request->input('email');
        $review->subject = $request->input('subject');
        $review->message = $request->input('message');

        $review->save();

        return redirect()->route('review');
    }
}
