<body onload="window.print();parent.location.reload();">
<!-- <body onload=""> -->
<table width="100%">
    <tr>
        <th width="140" style="padding:0 20px">
            <img src="/img/default.png" width="100px">
        </th>
        <td>
            <table>
                <tr>
                    <th style="font-size:16pt">
                        <div align="left">RM.Ayam Kampung Pinang</div>
                    </th>
                </tr>
                <tr>
                    <td>
                        <div align="left">Tel. :(021) 35948806 <br>
                            Tel. :0856 9736 4669 Fax. :(021) 54393386
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div align="left">Email :koperasi@redtophotel.com</div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <hr style="border-top:5px solid; margin: 10px 0">
        </td>
    </tr>
    <tr style="padding-top:10px">
        <td colspan="2">
            <center style="margin-bottom:30px; font-size:14pt">
                <b><u>Purchase Order</u></b>
                <p><b>Periode :</b> <?php echo date("F Y", time()) ?> </p>
            </center>
        </td>
    </tr>
    <tr style="padding-top:10px">
        <td colspan="2">
            <table width="100%" border="0">
                <tr>
                    <td width="24%">No Purchase Order</td>
                    <td width="1%">:</td>
                    <td width="75%"><?php echo $data->id ?> </td>
                </tr>
                <tr>
                    <td>Nama Supplier</td>
                    <td>:</td>
                    <td><?php echo $data->getSupplier()->nama ?></td>
                </tr>
                <tr>
                    <td>Tanggal Purchase Order</td>
                    <td>:</td>
                    <td><?php echo $data->created_at ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
</table>
<!-- Table row -->
<div class="row">
    <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th valign="top" style="border-bottom:none; padding-bottom:0">KODE BARANG</th>
                <th valign="top" style="border-bottom:none; padding-bottom:0">NAMA BARANG</th>
                <th valign="top" style="border-bottom:none; padding-bottom:0">SATUAN</th>
                <th valign="top" style="border-bottom:none; padding-bottom:0">HARGA</th>
                <th valign="top" style="border-bottom:none; padding-bottom:0">QTY</th>
                <th valign="top" style="border-bottom:none; padding-bottom:0">SUBTOTAL</th>
            </tr>

            </thead>
            <tbody>
            <?php if (!empty($data->getTransaksiPembelianDetails())): ?>
            <?php $total = 0; ?>
            <?php foreach ($data->getTransaksiPembelianDetails() as $key => $value): ?>
            <?php $total += $value->subtotal; ?>
            <tr>
                <td><?php echo $value->getMasterBahans()->kode_bahan ?></td>
                <td><?php echo $value->getMasterBahans()->nama_bahan ?></td>
                <td><?php echo $value->getMasterBahans()->satuan ?></td>
                <td><?php echo $value->price ?></td>
                <td><?php echo $value->qty ?></td>
                <td><?php echo $value->subtotal ?></td>
            </tr>
            <?php endforeach ?>
            <?php endif ?>
            </tbody>
        </table>
    </div><!-- /.col -->
</div><!-- /.row -->
</br>
</br>
</br>
</br>
<div class="row">
    <div class="col-xs-6 pull-right">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td style="width:50%"><b>Total:</b></td>
                    <td>Rp. <?php echo $total ?>,-</td>
                </tr>
                <tr>
                    <td><b>PPN:</b></td>
                    <td><?php echo $data->ppn ?> (%)</td>
                </tr>
                <tr>
                    <td><b>Total:</b></td>
                    <td>Rp. <?php echo $data->grand_total ?>,-</td>
                </tr>
            </table>
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->
</body>
</html>

