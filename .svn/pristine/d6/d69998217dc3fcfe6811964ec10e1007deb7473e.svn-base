
<?= $modal_js ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel">Edit Product Margin</h4>
        </div>
        <?php
//        $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id' => 'addParaForm');
//        echo form_open_multipart("customers/add", $attrib);
        ?>
        <form data-toggle="validator" role="form" id="addParaForm">
            <div class="modal-body">
                <p><?= lang('enter_info'); ?></p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="companies">Store</label>
                            <?= form_hidden("id", $margin->id) ?>
                            <div class="controls"> 
                                <?php echo form_input('store_id', $_GET['store_id'] ? $_GET['store_id'] : $margin->store_id, 'class="form-control myselect" id="companies"  data-tab="companies"  placeholder="select store" data-bv-notempty="true"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="department">Department</label>
                            <div class="controls"> 
                                <?php echo form_input('department_id', $_GET['department_id'] ? $_GET['department_id'] : $margin->department_id, 'class="form-control myselect"  data-tab="department" data-key="store_id" data-id="companies" id="department" placeholder="select department" data-bv-notempty="true"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="section">Section</label>
                            <div class="controls"> 
                                <?php echo form_input('section_id', $_GET['section_id'] ? $_GET['section_id'] : $margin->section_id, 'class="form-control myselect" data-key="department_id" data-id="department" id="section" data-tab="section" placeholder="select section" data-bv-notempty="true"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="product_items">Products Item</label>
                            <div class="controls"> 
                                <?php echo form_input('product_item_id', $_GET['product_item_id'] ? $_GET['product_item_id'] : $margin->product_item_id, 'class="form-control myselect"  data-key="section_id" data-id="section" id="product_items" data-tab="product_items" placeholder="select product items" data-bv-notempty="true"'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="type">Type</label>
                            <div class="controls"> 
                                <?php echo form_input('type_id', $_GET['type_id'] ? $_GET['type_id'] : $margin->type_id, 'class="form-control myselect" data-key="product_items_id" data-id="product_items" id="type" data-tab="type" placeholder="select type" data-bv-notempty="true"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="brands">Brand</label>
                            <div class="controls"> 
                                <?php echo form_input('brands_id', $_GET['brands_id'] ? $_GET['brands_id'] : $margin->brands_id, 'class="form-control myselect" data-key="type_id" data-id="type" id="brands"  data-tab="brands" placeholder="select brands" data-bv-notempty="true"'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="discount">Discount(in % only)</label>
                            <div class="controls"> 
                                <?php echo form_input('discount', $_GET['discount'] ? $_GET['discount'] : $margin->discount, 'class="form-control" id="discount" data-bv-notempty="true"'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="customer_group">Status*</label>
                            <div class="controls"> 
                                <?php echo form_dropdown('status', array('Active' => "Active", 'Deactive' => "Deactive"), $_GET['status'] ? $_GET['status'] : $margin->status, 'class="form-control tip select" id="status" data-bv-notempty="true"'); ?>
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
//        $('select.select').select2({minimumResultsForSearch: 6});
//        fields = $('.modal-content').find('.form-control');
//        $.each(fields, function () {
//            var id = $(this).attr('id');
//            var iname = $(this).attr('name');
//            var iid = '#' + id;
//            if (!!$(this).attr('data-bv-notempty') || !!$(this).attr('required')) {
//                $("label[for='" + id + "']").append(' *');
//                $(document).on('change', iid, function () {
//                    $('form[data-toggle="validator"]').bootstrapValidator('revalidateField', iname);
//                });
//            }
//        });
    });
    /**
     * Comment
     */
    var dig = onlydigits('margin');
    dig();
    $(document).ready(function () {
        $("#addParaForm").unbind().submit(function (e) {
            e.preventDefault();
            var form = $("#addParaForm");
            var $data = $(this).serialize();
//            $data += "&name=<?= $this->security->get_csrf_token_name() ?>&value=<?= $this->security->get_csrf_hash() ?>";
            $.ajax({
                url: "<?= site_url('system_settings/EditAjaxProduct_discount/?v=1') ?>",
                type: "get", async: false,
                data: $data,
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    if (data.s === "true") {
                        bootbox.alert('Product Discount Updated Successfully!');
                        oTable_prod_discount.fnDraw();
                        document.getElementById("addParaForm").reset();
                    } else {
                        bootbox.alert('Product Discount Updating Failed!');
                    }
                }
            });
            return false;
        });
        var obj = ['companies', 'department', 'section', 'product_items', 'type', 'brands'];
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
                            url: site_url + "products/getIdAttribute",
                            data: {
                                term: pp.val(),
                                tab: pp.data('tab'),
                                id: $("#" + pp.data('id')).val(),
                                key: pp.data('key'),
                            },
                            dataType: "json",
                            success: function (data) {
                                callback(data[0]);
                            }
                        });
                    },
                    ajax: {
                        url: site_url + "products/getIdAttributes",
                        dataType: 'json',
                        quietMillis: 15,
                        data: function (term, page) {
                            return {
                                term: term,
                                tab: pp.data('tab'),
                                id: $("#" + pp.data('id')).val(),
                                key: pp.data('key'),
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