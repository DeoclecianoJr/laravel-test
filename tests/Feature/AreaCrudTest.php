<?php

namespace Tests\Feature;

use App\Models\Area;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AreaCrudTest extends TestCase
{
    use RefreshDatabase;

    /** @return array<string, mixed> */
    private function payload(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Financeiro',
            'description' => 'Contas a pagar e receber',
            'active' => '1',
        ], $overrides);
    }

    public function test_index_lists_areas(): void
    {
        $area = Area::factory()->create(['name' => 'Recursos Humanos']);

        $this->get(route('areas.index'))
            ->assertOk()
            ->assertSee($area->name);
    }

    public function test_create_form_is_displayed(): void
    {
        $this->get(route('areas.create'))->assertOk();
    }

    public function test_store_creates_area(): void
    {
        $this->post(route('areas.store'), $this->payload())
            ->assertRedirect(route('areas.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('areas', ['name' => 'Financeiro', 'active' => true]);
    }

    public function test_store_without_active_checkbox_saves_inactive(): void
    {
        $this->post(route('areas.store'), $this->payload(['active' => null]))
            ->assertRedirect(route('areas.index'));

        $this->assertDatabaseHas('areas', ['name' => 'Financeiro', 'active' => false]);
    }

    public function test_show_and_edit_are_displayed(): void
    {
        $area = Area::factory()->create();

        $this->get(route('areas.show', $area))->assertOk()->assertSee($area->name);
        $this->get(route('areas.edit', $area))->assertOk()->assertSee($area->name);
    }

    public function test_update_changes_area(): void
    {
        $area = Area::factory()->create();

        $this->put(route('areas.update', $area), $this->payload(['name' => 'Novo nome']))
            ->assertRedirect(route('areas.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('areas', ['id' => $area->id, 'name' => 'Novo nome']);
    }

    public function test_destroy_deletes_area(): void
    {
        $area = Area::factory()->create();

        $this->delete(route('areas.destroy', $area))
            ->assertRedirect(route('areas.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseMissing('areas', ['id' => $area->id]);
    }

    public function test_store_rejects_invalid_data(): void
    {
        $this->post(route('areas.store'), $this->payload(['name' => '']))
            ->assertSessionHasErrors(['name']);

        $this->assertDatabaseCount('areas', 0);
    }

    public function test_update_rejects_invalid_data(): void
    {
        $area = Area::factory()->create();

        $this->put(route('areas.update', $area), $this->payload(['name' => str_repeat('a', 256)]))
            ->assertSessionHasErrors(['name']);
    }
}
