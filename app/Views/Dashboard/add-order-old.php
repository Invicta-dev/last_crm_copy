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
                        <form action="#" method="post" accept-charset="utf-8" class="form-horizontal">
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
                                        <div class="col-md-6" style="padding-left: 0;"><select class="form-control input-sm" data-placeholder="Select Status" tabindex="1">
                                                <option value="1">Pending</option>
                                                <option value="2">Processing</option>
                                                <option value="3">Shipping</option>
                                                <option value="4">Delivered</option>
                                            </select></div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                                    <th style="background-color: green; color:#fff;"> Sales Price </th>
                                    <th style="background-color: green; color:#fff;"> Discount (%) </th>
                                    <th style="background-color: green; color:#fff;"> Quantity </th>
                                    <th style="background-color: green; color:#fff;"> Back Order </th>
                                    <th style="background-color: green; color:#fff;"> Total </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td><input type='checkbox' name='record'></td>
                                    <td>
                                        <select id="product-dropdown" class="form-control input-sm select2-multiple">
                                               <option></option>
                                              <?php  foreach($products as $product): ?>
                                                <option  id="prd"value="<?= $product['product_code'] ?>"><?= $product['product_name']; ?></option>
                                                <?php endforeach; ?>
                                             
                                            </optgroup>
                                        </select>
                                    </td>
                                    <td> 19.95 </td>
                                    <td> 0.00 </td>
                                    <td> <input type="number" class="input-xsmall" id="orderQty" value="1"> </td>
                                    <td> 0.00 </td>
                                    <td> 39.00 </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <button type="button" class="delete-row">Delete Row</button>
                        <br>
                        <div class="container">
                            <div class="col-md-4 pull-right">
                                <label>Subtotal: </label><b class="pull-right"> 360.00</b><br>
                                <label class="text-muted">Product Value: </label><b class="pull-right text-muted"> 460.00</b><br>
                                <label class="text-muted">VAT +: </label><b class="pull-right text-muted"> 60.00</b><br>
                                <div style="display: inline-flex;">
                                    <label>Shipping:&nbsp;&nbsp;</label>
                                    <select class="form-control input-sm pull-right" data-placeholder="Select Status" tabindex="1" style="margin-left: 2.5rem;">
                                        <option value="1">First Class Big (Above £100) ( £5.95 ) </option>
                                        <option value="2">First Class Small (Below £100) ( £3.95 ) </option>
                                        <option value="3">Free ( £0.00 ) </option>
                                        <option value="4">Next Day Courier ( £7.95 ) </option>
                                        <option value="4">Second Class (Below £100) ( £2.95 ) </option>
                                    </select><br>
                                </div><br>
                                <label>Total: </label><b class="pull-right"> 367.95</b><br>
                                <div class="pull-right margin-top-20">
                                    <button type="submit" class="btn green">Proceed</button>
                                    <button type="button" class="btn default">Cancel</button>
                                </div>

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
 
$("#product-dropdown").attr("data-placeholder", "Select Product");
   

    $('select').on("change",function(){
         console.log("im here");
         var markup ="<tr><td><input type='checkbox' name='record'></td><td><select id='product-dropdown' class='form-control input-sm select2-multiple'><option></option><?php  foreach($products as $product): ?><option  id='prd' value="+'<?php echo $product['product_code'] ?>'+"><?php echo $product['product_name']; ?></option><?php endforeach; ?></select></td></tr>";
        $("#my-table tbody").append(markup);
    });

     // Find and remove selected table rows
     $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
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

