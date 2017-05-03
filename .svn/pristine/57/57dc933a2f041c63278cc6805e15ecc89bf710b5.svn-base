<script type="text/javascript">
    var count = 1, an = 1, product_variant = 0, DT = <?= $Settings->default_tax_rate ?>,
        product_tax = 0, invoice_tax = 0, total_discount = 0, total = 0,
        tax_rates = <?php echo json_encode($tax_rates); ?>;
    //var audio_success = new Audio('<?=$assets?>sounds/sound2.mp3');
    //var audio_error = new Audio('<?=$assets?>sounds/sound3.mp3');
    <?php if ($this->session->userdata('remove_pols')) { ?>
    if (localStorage.getItem('slitems')) {
        localStorage.removeItem('slitems');
    }
    if (localStorage.getItem('challan_date')) {
        localStorage.removeItem('challan_date');
    }
    if (localStorage.getItem('dispatch_date')) {
        localStorage.removeItem('dispatch_date');
    }
    if (localStorage.getItem('challan_no')) {
        localStorage.removeItem('challan_no');
    }
    if (localStorage.getItem('poref')) {
        localStorage.removeItem('poref');
    }
    if (localStorage.getItem('ponote')) {
        localStorage.removeItem('ponote');
    }
    if (localStorage.getItem('challan_name')) {
        localStorage.removeItem('challan_name');
    }
    if (localStorage.getItem('customer')) {
        localStorage.removeItem('customer');
    }
    if (localStorage.getItem('slwarehouse')) {
        localStorage.removeItem('slwarehouse');
    }
    
    <?php $this->sma->unset_data('remove_pols');
} ?>
    $(document).ready(function () {
        
        <?php if ($Owner || $Admin) { ?>
        if (!localStorage.getItem('challan_date')) {
            $("#challan_date").datetimepicker({
                format: site.dateFormats.js_ldate,
                fontAwesome: true,
                language: 'sma',
                weekStart: 1,
                todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0
            }).datetimepicker('update', new Date());
        } 
        <?php } ?>
            $('#add_challan').attr('disabled', true);
        $(document).on('change', '#challan_date', function (e) {
            localStorage.setItem('challan_date', $(this).val());
        });
        if (challan_date = localStorage.getItem('challan_date')) {
            $('#challan_date').val(challan_date);
        }
        
         $(document).on('change', '#product_challan', function (e) {
            localStorage.setItem('product_challan', $(this).val());
        });
        if (product_challan = localStorage.getItem('product_challan')) {
            $('#product_challan').val(product_challan);
        }
        
        $(document).on('change', '#dispatch_date', function (e) {
            localStorage.setItem('dispatch_date', $(this).val());
        });
        if (dispatch_date = localStorage.getItem('dispatch_date')) {
            $('#dispatch_date').val(dispatch_date);
        }
        
          var $customer = $('#customer');
        $customer.change(function (e) {
            localStorage.setItem('customer', $(this).val());
        });
        if (customer = localStorage.getItem('customer')) {
            $('#customer').val(customer);
        }
        
        $('#poref').change(function (e) {
            localStorage.setItem('poref', $(this).val());
        });
        if (poref = localStorage.getItem('poref')) {
            $('#poref').val(poref);
        }
        
          
      <?php if($this->input->get('customer')) { ?>
        if (!localStorage.getItem('slitems')) {
            localStorage.setItem('customer', <?=$this->input->get('customer');?>);
        }
        <?php } ?>
        ItemnTotals();
         $('.bootbox').on('hidden.bs.modal', function (e) {
            $('#add_item').focus();
        });
         $("#add_item").autocomplete({
            source: function (request, response) {
                //alert(response);
                if (!$('#customer').val()) {
                    $('#add_item').val('').removeClass('ui-autocomplete-loading');
                    bootbox.alert('<?=lang('select_above');?>');
                    $('#add_item').focus();
                    return false;
                }
                $.ajax({
                    type: 'get',
                    url: '<?= site_url('products/suggestions'); ?>',
                    dataType: "json",
                    data: {
                        term: request.term,
                        //warehouse_id: $("#slwarehouse").val(),
                        customer_id: $("#customer").val()
                    },
                    success: function (data) {
                       
                        response(data);
                    }
                });
            },
            minLength: 1,
            autoFocus: false,
            delay: 200,
            response: function (event, ui) {
                //alert($(this).val().length);
                if ($(this).val().length >= 16 && ui.content[0].id == 0) {
                    //audio_error.play();
                    bootbox.alert('<?= lang('no_match_found') ?>', function () {
                        $('#add_item').focus();
                    });
                    $(this).removeClass('ui-autocomplete-loading');
                    $(this).removeClass('ui-autocomplete-loading');
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
                    bootbox.alert('<?= lang('no_match_found') ?>', function () {
                        $('#add_item').focus();
                    });
                    $(this).removeClass('ui-autocomplete-loading');
                    $(this).val('');
                }
            },
            select: function (event, ui) {
                //alert(ui.item);
                event.preventDefault();
                if (ui.item.id !== 0) {
                    var row = add_challan_item(ui.item);
                    if (row)
                        $(this).val('');
                } else {
                    //audio_error.play();
                    bootbox.alert('<?= lang('no_match_found') ?>');
                }
            }
        });
        
         $('#add_item').bind('keypress', function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                $(this).autocomplete("search");
            }
        });
        /* ------------------------------
         * Show manual item addition modal
         ------------------------------- */
            $(document).on('click', '#addManually', function (e) {
            if (count == 1) {
                quitems = {};
                if ($('#slwarehouse').val() && $('#customer').val()) {
                    $('#customer').select2("readonly", true);
                    $('#slwarehouse').select2("readonly", true);
                } else {
                    bootbox.alert(lang.select_above);
                    item = null;
                    return false;
                }
            }
       
        $('#mModal').appendTo("body").modal('show');
        return false;
    });
    $(document).on('click', '#addItemManually', function (e) {
        var mid = (new Date).getTime(),
        mcode = $('#mcode').val(),
        mname = $('#mname').val(),
        mtax = parseInt($('#mtax').val()),
        mqty = parseFloat($('#mquantity').val()),
        mdiscount = $('#mdiscount').val() ? $('#mdiscount').val() : '0',
        unit_price = parseFloat($('#mprice').val()),
        mtax_rate = {};
        $.each(tax_rates, function () {
            if (this.id == mtax) {
                mtax_rate = this;
            }
        });

        slitems[mid] = {"id": mid, "item_id": mid, "label": mname + ' (' + mcode + ')', "row": {"id": mid, "code": mcode, "name": mname, "quantity": mqty, "price": unit_price, "unit_price": unit_price, "real_unit_price": unit_price, "tax_rate": mtax, "tax_method": 0, "qty": mqty, "type": "manual", "discount": mdiscount, "serial": "", "option":""}, "tax_rate": mtax_rate, "options":false};
        localStorage.setItem('slitems', JSON.stringify(slitems));
        loadItems();
        $('#mModal').modal('hide');
        $('#mcode').val('');
        $('#mname').val('');
        $('#mtax').val('');
        $('#mquantity').val('');
        $('#mdiscount').val('');
        $('#mprice').val('');
        return false;
    });
    //edit table date
    $(document).on('click', '.edit', function () {
        var row = $(this).closest('tr');
        var row_id = row.attr('id');
        item_id = row.attr('data-item-id');
        item = slitems[item_id];
        var qty = row.children().children('.rquantity').val();
         $('#prModalLabel').text(item.name + '(' + item.code + ')');
       
        
        var opt = '<p style="margin: 12px 0 0 0;">n/a</p>';
       

        $('#poptions-div').html(opt);
        $('select.select').select2({minimumResultsForSearch: 6});
        $('#pquantity').val(qty);
        $('#old_qty').val(qty);
        $('#row_id').val(row_id);
        $('#item_id').val(item_id);
        $('#prModal').appendTo("body").modal('show');

    });

    $('#prModal').on('shown.bs.modal', function (e) {
        if($('#poption').select2('val') != '') {
            $('#poption').select2('val', product_variant);
            product_variant = 0;
        }
    });
    
     /* -----------------------
     * Edit Row Method
     ----------------------- */
     $(document).on('click', '#editItem', function () {
        var row = $('#' + $('#row_id').val());
        var item_id = row.attr('data-item-id');
       
       
        slitems[item_id].qty = parseFloat($('#pquantity').val()),
        localStorage.setItem('slitems', JSON.stringify(slitems));
        $('#prModal').modal('hide');

        loadItems();
        return;
    });
    
    /* ----------------------
 * Delete Row Method
 * ---------------------- */
    $(document).on('click', '.qudel', function () {
        var row = $(this).closest('tr');
        var item_id = row.attr('data-item-id');
        delete slitems[item_id];
        row.remove();
        if(slitems.hasOwnProperty(item_id)) { } else {
            localStorage.setItem('slitems', JSON.stringify(slitems));
            loadItems();
            return;
        }
    });
    
     // clear localStorage and reload
    $('#reset').click(function (e) {
            bootbox.confirm(lang.r_u_sure, function (result) {
                if (result) {
                    if (localStorage.getItem('slitems')) {
                        localStorage.removeItem('slitems');
                    }
                    
                    if (localStorage.getItem('challan_date')) {
                        localStorage.removeItem('challan_date');
                    }
                    if (localStorage.getItem('product_challan')) {
                        localStorage.removeItem('product_challan');
                    }
                    if (localStorage.getItem('customer')) {
                        localStorage.removeItem('customer');
                    }
                    if (localStorage.getItem('dispatch_date')) {
                        localStorage.removeItem('dispatch_date');
                    }
                    if (localStorage.getItem('poref')) {
                        localStorage.removeItem('poref');
                    }

                    $('#modal-loading').show();
                    location.reload();
                }
            });
    });
    
    /* --------------------------
     * Edit Row Quantity Method
     -------------------------- */
     var old_row_qty;
     $(document).on("focus", '.rquantity', function () {
        old_row_qty = $(this).val();
    }).on("change", '.rquantity', function () {
        var row = $(this).closest('tr');
        if (!is_numeric($(this).val())) {
            $(this).val(old_row_qty);
            bootbox.alert(lang.unexpected_value);
            return;
        }
        var new_qty = parseFloat($(this).val()),
        item_id = row.attr('data-item-id');
        slitems[item_id].qty = new_qty;
        localStorage.setItem('slitems', JSON.stringify(slitems));
        loadItems();
    });
    
});
   
    function add_challan_item(item) {


	if (count == 1) {
		slitems = {};
		if ($('#slwarehouse').val() && $('#customer').val()) {
			$('#customer').select2("readonly", true);
			$('#slwarehouse').select2("readonly", true);
		} else {
			bootbox.alert(lang.select_above);
			item = null;
			return;
		}
	}
	if (item == null) {
		return;
	}
	var item_id = site.settings.item_addition == 1 ? item.item_id : item.id;
	
         if (slitems[item_id]) {
            slitems[item_id].qty = parseFloat(slitems[item_id].qty) + 1;
	} else {
		slitems[item_id] = item;
	}
        
        localStorage.setItem('slitems', JSON.stringify(slitems));
	loadItems();
	return true;
}

