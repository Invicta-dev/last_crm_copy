<?= $this->include('includes/header'); ?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?= base_url(); ?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<?= $this->include('includes/sidebar'); ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Add new order</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Add New Order
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <form action="<?=base_url('process_order');?>" method="post" accept-charset="utf-8" class="form-horizontal">
                            <h3 class="page-title"> Order Info</h3>
                            <div class="container">

                                <div class="form-group col-md-6" style="padding-left: 0;">
                                    <div class="col-md-12"><label>Customer ID: </label><b><?= $customers_details['customer_id'];?></b></div><br>
                                    <div class="col-md-12"><label>Customer Name: </label><b><?= $customers_details['name'].'&nbsp'. $customers_details['lname'];?></b></div><br>
                                    <div class="col-md-12"><label>Address 1: </label><b> <?= $customers_details['address'];?></b></div><br>
                                    <div class="col-md-12"><label>Address 2: </label><b><?= $customers_details['add2'];?></b></div><br>
                                    <div class="col-md-12"><label>Town: </label><b><?= $customers_details['city'];?></b></div><br>
                                    <div class="col-md-12"><label>Country: </label><b><?= $customers_details['country'];?></b></div><br>
                                    <div class="col-md-12"><label>Zip Code: </label><b><?= $customers_details['zip_code'];?></b></div><br>
                                </div>
                                <div class="form-group col-md-6 pull-right">
                                    <div class="col-md-12"><label>Order Id: </label><b><?= $Order_id; ?></b></div>
                                    
                                    <div class="col-md-12"><label>Order Date: </label><b><?= date('Y-m-d'); ?></b></div>
                                    <div class="col-md-10">
                                        <div class="col-md-3" style="padding-left: 0;"><label>Order Status: </label></div>
                                        <div class="col-md-6" style="padding-left: 0;">
                                        <select class="form-control input-sm"  id="order_status"data-placeholder="Select Status" tabindex="pending">
                                                <option value="pending">Pending</option>
                                                <option value="processed">Processed</option>
                                                <option value="shipped">Shipped</option>
                                                <option value="delivered">Delivered</option>
                                            </select></div>
                                    </div>
                                </div>
                            </div>
                          <!-- <form>   -->
                          <input type="hidden" name="ord_id"  id="fprdOrd_id" value="<?= $Order_id; ?>">
                          <input type="hidden" id="prdOrd_id" value="<?= $oor_id;?>">
                          <input type="hidden" name="f_subtotal" id="subtotal_instance">
                          <input type="hidden" name="f_total" id="total_instance">
                          <input type="hidden" name="f_custId" id="prdCust_id" value="<?= $customers_details['id'];?>">
                          <input type="hidden" name="f_agentId" id="prdAgnt_id" value="<?= session()->get('userId');?>">
                         
                          
                        <!-- </form> -->
                    </div>
                </div>
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <h3 class="page-title"> Order Details</h3><br>
                        <!-- <div class="col-md-12 margin-bottom-40">
                            <label class="col-md-1 control-label" for="offer_code">Media Code</label>
                            <div class="col-md-2" style="padding-left: 0;"><select class="form-control input-sm" data-placeholder="Select Status" tabindex="1">
                                    <option value="1">AWP001</option>
                                    <option value="2">Processing</option>
                                    <option value="3">Shipping</option>
                                    <option value="4">Delivered</option>
                                </select></div>
                            <label class="col-md-1 control-label" for="offer_code">Coupon Code</label>
                            <div class="col-md-2" style="padding-left: 0;"><select class="form-control input-sm" data-placeholder="Select Status" tabindex="1">
                                    <option value="1">NHC2tEq</option>
                                    <option value="2">Processing</option>
                                    <option value="3">Shipping</option>
                                    <option value="4">Delivered</option>
                                </select></div>
                            <label class="col-md-1 control-label" for="offer_code">Order Source</label>
                            <div class="col-md-2" style="padding-left: 0;"><select class="form-control input-sm" data-placeholder="Select Status" tabindex="1">
                                    <option value="0" selected="">Please Select</option>
                                    <option value="1">Telephone</option>
                                    <option value="2">Inbound</option>
                                    <option value="3">Mail</option>
                                    <option value="4">Web</option>
                                    <option value="5">OTP</option>
                                </select></div>
                            <label class="col-md-1 control-label" for="offer_code">Dispatch Date</label>
                            <div class="col-md-2" style="padding-left: 0;"><input type="date" class="form-control input-sm"></div>
                        </div> -->
                        <table id="my-table" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                <th style="background-color: green; color:#fff;"> </th>
                                    <th style="background-color: green; color:#fff;"> Product Name </th>
                                    <th style="background-color: green; color:#fff;"> Product Code </th>
                                    <th style="background-color: green; color:#fff;"> Sales Price </th>
                                    <th style="background-color: green; color:#fff;"> Discount (%) </th>
                                    <th style="background-color: green; color:#fff;"> Quantity </th>
                                    <th style="background-color: green; color:#fff;"> Back Order </th>
                                    <th style="background-color: green; color:#fff;"> Total </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="dynamic">
                                <td><input type='checkbox' name='record' disabled></td>
                                    <td>
                                    <input type="text" class="form-control small" id="searchProduct" autocomplete="off" />
                                    <div id="product-list"></div>
                                    </td>
                                    <td>
                                    <input type="text" class="form-control small" id="productCode" autocomplete="off" />
                                    <div id="product-code"></div>
                                    </td>
                                   
                                
                                
                            </tbody>
                        </table>
                        <button type="button" class="delete-row btn green">Remove</button>
                        <br>
                        <div class="container">
                            <div class="col-md-4 pull-right">
                                <label>Subtotal: </label><b  id="subtotal"  class="pull-right"> 0.00</b><br>
                                <label class="text-muted">Product Value: </label><b id="prd_value" class="pull-right text-muted"> 0.00</b><br>
                                <label class="text-muted">VAT +: </label><b id="vat" class="pull-right text-muted"> 0.00</b><br>
                                <div style="display: inline-flex;">
                                    <label>Shipping:&nbsp;&nbsp;</label>
                                    <select class="form-control input-sm pull-right" name="ship_cost" id="shipping" data-placeholder="Select Status" required style="margin-left: 2.5rem;" >
                                        <option value="" selected disabled>---Select shipping cost--- </option> 
                                        <option value="5.95">First Class Big (Above £100) ( £5.95 ) </option>
                                        <option value="3.95">First Class Small (Below £100) ( £3.95 ) </option>
                                        <option value="0.00">Free ( £0.00 ) </option>
                                        <option value="7.95">Next Day Courier ( £7.95 ) </option>
                                        <option value="2.95">Second Class (Below £100) ( £2.95 ) </option>
                                    </select><br>
                                </div><br>
                                <label>Total: </label><b id="total" class="pull-right"> 00.00</b><br>
                                <div class="pull-right margin-top-20">
                                    <!-- <input type="submit"   value="Proceed" class="btn green"></input> -->
                                    <button type="button" id="proceed" class="btn green">Proceed</button>
                                    <button type="button" class="btn default">Cancel</button>
                                </div>
