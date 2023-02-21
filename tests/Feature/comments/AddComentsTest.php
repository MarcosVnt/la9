<?php

namespace Tests\Feature\comments;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddComentsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function add_comment_livewire_component_renders()
    {
        $idea = Product::factory()->create();

        $response = $this->get(route('product.show', $idea));

        $response->assertSeeLivewire('add-movement');
    }


    
}
