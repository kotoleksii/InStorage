<?php /** @noinspection PhpUndefinedMethodInspection */


namespace App\Services;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthService
{
    public function register(array $regData)
    {
        $regData['password'] = bcrypt($regData['password']);

        return User::create($regData);
    }

    /**
     * @param array $data
     * @return array|null
     */
    public function login(array $data): array
    {
        $user = null;
        $accessToken = null;

        if (Auth::attempt($data)) {
            /**
             * @var User $user
             */
            $user = Auth::user();

            $accessToken = $user->createToken('App')->accessToken;

        } else {
            abort(Response::HTTP_UNAUTHORIZED, 'Email password is invalid');
        }

        return [
            'user' => $user,
            'access_token' => $accessToken,
        ];
    }

    public function logout(): bool
    {
        if (Auth::check()) {
            $token = Auth::user()->token();
            $token->revoke();
            return true;
        }
        return false;
    }
}
