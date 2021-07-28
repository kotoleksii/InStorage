<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Services\ValidationService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class MaterialController extends Controller
{
    /**
     * Get all Materials
     * @return Material[]|Collection
     */
    public function getAll()
    {
        return Material::all();
    }

    /**
     * Get Material by id
     * @param Material $material
     * @return Material
     */
    public function get(Material $material): Material
    {
        return $material;
    }

    /**
     * Create a new Material
     * @param ValidationService $validationService
     * @return mixed
     * @throws ValidationException
     */
    public function create(ValidationService $validationService)
    {
        return Material::create($validationService->check('material_create'));
    }

    /**
     * Update Material by id
     * @param Material $material
     * @param ValidationService $validationService
     * @return JsonResponse
     * @throws ValidationException
     */
    public function patch(Material $material, ValidationService $validationService): JsonResponse
    {
        // TODO:
        $material->update($validationService->check('material_patch'));

        return response()->json('', Response::HTTP_NO_CONTENT);
    }

    /**
     * Delete Material by id
     * @param Material $material
     * @return JsonResponse
     */
    public function delete(Material $material): JsonResponse
    {
        if(!$material->exists())
            return response()->json('', Response::HTTP_UNPROCESSABLE_ENTITY);

        $material->delete();

        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
