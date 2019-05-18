@extends('layouts.app')
@section('title', __('home.home'))

@section('css')
    {!! Charts::styles(['highcharts']) !!}
@endsection

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Form Master Barang
                </h3>
                <div class="block-content collapse in">
                    <div class="span12">
                        
                    </div>
                </div>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ action("MasterBahanController@update",['id' => $datas->id]) }}" id="form"
                  method="post">
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Kode Bahan</label>
                        <div class="col-sm-5">
                            <input name="kode_bahan" type="text" class="form-control" id="kode_bahan"
                                   placeholder="Kode Bahan" required autocomplete="off" value="{{ $datas->kode_bahan}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nama Bahan</label>
                        <div class="col-sm-5">
                            <input name="nama_bahan" type="text" class="form-control" id="nama_bahan"
                                   placeholder="Nama Bahan" required autocomplete="off" value="{{$datas->nama_bahan}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Satuan</label>
                        <div class="col-sm-5">
                            <input name="satuan" type="text" class="form-control" id="satuan" placeholder="Satuan"
                                   required autocomplete="off" value="{{$datas->satuan}}">
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
@endsection