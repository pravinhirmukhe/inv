<script>
    var oTable = ['department', 'product_items', 'section', 'type', 'brands', 'design', 'style', 'pattern', 'fitting', 'color', 'size', 'per'];
    $(document).ready(function () {
        oTable['department'] = $('#getDatadepartment').dataTable({
            "aaSorting": [[0, "asc"]],
            "aLengthMenu": [[5, 25, 50, 100, -1], [5, 25, 50, 100, "All"]],
            "iDisplayLength": 5,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('System_settings/getProduct_para/department') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [{"bSortable": false, "mRender": checkbox}, {'mRender': null}, null, {"mRender": setStatus}, {"bSortable": false}],
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
                $('td:eq(3) > label', nRow).attr('onclick', "changeStatus('id'," + aData[0] + ",'department')");
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
            }
        }).fnSetFilteringDelay().dtFilter([
        ], "footer");
    });</script>

<script>
    $(document).ready(function () {
        oTable['product_items'] = $('#getDataproduct_items').dataTable({
            "aaSorting": [[0, "asc"]],
            "aLengthMenu": [[5, 25, 50, 100, -1], [5, 25, 50, 100, "All"]],
            "iDisplayLength": 5,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('System_settings/getProduct_para/product_items') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [{"bSortable": false, "mRender": checkbox}, {'mRender': null}, null, {"mRender": setStatus}, {"bSortable": false}],
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
                $('td:eq(3) > label', nRow).attr('onclick', "changeStatus('id'," + aData[0] + ",'product_items')");
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
            }
        }).fnSetFilteringDelay().dtFilter([
        ], "footer");
    });</script>
<script>
    $(document).ready(function () {
        oTable['section'] = $('#getDatasection').dataTable({
            "aaSorting": [[0, "asc"]],
            "aLengthMenu": [[5, 25, 50, 100, -1], [5, 25, 50, 100, "All"]],
            "iDisplayLength": 5,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('System_settings/getProduct_para/section') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [{"bSortable": false, "mRender": checkbox}, {'mRender': null}, null, {"mRender": setStatus}, {"bSortable": false}],
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
                $('td:eq(3) > label', nRow).attr('onclick', "changeStatus('id'," + aData[0] + ",'section')");
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
            }
        }).fnSetFilteringDelay().dtFilter([
        ], "footer");
    });</script>
<script>
    $(document).ready(function () {
        oTable['type'] = $('#getDatatype').dataTable({
            "aaSorting": [[0, "asc"]],
            "aLengthMenu": [[5, 25, 50, 100, -1], [5, 25, 50, 100, "All"]],
            "iDisplayLength": 5,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('System_settings/getProduct_para/type') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [{"bSortable": false, "mRender": checkbox}, {'mRender': null}, null, {"mRender": setStatus}, {"bSortable": false}],
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
                $('td:eq(3) > label', nRow).attr('onclick', "changeStatus('id'," + aData[0] + ",'type')");
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
            }
        }).fnSetFilteringDelay().dtFilter([
        ], "footer");
    });</script>
<script>
    $(document).ready(function () {
        oTable['brands'] = $('#getDatabrands').dataTable({
            "aaSorting": [[0, "asc"]],
            "aLengthMenu": [[5, 25, 50, 100, -1], [5, 25, 50, 100, "All"]],
            "iDisplayLength": 5,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('System_settings/getProduct_para/brands') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [{"bSortable": false, "mRender": checkbox}, {'mRender': null}, null, {"mRender": setStatus}, {"bSortable": false}],
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
                $('td:eq(3) > label', nRow).attr('onclick', "changeStatus('id'," + aData[0] + ",'brands')");
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
            }
        }).fnSetFilteringDelay().dtFilter([
        ], "footer");
    });</script>
<script>
    $(document).ready(function () {
        oTable['design'] = $('#getDatadesign').dataTable({
            "aaSorting": [[0, "asc"]],
            "aLengthMenu": [[5, 25, 50, 100, -1], [5, 25, 50, 100, "All"]],
            "iDisplayLength": 5,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('System_settings/getProduct_para/design') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [{"bSortable": false, "mRender": checkbox}, {'mRender': null}, null, {"mRender": setStatus}, {"bSortable": false}],
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
                $('td:eq(3) > label', nRow).attr('onclick', "changeStatus('id'," + aData[0] + ",'design')");
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
            }
        }).fnSetFilteringDelay().dtFilter([
        ], "footer");
    });</script>
