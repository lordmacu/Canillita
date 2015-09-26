<?php
namespace App;

class StockFacade
{
	public function __construct(ApiFacade $api)
	{
		$this->api = $api;
	}

	public function getStock($token)
	{
		$puesto = $this->_loadPuesto($token);
		$stocks = RevistaStock::where(
			'waypoint', '=', $puesto->waypoint)->get();

		$data = [];
		foreach ($stocks as $stock) {
			// load revista
			$revista = $this->api->getRevista($stock->revista_id);

			$data[] = [
				'id' => $stock->revista_id,
				'nombre' => $revista->nombre,
				'edicion' => $revista->numeroEdicion,
				'url' => $revista->url,
				'stock' => $stock->stock,
			];
		}

		return $data;
	}
	public function registrarVenta($token, $revistaId, $edicion, $cantidad)
	{
		$puesto = $this->_loadPuesto($token);

		// store movimiento
		$movimiento = Movimiento::create([
			'tipo' => Movimiento::VENTA,
			'revista_id' => $revistaId,
			'edicion' => $edicion,
			'vendedor_id' => $puesto->vendedor->vendedorId,
			'waypoint' => $puesto->waypoint,
			'lat' => $puesto->point[0],
			'lang' => $puesto->point[1],
			'localidad' => $puesto->localidad,
			'distribuidora' => $puesto->distribuidora,
			'linea' => $puesto->linea,
			'cantidad' => $cantidad,
		]);

		// update stock
		$stock = RevistaStock::where('waypoint', '=', $puesto->waypoint)
			->where('revista_id', $revistaId)
			->where('edicion', $edicion)
			->first();
		$stock->stock -= $cantidad;
		$stock->save();
	}

	public function registrarIngreso($token, $revistaId, $edicion, $cantidad)
	{
		$puesto = $this->_loadPuesto($token);

		// store movimiento
		$movimiento = Movimiento::create([
			'tipo' => Movimiento::INGRESO,
			'revista_id' => $revistaId,
			'edicion' => $edicion,
			'vendedor_id' => $puesto->vendedor->vendedorId,
			'waypoint' => $puesto->waypoint,
			'lat' => $puesto->point[0],
			'lang' => $puesto->point[1],
			'localidad' => $puesto->localidad,
			'distribuidora' => $puesto->distribuidora,
			'linea' => $puesto->linea,
			'cantidad' => $cantidad,
		]);

		// update stock
		$stock = RevistaStock::where('waypoint', '=', $puesto->waypoint)
			->where('revista_id', $revistaId)
			->where('edicion', $edicion)
			->first();
		$stock->stock += $cantidad;
		$stock->save();
	}

	private function _loadPuesto($token)
	{
		$puestoToken = PuestoToken::where('token', $token)->first();
		if (!$puestoToken) {
			throw new \Exception('Invalid token: ' .$token);
		}

		$puestos = $this->api->getPuesto($puestoToken->waypoint);

		return isset($puestos[0]) ? $puestos[0] : null;
	}
}