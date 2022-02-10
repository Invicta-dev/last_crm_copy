<?= $this->include('includes/header'); ?>
<link href="<?= base_url(); ?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?= base_url(); ?>/assets/global/plugins/ion.rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>/assets/global/plugins/ion.rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>/assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>/assets/pages/js/dataTables.checkboxes.css" rel="stylesheet" type="text/css" />
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
                    <a href="#">Assign</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Reports
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->


        <div class="col-12">


            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit bordered">

                <div class="portlet-body">
                    <div class="tabbable tabbable-tabdrop">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab1" data-toggle="tab">Assign Fresh Leads</a>
                            </li>
                            <li>
                                <a href="#tab2" data-toggle="tab">Assign Retention Team</a>
                            </li>
                            <!-- <li>
                                <a href="#tab3" data-toggle="tab">Assign Reactivation Team</a>
                            </li> -->
                        </ul>
                        <div class="tab-content">
                            <!-- Tab1 -->
                            <div class="tab-pane active" id="tab1">
                                <p> &nbsp; </p>
                                <form class="form-inline">
                                    <fieldset>
                                        <legend>Filter Options</legend>

                                        <div class="form-group col-sm-4">
                                            <label for="customer_id">Customer ID</label>
                                            <select id="customer_id" class="form-control select2-multiple">
                                                <option></option>
                                                <option value="1">Customer name 1</option>
                                                <option value="2">Customer name 2</option>
                                                <option value="3">Customer name 3</option>
                                                <option value="4">Customer name 4</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="createDate">Created Date</label>
                                            <div class="input-group input-large date-picker input-daterange " data-date="10/11/2012" data-date-format="mm/dd/yyyy" style="display:inline-flex;">
                                                <input type="text" class="form-control input-small" name="from">
                                                <span class="input-group-addon" style="line-height:unset; padding-right:20px"> to &nbsp;</span>
                                                <input type="text" class="form-control input-small" name="to"> &nbsp;
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="createDate">Last Order Date</label>
                                            <div class="input-group input-large date-picker input-daterange " data-date="10/11/2012" data-date-format="mm/dd/yyyy" style="display:inline-flex;">
                                                <input type="text" class="form-control input-small" name="from">
                                                <span class="input-group-addon" style="line-height:unset; padding-right:20px"> to &nbsp;</span>
                                                <input type="text" class="form-control input-small" name="to"> &nbsp;
                                            </div>
                                        </div>
                                        <p> &nbsp; </p>
                                        <div class="form-group col-sm-4">
                                            <label for="allotedTo">Agent allocated to</label>
                                            <select id="allotedTo" class="form-control input-medium select2-multiple">
                                                <option></option>
                                                <option value="1">supervisor name 1</option>
                                                <option value="2">supervisor name 2</option>
                                                <option value="3">supervisor name 3</option>
                                                <option value="4">supervisor name 4</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="customer_id ">Product sold</label>
                                            <select id="PrdSold" class="form-control input-medium select2-multiple" name="prd_sold">
                                                <option></option>
                                                <option value="1">Product 1</option>
                                                <option value="2">Product 2</option>
                                                <option value="3">Product 3</option>
                                                <option value="4">Product 4</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="allotedTo">Agent </label>
                                            <select id="agentName" class="form-control input-medium select2-multiple" name="agent-name">
                                                <option></option>
                                                <option value="1">Agents 1</option>
                                                <option value="2">Agents 2</option>
                                                <option value="3">Agents 3</option>
                                                <option value="4">Agents 4</option>
                                            </select>
                                        </div>
                                        <p> &nbsp; </p>
                                        <div class="form-group col-sm-6">
                                            <label class="col-md-2 control-label">Total no. of orders</label>
                                            <div class="col-md-4">
                                                <input id="range_3" type="text" value="" />
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="col-md-2 control-label">Total order value</label>
                                            <div class="col-md-4">
                                                <input id="range_16" type="text" value="" />
                                            </div>
                                        </div>
                                        <p> &nbsp; </p>
                                        <div class="text-center col-md-10">
                                            <a id="#" class="btn green" role="button"><i class="fa fa-search"></i> Search </a>
                                        </div>
                                    </fieldset>
                                </form><!-- form ends-->
                                <table class="table table-striped table-hover table-bordered" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th>
                                                <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                            </th>
                                            <th> Customer ID </th>
                                            <th> Customer Name </th>
                                            <th> Assign agent </th>
                                            <th> Last updated </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="checkboxes" value="1" />
                                            </td>
                                            <td> C001 </td>
                                            <td> Alex Nilson </td>
                                            <td>
                                                <select id="select2-single-input-sm" class="form-control input-sm select2-multiple">
                                                    <optgroup label="Select agents">
                                                        <option value="1">Agent name 1</option>
                                                        <option value="2">Agent name 2</option>
                                                        <option value="3">Agent name 3</option>
                                                        <option value="4">Agent name 4</option>
                                                    </optgroup>
                                                </select>
                                            </td>
                                            <td> 24-11-2020 </td>
                                            <td>
                                                <a href="#" class="btn btn-sm green">Assign</a>
                                                <a href="#" class="btn btn-sm default">Assigned</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-center"><a href="#" class="btn btn-sm green">Assign</a></div>
                            </div>
                            <!-- Retention team -->
                            <div class="tab-pane" id="tab2">
                                <form id="filter-cust" class="form-inline">
                                    <fieldset>
                                        <legend>Filter Options</legend>

                                        <div class="form-group col-sm-4">
                                            <label for="customer_id">Customer ID</label>
                                            <select id="customers_select" name="retention_cust_id" class="form-control select2-multiple">
                                                <option></option>
                                                <?php foreach ($existing_customer as $ex_customer) : ?>
                                                    <option value="<?= $ex_customer['customer_id'] ?>"><?= $ex_customer['customer_id'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="createDate">Created Date</label>
                                            <div class="input-group input-large date-picker input-daterange " data-date="10/11/2012" data-date-format="mm/dd/yyyy" style="display:inline-flex;">
                                                <input type="text" class="form-control input-small" name="retention_cdate_from">
                                                <span class="input-group-addon" style="line-height:unset; padding-right:20px"> to &nbsp;</span>
                                                <input type="text" class="form-control input-small" name="retention_cdate_to"> &nbsp;
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="createDate">Last Order Date</label>
                                            <div class="input-group input-large date-picker input-daterange " data-date="10/11/2012" data-date-format="mm/dd/yyyy" style="display:inline-flex;">
                                                <input type="text" class="form-control input-small" name="retention_lastOrder_from">
                                                <span class="input-group-addon" style="line-height:unset; padding-right:20px"> to &nbsp;</span>
                                                <input type="text" class="form-control input-small" name="retention_lastOrder_to"> &nbsp;
                                            </div>
                                        </div>
                                        <p> &nbsp; </p>
                                        <div class="form-group col-sm-4">
                                            <label for="allotedTo">Agent allocated to</label>
                                            <select id="allotedTo2" name="retention_supervisor" class="form-control input-medium select2-multiple">
                                                <option></option>
                                                <?php foreach ($supervisor as $superv) : ?>
                                                    <option value="<?= $superv['username']; ?>"><?= $superv['username']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="customer_id ">Product sold</label>
                                            <select id="prd2" name="retention_product" class="form-control input-medium select2-multiple">
                                                <option></option>
                                                <?php foreach ($products as $product) : ?>
                                                    <option value="<?= $product['product_code']; ?>"><?= $product['product_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="allotedTo">Agent </label>
                                            <select id="agentName2" name="retention_agent" class="form-control input-medium select2-multiple">
                                                <option></option>
                                                <?php foreach ($userRole as $agent) : ?>
                                                    <option value="<?= $agent['username']; ?>"><?= $agent['username']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <p> &nbsp; </p>
                                        <div class="form-group col-sm-6">
                                            <label class="col-md-2 control-label">Total no. of orders</label>
                                            <div class="col-md-4">
                                                <input id="retentionOrdNo" type="text" value="" />
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="col-md-2 control-label">Total order value</label>
                                            <div class="col-md-4">
                                                <input id="retentionOrdVal" type="text" value="" />
                                            </div>
                                        </div>
                                        <p> &nbsp; </p>
                                        <div class="text-center col-md-10">
                                            <!-- <a id="#" class="btn green" role="button"><i class="fa fa-search"></i> Search </a> -->
                                            <input type="submit" class="btn green" value="Search">
                                        </div>
                                    </fieldset>
                                </form>
                                <!-- form ends-->
                                <div class="col-md-2 pull-right">
                                    <div class="btn-group pull-right">
                                        <button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" id="sample_2_tools">
                                            <li>
                                                <a href="javascript:;" data-action="0" class="tool-action">
                                                    <i class="icon-printer"></i> Print</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-action="1" class="tool-action">
                                                    <i class="icon-check"></i> Copy</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-action="2" class="tool-action">
                                                    <i class="icon-doc"></i> PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-action="3" class="tool-action">
                                                    <i class="icon-paper-clip"></i> Excel</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-action="4" class="tool-action">
                                                    <i class="icon-cloud-upload"></i> CSV</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover table-bordered retention_data" id="sample_5">
                                    <thead>
                                        <tr>
                                            <th>
                                                <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                            </th>
                                            <th> Customer ID </th>
                                            <th> Customer Name </th>
                                            <th> Assign agent </th>
                                            <th> Previously assigned </th>
                                            <th> Total Order Amount</th>
                                            <th> Last updated </th>
                                            <!-- <th> Action </th> -->
                                        </tr>
                                    </thead>
                                    <?= form_open(base_url('assign_agents'), 'id="assignAgents"') ?>
                                    <tbody>

                                        <?php foreach ($existing_customer as $customers) : ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="checkboxes" />
                                                </td>
                                                <td> <?= $customers['customer_id'] ?></td>
                                                <td> <?= $customers['name'] ?> <?= $customers['lname'] ?></td>
                                                <td>
                                                    <select class="tableFieldAgent form-control input-medium select2-multiple">
                                                        <option></option>
                                                        <?php foreach ($userRole as $agent) : ?>
                                                            <option value="<?= $agent['username']; ?>"><?= $agent['username']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <td> <?php
                                                        foreach ($userRole as $agent) :
                                                            if ($customers['agent_id'] == $agent['id']) {
                                                                echo $agent['username'];
                                                            }
                                                        endforeach;
                                                        ?>
                                                </td>
                                                <td> 200 </td>
                                                <td> <?= $customers['modified'] ?> </td>
                                                <!-- <td>
                                                <a href="#" class="btn btn-sm green assign-btn">Re-Assign</a>

                                            </td> -->
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                                <!-- <div class="text-center"><a href="#" class="btn btn-sm green assign-btn">Assign</a></div> -->
                                <div class="text-center">
                                    <input type="submit" class="btn btn-sm green assign-btn" name="assign_submit" value="Assign">
                                    <!-- <a href="#" class="btn btn-sm green assign-btn">Assign</a></div> -->
                                    <?= form_close(); ?>
                                </div>
                                <!-- <div class="tab-pane" id="tab3">
                                <p>6 month order not placed customers</p>
                                <div class="col-md-6 text-center" style="position: relative; top: 3rem;">
                                    <span class="help-block"> Select date range to search </span>
                                    <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy" style="display:inline-flex;">
                                        <input type="text" class="form-control" name="from">
                                        <span class="input-group-addon" style="line-height:unset; padding-right:20px"> to &nbsp;</span>
                                        <input type="text" class="form-control" name="to"> &nbsp;
                                        <button id="#" class="btn green"><i class="fa fa-search"></i> Search </button>
                                    </div>
                                </div>
                                <div class="col-md-2 pull-right">
                                    <div class="btn-group pull-right">
                                        <button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" id="sample_3_tools">
                                            <li>
                                                <a href="javascript:;" data-action="0" class="tool-action">
                                                    <i class="icon-printer"></i> Print</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-action="1" class="tool-action">
                                                    <i class="icon-check"></i> Copy</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-action="2" class="tool-action">
                                                    <i class="icon-doc"></i> PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-action="3" class="tool-action">
                                                    <i class="icon-paper-clip"></i> Excel</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-action="4" class="tool-action">
                                                    <i class="icon-cloud-upload"></i> CSV</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover table-bordered" id="sample_3">
                                    <thead>
                                        <tr>
                                            <th>
                                                <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                            </th>
                                            <th> Customer ID </th>
                                            <th> Customer Name </th>
                                            <th> Assign agent </th>
                                            <th> Previously assigned </th>
                                            <th> Total Orders</th>
                                            <th> Last updated </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="checkboxes" value="1" />
                                            </td>
                                            <td> C005 </td>
                                            <td> Customer Name5 </td>
                                            <td>
                                                <select id="select2-single-input-sm" class="form-control input-sm select2-multiple">
                                                    <optgroup label="Select agents">
                                                        <option value="1">Agent name 1</option>
                                                        <option value="2">Agent name 2</option>
                                                        <option value="3">Agent name 3</option>
                                                        <option value="4">Agent name 4</option>
                                                    </optgroup>
                                                </select>
                                            </td>
                                            <td> Mush </td>
                                            <td> 99 </td>
                                            <td> 24-11-2020 </td>
                                            <td>
                                                <a href="#" class="btn btn-sm green">Re-Assign</a>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="checkboxes" value="1" />
                                            </td>
                                            <td> C006 </td>
                                            <td> Customer Name6 </td>
                                            <td>
                                                <select id="select2-single-input-sm" class="form-control input-sm select2-multiple">
                                                    <optgroup label="Select agents">
                                                        <option value="1">Agent name 1</option>
                                                        <option value="2">Agent name 2</option>
                                                        <option value="3">Agent name 3</option>
                                                        <option value="4">Agent name 4</option>
                                                    </optgroup>
                                                </select>
                                            </td>
                                            <td> Maria </td>
                                            <td> 299 </td>
                                            <td> 24-11-2020 </td>
                                            <td>
                                                <a href="#" class="btn btn-sm green">Re-assign</a>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-center"><a href="#" class="btn btn-sm green">Assign</a></div>
                            </div> -->
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
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= base_url(); ?>/assets/pages/js/table-datatables-managed.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>/assets/pages/js/components-date-time-pickers.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?= base_url() ?>/assets/global/plugins/ion.rangeslider/js/ion.rangeSlider.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>/assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
<script src="<?= base_url() ?>/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="<?= base_url() ?>/assets/global/plugins/bootstrap-summernote/summernote.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= base_url() ?>/assets/pages/scripts/components-ion-sliders.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>/assets/pages/js/components-select2.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>/assets/pages/js/dataTables.checkboxes.min.js" type="text/javascript"></script>
<script>
    $("#range_16").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 1000,
        from: 200,
        to: 800,
        prefix: "$"
    });
    $("#retentionOrdVal").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 1000,
        from: 200,
        to: 800,
        prefix: "$"
    });
    $("#retentionOrdNo").ionRangeSlider({
        type: "double",
        grid: true,
        min: 100,
        max: 1000,
        from: 200,
        to: 800,
        prefix: "$"
    });
    $("#customers_select").attr("data-placeholder", "Customer ID");
    $("#customers_select").select2();
    $("#customer_id").attr("data-placeholder", "Customer ID");
    $("#customer_id").select2();
    $("#allotedTo").attr("data-placeholder", "Alloted TO");
    $("#allotedTo").select2();
    $("#PrdSold").attr("data-placeholder", "Product Sold");
    $("#PrdSold").select2();
    $("#agentName").attr("data-placeholder", "Agent");
    $("#agentName").select2();
    $("#allotedTo2").attr("data-placeholder", "Alloted TO");
    $("#allotedTo2").select2();
    $("#agentName2").attr("data-placeholder", "Agent");
    $("#agentName2").select2();
    $("#prd2").attr("data-placeholder", "Product Sold");
    $("#prd2").select2();
    $(".tableFieldAgent").attr("data-placeholder", "Agent");
    $(".tableFieldAgent").select2();
</script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    // $('#filter-cust').submit(function(e) {

    //     var form = $(this);

    //     e.preventDefault();

    //     $.ajax({
    //         type: "POST",
    //         url: "report-filters",
    //         data: form.serialize(),
    //         dataType: "html",
    //         success: function(data) {
    //             $("table.retention_data").html(data);

    //         },
    //         error: function() {
    //             alert("Error posting feed.");
    //         }
    //     });

    // });
</script>