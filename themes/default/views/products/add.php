<?php
if (!empty($variants)) {
    foreach ($variants as $variant) {
        $vars[] = addslashes($variant->name);
    }
} else {
    $vars = array();
}

$department[''] = "";
$product_items[''] = "";
$section[''] = "";
$type[''] = "";
$brands[''] = "";
$design[''] = "";
$style[''] = "";
$pattern[''] = "";
$fitting[''] = "";
$fabric[''] = "";
$color[''] = "";
$size[''] = "";
$sizes = array();
$per[''] = "";
foreach ($product_para as $k => $v) {
    if ($k == "department" && !empty($v)) {
        foreach ($v as $d) {
            $department[$d->id] = $d->name;
        }
    }
    if ($k == "product_items" && !empty($v)) {
        foreach ($v as $d) {
            $product_items[$d->id] = $d->name;
        }
    }
    if ($k == "section" && !empty($v)) {
        foreach ($v as $d) {
            $section[$d->id] = $d->name;
        }
    }
    if ($k == "type" && !empty($v)) {
        foreach ($v as $d) {
            $type[$d->id] = $d->name;
        }
    }
    if ($k == "brands" && !empty($v)) {
        foreach ($v as $d) {
            $brands[$d->id] = $d->name;
        }
    }
    if ($k == "design" && !empty($v)) {
        foreach ($v as $d) {
            $design[$d->id] = $d->name;
        }
    }
    if ($k == "style" && !empty($v)) {
        foreach ($v as $d) {
            $style[$d->id] = $d->name;
        }
    }
    if ($k == "pattern" && !empty($v)) {
        foreach ($v as $d) {
            $pattern[$d->id] = $d->name;
        }
    }
    if ($k == "fitting" && !empty($v)) {
        foreach ($v as $d) {
            $fitting[$d->id] = $d->name;
        }
    }
    if ($k == "fabric" && !empty($v)) {
        foreach ($v as $d) {
            $fabric[$d->id] = $d->name;
        }
    }
    if ($k == "color" && !empty($v)) {
        foreach ($v as $d) {
            $color[$d->id] = $d->name;
        }
    }
    if ($k == "size" && !empty($v)) {
        foreach ($v as $d) {
            $size[$d->id] = $d->name;
            $sizes[$d->id] = $d;
//            array_push($sizes, $d);
        }
    }
    if ($k == "per" && !empty($v)) {
        foreach ($v as $d) {
            $per[$d->id] = $d->name;
        }
    }
}
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#subcategory").select2("destroy").empty().attr("placeholder", "<?= lang('select_category_to_load') ?>").select2({
            placeholder: "<?= lang('select_category_to_load') ?>", data: [
                {id: '', text: '<?= lang('select_category_to_load') ?>'}
            ]
        });
        $('#category').change(function () {
            var v = $(this).val();
            $('#modal-loading').show();
            if (v) {
                $.ajax({
                    type: "get",
                    async: false,
                    url: "<?= site_url('products/getSubCategories') ?>/" + v,
                    dataType: "json",
                    success: function (scdata) {
                        if (scdata != null) {
                            $("#subcategory").select2("destroy").empty().attr("placeholder", "<?= lang('select_subcategory') ?>").select2({
                                placeholder: "<?= lang('select_category_to_load') ?>",
                                data: scdata
                            });
                        }
                    },
                    error: function () {
                        bootbox.alert('<?= lang('ajax_error') ?>');
                        $('#modal-loading').hide();
                    }
                });
            } else {
                $("#subcategory").select2("destroy").empty().attr("placeholder", "<?= lang('select_category_to_load') ?>").select2({
                    placeholder: "<?= lang('select_category_to_load') ?>",
                    data: [{id: '', text: '<?= lang('select_category_to_load') ?>'}]
                });
            }
            $('#modal-loading').hide();
        });
        $('#code').bind('keypress', function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                return false;
            }
        });
    });
