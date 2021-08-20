<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Material;
use App\Models\Score;
use App\Services\ValidationService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class EmployeeController extends Controller
{
    public function get_web()
    {
        return view('employee', [
            'employees' => $this->getAll(),
            'materials' => Material::all(),
            'scores' => Score::all(),
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function create_web(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => 'required|min:2|max:30',
            'last_name' => 'required|min:2|max:30',
            'post' => 'required|min:4|max:30',
        ]);

        $employee = new Employee;

        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->post = $request->input('post');

        $full_name = $employee->first_name . ' ' . $employee->last_name;
        $description = $full_name . ' - ' . $employee->post;

        $employee->description = $description;

        $employee->save();

        return Redirect::back()->withErrors(["Employee $employee->description created"]);
    }

    public function update_web(Request $request): RedirectResponse
    {
        $updateEmployee = [
            'id' => $request->input('employee_id'),
            'first_name' => $request->input('first_name'),
            'last_name' =>  $request->input('last_name'),
            'post' => $request->input('post'),
            'description' => "{$request->input('first_name')} {$request->input('last_name')} - {$request->input('post')}",
        ];

        Employee::where('id', $request->input('employee_id'))->update($updateEmployee);

        return back()->withErrors("Employee {$request->input('employee_id')} updated");
    }

    public function delete_web(Request $request): RedirectResponse
    {
        $employee = Employee::findOrFail($request->input('employee_id'));
        $employee->delete();

        return back()->withErrors("Employee {$request->input('employee_id')} deleted");
    }

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
