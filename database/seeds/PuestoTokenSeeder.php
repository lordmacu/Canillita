<?php

use Illuminate\Database\Seeder;
use App\ApiFacade;
use App\PuestoToken;

class PuestoTokenSeeder extends Seeder
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
    	$puestos = $this->api->getPuestos();

    	foreach ($puestos as $puesto) {
    		PuestoToken::create([
    			'waypoint' => $puesto->waypoint,
    			'token' => md5($puesto->waypoint)
    		]);
    	}
    }
}
