<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Employee;
use App\Models\Material;
use App\Models\Score;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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
            'employee_last_month_count' => $this->lastMonthEmployeeData(),
            'hot_score_title' => $this->getPopularScoreTitle(),
            'hot_score_items' => $this->getPopularValueInColumn('materials', 'score_id')[0]->items,
        ]);
    }

    public function lastMonthEmployeeData()
    {
        $fromDate = Carbon::now()->subMonth()->startOfMonth()->toDateString();
        $tillDate = Carbon::now()->subMonth()->endOfMonth()->toDateString();

        return Employee::whereBetween('created_at', [$fromDate, $tillDate])->get()->count();
    }

    public function getPopularValueInColumn(string $table, string $column): Collection
    {
        return DB::table($table)
            ->select($column, DB::raw("COUNT($column) as items"))
            ->groupBy($column)
            ->orderByRaw('items DESC')
            ->limit(1)->whereNull('deleted_at')->get();
    }

    public function getPopularScoreTitle()
    {
        $scoreIdMaxDuplicatedCount = Score::all()->where('id', $this->getPopularValueInColumn('materials', 'score_id')[0]->score_id);

        $score_title_hot = '';
        foreach ($scoreIdMaxDuplicatedCount as $sc) {
            $score_title_hot = $sc->title;
        }

        return $score_title_hot;
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
