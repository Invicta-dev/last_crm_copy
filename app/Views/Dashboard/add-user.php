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
                    <a href="<?= base_url(); ?>/dashboard">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?= base_url(); ?>/user">Users</a>
                </li>
            </ul>
            <!-- <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="#">
                                            <i class="icon-bell"></i> Action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-shield"></i> Another action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-user"></i> Something else here</a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-bag"></i> Separated link</a>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Add Users
            <!-- <small>blank page layout</small> -->
        </h3>
        <?php if (isset($validation)) {
            echo $validation->listErrors();
        } ?>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <!-- <form action="<?// base_url(); ?>/add-user" method="post" class="horizontal-form"> -->
                        <?= form_open('add-user') ?>
                        <div class="form-body">
                            <!-- <h3 class="form-section">Person Info</h3> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group <?= (session()->has('validation') && session()->getFlashdata('validation')->getError('username')) ? 'has-error' : '' ?>">
                                        <label class="control-label">Username</label>
                                        <input type="text" name="username" value="<?= (session()->has('validation') && session()->getFlashdata('validation')->getError('username')) ? '' : old('username'); ?>" class="form-control">
                                        <span class="help-block"> <?= (session()->has('validation') && session()->getFlashdata('validation')->getError('username')) ? session()->getFlashdata('validation')->getError('username') : '' ?> </span>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group <?= (session()->has('validation') && session()->getFlashdata('validation')->getError('fullName')) ? 'has-error' : '' ?> ">
                                        <label class="control-label">FullName</label>
                                        <input type="text" name="fullName" value="<?= (session()->has('validation') && session()->getFlashdata('validation')->getError('fullName')) ? '' : old('fullName'); ?>" class="form-control">
                                        <span class="help-block"> <?= (session()->has('validation') && session()->getFlashdata('validation')->getError('fullName')) ? session()->getFlashdata('validation')->getError('fullName') : '' ?> </span>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group  <?= (session()->has('validation') && session()->getFlashdata('validation')->getError('password')) ? 'has-error' : '' ?>">
                                        <label class="control-label">Password</label>
                                        <div class="input-icon">
                                            <i class="fa fa-lock"></i>
                                            <input class="form-control placeholder-no-fix" type="password" value="<?= (session()->has('validation') && session()->getFlashdata('validation')->getError('password')) ? '' : old('password'); ?>" autocomplete="new-password" placeholder="Password" name="password" />
                                        </div>
                                        <span class="help-block"> <?= (session()->has('validation') && session()->getFlashdata('validation')->getError('password')) ? session()->getFlashdata('validation')->getError('password') : '' ?> </span>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group  <?= (session()->has('validation') && session()->getFlashdata('validation')->getError('confirmPassword')) ? 'has-error' : '' ?>">
                                        <label class="control-label">Confirm Password</label>
                                        <div class="input-icon">
                                            <i class="fa fa-lock"></i>
                                            <input class="form-control placeholder-no-fix" type="password" value="<?= (session()->has('validation') && session()->getFlashdata('validation')->getError('confirmPassword')) ? '' : old('confirmPassword'); ?>" autocomplete="off" placeholder="Confirm Password" name="confirmPassword" />
                                            <span class="help-block"> <?= (session()->has('validation') && session()->getFlashdata('validation')->getError('confirmPassword')) ? session()->getFlashdata('validation')->getError('confirmPassword') : '' ?> </span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group  <?= (session()->has('validation') && session()->getFlashdata('validation')->getError('phone')) ? 'has-error' : '' ?>">
                                        <label class="control-label">Phone</label>
                                        <div class="input-icon">
                                            <i class="fa fa-phone"></i>
                                            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Minimum 10 digits" name="phone" />
                                            <span class="help-block"> <?= (session()->has('validation') && session()->getFlashdata('validation')->getError('phone')) ? session()->getFlashdata('validation')->getError('phone') : '' ?> </span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group <?= (session()->has('validation') && session()->getFlashdata('validation')->getError('role')) ? 'has-error' : '' ?>">
                                        <label class="control-label">User Role</label>
                                        <select class="form-control" name="role">
                                            <option selected disabled>---- select category ----</option>
                                            <option value="admin">Admin</option>
                                            <option value="agent">Agent</option>
                                            <option value="supervisor">Supervisor</option>
                                            <option value="customer service">Customer Service</option>

                                        </select>
                                        <span class="help-block"> <?= (session()->has('validation') && session()->getFlashdata('validation')->getError('role')) ? session()->getFlashdata('validation')->getError('role') : '' ?> </span>

                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group <?= (session()->has('validation') && session()->getFlashdata('validation')->getError('leader')) ? 'has-error' : '' ?>">
                                        <label class="control-label">Supervisor</label>
                                        <select class="form-control" name="leader">
                                            <option selected disabled>---- select category ----</option>
                                            <?php if (isset($supervisors)) :
                                                foreach ($supervisors as $supervisor) : ?>
                                                    <option value="<?= $supervisor['supervisor_id'] ?>"><?= $supervisor['username'] ?></option>
                                            <?php
                                                endforeach;
                                            endif; ?>
                                        </select>
                                        <span class="help-block"> <?= (session()->has('validation') && session()->getFlashdata('validation')->getError('leader')) ? session()->getFlashdata('validation')->getError('leader') : '' ?> </span>

                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>
                        <div class="form-actions left">
                            <button type="reset" id="button-tos" class="btn default">Cancel</button>
                            <button type="submit" class="btn blue">
                                <i class="fa fa-check"></i> Save</button>
                        </div>
                        <!-- </form> -->
                        <?= form_close(); ?>
                        <!-- END FORM-->
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