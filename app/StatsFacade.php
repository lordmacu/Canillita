<?php
namespace App;

use stdclass;

class StatsFacade
{
	public function __construct(ApiFacade $api)
	{
		$this->api = $api;
	}
	public function getVentas($id, $groupBy)
	{
		$entry = new stdclass;

		$entry->ventas = rand(1200, 15000);
		$entry->cambio = rand(-5,5);

		return $entry;
	}
	public function getRevistaStats($period)
	{
		$entry = new stdclass;
		$entry->ventas = rand(1200, 15000);
		$entry->cambio = rand(-5,5);
		$data[] = $entry;

		return $data;
	}
	public function getVentasPorEdicion($token, $revistaId)
	{
		$data = [];
		for ($i=$start=rand(1, 160); $i<= ($start + 60); $i++) {
			$data[] = [
				'edicion' => $i,
				'vendidas' => rand(0, 50)
			];
		}

		return $data;
	}
}