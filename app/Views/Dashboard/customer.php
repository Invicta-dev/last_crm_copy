<?= $this->include('includes/header'); ?>
<?= $this->include('includes/sidebar'); ?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?= base_url(); ?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
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
                    <a href="#">Customers</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Customers
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-5 form-group" style="margin-top:3rem;">

                                <?= form_open(base_url('search-customer'), 'class="form-horizontal"') ?>


                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="customer_id">Customer ID</label>
                                    <div class="col-md-8">

                                        <select id="customers_select" name="custCode" class="form-control input-sm select2-multiple">

                                            <option></option>
                                            <?php foreach ($existing_customers as $customers) : ?>
                                                <option value="<?= $customers['customer_id'] ?>"><?= $customers['customer_id'] ?></option>

                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="name">First Name</label>
                                    <div class="col-md-8">
                                        <select id="select-fname" name="fname" class="form-control select2-multiple">

                                            <option></option>
                                            <?php foreach ($existing_customers as $customers) : ?>
                                                <option value="<?= $customers['name'] ?>"><?= $customers['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="lname">Last Name</label>
                                    <div class="col-md-8">
                                        <select id="select-lname" name="lname" class="form-control  select2-multiple">

                                            <option></option>
                                            <?php foreach ($existing_customers as $customers) : ?>
                                                <option value="<?= $customers['lname'] ?>"><?= $customers['lname'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="phone">Phone</label>
                                    <div class="col-md-8">
                                        <select id="phno" name="phone" class="form-control  select2-multiple">

                                            <option></option>
                                            <?php foreach ($existing_customers as $customers) : ?>
                                                <option value="<?= $customers['phone'] ?>"><?= $customers['phone'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="zip_code">Post Code</label>
                                    <div class="col-md-8">
                                        <select id="post-code" name="post_code" class="form-control select2-multiple">

                                            <option></option>
                                            <?php foreach ($existing_customers as $customers) : ?>
                                                <option value="<?= $customers['zip_code'] ?>"><?= $customers['zip_code'] ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 text-center ">

                                        <input type="submit" class="btn btn green" value="Search">
                                        <!-- <input type="submit" class="btn green" value="Add New Customer"> -->
                                        <a href="<?= base_url('add-customer'); ?>" class="btn green" role="button">Add New Customer</a>

                                    </div>

                                    <div class="col-md-12 text-center">

                                    </div>
                                </div>


                                <?= form_close(); ?>

                            </div>
                            <div class="col-md-7">
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                        <tr>
                                            <th> Customer ID </th>
                                            <th> Full Name </th>
                                            <th> Contact No. </th>
                                            <th> Last updated </th>
                                            <!-- <th> Edit </th> -->
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($existing_customers as $customers) : ?>
                                            <tr>

                                                <td><?= $customers['customer_id'] ?> </td>
                                                <td> <?= $customers['name'] . " &nbsp " . $customers['lname'] ?> </td>
                                                <td> <a href="tel:7798398684" class="btn btn-sm green"><i class="fa fa-phone"></i> Call now </a>
                                                    <a href="<?= base_url('add-orders/'.$customers['customer_id']); ?>" class="btn btn-sm green"> Add Order <i class="fa fa-plus"></i></a>
                                                </td>
                                                <td> 24-11-2020 </td>
                                                <!-- <td>
                                                    <a class="edit" href="javascript:;"> Edit </a>
                                                </td> -->
                                                <td>
                                                    <a class="edit-Customer" href="<?= base_url('edit-customer'); ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                                    <a class="delete-Customer" href="javascript:;"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

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
<!-- Modal -->
<div class="modal fade" style="margin-top:32px" id="custNameModel" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <?php if (session()->has('cust_name')) { ?>

                <?php $cust = session()->getFlashdata('cust_name');
                    foreach ($cust as $each_cust) :
                        echo "<a  class='matching' id='" . $each_cust['customer_id'] . "'>" . $each_cust['name'] . " " . $each_cust['lname'] . "</a><br>";
                    endforeach;
                } ?>
            </div>

        </div>
    </div>
</div>

<?= $this->include('includes/footer'); ?>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<!-- <script src="./assets/pages/js/table-datatables-editable.min.js" type="text/javascript"></script> -->
<script src="<?= base_url(); ?>/assets/pages/js/table-datatables-editable.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="<?= base_url(); ?>/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>/assets/pages/js/components-select2.min.js" type="text/javascript"></script>
<!-- placeholder for select 2 dropdown -->
<script>
    $("#customers_select").attr("data-placeholder", "Customer ID");
    $("#customers_select").select2();
    $('#customers_select').select2({
        minimumResultsForSearch: 10
    });

    $("#order_no").attr("data-placeholder", "Order no.");
    $("#order_no").select2();

    $("#select-fname").attr("data-placeholder", "First name");
    $("#select-fname").select2();

    $("#select-lname").attr("data-placeholder", "Last name");
    $("#select-lname").select2();

    $("#phno").attr("data-placeholder", "Phone");
    $("#phno").select2();

    $("#post-code").attr("data-placeholder", "Post code");
    $("#post-code").select2();
</script>
<?php if (!empty(session()->getFlashdata('cust_name'))) {
    echo "<script> $('#custNameModel').modal()</script>";
}
?>
<script>
    //   $('.modal-body a').click(function() {
    //      var id= $(this).attr('id');     
    //     alert(id);
    // });

    $('.matching').click(function(event) {
        event.preventDefault();
        var id = $(this).attr('id');
        $.ajax({
            url: "search_matchCust",
            type: "POST",
            data: {
                "id": id
            }
        }).done(function(data) {
            //  console.log(data);
            window.location.href = data;
        });
        return false; // for good measure
    });
</script>
<?php if (session()->getFlashdata('success')) : ?>
    <script>
        swal("Success", "<?= session()->getFlashdata("success") ?>", "success");
    </script>
<?php endif; ?>