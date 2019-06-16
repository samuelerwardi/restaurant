@extends('layouts.app')
@section('title', __('home.home'))

@section('css')
    {!! Charts::styles(['highcharts']) !!}
@endsection

@section('content')
<iframe name="iframe" style="display:none"></iframe>
<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Form Pemesanan Barang</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="row">
            <form class="form-horizontal" method="post" action="{{action("TransaksiPembelianController@store")}}" id="form" target="iframe">
                <div class="col-md-12" style="margin-bottom:50px">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-6" for="tanggalpenjualan">No PO</label>
                            <div class="col-md-6">
                                <input type="text" name="nopenjualan" id="tanggalpenjuaalan" class="form-control " disabled="" value="AUTO GENERATED">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6" for="tanggalpenjualan">Tanggal Created PO</label>
                            <div class="col-md-6">
                                <input type="text" name="tanggalpenjualan" id="tanggalpenjualan" class="form-control datepicker" disabled="" value="2019/04/29">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6" for="tanggalpenjualan">Supplier</label>
                            <div class="col-md-6">
                                <input type="hidden" name="supplier_id" id="supplier_id">
                                <input type="text" name="namasupplier" id="namasupplier" class="form-control  ui-autocomplete-input" required="" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="col-md-2">
                        <label for="kodebarang">Kode Barang</label>
                        <input type="text" id="kodebarang" class="form-control ui-autocomplete-input" autocomplete="off">
                    </div>
                    <div class="col-md-2">
                        <label for="namabarang">Nama Barang</label>
                        <span id="namabarang" class="form-control uneditable-input"></span>
                    </div>
                    <div class="col-md-2">
                        <label for="harga">Harga</label>                    
                        <input type="text" id="harga" class="form-control" autocomplete="off">
                    </div>

                    <div class="col-md-2">
                        <label for="qty">Qty</label>
                        <input type="text" id="qty" name="qty" class="form-control" autocomplete="off">
                        <div class="error-container">
                            <span id="response" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="subtotal">Subtotal</label>
                        <span id="subtotal" class="form-control uneditable-input">0</span>
                    </div>
                    <div class="col-md-2">
                        <label>&nbsp;</label>
                        <a href="#" class="btn btn-success form-control" id="tambah"><i class="icon-plus icon-white"></i>Tambah</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered padd-bottom" id="detail">
                        <thead>
                        <tr>
                            <th class="col-md-2">Kode Barang</th>
                            <th class="col-md-2">Nama Barang</th>
                            <th class="col-md-2">Harga</th>
                            <th class="col-md-2">Qty</th>
                            <th class="col-md-2">Subtotal</th>
                            <th class="col-md-2"></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="empty-detail">
                                <td colspan="6">Detail masih kosong</td>
                            </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="4">
                                <div class="text-right">
                                    Grandtotal
                                </div>
                            </th>
                            <td colspan="2" id="grandtotal">
                                <input type="hidden" name="grandtotal" value="0">
                                0
                            </td>
                        </tr>
                        <tr>
                            <th colspan="4">
                                <div class="text-right">
                                    PPN
                                </div>
                            </th>
                            <td colspan="2">
                                <input type="text" required="" min="0" name="ppn" id="ppn" class="form-control" autocomplete="off" value="">
                            </td>
                        </tr>
                        <tr>
                            <th colspan="4">
                                <div class="text-right">
                                    Harga setelah PPN
                                </div>
                            </th>
                            <td colspan="2" id="afterppn">0</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>


                <hr>
                <div class="col-md-12">
                    <div class="block-content text-right" style="padding:20px">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('javascript')
    <script src="{{ asset('js/currency.js') }}"></script>
    <script src="{{ asset('js/trx_beli.js') }}"></script>
    <script type="text/javascript">
      $(function(){
        $("#combocustomer").change(function(){
          if ($(this).val()=="") {
            $("#newcustomer").fadeIn();
            $("#methodpayment").fadeOut();
          } 
          else{
            $("#newcustomer").fadeOut();
            $("#methodpayment").fadeIn();
          };
        });
      });
    </script>
@endsection