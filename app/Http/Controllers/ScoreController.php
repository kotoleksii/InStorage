<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Services\ValidationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ScoreController extends Controller
{
    public function getAll()
    {
        return Score::all();
    }

    public function get(Score $score): Score
    {
        return $score;
    }

    /**
     * @throws ValidationException
     */
    public function create(ValidationService $validationService)
    {
        return Score::create($validationService->check('score_create'));
    }

    /**
     * @throws ValidationException
     */
    public function patch(Score $score, ValidationService $validationService): JsonResponse
    {
        // TODO:
        $score->update($validationService->check('score_patch'));

        return response()->json('', Response::HTTP_NO_CONTENT);
    }

    public function delete(Score $score): JsonResponse
    {
        if($score->exists())
            return response()->json('', Response::HTTP_UNPROCESSABLE_ENTITY);

        $score->delete();

        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
