<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Productos;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductosControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            factory(User::class)->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_all_productos()
    {
        $allProductos = factory(Productos::class, 5)->create();

        $response = $this->get(route('all-productos.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_productos.index')
            ->assertViewHas('allProductos');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_productos()
    {
        $response = $this->get(route('all-productos.create'));

        $response->assertOk()->assertViewIs('app.all_productos.create');
    }

    /**
     * @test
     */
    public function it_stores_the_productos()
    {
        $data = factory(Productos::class)
            ->make()
            ->toArray();

        $response = $this->post(route('all-productos.store'), $data);

        $this->assertDatabaseHas('productos', $data);

        $productos = Productos::latest('id')->first();

        $response->assertRedirect(route('all-productos.edit', $productos));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_productos()
    {
        $productos = factory(Productos::class)->create();

        $response = $this->get(route('all-productos.show', $productos));

        $response
            ->assertOk()
            ->assertViewIs('app.all_productos.show')
            ->assertViewHas('productos');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_productos()
    {
        $productos = factory(Productos::class)->create();

        $response = $this->get(route('all-productos.edit', $productos));

        $response
            ->assertOk()
            ->assertViewIs('app.all_productos.edit')
            ->assertViewHas('productos');
    }

    /**
     * @test
     */
    public function it_updates_the_productos()
    {
        $productos = factory(Productos::class)->create();

        $data = [
            'nombre' => $this->faker->text(255),
            'precio' => $this->faker->text(255),
            'imagen' => $this->faker->text(255),
            'observacion' => $this->faker->text,
        ];

        $response = $this->put(
            route('all-productos.update', $productos),
            $data
        );

        $data['id'] = $productos->id;

        $this->assertDatabaseHas('productos', $data);

        $response->assertRedirect(route('all-productos.edit', $productos));
    }

    /**
     * @test
     */
    public function it_deletes_the_productos()
    {
        $productos = factory(Productos::class)->create();

        $response = $this->delete(route('all-productos.destroy', $productos));

        $response->assertRedirect(route('all-productos.index'));

        $this->assertDeleted($productos);
    }
}