</form>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
</div>


<!-- END CONTAINER -->
<?= $this->include('includes/footer'); ?>

<script type="text/javascript" language="javascript">
$(document).ready(function() {
        $('#searchProduct').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "<?= base_url(); ?>/listproducts",
                    type: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#product-list').fadeIn();
                        $('#product-list').html(data);
                        $("#my-table tr").each(function(){
                         var currentRow=$(this);
                         
                          
                         var column_val = currentRow.find("td:eq(2)").text();

                           $('#product'+column_val).hide();
                        });
                    }


                });
            } else {
                $('#product-list').fadeOut();
                $('#product-list').html("");

            }
        });

        $('#productCode').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "<?= base_url(); ?>/listprdCode",
                    type: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#product-code').fadeIn();
                        $('#product-code').html(data);
                        $("#my-table tr").each(function(){
                         var currentRow=$(this);
                         
                          
                         var column_val = currentRow.find("td:eq(2)").text();

                           $('#productcode'+column_val).hide();
                        });
                    }


                });
            } else {
                $('#product-code').fadeOut();
                $('#product-code').html("");

            }
        });
           //To pick the product name from the list
        $(document).on('click', '#product-list li', function() {
            $('#searchProduct').val($(this).text());
            $('#product-list').fadeOut();
            let value = $('#searchProduct').val();//get the value from the field  productname
              if(value !='')
              {
                  var count=$('#my-table tr'). length; 

                $.ajax({
                    url: "<?= base_url(); ?>/GetValue",
                    type: "POST",
                    data: {
                        id: value,count:count
                    },
                    success: function(data) {
                        //prepend new row to the table
                        $('table').prepend(data);

                        //code to calc subtotal
                        var col1_value=0;

                        $("#my-table tr").each(function(){
                         var currentRow=$(this);
                         
                          
                         var column_val =  parseFloat(currentRow.find("td:eq(7)").text());
                         if(!isNaN(column_val))
                         {
                        
                             col1_value += column_val;
        
                         }
                       
                        });
                        $("#subtotal").text(parseFloat(col1_value).toFixed(2));
                       
                           //endof code to calc subtotal

                            //  calc Product value
                         var price_withoutVat= (parseFloat(col1_value) / 1.2).toFixed(2);
                         $('#prd_value').text(parseFloat(price_withoutVat).toFixed(2));

                        //calc VAT
                        var vat = parseFloat(col1_value - price_withoutVat).toFixed(2);
                        $('#vat').text(vat);
                        

                        $('#searchProduct').val('');// use to clear the text in searchable textbox
                    }


                });
              }
             
              
        });
        $(document).on("change",".orderQty",function(){
               //code that's working like a charm
                 var total =0;
                   var sum=0;
                //   var count = $('.rowCount').val();//get row count 
             
                  var count = $('.rowCount'+this.id).val();//get changed qty field id
               
                        
                 
                $('#orderQty'+count).each(function() {
                    
                   
                  var indiv_prd_price= parseFloat($("#product_price"+count).val());
                  var indiv_prd_qty= parseFloat($("#orderQty"+count).val());
                    sum += parseFloat((indiv_prd_qty * indiv_prd_price)).toFixed(2);
                    // console.log(indiv_prd_price);
                    // console.log(indiv_prd_qty);
                
                  }); 
               
                  
                   
                 
                
                $('#prdtotal'+count).text(parseFloat(sum).toFixed(2));
                 
                   //code to calc subtotal
                   var col1_value=0;
                $("#my-table tr").each(function(){
                         var currentRow=$(this);
                         
                          
                         var column_val =  parseFloat(currentRow.find("td:eq(7)").text());
                         if(!isNaN(column_val))
                         {
                        
                            col1_value += column_val;
                           
        
                         }
                       
                        });

                        $("#subtotal").text(parseFloat(col1_value).toFixed(2));
                           //endof code to calc subtotal
                         
                        //  calc Product value
                         var price_withoutVat= (parseFloat(col1_value) / 1.2).toFixed(2);
                         $('#prd_value').text(parseFloat(price_withoutVat).toFixed(2));

                        //calc VAT
                        var vat = parseFloat(col1_value - price_withoutVat).toFixed(2);
                        $('#vat').text(vat);
                        

                
                });
          //To pick the product code from the list
          $(document).on('click','#product-code li', function() {
            $('#productCode').val($(this).text());
            $('#product-code').fadeOut();
            let value = $('#productCode').val();//get the value from the field  productcode
              if(value !='')
              {
                $.ajax({
                    url: "<?= base_url(); ?>/GetValue",
                    type: "POST",
                    data: {
                        prdcode: value
                    },
                    success: function(data) {
                        $('table').prepend(data);

                         //code to calc subtotal
                         var col1_value=0;

                         $("#my-table tr").each(function(){
                           var currentRow=$(this);
 
  
                           var column_val =  parseFloat(currentRow.find("td:eq(7)").text());
                           if(!isNaN(column_val))
                           {

                              col1_value += column_val;

                            }

                         });
                        $("#subtotal").text(parseFloat(col1_value).toFixed(2));
                      
                         //endof code to calc subtotal

                         //  calc Product value
                       var price_withoutVat= (parseFloat(col1_value) / 1.2).toFixed(2);
                      $('#prd_value').text(parseFloat(price_withoutVat).toFixed(2));

                           //calc VAT
                    var vat = parseFloat(col1_value - price_withoutVat).toFixed(2);
                    $('#vat').text(vat);

                        $('#productCode').val('');
                    }


                });
              }

        });
        
      
             

        });
         //calc total when shipping price is added
        $(document).on('change','#shipping',function(){
           var sub_total =  $("#subtotal").text();
           var shipping= $(this).val()
           var total;
           total =(parseFloat(sub_total) + parseFloat(shipping)).toFixed(2);
            $('#total').text(total);
            $('#total_instance').val(total);//to add value to hidden field


        });



        // Find and remove selected table rows
     $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                 var minus_price = $(this).parents("tr").find("td:eq(7)").text();
                 var sub_total =  $("#subtotal").text();
                 var calcSubtotal = (parseFloat(sub_total)  - parseFloat(minus_price)).toFixed(2);
                 
                 $("#subtotal").text(calcSubtotal);
                 //  calc Product value
                 var price_withoutVat= (parseFloat(calcSubtotal) / 1.2).toFixed(2);
                         $('#prd_value').text(parseFloat(price_withoutVat).toFixed(2));

                        //calc VAT
                        var vat = parseFloat(calcSubtotal - price_withoutVat).toFixed(2);
                        $('#vat').text(vat);

                    $(this).parents("tr").remove();
                }
            });
        });

          //code to display tooltip when hovered over product name
        $( function() {
          $( document ).tooltip();
        } );

     $("#proceed").on('click',function(){

        
 
           var arrData=[];
           var ord_details=[];
          // loop over each table row (tr)
         $("#my-table tr").each(function(){
              var currentRow=$(this);
  
         var col1_value=currentRow.find("td:eq(1)").text();
         var col2_value=currentRow.find("td:eq(2)").text();
          var col3_value=currentRow.find("td:eq(3)").text();
          var col5_value= currentRow.find(".orderQty").val();
          var col7_value=currentRow.find("td:eq(7)").text();

         var obj={};//obj that contain product details of the order placed
        //   obj.prd_name=col1_value;
        obj.order_id=$('#prdOrd_id').val();
        obj.product_id=col2_value;
        //  obj.prd_price=col3_value;
         obj.qty=col5_value;
        //  obj.prd_total=col7_value;
          arrData.push(obj);
       });

        //code to calc subtotal
        var col1_value=0;

          $("#my-table tr").each(function(){
           var currentRow=$(this);
 
  
           var column_val =  parseFloat(currentRow.find("td:eq(7)").text());
           if(!isNaN(column_val))
            {

               col1_value += column_val;

            }

              });
           $("#subtotal_instance").val(parseFloat(col1_value).toFixed(2));

   //endof code to calc subtotal
        var customerdetails={};
         customerdetails.order_no=$('#fprdOrd_id').val();
         customerdetails.shipping_cost=$('#shipping').val();
         customerdetails.subtotal=$('#subtotal_instance').val();
         customerdetails.total=$('#total_instance').val();
         customerdetails.order_customer_id=$('#prdCust_id').val();	
         customerdetails.order_agent_id=$('#prdAgnt_id').val();
         customerdetails.order_status=$('#order_status').val();
        //  get current date for field updated at
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();

        var output = d.getFullYear() + '-' +
           ((''+month).length<2 ? '0' : '') + month + '-' +
              ((''+day).length<2 ? '0' : '') + day;
        customerdetails.updated_at= output;
        ord_details.push(customerdetails);

    //   console.log(ord_details);
      ord_data=JSON.stringify(ord_details);


       arrData.shift();//to remove the first element from array
       arrData.pop();//to remove  last element from array
    //   console.log(arrData);
      var paramJSON = JSON.stringify(arrData);//convert json obj to string before passing to the server
    //   console.log(paramJSON);
      
                $.ajax({
                    url: "<?= base_url(); ?>/process_order",
                    type: "POST",
                    data:{postData:paramJSON,ord_data:ord_data}, 
                    dataType:'JSON',
                   success: function(data) {
                    window.location.href =data;
                   
                 },
                 error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error in process order');
                }
                });

    });
</script>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<!-- <script src="./assets/pages/js/table-datatables-editable.min.js" type="text/javascript"></script> -->
<script src="<?= base_url() ?>/assets/pages/js/table-datatables-editable.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>/assets/pages/js/components-select2.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

