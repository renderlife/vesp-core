<?php

namespace Vesp\Controllers\Security;

use Psr\Http\Message\ResponseInterface;
use Vesp\Controllers\Controller;
use Vesp\Helpers\Jwt;
use Vesp\Models\User;

class Login extends Controller
{
    /**
     * @return ResponseInterface
     */
    public function post()
    {
        $username = trim($this->getProperty('username'));
        $password = trim($this->getProperty('password'));

        /** @var User $user */
        if ($user = User::query()->where('username', $username)->first()) {
            if ($user->verifyPassword($password)) {
                return !$user->active
                    ? $this->failure('This user is not active', 403)
                    : $this->success(['token' => Jwt::makeToken($user->id)]);
            }
        }

        return $this->failure('Wrong username or password', 422);
    }
}