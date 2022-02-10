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
                    <a href="#">Customers Detais</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-5">
                <h3 class="page-title"> Customers Detais</h3>
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <form action="#" class="form-horizontal">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Customer ID</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="0002" readonly="true">
                                        <!-- <span class="help-block"> A block of help text. </span> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Title</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="Enter text" value="Mr">
                                        <!-- <span class="help-block"> A block of help text. </span> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="Bernard">
                                        <!-- <span class="help-block"> A block of help text. </span> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="Smith">
                                        <!-- <span class="help-block"> A block of help text. </span> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Address 1</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="Caudle Springs Farm">
                                        <!-- <span class="help-block"> A block of help text. </span> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Address 2</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="Caudle Springs Farm">
                                        <!-- <span class="help-block"> A block of help text. </span> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Town/City</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="Carbrooke">
                                        <!-- <span class="help-block"> A block of help text. </span> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">County</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="0">
                                        <!-- <span class="help-block"> A block of help text. </span> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Country</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="United Kingdom">
                                        <!-- <span class="help-block"> A block of help text. </span> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Post Code</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="PR4 6UT">
                                        <!-- <span class="help-block"> A block of help text. </span> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Phone</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="**********">
                                        <!-- <span class="help-block"> A block of help text. </span> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Do not call</label>
                                    <div class="col-md-8">
                                        <input type="checkbox" name="donotcall" value="1" />
                                        <!-- <span class="help-block"> A block of help text. </span> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Remark</label>
                                    <div class="col-md-8">
                                        <textarea class="form-control input-sm" rows="2" maxlength="150" placeholder="Add remark here ..."></textarea>
                                        <!-- <span class="help-block"> A block of help text. </span> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email</label>
                                    <div class="col-md-8">
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" />
                                        <!-- <span class="help-block"> A block of help text. </span> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Total Orders Placed</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="0" readonly>
                                        <!-- <span class="help-block"> A block of help text. </span> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Total Order Amount</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="0" readonly>
                                        <!-- <span class="help-block"> A block of help text. </span> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Refund total</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="0" readonly>
                                        <!-- <span class="help-block"> A block of help text. </span> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Credit notes</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="0" readonly>
                                        <!-- <span class="help-block"> A block of help text. </span> -->
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions fluid">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">Submit</button>
                                        <button type="button" class="btn default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <h3 class="page-title"> Order Details</h3>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <button id="#" class="btn green" onclick="window.location.href='./add-new-order.php';"> Add New
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                                <tr>
                                    <th> Order ID </th>
                                    <th> Order Date </th>
                                    <th> Total </th>
                                    <th> Agent </th>
                                    <!-- <th> Edit </th> -->
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> Order001 </td>
                                    <td> 24-11-2020 </td>
                                    <td> £ 60.00 </td>
                                    <td> Maria </td>
                                    <!-- <td>
                                                    <a class="edit" href="javascript:;"> Edit </a>
                                                </td> -->
                                    <td>
                                        <a class="edit-order" href="./edit-orders.php"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                        <a class="view-order" data-toggle="modal" href="#view-order-modal"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h3 class="page-title"> Customer Notes</h3>
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <table class="table table-striped table-hover" id="sample_editable_1">
                            <thead>
                                <tr>
                                    <th> Note Created </th>
                                    <th> Details </th>
                                    <!-- <th> Edit </th> -->
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 24-11-2020 </td>
                                    <td>Mrs. Tindale said received the 4 packets of Rosehip.</td>
                                    <!-- <td>
                                                    <a class="edit" href="javascript:;"> Edit </a>
                                                </td> -->
                                    <td>
                                        <a class="edit-notes" data-toggle="modal" href="#edit-notes-modal"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                        <a class="read-more" data-toggle="modal" href="#read-more-modal"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <form action="#" class="form-horizontal">
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <textarea class="form-control input-sm" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn green">Add new notes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
<div id="read-more-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">View the note added by agent (Name)</h4>
            </div>
            <div class="modal-body">
                <div>
                    <h2>Mrs. Tindale said received the 4 packets of Rosehip.</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="edit-notes-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Edit the note added by agent (Name)</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="form-group col-md-6">
                        <div class="col-md-8">
                            <label for="notes">Notes</label>
                            <textarea class="form-control" rows="3" readonly="true">Mrs. Tindale said received the 4 packets of Rosehip.</textarea><br>
                        </div>
                        <div class="col-md-8">
                            <label for="notes">Append changes</label>
                            <textarea class="form-control" rows="3"></textarea><br>
                        </div><br>
                        <div class="col-md-8">
                            <button type="button" class="btn green">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            <div class="form-group col-md-6" style="padding-left: 0;">
                                <div class="col-md-12"><label>Customer ID: </label><b> 0008</b></div><br>
                                <div class="col-md-12"><label>Customer Name: </label><b> Keith Howard</b></div><br>
                                <div class="col-md-12"><label>Customer Phone: </label><b> 1603781766</b></div><br>
                                <div class="col-md-12"><label>Customer Post Code: </label><b> NR12 8DU</b></div><br>
                            </div>
                            <div class="form-group col-md-6 pull-right">
                                <div class="col-md-12"><label>Order Id: </label><b> ORD1001</b></div>
                                <div class="col-md-12"><label>Order Date: </label><b> 2016-11-09</b></div>
                                <div class="col-md-12"><label>Agent: </label><b> archana.k2</b></div><br>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><label>Product Details:</label></div>
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th style="background-color: #E5FFCC;">Name</th>
                                                <th style="background-color: #E5FFCC;">Sales Price</th>
                                                <th style="background-color: #E5FFCC;">Quantity</th>
                                            </tr>
                                            <tr>
                                                <td>Nature's A-Z Vits</td>
                                                <td>30.00</td>
                                                <td>12</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="form-group col-md-6 pull-right">
                                <div class="col-md-12 pull-right">
                                    <label>Subtotal: </label><b> 360.00</b><br>
                                    <label>Shipping: </label><b> 7.95 (Next Day Courier )</b><br>
                                    <label>Total: </label><b> 367.95</b>
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
<script src="./assets/pages/js/table-datatables-editable.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->