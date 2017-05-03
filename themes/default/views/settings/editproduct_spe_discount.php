
<?= $modal_js ?>
<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel">Edit Product Special Discount</h4>
        </div>
        <?php
        $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id' => 'addParaForm');
        echo form_open_multipart("system_settings/editProd_Spe_Dis/" . $spe->id, $attrib);
        ?>
        <!--<form data-toggle="validator" role="form" id="addParaForm">-->
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="product_code">Barcode</label>
                        <div class="controls"> 
                            <?php echo form_input('product_code', $spe->product_code, 'class="form-control myselect" id="barcode" placeholder="Select Barcode" data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="product_name">Item Name</label>
                        <div class="controls"> 
                            <?php echo form_input('product_name', $spe->product_name, 'class="form-control myselect"  id="product_name" readonly data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="mrp">MRP</label>
                        <div class="controls"> 
                            <?php echo form_input('mrp', $spe->mrp, 'class="form-control myselect"  id="mrp" readonly data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="margin">Margin</label>
                        <div class="controls"> 
                            <?php echo form_input('margin', $spe->margin, 'class="form-control myselect"  id="margin" readonly '); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="purchase_rate">Purchase Rate</label>
                        <div class="controls"> 
                            <?php echo form_input('purchase_rate', $spe->purchase_rate, 'class="form-control myselect"  id="purchase_rate" readonly data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="old_discount">Old Discount</label>
                        <div class="controls"> 
                            <?php echo form_input('old_discount', $spe->old_discount, 'class="form-control myselect"  id="old_discount" readonly'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="special_discount">Special New Discount (in % only)</label>
                        <div class="controls"> 
                            <?php echo form_input('special_discount', $spe->special_discount, 'class="form-control myselect"  id="special_discount" data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="customer_group">Status*</label>
                        <div class="controls"> 
                            <?php echo form_dropdown('status', array('Active' => "Active", 'Deactive' => "Deactive"), $spe->status, 'class="form-control tip select" id="status" data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('addPara', "Update", 'class="btn btn-primary"'); ?>
        </div>
        </form>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function (e) {
        $('#addParaForm').bootstrapValidator({
            feedbackIcons: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            }, excluded: [':disabled']
        });
    });
    /**
     * Comment
     */
    var dig = onlydigits('margin');
    dig();

    $(document).ready(function () {
        $("#barcode").change(function () {
            $.ajax({
                type: "get", async: false,
                url: site_url + "products/getProductRow/" + $("#barcode").val(),
                dataType: "json",
                success: function (data) {
                    $data = data;
                    $("#product_name").val($data.product_name);
                    $("#mrp").val($data.mrp);
                    $("#purchase_rate").val($data.purchase_rate);
                    $("#margin").val($data.margin);
                    $("#old_discount").val($data.old_discount);
                    fields = $('.modal-content').find('.form-control');
                    $.each(fields, function () {
                        var id = $(this).attr('id');
                        var iname = $(this).attr('name');
                        var iid = '#' + id;
                        if (!!$(this).attr('data-bv-notempty') || !!$(this).attr('required')) {
                            $('form[data-toggle="validator"]').bootstrapValidator('revalidateField', iname);
                        }
                    });
                }
            });
        });
        var obj = ['barcode'];
        var objarr = [];
        var i = 0;
        $.each(obj, function (k, v) {
            objarr[i] = myselect2(v);
            objarr[i]();
            i++;
        });
        function myselect2(id) {
            var pp = $("#" + id);
            function get() {
                pp.select2({
                    minimumInputLength: 1,
                    data: [],
                    initSelection: function (element, callback) {
                        $.ajax({
                            type: "get", async: false,
                            url: site_url + "products/getProductIds/" + pp.val(),
                            dataType: "json",
                            success: function (data) {
                                callback(data[0]);
                            }
                        });
                    },
                    ajax: {
                        url: site_url + "products/getProductIds",
                        dataType: 'json',
                        quietMillis: 15,
                        data: function (term, page) {
                            return {
                                term: term,
                                limit: 10
                            };
                        },
                        results: function (data, page) {
                            if (data.results != null) {
                                return {results: data.results};
                            } else {
                                return {results: [{id: '', text: 'No Match Found'}]};
                            }
                        }
                    }
                });
            }
            return get;
        }
    });
</script>
<?=
$angular_modal_js?>