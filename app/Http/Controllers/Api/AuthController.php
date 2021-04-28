<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateTokenRequest;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function createToken(CreateTokenRequest $request)
    {
        if (isset($request->errors)) {
            return ResponseHelper::json($request->errors, 500);
        }

        /** @var User $user */
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return ResponseHelper::json(false, 500, 'Invalid email or password');
        }

        if (! $request->has('device_name')) {
            $request->device_name = 'default_device';
        }

        $permissions = $user->teamPermissions(Team::defaultTeam());
        $token = $user->createToken($request->device_name, $permissions)->plainTextToken;
        return ResponseHelper::json($token, 200);
    }
}
