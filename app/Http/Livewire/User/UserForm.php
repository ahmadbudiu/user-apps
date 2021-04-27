<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Laravel\Jetstream\Jetstream;
use Livewire\Component;

class UserForm extends Component
{
    protected $user;
    public $userId;
    public $method = 'POST';

    public function render()
    {
        $this->user = ($this->userId != null) ? User::find($this->userId) : collect([])->first();
        $roles = array_keys(Jetstream::$roles);
        return view('livewire.user.user-form', [
            'roles' => $roles,
            'user' => $this->user,
            'method' => $this->method,
        ]);
    }
}