<script>
    $(document).ready(function () {
        oTable['style'] = $('#getDatastyle').dataTable({
            "aaSorting": [[0, "asc"]],
            "aLengthMenu": [[5, 25, 50, 100, -1], [5, 25, 50, 100, "All"]],
            "iDisplayLength": 5,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('System_settings/getProduct_para/style') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [{"bSortable": false, "mRender": checkbox}, {'mRender': null}, null, {"mRender": setStatus}, {"bSortable": false}],
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
                $('td:eq(3) > label', nRow).attr('onclick', "changeStatus('id'," + aData[0] + ",'style')");
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
            }
        }).fnSetFilteringDelay().dtFilter([
        ], "footer");
    });</script>
<script>
    $(document).ready(function () {
        oTable['pattern'] = $('#getDatapattern').dataTable({
            "aaSorting": [[0, "asc"]],
            "aLengthMenu": [[5, 25, 50, 100, -1], [5, 25, 50, 100, "All"]],
            "iDisplayLength": 5,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('System_settings/getProduct_para/pattern') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [{"bSortable": false, "mRender": checkbox}, {'mRender': null}, null, {"mRender": setStatus}, {"bSortable": false}],
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
                $('td:eq(3) > label', nRow).attr('onclick', "changeStatus('id'," + aData[0] + ",'pattern')");
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
            }
        }).fnSetFilteringDelay().dtFilter([
        ], "footer");
    });</script>
<script>
    $(document).ready(function () {
        oTable['fitting'] = $('#getDatafitting').dataTable({
            "aaSorting": [[0, "asc"]],
            "aLengthMenu": [[5, 25, 50, 100, -1], [5, 25, 50, 100, "All"]],
            "iDisplayLength": 5,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('System_settings/getProduct_para/fitting') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [{"bSortable": false, "mRender": checkbox}, {'mRender': null}, null, {"mRender": setStatus}, {"bSortable": false}],
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
                $('td:eq(3) > label', nRow).attr('onclick', "changeStatus('id'," + aData[0] + ",'fitting')");
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
            }
        }).fnSetFilteringDelay().dtFilter([
        ], "footer");
    });</script>
<script>
    $(document).ready(function () {
        oTable['fabric'] = $('#getDatafabric').dataTable({
            "aaSorting": [[0, "asc"]],
            "aLengthMenu": [[5, 25, 50, 100, -1], [5, 25, 50, 100, "All"]],
            "iDisplayLength": 5,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('System_settings/getProduct_para/fabric') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [{"bSortable": false, "mRender": checkbox}, {'mRender': null}, null, {"mRender": setStatus}, {"bSortable": false}],
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
                $('td:eq(3) > label', nRow).attr('onclick', "changeStatus('id'," + aData[0] + ",'fabric')");
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
            }
        }).fnSetFilteringDelay().dtFilter([
        ], "footer");
    });</script>
<script>
    $(document).ready(function () {
        oTable['color'] = $('#getDatacolor').dataTable({
            "aaSorting": [[0, "asc"]],
            "aLengthMenu": [[5, 25, 50, 100, -1], [5, 25, 50, 100, "All"]],
            "iDisplayLength": 5,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('System_settings/getProduct_para/color') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [{"bSortable": false, "mRender": checkbox}, {'mRender': null}, {"mRender": setStatus}, {"bSortable": false}],
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
                $('td:eq(2) > label', nRow).attr('onclick', "changeStatus('id'," + aData[0] + ",'color')");
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
            }
        }).fnSetFilteringDelay().dtFilter([
        ], "footer");
    });</script>
<script>
    $(document).ready(function () {
        oTable['size'] = $('#getDatasize').dataTable({
            "aaSorting": [[0, "asc"]],
            "aLengthMenu": [[5, 25, 50, 100, -1], [5, 25, 50, 100, "All"]],
            "iDisplayLength": 5,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('System_settings/getProduct_para/size') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [{"bSortable": false, "mRender": checkbox}, {'mRender': null}, {'mRender': null}, {'mRender': null}, {'mRender': null}, {'mRender': null}, {"mRender": setStatus}, {"bSortable": false}],
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
                $('td:eq(6) > label', nRow).attr('onclick', "changeStatus('id'," + aData[0] + ",'size')");
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
            }
        }).fnSetFilteringDelay().dtFilter([
        ], "footer");
    });</script>
