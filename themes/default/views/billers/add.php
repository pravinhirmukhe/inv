<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo lang('add_biller'); ?></h4>
        </div>

        <?php
        $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id' => 'addstore');
        echo form_open_multipart("billers/add", $attrib);
        ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?= lang("logo", "biller_logo"); ?> (300x100)
                        <?php
//                        echo form_upload('logo', '', 'class="form-control file-loading" id="store_logo_up" required="required" ');
                        ?>
                        <input id="store_logo_up" name="logo" type="file" class="form-control" 
                               data-bv-notempty="true"
                               data-show-upload="false"
                               data-show-preview="false" 
                               data-bv-file-maxsize="300*100" 
                               data-bv-file-message="Please check image size. it has to be required Image size." accept="image/*"
                               />
                    </div>
                </div>
            </div>
            <!--            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
            <?= lang("logo", "biller_logo"); ?>
            <?php
            $biller_logos[''] = '';
            foreach ($logos as $key => $value) {
                $biller_logos[$value] = $value;
            }
            echo form_dropdown('logo', $biller_logos, '', 'class="form-control select" id="biller_logo" required="required" ');
            ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="logo-con" class="text-center"></div>
                            </div>
                        </div>-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group company">
                        <?= lang("company", "company"); ?>
                        <?php echo form_input('company', '', 'class="form-control tip" id="company" data-bv-notempty="true"'); ?>
                    </div>
                    <div class="form-group person">
                        <?= lang("name", "name"); ?>
                        <?php echo form_input('name', '', 'class="form-control tip" id="name" data-bv-notempty="true"'); ?>
                    </div>
                    <div class="form-group">
                        <?= lang("vat_no", "vat_no"); ?>
                        <?php
                        echo form_input('vat_no', '', 'class="form-control" id="vat_no"'
                                . 'data-bv-notempty="true"
                               data-bv-notempty-message="The Vat no is required and cannot be empty"
                               data-bv-stringlength="true"
                               data-bv-stringlength-min="11"
                               data-bv-stringlength-max="11"
                               data-bv-stringlength-message="The Vat no must be exact 11 numbers long"
                               data-bv-regexp="true"
                               data-bv-regexp-regexp="^[0-9]+$"
                               data-bv-regexp-message="The Vat no can only consist of digits"');
                        ?>
                    </div>
                    <!--<div class="form-group company">
                    <?= lang("contact_person", "contact_person"); ?>
                    <?php echo form_input('contact_person', '', 'class="form-control" id="contact_person" data-bv-notempty="true"'); ?>
                </div>-->
                    <div class="form-group">
                        <?= lang("email_address", "email_address"); ?>
                        <input type="email" name="email" class="form-control" required="required" id="email_address"/>
                    </div>
                    <div class="form-group">
                        <?= lang("phone", "phone"); ?>
                        <input type="tel" name="phone" class="form-control" required="required" id="phone"
                               data-bv-notempty="true"
                               data-bv-notempty-message="The Mobile no is required and cannot be empty"
                               data-bv-stringlength="true"
                               data-bv-stringlength-min="10"
                               data-bv-stringlength-max="10"
                               data-bv-stringlength-message="The Mobile no must be exact 10 numbers long"
                               data-bv-regexp="true"
                               data-bv-regexp-regexp="^[0-9]+$"
                               data-bv-regexp-message="The Mobile no can only consist of digits"
                               />
                    </div>
                    <div class="form-group">
                        <?= lang("address", "address"); ?>
                        <?php echo form_input('address', '', 'class="form-control" id="address" required="required" data-bv-notempty="true"'); ?>
                    </div>
                    <div class="form-group">
                        <?= lang("city", "city"); ?>
                        <?php echo form_input('city', '', 'class="form-control" id="city" required="required" data-bv-notempty="true"'); ?>
                    </div>
                    <div class="form-group">
                        <?= lang("state", "state"); ?>
                        <?php echo form_input('state', '', 'class="form-control" id="state" '); ?>
                    </div>
                    <?php // if ($Settings->tax1) {    ?>
                    <div class="form-group">
                        <?= lang("product_tax", "tax_rate") ?>
                        <?php
                        $tr[""] = "";
                        foreach ($tax_rates as $tax) {
                            $tr[$tax->id] = $tax->name;
                        }
                        echo form_dropdown('tax_rate', $tr, (isset($_POST['tax_rate']) ? $_POST['tax_rate'] : $Settings->default_tax_rate), 'class="form-control select" required="required" id="tax_rate" placeholder="' . lang("select") . ' ' . lang("product_tax") . '" style="width:100%" data-bv-notempty="true"');
                        ?>
                    </div>
                    <div class="form-group">
                        <?= lang("tax_method", "tax_method") ?>
                        <?php
                        $tm = array('0' => lang('inclusive'), '1' => lang('exclusive'));
                        echo form_dropdown('tax_method', $tm, (isset($_POST['tax_method']) ? $_POST['tax_method'] : ''), 'class="form-control select" id="tax_method" required="required" placeholder="' . lang("select") . ' ' . lang("tax_method") . '" style="width:100%" data-bv-notempty="true"');
                        ?>
                    </div>
                    <?php // }     ?>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= lang("postal_code", "postal_code"); ?>
                        <?php
                        echo form_input('postal_code', '', 'class="form-control" id="postal_code"'
                                . 'data-bv-notempty="true"
                               data-bv-notempty-message="The Zip Code is required and cannot be empty"
                               data-bv-stringlength="true"
                               data-bv-stringlength-min="6"
                               data-bv-stringlength-max="6"
                               data-bv-stringlength-message="The Zip Code must be exact 6 numbers long"
                               data-bv-regexp="true"
                               data-bv-regexp-regexp="^[0-9]+$"
                               data-bv-regexp-message="The Zip Code can only consist of digits"');
                        ?>
                    </div>
                    <div class="form-group">
                        <?= lang("country", "country"); ?>
                        <?php echo form_input('country', '', 'class="form-control" id="country"'); ?>
                    </div>
                    <div class="form-group">
                        <?= lang("bcf1", "cf1"); ?>
                        <?php echo form_input('cf1', '', 'class="form-control" id="cf1"'); ?>
                    </div>
                    <div class="form-group">
                        <?= lang("bcf2", "cf2"); ?>
                        <?php echo form_input('cf2', '', 'class="form-control" id="cf2"'); ?>

                    </div>
                    <div class="form-group">
                        <?= lang("bcf3", "cf3"); ?>
                        <?php echo form_input('cf3', '', 'class="form-control" id="cf3"'); ?>
                    </div>
                    <div class="form-group">
                        <?= lang("bcf4", "cf4"); ?>
                        <?php echo form_input('cf4', '', 'class="form-control" id="cf4"'); ?>

                    </div>
                    <div class="form-group">
                        <?= lang("bcf5", "cf5"); ?>
                        <?php echo form_input('cf5', '', 'class="form-control" id="cf5"'); ?>

                    </div>
                    <div class="form-group">
                        <?= lang("bcf6", "cf6"); ?>
                        <?php echo form_input('cf6', '', 'class="form-control" id="cf6"'); ?>
                    </div>
                    <div class="form-group">
                        <?= lang("barcode_prefix", "barcode_prefix"); ?>
                        <?php echo form_input('barcode_prefix', '', 'class="form-control" id="barcode_prefix" data-bv-notempty="true"'); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?= lang("invoice_footer", "invoice_footer"); ?>
                        <?php echo form_textarea('invoice_footer', '', 'class="form-control skip" id="invoice_footer" style="height:100px;"'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('add_biller', lang('add_biller'), 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>

</div>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#biller_logo').change(function (event) {
            var biller_logo = $(this).val();
            $('#logo-con').html('<img src="<?= base_url('assets/uploads/logos') ?>/' + biller_logo + '" alt="">');
        });
    });
    $(function () {
        $('#store_logo_up').fileinput({
            maxImageWidth: 300,
            maxImageHeight: 100
        });
        $('#addstore').bootstrapValidator({
            feedbackIcons: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                logo: {
                    validators: {
                        file: {
                            extension: 'jpeg,png',
                            type: 'image/jpeg,image/png',
                            maxSize: 300 * 100,
                            message: 'Please check image size. it has to be 300X100 Image size.'
                        }
                    }
                }
            }
        });
    });
</script>
<?= $modal_js ?>