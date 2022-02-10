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
                                            <select id="agentName1" name="leads_agent" class="form-control input-medium select2-multiple">
                                                <option></option>
                                                <?php foreach ($userRole as $agent) : ?>
                                                    <option value="<?= $agent['id']; ?>"><?= $agent['username']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            </td>
                                            <td> 24-11-2020 </td>
                                           
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
                                                <input type="text" class="form-control input-small" id="retention_start_date" name="retention_cdate_from">
                                                <span class="input-group-addon" style="line-height:unset; padding-right:20px"> to &nbsp;</span>
                                                <input type="text" class="form-control input-small" id="retention_end_date" name="retention_cdate_to"> &nbsp;
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="createDate">Last Order Date</label>
                                            <div class="input-group input-large date-picker input-daterange " data-date="10/11/2012" data-date-format="mm/dd/yyyy" style="display:inline-flex;">
                                                <input type="text" class="form-control input-small" id="lastorder_start_date" name="retention_lastOrder_from">
                                                <span class="input-group-addon" style="line-height:unset; padding-right:20px"> to &nbsp;</span>
                                                <input type="text" class="form-control input-small" id="lastorder_end_date" name="retention_lastOrder_to"> &nbsp;
                                            </div>
                                        </div>
                                        <p> &nbsp; </p>
                                        <div class="form-group col-sm-4">
                                            <label for="allotedTo">Agent allocated to</label>
                                            <select id="allotedTo2" name="retention_supervisor" class="form-control input-medium select2-multiple">
                                                <option></option>
                                                <?php foreach ($supervisor as $superv) : ?>
                                                    <option value="<?= $superv['supervisor_id']; ?>"><?= $superv['username']; ?></option>
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
                                                    <option value="<?= $agent['id']; ?>"><?= $agent['username']; ?></option>
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

                                    </fieldset>
                                    <div class="text-center col-md-10">
                                        <!-- <a id="#" class="btn green" role="button"><i class="fa fa-search"></i> Search </a> -->
                                        <input type="reset" id="filter_form" class="btn green" value="Reset">
                                    </div>
                                    <!-- form ends-->
                                </form>

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
                                <!-- <table class="table table-striped table-hover table-bordered retention_data" id="sample_5"> -->
                                <form>
                                <table class="table table-striped" id="tbl-students-data">
                                    <thead>
                                        <tr>
                                            <th>
                                                <input type="checkbox"  id="checkall"  />
                                            </th>
                                            <th> Customer ID </th>
                                            <th> First Name </th>
                                            <th> Last Name </th>
                                            <th>Assign Agent </th>
                                            <th>Agent Assigned</th>
                                            <th>Previous Assigned Agent</th>
                                            <th> Email </th>


                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>

                                <!-- <div class="text-center"><a href="#" class="btn btn-sm green assign-btn">Assign</a></div> -->
                                <div class="text-center">
                                    <input type="submit" class="btn btn-sm green assign-btn" id="form_assign" name="assign_submit" value="Assign">
                                    <!-- <a href="#" class="btn btn-sm green assign-btn">Assign</a></div> -->
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
<!-- <script src="<?//base_url(); ?>/assets/pages/js/dataTables.checkboxes.min.js" type="text/javascript"></script> -->
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
        from: 40,
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
    // $('#filter-cust').submit(function(e) {
    //     e.preventDefault();
    //     var form = $(this).serialize();
    //     $('#tbl-students-data').DataTable({
    //         lengthMenu: [
    //             [5, 10, 30, -1],
    //             [5, 10, 30, "All"]
    //         ], // page length options
    //         bProcessing: true,
    //         serverSide: true,
    //         scrollY: "400px",
    //         scrollCollapse: true,
    //         ajax: {
    //             url: "search_customer", // json datasource
    //             type: "post",
    //             data: form,
    //             dataType: "Json",
    //             // data: {
    //             //     // key1: value1 - in case if we want send data with request
    //             // }

    //         },

    //         // to display datatable search
    //     });
    // });
</script>

