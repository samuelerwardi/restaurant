$(function(){
    // $.showHideMenu();
  // $(".datepicker").datepicker().on("changeDate", function(ev){                 
  //     $(this).datepicker("hide");
  // });
  // $(".datepicker").keydown(function(){return false;});

  $("#namasupplier").autocomplete({
      source: "/supplier/search",
      open: function(){
        $("#supplier_id").val("");
      },
      focus: function( event, ui ) {
        $("#namasupplier").val(ui.item.nama);
        return false;
      },
      select: function( event, ui ) {
        $("#supplier_id").val(ui.item.id); //yg ui.item.namafield dari json
        $("#namasupplier").val(ui.item.nama);
        return false;
      }
    }).data("ui-autocomplete")._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>" + item.id + " - " + item.nama + "</a>" )
        .appendTo( ul );
    };
    $("#namasupplier").keyup(function(){
      if($(this).val()==""){
        $("#supplier_id").val("");
      }
    });

    $("#ppn").keyup(function(){
      console.log($(this));
      var grandtotal = parseInt($("[name=grandtotal]").val());
      var ppn = parseInt($("#ppn").val());
      ppn=isNaN(ppn)?0:ppn;
      var afterppn = grandtotal +(grandtotal * ppn/100);
      $("#afterppn").html('<input type="hidden" name="afterppn" value="'+afterppn+'">'+afterppn);
     });

    $("#kodebarang").autocomplete({
      source: "/master_bahan/search",
      open: function(){
        $("#namabarang").html("");
        $("#harga").html("0");
        $("#subtotal").html("0");
      },
      focus: function( event, ui ) {
        $("#kodebarang").val(ui.item.id);
        return false;
      },
      select: function( event, ui ) {
        $("#kodebarang").val(ui.item.id);
        $("#namabarang").html(ui.item.nama_bahan);
        $("#harga").html(ui.item.harga_beli);
        $("#subtotal").html("0");
        $("#harga").focus();
        return false;
      }
    }).data("ui-autocomplete")._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>" + item.id + " - " + item.nama_bahan + "</a>" )
        .appendTo( ul );
    };

    $("#kodebarang").keyup(function(){
      if($(this).val()==""){
        $("#namabarang").html("");
        $("#harga").html("");
          $("#subtotal").html("0");
      }
    });

    $("#qty, #harga").keyup(function(){
      var qty = getNumberValue($("#qty").val());
      var harga = $("#harga").val();
      if(!isNaN(qty) && qty != "" && !isNaN(harga) && harga != ""){
        qty = parseInt(qty);
        harga = parseInt(harga);
        $("#subtotal").html(qty*harga);
      }else{
        $("#subtotal").html("0");
      }
    });

    var countGrandtotal = function(){
      var detail = $("#detail tbody");
      if(detail.find(".empty-detail").length==0){
        var grandtotal = 0;
        var rows = detail.find("tr");
        for(i = 0; i < rows.length; i++){
          var row = $(rows[i]);
          var subtotal = parseInt(row.find("td:nth-child(5) input").val());
          grandtotal += subtotal;
        }
        $("#grandtotal").html('<input type="hidden" name="grandtotal" value="'+grandtotal+'">'+grandtotal); 
      }else{
        $("#grandtotal").html('<input type="hidden" name="grandtotal" value="0">0');
      }
    }

    var tambah = function(){
      if( $("#kodebarang").val() != "" && 
        $("#namabarang").html() != "" && 
        $("#harga").html() != "0" && 
        $("#qty").val() != "" && 
        $("#subtotal").html() != "0" ){
        var detail = $("#detail tbody");
        var isAvailable = false;

        if(detail.find(".empty-detail").length>0){
          detail.html("");
        }else{
          var rows = detail.find("tr");
          for(i = 0; i < rows.length; i++){
            var row = $(rows[i]);
            var kodebarang = row.find("td:nth-child(1) input").val();
            if(kodebarang == $("#kodebarang").val()){
              row.find("td:nth-child(3)").html($("#harga").html());
              var qty = parseInt(row.find("td:nth-child(4) input").val())+parseInt($("#qty").val());
              row.find("td:nth-child(4)").html(qty);
              var subtotal = qty*parseInt($("#harga").val())
              row.find("td:nth-child(5)").html('<input type="hidden" name="subtotal[]" value="'+subtotal+'">'+subtotal);
              isAvailable = true;
              break;
            }
          }
        }

        if(!isAvailable){
          var row = $(
            '<tr data-id="'+$("#kodebarang").val()+'">'+
                  '<td>'+
                    '<input type="hidden" name="kodebarang[]" value="'+$("#kodebarang").val()+'">'+
                    $("#kodebarang").val()+
                  '</td>'+
                  '<td>'+
                    '<input type="hidden" name="namabarang[]" value="'+$("#namabarang").html()+'">'+
                    $("#namabarang").html()+
                  '</td>'+
                  '<td>'+
                    '<input type="hidden" name="harga[]" value="'+$("#harga").val()+'">'+
                    $("#harga").val()+
                  '</td>'+
                  '<td>'+
                    '<input type="hidden" name="qty[]" value="'+$("#qty").val()+'">'+
                    $("#qty").val()+
                  '</td>'+
                  '<td>'+
                    '<input type="hidden" name="subtotal[]" value="'+$("#subtotal").html()+'">'+
                    $("#subtotal").html()+
                  '</td>'+
                  '<td>'+
                    '<a href="#" class="btn btn-danger input-block-level remove" data-id="'+$("#kodebarang").val()+'"><i class="icon-remove icon-white"></i>Remove</a>'+
                  '</td>'+
              '</tr>'
          );
          detail.append(row);
      }

      countGrandtotal();
      $("#kodebarang").val("");
      $("#namabarang").html("");
      $("#harga").val("");
      $("#qty").val("");
      $("#subtotal").html("0");
      $("#kodebarang").focus();
    }
      var grandtotal = parseInt($("[name=grandtotal]").val());
      var ppn = parseInt($("#ppn").val());
      ppn=isNaN(ppn)?0:ppn;
      var afterppn = grandtotal +(grandtotal * ppn/100);
      $("#afterppn").html('<input type="hidden" name="afterppn" value="'+afterppn+'">'+afterppn);
      return false;
    }

    $("#tambah").click(tambah);
    $("#kodebarang, #qty").keyup(function(e){
      if(e.keyCode ==  13){
        tambah();
      }
      return false;
    });


    $(document).on("click",".remove",function(){
      var id = $(this).data("id");
      $("tr[data-id="+id+"]").remove();

      var detail = $("#detail tbody");
      if(detail.find("tr").length == 0){
        detail.html('<tr class="empty-detail">'+
                            '<td colspan="6">Detail masih kosong</td>'+
                        '</tr>');
      }
      countGrandtotal();
      return false;
    });
    $(window).keydown(function(event){
      if(event.keyCode == 13) {
        event.preventDefault();
        return false;
      }
    });

    $("#form button[type=submit]").click(function(){
      if( $("#nopenjualan").val() != "" &&
        $("#tanggalpenjualan").val() != "" &&
        $("#kodepelanggan").val() != "" &&
        $("#detail .empty-detail").length == 0){
        return true;
      }
      return false;
    });

    $("#form button[type=reset]").click(function(){
      var detail = $("#detail tbody");
    detail.html('<tr class="empty-detail">'+
                        '<td colspan="6">Detail masih kosong</td>'+
                    '</tr>');
    countGrandtotal();
    });
});