</script>
<div class="box" ng-controller="addProducts">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= lang('add_product'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?php echo lang('enter_info'); ?></p>
                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id' => 'addproduct');
                echo form_open_multipart("products/add", $attrib)
                ?>
                <div class="col-md-5">
                    <div class="form-group">
                        <?= lang("product_type", "type") ?>
                        <?php
                        $opts = array('standard' => lang('standard'), 'combo' => lang('combo'), 'bundle' => lang('bundle'));
                        echo form_dropdown('type', $opts, (isset($_POST['type']) ? $_POST['type'] : ($product ? $product->type : '')), 'class="form-control" id="type" required="required" ng-model="prod.protype" ng-change="getProdBarcode()"');
                        ?>
                    </div>
                    <div class="form-group all">
                        <?= lang("Store", "companies") ?>
                        <div class="input-group">
                            <?php
                            echo form_input('store_id', (isset($_POST['store_id']) ? $_POST['store_id'] : ($product ? $product->store_id : '')), 'class="form-control" default-attrib data-tab="companies" data-id="0" id="companies" placeholder="' . lang("select") . " " . lang("store") . '" required="required" style="width:100%" ng-model="prod.store_id" ng-change="getProdBarcode();"');
                            ?>
                            <div class="input-group-addon no-print">
                                <a href="<?php echo site_url('billers/add'); ?>" data-toggle="modal" data-target="#myModal" class="external"><i class="fa fa-plus-circle" style="font-size: 26px" id="addIcon"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group all">
                        <?= lang("Department", "department") ?>
                        <div class="input-group">
                            <?php
                            echo form_input('department', (isset($_POST['department']) ? $_POST['department'] : ($product ? $product->department : '')), 'class="form-control" default-attrib data-tab="department" data-key="store_id" data-id="companies" id="department" placeholder="' . lang("select") . " " . lang("department") . '" required="required" style="width:100%" ng-model="prod.dept" ng-change="getProdName();getProdBarcode();getProductMargin();"');
                            ?>
                            <div class="input-group-addon no-print">
                                <a href="<?php echo site_url('system_settings/AddProduct_para/department'); ?>" data-toggle="modal" data-target="#myModal" class="external"><i class="fa fa-plus-circle" style="font-size: 26px" id="addIcon"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group all">
                        <?= lang("Section", "section") ?>
                        <div class="input-group">
                            <?php
                            echo form_input('section', (isset($_POST['section']) ? $_POST['section'] : ($product ? $product->section : '')), 'class="form-control" default-attrib data-tab="section" id="section" data-key="department_id" data-id="department" placeholder="' . lang("select") . " " . lang("section") . '" ng-model="prod.section_id" ng-change="getProductMargin();" required="required" style="width:100%"');
                            ?>
                            <div class="input-group-addon no-print">
                                <a href="<?php echo site_url('system_settings/AddProduct_para/section'); ?>" data-toggle="modal" data-target="#myModal" class="external"><i class="fa fa-plus-circle" style="font-size: 26px" id="addIcon"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group all">
                        <?= lang("Product_items", "product_items") ?>
                        <div class="input-group">
                            <?php
                            echo form_input('product_items', (isset($_POST['product_items']) ? $_POST['product_items'] : ($product ? $product->product_items : '')), 'class="form-control" default-attrib data-tab="product_items" data-key="section_id" data-id="section" id="product_items" placeholder="' . lang("select") . " " . lang("product_items") . '" required="required" style="width:100%" ng-model="prod.product_item" ng-change="getProdName();getProductMargin();"');
                            ?>
                            <div class="input-group-addon no-print">
                                <a href="<?php echo site_url('system_settings/AddProduct_para/product_items'); ?>" data-toggle="modal" data-target="#myModal" class="external"><i class="fa fa-plus-circle" style="font-size: 26px" id="addIcon"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group all">
                        <?= lang("Type", "type") ?>
                        <div class="input-group">
                            <?php
                            echo form_input('type_id', (isset($_POST['type_id']) ? $_POST['type_id'] : ($product ? $product->type_id : '')), 'class="form-control" default-attrib data-tab="type" id="type_id" data-key="product_items_id" data-id="product_items" placeholder="' . lang("select") . " " . lang("type") . '" required="required" style="width:100%" ng-model="prod.type" ng-change="getProdName();getProductMargin();"');
                            ?>
                            <div class="input-group-addon no-print">
                                <a href="<?php echo site_url('system_settings/AddProduct_para/type'); ?>" data-toggle="modal" data-target="#myModal" class="external"><i class="fa fa-plus-circle" style="font-size: 26px" id="addIcon"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group all">
                        <?= lang("Brands", "brands") ?>
                        <div class="input-group">
                            <?php
                            echo form_input('brands', (isset($_POST['brands']) ? $_POST['brands'] : ($product ? $product->brands : '')), 'class="form-control" default-attrib data-tab="brands" id="brands" data-key="type_id" data-id="type_id" placeholder="' . lang("select") . " " . lang("brands") . '" required="required" ng-model="prod.brands_id" ng-change="getProductMargin();"  style="width:100%"');
                            ?>
                            <div class="input-group-addon no-print">
                                <a href="<?php echo site_url('system_settings/AddProduct_para/brands'); ?>" data-toggle="modal" data-target="#myModal" class="external"><i class="fa fa-plus-circle" style="font-size: 26px" id="addIcon"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group standard">
                        <?= lang("Design", "design") ?>
                        <div class="input-group">
                            <?php
                            echo form_input('design', (isset($_POST['design']) ? $_POST['design'] : ($product ? $product->design : '')), 'class="form-control" default-attrib data-tab="design" id="design" data-key="brands_id" data-id="brands" placeholder="' . lang("select") . " " . lang("design") . '" required="required" style="width:100%"');
                            ?>
                            <div class="input-group-addon no-print">
                                <a href="<?php echo site_url('system_settings/AddProduct_para/design'); ?>" data-toggle="modal" data-target="#myModal" class="external"><i class="fa fa-plus-circle" style="font-size: 26px" id="addIcon"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group standard">
                        <?= lang("Style", "style") ?>
                        <div class="input-group">
                            <?php
                            echo form_input('style', (isset($_POST['style']) ? $_POST['style'] : ($product ? $product->style : '')), 'class="form-control" default-attrib data-tab="style" id="style" data-key="design_id" data-id="design" placeholder="' . lang("select") . " " . lang("style") . '" required="required" style="width:100%"');
                            ?>
                            <div class="input-group-addon no-print">
                                <a href="<?php echo site_url('system_settings/AddProduct_para/style'); ?>" data-toggle="modal" data-target="#myModal" class="external"><i class="fa fa-plus-circle" style="font-size: 26px" id="addIcon"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group standard">
                        <?= lang("Pattern", "pattern") ?>
                        <div class="input-group">
                            <?php
                            echo form_input('pattern', (isset($_POST['pattern']) ? $_POST['pattern'] : ($product ? $product->pattern : '')), 'class="form-control" default-attrib data-tab="pattern" data-key="style_id" data-id="style" id="pattern" placeholder="' . lang("select") . " " . lang("pattern") . '" required="required" style="width:100%"');
                            ?>
                            <div class="input-group-addon no-print">
                                <a href="<?php echo site_url('system_settings/AddProduct_para/pattern'); ?>" data-toggle="modal" data-target="#myModal" class="external"><i class="fa fa-plus-circle" style="font-size: 26px" id="addIcon"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group standard">
                        <?= lang("Fitting", "fitting") ?>
                        <div class="input-group">
                            <?php
                            echo form_input('fitting', (isset($_POST['fitting']) ? $_POST['fitting'] : ($product ? $product->fitting : '')), 'class="form-control" default-attrib data-tab="fitting" data-key="pattern_id" data-id="pattern" id="fitting" placeholder="' . lang("select") . " " . lang("fitting") . '" required="required" style="width:100%"');
                            ?>
                            <div class="input-group-addon no-print">
                                <a href="<?php echo site_url('system_settings/AddProduct_para/fitting'); ?>" data-toggle="modal" data-target="#myModal" class="external"><i class="fa fa-plus-circle" style="font-size: 26px" id="addIcon"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group standard">
                        <?= lang("Fabric", "fabric") ?>
                        <div class="input-group">
                            <?php
                            echo form_input('fabric', (isset($_POST['fabric']) ? $_POST['fabric'] : ($product ? $product->fabric : '')), 'class="form-control" default-attrib data-tab="fabric" id="fabric" data-key="fitting_id" data-id="fitting" placeholder="' . lang("select") . " " . lang("fabric") . '" required="required" style="width:100%"');
                            ?>
                            <div class="input-group-addon no-print">
                                <a href="<?php echo site_url('system_settings/AddProduct_para/fabric'); ?>" data-toggle="modal" data-target="#myModal" class="external"><i class="fa fa-plus-circle" style="font-size: 26px" id="addIcon"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <div class="form-group all">
                        <?= lang("product_name", "name") ?>
                        <?= form_input('name', (isset($_POST['name']) ? $_POST['name'] : ($product ? $product->name : '')), 'class="form-control" id="name" required="required" readonly ng-model="prod.name"'); ?>
                    </div>
                    <div class="form-group all">
                        <?= lang("product_code", "code") ?>
                        <?= form_input('code', (isset($_POST['code']) ? $_POST['code'] : ($product ? $product->code : '')), 'class="form-control" id="code"  required="required" readonly ng-model="prod.barcode" ') ?>
                        <span class="help-block"><?= lang('you_scan_your_barcode_too') ?></span>
                    </div>
                    <?= form_hidden('barcode_symbology', (isset($_POST['barcode_symbology']) ? $_POST['barcode_symbology'] : ($product ? $product->barcode_symbology : 'code128')), 'class="form-control" id="barcode_symbology"  required="required" readonly ') ?>
                    <?php /*  <div class="form-group all">
                      <?= lang("barcode_symbology", "barcode_symbology") ?>
                      <?php
                      $bs = array('code25' => 'Code25', 'code39' => 'Code39', 'code128' => 'Code128', 'ean8' => 'EAN8', 'ean13' => 'EAN13', 'upca ' => 'UPC-A', 'upce' => 'UPC-E');
                      echo form_dropdown('barcode_symbology', $bs, (isset($_POST['barcode_symbology']) ? $_POST['barcode_symbology'] : ($product ? $product->barcode_symbology : 'code128')), 'class="form-control select" id="barcode_symbology" required="required" style="width:100%;"');
                      ?>

                      </div>
                      <div class="form-group all">
                      <?= lang("category", "category") ?>
                      <?php
                      $cat[''] = "";
                      foreach ($categories as $category) {
                      $cat[$category->id] = $category->name;
                      }
                      echo form_dropdown('category', $cat, (isset($_POST['category']) ? $_POST['category'] : ($product ? $product->category_id : '')), 'class="form-control select" id="category" placeholder="' . lang("select") . " " . lang("category") . '" required="required" style="width:100%"')
                      ?>
                      </div>
                      <div class="form-group all">
                      <?= lang("subcategory", "subcategory") ?>
                      <div class="controls" id="subcat_data"> <?php
                      echo form_input('subcategory', ($product ? $product->subcategory_id : ''), 'class="form-control" id="subcategory"  placeholder="' . lang("select_category_to_load") . '"');
                      ?>
                      </div>
                      </div> */ ?>
                    <?php if ($Settings->tax1) { ?>
                        <div class="form-group standard">
                            <?= lang("product_tax", "tax_rate") ?>
                            <?php
                            $tr[""] = "";
                            foreach ($tax_rates as $tax) {
                                $tr[$tax->id] = $tax->name;
                            }
                            echo form_dropdown('tax_rate', $tr, (isset($_POST['tax_rate']) ? $_POST['tax_rate'] : ($product ? $product->tax_rate : $Settings->default_tax_rate)), 'class="form-control select" id="tax_rate" placeholder="' . lang("select") . ' ' . lang("product_tax") . '" style="width:100%"');
                            ?>
                        </div>
                        <div class="form-group standard">
                            <?= lang("tax_method", "tax_method") ?>
                            <?php
                            $tm = array('0' => lang('inclusive'), '1' => lang('exclusive'));
                            echo form_dropdown('tax_method', $tm, (isset($_POST['tax_method']) ? $_POST['tax_method'] : ($product ? $product->tax_method : '')), 'class="form-control select" id="tax_method" placeholder="' . lang("select") . ' ' . lang("tax_method") . '" style="width:100%"');
                            ?>
                        </div>
                    <?php } ?>
                    <?php /* ?> <div class="form-group standard">
                      <?= lang("alert_quantity", "alert_quantity") ?>
                      <div class="input-group"> <?= form_input('alert_quantity', (isset($_POST['alert_quantity']) ? $_POST['alert_quantity'] : ($product ? $this->sma->formatQuantity($product->alert_quantity) : '')), 'class="form-control tip" id="alert_quantity"') ?>
                      <span class="input-group-addon">
                      <input type="checkbox" name="track_quantity" id="track_quantity" value="1" <?= ($product ? (isset($product->track_quantity) ? 'checked="checked"' : '') : 'checked="checked"') ?>>
                      </span>
                      </div>
                      </div>
                     * <?php */ ?>
                    <div class="form-group standard">
                        <?= lang("supplier", "supplier") ?>
                        <button type="button" class="btn btn-primary btn-xs" id="addSupplier"><i class="fa fa-plus"></i></button>
                        <button type="button" class="btn btn-danger btn-xs" id="deleteSupplier"><i class="fa fa-minus"></i>
                        </button>
                        <div class="row" id="supplier-con">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php
                                echo form_input('supplier', (isset($_POST['supplier']) ? $_POST['supplier'] : ($product ? $product->supplier1 : '')), 'class="form-control ' . ($product ? '' : 'suppliers') . '" id="' . ($product && !empty($product->supplier1) ? 'supplier1' : 'supplier') . '" placeholder="' . lang("select") . ' ' . lang("supplier") . '" style="width:100%;"');
                                ?></div>
                            <!--<div class="col-md-4 col-sm-4 col-xs-4"><?= form_input('supplier_price', (isset($_POST['supplier_price']) ? $_POST['supplier_price'] : ""), 'class="form-control tip" id="supplier_price" placeholder="' . lang('supplier_price') . '"'); ?></div>-->
                        </div>
                        <div id="ex-suppliers"></div>
                    </div>
                    <div class="form-group standard">
                        <?= lang("product_image", "product_image") ?>(<?= byte_format($this->Settings->iwidth * $this->Settings->iheight) ?>)
                        <input id="product_image" type="file" name="product_image" data-show-upload="false"
                               data-show-preview="false"  accept="image/*" class="form-control file">
                    </div>
                    <div class="form-group standard">
                        <?= lang("product_gallery_images", "images") ?>(<?= byte_format($this->Settings->iwidth * $this->Settings->iheight) ?>)
                        <input id="images" type="file" name="userfile[]" multiple="true" data-show-upload="false"
                               data-show-preview="false" class="form-control file" accept="image/*">
                    </div>
                    <div id="img-details"></div>
                    <div class="row standard">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label" for="unit"><?= lang("product_qty") ?></label>
                                <?php
                                foreach ($warehouses as $warehouse) {
                                    //$whs[$warehouse->id] = $warehouse->name;
                                    if ($this->Settings->racks) {
                                        echo "<div class='row'><div class='col-md-6'>";
                                        echo form_hidden('wh_' . $warehouse->id, $warehouse->id) . form_input('wh_qty_' . $warehouse->id, (isset($_POST['wh_qty_' . $warehouse->id]) ? $_POST['wh_qty_' . $warehouse->id] : ''), 'class="form-control" id="wh_qty_' . $warehouse->id . '" placeholder="' . lang('quantity') . '" ng-model="prod.qty" onlyno');
                                        echo "</div><div class='col-md-6'>";
                                        echo form_input('rack_' . $warehouse->id, (isset($_POST['rack_' . $warehouse->id]) ? $_POST['rack_' . $warehouse->id] : ''), 'class="form-control" id="rack_' . $warehouse->id . '" placeholder="' . lang('rack') . '"');
                                        echo "</div></div>";
                                    } else {
                                        echo form_hidden('wh_' . $warehouse->id, $warehouse->id) . form_input('wh_qty_' . $warehouse->id, (isset($_POST['wh_qty_' . $warehouse->id]) ? $_POST['wh_qty_' . $warehouse->id] : ''), 'class="form-control" id="wh_qty_' . $warehouse->id . '" placeholder="' . lang('quantity') . '" ng-model="prod.qty" onlyno');
                                    }
//                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("unit_per", "unit") ?>
                                <?= form_input('unit', (isset($_POST['unit']) ? $_POST['unit'] : ($product ? $product->uper : '')), 'class="form-control" id="unit" placeholder="' . lang("select") . " " . lang("Unit") . '" default-attrib data-tab="per" required="required" style="width:100%" '); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group standard">
                        <?= lang("Color", "color") ?>
                        <div class="row">
                            <div class="col-md-3"> &nbsp;&nbsp;<input type="radio" name="colortype" ng-model="prod.colortype" icheck value="Single"/>&nbsp;&nbsp;&nbsp;&nbsp;Single</div>
                            <div class="col-md-3 colorsingle hide" ><?php
                                echo form_dropdown('colorsingle', $color, (isset($_POST['colorsingle']) ? $_POST['colorsingle'] : ($product ? $product->color : '')), 'class="form-control" select2 id="color" placeholder="' . lang("select") . " " . lang("color") . '" style="width:100%" ');
                                ?>
                            </div>
                            <div class="col-md-2 colorsingle hide"><input type="text" id="colorqty" name="colorqty" onlyno class="form-control" ng-model="prod.colorqty" ng-change="getQty('#colorqty')"/>
                                <p class="label label-danger hide"> Product Qty and color qty must be same.</p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3"> &nbsp;&nbsp;<input type="radio" name="colortype" ng-model="prod.colortype" icheck value="Assorted"/>&nbsp;&nbsp;&nbsp;&nbsp;Assorted</div>
                            <div class="col-md-9 colorassorted hide">
                                <?php
                                echo form_dropdown('colorassorted[]', $color, (isset($_POST['colorassorted']) ? $_POST['colorassorted'] : ($product ? $product->colorassorted : '')), 'class="form-control" multiple select2 id="mulcolor" ng-model="prod.colorassorted" placeholder="' . lang("select") . " " . lang("color") . '"style="width:100%"');
                                ?>
                                <br/>
                                <div class="row" style="padding: 0px;">
                                    <div class="col-md-2" style="padding-right: 0px;" ng-repeat="n in prod.colorassoarr">
                                        <input type="text" name="colorqty[]" onlyno ng-model="n.qty" ng-blur="getQtyCal($index, n.qty)" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <?= lang("Size", "size") ?>
                        <div class="row">
                            <div class="col-md-3"> &nbsp;&nbsp;<input class="sizeangle" icheck type="radio" name="sizeangle" ng-model="prod.sizeangle" ng-change="getProdName()" <?= ($product && $product->sizeangle == "HT" ? "checked" : '') ?> value="HT"/>&nbsp;&nbsp;&nbsp;&nbsp;Height</div>
                            <div class="col-md-3"> &nbsp;&nbsp;<input class="sizeangle" icheck type="radio" name="sizeangle" ng-model="prod.sizeangle" ng-change="getProdName()" <?= ($product && $product->sizeangle == "WT" ? "checked" : '') ?> value="WT"/>&nbsp;&nbsp;&nbsp;&nbsp;Width</div>
                            <div class="col-md-3"> &nbsp;&nbsp;<input class="sizeangle" icheck type="radio" name="sizeangle" ng-model="prod.sizeangle" ng-change="getProdName()" <?= ($product && $product->sizeangle == "" ? "checked" : '') ?> value=""/>&nbsp;&nbsp;&nbsp;&nbsp;No Size</div>
                        </div>
                        <br/>
                        <div class="row" >
                            <div class="col-md-3"> &nbsp;&nbsp;<input icheck type="radio" name="sizetype" ng-model="prod.sizetype" ng-change="getProdName()" checked="" value="Single"/>&nbsp;&nbsp;&nbsp;&nbsp;Single</div>
                            <div class="col-md-4" ng-init='size =<?= json_encode($sizes) ?>' ng-show="prod.sizetype == 'Single'">
                                <div class="col-md-9" style="padding: 0px"><?php
                                    echo form_input('singlesize', (isset($_POST['singlesize']) ? $_POST['singlesize'] : ($product ? $product->size : '')), 'class="form-control " sizesel data-tab="size" data-key="department_id-section_id-product_items_id" data-id="department,section,product_items" id="size" placeholder="' . lang("select") . " " . lang("size") . '" required="required" style="width:100%" ng-model="prod.singlesize" ng-change="getProdName();"');
                                    ?>
                                </div>
                                <div class="col-md-2"> {{size[prod.singlesize].code?size[prod.singlesize].code+'\"':""}}</div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <br/>
                        <div class="row standard" >
                            <div class="col-md-3"> &nbsp;&nbsp;<input icheck type="radio" name="sizetype" ng-model="prod.sizetype" ng-change="getProdName()" value="Multiple"/>&nbsp;&nbsp;&nbsp;&nbsp;Multiple</div>
                            <div class="col-md-4" ng-init='size1 =<?= json_encode($sizes) ?>' ng-show="prod.sizetype == 'Multiple'">
                                <div class="col-md-9" style="padding: 0px"><?php
                                    echo form_input('multisizef', (isset($_POST['multisizef']) ? $_POST['multisizef'] : ''), 'class="form-control " sizesel data-tab="size" data-key="department_id-section_id-product_items_id" data-id="department,section,product_items" id="multisizef" placeholder="' . lang("select") . " " . lang("size") . '" required="required" style="width:100%" ng-model="prod.multisizef" ng-change="getProdName();"');
                                    ?></div>
                                <div class="col-md-2"> {{size1[prod.multisizef].code?size1[prod.multisizef].code+'\"':""}}</div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-1" ng-show="prod.sizetype == 'Multiple'">To</div>
                            <div class="col-md-4" ng-init='size2 =<?= json_encode($sizes) ?>' ng-show="prod.sizetype == 'Multiple'">
                                <div class="col-md-9" style="padding: 0px"><?php
                                    echo form_input('multisizet', (isset($_POST['multisizet']) ? $_POST['multisizet'] : ''), 'class="form-control " sizesel data-tab="size" data-key="department_id-section_id-product_items_id" data-id="department,section,product_items" id="multisizet" placeholder="' . lang("select") . " " . lang("size") . '" required="required" style="width:100%" ng-model="prod.multisizet"');
                                    ?></div>
                                <div class="col-md-2"> {{size2[prod.multisizet].code?size2[prod.multisizet].code+'\"':""}}</div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group all">
                                <?= lang("product_cost", "cost") ?>
                                <?= form_input('cost', (isset($_POST['cost']) ? $_POST['cost'] : ($product ? $this->sma->formatDecimal($product->cost) : '')), 'class="form-control tip" id="cost" required="required" ng-model="prod.cost" ng-blur="getProductMargin()"') ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group all">
                                <?= lang("product_per", "cper") ?>
                                <?= form_input('cper', (isset($_POST['cper']) ? $_POST['cper'] : ($product ? $product->cper : '')), 'class="form-control" id="cper" placeholder="' . lang("select") . " " . lang("Unit") . '" default-attrib data-tab="per" required="required" style="width:100%" '); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group all">
                                <?= lang("product_price", "price") ?>
                                <?= form_input('price', (isset($_POST['price']) ? $_POST['price'] : ($product ? $this->sma->formatDecimal($product->price) : '')), 'class="form-control tip" id="price" ng-model="prod.price" required="required"') ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group all">
                                <?= lang("product_per", "pper") ?>
                                <div class="input-group">
                                    <?= form_input('pper', (isset($_POST['pper']) ? $_POST['pper'] : ($product ? $product->pper : '')), 'class="form-control" id="pper" placeholder="' . lang("select") . " " . lang("Unit") . '" default-attrib data-tab="per" required="required" style="width:100%"'); ?>
                                    <div class="input-group-addon no-print">
                                        <a href="<?php echo site_url('system_settings/AddProduct_para/per'); ?>" data-toggle="modal" data-target="#myModal" class="external"><i class="fa fa-plus-circle" style="font-size: 26px" id="addIcon"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group standard">
                        <?= lang("Rate", "singlerate") ?>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <div class="form-group">
                                    <?= lang("Per", "Per") ?>
                                    <?= form_input('rateper', (isset($_POST['rateper']) ? $_POST['rateper'] : ($product ? $product->rateper : '')), 'class="form-control" default-attrib data-tab="per" id="rateper" placeholder="' . lang("select") . " " . lang("Unit") . '" required="required" style="width:100%" '); ?>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-3"> &nbsp;&nbsp;<input icheck type="radio" <?= (isset($_POST['ratetype']) && $_POST['ratetype'] == "Single" ? 'checked' : '') ?> name="ratetype" value="Single"/>&nbsp;&nbsp;&nbsp;&nbsp;Single</div>
                            <div class="col-md-3"><?php echo form_input('singlerate', (isset($_POST['singlerate']) ? $_POST['singlerate'] : ''), 'class="form-control" id="singlerate" placeholder="" style="width:100%;" '); ?></div>
                            <div class="col-md-3"> &nbsp;&nbsp;<input icheck type="radio" <?= (isset($_POST['ratetype']) && $_POST['ratetype'] == "MRP" ? 'checked' : '') ?> name="ratetype"  value="MRP"/>&nbsp;&nbsp;&nbsp;&nbsp;MRP</div>
                            <div class="col-md-3"><?php echo form_input('mrprate', (isset($_POST['mrprate']) ? $_POST['mrprate'] : ''), 'class="form-control" id="mrprate" placeholder="" style="width:100%;"'); ?></div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-3"> &nbsp;&nbsp;<input icheck type="radio" <?= (isset($_POST['ratetype']) && $_POST['ratetype'] == "Multiple" ? 'checked' : '') ?> name="ratetype" value="Multiple"/>&nbsp;&nbsp;&nbsp;&nbsp;Multiple</div>
                            <div class="col-md-3">
                                <div class="col-md-12" style="padding: 0px"><?php echo form_input('mulratef', (isset($_POST['mulratef']) ? $_POST['mulratef'] : ''), 'class="form-control" id="mulratef" placeholder="" style="width:100%;"'); ?></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-3">To</div>
                            <div class="col-md-3" ng-init='size2 =<?= json_encode($sizes) ?>'>
                                <div class="col-md-12" style="padding: 0px"><?php echo form_input('mulratet', (isset($_POST['mulratet']) ? $_POST['mulratet'] : ''), 'class="form-control" id="mulratet" placeholder="" style="width:100%;"'); ?></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <?php /* ?>
                      <div class="standard">
                      <div class="<?= $product ? 'text-warning' : '' ?>">
                      <strong><?= lang("warehouse_quantity") ?></strong><br>
                      <?php
                      if (!empty($warehouses)) {
                      if ($product) {
                      echo '<div class="row"><div class="col-md-12"><div class="well"><div id="show_wh_edit">';
                      if (!empty($warehouses_products)) {
                      echo '<div style="display:none;">';
                      foreach ($warehouses_products as $wh_pr) {
                      echo '<span class="bold text-info">' . $wh_pr->name . ': <span class="padding05" id="rwh_qty_' . $wh_pr->id . '">' . $this->sma->formatQuantity($wh_pr->quantity) . '</span>' . ($wh_pr->rack ? ' (<span class="padding05" id="rrack_' . $wh_pr->id . '">' . $wh_pr->rack . '</span>)' : '') . '</span><br>';
                      }
                      echo '</div>';
                      }
                      foreach ($warehouses as $warehouse) {
                      //$whs[$warehouse->id] = $warehouse->name;
                      echo '<div class="col-md-6 col-sm-6 col-xs-6" style="padding-bottom:15px;">' . $warehouse->name . '<br><div class="form-group">' . form_hidden('wh_' . $warehouse->id, $warehouse->id) . form_input('wh_qty_' . $warehouse->id, (isset($_POST['wh_qty_' . $warehouse->id]) ? $_POST['wh_qty_' . $warehouse->id] : (isset($warehouse->quantity) ? $warehouse->quantity : '')), 'class="form-control wh" id="wh_qty_' . $warehouse->id . '" placeholder="' . lang('quantity') . '"') . '</div>';
                      if ($this->Settings->racks) {
                      echo '<div class="form-group">' . form_input('rack_' . $warehouse->id, (isset($_POST['rack_' . $warehouse->id]) ? $_POST['rack_' . $warehouse->id] : (isset($warehouse->rack) ? $warehouse->rack : '')), 'class="form-control wh" id="rack_' . $warehouse->id . '" placeholder="' . lang('rack') . '"') . '</div>';
                      }
                      echo '</div>';
                      }
                      echo '</div><div class="clearfix"></div></div></div></div>';
                      } else {
                      echo '<div class="row"><div class="col-md-12"><div class="well">';
                      foreach ($warehouses as $warehouse) {
                      //$whs[$warehouse->id] = $warehouse->name;
                      echo '<div class="col-md-6 col-sm-6 col-xs-6" style="padding-bottom:15px;">' . $warehouse->name . '<br><div class="form-group">' . form_hidden('wh_' . $warehouse->id, $warehouse->id) . form_input('wh_qty_' . $warehouse->id, (isset($_POST['wh_qty_' . $warehouse->id]) ? $_POST['wh_qty_' . $warehouse->id] : ''), 'class="form-control" id="wh_qty_' . $warehouse->id . '" placeholder="' . lang('quantity') . '"') . '</div>';
                      if ($this->Settings->racks) {
                      echo '<div class="form-group">' . form_input('rack_' . $warehouse->id, (isset($_POST['rack_' . $warehouse->id]) ? $_POST['rack_' . $warehouse->id] : ''), 'class="form-control" id="rack_' . $warehouse->id . '" placeholder="' . lang('rack') . '"') . '</div>';
                      }
                      echo '</div>';
                      }
                      echo '<div class="clearfix"></div></div></div></div>';
                      }
                      }
                      ?>
                      </div>
                      <div class="clearfix"></div>
                      <?php /* <div id="attrs"></div>
                      <?php if ($this->Settings->attributes) { ?>

                      <strong><?= lang("attributes", "attr") ?></strong><br>
                      <?php
                      if (!empty($attributes)) {
                      echo '<div class="row"><div class="col-md-12"><div class="well">';

                      foreach ($attributes as $attribute) {
                      echo '<div class="col-md-12"><label for="' . $attribute->id . '"><input class="checkbox attributes" type="checkbox" name="attr_' . $attribute->id . '" id="' . $attribute->id . '" value="1" ' . (isset($_POST['attr_' . $attribute->id]) ? 'checked="checked"' : '') . ' /> ' . lang($attribute->title) . '</label><br><div id="options_' . $attribute->id . '" ' . (isset($_POST['attr_' . $attribute->id]) ? '' : 'style="display:none;"') . '>';
                      if ($attribute->options) {
                      $options = explode('|', $attribute->options);
                      foreach ($options as $option) {
                      echo '<div style="font-weight:bold;">' . $option . '</div><div class="clearfix"></div>';
                      $option = url_title($option, '_');
                      foreach ($warehouses as $warehouse) {
                      echo '<div class="col-md-6 col-sm-6 col-xs-6"><label>' . $warehouse->name . '</label>' . form_hidden('attr_wh_' . $warehouse->id, $warehouse->id) . form_hidden('option_' . url_title($option, '_') . '_' . $warehouse->id, $option) . form_input('qty_' . $option . '_wh_' . $warehouse->id, (isset($_POST['qty_' . $option . '_wh_' . $warehouse->id]) ? $_POST['qty_' . $option . '_wh_' . $warehouse->id] : ''), 'class="form-control" placeholder="' . lang('quantity') . '"') . '</div>';
                      }
                      echo '<div style="clear:both;height:15px;"></div>';
                      }
                      }
                      echo '</div></div>';
                      }
                      echo '<div class="clearfix"></div></div></div></div>';
                      }
                      ?>
                      <div class="clearfix"></div>
                      <?php }
                      <div class="form-group">
                      <input type="checkbox" class="checkbox" name="attributes"
                      id="attributes" <?= $this->input->post('attributes') || $product_options ? 'checked="checked"' : ''; ?>><label
                      for="attributes"
                      class="padding05"><?= lang('product_has_attributes'); ?></label> <?= lang('eg_sizes_colors'); ?>
                      </div>
                      <div class="well well-sm" id="attr-con"
                      style="<?= $this->input->post('attributes') || $product_options ? '' : 'display:none;'; ?>">
                      <div class="form-group" id="ui" style="margin-bottom: 0;">
                      <div class="input-group">
                      <?php echo form_input('attributesInput', '', 'class="form-control select-tags" id="attributesInput" placeholder="' . $this->lang->line("enter_attributes") . '"'); ?>
                      <div class="input-group-addon" style="padding: 2px 5px;"><a href="#" id="addAttributes"><i class="fa fa-2x fa-plus-circle" id="addIcon"></i></a></div>
                      </div>
                      <div style="clear:both;"></div>
                      </div>
                      <div class="table-responsive">
                      <table id="attrTable" class="table table-bordered table-condensed table-striped"
                      style="<?= $this->input->post('attributes') || $product_options ? '' : 'display:none;'; ?>margin-bottom: 0; margin-top: 10px;">
                      <thead>
                      <tr class="active">
                      <th><?= lang('name') ?></th>
                      <th><?= lang('warehouse') ?></th>
                      <th><?= lang('quantity') ?></th>
                      <th><?= lang('cost') ?></th>
                      <th><?= lang('price') ?></th>
                      <th><i class="fa fa-times attr-remove-all"></i></th>
                      </tr>
                      </thead>
                      <tbody><?php
                      if ($this->input->post('attributes')) {
                      $a = sizeof($_POST['attr_name']);
                      for ($r = 0; $r <= $a; $r++) {
                      if (isset($_POST['attr_name'][$r]) && (isset($_POST['attr_warehouse'][$r]) || isset($_POST['attr_quantity'][$r]))) {
                      echo '<tr class="attr"><td><input type="hidden" name="attr_name[]" value="' . $_POST['attr_name'][$r] . '"><span>' . $_POST['attr_name'][$r] . '</span></td><td class="code text-center"><input type="hidden" name="attr_warehouse[]" value="' . $_POST['attr_warehouse'][$r] . '"><input type="hidden" name="attr_wh_name[]" value="' . $_POST['attr_wh_name'][$r] . '"><span>' . $_POST['attr_wh_name'][$r] . '</span></td><td class="quantity text-center"><input type="hidden" name="attr_quantity[]" value="' . $_POST['attr_quantity'][$r] . '"><span>' . $_POST['attr_quantity'][$r] . '</span></td><td class="cost text-right"><input type="hidden" name="attr_cost[]" value="' . $_POST['attr_cost'][$r] . '"><span>' . $_POST['attr_cost'][$r] . '</span></td><td class="price text-right"><input type="hidden" name="attr_price[]" value="' . $_POST['attr_price'][$r] . '"><span>' . $_POST['attr_price'][$r] . '</span></span></td><td class="text-center"><i class="fa fa-times delAttr"></i></td></tr>';
                      }
                      }
                      } elseif ($product_options) {
                      foreach ($product_options as $option) {
                      echo '<tr class="attr"><td><input type="hidden" name="attr_name[]" value="' . $option->name . '"><span>' . $option->name . '</span></td><td class="code text-center"><input type="hidden" name="attr_warehouse[]" value="' . $option->warehouse_id . '"><input type="hidden" name="attr_wh_name[]" value="' . $option->wh_name . '"><span>' . $option->wh_name . '</span></td><td class="quantity text-center"><input type="hidden" name="attr_quantity[]" value="' . $this->sma->formatQuantity($option->wh_qty) . '"><span>' . $this->sma->formatQuantity($option->wh_qty) . '</span></td><td class="cost text-right"><input type="hidden" name="attr_cost[]" value="' . $this->sma->formatMoney($option->cost) . '"><span>' . $this->sma->formatMoney($option->cost) . '</span></td><td class="price text-right"><input type="hidden" name="attr_price[]" value="' . $this->sma->formatMoney($option->price) . '"><span>' . $this->sma->formatMoney($option->price) . '</span></span></td><td class="text-center"><i class="fa fa-times delAttr"></i></td></tr>';
                      }
                      }
                      ?>
                      </tbody>
                      </table>
                      </div>
                      </div>  ?>
                      </div>
                      <?php */ ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group combod">
                                <?= lang("combo_discount", "combo_discount") ?>
                                <?= form_input('combo_discount', (isset($_POST['combo_discount']) ? $_POST['combo_discount'] : ($product ? $this->sma->formatDecimal($product->combo_discount) : '')), 'class="form-control tip" id="combo_discount" required="required"') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row bundleb">
                        <div class="col-md-12">
                            <div class="form-group ">
                                <?= lang("Batch", "batch") ?>
                                <?= form_input('batch', (isset($_POST['batch']) ? $_POST['batch'] : ($product ? $product->batch : '')), 'class="form-control tip" id="batch" required="required"') ?>
                            </div>
                        </div>
                    </div>
                    <div class="combo" style="display:none;">
                        <div class="form-group">
                            <?= lang("add_product", "add_item") . ' (' . lang('not_with_variants') . ')'; ?>
                            <?php echo form_input('add_item', '', 'class="form-control ttip" id="add_item" data-placement="top" data-trigger="focus" data-bv-notEmpty-message="' . lang('please_add_items_below') . '" placeholder="' . $this->lang->line("add_item") . '"'); ?>
                        </div>
                        <div class="control-group table-group">
                            <label class="table-label" for="combo">{{prod.protype}} <?= lang("products"); ?></label>
                            <div class="controls table-controls">
                                <table id="prTable" class="table items table-striped table-bordered table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th class="col-md-5 col-sm-5 col-xs-5"><?= lang("product_name") . " (" . $this->lang->line("product_code") . ")"; ?></th>
                                            <th class="col-md-2 col-sm-2 col-xs-2"><?= lang("quantity"); ?></th>
                                            <th class="col-md-3 col-sm-3 col-xs-3"><?= lang("unit_price"); ?></th>
                                            <th class="col-md-1 col-sm-1 col-xs-1 text-center"><i class="fa fa-trash-o" style="opacity:0.5; filter:alpha(opacity=50);"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="digital" style="display:none;">
                        <div class="form-group digital">
                            <?= lang("digital_file", "digital_file") ?>
                            <input id="digital_file" type="file" name="digital_file" data-show-upload="false"
                                   data-show-preview="false" class="form-control file">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <!--                    <div class="form-group">
                                            <input name="cf" type="checkbox" class="checkbox" id="extras"
                                                   value="" <?= isset($_POST['cf']) ? 'checked="checked"' : '' ?>/><label for="extras"
                                                   class="padding05"><?= lang('custom_fields') ?></label>
                                        </div>-->
                    <!--                    <div class="row" id="extras-con" style="display: none;">
                                            <div class="col-md-4">
                                                <div class="form-group all">
                    <?= lang('pcf1', 'cf1') ?>
                    <?= form_input('cf1', (isset($_POST['cf1']) ? $_POST['cf1'] : ($product ? $product->cf1 : '')), 'class="form-control tip" id="cf1"') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group all">
                    <?= lang('pcf2', 'cf2') ?>
                    <?= form_input('cf2', (isset($_POST['cf2']) ? $_POST['cf2'] : ($product ? $product->cf2 : '')), 'class="form-control tip" id="cf2"') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group all">
                    <?= lang('pcf3', 'cf3') ?>
                    <?= form_input('cf3', (isset($_POST['cf3']) ? $_POST['cf3'] : ($product ? $product->cf3 : '')), 'class="form-control tip" id="cf3"') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group all">
                    <?= lang('pcf4', 'cf4') ?>
                    <?= form_input('cf4', (isset($_POST['cf4']) ? $_POST['cf4'] : ($product ? $product->cf4 : '')), 'class="form-control tip" id="cf4"') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group all">
                    <?= lang('pcf5', 'cf5') ?>
                    <?= form_input('cf5', (isset($_POST['cf5']) ? $_POST['cf5'] : ($product ? $product->cf5 : '')), 'class="form-control tip" id="cf5"') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group all">
                    <?= lang('pcf6', 'cf6') ?>
                    <?= form_input('cf6', (isset($_POST['cf6']) ? $_POST['cf6'] : ($product ? $product->cf6 : '')), 'class="form-control tip" id="cf6"') ?>
                                                </div>
                                            </div>
                                        </div>-->
                    <div class="form-group all">
                        <?= lang("product_details", "product_details") ?>
                        <?= form_textarea('product_details', (isset($_POST['product_details']) ? $_POST['product_details'] : ($product ? $product->product_details : '')), 'class="form-control" id="details"'); ?>
                    </div>
                    <div class="form-group all">
                        <?= lang("product_details_for_invoice", "details") ?>
                        <?= form_textarea('details', (isset($_POST['details']) ? $_POST['details'] : ($product ? $product->details : '')), 'class="form-control" id="details"'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_submit('add_product', "Save", 'class="btn btn-primary"'); ?>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var audio_success = new Audio('<?= $assets ?>sounds/sound2.mp3');
        var audio_error = new Audio('<?= $assets ?>sounds/sound3.mp3');
        var items = {};
<?php
if ($combo_items) {
    foreach ($combo_items as $item) {
        //echo 'ietms['.$item->id.'] = '.$item.';';
        if ($item->code) {
            echo 'add_product_item(' . json_encode($item) . ');';
        }
    }
}
?>
<?= isset($_POST['cf']) ? '$("#extras").iCheck("check");' : '' ?>
        $('#extras').on('ifChecked', function () {
            $('#extras-con').slideDown();
        });
        $('#extras').on('ifUnchecked', function () {
            $('#extras-con').slideUp();
        });
        $('.attributes').on('ifChecked', function (event) {
            $('#options_' + $(this).attr('id')).slideDown();
        });
        $('.attributes').on('ifUnchecked', function (event) {
            $('#options_' + $(this).attr('id')).slideUp();
        });
        //$('#cost').removeAttr('required');
        $('#type').change(function () {
            var t = $(this).val();
            if (t !== 'standard') {
                $('.standard').slideUp();
                $('#cost').attr('required', 'required');
                $('#track_quantity').iCheck('uncheck');
                $('form[data-toggle="validator"]').bootstrapValidator('addField', 'cost');
            } else {
                $('.standard').slideDown();
                $('#track_quantity').iCheck('check');
                $('#cost').removeAttr('required');
                $('form[data-toggle="validator"]').bootstrapValidator('removeField', 'cost');
            }
            if (t !== 'digital') {
                $('.digital').slideUp();
                $('#digital_file').removeAttr('required');
                $('form[data-toggle="validator"]').bootstrapValidator('removeField', 'digital_file');
            } else {
                $('.digital').slideDown();
                $('#digital_file').attr('required', 'required');
                $('form[data-toggle="validator"]').bootstrapValidator('addField', 'digital_file');
            }
            if (t !== 'combo' && t !== 'bundle') {
                $('.combo').slideUp();
            } else {
                $('.combo').slideDown();
            }
            if (t !== 'combo') {
                $('.combod').slideUp();
            } else {
                $('.combod').slideDown();
            }
            if (t !== 'bundle') {
                $('.bundleb').slideUp();
            } else {
                $('.bundleb').slideDown();
            }
        });
        var t = $('#type').val();
        if (t !== 'standard') {
            $('.standard').slideUp();
            $('#cost').attr('required', 'required');
            $('#track_quantity').iCheck('uncheck');
            $('form[data-toggle="validator"]').bootstrapValidator('addField', 'cost');
        } else {
            $('.standard').slideDown();
            $('#track_quantity').iCheck('check');
            $('#cost').removeAttr('required');
            $('form[data-toggle="validator"]').bootstrapValidator('removeField', 'cost');
        }
        if (t !== 'digital') {
            $('.digital').slideUp();
            $('#digital_file').removeAttr('required');
            $('form[data-toggle="validator"]').bootstrapValidator('removeField', 'digital_file');
        } else {
            $('.digital').slideDown();
            $('#digital_file').attr('required', 'required');
            $('form[data-toggle="validator"]').bootstrapValidator('addField', 'digital_file');
        }
        if (t !== 'combo' && t !== 'bundle') {
            $('.combo').slideUp();
        } else {
            $('.combo').slideDown();
        }
        if (t !== 'combo') {
            $('.combod').slideUp();
        } else {
            $('.combod').slideDown();
        }
        if (t !== 'bundle') {
            $('.bundleb').slideUp();
        } else {
            $('.bundleb').slideDown();
        }
        $("#add_item").autocomplete({
            source: function (request, response) {
                $.getJSON("<?= site_url('products/suggestionscombo'); ?>",
                        {
                            store_id: $('#companies').val(),
                            department: $('#department').val(),
                            section: $('#section').val(),
                            product_items: $('#product_items').val(),
                            type_id: $('#type_id').val(),
                            brands: $('#brands').val(),
                            sizeangle: $('input[type=radio][name=sizeangle]:checked').val(),
                            size: $('#size').val(),
                            term: $("#add_item").val()
                        },
                response);
            },
            minLength: 1,
            autoFocus: false,
            delay: 200,
            response: function (event, ui) {
                if ($(this).val().length >= 16 && ui.content[0].id == 0) {
                    //audio_error.play();
                    bootbox.alert('<?= lang('no_product_found') ?>', function () {
                        $('#add_item').focus();
                    });
                    $(this).val('');
                }
                else if (ui.content.length == 1 && ui.content[0].id != 0) {
                    ui.item = ui.content[0];
                    $(this).data('ui-autocomplete')._trigger('select', 'autocompleteselect', ui);
                    $(this).autocomplete('close');
                    $(this).removeClass('ui-autocomplete-loading');
                }
                else if (ui.content.length == 1 && ui.content[0].id == 0) {
                    //audio_error.play();
                    bootbox.alert('<?= lang('no_product_found') ?>', function () {
                        $('#add_item').focus();
                    });
                    $(this).val('');
                }
            },
            select: function (event, ui) {
                event.preventDefault();
                if (ui.item.id !== 0) {
                    var row = add_product_item(ui.item);
                    if (row) {
                        $(this).val('');
                    }
                } else {
                    //audio_error.play();
                    bootbox.alert('<?= lang('no_product_found') ?>');
                }
            }
        });
        $('#add_item').bind('keypress', function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                $(this).autocomplete("search");
            }
        });
<?php
if ($this->input->post('type') == 'combo') {
    $c = sizeof($_POST['combo_item_code']);
    for ($r = 0; $r <= $c; $r++) {
        if (isset($_POST['combo_item_code'][$r]) && isset($_POST['combo_item_quantity'][$r]) && isset($_POST['combo_item_price'][$r])) {
            $items[] = array('id' => $_POST['combo_item_id'][$r], 'name' => $_POST['combo_item_name'][$r], 'code' => $_POST['combo_item_code'][$r], 'qty' => $_POST['combo_item_quantity'][$r], 'price' => $_POST['combo_item_price'][$r]);
        }
    }
    echo 'var ci = ' . json_encode($items) . ';
            $.each(ci, function() { add_product_item(this); });
            ';
}
?>
        function add_product_item(item) {
            var pricex = 0;
            if (item == null) {
                return false;
            }
            item_id = item.id;
            if (items[item_id]) {
                items[item_id].qty = (parseFloat(items[item_id].qty) + 1).toFixed(2);
            } else {
                items[item_id] = item;
            }

            $("#prTable tbody").empty();
            $.each(items, function () {
                var row_no = this.id;
                var newTr = $('<tr id="row_' + row_no + '" class="item_' + this.id + '"></tr>');
                tr_html = '<td><input name="combo_item_id[]" type="hidden" value="' + this.id + '"><input name="combo_item_name[]" type="hidden" value="' + this.name + '"><input name="combo_item_code[]" type="hidden" value="' + this.code + '"><span id="name_' + row_no + '">' + this.name + ' (' + this.code + ')</span></td>';
                tr_html += '<td><input class="form-control text-center" name="combo_item_quantity[]" type="text" value="' + formatDecimal(this.qty) + '" data-id="' + row_no + '" data-item="' + this.id + '" id="quantity_' + row_no + '" onClick="this.select();"></td>';
                tr_html += '<td><input class="form-control text-center" name="combo_item_price[]" type="text" value="' + formatDecimal(this.price) + '" data-id="' + row_no + '" data-item="' + this.id + '" id="combo_item_price_' + row_no + '" onClick="this.select();"></td>';
                tr_html += '<td class="text-center"><i class="fa fa-times tip del" id="' + row_no + '" title="Remove" style="cursor:pointer;"></i></td>';
                pricex += parseFloat(this.price * this.qty);
                newTr.html(tr_html);
                newTr.prependTo("#prTable");
                $('#cost').val(pricex);
                $('#price').val(pricex);
            });
            $('.item_' + item_id).addClass('warning');
            //audio_success.play();
            return true;
        }

        $(document).on('click', '.del', function () {
            var pricex = $('#price').val();
            var id = $(this).attr('id');
            delete items[id];
            pricex -= parseFloat($("#combo_item_price_" + id).val() * $("#quantity_" + id).val());
            $('#cost').val(pricex);
            $('#price').val(pricex);
            $(this).closest('#row_' + id).remove();
        });
        var su = 2;
        $('#deleteSupplier').hide();
        $('#addSupplier').click(function () {

            if (su <= 5) {
                $('#supplier_1').select2('destroy');
                var html = '<div id="list_' + su + '"><div style="clear:both;height:15px;" ></div><div class="row"><div class="col-md-8 col-sm-8 col-xs-8"><input type="hidden" name="supplier_' + su + '", class="form-control" id="supplier_' + su + '" placeholder="<?= lang("select") . ' ' . lang("supplier") ?>" style="width:100%;display: block !important;" /></div><div class="col-md-4 col-sm-4 col-xs-4"><input type="text" name="supplier_' + su + '_price" class="form-control tip" id="supplier_' + su + '_price" placeholder="<?= lang('supplier_price') ?>" /></div></div></div>';
                $('#ex-suppliers').append(html);
                var sup = $('#supplier_' + su);
                $('#deleteSupplier').show();
                suppliers(sup);
                su++;
            } else {
                bootbox.alert('<?= lang('max_reached') ?>');
                return false;
            }
        });
        $('#deleteSupplier').click(function () {
            if (su == 3) {
                $('#deleteSupplier').hide();
            }
            if (su > 2) {
                //                $('#supplier_1').select2('destroy');
                //                var html = '<div style="clear:both;height:15px;"></div><div class="row"><div class="col-md-8 col-sm-8 col-xs-8"><input type="hidden" name="supplier_' + su + '", class="form-control" id="supplier_' + su + '" placeholder="<?= lang("select") . ' ' . lang("supplier") ?>" style="width:100%;display: block !important;" /></div><div class="col-md-4 col-sm-4 col-xs-4"><input type="text" name="supplier_' + su + '_price" class="form-control tip" id="supplier_' + su + '_price" placeholder="<?= lang('supplier_price') ?>" /></div></div>';
                $('#ex-suppliers').find('#list_' + (su - 1)).remove();
                //                var sup = $('#supplier_' + su);
                //                suppliers(sup);
                su--;
                return true;
            } else {
                bootbox.alert('Cant delete!');
                return false;
            }
        });
        var _URL = window.URL || window.webkitURL;
        $("input#images").on('change.bs.fileinput', function () {
            var ele = document.getElementById($(this).attr('id'));
            var result = ele.files;
            $('#img-details').empty();
            for (var x = 0; x < result.length; x++) {
                var fle = result[x];
                for (var i = 0; i <= result.length; i++) {
                    var img = new Image();
                    img.onload = (function (value) {
                        return function () {
                            ctx[value].drawImage(result[value], 0, 0);
                        }
                    })(i);
                    img.src = 'images/' + result[i];
                }
            }
        });
        var variants = <?= json_encode($vars); ?>;
        $(".select-tags").select2({
            tags: variants,
            tokenSeparators: [","],
            multiple: true
        });
        $(document).on('ifChecked', '#attributes', function (e) {
            $('#attr-con').slideDown();
        });
        $(document).on('ifUnchecked', '#attributes', function (e) {
            $(".select-tags").select2("val", "");
            $('.attr-remove-all').trigger('click');
            $('#attr-con').slideUp();
        });
        $('#addAttributes').click(function (e) {
            e.preventDefault();
            var attrs_val = $('#attributesInput').val(), attrs;
            attrs = attrs_val.split(',');
            console.log(attrs);
            for (var i in attrs) {
                if (attrs[i] !== '') {
                    $('#attrTable').show().append('<tr class="attr"><td><input type="hidden" name="attr_name[]" value="' + attrs[i] + '"><span>' + attrs[i] + '</span></td><td class="code text-center"><input type="hidden" name="attr_warehouse[]" value=""><span></span></td><td class="quantity text-center"><input type="hidden" name="attr_quantity[]" value=""><span></span></td><td class="cost text-right"><input type="hidden" name="attr_cost[]" value="0"><span>0</span></td><td class="price text-right"><input type="hidden" name="attr_price[]" value="0"><span>0</span></span></td><td class="text-center"><i class="fa fa-times delAttr"></i></td></tr>');
                }
            }
        });
        //$('#attributesInput').on('select2-blur', function(){
        //    $('#addAttributes').click();
        //});
        $(document).on('click', '.delAttr', function () {
            $(this).closest("tr").remove();
        });
        $(document).on('click', '.attr-remove-all', function () {
            $('#attrTable tbody').empty();
            $('#attrTable').hide();
        });
        var row, warehouses = <?= json_encode($warehouses); ?>;
        $(document).on('click', '.attr td:not(:last-child)', function () {
            row = $(this).closest("tr");
            $('#aModalLabel').text(row.children().eq(0).find('span').text());
            $('#awarehouse').select2("val", (row.children().eq(1).find('input').val()));
            $('#aquantity').val(row.children().eq(2).find('input').val());
            $('#acost').val(row.children().eq(3).find('span').text());
            $('#aprice').val(row.children().eq(4).find('span').text());
            $('#aModal').appendTo('body').modal('show');
        });
        $(document).on('click', '#updateAttr', function () {
            var wh = $('#awarehouse').val(), wh_name;
            $.each(warehouses, function () {
                if (this.id == wh) {
                    wh_name = this.name;
                }
            });
            row.children().eq(1).html('<input type="hidden" name="attr_warehouse[]" value="' + wh + '"><input type="hidden" name="attr_wh_name[]" value="' + wh_name + '"><span>' + wh_name + '</span>');
            row.children().eq(2).html('<input type="hidden" name="attr_quantity[]" value="' + $('#aquantity').val() + '"><span>' + decimalFormat($('#aquantity').val()) + '</span>');
            row.children().eq(3).html('<input type="hidden" name="attr_cost[]" value="' + $('#acost').val() + '"><span>' + currencyFormat($('#acost').val()) + '</span>');
            row.children().eq(4).html('<input type="hidden" name="attr_price[]" value="' + $('#aprice').val() + '"><span>' + currencyFormat($('#aprice').val()) + '</span>');
            $('#aModal').modal('hide');
        });
    });
