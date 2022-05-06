<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Ciudades;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CiudadesControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_ciudades()
    {
        $allCiudades = factory(Ciudades::class, 5)->create();

        $response = $this->get(route('all-ciudades.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_ciudades.index')
            ->assertViewHas('allCiudades');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_ciudades()
    {
        $response = $this->get(route('all-ciudades.create'));

        $response->assertOk()->assertViewIs('app.all_ciudades.create');
    }

    /**
     * @test
     */
    public function it_stores_the_ciudades()
    {
        $data = factory(Ciudades::class)
            ->make()
            ->toArray();

        $response = $this->post(route('all-ciudades.store'), $data);

        $this->assertDatabaseHas('ciudades', $data);

        $ciudades = Ciudades::latest('id')->first();

        $response->assertRedirect(route('all-ciudades.edit', $ciudades));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_ciudades()
    {
        $ciudades = factory(Ciudades::class)->create();

        $response = $this->get(route('all-ciudades.show', $ciudades));

        $response
            ->assertOk()
            ->assertViewIs('app.all_ciudades.show')
            ->assertViewHas('ciudades');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_ciudades()
    {
        $ciudades = factory(Ciudades::class)->create();

        $response = $this->get(route('all-ciudades.edit', $ciudades));

        $response
            ->assertOk()
            ->assertViewIs('app.all_ciudades.edit')
            ->assertViewHas('ciudades');
    }

    /**
     * @test
     */
    public function it_updates_the_ciudades()
    {
        $ciudades = factory(Ciudades::class)->create();

        $data = [
            'nombre' => $this->faker->text(255),
            'lat' => $this->faker->text(255),
            'lng' => $this->faker->text(255),
        ];

        $response = $this->put(route('all-ciudades.update', $ciudades), $data);

        $data['id'] = $ciudades->id;

        $this->assertDatabaseHas('ciudades', $data);

        $response->assertRedirect(route('all-ciudades.edit', $ciudades));
    }

    /**
     * @test
     */
    public function it_deletes_the_ciudades()
    {
        $ciudades = factory(Ciudades::class)->create();

        $response = $this->delete(route('all-ciudades.destroy', $ciudades));

        $response->assertRedirect(route('all-ciudades.index'));

        $this->assertDeleted($ciudades);
    }
}
