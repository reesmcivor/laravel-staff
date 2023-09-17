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
        $role = Role::factory(['name' => 'Customer'])->create();
        $user = User::factory(['role_id' => $role->id, 'name' => 'Customer Name'])->create();

        $role = Role::factory(['name' => 'Staff'])->create();
        $user = User::factory(['role_id' => $role->id, 'name' => 'Staff Name'])->create();

        $this->blade("<x-staff-grid />")
            ->assertSee($user->name);
        /*
        $response = $this->get('/staff');
        $response->assertStatus(200);
        $response->assertSee($user->name);
        */
    }
}