@extends('layouts/default')

@section('content')
      <section id="content" class="pn posr">

<!--         <div class="expanding-header overflow-h">
          <span class="ad ad-lines map-header-icon"></span>
          <div class="pull-right p6 pr10">
            <div class="ib va-t mr10">
              <span class="flag-sm flag-de mr10" data-loc="germany"></span>
              <span class="flag-sm flag-tr mr10" data-loc="turkey"></span>
              <span class="flag-sm flag-us mr10" data-loc="united states"></span>
              <span class="flag-sm flag-fr mr10" data-loc="france"></span>
            </div>
            <div class="ib va-t">
              <form method="post" id="geocoding_form">
                <input type="text" class="form-control input-sm" id="address" name="address" placeholder="Enter an Address...">
                <input type="submit" class="btn btn-default hidden" value="Search">
              </form>
            </div>
          </div>
        </div> -->
        <div id="map1" class="map" style="width: 100%; height: 100%;"></div>

      </section>
@stop
@section('scripts')
<script>
$(function() {
    // Init new GMap
    var map = new GMaps({
      div: '#map1',
      lat: {{ $mapLat }},
      lng: {{ $mapLong }},
      zoom: 11 
    });
    var markers = {!! json_encode($markers) !!};

    $.each(markers, function(idx, el) {
		map.addMarker({
		  lat: el.lat,
		  lng: el.lng,
		  infoWindow: {
		  	content: '<p>' + el.title + '</p>'
		  }
		});
    });
});
</script>
@stop