<!-- Fetch customer data and display it when a tab is clicked -->
<script>
   
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        var target = $(e.target).attr("href") // activated tab
        if (target == '#tab1') {
            alert('tab1 clicked');

        } else if (target == '#tab2') {

            // var form = $(this);
             
            var dataTables = $('#tbl-students-data').DataTable({
                lengthMenu: [
                    [5, 10, 30, -1],
                    [5, 10, 30, "All"]
                ], // page length options
                "aoColumnDefs": [
             { "bSortable": false, "aTargets": [0] }, //stop sorting for select all checkbox
      
                 ],
                bProcessing: true,
                serverSide: true,
                destroy: true, //stops the datatable from getting reinitalizes
                scrollY: "400px",
                scrollCollapse: true,
                paging: true,
                ajax: {
                    url: "report-filters", // json datasource
                    type: "post",
                    data: function(data) {
                        data.customer_id = $("#customers_select").val();
                        data.retention_start_date = $("#retention_start_date").val();
                        data.retention_end_date = $("#retention_end_date").val();
                        data.lastorder_start_date = $("#lastorder_start_date").val();
                        data.lastorder_end_date = $("#lastorder_end_date").val();
                        data.allotedTo2 = $("#allotedTo2").val();
                        data.agentName = $("#agentName2").val();
                        data.product = $("#select2-prd2-container").val();


                    }
                },

            });
            $(document).on("change", "#customers_select, #select2-prd2-container, #agentName2, #allotedTo2", function() {
                dataTables.ajax.reload(); //reload the datatable data

            });
            $(document).on("change", "#retention_start_date,#retention_end_date", function() {
                if ($("#retention_end_date").val() != '' && $("#retention_end_date").val() !== '') {
                    dataTables.ajax.reload(); //reload the datatable data
                }
            });
            //resets the values from the filter options
            $("#filter_form").click(function() {
                // reset the value of select2 dropdown
                $("#customers_select").select2("val","");
                $("#allotedTo2").select2("val","");
                $("#agentName2").select2("val","");
                //created date range
                $("#retention_start_date").val("");
                $("#retention_end_date").val("");
                dataTables.ajax.reload(); //reload the datatable data

            });
           


            // $(document).on("input", "#tbl-students-data_filter . input-sm.input-small.input-inline", function() {

            //     dataTables.ajax.reload();
            // });

        }
   



    });
    $(document).ready(function(){
        $(document).on('click','#checkall',function(event){
      
      if($("#checkall").prop("checked"))
      {
          $('.rem_send').prop('checked',true);
      }
     else
      {
          $('.rem_send').prop('checked',false);
     }
  });

  $('#form_assign').click(function(e){
    e.preventDefault();
    //   console.log("im called");
    var aData=[];
    $('#tbl-students-data tbody tr').each(function(){
    var currentRow =$(this);
    // var col1=currentRow.find(".rem_send").val();
    // var col2=currentRow.find("td:eq(1)").text();
    // var col3=currentRow.find("td:eq(2)").text();
    // var col4=currentRow.find("td:eq(3)").text();
    // var col5=currentRow.find("select").val();
    // var col6=currentRow.find("td:eq(5)").text();
    // var obj={};
    // obj.col1=col1;
    // obj.Cust_id=col2;
    // obj.col3=col3;
    // obj.col4=col4;
    // obj.col5=col5;
    // obj.col6=col6;
    if(currentRow.find(".rem_send").is(":checked"))
    {
        var col5=currentRow.find("select").val();
        var col1=currentRow.find(".rem_send").val();
        if(col5=='')
        {
        $('#agentName_'+col1).prop('required',true); 
        $('#agentName_'+col1).css({"border-color":"#FF0000", "border-width":"1px", "border-style":"solid"});
        }
        else{
     
     
        //    var cal=col1 +':'+col5;
        
        // aData.push(cal);
        var object = {}; 
       object['id'] = col1;
       object['agent_id'] = col5;
       aData.push(object);
        }
    }
   
 
    }); 

     
  $.ajax({
            type: "POST",
            url: "search_customer",
           data:{aData},
           cache: false,
           success: function(data) {
               $('#tbl-students-data').DataTable().ajax.reload(); //reload the datatable data

            },
            error: function() {
                alert("Error Please select the input.");
            }
        });
       
     

    });
});

    
</script>