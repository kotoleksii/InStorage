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
            'post'   => 'sometimes|max:255',
            'description'   => 'sometimes|max:255',
        ],

        'employee_patch' => [
            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',
            'post'   => 'sometimes|max:255',
            'description'   => 'sometimes|max:255',
        ],

        'score_create' => [
            'title' => 'required|max:64',
            'description'   => 'sometimes|max:255',
        ],

        'score_patch' => [
            'title' => 'sometimes|required|max:64',
            'description'   => 'sometimes|max:255',
        ],
    ];
}
