<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Services\ValidationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class MaterialController extends Controller
{
    public function getAll()
    {
        return Material::all();
    }

    public function get(Material $material): Material
    {
        return $material;
    }

    /**
     * @throws ValidationException
     */
    public function create(ValidationService $validationService)
    {
        return Material::create($validationService->check('material_create'));
    }

    /**
     * @throws ValidationException
     */
    public function patch(Material $material, ValidationService $validationService): JsonResponse
    {
        // TODO:
        $material->update($validationService->check('material_patch'));

        return response()->json('', Response::HTTP_NO_CONTENT);
    }

    public function delete(Material $material): JsonResponse
    {
        if(!$material->exists())
            return response()->json('', Response::HTTP_UNPROCESSABLE_ENTITY);

        $material->delete();

        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
