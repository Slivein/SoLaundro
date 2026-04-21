<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_welcome_page_is_public_when_maintenance_is_off(): void
    {
        config()->set('app.laundry_maintenance', false);

        $this->get('/dashboard')
            ->assertOk()
            ->assertSee('Laundry made simple');
    }

    public function test_member_routes_redirect_guests_to_login(): void
    {
        config()->set('app.laundry_maintenance', false);

        $this->get('/dashboard/home')
            ->assertRedirectToRoute('login');
    }

    public function test_authenticated_member_can_open_orders_page(): void
    {
        config()->set('app.laundry_maintenance', false);

        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/dashboard/orders')
            ->assertOk()
            ->assertSee('Your laundry orders');
    }

    public function test_maintenance_mode_blocks_dashboard_routes(): void
    {
        config()->set('app.laundry_maintenance', true);

        $this->get('/dashboard')
            ->assertStatus(503)
            ->assertSee('temporarily paused');
    }
}
