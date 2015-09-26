<?php
use App\ApiFacade;
use App\StatsFacade;
use App\StockFacade;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/admin', function (ApiFacade $api, StatsFacade $statsApi) {
	$revistas = $api->getRevistas();
	foreach ($revistas as $revista) {
		$revista->stats = $statsApi->getVentas($revista->_id, 'w');
	}

	return view('admin.dashboard', compact('revistas'));
});
Route::get('/admin/revista/{codigoBarra}', function ($codigoBarra, ApiFacade $lnApi, StatsFacade $statsApi) {
	$revista = $lnApi->getRevista($codigoBarra);
	$stats = $statsApi->getVentas($codigoBarra, 'w');

	return view('admin.revista-detalle', compact('revista', 'stats'));
});
Route::get('/admin/stock-map', function (ApiFacade $api) {
	$puestos = $api->getPuestos();
	$mapLong = 0;
	$mapLat = 0;
	$markers = [];

	foreach ($puestos as $puesto) {
		$mapLat += $puesto->point[0];
		$mapLong += $puesto->point[1];
		$markers[] = [
			'lat' => $puesto->point[0],
			'lng' => $puesto->point[1],
			'title' => $puesto->direccion,
		];
	}
	$mapLong = $mapLong / count($puestos);
	$mapLat = $mapLat / count($puestos);

    return view('admin/stock-map', compact(['markers', 'mapLong', 'mapLat']));
});
Route::get('/distribuidor', function () {
    return view('distribuidor/dashboard');
});
Route::get('/vendedor', function () {
    return view('vendedor/dashboard');
});

Route::get('/api/{token}/stock', function ($token, StockFacade $stockApi) {
	return response()->json($stockApi->getStock($token));
});
Route::get('/api/{token}/venta', function ($token, StockFacade $stockApi) {
	$revistaId = Input::get('revista_id');
	$edicion = Input::get('edicion');
	$cantidad = Input::get('cantidad');

	$stockApi->registrarVenta($token, $revistaId, $edicion, $cantidad);

	return response()->json(['success' => true]);
});
Route::get('/api/{token}/ingreso', function ($token, StockFacade $stockApi) {
	$revistaId = Input::get('revista_id');
	$edicion = Input::get('edicion');
	$cantidad = Input::get('cantidad');

	$stockApi->registrarIngreso($token, $revistaId, $edicion, $cantidad);

	return response()->json(['success' => true]);
});
Route::get('/api/{token}/stats', function ($token, StatsFacade $statsApi) {
	$revistaId = Input::get('revista_id');

	$stats = $statsApi->getVentasPorEdicion($token, $revistaId);

	return response()->json($stats);
});
