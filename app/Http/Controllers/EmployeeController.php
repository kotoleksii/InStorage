<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Services\ValidationService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    /**
     * Get all Employees
     * @return Employee[]|Collection
     */
    public function getAll()
    {
        return Employee::all();
    }

    /**
     * Get Employee by id
     * @param Employee $employee
     * @return Employee
     */
    public function get(Employee $employee): Employee
    {
        return $employee;
    }

    /**
     * Create a new Employee
     * @param ValidationService $validationService
     * @return mixed
     * @throws ValidationException
     */
    public function create(ValidationService $validationService)
    {
        return Employee::create($validationService->check('employee_create'));
    }

    /**
     * Update Employee by id
     * @param Employee $employee
     * @param ValidationService $validationService
     * @return JsonResponse
     * @throws ValidationException
     */
    public function patch(Employee $employee, ValidationService $validationService): JsonResponse
    {
        // TODO:
        $employee->update($validationService->check('employee_patch'));

        return response()->json('', Response::HTTP_NO_CONTENT);
    }

    /**
     * Delete Employee by id
     * @param Employee $employee
     * @return JsonResponse
     */
    public function delete(Employee $employee): JsonResponse
    {
        if(!$employee->exists())
            return response()->json('', Response::HTTP_UNPROCESSABLE_ENTITY);

        $employee->delete();

        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
