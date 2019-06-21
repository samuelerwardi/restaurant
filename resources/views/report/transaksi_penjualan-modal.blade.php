<div class="modal-dialog modal-xl no-print" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="modalTitle"> 
                Sell Details (<b>Order No.:</b> {{$datas->id}})
            </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-12">
                    <p class="pull-right"><b>Date:</b> {{$datas->created_at}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <b>Order No.:</b> #{{$datas->id}}<br>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h4>Products:</h4>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table bg-gray">
                            <tbody>
                            <tr class="bg-green">
                                <th>#</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                            </tr>
                            <?php foreach ($datas->getDetails() as $key => $value): ?>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        {{$value->getMasterProduk()->produk_nama}}
                                    </td>
                                    <td>{{$value->qty}}</td>
                                    <td>
                                        <span class="display_currency" data-currency_symbol="true">Rp {{$value->price}}</span>
                                    </td>
                                    <td>
                                        <span class="display_currency" data-currency_symbol="true">Rp {{$value->subtotal}}</span>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h4>Payment info:</h4>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table bg-gray">
                            <tbody>
                            <tr>
                                <th>Total Items:</th>
                                <td></td>
                                <td>
                                    <span class="display_currency pull-right" data-currency_symbol="true">
                                        <?php echo $datas->getDetails()->count(); ?>   
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td></td>
                                <td>
                                    <span class="display_currency pull-right" data-currency_symbol="true">
                                        Rp <?php echo $datas->total ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>PPN</th>
                                <td><b>(+)</b></td>
                                <td class="text-right">
                                    <?php echo $datas->ppn ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Grand Total:</th>
                                <td></td>
                                <td>
                                    <span class="display_currency pull-right">
                                        <?php echo $datas->grand_total ?>
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default no-print" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>