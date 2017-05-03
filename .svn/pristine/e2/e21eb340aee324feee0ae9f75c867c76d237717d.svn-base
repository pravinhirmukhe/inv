
<?= $modal_js ?>
<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel">Add New <?= ucwords(str_replace("_", " ", $tab)) ?></h4>
        </div>
        <?php
//        $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id' => 'addParaForm');
//        echo form_open_multipart("customers/add", $attrib);
        ?>
        <form data-toggle="validator" role="form" id="addParaForm">
            <div class="modal-body">
                <p><?= lang('enter_info'); ?></p>
                <div class="form-group">
                    <label class="control-label" for="customer_group">Name*</label>
                    <div class="controls"> 
                        <?php echo form_input('para_name', '', 'class="form-control tip" id="para_name" data-bv-notempty="true"'); ?>
                    </div>
                </div>
                <?php if ($tab == "department") { ?>
                    <div class="form-group">
                        <label class="control-label" for="store_id">Store*</label>
                        <div class="controls"> 
                            <?php echo form_input('store_id', '', 'class="form-control product_para_' . $tab . '"  data-tab="companies" placeholder="select store" data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($tab == "section") { ?>
                    <div class="form-group">
                        <label class="control-label" for="department_id">Department*</label>
                        <div class="controls"> 
                            <?php echo form_input('department_id', '', 'class="form-control product_para_' . $tab . '"  data-tab="department" placeholder="select department" data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($tab == "product_items") { ?>
                    <div class="form-group">
                        <label class="control-label" for="section_id">Section*</label>
                        <div class="controls"> 
                            <?php echo form_input('section_id', '', 'class="form-control product_para_' . $tab . '"  data-tab="section" placeholder="select section" data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($tab == "type") { ?>
                    <div class="form-group">
                        <label class="control-label" for="product_items_id">Products Item*</label>
                        <div class="controls"> 
                            <?php echo form_input('product_items_id', '', 'class="form-control product_para_' . $tab . '"  data-tab="product_items" placeholder="select product items" data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($tab == "brands") { ?>
                    <div class="form-group">
                        <label class="control-label" for="type_id">Type*</label>
                        <div class="controls"> 
                            <?php echo form_input('type_id', '', 'class="form-control product_para_' . $tab . '"  data-tab="type" placeholder="select type" data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($tab == "design") { ?>
                    <div class="form-group">
                        <label class="control-label" for="brands_id">Brand*</label>
                        <div class="controls"> 
                            <?php echo form_input('brands_id', '', 'class="form-control product_para_' . $tab . '"  data-tab="brands" placeholder="select brands" data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($tab == "style") { ?>
                    <div class="form-group">
                        <label class="control-label" for="design_id">Design*</label>
                        <div class="controls"> 
                            <?php echo form_input('design_id', '', 'class="form-control product_para_' . $tab . '"  data-tab="design" placeholder="select design" data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($tab == "pattern") { ?>
                    <div class="form-group">
                        <label class="control-label" for="style_id">Style*</label>
                        <div class="controls"> 
                            <?php echo form_input('style_id', '', 'class="form-control product_para_' . $tab . '"  data-tab="style" placeholder="select style" data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($tab == "fitting") { ?>
                    <div class="form-group">
                        <label class="control-label" for="pattern_id">Pattern*</label>
                        <div class="controls"> 
                            <?php echo form_input('pattern_id', '', 'class="form-control product_para_' . $tab . '"  data-tab="pattern" placeholder="select pattern" data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($tab == "fabric") { ?>
                    <div class="form-group">
                        <label class="control-label" for="fitting_id">Fitting*</label>
                        <div class="controls"> 
                            <?php echo form_input('fitting_id', '', 'class="form-control product_para_' . $tab . '"  data-tab="fitting" placeholder="select fitting" data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($tab == "size") { ?>
                    <div class="form-group">
                        <label class="control-label" for="code">Code*</label>
                        <div class="controls"> 
                            <?php echo form_input('code', '', 'class="form-control tip" id="code" data-bv-notempty="true"'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="department_id">Department*</label>
                        <div class="controls"> 
                            <?php echo form_input('department_id', '', 'class="form-control"  data-tab="department" id="department" placeholder="select department" data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="section_id">Section*</label>
                        <div class="controls"> 
                            <?php echo form_input('section_id', '', 'class="form-control"  data-key="department_id" data-id="department" id="section" data-tab="section" placeholder="select section" data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="product_items_id">Products Item*</label>
                        <div class="controls"> 
                            <?php echo form_input('product_items_id', '', 'class="form-control"  data-key="section_id" data-id="section" id="product_items" data-tab="product_items" placeholder="select product items" data-bv-notempty="true"'); ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label class="control-label" for="customer_group">Status*</label>
                    <div class="controls"> 
                        <?php echo form_dropdown('status', array('Active' => "Active", 'Deactive' => "Deactive"), '', 'class="form-control tip select" id="status" data-bv-notempty="true"'); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?php echo form_submit('addPara', "Add", 'class="btn btn-primary"'); ?>
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
        $('select.select').select2({minimumResultsForSearch: 6});
        fields = $('.modal-content').find('.form-control');
        $.each(fields, function () {
            var id = $(this).attr('id');
            var iname = $(this).attr('name');
            var iid = '#' + id;
            if (!!$(this).attr('data-bv-notempty') || !!$(this).attr('required')) {
                $("label[for='" + id + "']").append(' *');
                $(document).on('change', iid, function () {
                    $('form[data-toggle="validator"]').bootstrapValidator('revalidateField', iname);
                });
            }
        });
    });
    /**
     * Comment
     */
    $(document).ready(function () {
        $("#addParaForm").unbind().submit(function (e) {
            e.preventDefault();
            var form = $("#addParaForm");
            var $data = $(this).serialize();
//            $data += "&name=<?= $this->security->get_csrf_token_name() ?>&value=<?= $this->security->get_csrf_hash() ?>";
            $.ajax({
                url: "<?= site_url('system_settings/AddAjaxProduct_para/' . $tab . "/?v=1") ?>",
                type: "get", async: false,
                data: $data,
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    if (data.s === "true") {
                        bootbox.alert('Paramenter Added Successfully!');
                        oTable['<?= $tab ?>'].fnDraw();
                        document.getElementById("addParaForm").reset();
                    } else {
                        bootbox.alert('Paramenter Adding Failed!');
                    }
                }
            });
            return false;
        });
        pp = $(".product_para_<?= $tab ?>");
        pp.select2({
            minimumInputLength: 1,
            data: [],
            initSelection: function (element, callback) {
                $.ajax({
                    type: "get", async: false,
                    url: site_url + "products/getIdAttribute",
                    data: {
                        term: pp.val(),
                        tab: pp.data('tab')
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
        var obj = ['department', 'section', 'product_items'];
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
