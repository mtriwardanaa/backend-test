<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Psr\Http\Message\ServerRequestInterface;
use Laravel\Passport\Http\Controllers\AccessTokenController as PassportAccessTokenController;
use App\Helper\Wrapper;

class TokenApi extends PassportAccessTokenController
{
    public function __construct(
        \League\OAuth2\Server\AuthorizationServer $server,
        \Laravel\Passport\TokenRepository $tokens
    )
    {
        $this->server = $server;
        $this->tokens = $tokens;
    }


    public function generateToken(ServerRequestInterface $token, Request $request)
    {
        try {
            $tokenResponse = parent::issueToken($token);
            $data = json_decode($tokenResponse->getContent(), true);

            return Wrapper::data($data, 'Generate token login berhasil');
        } catch (\Throwable $th) {
            return Wrapper::errorFetch($th);
        }
    }
}
