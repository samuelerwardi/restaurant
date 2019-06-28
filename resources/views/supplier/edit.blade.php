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
                    Form Master Supplier
                </h3>
                <div class="block-content collapse in">
                    <div class="span12">
                        
                    </div>
                </div>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="form" action="{{ action("SupplierController@update", ['id' => $datas->id]) }}"
                  method="post">
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nama Kontak</label>
                        <div class="col-sm-5">
                            <input name="contact_person" type="text" class="form-control" id="contact_person"
                                   placeholder="Nama Kontak" required autocomplete="off" value="{{$datas->contact_person}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Kode Supplier</label>
                        <div class="col-sm-5">
                            <input name="kode" type="text" class="form-control" id="kode"
                                   placeholder="Kode" required autocomplete="off" value="{{$datas->kode}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nama Supplier</label>
                        <div class="col-sm-5">
                            <input name="nama" type="text" class="form-control" id="nama"
                                   placeholder="Nama" required autocomplete="off" value="{{$datas->nama}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-5">
                            <input name="email" type="email" class="form-control" id="email"
                                   placeholder="Email" required autocomplete="off" value="{{$datas->email}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Telepon</label>
                        <div class="col-sm-5">
                            <input name="telepon" type="text" class="form-control" id="telepon"
                                   placeholder="Telepon" required autocomplete="off" value="{{$datas->telepon}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-5">
                            <textarea class="form-control" name="alamat" placeholder="Alamat" id="alamat">{{$datas->alamat}}</textarea>
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
@endsection