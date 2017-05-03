<script>
    $(document).ready(function () {
        oTable = $('#getDatadepartment').dataTable({
            "aaSorting": [[0, "asc"]],
            "aLengthMenu": [[5, 25, 50, 100, -1], [5, 25, 50, 100, "All"]],
            "iDisplayLength": 5,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('System_settings/getMin_qty_lvl') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [{"bSortable": false, "mRender": checkbox}, null, null, null, null, null, null, null, null, null, {"mRender": setStatus}, {"bSortable": false}],
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
                $('td:eq(2) > label', nRow).attr('onclick', "changeStatus('id'," + aData[0] + ",'department')");
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
            }
        }).fnSetFilteringDelay().dtFilter([
        ], "footer");
    });
</script>
<script>

//    $(document).ready(function () {
    deleteMin_qty_lvl = function (id) {
        bootbox.confirm("Are you sure to delete?", function (r) {
            if (r == true) {
                $.ajax({
                    url: "<?= site_url() ?>" + "system_settings/deleteMin_qty_lvl/" + id,
                    type: 'GET',
                    data: {},
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        if (data.s == "true") {
                            bootbox.alert('Minimum Qty Level Deleted Successfully!');
                            oTable_department.fnDraw();
                        } else {
                            bootbox.alert('Minimum Qty Level Deleting Failed!');
                        }
                    }
                });
            }
        });
    };
    updateAttribute = function (tab, id) {
        bootbox.confirm("Are you sure to Update?", function (r) {
            if (r == true) {
                $.ajax({
                    url: "<?= site_url() ?>" + "system_settings/updateAttribute",
                    type: 'GET',
                    data: $('#upAttribute').serialize(),
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        if (data.s == "true") {
                            bootbox.alert('Paramenter Deleted Successfully!');
//                            $('#getData' + tab).fndraw();
                        } else {
                            bootbox.alert('Paramenter Deleting Failed!');
                        }
                    }
                });
            }
        });
    };
//    });

</script>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw icon fa fa-tasks tip"></i><?= lang('min_qty_level'); ?></h2>
        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon fa fa-tasks tip" data-placement="left" title="<?= lang("actions") ?>"></i></a>
                    <ul class="dropdown-menu pull-right" class="tasks-menus" role="menu" aria-labelledby="dLabel">
                        <li><a href="<?php echo site_url('system_settings/addMin_qty_lvl'); ?>" data-toggle="modal"
                               data-target="#myModal"><i class="fa fa-plus"></i> <?= lang('add_min_qty_level') ?></a></li>
<!--                        <li><a href="<?php echo site_url('system_settings/add_subcategory'); ?>" data-toggle="modal"
                               data-target="#myModal"><i class="fa fa-plus"></i> <?= lang('add_subcategory') ?></a></li>
                        <li><a href="#" id="excel" data-action="export_excel"><i
                                    class="fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?></a></li>
                        <li><a href="#" id="pdf" data-action="export_pdf"><i
                                    class="fa fa-file-pdf-o"></i> <?= lang('export_to_pdf') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="#" id="delete" data-action="delete"><i
                                    class="fa fa-trash-o"></i> <?= lang('delete_categories') ?></a></li>-->
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?= lang('min_qty_lvl_desc'); ?></p>
                <div class="table-responsive">
                    <div class="row" >
                        <div class="col-md-12">
                            <table id="getDatadepartment" class="dataTable table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkth" type="checkbox" name="check"/>
                                        </th>
                                        <th>Store</th>
                                        <th>Department</th>
                                        <th>Section</th>
                                        <th>Product Items</th>
                                        <th>Type</th>
                                        <th>Brand</th>
                                        <th>Design</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Status</th>
                                        <th style="width:80px; text-align:center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot class="dtFilter">
                                    <tr class="active">
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkth" type="checkbox" name="check"/>
                                        </th>
                                        <th>Store</th>
                                        <th>Department</th>
                                        <th>Section</th>
                                        <th>Product Items</th>
                                        <th>Type</th>
                                        <th>Brand</th>
                                        <th>Design</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Status</th>
                                        <th style="width:80px; text-align:center;"></th>
                                    </tr>
                                </tfoot>
                            </table> 
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= $assets ?>js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/jquery-migrate-1.2.1.min.js"></script>


