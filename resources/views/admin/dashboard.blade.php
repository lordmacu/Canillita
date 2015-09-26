@extends('layouts.default')
<?php $bodyClass = 'maps-full-page'; ?>

@section('content')
<div class="row mb10">
	@foreach ($revistas as $revista)
	<div class="col-md-2">
		<div class="panel panel-tile text-center br-a br-light">
		  <div class="panel-body bg-light dark">
		  	<a href="/admin/revista/{{ $revista->codigoBarra }}">
		  		<img class="img-circle" style="height: 150px" src="{{ ln_img_url($revista->url) }}" />
	  		</a>
		    <h1 class="fs35 mbn">{{ $revista->stats->ventas }}</h1>
		    <h6 class="text-system"><a href="/admin/revista/{{ $revista->codigoBarra }}">{{ $revista->nombre }}</a> <span class="text-muted">{{ $revista->numeroEdicion }}</span></h6>
		  </div>
		  <div class="panel-footer bg-white br-t br-light p12">
		    <span class="fs11">
		      <i class="fa fa-arrow-{{ $revista->stats->cambio < 0 ? 'down' : 'up' }} pr5 text-system"></i> {{ $revista->stats->cambio }}% 
		      <b>última edición</b>
		    </span>
		  </div>
		</div>
	</div>
	@endforeach
</div>
@stop