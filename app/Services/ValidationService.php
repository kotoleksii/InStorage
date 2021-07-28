<?php


namespace App\Services;


use App\Enums\ValidationRules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ValidationService
{
    /**
     * @throws ValidationException
     */
    public function check($rule, array $data = null): array
    {
        // TODO: request()->input() має все, окрім форми
        $data = $data ?? request()->input();

        $rules = ValidationRules::get($rule);

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            abort(Response::HTTP_UNPROCESSABLE_ENTITY, $validator->errors());
        }

        return $validator->validated();
    }
}
