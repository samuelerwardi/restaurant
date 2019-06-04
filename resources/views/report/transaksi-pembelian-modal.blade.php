<div class="modal-dialog modal-xl no-print" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="modalTitle"> 
                Sell Details (<b>Invoice No.:</b> {{$datas->id}})
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
                    <b>Invoice No.:</b> #{{$datas->id}}<br>
                </div>
                <div class="col-sm-4">
                    <b>Supplier name:</b> {{$datas->getSupplier()->nama}}<br>
                    <b>Address:</b><br>
                        {{$datas->getSupplier()->alamat}}<br>
                    <b>Contact Person</b><br>
                        {{$datas->getSupplier()->contact_person}}
                    <br>
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
                                <th>Unit Price</th>
                                <th>Subtotal</th>
                            </tr>
                            <?php foreach ($datas->getTransaksiPembelianDetails() as $key => $value): ?>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        {{$value->getMasterBahans()->nama_bahan}}
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
                            <tr class="bg-green">
                                <th>#</th>
                                <th>Date</th>
                                <th>Reference No</th>
                                <th>Amount</th>
                                <th>Payment mode</th>
                                <th>Payment note</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>04/23/2019</td>
                                <td>SP2019/0004</td>
                                <td><span class="display_currency" data-currency_symbol="true">Rp 20,000.00</span>
                                </td>
                                <td>
                                    Cash
                                </td>
                                <td> --
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table bg-gray">
                            <tbody>
                            <tr>
                                <th>Total:</th>
                                <td></td>
                                <td><span class="display_currency pull-right" data-currency_symbol="true">Rp 20,000.00</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Discount:</th>
                                <td><b>(-)</b></td>
                                <td><span class="pull-right">0  % </span></td>
                            </tr>
                            <tr>
                                <th>Order Tax:</th>
                                <td><b>(+)</b></td>
                                <td class="text-right">
                                    0.00
                                </td>
                            </tr>
                            <tr>
                                <th>Shipping:</th>
                                <td><b>(+)</b></td>
                                <td><span class="display_currency pull-right"
                                          data-currency_symbol="true">Rp 0.00</span></td>
                            </tr>
                            <tr>
                                <th>Total Payable:</th>
                                <td></td>
                                <td><span class="display_currency pull-right">20,000.00</span></td>
                            </tr>
                            <tr>
                                <th>Total paid:</th>
                                <td></td>
                                <td><span class="display_currency pull-right" data-currency_symbol="true">Rp 20,000.00</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Total remaining:</th>
                                <td></td>
                                <td><span class="display_currency pull-right"
                                          data-currency_symbol="true">Rp 0.00</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <strong>Sell note:</strong><br>
                    <p class="well well-sm no-shadow bg-gray">
                        --
                    </p>
                </div>
                <div class="col-sm-6">
                    <strong>Staff note:</strong><br>
                    <p class="well well-sm no-shadow bg-gray">
                        --
                    </p>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="print-invoice btn btn-primary"
               data-href="http://dev.ultimate-pos.localhost/sells/6/print"><i class="fa fa-print"
                                                                              aria-hidden="true"></i> Print</a>
            <button type="button" class="btn btn-default no-print" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>