<?= $this->include('includes/header'); ?>
<link href="<?= base_url();?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
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
                                <a href="#">Assign</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Assign customers to agents
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
                                            <a href="#tab1" data-toggle="tab">Assign Fresh Leads</a>
                                        </li>
                                        <li>
                                            <a href="#tab2" data-toggle="tab">Assign Retention Team</a>
                                        </li>
                                        <li>
                                            <a href="#tab3" data-toggle="tab">Assign Reactivation Team</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <p> &nbsp; </p> 
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
                                        <div class="tab-pane" id="tab2">                               
                                            <div class="col-md-6 text-center" style="position: relative; top: 3rem;">
                                                <span class="help-block"> Select date range to search </span>
                                                <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy" style="display:inline-flex;">
                                                    <input type="text" class="form-control" name="from">
                                                    <span class="input-group-addon" style="line-height:unset; padding-right:20px"> to &nbsp;</span>
                                                    <input type="text" class="form-control" name="to"> &nbsp;
                                                    <a id="#" class="btn green"><i class="fa fa-search"></i> Search </a>
                                                </div>                                                             
                                            </div>
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
                                            <table class="table table-striped table-hover table-bordered" id="sample_2">
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
                                                        <td> Arthur </td>
                                                        <td> 99 </td>
                                                        <td> 24-11-2020 </td>                                                                                              
                                                        <td>                                  
                                                            <a href="#" class="btn btn-sm green assign-btn">Re-Assign</a>
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="checkboxes" value="2" />
                                                        </td>
                                                        <td> C002 </td>
                                                        <td> Customer Name </td> 
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
                                                        <td> None </td>
                                                        <td> 199 </td>
                                                        <td> 24-11-2020 </td>                                                                                              
                                                        <td>                                  
                                                            <a href="#" class="btn btn-sm green assign-btn">Assign</a>
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="checkboxes" value="3" />
                                                        </td>
                                                        <td> C003 </td>
                                                        <td> Customer Name3 </td> 
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
                                                            <a href="#" class="btn btn-sm green assign-btn">Re-assign</a>
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="checkboxes" value="4" />
                                                        </td>
                                                        <td> C004 </td>
                                                        <td> Customer Name4 </td> 
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
                                                        <td> None </td>
                                                        <td> 399 </td>
                                                        <td> 24-11-2020 </td>                                                                                              
                                                        <td>                                  
                                                            <a href="#" class="btn btn-sm green assign-btn">Assign</a>
                                                            
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="text-center"><a href="#" class="btn btn-sm green assign-btn">Assign</a></div>
                                        </div>
                                        <div class="tab-pane" id="tab3">
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
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?=base_url();?>/assets/pages/js/table-datatables-managed.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>/assets/pages/js/components-date-time-pickers.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->