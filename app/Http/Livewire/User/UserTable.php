<?php

namespace App\Http\Livewire\User;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $perPage = 10;

    public function render()
    {
        $users = User::paginate($this->perPage);
        $team = Team::first();
        $startNumber = ($this->perPage * ($this->resolvePage() - 1)) + 1;
        return view('livewire.user.user-table', ['users' => $users, 'team' => $team, 'startNumber' => $startNumber]);
    }

    public function delete($userId)
    {
        Gate::authorize('delete', User::class);
        $user = User::find($userId);
        if (! empty($user)) {
            $user->delete();
        }
    }
}
