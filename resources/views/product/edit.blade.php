@extends('layouts.app')
@section('title', __('home.home'))

@section('css')
    {!! Charts::styles(['highcharts']) !!}
@endsection

@section('content')
<section class="content">
    <div class="box box-info">
        <!-- box-header -->
        <div class="box-header">
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" id="form" action="{{ action("ProductController@store") }}"
              method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kode Barang</label>
                    <div class="col-sm-5">
                        <input type="text" name="produk_kode" class="form-control primarykey" placeholder="Kode Barang"
                               id="kode" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Barang</label>
                    <div class="col-sm-5">
                        <input name="produk_nama" type="text" class="form-control" id="nama" placeholder="Nama"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Keuntungan</label>
                    <div class="col-sm-5">
                        <input name="keuntungan" type="text" class="form-control keuntungan" id="nominal2"
                               placeholder="Keuntungan IDR">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Harga Jual</label>
                    <div class="col-sm-5">
                        <input name="harga_jual" type="text" class="form-control" id="harga_jual"
                               placeholder="Harga Jual">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>
                    <div class="col-sm-5">
                        <textarea name="deskripsi" class="form-control" placeholder="deskripsi"
                                  id="deskripsi"></textarea>
                    </div>
                </div>
            </div>

            <div class="box-body" id="body-append">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Bahan</label>
                    <div class="col-sm-4">
                        <select name="kode_bahan[]" class="form-control kode_bahan"></select>
                    </div>
                    <div class="col-sm-4">
                        <input name="qty[]" type="number" class="form-control" id="qty"
                               placeholder="Qty" required autocomplete="off" value="">
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-default btn-add-row">
                            <i class="fa fa-plus">Add</i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="col-sm-offset-2 col-sm-5">
                    <button type="submit" class="btn btn-info pull-left col-sm-4" id="click">Save</button>
                    <button type="reset" class="btn btn-default pull-right col-sm-4">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</section>
@stop
@section('javascript')
    <script src="{{ asset('js/currency_master_barang.js') }}"></script>
    <script src="{{ asset('js/form_validation_barang.js') }}"></script>
    <script src="{{ asset('js/scripts_master_barang.js') }}"></script>
    <script type="text/javascript">
        function initKodeBahan(){
            $(".kode_bahan").select2({
                ajax: {
                    method : 'GET',
                    url: '{{ action("MasterBahanController@list") }}',
                    dataType: 'json'
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                  }
            });
        }
        $(document).ready(function() {
            console.log("aa");
            initKodeBahan();            
        });
        var counter = 1;
        $(document).on("click", ".btn-add-row", function(){
            $("#body-append").append('<div class="form-group">'+
                    '<label for="inputEmail3" class="col-sm-2 control-label">Bahan</label>'+
                    '<div class="col-sm-4">'+
                        '<select name="kode_bahan[]" class="form-control kode_bahan"></select>'+
                    '</div>'+
                    '<div class="col-sm-4">'+
                        '<input name="qty[]" type="number" class="form-control" id="qty" placeholder="Qty" required autocomplete="off" value="">'+
                    '</div>'+
                    '<div class="col-sm-2">'+
                        '<button type="button" class="btn btn-default btn-remove-row" data-id="'+counter+'">'+
                            '<i class="fa fa-trash"></i>'+
                        '</button>'+
                    '</div>'+
                '</div>');
            counter++;
            initKodeBahan();
        });

        $(document).on("click",".btn-remove-row",function(){
            $(this).parent().parent().remove();
        });
    </script>
@endsection