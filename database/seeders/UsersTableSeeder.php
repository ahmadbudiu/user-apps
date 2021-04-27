<?php

namespace Database\Seeders;

use App\Actions\Jetstream\AddTeamMember;
use App\Actions\Jetstream\CreateTeam;
use App\Models\Team;
use App\Models\User;
use App\Traits\JsonSeeder;
use Illuminate\Database\Seeder;
use Laravel\Jetstream\Jetstream;

class UsersTableSeeder extends Seeder
{
    use JsonSeeder;

    public function __construct()
    {
        $this->path = 'jsons/seeders/users.json';
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->runSeeder();
    }

    public function seed()
    {
        foreach ($this->jsonData as $row) {
            $user = new User();
            $user->name = $row->name;
            $user->email = $row->email;
            $user->password = bcrypt($row->password);
            $user->save();
            $user->markEmailAsVerified();

            $team = Team::where('name', $row->team)->first();
            if (empty ($team)) {
                (new CreateTeam())->create($user, ['name' => $row->team]);
            } else {
                (new AddTeamMember())->add($team->owner, $team, $row->email, $row->role);
            }
        }
    }
}
