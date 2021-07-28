<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Services\ValidationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    public function getAll()
    {
        return Employee::all();
    }

    public function get(Employee $employee): Employee
    {
        return $employee;
    }

    /**
     * @throws ValidationException
     */
    public function create(ValidationService $validationService)
    {
        return Employee::create($validationService->check('employee_create'));
    }

    /**
     * @throws ValidationException
     */
    public function patch(Employee $employee, ValidationService $validationService): JsonResponse
    {
        // TODO:
        $employee->update($validationService->check('employee_patch'));

        return response()->json('', Response::HTTP_NO_CONTENT);
    }

    public function delete(Employee $employee): JsonResponse
    {
        if(!$employee->exists())
            return response()->json('', Response::HTTP_UNPROCESSABLE_ENTITY);

        $employee->delete();

        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
