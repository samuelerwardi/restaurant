@extends('layouts.app')
@section('title', __('home.home'))

@section('css')
    {!! Charts::styles(['highcharts']) !!}
@endsection

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Report Stok Master Bahan</h3>
                <div class="block-content collapse in">
                    <div class="span12">
                        <div class="table-toolbar">
                        </div>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="form3" action="" method="get">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">From</label>
                        <div class="col-sm-3">
                            <input type="text" name="from" class="form-control datepicker" autocomplete="off"
                                   value="{{Request()->from}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label" id="name">To</label>
                        <div class="col-sm-3">
                            <input type="text" name="to" class="form-control datepicker" autocomplete="off"
                                   value="{{Request()->to}}">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="col-sm-offset-2 col-sm-5">
                        <button type="submit" class="btn btn-info pull-left col-sm-4" id="click">Submit</button>
                    </div>
                </div>
            </form>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Table With Full Features</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped datatable datatable-client">
                        <thead>
                        <tr>
                            <th>Kode Bahan</th>
                            <th>Nama Bahan</th>
                            <th>Satuan</th>
                            <th>Qty</th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($datas)): ?>
                        <?php foreach ($datas as $key => $value) {
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $value->getMasterBahan()->kode_bahan; ?></td>
                            <td><?php echo $value->getMasterBahan()->nama_bahan ?></td>
                            <td><?php echo $value->getMasterBahan()->satuan ?></td>
                            <td><?php echo $value['qty'] . $value['id'] ?></td>
                            <td>
                                <a class="btn btn-mini report-transaksi-pembelian" href="{{action('ReportController@master_bahans_stok_detail',['id' => $value['master_bahans_id']])}}">
                                    <i class="fa fa-eye"></i>History
                                </a>
                            </td>
                        </tr>
                        <?php  } ?>
                        <?php endif ?>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </section>


    <div class="modal" id="modal-report-transaksi-pembelian-detail">

    </div>
@endsection
@section('javascript')
<script type="text/javascript">
    $(".report-transaksi-pembelian").on("click", function(){
        var id = $(this).data('id');
        $.ajax({
            url:"{{action('ReportController@transaksi_pembelian_view_detail')}}/"+id,
            type:"GET",
            success:function(data){
                $("#modal-report-transaksi-pembelian-detail").html(data);
                $("#modal-report-transaksi-pembelian-detail").modal();
            }
        });
    });
</script>
@endsection