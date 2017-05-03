
<?= $modal_js ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <center><h4 class="modal-title" id="myModalLabel">Minimum Qty Level / Re-order Qty</h4></center>
        </div>
        <?php
        $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id' => 'addFormx');
        echo form_open_multipart("system_settings/SaveMin_qty_lvl", $attrib);
        ?>
        <!--<form data-toggle="validator" role="form" id="addFormx">-->
            <div class="modal-body">
                <p><?= lang('enter_info'); ?></p>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="companies">1.Store</label>
                            <div class="controls"> 
                                <?php echo form_input('store_id', '', 'class="form-control myselect" id="companies"  data-tab="companies"  placeholder="select store" data-bv-notempty="true"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="department">2.Department</label>
                            <div class="controls"> 
                                <?php echo form_input('department', '', 'class="form-control myselect"  data-tab="department" data-key="store_id" data-id="companies" id="department" placeholder="select department" data-bv-notempty="true"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="section">3.Section</label>
                            <div class="controls"> 
                                <?php echo form_input('section', '', 'class="form-control myselect" data-key="department_id" data-id="department" id="section" data-tab="section" placeholder="select section" data-bv-notempty="true"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="product_items">4.Products Item</label>
                            <div class="controls"> 
                                <?php echo form_input('product_items', '', 'class="form-control myselect"  data-key="section_id" data-id="section" id="product_items" data-tab="product_items" placeholder="select product items" data-bv-notempty="true"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="type">5.Type</label>
                            <div class="controls"> 
                                <?php echo form_input('type_id', '', 'class="form-control myselect" data-key="product_items_id" data-id="product_items" id="type" data-tab="type" placeholder="select type" data-bv-notempty="true"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="brands">6.Brand</label>
                            <div class="controls"> 
                                <?php echo form_input('brands', '', 'class="form-control myselect" data-key="type_id" data-id="type" id="brands"  data-tab="brands" placeholder="select brands" data-bv-notempty="true"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="brands">12.color</label>
                            <div class="controls"> 
                                <?php echo form_input('color', '', 'class="form-control myselect" id="color"  data-tab="color" placeholder="select Color" data-bv-notempty="true"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="mrp_from">13. MRP-From</label>
                            <div class="controls"> 
                                <?php echo form_input('mrp_from', '', 'class="form-control tip" id="mrp_from" data-bv-notempty="true"'); ?>
                            </div>
                        </div>
                    </div><!--end col 6 --->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="design">7. Design</label>
                            <div class="controls"> 
                                <?php echo form_input('design', '', 'class="form-control myselect" data-key="brands_id" data-id="brands" id="design" data-tab="design" placeholder="select Design" '); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="style">8. Style</label>
                            <div class="controls"> 
                                <?php echo form_input('style', '', 'class="form-control myselect" data-key="design_id" data-id="design" id="style" data-tab="style" placeholder="select Style" '); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="pattern">9. Pattern</label>
                            <div class="controls"> 
                                <?php echo form_input('pattern', '', 'class="form-control myselect" data-key="style_id" data-id="style" id="pattern" data-tab="pattern" placeholder="select Pattern" '); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="fitting">10. Fitting</label>
                            <div class="controls"> 
                                <?php echo form_input('fitting', '', 'class="form-control myselect" data-key="pattern_id" data-id="pattern" id="fitting" data-tab="fitting" placeholder="select Fitting" '); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="fabric">11. Fabric</label>
                            <div class="controls"> 
                                <?php echo form_input('fabric', '', 'class="form-control myselect" data-key="fitting_id" data-id="fitting" id="fabric" data-tab="fabric" placeholder="select Fabric" '); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="size">13. Size</label>
                            <div class="controls"> 
                                <?php echo form_input('size', '', 'class="form-control sizesel" data-tab="size" data-key="department_id-section_id-product_items_id" data-id="department,section,product_items" id="selsize" placeholder="select Size" data-bv-notempty="true"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="mrp">14. MRP</label>
                            <div class="controls"> 
                                <?php echo form_input('mrp', '', 'class="form-control tip" id="mrp"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="mrp_to">Up to</label>
                            <div class="controls"> 
                                <?php echo form_input('mrp_to', '', 'class="form-control tip" id="mrp_to" data-bv-notempty="true"'); ?>
                            </div>
                        </div>
                    </div><!--end col 6 --->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="min_qty_lvl">15. Minimum Qty Level</label>
                                <div class="controls">
                                    <?php echo form_input('min_qty_lvl', '', 'class="form-control " id="min_qty_lvl" style="margin:0px 12px" data-bv-notempty="true"'); ?>                  
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="reorder_qty">16. Re-order Qty</label>
                                <div class="controls">
                                    <?php echo form_input('reorder_qty', '', 'class="form-control " id="reorder_qty" style="margin:0px 12px" data-bv-notempty="true"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="min_qty_lvl">Unit Per</label>
                                <div class="controls">
                                    <?php echo form_input('min_qty_lvl_per', '', 'class="form-control myselect per" data-tab="per" style="margin:0px 12px" '); ?>                             
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="reorder_qty">Unit Per</label>
                                <div class="controls">             
                                    <?php echo form_input('reorder_qty_per', '', 'class="form-control myselect per" data-tab="per" style="margin:0px 12px" '); ?>                         
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="min_qty_lvl_2">15. Minimum Qty Level 2</label>
                                <div class="controls">
                                    <?php echo form_input('min_qty_lvl_2', '', 'class="form-control" id="min_qty_lvl_2" style="margin:0px 12px" data-bv-notempty="true"'); ?>               
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="reorder_qty_2">16. Re-order Qty 2</label>
                                <div class="controls">
                                    <?php echo form_input('reorder_qty_2', '', 'class="form-control " id="reorder_qty_2" style="margin:0px 12px" data-bv-notempty="true"'); ?>             
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="min_qty_lvl_2_per" >Unit Per</label>
                                <div class="controls">
                                    <?php echo form_input('min_qty_lvl_2_per', '', 'class="form-control  myselect per" data-tab="per" style="margin:0px 12px" '); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="reorder_qty_2_per" >Unit Per</label>
                                <div class="controls">
                                    <?php echo form_input('reorder_qty_2_per', '', 'class="form-control myselect per" data-tab="per" style="margin:0px 12px" '); ?>
                                </div>
                            </div>
                        </div>
                        <div class="clearfir"></div>
                    </div>
                    
                </div>
                <!---->
            </div><!--end body div-->
            <div class="modal-footer" style="clear:both;">
                <input name="add_user" value="Save" class="btn btn-primary" type="submit"> 
            </div><!--end foter div-->
        </form>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (e) {
        $('#addFormx').bootstrapValidator({
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
//                $("label[for='" + id + "']").append(' *');
                $(document).on('change', iid, function () {
                    $('form[data-toggle="validator"]').bootstrapValidator('revalidateField', iname);
                });
            }
        });
    });
    /**
     * Comment
     */
    mrp = onlydigits('mrp');
    mrp();
    mrp_from = onlydigits('mrp_from');
    mrp_from();
    mrp_to = onlydigits('mrp_to');
    mrp_to();
    min_qty_lvl = onlydigits('min_qty_lvl');
    min_qty_lvl();
    min_qty_lvl_2 = onlydigits('min_qty_lvl_2');
    min_qty_lvl_2();
    reorder_qty = onlydigits('reorder_qty');
    reorder_qty();
    reorder_qty_2 = onlydigits('reorder_qty_2');
    reorder_qty_2();
    $(document).ready(function () {
//        $("#addFormx").unbind().submit(function (e) {
//            e.preventDefault();
//            var form = $("#addFormx");
//            var $data = $(this).serialize();
////            $data += "&name=<?= $this->security->get_csrf_token_name() ?>&value=<?= $this->security->get_csrf_hash() ?>";
//            $.ajax({
//                url: "<?= site_url('system_settings/SaveMin_qty_lvl/?v=1') ?>",
//                type: "get", async: false,
//                data: $data,
//                dataType: 'json',
//                success: function (data, textStatus, jqXHR) {
//                    if (data.s === "true") {
//                        bootbox.alert('Paramenter Added Successfully!');
//                        oTable.fnDraw();
//                        $("#myModal").modal('hide');
//                    } else {
//                        bootbox.alert('Paramenter Adding Failed!');
//                        $("#myModal").modal('hide');
//                    }
//                }
//            });
//            return false;
//        });
        var obj = ['companies', 'department', 'section', 'product_items', 'type', 'brands', 'design', 'style', 'pattern', 'fitting', 'fabric', 'color', 'size', 'per'];
        var objarr = [];
        var i = 0;
        $.each(obj, function (k, v) {
            objarr[i] = myselect2(v);
            objarr[i]();
            i++;
        });
        function myselect2(id) {
            if (id == "per") {
                var pp = $("." + id);
            } else {
                var pp = $("#" + id);
            }
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
        function getidsx() {
//            alsert($("#selsize").data('id'));
            var $ids = $("#selsize").data('id').split(",");
            var $idvals = "";

            $.each($ids, function (k, v) {
                $idvals += ($("#" + v).val() ? $("#" + v).val() : "") + "-";
            });
            $idvals = $idvals.trim();
            return $idvals;
        }
        $("#selsize").select2({
            minimumInputLength: 1,
            data: [],
            initSelection: function (element, callback) {
                $.ajax({
                    type: "get", async: false,
                    url: site_url + "products/getIdAttribute",
                    data: {
                        term: $(element).val(),
                        tab: $(element).data('tab'),
                        id: getidsx,
                        key: $(element).data('key'),
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
                        tab: $("#selsize").data('tab'),
                        id: getidsx,
                        key: $("#selsize").data('key'),
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
    });
</script>
