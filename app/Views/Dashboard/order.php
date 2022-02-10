<?= $this->include('includes/header'); ?>
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
                                <a href="<?=base_url('dashboard');?>">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Orders</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> All Orders
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                        <thead>
                                            <tr>
                                                <th> Order ID </th>
                                                <th> Customer name </th>
                                                <th> Shipping_cost </th>                                                
                                                <th> Subtotal </th>
                                                <th> Total </th>
                                                <th> Agent </th>
                                                <th> Order Status </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($order_data as $orders):?>
                                            <tr>
                                                <td><?=$orders->order_no;?> </td>
                                                <td><?=$orders->title.' '.$orders->name.' '.$orders->lname;?> </td>
                                                <td> <?=$orders->shipping_cost;?> </td> 
                                                <td> <?=$orders->subtotal;?> </td>
                                                <td> <?=$orders->total;?> </td>
                                                <td> <?=$orders->agent_name;?></td>
                                                <td> <?=$orders->order_status;?> </td>                                                                                              
                                                <td>                                  
                                                    <a class="edit-order"  href="<?=base_url('edit-order/'.$orders->id);?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                                    <a class="view-order" data-toggle="modal" onclick="detail_view('<?=$orders->id;?>')" href="#view-order-modal"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                                                            
                                        </tbody>
                                    </table>
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
        <div id="view-order-modal" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Order details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="#" method="post" accept-charset="utf-8" class="form-horizontal">				  
                                <fieldset>
                                    <div class="form-group col-md-7" style="padding-left: 0;">
                                        <div class="col-md-12"><label >Customer ID: </label><b id="cust_Id"></b></div><br>
                                        <div class="col-md-12"><label>Customer Name: </label><b id="cust_name"></b></div><br>
                                        <div class="col-md-12"><label>Customer Phone: </label><b id="cust_phone"> </b></div><br>
                                        <div class="col-md-12"><label>Customer Post Code: </label><b id="cust_postCode"></b></div><br>   
                                    </div>
                                    <div class="form-group col-md-5 pull-right">
                                        <div class="col-md-12"><label>Order Id: </label><b id="ord_id"> </b></div>
                                        <div class="col-md-12"><label>Order Date: </label><b id="ord_date"></b></div>
                                        <div class="col-md-12"><label>Agent: </label><b id="ord_agent"> </b></div><br>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><label>Product Details:</label></div>
                                        <div class="col-md-12">
                                            <table class="table table-bordered">
                                                <thead><tr><th style="background-color: #E5FFCC;">Name</th><th style="background-color: #E5FFCC;">Sales Price</th><th style="background-color: #E5FFCC;">Quantity</th></tr></thead>
                                                 <tbody id="prdView">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 pull-right">
                                        <div class="col-md-12 pull-right">
                                            <label>Subtotal: </label><b id="ord_subtotal"></b><br>
                                            <label>Shipping: </label><b id="ord_shipping"></b><br>
                                            <label>Total: </label><b id="ord_total"></b>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>			    
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTAINER -->       
<?= $this->include('includes/footer'); ?> 
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <!-- <script src="./assets/pages/js/table-datatables-editable.min.js" type="text/javascript"></script> -->
    <script src="<?=base_url(); ?>/assets/pages/js/table-datatables-editable.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        function detail_view(id) {
        $.ajax({
            url: "<?= base_url(); ?>/productView",
            type: "Post",
            data: {
                orderId: id
            },
            success: function(data) {
                // console.log(data);
                var obj = JSON.parse(data); //convert string to object
                //console.log(obj.products[2].product_id);
                $('#cust_Id').text(obj.order[0].customerCode);
                $('#cust_name').text(obj.order[0].title +' '+obj.order[0].name+' '+obj.order[0].lname);
                $('#cust_phone').text(obj.order[0].phone);
                $('#cust_postCode').text(obj.order[0].zip_code);
                $('#reg_cust_town').text(obj.order[0].city);
                $('#reg_cust_county').text(obj.order[0].country);
                $('#address').text(obj.order[0].address);
                $('#ord_id').text(obj.order[0].order_no);
                $('#ord_date').text(obj.order[0].updated_at);
                $('#ord_agent').text(obj.order[0].agent_name);
                $('#ord_subtotal').text(obj.order[0].subtotal);
                $('#ord_shipping').text(obj.order[0].shipping_cost);
                $('#ord_total').text(obj.order[0].total);

                var len = obj.products.length;
                var txt = "";
                console.log(len);
                if (len > 0) {
                    for (var i = 0; i < len; i++) {
                        // alert(obj.batches[i].batch_num);
                        txt += "<tr><td>" + obj.products[i].product_name + "</td> <td>" + obj.products[i].product_price + "</td> <td>" + obj.products[i].qty + "</td> </tr>";
                    }
                    if (txt != "") {
                        $("#prdView").html(txt).removeClass("hidden");
                    }
                }

            }
        });
        }
        </script>