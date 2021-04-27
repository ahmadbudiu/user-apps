<?php

namespace App\Http\Requests\User;

use App\Models\Team;

class UpdateUserRequest extends CreateUserRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasTeamPermission(Team::defaultTeam(), 'update.user');
    }

    public function validated()
    {
        $params = parent::validated();
        if (isset($params['password'])) {
            unset($params['password']);
        }
        return $params;
    }
}
