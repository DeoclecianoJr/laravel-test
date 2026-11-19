<?php

namespace Tests\Feature;

use App\Models\System;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SystemCrudTest extends TestCase
{
    use RefreshDatabase;

    /** @return array<string, mixed> */
    private function payload(array $overrides = []): array
    {
        return array_merge([
            'name' => 'ERP',
            'description' => 'Sistema financeiro',
            'url' => 'https://erp.example.com',
            'active' => '1',
        ], $overrides);
    }

    public function test_index_lists_systems(): void
    {
        $system = System::factory()->create(['name' => 'CRM Interno']);

        $this->get(route('systems.index'))
            ->assertOk()
            ->assertSee($system->name);
    }

    public function test_create_form_is_displayed(): void
    {
        $this->get(route('systems.create'))->assertOk();
    }

    public function test_store_creates_system(): void
    {
        $this->post(route('systems.store'), $this->payload())
            ->assertRedirect(route('systems.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('systems', [
            'name' => 'ERP',
            'url' => 'https://erp.example.com',
            'active' => true,
        ]);
    }

    public function test_store_without_checkbox_creates_inactive_system(): void
    {
        $this->post(route('systems.store'), $this->payload(['active' => null]))
            ->assertRedirect(route('systems.index'));

        $this->assertDatabaseHas('systems', ['name' => 'ERP', 'active' => false]);
    }

    public function test_show_and_edit_are_displayed(): void
    {
        $system = System::factory()->create();

        $this->get(route('systems.show', $system))->assertOk()->assertSee($system->name);
        $this->get(route('systems.edit', $system))->assertOk()->assertSee($system->name);
    }

    public function test_update_changes_system(): void
    {
        $system = System::factory()->create(['active' => true]);

        $this->put(route('systems.update', $system), $this->payload(['name' => 'Novo nome', 'active' => null]))
            ->assertRedirect(route('systems.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('systems', ['id' => $system->id, 'name' => 'Novo nome', 'active' => false]);
    }

    public function test_destroy_deletes_system(): void
    {
        $system = System::factory()->create();

        $this->delete(route('systems.destroy', $system))
            ->assertRedirect(route('systems.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseMissing('systems', ['id' => $system->id]);
    }

    public function test_store_rejects_invalid_data(): void
    {
        $this->post(route('systems.store'), $this->payload(['name' => '', 'url' => 'não é url']))
            ->assertSessionHasErrors(['name', 'url']);

        $this->assertDatabaseCount('systems', 0);
    }

    public function test_update_rejects_invalid_data(): void
    {
        $system = System::factory()->create();

        $this->put(route('systems.update', $system), $this->payload(['url' => 'abc']))
            ->assertSessionHasErrors(['url']);
    }
}
