@extends('layouts.app')

@section('content')
<section class="container">
    <section class="content-header" style="font-size: calc(100%);">
        <div class="row">
            <div class="col-md-4 col-sm-3 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-cash"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Penjualan</span>
                  <span class="info-box-number total_purchase">
                    Rp {{$datas["transaksi_penjualan"]->sum('grand_total')}}
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-3 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Pembelian</span>
                  <span class="info-box-number total_sell">
                    Rp {{$datas["transaksi_pembelian"]->sum('grand_total')}}
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-3 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow">
                    <i class="fa fa-dollar"></i>
                    <i class="fa fa-exclamation"></i>
                </span>

                <div class="info-box-content">
                  <span class="info-box-text">Total T.Keluar</span>
                  <span class="info-box-number purchase_due">
                    Rp {{$datas["transaksi_keluar"]->sum('nominal')}}
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
</section>
@endsection
