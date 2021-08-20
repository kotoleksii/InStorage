<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Services\ValidationService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ScoreController extends Controller
{
    public function get_web()
    {
        return view('score', [
            'scores' => $this->getAll(),
        ]);
    }

    public function create_web(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|min:4|max:30',
            'description' => 'sometimes|min:10|max:255',
        ]);

        $score = new Score;

        $score->title = $request->input('title');
        $score->description = $request->input('description');

        $score->save();

        return Redirect::back()->withErrors(["Score $score->title created"]);
    }

    public function update_web(Request $request): RedirectResponse
    {
        $updateScore = [
            'id' => $request->input('score_id'),
            'title' => $request->input('title'),
            'description' =>  $request->input('description'),
        ];

        Score::where('id', $request->input('score_id'))->update($updateScore);

        return back()->withErrors("Score {$request->input('score_id')} updated");
    }

    public function delete_web(Request $request): RedirectResponse
    {
        $score = Score::findOrFail($request->input('score_id'));
        $score->delete();

        return back()->withErrors("Score {$request->input('score_id')} deleted");
    }

    /**
     * Get all Scores
     * @return Score[]|Collection
     */
    public function getAll()
    {
        return Score::all();
    }

    /**
     * Get Score by id
     * @param Score $score
     * @return Score
     */
    public function get(Score $score): Score
    {
        return $score;
    }

    /**
     * Create a new Score
     * @param ValidationService $validationService
     * @return mixed
     * @throws ValidationException
     */
    public function create(ValidationService $validationService)
    {
        return Score::create($validationService->check('score_create'));
    }
    /**
     * Update Score by id
     * @param Score $score
     * @param ValidationService $validationService
     * @return JsonResponse
     * @throws ValidationException
     */
    public function patch(Score $score, ValidationService $validationService): JsonResponse
    {
        // TODO:
        $score->update($validationService->check('score_patch'));

        return response()->json('', Response::HTTP_NO_CONTENT);
    }

    /**
     * Delete Score by id
     * @param Score $score
     * @return JsonResponse
     */
    public function delete(Score $score): JsonResponse
    {
        if(!$score->exists())
            return response()->json('', Response::HTTP_UNPROCESSABLE_ENTITY);

        $score->delete();

        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
