@extends('layouts.app')
@section('title', __('home.home'))

@section('css')
    {!! Charts::styles(['highcharts']) !!}
@endsection

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box">
                <!-- box-header -->
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped datatable datatable-client">
                        <thead>
                        <tr>
                            <th>Kode Bahan</th>
                            <th>Nama Bahan</th>
                            <th>Satuan</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($datas)): ?>
                        <?php foreach ($datas as $value) { ?>
                        <tr>
                            <td><?php echo $value['kode_bahan'] ?></td>
                            <td><?php echo $value['nama_bahan'] ?></td>
                            <td><?php echo $value['satuan'] ?></td>
                            <td><?php echo $value['created_at'] ?></td>
                            <td width="16%">
                                <a href="{{action('MasterBahanController@edit',$value['id'])}}" class="btn btn-default fa fa-edit btn-default btn_edit">
                                    <i class="icon-pencil icon-white"></i> Edit
                                </a>


                                <form action="{{action('MasterBahanController@destroy',$value['id'])}}" method="POST" style="display : inline-table">
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-default fa fa-trash btn-default">
                                      <i class="icon-pencil icon-white"></i>
                                        Delete
                                    </button>
                                </form>
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
@stop
@section('javascript')
    <script src="{{ asset('js/currency_master_barang.js') }}"></script>
    <script src="{{ asset('js/form_validation_barang.js') }}"></script>
    <script src="{{ asset('js/scripts_master_barang.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        //   var table = $('#datatable-serverside').DataTable({
        //     processing: true,
        //     serverSide: true,
        //     columnDefs: [ {
        //        "searchable": false,
        //        "orderable": false,
        //        "targets": 0
        //     }],
        //     order: [[ 1, 'asc' ]],
        //     ajax : "",
        //        aoColumns: [
        //            { mData: null }, 
        //            { mData: 'nama_bahan' },
        //            { mData: 'created_at' },
        //            { mData: 'id' },
        //            { mData: 'jumlah' },
        //            { mData: 'jumlah' },
        //        ],
        //   });
        //     table.on( 'order.dt search.dt', function () {
        //         table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        //             cell.innerHTML = i+1;
        //         } );
        //     }).draw();
          // var checkbox = "";
          // $('#datatable-serverside').dataTable({
          //       "aaSorting": [[0, "asc"]],
          //       "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100]],
          //       "iDisplayLength": 50,
          //       'bProcessing': true, 
          //       'bServerSide': true,
          //       'sAjaxSource': '',
          //       'fnServerData': function (sSource, aoData, fnCallback) {
          //           console.log(aoData.data);
          //           $.ajax({'dataType': 'json', 'type': 'GET', 'url': sSource, 'data': aoData, 'success': fnCallback});
          //       },
          //   // });
          //       'fnRowCallback': function (nRow, aData, iDisplayIndex) {
          //           nRow.id = aData[0];
          //           nRow.className = "customer_details_link";
          //           return nRow;
          //       },
          //       "aoColumns": [null, null, null, null, null, null]
          //       });
        function decimalFormat(x) {
            return 0;
        }
        function currencyFormat(x) {
            return "Rp. " + 0;
        }
    });
    </script>
@endsection