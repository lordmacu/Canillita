@extends('layouts.default')
<?php $bodyClass = 'profile-page sb-l-o sb-r-c onload-check'; ?>

@section('scripts')
  <!-- Sparkline Plugin-->
  <script src="/vendor/plugins/sparkline/jquery.sparkline.min.js"></script>
  <script>$(function() {
    // $('.inlinesparkline').sparkline();
  });
  </script>
@stop

@section('content')


<!-- Begin .page-heading -->
<div class="page-heading">
    <div class="media clearfix">
      <div class="media-left pr30">
        <a href="#">
          <img class="media-object mw150" src="{{ ln_img_url($revista->url) }}" style="height: 180px" alt="...">
        </a>
      </div>                      
      <div class="media-body va-m">
        <h2 class="media-heading">{{ $revista->nombre }}</h2>
        <h3>Edición 290</h3>
        <h4>Total Ventas: $21.570</h4>
      </div>
    </div>
</div>

<div class="row">
  <div class="col-md-4">
    <div class="panel">
      <div class="panel-heading">
        <span class="panel-icon">
          <i class="fa fa-star"></i>
        </span>
        <span class="panel-title"> Top 3 vendedores</span>
      </div>
      <div class="panel-body pn">
        <table class="table mbn tc-icon-1 tc-med-2 tc-bold-last">
          <thead>
            <tr class="hidden">
              <th class="mw30">#</th>
              <th>Nombre</th>
              <th>Revenue</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
              </td>
              <td>Directorio 4310, Floresta</td>
              <td>
                <i class="fa fa-caret-up text-info pr10"></i>$25.913</td>
            </tr>
            <tr>
              <td>
              </td>
              <td>Montes de Oca 510, Barracas</td>
              <td>
                <i class="fa fa-caret-down text-danger pr10"></i>$13.712</td>
            </tr>
            <tr>
              <td>
              </td>
              <td>Alsina 194, Avellaneda</td>
              <td>
                <i class="fa fa-caret-up text-info pr10"></i>$11.742</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    
  </div>
  <div class="col-md-8">

    <div class="tab-block">
      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#tab1" data-toggle="tab">Stock Bajo</a>
        </li>
      </ul>
      <div class="tab-content p30" style="height: 730px;">
        <div id="tab1" class="tab-pane active">
          <table class="table">
            <thead>
              <tr class="dark">
                <th>Revista</th>
                <th>
                # puestos que falta
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Rolling Stones</td>
                <td>15 puestos</td>
              </tr>
              <tr>
                <td>Lugares</td>
                <td>8 puestos</td>
              </tr>
              <tr>
                <td>Jardín</td>
                <td>3 puestos</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div id="tab2" class="tab-pane"></div>
        <div id="tab3" class="tab-pane"></div>
        <div id="tab4" class="tab-pane"></div>
      </div>
    </div>
  </div>
</div>
@stop