<!-- title row -->
<!-- info row -->
<style type="text/css">
    @media screen, print {
        html, body {
            width: 20cm;
            height: 16.5cm;
            display: block;
        }

        th, td {
            font-size: 12pt;
        }

    }
</style>
<br>
<br>
<br>
<br>
<br>
<br>
<body onload="window.print();parent.location.reload();">
<table width="100%">
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <th colspan="5">
                        <div align="left"></div>
                    </th>
                </tr>
                <tr>
                    <td width="18%">
                        <div align="left">
                            <!-- Telp. -->
                        </div>
                    </td>
                    <td width="32%">
                        <div align="left">
                            <!-- : (021) 35948806 -->
                        </div>
                    </td>
                    <td width="4%"><!-- No Nota --></td>
                    <td width="8%"><!-- : --></td>
                    <td width="38%"></td>
                </tr>
                <tr>
                    <td>
                        <div align="left"><!-- Telp. --></div>
                    </td>
                    <td>
                        <div align="left"><!-- : 0856 9736 4669 -->
                    </td>

                    <td><!-- Customer --> </td>

                    <td colspan="2">
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <div align="left">No Penjualan</div>
                    </td>
                    <td style="padding-left:10px"><?php echo $data->id ?></td>
                </tr>
                <tr>
                    <td>
                        <div align="left">Waktu Transaksi</div>
                    </td>
                    <td style="padding-left:10px"><?php echo $data->created_at ?></td>

                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="8">
                        <hr/>
                    </td>
                </tr>
                <?php if (!empty($data->getDetails())): ?>
                <?php $total = 0 ?>
                <?php foreach ($data->getDetails() as $key => $value): ?>
                    <?php $total += $value->subtotal; ?>
                    <tr>
                        <td style="padding-left:20px"><?php echo $value->getMasterProduk()->produk_kode ?></td>
                        <td style="padding-left:20px"><?php echo $value->getMasterProduk()->produk_nama ?></td>
                        <td style="padding-left:20px"><?php echo $value->qty ?></td>
                        <td style="padding-left:20px"><?php echo $value->price ?></td>
                        <td style="padding-left:25px"><?php echo $value->subtotal ?></td>
                    </tr>
                <?php endforeach ?>
                <?php endif ?>
                <tr>
                    <td colspan="8">
                        <hr/>
                    </td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th colspan="2">
                        <div align="left">Total</div>
                    </th>
                    <td> Rp.<?php echo $total ?>,-</td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th colspan="2">
                        <div align="left">PPN (%)</div>
                    </th>
                    <td> <?php echo $data->ppn ?></td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th colspan="2">
                        <div align="left">GrandTotal</div>
                    </th>
                    <td> Rp. <?php echo $data->grand_total ?>,-</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>

