<?php

namespace App\Http\Controllers;

use App\Actions\Jetstream\AddTeamMember;
use App\Actions\Jetstream\RemoveTeamMember;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Team;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $params = $request->validated();
        $user = User::create($params);
        $team = Team::defaultTeam();
        (new AddTeamMember())->add($team->owner, $team, $user->email, $params['role']);
        return redirect()->route('user.index');
    }

    public function edit($userId)
    {
        return view('users.edit', ['userId' => $userId]);
    }

    public function update(UpdateUserRequest $request, $userId)
    {
        $params = $request->validated();
        $user = User::find($userId);
        $user->update($params);
        $team = Team::defaultTeam();
        (new RemoveTeamMember())->remove($team->owner, $team, $user);
        (new AddTeamMember())->add($team->owner, $team, $user->email, $params['role']);
        return redirect()->route('user.index');
    }
}
