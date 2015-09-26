<?php

use Illuminate\Database\Seeder;
use App\ApiFacade;
use App\RevistaStock;

class RevistaStockSeeder extends Seeder
{
	public function __construct(ApiFacade $api)
	{
		$this->api = $api;
	}
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $revistas = $this->api->getRevistas();
        $puestos = $this->api->getPuestos();

        foreach ($puestos as $puesto) {
        	foreach ($revistas as $revista) {
        		RevistaStock::create([
        			'waypoint' => $puesto->waypoint,
        			'revista_id' => $revista->codigoBarra,
        			'edicion' => $revista->numeroEdicion,
        			'stock' => rand(0, 50)
        		]);
        	}
        }
    }
}
