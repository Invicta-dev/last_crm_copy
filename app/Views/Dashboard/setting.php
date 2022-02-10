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
                    <a href="#">Settings</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Settings
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="tabbable tabbable-tabdrop">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab1" data-toggle="tab">Customer Upload</a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab">Configuration</a>
                                </li>
                                <li>
                                    <a href="#tab3" data-toggle="tab">Location</a>
                                </li>
                                <li>
                                    <a href="#tab4" data-toggle="tab">Shipping</a>
                                </li>
                                <li>
                                    <a href="#tab5" data-toggle="tab">Coupons</a>
                                </li>
                                <li>
                                    <a href="#tab6" data-toggle="tab">Media Code</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <p> &nbsp; </p>
                                    <div class="col-md-6">
                                        <form action="<?= base_url('settings'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="control-label">Upload customer registry</label>
                                                <input class="form-control" type="file" name="importfile" />
                                            </div>
                                            <div class="form-actions left">
                                                <button type="reset" id="button-tos" class="btn default">Cancel</button>
                                                <button type="submit" class="btn blue">
                                                    <i class="fa fa-check"></i> Import</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <p> &nbsp; </p>
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th> Config Name </th>
                                                <th> Config Value </th>
                                                <th> Description </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> Currency </td>
                                                <td> £ </td>
                                                <td> Insert currency type here </td>
                                                <td>
                                                    <a class="edit-Config" data-toggle="modal" href="#edit-Config1-modal"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                                    <a class="delete-Config" href="javascript:;"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Pre Invoice Content </td>
                                                <td> Thank you for reposing your confidence in Nature's Healthcare and placing your order with us.<br> At Nature's Healthcare Ltd, our emphasis is on providing our customers with a healthy and a happy lifestyle. <br>We take pride in delivering some of the world’s finest and high quality supplements to our Customers. <br>We also have a dedicated team of health care advisors who are always available for any health related queries or questions, some friendly advice or to discuss the results of our products.
                                                    <br>We are always ready to help you. at all times. <br>Feel free to contact us and we will be at hand to serve you .
                                                    <br><br>
                                                    Thanking You,
                                                    <br><br>
                                                    Yours Sincerely,<br>
                                                    Nature's Healthcare
                                                </td>
                                                <td> Add here text you want to add in your mail and print above invoice </td>
                                                <td>
                                                    <a class="edit-Config" data-toggle="modal" href="#edit-Config2-modal"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                                    <a class="delete-Config" href="javascript:;"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Restricted IPs </td>
                                                <td></td>
                                                <td> Add allowed IPs </td>
                                                <td>
                                                    <a class="edit-Config" data-toggle="modal" href="#edit-Config3-modal"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                                    <a class="delete-Config" href="javascript:;"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> VAT </td>
                                                <td> 20 </td>
                                                <td> Insert VAT value here(in percentage) </td>
                                                <td>
                                                    <a class="edit-Config" data-toggle="modal" href="#edit-Config4-modal"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                                    <a class="delete-Config" href="javascript:;"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <p> &nbsp; </p>
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <a id="#" class="btn green" data-toggle="modal" href="#edit-location-modal"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                        <thead>
                                            <tr>
                                                <th> Company Code </th>
                                                <th> Company Address </th>
                                                <th> Company Phone </th>
                                                <th> Company Email </th>
                                                <!-- <th> Edit </th> -->
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> NHCHQ1 </td>
                                                <td> Margao </td>
                                                <td> 1234567890 </td>
                                                <td> support@invictaindia.in </td>
                                                <!-- <td>
                                                                <a class="edit" href="javascript:;"> Edit </a>
                                                            </td> -->
                                                <td>
                                                    <a class="edit-location" data-toggle="modal" href="#edit-location-modal"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                                    <a class="delete-location" href="javascript:;"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab4">
                                    <p> &nbsp; </p>
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <a id="#" class="btn green" data-toggle="modal" href="#edit-shipping-modal"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                        <thead>
                                            <tr>
                                                <th> Name </th>
                                                <th> Shipping Charges </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> First Class Big (Above £100) </td>
                                                <td> 5.95 </td>
                                                <td>
                                                    <a class="edit-shipping" data-toggle="modal" href="#edit-shipping-modal"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                                    <a class="delete-shipping" href="javascript:;"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> First Class Small (Below £100) </td>
                                                <td> 3.95 </td>
                                                <td>
                                                    <a class="edit-shipping" data-toggle="modal" href="#edit-shipping-modal"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                                    <a class="delete-shipping" href="javascript:;"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Free </td>
                                                <td> 0.00 </td>
                                                <td>
                                                    <a class="edit-shipping" data-toggle="modal" href="#edit-shipping-modal"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                                    <a class="delete-shipping" href="javascript:;"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> FNext Day Courier </td>
                                                <td> 7.95 </td>
                                                <td>
                                                    <a class="edit-shipping" data-toggle="modal" href="#edit-shipping-modal"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                                    <a class="delete-shipping" href="javascript:;"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Second Class (Below £100) </td>
                                                <td> 2.95 </td>
                                                <td>
                                                    <a class="edit-shipping" data-toggle="modal" href="#edit-shipping-modal"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                                    <a class="delete-shipping" href="javascript:;"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab5">
                                    <p> &nbsp; </p>
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <a id="#" class="btn green" data-toggle="modal" href="#edit-coupon-modal"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                        <thead>
                                            <tr>
                                                <th> Coupon Code </th>
                                                <th> Discount (%) </th>
                                                <th> Validity </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> Discount Flat </td>
                                                <td> 20 </td>
                                                <td> 2016-10-07 </td>
                                                <td>
                                                    <a class="edit-coupon" data-toggle="modal" href="#edit-coupon-modal"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                                    <a class="delete-coupon" href="javascript:;"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab6">
                                    <p> &nbsp; </p>
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <a id="#" class="btn green" data-toggle="modal" href="#edit-location-modal"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                        <thead>
                                            <tr>
                                                <th> Company Code </th>
                                                <th> Company Address </th>
                                                <th> Company Phone </th>
                                                <th> Company Email </th>
                                                <!-- <th> Edit </th> -->
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> NHCHQ1 </td>
                                                <td> Margao </td>
                                                <td> 1234567890 </td>
                                                <td> support@invictaindia.in </td>
                                                <!-- <td>
                                                                <a class="edit" href="javascript:;"> Edit </a>
                                                            </td> -->
                                                <td>
                                                    <a class="edit-location" data-toggle="modal" href="#edit-location-modal"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                                    <a class="delete-location" href="javascript:;"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
