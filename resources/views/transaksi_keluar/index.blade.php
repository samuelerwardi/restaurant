@extends('layouts.app')
@section('title', __('home.home'))

@section('css')
    {!! Charts::styles(['highcharts']) !!}
@endsection

@section('content')
    <iframe name="iframe" style="display:none"></iframe>
    <section class="content-header" style="font-size: calc(100%);">
        <h1>Add Expense</h1>
    </section>
    <section class="content" style="font-size: calc(100%);">
        <form method="POST" action="{{action('TransaksiKeluarController@store')}}" accept-charset="UTF-8" enctype="multipart/form-data">
            <div class="box box-solid">
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="jenis_transaksi">Jenis Transaksi:</label>
                                <select class="form-control" id="jenis_transaksi" name="jenis_transaksi" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" value="">Please Select</option>
                                    <option>AIR</option>
                                    <option>GAJI</option>
                                    <option>LISTRIK</option>
                                    <option>SEWA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="ref_no">Reference No:</label>
                                <input class="form-control" name="ref_no" type="text" id="ref_no">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="transaction_date">Tanggal:*</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                    <input class="form-control datepicker" readonly="" required id="datepicker" name="tanggal" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="final_total">Total nominal:*</label>
                                <input class="form-control input_number" placeholder="Total nominal:*" required
                                       name="nominal" type="text" id="final_total">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="document">Lampiran Dokumen:</label>
                                <div class="file-input file-input-new">
                                    <div class="input-group file-caption-main">
                                        <div tabindex="500" class="form-control file-caption  kv-fileinput-caption">
                                            <div class="file-caption-name"></div>
                                        </div>
    
                                        <div class="input-group-btn">
                                            <button type="button" tabindex="500" title="Clear selected files"
                                                    class="btn btn-default fileinput-remove fileinput-remove-button"><i
                                                        class="glyphicon glyphicon-trash"></i> <span class="hidden-xs">Remove</span>
                                            </button>
                                            <button type="button" tabindex="500" title="Abort ongoing upload"
                                                    class="btn btn-default hide fileinput-cancel fileinput-cancel-button">
                                                <i class="glyphicon glyphicon-ban-circle"></i> <span class="hidden-xs">Cancel</span>
                                            </button>

                                            <div tabindex="500" class="btn btn-primary btn-file">
                                                <i class="glyphicon glyphicon-folder-open"></i>&nbsp;
                                                <span class="hidden-xs">Browse..</span>
                                                <input name="document" type="file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="help-block">Max File size: 1MB</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="keterangan">Keterangan:</label>
                                <textarea class="form-control" rows="3" name="keterangan" cols="50"
                                          id="keterangan"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                        </div>
                    </div>
                </div>
            </div> <!--box end-->

        </form>
    </section>
@endsection

@section('javascript')
    <script src="{{ asset('js/currency.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $("#combocustomer").change(function () {
                if ($(this).val() == "") {
                    $("#newcustomer").fadeIn();
                    $("#methodpayment").fadeOut();
                } else {
                    $("#newcustomer").fadeOut();
                    $("#methodpayment").fadeIn();
                }
                ;
            });
        });
    </script>
@endsection