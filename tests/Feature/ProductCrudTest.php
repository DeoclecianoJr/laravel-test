<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    /** @return array<string, mixed> */
    private function payload(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Teclado',
            'description' => 'Mecânico',
            'price' => '199.90',
            'stock' => 10,
        ], $overrides);
    }

    public function test_index_lists_products(): void
    {
        $product = Product::factory()->create(['name' => 'Mouse Gamer']);

        $this->get(route('products.index'))
            ->assertOk()
            ->assertSee($product->name);
    }

    public function test_create_form_is_displayed(): void
    {
        $this->get(route('products.create'))->assertOk();
    }

    public function test_store_creates_product(): void
    {
        $this->post(route('products.store'), $this->payload())
            ->assertRedirect(route('products.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('products', ['name' => 'Teclado', 'price' => '199.90', 'stock' => 10]);
    }

    public function test_show_and_edit_are_displayed(): void
    {
        $product = Product::factory()->create();

        $this->get(route('products.show', $product))->assertOk()->assertSee($product->name);
        $this->get(route('products.edit', $product))->assertOk()->assertSee($product->name);
    }

    public function test_update_changes_product(): void
    {
        $product = Product::factory()->create();

        $this->put(route('products.update', $product), $this->payload(['name' => 'Novo nome']))
            ->assertRedirect(route('products.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('products', ['id' => $product->id, 'name' => 'Novo nome']);
    }

    public function test_destroy_deletes_product(): void
    {
        $product = Product::factory()->create();

        $this->delete(route('products.destroy', $product))
            ->assertRedirect(route('products.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_store_rejects_invalid_data(): void
    {
        $this->post(route('products.store'), $this->payload(['name' => '', 'price' => -1, 'stock' => -5]))
            ->assertSessionHasErrors(['name', 'price', 'stock']);

        $this->assertDatabaseCount('products', 0);
    }

    public function test_update_rejects_invalid_data(): void
    {
        $product = Product::factory()->create();

        $this->put(route('products.update', $product), $this->payload(['stock' => 'abc']))
            ->assertSessionHasErrors(['stock']);
    }
}