function loadItems() {
        
	if (localStorage.getItem('slitems')) {
		total = 0;
		count = 1;
		an = 1;
		

		$("#slTable tbody").empty();
                slitems = JSON.parse(localStorage.getItem('slitems'));
                
               $('#add_challan').attr('disabled', false); 
		$.each(slitems, function () {
                   
			var item = this;
                       var item_id = site.settings.item_addition == 1 ? item.item_id : item.id;
			slitems[item_id] = item;
                        
                                       
                        var product_id = item.id,  item_qty = item.qty,item_name = item.name,item_label =  item.label,item_code= item.code;
                        
                        
			var row_no = (new Date).getTime();
			var newTr = $('<tr id="row_' + row_no + '" class="row_' + item_id + '" data-item-id="' + item_id + '"></tr>');
                        tr_html = '<td><input name="product_id[]" type="hidden" class="rid" value="' + product_id + '"><input name="product[]" type="hidden" class="rcode" value="' + item_code + '"><input name="product_name[]" type="hidden" class="rname" value="' + item_name + '"><span class="sname" id="name_' + row_no + '">' + item_name + ' (' + item_code + ')</span> <i class="pull-right fa fa-edit tip pointer edit" id="' + row_no + '" data-item="' + item_id + '" title="Edit" style="cursor:pointer;"></i></td>';
                        tr_html += '<td><input class="form-control text-center rquantity" name="quantity[]" type="text" value="' + item_qty + '" data-id="' + row_no + '" data-item="' + item_id + '" id="quantity_' + row_no + '" onClick="this.select();"></td>';
			tr_html += '<td class="text-center"><i class="fa fa-times tip pointer qudel" id="' + row_no + '" title="Remove" style="cursor:pointer;"></i></td>';
			
                            
                        newTr.html(tr_html);
                        
                       // alert(newTr.html());
			newTr.prependTo("#slTable");
			// total += formatDecimal(item_price * item_qty);
			count += parseFloat(item_qty);
			an++;

			

		});

		var col = 1;
        if (site.settings.product_serial == 1) { col++; }
		var tfoot = '<tr id="tfoot" class="tfoot active"><th>Total</th><th class="text-center">' + formatNumber(parseFloat(count) - 1) + '</th>';
		
		
		tfoot += '<th class="text-center"><i class="fa fa-trash-o" style="opacity:0.5; filter:alpha(opacity=50);"></i></th></tr>';
		$('#slTable tfoot').html(tfoot);

		if (an > site.settings.bc_fix && site.settings.bc_fix != 0) {
			$("html, body").animate({scrollTop: $('#slTable').offset().top - 150}, 500);
			$(window).scrollTop($(window).scrollTop() + 1);
		}
		if (count > 1) {
			$('#customer').select2("readonly", true);
			$('#slwarehouse').select2("readonly", true);
		}
		//audio_success.play();
	}
}
if (typeof (Storage) === "undefined") {
    $(window).bind('beforeunload', function (e) {
        if (count > 1) {
            var message = "You will loss data!";
            return message;
        }
    });
}
</script>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= lang('add_challan'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?php echo lang('enter_info'); ?></p>

                <?php
                $attrib = array( 'role' => 'form');
                echo form_open_multipart("products/addChallan", $attrib)
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= lang("reference_no", "poref"); ?>
                                <?php echo form_input('reference_no', (isset($_POST['reference_no']) ? $_POST['reference_no'] : $ponumber), 'class="form-control input-tip" id="poref"'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= lang("challan_name", "challan_name") ?>
                                <?= form_input('challan_name', (isset($_POST['challan_name']) ? $_POST['challan_name'] : ($product_challan ? $product_challan->challan_name : '')), 'class="form-control" id="product_challan" required="required"'); ?>
                            </div>
                        </div>
                       
                        
                    </div>
                </div>
                
                 <div class="row">
                    <div class="col-lg-12">
                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= lang("challan_date", "challan_date"); ?>
                                <?php echo form_input('challan_date', (isset($_POST['challan_date']) ? $_POST['challan_date'] : ""), 'class="form-control input-tip datetime" id="challan_date" required="required"'); ?>
                            
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                 <?= lang("dispatch_date", "dispatch_date"); ?>
                                 <?php echo form_input('dispatch_date', (isset($_POST['dispatch_date']) ? $_POST['dispatch_date'] : ""), 'class="form-control input-tip datetime" id="dispatch_date" required="required"'); ?>
                        
                             </div>
                        </div>
                        
                    </div>
                </div>
                
                 <div class="clearfix"></div>
                        <div class="col-md-12">
                            <div class="panel panel-warning">
                                <div
                                    class="panel-heading"><?= lang('please_select_these_before_adding_product') ?></div>
                                <div class="panel-body" style="padding: 5px;">
                                    <?php if (!$Settings->restrict_user || $Owner || $Admin) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?= lang("warehouse", "slwarehouse"); ?>
                                                <?php
                                                $wh[''] = '';
                                                foreach ($warehouses as $warehouse) {
                                                    $wh[$warehouse->id] = $warehouse->name;
                                                }
                                                echo form_dropdown('warehouse', $wh, (isset($_POST['warehouse']) ? $_POST['warehouse'] : $Settings->default_warehouse), 'id="slwarehouse" class="form-control input-tip select" data-placeholder="' . lang("select") . ' ' . lang("warehouse") . '" required="required" style="width:100%;" ');
                                                ?>
                                            </div>
                                        </div>
                                    <?php } else {
                                        $warehouse_input = array(
                                            'type' => 'hidden',
                                            'name' => 'warehouse',
                                            'id' => 'slwarehouse',
                                            'value' => $this->session->userdata('warehouse_id'),
                                        );

                                        echo form_input($warehouse_input);
                                    } ?>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?= lang("customer", "customer"); ?>
                                            <?php if ($Owner || $Admin || $GP['customers-add']) { ?><div class="input-group"><?php } ?>
                                                <?php
                                                echo form_input('customer', (isset($_POST['customer']) ? $_POST['customer'] : ""), 'id="customer" data-placeholder="' . lang("select") . ' ' . lang("customer") . '" required="required" class="form-control input-tip" style="width:100%;"');
                                                ?>
                                                <?php if ($Owner || $Admin || $GP['customers-add']) { ?>
                                                <div class="input-group-addon no-print" style="padding: 2px 5px;"><a
                                                        href="<?= site_url('customers/add'); ?>" id="add-customer"
                                                        class="external" data-toggle="modal" data-target="#myModal"><i
                                                            class="fa fa-2x fa-plus-circle" id="addIcon"></i></a></div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        
               
                
                <div class="col-md-12" id="sticker">
                    <div class="well well-sm">
                        <div class="form-group" style="margin-bottom:0;">
                            <div class="input-group wide-tip">
                                <div class="input-group-addon" style="padding-left: 10px; padding-right: 10px;">
                                    <i class="fa fa-2x fa-barcode addIcon"></i></a></div>
                                <?php echo form_input('add_item', '', 'class="form-control input-lg" id="add_item" placeholder="' . lang("add_product_to_order") . '"'); ?>
                                <?php if ($Owner || $Admin || $GP['products-add']) { ?>
                                <div class="input-group-addon" style="padding-left: 10px; padding-right: 10px;">
                                    <a href="#" id="addManually" class="tip" title="<?= lang('add_product_manually') ?>">
                                        <i class="fa fa-2x fa-plus-circle addIcon" id="addIcon"></i>
                                    </a>
                                </div>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="control-group table-group">
                        <label class="table-label"><?= lang("order_items"); ?> *</label>

                        <div class="controls table-controls">
                            <table id="slTable"
                                   class="table items table-striped table-bordered table-condensed table-hover">
                                <thead>
                                <tr>
                                    <th class="col-md-6"><?= lang("product_name") . " (" . lang("product_code") . ")"; ?></th>


                                    <th class="col-md-4"><?= lang("quantity"); ?></th>
                                   
                                    <th style="width: 30px !important; text-align: center;"><i
                                            class="fa fa-trash-o"
                                            style="opacity:0.5; filter:alpha(opacity=50);"></i></th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                 <div class="clearfix"></div>
                    <div class="col-md-12">
                            <div class="form-group">
                                <?= lang("note", "ponote"); ?>
                                <?php echo form_textarea('note', (isset($_POST['note']) ? $_POST['note'] : ""), 'class="form-control" id="ponote" style="margin-top: 10px; height: 100px;"'); ?>
                            </div>
                    </div>
        </div>

                <div class="col-md-12">

                  

                    <div class="form-group">
                        <?php echo form_submit('add_challan', $this->lang->line("submit"), 'id="add_challan" class="btn btn-primary"'); ?>
                        <button type="button" class="btn btn-danger" id="reset"><?= lang('reset') ?>
                    </div>

                </div>
                
        <?php echo form_close(); ?>
            </div>

        </div>
    </div>

<!--edit -->
<div class="modal" id="prModal" tabindex="-1" role="dialog" aria-labelledby="prModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i
                            class="fa fa-2x">&times;</i></span><span class="sr-only"><?=lang('close');?></span></button>
                <h4 class="modal-title" id="prModalLabel"></h4>
            </div>
            <div class="modal-body" id="pr_popover_content">
                <form class="form-horizontal" role="form">
                    
                    <div class="form-group">
                        <label for="pquantity" class="col-sm-4 control-label"><?= lang('quantity') ?></label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="pquantity">
                        </div>
                    </div>
                    
                    
                    <input type="hidden" id="old_qty" value=""/>
                    <input type="hidden" id="row_id" value=""/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editItem"><?= lang('submit') ?></button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="mModal" tabindex="-1" role="dialog" aria-labelledby="mModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i
                            class="fa fa-2x">&times;</i></span><span class="sr-only"><?=lang('close');?></span></button>
                <h4 class="modal-title" id="mModalLabel"><?= lang('add_product_manually') ?></h4>
            </div>
            <div class="modal-body" id="pr_popover_content">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="mcode" class="col-sm-4 control-label"><?= lang('product_code') ?> *</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mcode">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mname" class="col-sm-4 control-label"><?= lang('product_name') ?> *</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mname">
                        </div>
                    </div>
                    <?php if ($Settings->tax1) { ?>
                        <div class="form-group">
                            <label for="mtax" class="col-sm-4 control-label"><?= lang('product_tax') ?> *</label>

                            <div class="col-sm-8">
                                <?php
                                $tr[""] = "";
                                foreach ($tax_rates as $tax) {
                                    $tr[$tax->id] = $tax->name;
                                }
                                echo form_dropdown('mtax', $tr, "", 'id="mtax" class="form-control input-tip select" style="width:100%;"');
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="mquantity" class="col-sm-4 control-label"><?= lang('quantity') ?> *</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mquantity">
                        </div>
                    </div>
                    <?php if ($Settings->product_discount) { ?>
                        <div class="form-group">
                            <label for="mdiscount"
                                   class="col-sm-4 control-label"><?= lang('product_discount') ?></label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="mdiscount">
                            </div>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="mprice" class="col-sm-4 control-label"><?= lang('unit_price') ?> *</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mprice">
                        </div>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width:25%;"><?= lang('net_unit_price'); ?></th>
                            <th style="width:25%;"><span id="mnet_price"></span></th>
                            <th style="width:25%;"><?= lang('product_tax'); ?></th>
                            <th style="width:25%;"><span id="mpro_tax"></span></th>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addItemManually"><?= lang('submit') ?></button>
            </div>
        </div>
    </div>
</div>





