<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EventStartRequest;
use App\Models\Event;
use App\Models\Session;
use App\Models\User;
use App\Services\Wot\ApiErrorService;
use App\Services\Wot\ApiService;
use App\Services\Wot\BattleService;
use App\Services\Wot\EventService;
use App\Services\Wot\SessionService;
use App\Services\Wot\UserService;
use App\Services\Wot\WotApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function test(Request $request)
    {
        return 'Test';
    }

    public function createToken(Request $request)
    {
        $token = $request->user()->createToken($request->token_name);
        $data = ['api_token' => $token->plainTextToken];
        return $this->ok($data);
    }

    protected function ok(array $data = [])
    {
        $response = [
            'status' => 'ok',
        ];

        if ($data) {
            $response['data'] = $data;
        }

        return response($response, 200);
    }
}
