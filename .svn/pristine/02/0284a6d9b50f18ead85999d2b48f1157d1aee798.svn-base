<script type="text/javascript">
    $(document).ready(function () {
        $('#type').val('<?= $type ?>');
        $('#ups').val('<?= $ups ?>');
        $('#type,#ups').change(function () {
            var type = $('#type').val() ? $('#type').val() : "standard";
            var ups = $('#ups').val() ? $('#ups').val() : "1";
            window.location.replace("<?php echo site_url('products/print_barcodes'); ?>/" + type + "/" + ups);
            return false;
        });
    });
</script>
<style>
    @media print{
        /*        @font-face {
                    font-family: 'Ubuntu';
                    font-style: normal;
                    src: url('<?= $assets ?>/fonts/Ubuntu-R.ttf');
                }*/
        .tableid > thead > tr > th,
        .tableid > tbody > tr > th,
        .tableid > tfoot > tr > th,
        .tableid > thead > tr > td,
        .tableid > tbody > tr > td,
        .tableid > tfoot > tr > td
        {line-height:10px !important;border:none!important;padding: 0;}
        body{
            /*            font-family: 'Ubuntu', sans-serif;
                        font-style: normal;
                        src: url('<?= $assets ?>/fonts/Ubuntu-R.ttf');*/
            line-height: 1px;
            color: #000;
            font-size:8px !important;
            line-height:10px !important;
        }
        h3{font-size:8px !important;}
        .barcodeprint{
            width: 42mm !important;
            height: 42mm !important;
            padding: 15px 5px !important;
            border: 1px solid #999999!important;
            margin: 2px;
        }
        .container{
            /*width: 36mm !important;*/
            /*margin-left: 10px !important;*/
            margin:8px !important;
            font-size: 8px !important;
            /*border:1px solid #000000 !important;*/
        } 
        @page { 
            size: A4;    
        } 
    }
    @media screen{
        .barcodeprint{
            width: 70mm !important;
            /*height: 10mm !important;*/
            padding: 10px !important;
            border: 1px solid #999999!important;
        }
        /*        .container{
                    width: 36mm !important;
                    margin-left: 10px !important;
                    margin:10px !important;
                    font-size: 10px !important;
                    border:1px solid #000000 !important;
                } */
    }
</style>  
<div class="box">
    <div class="box-header no-print">
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= lang('print_barcodes'); ?></h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown"><a href="javascript:void();" onclick="window.print();" id="print-icon" class="tip" title="<?= lang('print') ?>"><i class="icon fa fa-print"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?php echo lang('print_barcode_heading'); ?></p>

                <div class="well well-sm no-print row">
                    <!--                    <div class="col-md-6">
                    <?php /*
                      $cat[''] = $this->lang->line("select") . " " . $this->lang->line("category");

                      foreach ($categories as $category) {
                      $cat[$category->id] = $category->name;
                      }

                      echo form_dropdown('category', $cat, $category_id, 'class="tip form-control " id="category" placeholder="' . $this->lang->line("select") . " " . $this->lang->line("category") . '" required="required"');
                     */ ?>
                                        </div>-->
                    <div class="col-md-6">
                        <?php
                        $opts = array('' => $this->lang->line("select") . " " . $this->lang->line("type"), 'standard' => lang('standard'), 'combo' => lang('combo'), 'bundle' => lang('bundle'));
                        echo form_dropdown('type', $opts, $type, 'class="tip form-control" id="type" placeholder="' . $this->lang->line("select") . " " . $this->lang->line("type") . '" required="required"');
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                        echo form_dropdown('ups', array('1' => "1 ups", '2' => "2 ups"), $ups, 'class="tip form-control" id="ups" placeholder="' . $this->lang->line("select") . " " . $this->lang->line("Ups") . '" required="required"');
                        ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="container"  style="background-color:#ffffff;">
                    <?php if ($r != 1) { ?>

                        <?php
                        if (!empty($links)) {
                            echo '<div class="text-center no-print">' . $links . '</div>';
                        }
                        ?>
                        <?php echo $html; ?>
                        <?php
                        if (!empty($links)) {
                            echo '<div class="text-center no-print">' . $links . '</div>';
                        }
                        ?>
                        <?php
                    } else {
                        echo '<h3>' . $this->lang->line('empty_category') . '</h3>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>