<?php if ($product) { ?>
        $(document).ready(function () {
            var t = "<?= $product->type ?>";
            if (t !== 'standard') {
                $('.standard').slideUp();
                $('#cost').attr('required', 'required');
                $('#track_quantity').iCheck('uncheck');
                $('form[data-toggle="validator"]').bootstrapValidator('addField', 'cost');
            } else {
                $('.standard').slideDown();
                $('#track_quantity').iCheck('check');
                $('#cost').removeAttr('required');
                $('form[data-toggle="validator"]').bootstrapValidator('removeField', 'cost');
            }
            if (t !== 'digital') {
                $('.digital').slideUp();
                $('#digital_file').removeAttr('required');
                $('form[data-toggle="validator"]').bootstrapValidator('removeField', 'digital_file');
            } else {
                $('.digital').slideDown();
                $('#digital_file').attr('required', 'required');
                $('form[data-toggle="validator"]').bootstrapValidator('addField', 'digital_file');
            }
            if (t !== 'combo') {
                $('.combo').slideUp();
                //$('#add_item').removeAttr('required');
                //$('form[data-toggle="validator"]').bootstrapValidator('removeField', 'add_item');
            } else {
                $('.combo').slideDown();
                //$('#add_item').attr('required', 'required');
                //$('form[data-toggle="validator"]').bootstrapValidator('addField', 'add_item');
            }
            $("#code").parent('.form-group').addClass("has-error");
            $("#code").focus();
            $("#product_image").parent('.form-group').addClass("text-warning");
            $("#images").parent('.form-group').addClass("text-warning");
            $.ajax({
                type: "get", async: false,
                url: "<?= site_url('products/getSubCategories') ?>/" + <?= $product->category_id ?>,
                dataType: "json",
                success: function (scdata) {
                    if (scdata != null) {
                        $("#subcategory").select2("destroy").empty().attr("placeholder", "<?= lang('select_subcategory') ?>").select2({
                            placeholder: "<?= lang('select_category_to_load') ?>",
                            data: scdata
                        });
                    }
                }
            });
    <?php if ($product->supplier1) { ?>
                select_supplier('supplier1', "<?= $product->supplier1; ?>");
                $('#supplier_price').val("<?= $product->supplier1price == 0 ? '' : $this->sma->formatDecimal($product->supplier1price); ?>");
    <?php } ?>
    <?php if ($product->supplier2) { ?>
                $('#addSupplier').click();
                select_supplier('supplier_2', "<?= $product->supplier2; ?>");
                $('#supplier_2_price').val("<?= $product->supplier2price == 0 ? '' : $this->sma->formatDecimal($product->supplier2price); ?>");
    <?php } ?>
    <?php if ($product->supplier3) { ?>
                $('#addSupplier').click();
                select_supplier('supplier_3', "<?= $product->supplier3; ?>");
                $('#supplier_3_price').val("<?= $product->supplier3price == 0 ? '' : $this->sma->formatDecimal($product->supplier3price); ?>");
    <?php } ?>
    <?php if ($product->supplier4) { ?>
                $('#addSupplier').click();
                select_supplier('supplier_4', "<?= $product->supplier4; ?>");
                $('#supplier_4_price').val("<?= $product->supplier4price == 0 ? '' : $this->sma->formatDecimal($product->supplier4price); ?>");
    <?php } ?>
    <?php if ($product->supplier5) { ?>
                $('#addSupplier').click();
                select_supplier('supplier_5', "<?= $product->supplier5; ?>");
                $('#supplier_5_price').val("<?= $product->supplier5price == 0 ? '' : $this->sma->formatDecimal($product->supplier5price); ?>");
    <?php } ?>
            function select_supplier(id, v) {
                $('#' + id).val(v).select2({
                    minimumInputLength: 1,
                    data: [],
                    initSelection: function (element, callback) {
                        $.ajax({
                            type: "get", async: false,
                            url: "<?= site_url('suppliers/getSupplier') ?>/" + $(element).val(),
                            dataType: "json",
                            success: function (data) {
                                callback(data[0]);
                            }
                        });
                    },
                    ajax: {
                        url: site.base_url + "suppliers/suggestions",
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
                }); //.select2("val", "<?= $product->supplier1; ?>");
            }

            var whs = $('.wh');
            $.each(whs, function () {
                $(this).val($('#r' + $(this).attr('id')).text());
            });
        });
<?php } ?>

</script>

<div class="modal" id="aModal" tabindex="-1" role="dialog" aria-labelledby="aModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true"><i class="fa fa-2x">&times;</i></span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="aModalLabel"><?= lang('add_product_manually') ?></h4>
            </div>
            <div class="modal-body" id="pr_popover_content">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="awarehouse" class="col-sm-4 control-label"><?= lang('warehouse') ?></label>
                        <div class="col-sm-8">
                            <?php
                            $wh[''] = '';
                            foreach ($warehouses as $warehouse) {
                                $wh[$warehouse->id] = $warehouse->name;
                            }
                            echo form_dropdown('warehouse', $wh, '', 'id="awarehouse" class="form-control"');
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="aquantity" class="col-sm-4 control-label"><?= lang('quantity') ?></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="aquantity">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="acost" class="col-sm-4 control-label"><?= lang('cost') ?></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="acost">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="aprice" class="col-sm-4 control-label"><?= lang('price') ?></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="aprice">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="updateAttr"><?= lang('submit') ?></button>
            </div>
        </div>
    </div>
</div>
