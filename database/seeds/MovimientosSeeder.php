<?php

use Illuminate\Database\Seeder;
use App\ApiFacade;

class MovimientosSeeder extends Seeder
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

        $date = DateTime::createFromFormat('2012-01-01', 'Y-m-d');
        $oneDay = new DateInterval::createFromDateString('1 day');
        $now = new DateTime;

        do {
        	Movimiento::create([
        		''
        	]);

        	$date->add($oneDay);
        } while($date < $now);

            $table->int('tipo');
            $table->int('revista_id');
            $table->int('edicion');
            $table->int('vendedor_id');
            $table->int('puesto_id');
            $table->int('lat');
            $table->int('lang');
            $table->int('localidad_id');
            $table->int('distribuidora');
            $table->int('linea');
            $table->int('cantidad');

        for ($i=1; $i < 15000; $i++) {

        }
    }
}
