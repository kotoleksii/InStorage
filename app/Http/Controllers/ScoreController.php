<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Material;
use App\Models\Score;
use App\Services\ValidationService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ScoreController extends Controller
{
    public function score()
    {
        return view('score', [
            'scores' => $this->getAll(),
            'employees' => Employee::all(),
            'materials' => Material::all()
        ]);
    }

    public function score_check(Request $request): RedirectResponse
    {
        $valid = $request->validate([
            'title' => 'required|min:4|max:30',
            'description' => 'sometimes|max:100',
        ]);

        $score = new Score();

        $score->title = $request->input('title');
        $score->description = $request->input('description');

        $score->save();

        return redirect()->route('score');
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

    public function web_delete($id): RedirectResponse
    {
        $data = Score::find($id);
        $data->delete();
        return redirect()->route('score');
    }
}
