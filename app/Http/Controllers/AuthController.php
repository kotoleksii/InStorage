<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Services\ValidationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    private $validationService;

    private $authService;

    public function __construct (ValidationService $validationService, AuthService $authService)
    {
        $this->validationService = $validationService;
        $this->authService = $authService;
    }

    /**
     * @throws ValidationException
     */
    public function signUp()
    {
        $validated = $this->validationService->check('signup');

        return $this->authService->register($validated);
    }

    /**
     * @throws ValidationException
     */
    public function signIn(): JsonResponse
    {
        $validated = $this->validationService->check('signin');

        $results = $this->authService->login($validated);

        return response()->json($results);
    }

    public function signOut()
    {
        if($this->authService->logout())
            return response();

        return response('', 401);
    }

    public function signOutFromAll()
    {
        dd('signOutFromAll');
    }
}
