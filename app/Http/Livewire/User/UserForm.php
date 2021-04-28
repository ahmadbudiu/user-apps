<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\UserRole;
use Laravel\Jetstream\Jetstream;
use Livewire\Component;

class UserForm extends Component
{
    protected $user;
    public $userId;
    public $method = 'POST';
    public $roleName;
    public $roles;

    protected $listeners = ['roleAdded', 'errorOnRoleAdded'];

    public function render()
    {
        $this->user = ($this->userId != null) ? User::find($this->userId) : collect([])->first();
        $this->roles = UserRole::pluck('name')->toArray();
        return view('livewire.user.user-form', [
            'roles' => $this->roles,
            'user' => $this->user,
            'method' => $this->method,
        ]);
    }

    public function addNewRole()
    {
        if (empty($this->roleName)) {
            $this->emit('errorOnRoleAdded', 'Role name can not be empty');
        } else {
            $role = UserRole::where('name', $this->roleName)->first();
            if (! empty($role)) {
                $this->emit('errorOnRoleAdded', 'Role is exist');
            } else {
                UserRole::create([
                    'name' => $this->roleName,
                ]);
                $this->emit('roleAdded');
            }
        }
    }

    public function roleAdded()
    {
        //
    }

    public function errorOnRoleAdded()
    {
        //
    }
}
