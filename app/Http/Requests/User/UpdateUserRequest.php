<?php

namespace App\Http\Requests\User;

class UpdateUserRequest extends CreateUserRequest
{
    public function validated()
    {
        $params = parent::validated();
        if (isset($params['password'])) {
            unset($params['password']);
        }
        return $params;
    }
}
