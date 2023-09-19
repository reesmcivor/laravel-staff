<?php

namespace ReesMcIvor\Staff\Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use ReesMcIvor\Labels\Models\Label;

class GridTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_grid_of_users_can_be_displayed()
    {
        $role = Role::factory(['id' => 3, 'name' => 'Customer'])->create();
        $user = User::factory(['role_id' => $role->id, 'name' => 'Customer Name'])->create();

        $role2 = Role::factory(['id' => 2, 'name' => 'Staff'])->create();
        $user2 = User::factory(['role_id' => $role2->id, 'name' => 'Staff Name'])->create();

        $this->blade("<x-staff-grid />")
            ->assertSee($user2->name);
        /*
        $response = $this->get('/staff');
        $response->assertStatus(200);
        $response->assertSee($user->name);
        */
    }
}