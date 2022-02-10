<?= $this->include('includes/header'); ?>
<link href="<?= base_url(); ?>/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />

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
                    <a href="#">Customers List</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Customers List
        </h3>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-6">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
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
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                                <tr>
                                    <!-- <th> Customer ID </th> -->
                                    <th> Full Name </th>
                                    <th> Contact Customer </th>
                                    <th> Last updated </th>
                                    <th> Status </th>
                                    <!-- <th> Edit </th> -->
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($customers)) :
                                    foreach ($customers as $customer) :
                                        if ($customer['status'] != "Callback") : ?>
                                            <tr>
                                                <!-- <td> C001 </td> -->
                                                <td> <?= $customer['title'] . '.' . ' ' . $customer['first_name'] . ' ' . $customer['last_name'] ?> </td>
                                                <td>
                                                    <?php switch ($customer['status']) {
                                                        case 'New':
                                                            echo ' <a href="tel:7798398684" class="btn btn-sm green"><i class="fa fa-phone"></i> Call Now </a>
                                                    <a href="' . base_url('order') . '/' . $customer['id'] . '" id="add-order"  data-toggle="confirmation" data-title="Are you sure you want to add this customer ?"data-popout="true" data-singleton="true" class="btn btn-sm green"> Add <i class="fa fa-plus"></i></a>';
                                                            break;

                                                        case 'Callback':
                                                            echo '<a href="tel:7798398684" class="btn btn-sm green"><i class="fa fa-phone"></i>' . $customer['call_back_time'] . '
                                                 </a>
                                                <a href="' . base_url('order') . '" id="add-order"  data-toggle="confirmation" data-title="Are you sure you want to add this customer ?"data-popout="true" data-singleton="true" class="btn btn-sm green"> Add <i class="fa fa-plus"></i></a>';
                                                            break;
                                                        case 'Added':
                                                            echo '<label class="btn btn-sm green"> Added</label>';
                                                    } ?>
                                                </td>
                                                <td> <?= $customer['updated_at'] ?></td>
                                                <td><span class="label label-sm label-success"><?= $customer['status'] ?></span></td>
                                                <!-- <td>
                                                    <a class="edit" href="javascript:;"> Edit </a>
                                                </td> -->
                                                <td>
                                                    <a class="view-Customer" data-toggle="modal" onclick="view_rawCustomer(<?= $customer['id']; ?>)" href="#view-customer-modal"> <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;</a>
                                                    <a class="edit-Customer" data-toggle="modal" onclick="edit_rawCustomer(<?= $customer['id']; ?>)" href="#edit-customer-modal"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                                </td>
                                            </tr>
                                <?php endif;
                                    endforeach;
                                endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
            <div class="col-md-6">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
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
                        <!-- callback table -->
                        <h3><b> Callbacks </b></h3><br>
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_2">
                            <thead>
                                <tr>
                                    <!-- <th> Customer ID </th> -->
                                    <th> Full Name </th>
                                    <th> Contact Customer </th>
                                    <th> Last updated </th>
                                    <th> Status </th>
                                    <!-- <th> Edit </th> -->
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($customers)) :
                                    foreach ($customers as $customer) :
                                        if ($customer['status'] == "Callback") : ?>
                                            <tr>
                                                <!-- <td> C001 </td> -->
                                                <td> <?= $customer['title'] . '.' . ' ' . $customer['first_name'] . ' ' . $customer['last_name'] ?> </td>
                                                <td>
                                                    <?php switch ($customer['status']) {
                                                        case 'New':
                                                            echo ' <a href="tel:7798398684" class="btn btn-sm green"><i class="fa fa-phone"></i> Call Now </a>
                                                    <a href="' . base_url('order') . '" id="add-order"  data-toggle="confirmation" data-title="Are you sure you want to add this customer ?"data-popout="true" data-singleton="true" class="btn btn-sm green"> Add <i class="fa fa-plus"></i></a>';
                                                            break;

                                                        case 'Callback':
                                                            echo '<a href="tel:7798398684" class="btn btn-sm green"><i class="fa fa-phone"></i>' . $customer['call_back_time'] . '
                                                 </a>
                                                <a href="' . base_url('order') . '" id="add-order"  data-toggle="confirmation" data-title="Are you sure you want to add this customer ?"data-popout="true" data-singleton="true" class="btn btn-sm green"> Add <i class="fa fa-plus"></i></a>';
                                                            break;
                                                        case 'Added':
                                                            echo '<label class="btn btn-sm green"> Added</label>';
                                                    } ?>
                                                </td>
                                                <td> <?= $customer['updated_at'] ?></td>
                                                <td><span class="label label-sm label-success"><?= $customer['status'] ?></span></td>
                                                <!-- <td>
                                                    <a class="edit" href="javascript:;"> Edit </a>
                                                </td> -->
                                                <td>
                                                    <a class="view-Customer" data-toggle="modal" onclick="view_rawCustomer(<?= $customer['id']; ?>)" href="#view-customer-modal"> <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;</a>
                                                    <a class="edit-Customer" data-toggle="modal" onclick="edit_rawCustomer(<?= $customer['id']; ?>)" href="#edit-customer-modal"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                                </td>
                                            </tr>
                                <?php endif;
                                    endforeach;
                                endif; ?>
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
<div id="view-customer-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Customer details</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                    <form action="#" class="horizontal-form">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Customer name</label>
                                        <input type="text" id="reg_customerName" class="form-control" readonly>
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Created date</label>
                                        <input type="text" id="reg_cust_createdDate" class="form-control" readonly>
                                        <!-- <span class="help-block"> This field has error. </span> -->
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Age</label>
                                        <input type="number" id="reg_customerAge" class="form-control" readonly>
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Postcode</label>
                                        <input type="text" id="reg_cust_postCode" class="form-control" readonly>
                                        <!-- <span class="help-block"> This field has error. </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Town</label>
                                        <input type="text" id="reg_cust_town" class="form-control" readonly>
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">County</label>
                                        <input type="text" id="reg_cust_county" class="form-control" readonly>
                                        <!-- <span class="help-block"> This field has error. </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Address</label>
                                        <textarea class="form-control " id="address" rows="2" maxlength="150" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="edit-customer-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('edit-registry'); ?>" method="POST" class="horizontal-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Edit the details</h4>
                </div>
                <div class="modal-body">
                    <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">

                        <div class="form-body">
                            <!-- <h3 class="form-section">Person Info</h3> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Customer name</label>
                                        <input type="text" id="customer_name" name="customerName" class="form-control">
                                        <input type="hidden" id="customer_id" name="customerId">
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">PostCode</label>
                                        <input type="text" id="customer_postcode" name="postCode" class="form-control">
                                        <!-- <span class="help-block"> This field has error. </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Town</label>
                                        <input type="text" id="customer_town" name="town" class="form-control">
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">County</label>
                                        <input type="text" id="customer_county" name="county" class="form-control">
                                        <!-- <span class="help-block"> This field has error. </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Status</label>
                                        <select id="status_selector" class="form-control" name="status" data-placeholder="Choose a Process" tabindex="1">
                                            <option value="DNC">DNC</option>
                                            <option value="Callback">Callback</option>
                                            <option value="Not Answering">Not Answering</option>
                                            <option value="Invalid No.">Invalid No.</option>
                                            <option value="Invalid Customer">Invalid Customer</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Note</label>
                                        <textarea class="form-control input-sm" name="note" rows="2" maxlength="150" placeholder="Call Note"></textarea>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row" id="callback_instance">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Select callback date</label>
                                        <input class="form-control input-medium date-picker" name="callback_date" size="16" type="text" value="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Select callback time</label>
                                        <div class="input-icon">
                                            <i class="fa fa-clock-o"></i>
                                            <input type="text" name="callback_time" class="form-control timepicker timepicker-default" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Address</label>
                                        <textarea class="form-control " id="customer_address" name="address" rows="2" maxlength="150" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                    <button type="submit" class="btn green">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END CONTAINER -->

