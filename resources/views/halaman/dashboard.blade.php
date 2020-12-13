@extends('layouts.master')

@section('title','Dashboard')

@section('content')
@if(auth()->user()->level == 'mitra')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
           <!--  <h5 class="card-title">Card title</h5> -->

<!--             <p class="card-text">
              Some quick example text to build on the card title and make up the bulk of the card's
              content.
            </p>

            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a> -->

            <div class="panel">
              <div id="chart_produksi"></div>
            </div>
          </div>
        </div>

        <div class="card card-primary card-outline">
          <div class="card-body">
<!--             <h5 class="card-title">Card title</h5>

            <p class="card-text">
              Some quick example text to build on the card title and make up the bulk of the card's
              content.
            </p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a> -->

            <div class="panel">
              <div id="chart_penjualan"></div>
            </div>

          </div>
        </div><!-- /.card -->
      </div>
      <!-- /.col-md-6 -->
<!--       <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h5 class="m-0">Featured</h5>
          </div>
          <div class="card-body">
            <h6 class="card-title">Special title treatment</h6>

            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>

        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">Featured</h5>
          </div>
          <div class="card-body">
            <h6 class="card-title">Special title treatment</h6>

            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div> -->
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@else
<div class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-grey">
            <span class="info-box-icon bg-blue"><i class="fas fa-tag"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Penjualan</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fas fa-shopping-basket"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Pesanan</span>
              <span class="info-box-number">41,410</span>
            </div>
          </div>
        </div>
    </div> 
</div>
@endif
@stop

@section('chart')
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script>
    Highcharts.chart('chart_produksi', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Hasil Produksi Tempe'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Tempe (kg)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Produksi Tempe (Perbulan)',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
        }]
    });
  </script>
    <script>
    Highcharts.chart('chart_penjualan', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Hasil Penjualan Tempe'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Penjualan'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Penjualan Tempe (Perbulan)',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
        }]
    });
  </script>
@stop