<?php

namespace ReesMcIvor\Staff\Tests\Feature;

use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use ReesMcIvor\Labels\Models\Label;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_with_role_can_be_retrieved()
    {
        $role1 = Role::factory(['name' => 'Customer'])->create();
        $user1 = User::factory(['role_id' => $role1->id, 'name' => 'Customer Name'])->create();

        $role2 = Role::factory(['name' => 'Staff'])->create();
        $user2 = User::factory(['role_id' => $role2->id, 'name' => 'Staff Name'])->create();
        $profile2 = Profile::factory(['user_id' => $user2->id, 'show_on_app' => 1])->create();


        $this->actingAs($user1);

        $this->get('/api/users/role/staff')->assertJsonStructure([
            'data' => [[
                'name'
            ]]
        ]);

    }
}