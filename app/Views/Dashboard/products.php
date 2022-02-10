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
                    <a href="#">Products</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Products
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
                                        <button id="#" class="btn green" onclick="window.location.href='<?= base_url(); ?>/add-product'"> Add New
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                                <tr>
                                    <th> Product Code </th>
                                    <th> Product Name </th>
                                    <th> Product Price </th>
                                    <th> Description </th>
                                    <th> Ingredients </th>
                                    <th> Quantity Remaining </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($products)) :
                                    foreach ($products as $product) : ?>
                                        <tr>
                                            <td><?= $product['product_code']; ?> </td>
                                            <td> <?= $product['product_name']; ?> </td>
                                            <td><?= $product['product_price']; ?></td>
                                            <td> <?= $product['description']; ?></td>
                                            <td> <?= $product['ingredients']; ?> </td>
                                            <!-- <td> <?// $product['quantity']; ?> </td> -->
                                            <?php if (isset($batch_products)) : ?>
                                                <td>
                                                    <button class="btn btn-default popovers" data-container="body" data-trigger="hover" data-placement="bottom" data-content="<?php $batchSum = 0;
                                                                                                                                                                                foreach ($batch_products as $batch_product) : if ($batch_product['prd_code'] == $product['product_code']) : echo  $batch_product["batch_num"] . '=' . $batch_product["remaining_qty"] . '<br/>';
                                                                                                                                                                                        $batchSum += $batch_product["remaining_qty"]; //calculate batch sum for each product
                                                                                                                                                                                    endif;
                                                                                                                                                                                endforeach; ?> " data-html="true" data-original-title="Batch No. & Qty Remaining"><?= $batchSum; ?> </button>
                                                </td>
                                            <?php endif; ?>

                                            <td>
                                                <a class="edit-user" data-toggle="modal" onclick="edit_products('<?= $product['product_code']; ?>')" href="#edit-user-modal"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</a>
                                                <a onclick="delete_product('<?= $product['product_code'] ?>')" class="delete-user"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                <?php endforeach;
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
<div id="edit-user-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url(); ?>/edit_product_details" method="post" class="horizontal-form">

            <div class="modal-content">
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
                                        <label class="control-label">Product Name</label>
                                        <input type="text" id="prdName" name="product_name" class="form-control">
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Product Code</label>
                                        <input type="text" id="prdCode" name="product_code" class="form-control">
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Price</label>
                                        <input type="text" id="prdPrice" name="product_price" class="form-control">
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Quantity Remaining</label>
                                        <input type="number" id="qtyRemaining" name="prd_qty_left" class="form-control" disabled>
                                        <!-- <span class="help-block"> This field has error. </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Description</label>
                                        <textarea class="form-control input-sm" rows="2" maxlength="150" name="description" id="descp"></textarea>
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ingredients</label>
                                        <textarea class="form-control input-sm" rows="2" maxlength="150" id="indgt" name="ingredients"></textarea>
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Total Quantity</label>
                                        <input type="number" id="qtyRemaining" class="form-control" name="quantity" disabled>
                                        <!-- <span class="help-block"> This field has error. </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                            </div><br>
                            <!--/row-->
                            <h4 class="modal-title">Product Batch details</h4><br>
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th> Batch No. </th>
                                        <th> Expiry Date </th>
                                        <th> Quantity </th>
                                        <th> Quantity Available </th>

                                    </tr>
                                </thead>
                                <tbody id="batchView">

                                </tbody>
                            </table>
                            <div class="form-actions left">
                                <a data-toggle="modal" onclick="add_stock()" href="#add-stock-modal" class="btn green"> <i class="fa fa-plus"></i> Add Batch</a>
                                <p>&nbsp;</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                    <!-- <button type="button" class="btn green">Save Product</button> -->
                    <input type="submit" class="btn green" value="Save Product">
                </div>
            </div>
        </form>
    </div>
</div>
<div id="add-stock-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>/addBatch" id="idForm" method="post" class="horizontal-form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add Stock with batch details</h4>
                </div>
                <div class="modal-body">
                    <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                        <div class="form-body">
                            <!-- <h3 class="form-section">Person Info</h3> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Batch Number</label>
                                        <input type="text" id="batchNumber" name="batch" class="form-control">
                                        <!-- hidden field to pass prd_code -->
                                        <input type="hidden" class="form-control" name="product_code" id="prdId">
                                        <!-- <span class="help-block"> This is inline help </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Created date</label>
                                        <input type="text" id="createdDate" class="form-control" value="<?= date('d/m/Y'); ?>" disabled>
                                        <!-- <span class="help-block"> This field has error. </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Quantity</label>
                                        <input type="number" id="batchQty" name="qty" class="form-control">
                                        <!-- <span class="help-block"> This field has error. </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Expiry Date</label>
                                        <input type="date" id="expiryDate" name="expiry" class="form-control" value="11/06/2024">
                                        <!-- <span class="help-block"> This field has error. </span> -->
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" id="close" class="btn dark btn-outline">Close</button>
                    <!-- <button type="button" class="btn green">Add Stock</button> -->
                    <input type="submit" class="btn green" value="Add Stock">
                </div>
        </form>
    </div>
</div>
</div>
<!-- END CONTAINER -->
<?= $this->include('includes/footer.php'); ?>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<!-- <script src="./assets/pages/js/table-datatables-editable.min.js" type="text/javascript"></script> -->

<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript">
    function delete_product(prd_code) {
        if (confirm('Are you sure delete this data?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?= base_url(); ?>/deleteProduct/" + prd_code,
                type: "GET",
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
    //used to clear appended data from model
    $(document).ready(function() {
        $('#edit-user-modal').on('hidden.bs.modal', function() {
            location.reload();
        });
    });

    function edit_products(prd_code) {


        $.ajax({
            url: "<?= base_url(); ?>/edit-product",
            type: "Post",
            data: {
                product_code: prd_code
            },
            success: function(data) {
                var obj = JSON.parse(data) //we are get data in json format and converting it to object
                // console.log(obj.batches.length);

                $('#prdName').val(obj.product.product_name);
                $('#prdCode').val(obj.product.product_code);
                $('#prdPrice').val(obj.product.product_price);
                $('#qtyRemaining').val(10);
                $('#descp').val(obj.product.description);
                $('#indgt').val(obj.product.ingredients);

                var len = obj.batches.length;
                var txt = "";
                if (len > 0) {
                    for (var i = 0; i < len; i++) {
                        // alert(obj.batches[i].batch_num);
                        txt += "<tr><td>" + obj.batches[i].batch_num + "</td> <td>" + obj.batches[i].expiry + "</td> <td>" + obj.batches[i].qty + "</td> <td>" + obj.batches[i].remaining_qty + "</td> </tr>";
                    }
                    if (txt != "") {
                        $("#batchView").append(txt).removeClass("hidden");
                    }
                }




            },
            // error: function(jqXHR, textStatus, errorThrown) {
            //     alert('Error editing data');
            // }

        });


    }


    function add_stock() {
        // console.log($('#prdCode').val());
        prd_code = $('#prdCode').val();
        $('#prdId').val(prd_code);

        //form submit
        // this is the id of the form
        $("#idForm").submit(function(e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data) {
                    // alert(data); // show response from the php script.
                    $('#add-stock-modal').modal('hide')

                }
            });


        });

    }
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