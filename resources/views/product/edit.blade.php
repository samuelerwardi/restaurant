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
        <form class="form-horizontal" id="form" action="{{ action("ProductController@update", ['id' => $datas->id]) }}"
              method="post">
            @method('PUT')
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">
                        Kode Barang
                        <?php //dump(\App\Helpers\Helper::development()); ?>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" name="produk_kode" class="form-control primarykey" placeholder="Kode Barang"
                               id="kode" value="<?php echo $datas["produk_kode"] ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Barang</label>
                    <div class="col-sm-5">
                        <input name="produk_nama" value="<?php echo $datas["produk_nama"] ?>" type="text" class="form-control" id="nama" placeholder="Nama"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Keuntungan</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control currency" placeholder="Keuntungan IDR" value="<?php echo $datas["keuntungan"] ?>" data-id="keuntungan">
                        <input name="keuntungan" value="<?php echo $datas["keuntungan"] ?>" id="keuntungan" type="hidden">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Harga Jual</label>
                    <div class="col-sm-5">
                        <input value="<?php echo $datas["harga_jual"] ?>" type="text" class="form-control currency" data-id="harga_jual" placeholder="Harga Jual">
                       <input name="harga_jual" value="<?php echo $datas["harga_jual"] ?>" type="hidden" class="form-control" id="harga_jual">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>
                    <div class="col-sm-5">
                        <textarea name="deskripsi" class="form-control" 
                                placeholder="deskripsi" id="deskripsi"><?php echo $datas["deskripsi"] ?></textarea>
                    </div>
                </div>
            </div>

            <div class="box-body" id="body-append">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Bahan</label>
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-default btn-add-row">
                            <i class="fa fa-plus">Add</i>
                        </button>
                    </div>
                </div>
                <?php if (!empty($datas->getMasterProdukReseps())): ?>
                    <?php foreach ($datas->getMasterProdukReseps() as $key => $value): ?>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Bahan</label>
                            <div class="col-sm-4">
                                <select name="kode_bahan[]" class="form-control kode_bahan">
                                    <option value="<?php echo $value->getMasterBahan()[0]["id"]; ?>" selected>
                                        <?php echo $value->getMasterBahan()[0]["nama_bahan"] ?>
                                    </option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input name="qty[]" type="number" class="form-control" id="qty" value="<?php echo $value["qty"] ?>"
                                       placeholder="Qty" required autocomplete="off" value="">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-default btn-remove-row">
                                    <i class="fa fa-trash">Remove</i>
                                </button>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
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
        function setCurrency(argument) {
            // $(".curr")
        }
        $(document).ready(function() {
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
        var options = {
            symbol : "Rp ",
            decimal : ",",
            thousand: ".",
            precision : 2,
            format: "%s%v"
        };

        $(document).on('blur', '.currency', function(event) {
            var appendOn = $(this).data("id");
            var value = $(this).val();
            var currency = accounting.formatMoney($(this).val(), options);
            $(this).val(currency);
            if (!isNaN(value)){
                $("#"+appendOn).val(value);
            };
        });
    </script>
@endsection