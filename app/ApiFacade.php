<?php
namespace App;

use GuzzleHttp\Client;

class ApiFacade
{

	public function __construct()
	{
		$this->client = new Client;
		$this->baseUrl = 'http://23.23.128.233/api';
	}

	public function getPuestos()
	{
		$url = $this->baseUrl .'/puestos';
		$res = $this->client->request('GET', $url);

		return json_decode($res->getBody());
	}
	public function getPuesto($id)
	{
		$url = $this->baseUrl .'/puestos/waypoint/' .$id;
		$res = $this->client->request('GET', $url);

		return json_decode($res->getBody());
	}
	public function getVendedores()
	{
		$url = $this->baseUrl .'/vendedores';
		$res = $this->client->request('GET', $url);

		return json_decode($res->getBody());
	}
	public function getRevistas()
	{
		$url = $this->baseUrl .'/revistas';
		$res = $this->client->request('GET', $url);

		return json_decode($res->getBody());
	}
	public function getRevista($id)
	{
		$url = $this->baseUrl .'/revistas/codigo-barra/' .$id;
		$res = $this->client->request('GET', $url);

		return json_decode($res->getBody())[0];
	}
}