<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if (! $request->user()->tokenCan('read.user')) {
            return ResponseHelper::json(false, 403, 'You\'re not authorized to access this resource');
        }
        $users = User::all();
        return ResponseHelper::json(UserResource::collection($users), 200);
    }

    public function whoAmI(Request $request)
    {
        return ResponseHelper::json(new UserResource($request->user()), 200);
    }
}
