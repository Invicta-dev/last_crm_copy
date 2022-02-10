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
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Edit order</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Edit Order
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
                                                <div class="col-md-12"><label>Customer ID: </label><b><?=$order[0]['customerCode'];?></b></div><br>
                                                <div class="col-md-12"><label>Customer Name: </label><b> <?=$order[0]['title'].' '.$order[0]['name'].' '.$order[0]['lname'];?></b></div><br>
                                                <div class="col-md-12"><label>Address 1: </label><b> <?=$order[0]['address'];?></b></div><br>
                                                <div class="col-md-12"><label>Address 2: </label><b> <?=$order[0]['add2'];?></b></div><br>
                                                <div class="col-md-12"><label>Town: </label><b><?=$order[0]['city'];?></b></div><br>
                                                <div class="col-md-12"><label>Country: </label><b> <?=$order[0]['country'];?></b></div><br>
                                                <div class="col-md-12"><label>Zip Code: </label><?=$order[0]['zip_code'];?></b></div><br>     
                                            </div>
                                            <div class="form-group col-md-6 pull-right">
                                                <div class="col-md-12"><label>Order Id: </label><b> <?=$order[0]['order_no'];?></b></div>
                                                <div class="col-md-12"><label>Order Date: </label><b> <?=$order[0]['updated_at'];?></b></div>
                                                <div class="col-md-10">
                                                    <div class="col-md-3" style="padding-left: 0;"><label>Order Status: </label></div>
                                                    <div class="col-md-6" style="padding-left: 0;"><select class="form-control input-sm" data-placeholder="Select Status" tabindex="1">
                                                        <?php if(!empty($order[0]['order_status']))
                                                        {
                                                           echo" <option  selected disabled>".$order[0]['order_status']."</option>";
                                                        }
                                                        ?>
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
                                    <!-- <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <button id="#" class="btn green"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <h3 class="page-title"> Order Details</h3><br>
                                    
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="background-color: green; color:#fff;"> Product Name </th>
                                                <th style="background-color: green; color:#fff;"> Product Code </th>
                                                <th style="background-color: green; color:#fff;"> Sales Price </th>                                                
                                                <!-- <th style="background-color: green; color:#fff;"> Discount (%) </th> -->
                                                <th style="background-color: green; color:#fff;"> Quantity </th>
                                                <!-- <th style="background-color: green; color:#fff;"> Back Order </th> -->
                                                <th style="background-color: green; color:#fff;"> Total </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($products as $product):?>
                                            <tr>
                                                <td><?=$product['product_name'];?></td>
                                                <td><?=$product['product_code'];?></td>
                                                <td><?=$product['product_price'];?></td>
                                                <td><?=$product['qty'];?></td>
                                                <td><?=$product['product_price']*$product['qty'];?></td>                                                                                            
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                   
                                    <div class="container">
                                        <div class="col-md-4 pull-right">
                                            <label>Subtotal: </label><b class="pull-right"><?=$order[0]['subtotal']?></b><br>
                                            
                                            <label class="text-muted">Shipping: </label><b class="pull-right text-muted"><?=$order[0]['shipping_cost']?></b><br>

                                            <!-- <div style="display: inline-flex;">
                                                <label>Shipping:&nbsp;&nbsp;</label>
                                                <select class="form-control input-sm pull-right" data-placeholder="Select Status" tabindex="1" style="margin-left: 2.5rem;">
                                                    <option value="1">First Class Big (Above £100) ( £5.95 ) </option>
                                                    <option value="2">First Class Small (Below £100) ( £3.95 ) </option>
                                                    <option value="3">Free ( £0.00 ) </option>
                                                    <option value="4">Next Day Courier ( £7.95 ) </option>
                                                    <option value="4">Second Class (Below £100) ( £2.95 )  </option>
                                                </select><br>
                                            </div><br>                                      -->
                                            <label>Total: </label><b class="pull-right"><?=$order[0]['total']?></b><br>
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
        <div id="view-user-modal" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Edit the details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                            <form action="#" class="horizontal-form">
                                <div class="form-body">
                                    <!-- <h3 class="form-section">Person Info</h3> -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">User name</label>
                                                <input type="text" id="userName" class="form-control" value="Helbin" disabled>
                                                <!-- <span class="help-block"> This is inline help </span> -->
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Created date</label>
                                                <input type="date" id="createdDate" class="form-control" value="11/06/2020" disabled>
                                                <!-- <span class="help-block"> This field has error. </span> -->
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Expense title</label>
                                                <input type="text" id="expenseTitle" class="form-control" placeholder="Change the title">
                                                <!-- <span class="help-block"> This is inline help </span> -->
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Total Amount</label>
                                                <input type="number" id="totalAmount" class="form-control" value="$200">
                                                <!-- <span class="help-block"> This field has error. </span> -->
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                <label class="control-label">Process</label>
                                                <select class="form-control" data-placeholder="Choose a Process" tabindex="1">
                                                    <option value="Category 1">UK</option>
                                                    <option value="Category 2">USA</option>
                                                    <option value="Category 3">CANADA</option>
                                                    <option value="Category 4">DOMESTIC</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Category</label>
                                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                    <option value="Category 1">Utilities</option>
                                                    <option value="Category 2">Grocery</option>
                                                    <option value="Category 3">Supplies</option>
                                                    <option value="Category 4">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Bill details</label>
                                                <input type="file" name="..." id="fileinput" class="form-control">
                                            </div>
                                        </div>
                                        <!--/span-->              
                                    </div>
                                    <!--/row-->
                                </div>
                                <div class="form-actions left">
                                    <button type="button" id="button-tos" class="btn default">Cancel</button>
                                    <button type="submit" class="btn blue">
                                        <i class="fa fa-check"></i> Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                        <button type="button" class="btn green">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="edit-user-modal" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Edit the details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                            <form action="#" class="horizontal-form">
                                <div class="form-body">
                                    <!-- <h3 class="form-section">Person Info</h3> -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">User name</label>
                                                <input type="text" id="userName" class="form-control" value="Helbin" disabled>
                                                <!-- <span class="help-block"> This is inline help </span> -->
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Created date</label>
                                                <input type="date" id="createdDate" class="form-control" value="11/06/2020" disabled>
                                                <!-- <span class="help-block"> This field has error. </span> -->
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Expense title</label>
                                                <input type="text" id="expenseTitle" class="form-control" placeholder="Change the title">
                                                <!-- <span class="help-block"> This is inline help </span> -->
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Total Amount</label>
                                                <input type="number" id="totalAmount" class="form-control" value="$200">
                                                <!-- <span class="help-block"> This field has error. </span> -->
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                <label class="control-label">Process</label>
                                                <select class="form-control" data-placeholder="Choose a Process" tabindex="1">
                                                    <option value="Category 1">UK</option>
                                                    <option value="Category 2">USA</option>
                                                    <option value="Category 3">CANADA</option>
                                                    <option value="Category 4">DOMESTIC</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Category</label>
                                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                    <option value="Category 1">Utilities</option>
                                                    <option value="Category 2">Grocery</option>
                                                    <option value="Category 3">Supplies</option>
                                                    <option value="Category 4">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Bill details</label>
                                                <input type="file" name="..." id="fileinput" class="form-control">
                                            </div>
                                        </div>
                                        <!--/span-->              
                                    </div>
                                    <!--/row-->
                                </div>
                                <div class="form-actions left">
                                    <button type="button" id="button-tos" class="btn default">Cancel</button>
                                    <button type="submit" class="btn blue">
                                        <i class="fa fa-check"></i> Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                        <button type="button" class="btn green">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTAINER -->       
   <?= $this->include('includes/footer'); ?> 
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <!-- <script src="./assets/pages/js/table-datatables-editable.min.js" type="text/javascript"></script> -->
    <script src="./assets/pages/js/table-datatables-editable.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->