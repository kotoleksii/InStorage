<?php


namespace App\Enums;


class ValidationRules
{
    public static function get(string $rule): ?array
    {
        return self::$rules[$rule];
    }

    /**
     * Rules array
     *
     * @var string[][]
     */
    private static $rules = [

        'employee_create' => [
            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',
            'post' => 'sometimes|max:255',
            'description' => 'sometimes|max:255',
        ],

        'employee_patch' => [
            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',
            'post' => 'sometimes|max:255',
            'description' => 'sometimes|max:255',
        ],

        'score_create' => [
            'title' => 'required|max:64',
            'description' => 'sometimes|max:255',
        ],

        'score_patch' => [
            'title' => 'sometimes|required|max:64',
            'description' => 'sometimes|max:255',
        ],

        'material_create' => [
            'title' => 'required|max:64',
            'inventory_number' => 'sometimes|max:64',
            'date_start' => 'required|date',
            'type' => 'required|max:20',
            'amount' => 'required|numeric|gt:0',
            'price' => 'required|numeric',
            'sum' => 'sometimes|max:255',
            'employee_id' => 'required|numeric|exists:App\Models\Employee,id',
            'score_id' => 'required|numeric|exists:App\Models\Score,id',
        ],

        'material_patch' => [
            'title' => 'sometimes|max:64',
            'inventory_number' => 'sometimes|max:64',
            'date_start' => 'sometimes|date',
            'type' => 'sometimes|max:20',
            'amount' => 'sometimes|numeric|gt:0',
            'price' => 'sometimes|numeric',
            'sum' => 'sometimes|max:255',
            'employee_id'    => 'sometimes|numeric|exists:App\Models\Employee,id',
            'score_id'    => 'sometimes|numeric|exists:App\Models\Score,id',
        ],
    ];
}
