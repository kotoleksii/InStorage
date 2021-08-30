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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method all()
 */
class MaterialController extends Controller
{
    public function get_web()
    {
        return view('material', [
            'scores' => Score::all(),
            'employees' => Employee::all(),
            'materials' => $this->getAll(),
        ]);
    }

    public function get_overview()
    {
        return view('overview', [
            'materials' => $this->get_overview_table_data(),
            'employees' => Employee::all(),
            'scores' => Score::all(),
        ]);
    }

    public function get_overview_table_data()
    {
        return Material::
            leftJoin('employees', 'materials.employee_id', '=', 'employees.id')
            ->leftJoin('scores', 'materials.score_id', '=', 'scores.id')
            ->select('materials.*','employees.description as employee', 'scores.title as score_title')
            ->get();
    }

    /**
     * Create material on web site form
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function create_web(Request $request): RedirectResponse
    {
       $request->validate([
            'title' => 'required|min:4|max:30',
            'description' => 'sometimes|max:100',
        ]);

        $material = new Material;

        $material->title = $request->input('title');
        $material->inventory_number = $request->input('inventory_number');
        $material->date_start = date("Y-m-d",  strtotime('01-'. $request-> input('date_start')));
        $material->type = $request->input('type');
        $material->amount = $request->input('amount');
        $material->price = $request->input('price');
        $material->sum = $material->amount * $material->price;
        $material->employee_id = $request->input('employee_id');
        $material->score_id = $request->input('score_id');

//        $material->description = $request->input('description');

        $material->save();

//        return redirect()->route('material');
        return Redirect::back()->withErrors(["Material $material->title created"]);
    }

    public function show_web($id)
    {
        $data = Material::find($id);

        return view('edit', [
            'data'=>$data,
            'scores' => Score::all(),
            'employees' => Employee::all(),
        ]);
    }

    public function update_web(Request $request): RedirectResponse
    {
        $updateMaterial = [
            'id' => $request->input('material_id'),
            'title' => $request->input('title'),
            'inventory_number' =>  $request->input('inventory_number'),
            'date_start' => date("Y-m-d",  strtotime($request-> input('date_start'))),
            'price' => $request->input('price'),
            'amount' => $request->input('amount'),
            'type' => $request->input('type'),
            'sum' => $request->input('price') * $request->input('amount'),
        ];

        Material::where('id', $request->input('material_id'))->update($updateMaterial);

        return back()->withErrors("Material {$request->input('material_id')} updated");
    }

//    public function update_web(Request $request): RedirectResponse
//    {
//        $data = Material::find($request->input('id'));
//        $data->title = $request->input('title');
//        $data->inventory_number = $request->input('inventory_number');
//
//        $data->date_start = date("Y-m-d",  strtotime('01-'. $request-> input('date_start')));
////        $data->date_start = $request->date_start;
//        $data->amount = $request->input('amount');
//        $data->price = $request->input('price');
//        $data->type = $request->input('type');
//
//        $data->save();
//
//        return Redirect::back();
//
//    }

//    public function delete_web($id): RedirectResponse
//    {
//        $data = Material::find($id);
//        $data->delete();
////        return redirect()->route('home')->with('success', 'Material deleted');
//
//        return Redirect::back()->withErrors(["Material $id deleted"]);
//    }

    public function delete_web(Request $request): RedirectResponse
    {
        $material = Material::findOrFail($request->input('material_id'));
        $material->delete();

        return back()->withErrors("Material {$request->input('material_id')} deleted");
    }

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