<script>
    $(document).ready(function () {
        oTable['per'] = $('#getDataper').dataTable({
            "aaSorting": [[0, "asc"]],
            "aLengthMenu": [[5, 25, 50, 100, -1], [5, 25, 50, 100, "All"]],
            "iDisplayLength": 5,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('System_settings/getProduct_para/per') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [{"bSortable": false, "mRender": checkbox}, {'mRender': null}, {"mRender": setStatus}, {"bSortable": false}],
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
                $('td:eq(2) > label', nRow).attr('onclick', "changeStatus('id'," + aData[0] + ",'per')");
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
            }
        }).fnSetFilteringDelay().dtFilter([
        ], "footer");
    });</script>
<script>

//    $(document).ready(function () {
    deletePara = function (tab, id) {
        bootbox.confirm("Are you sure to delete?", function (r) {
            if (r == true) {
                $.ajax({
                    url: "<?= site_url() ?>" + "system_settings/deletePara/" + tab + "/" + id,
                    type: 'GET',
                    data: {},
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        if (data.s == "true") {
                            bootbox.alert('Paramenter Deleted Successfully!');
                            oTable[tab].fnDraw();
                        } else {
                            bootbox.alert('Paramenter Deleting Failed!');
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
                            oTable[tab].fnDraw();
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
        <h2 class="blue"><i class="fa-fw icon fa fa-tasks tip"></i><?= lang('products_para'); ?></h2>
        <!--        <div class="box-icon">
                    <ul class="btn-tasks">
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-tasks tip"
                                                                                          data-placement="left"
                                                                                          title="<?= lang("actions") ?>"></i></a>
                            <ul class="dropdown-menu pull-right" class="tasks-menus" role="menu" aria-labelledby="dLabel">
                                <li><a href="<?php echo site_url('system_settings/add_category'); ?>" data-toggle="modal"
                                       data-target="#myModal"><i class="fa fa-plus"></i> <?= lang('add_category') ?></a></li>
                                <li><a href="<?php echo site_url('system_settings/add_subcategory'); ?>" data-toggle="modal"
                                       data-target="#myModal"><i class="fa fa-plus"></i> <?= lang('add_subcategory') ?></a></li>
                                <li><a href="#" id="excel" data-action="export_excel"><i
                                            class="fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?></a></li>
                                <li><a href="#" id="pdf" data-action="export_pdf"><i
                                            class="fa fa-file-pdf-o"></i> <?= lang('export_to_pdf') ?></a></li>
                                <li class="divider"></li>
                                <li><a href="#" id="delete" data-action="delete"><i
                                            class="fa fa-trash-o"></i> <?= lang('delete_categories') ?></a></li>
        
                            </ul>
                        </li>
                    </ul>
                </div>-->
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?= lang('products_para_desc'); ?></p>
                <div class="table-responsive">
                    <div class="row" >
                        <div class="col-md-6" style="border: 1px solid #F3F3F3">
                            <div class="col-md-12">
                                <h2>Department
                                    <span class="pull-right">
                                        <a href="<?php echo site_url('system_settings/AddProduct_para/department'); ?>" data-toggle="modal"
                                           data-target="#myModal" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add</a>
                                    </span>
                                </h2>
                            </div>
                            <table id="getDatadepartment" class="dataTable table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkth" type="checkbox" name="check"/>
                                        </th>
                                        <th>Name</th>
                                        <th>Store Id</th>
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
                                        <th>Name</th>
                                        <th>Store Id</th>
                                        <th>Status</th>
                                        <th style="width:80px; text-align:center;"></th>
                                    </tr>
                                </tfoot>
                            </table> 
                        </div>
                        <div class="col-md-6" style="border: 1px solid #F3F3F3">
                            <div class="col-md-12">
                                <h2>Product Items
                                    <span class="pull-right">
                                        <a href="<?php echo site_url('system_settings/AddProduct_para/product_items'); ?>" data-toggle="modal"
                                           data-target="#myModal" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add</a>
                                    </span>
                                </h2>
                            </div>
                            <table id="getDataproduct_items" class="dataTable table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkth" type="checkbox" name="check"/>
                                        </th>
                                        <th>Name</th>
                                        <th>Section Id</th>
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
                                        <th>Name</th>
                                        <th>Section Id</th>
                                        <th>Status</th>
                                        <th style="width:80px; text-align:center;"></th>
                                    </tr>
                                </tfoot>
                            </table> 
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-6" style="border: 1px solid #F3F3F3">
                            <div class="col-md-12">
                                <h2>Section
                                    <span class="pull-right">
                                        <a href="<?php echo site_url('system_settings/AddProduct_para/section'); ?>" data-toggle="modal"
                                           data-target="#myModal" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add</a>
                                    </span>
                                </h2>
                            </div>
                            <table id="getDatasection" class="dataTable table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkth" type="checkbox" name="check"/>
                                        </th>
                                        <th>Name</th>
                                        <th>Dept Id</th>
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
                                        <th>Name</th>
                                        <th>Dept Id</th>
                                        <th>Status</th>
                                        <th style="width:80px; text-align:center;"></th>
                                    </tr>
                                </tfoot>
                            </table> 
                        </div>
                        <div class="col-md-6" style="border: 1px solid #F3F3F3">
                            <div class="col-md-12">
                                <h2>Type
                                    <span class="pull-right">
                                        <a href="<?php echo site_url('system_settings/AddProduct_para/type'); ?>" data-toggle="modal"
                                           data-target="#myModal" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add</a>
                                    </span>
                                </h2>
                            </div>
                            <table id="getDatatype" class="dataTable table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkth" type="checkbox" name="check"/>
                                        </th>
                                        <th>Name</th>
                                        <th>Product Id</th>
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
                                        <th>Name</th>
                                        <th>Product Id</th>
                                        <th>Status</th>
                                        <th style="width:80px; text-align:center;"></th>
                                    </tr>
                                </tfoot>
                            </table> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="border: 1px solid #F3F3F3">
                            <div class="col-md-12">
                                <h2>Brands
                                    <span class="pull-right">
                                        <a href="<?php echo site_url('system_settings/AddProduct_para/brands'); ?>" data-toggle="modal"
                                           data-target="#myModal" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add</a>
                                    </span>
                                </h2>
                            </div>
                            <table id="getDatabrands" class="dataTable table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkth" type="checkbox" name="check"/>
                                        </th>
                                        <th>Name</th>
                                        <th>Type Id</th>
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
                                        <th>Name</th>
                                        <th>Type Id</th>
                                        <th>Status</th>
                                        <th style="width:80px; text-align:center;"></th>
                                    </tr>
                                </tfoot>
                            </table> 
                        </div>
                        <div class="col-md-6" style="border: 1px solid #F3F3F3">
                            <div class="col-md-12">
                                <h2>Design
                                    <span class="pull-right">
                                        <a href="<?php echo site_url('system_settings/AddProduct_para/design'); ?>" data-toggle="modal"
                                           data-target="#myModal" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add</a>
                                    </span>
                                </h2>
                            </div>
                            <table id="getDatadesign" class="dataTable table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkth" type="checkbox" name="check"/>
                                        </th>
                                        <th>Name</th>
                                        <th>Brand Id</th>
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
                                        <th>Name</th>
                                        <th>Brand Id</th>
                                        <th>Status</th>
                                        <th style="width:80px; text-align:center;"></th>
                                    </tr>
                                </tfoot>
                            </table> 
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-6" style="border: 1px solid #F3F3F3">
                            <div class="col-md-12">
                                <h2>Style
                                    <span class="pull-right">
                                        <a href="<?php echo site_url('system_settings/AddProduct_para/style'); ?>" data-toggle="modal"
                                           data-target="#myModal" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add</a>
                                    </span>
                                </h2>
                            </div>
                            <table id="getDatastyle" class="dataTable table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkth" type="checkbox" name="check"/>
                                        </th>
                                        <th>Name</th>
                                        <th>Design Id</th>
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
                                        <th>Name</th>
                                        <th>Design Id</th>
                                        <th>Status</th>
                                        <th style="width:80px; text-align:center;"></th>
                                    </tr>
                                </tfoot>
                            </table> 
                        </div>
                        <div class="col-md-6" style="border: 1px solid #F3F3F3">
                            <div class="col-md-12">
                                <h2>Pattern
                                    <span class="pull-right">
                                        <a href="<?php echo site_url('system_settings/AddProduct_para/pattern'); ?>" data-toggle="modal"
                                           data-target="#myModal" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add</a>
                                    </span>
                                </h2>
                            </div>
                            <table id="getDatapattern" class="dataTable table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkth" type="checkbox" name="check"/>
                                        </th>
                                        <th>Name</th>
                                        <th>Style Id</th>
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
                                        <th>Name</th>
                                        <th>Style Id</th>
                                        <th>Status</th>
                                        <th style="width:80px; text-align:center;"></th>
                                    </tr>
                                </tfoot>
                            </table> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="border: 1px solid #F3F3F3">
                            <div class="col-md-12">
                                <h2>Fitting
                                    <span class="pull-right">
                                        <a href="<?php echo site_url('system_settings/AddProduct_para/fitting'); ?>" data-toggle="modal"
                                           data-target="#myModal" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add</a>
                                    </span>
                                </h2>
                            </div>
                            <table id="getDatafitting" class="dataTable table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkth" type="checkbox" name="check"/>
                                        </th>
                                        <th>Name</th>
                                        <th>Pattern Id</th>
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
                                        <th>Name</th>
                                        <th>Style Id</th>
                                        <th>Status</th>
                                        <th style="width:80px; text-align:center;"></th>
                                    </tr>
                                </tfoot>
                            </table> 
                        </div>
                        <div class="col-md-6" style="border: 1px solid #F3F3F3">
                            <div class="col-md-12">
                                <h2>Fabric
                                    <span class="pull-right">
                                        <a href="<?php echo site_url('system_settings/AddProduct_para/fabric'); ?>" data-toggle="modal"
                                           data-target="#myModal" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add</a>
                                    </span>
                                </h2>
                            </div>
                            <table id="getDatafabric" class="dataTable table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkth" type="checkbox" name="check"/>
                                        </th>
                                        <th>Name</th>
                                        <th>Fitting Id</th>
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
                                        <th>Name</th>
                                        <th>Fitting Id</th>
                                        <th>Status</th>
                                        <th style="width:80px; text-align:center;"></th>
                                    </tr>
                                </tfoot>
                            </table> 
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-6" style="border: 1px solid #F3F3F3">
                            <div class="col-md-12">
                                <h2>Color
                                    <span class="pull-right">
                                        <a href="<?php echo site_url('system_settings/AddProduct_para/color'); ?>" data-toggle="modal"
                                           data-target="#myModal" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add</a>
                                    </span>
                                </h2>
                            </div>
                            <table id="getDatacolor" class="dataTable table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkth" type="checkbox" name="check"/>
                                        </th>
                                        <th>Name</th>
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
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th style="width:80px; text-align:center;"></th>
                                    </tr>
                                </tfoot>
                            </table> 
                        </div>
                        <div class="col-md-6" style="border: 1px solid #F3F3F3">
                            <div class="col-md-12">
                                <h2>Size
                                    <span class="pull-right">
                                        <a href="<?php echo site_url('system_settings/AddProduct_para/size'); ?>" data-toggle="modal"
                                           data-target="#myModal" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add</a>
                                    </span>
                                </h2>
                            </div>
                            <table id="getDatasize" class="dataTable table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkth" type="checkbox" name="check"/>
                                        </th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Department</th>
                                        <th>Section</th>
                                        <th>Product</th>
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
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Department</th>
                                        <th>Section</th>
                                        <th>Product</th>
                                        <th>Status</th>
                                        <th style="width:80px; text-align:center;"></th>
                                    </tr>
                                </tfoot>
                            </table> 
                        </div>
                        <div class="col-md-6" style="border: 1px solid #F3F3F3">
                            <div class="col-md-12">
                                <h2>Product Per Unit
                                    <span class="pull-right">
                                        <a href="<?php echo site_url('system_settings/AddProduct_para/per'); ?>" data-toggle="modal"
                                           data-target="#myModal" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add</a>
                                    </span>
                                </h2>
                            </div>
                            <table id="getDataper" class="dataTable table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkth" type="checkbox" name="check"/>
                                        </th>
                                        <th>Name</th>

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
                                        <th>Name</th>
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
<!--<script type="text/javascript" src="<?= $assets ?>js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/jquery-migrate-1.2.1.min.js"></script>-->