<div id="edit-Config1-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Edit Setting : Currency</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                    <form action="#" class="horizontal-form">
                        <div class="form-body">
                            <!-- <h3 class="form-section">Person Info</h3> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="text-center"><b>Insert currency type here</b></p>
                                        <label class="control-label">Config Value</label>
                                        <input type="text" id="Currency" class="form-control" value="£">
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
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
<div id="edit-Config2-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Edit Setting : Pre Invoice Content</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                    <form action="#" class="horizontal-form">
                        <div class="form-body">
                            <!-- <h3 class="form-section">Person Info</h3> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="text-center"><b>Add here text you want to add in your mail and print above invoice</b></p>
                                        <label class="control-label">Config Value</label>
                                        <textarea class="form-control" rows="3" readonly="true">Thank you for reposing your confidence in Nature's Healthcare and placing your order with us. At Nature's Healthcare Ltd,  our emphasis is on providing our customers with a healthy and a happy lifestyle. We take pride in delivering some of the world’s finest and high quality supplements to our customers. We also have a dedicated team of health care advisors who are always available for any health related queries or questions, some friendly advice or to discuss the results of our products.<br>
                                                We are always ready to help you. at all times. Feel free to contact us and we will be at hand to serve you .<br><br>
                                                Thanking You,<br><br>
                                                Yours Sincerely,<br>
                                                Nature's Healthcare</textarea>
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
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
<div id="edit-Config3-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Edit Setting : Restricted IPs</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                    <form action="#" class="horizontal-form">
                        <div class="form-body">
                            <!-- <h3 class="form-section">Person Info</h3> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="text-center"><b>Add allowed IPs</b></p>
                                        <label class="control-label">Config Value</label>
                                        <textarea class="form-control" rows="3" readonly="true"></textarea>
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
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
<div id="edit-Config4-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Edit Setting : VAT</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                    <form action="#" class="horizontal-form">
                        <div class="form-body">
                            <!-- <h3 class="form-section">Person Info</h3> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="text-center"><b>Insert VAT value here(in percentage)</b></p>
                                        <label class="control-label">Config Value</label>
                                        <input type="text" id="Vatvalue" class="form-control" value="20">
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
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
<div id="edit-location-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add New Locations</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                    <form action="#" class="horizontal-form">
                        <div class="form-body">
                            <!-- <h3 class="form-section">Person Info</h3> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Company Code</label>
                                        <input type="text" id="companyCode" class="form-control input-sm" value="">
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Company Address</label>
                                        <textarea class="form-control input-sm" rows="3" readonly="true"></textarea>
                                        <!-- <span class="help-block"> This field has error. </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Company Phone</label>
                                        <input type="text" id="companyPhone" class="form-control input-sm" placeholder="">
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Company Email</label>
                                        <input type="text" id="companyEmail" class="form-control input-sm" value="">
                                        <!-- <span class="help-block"> This field has error. </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
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
<div id="edit-shipping-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add New Shipping</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                    <form action="#" class="horizontal-form">
                        <div class="form-body">
                            <!-- <h3 class="form-section">Person Info</h3> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Shipping Name</label>
                                        <input type="text" id="shippingName" class="form-control">
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Shipping Charges</label>
                                        <input type="text" id="shippingCharges" class="form-control">
                                        <!-- <span class="help-block"> This field has error. </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
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
<div id="edit-coupon-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add a Coupon</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                    <form action="#" class="horizontal-form">
                        <div class="form-body">
                            <!-- <h3 class="form-section">Person Info</h3> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Coupon Code</label>
                                        <input type="text" id="couponCode" class="form-control">
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Discount (%)</label>
                                        <input type="text" id="couponDiscount" class="form-control">
                                        <!-- <span class="help-block"> This field has error. </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Validity</label>
                                        <input type="text" id="couponValidity" class="form-control">
                                        <!-- <span class="help-block"> This field has error. </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
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
<script src="<?= base_url(); ?>assets/pages/js/table-datatables-editable.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<?php if (session()->getFlashdata('error')) : ?>
    <script>
        swal("Sorry!", "<?= session()->getFlashdata("error") ?>", "error");
    </script>
<?php elseif (session()->getFlashdata('success')) : ?>
    <script>
        swal("success!", "<?= session()->getFlashdata("success") ?>", "success");
    </script>
<?php endif; ?>