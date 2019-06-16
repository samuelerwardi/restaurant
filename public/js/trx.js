

$(function(){
  // $(".datepicker").datepicker().on("changeDate", function(ev){                 
  //     $(this).datepicker("hide");
  // });
  // $(".datepicker").keydown(function(){return false;});
  var afterppn = 0
  const errorMessageQty = "Stok Habis";
  $(".remove").on("click",function(){
    $(this).parents("tr").remove();
    countGrandtotal();
    $("#ppn").keyup();
    return false;
  });
  // $.showHideMenu();
  $("#ppn").keyup(function(){
      var grandtotal = parseInt($("[name=grandtotal]").val());
      var ppn = parseInt($("#ppn").val());
      if (!isNaN(ppn)) {
      afterppn = grandtotal +(grandtotal * ppn/100);
      }
      else
      {
        ppn = 0;
        afterppn = grandtotal;
      }
      $("#afterppn").html('<input type="hidden" name="afterppn" value="'+afterppn+'">'+afterppn);
      $("#cash").val(afterppn);
      if (($("#combocustomer").val()!="newCustomer") || ($("#combocustomer").val()!="")){
            $("#cash").keyup(function(){
              console.log(grandtotal+"--"+ppn);
              var afterppn = grandtotal +(grandtotal * ppn/100);
              console.log("err : "+afterppn);
              $("#kredit").val(afterppn-$("#cash").val());
          });
          // console.log($("[name=afterppn]").val());
        }
      else{
          $("#kredit").val('0');
      }
      $('#cash').keyup();    
  });

  // Buat Edit Nota
  $(document).on("click",".btn_edit",function(){
      var parent= $(this).parents("tr");
      parent.find("td:nth-child(4) [type=hidden]").attr("type","number");
      parent.find("td:nth-child(4) [type=number]+span").hide();
  });

  $(document).on("keyup","#detail td:nth-child(4) [type=number]",function(){
        var parent= $(this).parents("tr");
        var harga= parent.find("td:nth-child(3) [type=hidden]").val();
        var qty=parseInt($(this).val());
        var subtotal = harga * qty;
        parent.find("td:nth-child(5)").html('<input type="hidden" name="subtotal[]" value="'+subtotal+'">'+subtotal );

        countGrandtotal();
        // ppn();
    });

  $("#cabang").change(function(){
      $("#namapelanggan").blur(function(){$("#cabang").change()});
      $.ajax({
          url:"master_customer/allToko",
          type:"post",
          data:{cabang:$("#cabang").val(),
                customer:$("#kodepelanggan").val()},
          success:function(data){ 
            $("#namatoko").html("");
            for(i = 0; i < data.length; i++){
                $("#namatoko").append("<option value='"+data[i].kode_customer+"'>"+data[i].nama_customer+"</option>");
            console.log("test"); 
            }
            $('#namatoko').trigger("liszt:updated");
            $("#namatoko").change();
            $('#cabang').trigger("liszt:updated");
          }
      });
  });
  customer=null;


    $("#kodebarang").autocomplete({
      source: "/product/search",
      open: function(){
        $("#namabarang").html("");
        $("#harga").html("");
        $("#subtotal").html("0");
      },
      focus: function( event, ui ) {
        $("#kodebarang").val(ui.item.id);
        return false;
      },
      select: function( event, ui ) {
        $("#kodebarang").val(ui.item.id);
        $("#namabarang").html(ui.item.produk_nama);
        $("#harga").html(ui.item.harga_jual);
        console.log(ui.item.produk_nama);
        // $("#category")
        category = ui.item.category;
        $("#subtotal").html("0");
        $("#qty").focus();
        return false;
      }
    }).data("ui-autocomplete")._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>" + item.id + " - " + item.produk_nama + "</a>" )
        .appendTo( ul );
    };
    $("#kodebarang").keyup(function(){
      if($(this).val()==""){
        $("#namabarang").html("");
        $("#harga").html("");
          $("#subtotal").html("0");
      }
    });

    // $("#kodebarang").scannerDetection(function(){
    //   $.ajax({
    //         url:"/product/search/"+$(this).val(),
    //         success: function(data){
    //           console.log(data);
    //           $("#namabarang").html(data.nama_barang);
    //           $("#harga").html(data.harga_jual);
    //           $("#qty").focus();
    //         }
    //       });
    //   });

    $("#qty, #harga").keyup(function(){
      var qty = $("#qty").val();
      var harga = $("#harga").html();
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
      $('#ppn').keyup();
      $('#cash').keyup();
    }
    isEnough = false;
    category ="";
    var tambah = function(){
      if (isEnough) {
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
              row.find("td:nth-child(3)").html('<input type="hidden" name="harga[]" value="'+$("#harga").html()+'">'+$("#harga").html());
              var qty = parseInt(row.find("td:nth-child(4) input").val())+parseInt($("#qty").val());
              row.find("td:nth-child(4)").html('<input type="hidden" name="qty[]" value="'+qty+'">'+qty);
              var subtotal = qty*parseInt($("#harga").html())
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
                    '<input type="hidden" name="harga[]" value="'+$("#harga").html()+'">'+
                    $("#harga").html()+
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
      $("#harga").html("");
      $("#qty").val("");
      $("#subtotal").html("0");
      $("#kodebarang").focus();
      console.log("PPn : "+afterppn);
      if (afterppn=='' || afterppn==0) {
        afterppn = $("[name=grandtotal]").val();
      };
      $("#afterppn").html('<input type="hidden" name="afterppn" value="'+afterppn+'">'+afterppn);
    }


      };

      return false;
    }

    $("#tambah").click(tambah);
    $("#kodebarang, #qty").keyup(function(e){
      if(e.keyCode ==  13){
        tambah();
      }
      return false;      
    });
    $("#qty").keyup(function(){
        $.ajax({
          url:"/product/validate_stok",
          type:"post",
          data:{id:$("#kodebarang").val(),qty:$("#qty").val()},
            success:function(data){
              if (data.errors.length > 0){
                  isEnough=false;
                  $("#response").fadeIn('slow');
                  $("#response").html(errorMessageQty);
              }
              else{
                isEnough=true;
                $('#response').fadeOut('slow');
              }
            }
        });
    });
    $("[name='qty[]']").keyup(function(){
          var id = $($(this).parent().siblings()[0]).find("input").val();
          var response = $(this).siblings(".error-container").find(".response");
          $.ajax({
            url:"/product/validate_stok",
            type:"post",
            data:{id : id, qty: $(this).val()},
            // data:{id:$("#kodebarang").val(),qty:$("[name='qty[]']").val()},
              success:function(data){
                if (data=="OUT OF STOCK"){
                  // alert("OUT");
                  // isEnough=false;
                  console.log(response);
                  response.fadeIn();
                  response.html(data);
                }else{
                                console.log(response);
                  // alert("isEnough");
                  // isEnough=true;
                  response.fadeOut();
                }
              }
          });
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

    $("#form button[type=submit]").click(function(e){
      var sumTotal=$("#cash").val()+$("#kredit").val();
      // console.log(e);
      if( 
        $(".error.response:visible").length == 0 &&
        $("#nopenjualan").val() != "" &&
        $("#tanggalpenjualan").val() != "" &&
        $("#kodepelanggan").val() != "" &&
        $("#afterppn")!=sumTotal &&
        $("#detail .empty-detail").length == 0){
        // alert(sumTotal);
        $.ajax({
          url: "/transaksi_penjualan/validasi_hutang",
          type:"post",
          data:{no_anggota:$("#combocustomer").val(),nominal_kredit:$("#kredit").val()},
            success:function(data){
              // console.log(data);
              if (data.length>0){
                    swal('',data,'error');
                    console.log(data);
                return false;
              }else{
                // console.log("samuel");
                return true;
              }
            }
        });
      }
      // alert(sumTotal);
      else{
        // alert("samu");
        return false;
      }
    });

    $("#form button[type=reset]").click(function(){
      var detail = $("#detail tbody");
    detail.html('<tr class="empty-detail">'+
                        '<td colspan="6">Detail masih kosong</td>'+
                    '</tr>');
    countGrandtotal();
    });
});