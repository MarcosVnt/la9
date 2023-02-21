<?php

namespace Tests\Feature;

use App\Http\Livewire\ProductDelete;
use App\Models\Category;
use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteProductTest extends TestCase
{
   

    use RefreshDatabase;

    /** @test */
    public function deleting_an_product_works_when_user_is_admin()
    {
        $user = User::factory()->admin()->create();

        $category = Category::factory()->create();

        $product = Product::factory()->create();

        Livewire::actingAs($user)
            ->test(ProductDelete::class, [
                'product' => $product,
            ])
            ->call('deleteProduct')
            ->assertRedirect(route('product.index'));

        $this->assertEquals(0, Product::count());
    }

}