<?= $this->include('includes/footer'); ?>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= base_url(); ?>/assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>/assets/pages/js/components-date-time-pickers.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>/assets/pages/js/table-datatables-editable.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script>
    function edit_rawCustomer(id) {

        $.ajax({
            url: "<?= base_url(); ?>/edit-customer",
            type: "Post",
            data: {
                customer_id: id
            },
            success: function(data) {



                var obj = JSON.parse(data); //we are get data in json format and converting it to object 
                $('#customer_name').val(obj.title + ' ' + obj.first_name + ' ' + obj.last_name);
                $('#created_date').val(obj.created_at);
                $('#customer_id').val(obj.id);
                $("#customer_postcode").val(obj.postcode);
                $('#customer_county').val(obj.county);
                $('#customer_town').val(obj.town);
                $('#customer_address').val(obj.address1);



            }
        });

    }

    function view_rawCustomer(id) {
        $.ajax({
            url: "<?= base_url(); ?>/view-customer",
            type: "Post",
            data: {
                customerId: id
            },
            success: function(data) {
                // console.log(data);
                var obj = JSON.parse(data); //convert string to object
                $('#reg_customerName').val(obj.title + ' ' + obj.first_name + ' ' + obj.last_name);
                $('#reg_cust_createdDate').val(obj.created_at);
                $('#reg_customerAge').val(obj.age);
                $('#reg_cust_postCode').val(obj.postcode);
                $('#reg_cust_town').val(obj.town);
                $('#reg_cust_county').val(obj.county);
                $('#address').val(obj.address1);

            }


        });
    }
    //select fields for callback
    $('#status_selector').change(function() {
        if ($(this).val() === "Callback")
            $('#callback_instance').show();
        else
            $('#callback_instance').hide();
    }).change();


    $('.demo').confirmation({
        href: "<?= base_url('order') ?>",
        singletone: true
    });
</script>
<?php if (session()->getFlashdata('error')) : ?>
    <script>
        swal("Sorry!", "<?= session()->getFlashdata("error") ?>", "error");
    </script>
<?php endif; ?>