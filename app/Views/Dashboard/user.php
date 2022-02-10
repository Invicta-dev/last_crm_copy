<?= $this->include('includes/header.php'); ?>
<?= $this->include('includes/sidebar.php'); ?>
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
                    <a href="#">Users</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Users
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="<?= base_url(); ?>/add-user" class="btn green">Add New <i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                                <tr>
                                    <th class="hidden-lg hidden-md hidden-xs">ID</th>
                                    <th> Username </th>
                                    <th> Full Name </th>
                                    <th> Phone </th>
                                    <th> User Role </th>
                                    <!-- <th> Edit </th> -->
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php if (isset($user_info)) :
                                        foreach ($user_info as $user) :
                                    ?>

                                <tr>
                                    <td class="hidden-lg hidden-md hidden-xs"><?= $user['id']; ?></td>
                                    <?php if ($user['supervisor_id'] == 0) { ?>
                                        <td style="color:red;"><?= $user['username'] ?> </td>
                                    <?php } else { ?>
                                        <td><?= $user['username'] ?> </td>
                                    <?php } ?>
                                    <td><?= $user['fullname'] ?></td>
                                    <td><?= $user['phone'] ?></td>
                                    <?php if (isset($user_role)) :
                                                foreach ($user_role as $role) :
                                                    if ($role['role_id'] == $user['role_id']) : ?>

                                                <td class="center"><?= ucfirst($role['role_name']) ?></td>
                                                <td class="center hidden-lg hidden-md hidden-xs"><?= ucfirst($role['role_id']) ?></td>
                                    <?php
                                                    endif;
                                                endforeach;
                                            endif; ?>

                                    <?php if (isset($user_supervisor)) :
                                                foreach ($user_supervisor as $supervisor) :
                                                    if ($supervisor['supervisor_id'] == $user['supervisor_id']) : ?>

                                                <td class="center hidden-lg hidden-md hidden-xs"><?= ucfirst($supervisor['username']) ?></td>
                                                <td class="center hidden-lg hidden-md hidden-xs"><?= ucfirst($supervisor['id']) ?></td>
                                    <?php
                                                    endif;
                                                endforeach;
                                            endif; ?>
                                    <td>
                                        <!-- <a class="view-user" data-toggle="modal" href="#view-user-modal"> <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;</a> -->
                                        <a class="edit-user"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                        <a class="delete-user" onclick="delete_user(<?= $user['id'] ?>)"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                        <?php
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
<div id="edit-user-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url() ?>/edit-user" method="post" class="horizontal-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Edit the details</h4>
                </div>
                <div class="modal-body">
                    <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                        <!-- <form action="<?// base_url() ?>/edit-user" method="post" class="horizontal-form"> -->
                        <div class="form-body">
                            <!-- <h3 class="form-section">Person Info</h3> -->
                            <input type="hidden" id="userId" name="userId" class="form-control" value="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">User name</label>
                                        <input type="text" id="username" name="username" class="form-control" value="" readonly="readonly">
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>

                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Full name</label>
                                        <input type="text" id="fullname" name="fullname" class="form-control" value="">
                                        <!-- <span class="help-block"> This field has error. </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Phone</label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Change the title">
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Role</label>
                                        <select class="form-control" data-placeholder="Choose a Process" name="role" id="role_opt" tabindex="1">
                                            <?php if (isset($user_role)) :
                                                foreach ($user_role as $role) : ?>
                                                    <option value="<?= $role['role_id'] ?>"><?= $role['role_name'] ?> </option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                        <!-- <span class="help-block"> This field has error. </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <!--row-->
                            <div class="row">
                                <div class="col-md-6" id="fieldSupervisor">
                                    <div class="form-group">
                                        <label class="control-label">Supervisor</label>
                                        <select class="form-control" name="supervisor" data-placeholder="Choose a Process" id="userSupervisor" tabindex="1">
                                            <!-- <option id="role_opt" selected>---select---</option> -->
                                            <?php if (isset($user_supervisor)) :
                                                foreach ($user_supervisor as $supervisor) :
                                            ?>

                                                    <option value="<?= $supervisor['id'] ?>"><?= $supervisor['username'] ?> </option>
                                            <?php
                                                endforeach;
                                            endif; ?>
                                        </select>
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->

                        </div>
                        <!-- <div class="form-actions left">
                            <button type="button" id="button-tos" class="btn default">Cancel</button>
                            <button type="submit" class="btn blue">
                                <i class="fa fa-check"></i> Save</button>
                        </div> -->
                        <!-- </form> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                    <input type="submit" class="btn green" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END CONTAINER -->
<?= $this->include('includes/footer.php'); ?>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<!-- <script src="./assets/pages/js/table-datatables-editable.min.js" type="text/javascript"></script> -->
<script src="./assets/pages/js/table-datatables-editable.js" type="text/javascript"></script>


<script>
    function delete_user(id) {
        if (confirm('Are you sure delete this data?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?= base_url(); ?>/delete/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {

                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });

        }
    }

    $('.edit-user').on('click', function() {
        var flag = true;
        var currow = $(this).closest('tr');
        var id = currow.find('td:eq(0)').text();
        var username = currow.find('td:eq(1)').text();
        var fullname = currow.find('td:eq(2)').text();
        var phone = currow.find('td:eq(3)').text();
        var role_name = currow.find('td:eq(4)').text();
        var role_id = currow.find('td:eq(5)').text();
        var supervisor_name = currow.find('td:eq(6)').text();
        var supervisor_id = currow.find('td:eq(7)').text();
        // console.log(supervisor_id);
        $('#edit-user-modal').modal('show');
        $('#userId').val(id);
        $('#username').val(username);
        $('#fullname').val(fullname);
        $('#phone').val(phone);
        $('#role_opt').val(role_id);
        $('#userSupervisor').val(supervisor_id);

        // $('#userRole').append('<option value="' + role_id + '" selected disabled> ---select--- </option>');

        if (role_name == 'Agent') {
            $('#fieldSupervisor').show();
            // $('#userSupervisor').html('<option value="' + supervisor_id + '">' + supervisor_name + '</option>');

        } else {
            $('#fieldSupervisor').hide();
        }
        $.get('<?= base_url() ?>' + '/ajax-call', function(data) {
            //     alert(data);
            var jsondata = JSON.parse(data);

            // for (i = 0; i < jsondata.role.length; i++) {
            //     //   alert(jsondata.process[i].process_name);


            //     $('#userRole').append('<option >' + r + '</option><option  value="' + jsondata.role[i].role_id + '" >' + jsondata.role[i].role_name + '</option>');


            // }
        });
    });
</script>
<?php if (session()->getFlashdata('error')) : ?>
    <script>
        swal("Sorry!", "<?= session()->getFlashdata("error") ?>", "error");
    </script>
<?php elseif (session()->getFlashdata('success')) : ?>
    <script>
        swal("success!", "<?= session()->getFlashdata("success") ?>", "success");
    </script>

<?php endif; ?>