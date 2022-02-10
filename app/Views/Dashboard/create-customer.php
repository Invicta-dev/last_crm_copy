<?= $this->include('includes/header'); ?>
<link href="<?= base_url(); ?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
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
                    <a href="#">Customers</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Add Customers
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->


        <div class="col-12">


            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit bordered">

                <div class="portlet-body">
                    <div class="row">

                        <?= form_open('add-customer', 'class="form-horizontal"') ?>
                        <div class="col-md-6">


                            <div class="form-group">
                                <label for="customer_id" class="col-sm-2 control-label">Customer ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-large " name="cust_id" value="<?= $autoGenId; ?>" placeholder="cust_id" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="customer_id" class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <select class="form-control input-small" name="title">
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Miss">Miss</option>
                                        <option value="Dr">Dr</option>
                                        <option value="Adv">Adv</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputfname" class="col-sm-2 control-label"><span class="red">*</span>First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-large" name='fname'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputlname" class="col-sm-2 control-label"><span class="red">*</span>Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-large " name="lname" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control input-large " name="inputEmail" placeholder="your-email@domain.com">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label"><span class="red">*</span>Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-large " name="PhoneNum" placeholder="Phone no.">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Do not call</label>
                                <div class="col-sm-10">
                                    <input type="checkbox" name="dnc">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Remark" class="col-sm-2 control-label">Remark</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control input-large" rows="3" name="remark"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn green">Save Customer</button>
                                </div>
                            </div>

                        </div>
                        <!--col end-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address1" class="col-sm-2 control-label"><span class="red">*</span> Address 1</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-large" name="address1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="customer_id" class="col-sm-2 control-label">Assign agent</label>
                                <div class="col-sm-10">
                                    <select class="form-control input-small" name="agent">
                                        <?php foreach ($userRole  as $agent) : ?>
                                            <option value="<?= $agent['id'] ?>"><?= $agent['username'] ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address2" class="col-sm-2 control-label">Address 2</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-large" name="address2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address1" class="col-sm-2 control-label"><span class="red">*</span> Town</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-large" name="town">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address1" class="col-sm-2 control-label"><span class="red">*</span>County</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-large" name="county">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address1" class="col-sm-2 control-label">Country</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-large" name="country">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address1" class="col-sm-2 control-label"><span class="red">*</span>Post Code</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-large" name="post_code">
                                </div>
                            </div>
                        </div>
                        <!--/col end-->
                        <?= form_close() ?>

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
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= base_url(); ?>/assets/pages/js/table-datatables-managed.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>/assets/pages/js/components-date-time-pickers.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<?php if (session()->has('success')) : ?>
    <script>
        swal("Success!", "<?= session()->getFlashdata('success') ?>!", "success");
    </script>
<?php endif; ?>
<?php if (session()->has('error')) : ?>
    <script>
        swal("Exist!", "<?= session()->getFlashdata('error') ?>!", "error");
    </script>
<?php endif; ?>