<?php
/*echo '<pre>';
print_r($cln);print_r($cln_items);
echo '</pre>';
die();*/
?>
<script type="text/javascript">
    var count = 1, an = 1,product_tax = 0, invoice_tax = 0, total_discount = 0, total = 0, shipping = 0;
    var audio_success = new Audio('<?=$assets?>sounds/sound2.mp3');
    var audio_error = new Audio('<?=$assets?>sounds/sound3.mp3');
    var tax_rates = <?php echo json_encode($tax_rates); ?>;
    $(document).ready(function () {
        <?php  if ($cln) {    ?>
                
        localStorage.setItem('challan_date', '<?= date($dateFormats['php_ldate'], strtotime($cln->challan_date))?>');
        localStorage.setItem('dispatch_date', '<?= date($dateFormats['php_ldate'], strtotime($cln->dispatch_date))?>');
        localStorage.setItem('challan_no', '<?=$cln->challan_no?>');
        localStorage.setItem('poref', '<?=$cln->reference_no?>');
        localStorage.setItem('ponote', '<?= str_replace(array("\r", "\n"), "", $this->sma->decode_html($cln->note)); ?>');
        localStorage.setItem('challan_name', '<?=$cln->challan_name?>');
        localStorage.setItem('slcustomer', '<?=$cln->customer_id?>');
        localStorage.setItem('slitems', JSON.stringify(<?=$cln_items;?>));
        localStorage.setItem('slwarehouse', '<?=$cln->warehouse_id?>');
        
      //loadItems();
        <?php } ?>
           
        <?php if ($Owner || $Admin) { ?>
        $(document).on('change', '#challan_date', function (e) {
            localStorage.setItem('challan_date', $(this).val());
        });
        if (challan_date = localStorage.getItem('challan_date')) {
            $('#challan_date').val(challan_date);
        }
        
         $(document).on('change', '#challan_name', function (e) {
            localStorage.setItem('challan_name', $(this).val());
        });
        if (challan_name = localStorage.getItem('challan_name')) {
            $('#challan_name').val(challan_name);
        }
        
        $(document).on('change', '#dispatch_date', function (e) {
            localStorage.setItem('dispatch_date', $(this).val());
        });
        if (dispatch_date = localStorage.getItem('dispatch_date')) {
            $('#dispatch_date').val(dispatch_date);
        }
        
        $('#poref').change(function (e) {
            localStorage.setItem('poref', $(this).val());
        });
        if (poref = localStorage.getItem('poref')) {
            $('#poref').val(poref);
        }
        
        <?php } ?>
        
        ItemnTotals();
        $("#add_item").autocomplete({
            source: function (request, response) {
                
                if (!$('#slcustomer').val()) {
                    $('#add_item').val('').removeClass('ui-autocomplete-loading');
                    bootbox.alert('<?=lang('select_above');?>');
                    $('#add_item').focus();
                    return false;
                }
                $.ajax({
                    type: 'get',
                    url: '<?= site_url('quotes/suggestions'); ?>',
                    dataType: "json",
                    data: {
                        term: request.term,
                        warehouse_id: $("#slwarehouse").val(),
                        customer_id: $("#slcustomer").val()
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
     var $slcustomer = $('#slcustomer');
    $slcustomer.change(function (e) {
        localStorage.setItem('slcustomer', $(this).val());
    });
    if (slcustomer = localStorage.getItem('slcustomer')) {
        $slcustomer.val(slcustomer).select2({
            minimumInputLength: 1,
            data: [],
            initSelection: function (element, callback) {
                $.ajax({
                    type: "get", async: false,
                    url: site.base_url+"customers/getCustomer/" + $(element).val(),
                    dataType: "json",
                    success: function (data) {
                        callback(data[0]);
                    }
                });
            },
            ajax: {
                url: site.base_url + "customers/suggestions",
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
    } else {
        nsCustomer();
    }
    // If there is any item in localStorage
    //if (localStorage.getItem('slitems')) {
        loadItems();
    //}
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
            if ($('#slwarehouse').val() && $('#slcustomer').val()) {
                $('#slcustomer').select2("readonly", true);
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

        $(window).bind('beforeunload', function (e) {
            $.get('<?= site_url('welcome/set_data/remove_quls/1'); ?>');
            if (count > 1) {
                var message = "You will loss data!";
                return message;
            }
        });
        $('#reset').click(function (e) {
            $(window).unbind('beforeunload');
        });
        $('#edit_quote').click(function () {
            $(window).unbind('beforeunload');
            $('form.edit-qu-form').submit();
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
        slitems[item_id].row.qty = new_qty;
        localStorage.setItem('slitems', JSON.stringify(slitems));
        loadItems();
    });
    /* -----------------------
     * Edit Row Method
     ----------------------- */
     $(document).on('click', '#editItem', function () {
        var row = $('#' + $('#row_id').val());
        var item_id = row.attr('data-item-id');
       
       
        slitems[item_id].row.qty = parseFloat($('#pquantity').val()),
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
     $('#reset').click(function (e) {
            $(window).unbind('beforeunload');
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
                    if (localStorage.getItem('slcustomer')) {
                        localStorage.removeItem('slcustomer');
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

    $(document).on('change', '#mprice, #mtax, #mdiscount', function () {
        var unit_price = parseFloat($('#mprice').val());
        var ds = $('#mdiscount').val() ? $('#mdiscount').val() : '0';
        if (ds.indexOf("%") !== -1) {
            var pds = ds.split("%");
            if (!isNaN(pds[0])) {
                item_discount = parseFloat(((unit_price) * parseFloat(pds[0])) / 100);
            } else {
                item_discount = parseFloat(ds);
            }
        } else {
            item_discount = parseFloat(ds);
        }
        unit_price -= item_discount;
        var pr_tax = $('#mtax').val(), item_tax_method = 0;
        var pr_tax_val = 0, pr_tax_rate = 0;
        if (pr_tax !== null && pr_tax != 0) {
            $.each(tax_rates, function () {
                if(this.id == pr_tax){
                    if (this.type == 1) {

                        if (item_tax_method == 0) {
                            pr_tax_val = formatDecimal(((unit_price) * parseFloat(this.rate)) / (100 + parseFloat(this.rate)));
                            pr_tax_rate = formatDecimal(this.rate) + '%';
                            unit_price -= pr_tax_val;
                        } else {
                            pr_tax_val = formatDecimal(((unit_price) * parseFloat(this.rate)) / 100);
                            pr_tax_rate = formatDecimal(this.rate) + '%';
                        }

                    } else if (this.type == 2) {

                        pr_tax_val = parseFloat(this.rate);
                        pr_tax_rate = this.rate;

                    }
                }
            });
        }

        $('#mnet_price').text(formatMoney(unit_price));
        $('#mpro_tax').text(formatMoney(pr_tax_val));
    });

    });
     function add_challan_item(item) {

        
	if (count == 1) {
		slitems = {};
		if ($('#slwarehouse').val() && $('#slcustomer').val()) {
			$('#slcustomer').select2("readonly", true);
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
            slitems[item_id].row.qty = parseFloat(slitems[item_id].row.qty) + 1;
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
                //slitems = JSON.parse(localStorage.getItem('slitems'));
                slitems = JSON.parse(localStorage.getItem('slitems'));
                $('#edit_challan').attr('disabled', false); 
		$.each(slitems, function () {
                   
			var item = this;
                        
                     
                        var item_id = site.settings.item_addition == 1 ? item.item_id : item.id;
			slitems[item_id] = item;
                        
                        var product_id = item.row.id,item_name =  item.row.name ,  item_qty = item.row.qty,item_label =  item.label,item_code= item.row.code;
                       
                        var row_no = (new Date).getTime();
			var newTr = $('<tr id="row_' + row_no + '" class="row_' + item_id + '" data-item-id="' + item_id + '"></tr>');
                        tr_html = '<td><input name="product_id[]" type="hidden" class="rid" value="' + product_id + '"><input name="product[]" type="hidden" class="rcode" value="' + item_code + '"><input name="product_name[]" type="hidden" class="rname" value="' + item_name + '"><span class="sname" id="name_' + row_no + '">' + item_name + ' (' + item_code + ')</span> <i class="pull-right fa fa-edit tip pointer edit" id="' + row_no + '" data-item="' + item_id + '" title="Edit" style="cursor:pointer;"></i></td>';
                        tr_html += '<td><input class="form-control text-center rquantity" name="quantity[]" type="text" value="' + item_qty + '" data-id="' + row_no + '" data-item="' + item_id + '" id="quantity_' + row_no + '" onClick="this.select();"></td>';
			tr_html += '<td class="text-center"><i class="fa fa-times tip pointer qudel" id="' + row_no + '" title="Remove" style="cursor:pointer;"></i></td>';
			 
                            
                        newTr.html(tr_html);
                        
                        newTr.prependTo("#slTable");
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
			$('#slcustomer').select2("readonly", true);
			$('#slwarehouse').select2("readonly", true);
		}
		//audio_success.play();
	}
}
/* -----------------------
 * Misc Actions
 ----------------------- */

// hellper function for customer if no localStorage value
function nsCustomer() {
    $('#slcustomer').select2({
        minimumInputLength: 1,
        ajax: {
            url: site.base_url + "customers/suggestions",
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
        <h2 class="blue"><i class="fa-fw fa fa-edit"></i><?= lang('edit_challan'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?php echo lang('enter_info'); ?></p>
                <?php
                $attrib = array('role' => 'form');
                echo form_open_multipart("products/editChallan/" . $id, $attrib)
                ?>
                <div class="row">
                  
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= lang("reference_no", "poref"); ?>
                                <?php echo form_input('reference_no', (isset($_POST['reference_no']) ? $_POST['reference_no'] : $ponumber), 'class="form-control input-tip" id="poref"'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <?= lang("challan_name", "challan_name"); ?>
                                    <?php echo form_input('challan_name', (isset($_POST['challan_name']) ? $_POST['challan_name'] : ''), 'class="form-control input-tip" id="challan_name" required="required"'); ?>
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
                                     <?php if ($Owner || $Admin) { ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?= lang("warehouse", "slwarehouse"); ?>
                                                <?php
                                                $wh[''] = '';
                                                foreach ($warehouses as $warehouse) {
                                                    $wh[$warehouse->id] = $warehouse->name;
                                                }
                                                echo form_dropdown('warehouse', $wh, (isset($_POST['warehouse']) ? $_POST['warehouse'] : $cln->warehouse_id), 'id="slwarehouse" class="form-control input-tip select" data-placeholder="' . $this->lang->line("select") . ' ' . $this->lang->line("warehouse") . '" required="required" style="width:100%;" ');
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
                                            <?= lang("customer", "slcustomer"); ?>
                                            <?php
                                            echo form_input('customer', (isset($_POST['customer']) ? $_POST['customer'] : ""), 'id="slcustomer" data-placeholder="' . $this->lang->line("select") . ' ' . $this->lang->line("customer") . '" required="required" class="form-control input-tip" style="width:100%;"');
                                            ?>
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
                                  <?= form_textarea('note', (isset($_POST['ponote']) ? $_POST['ponote'] :($cln ? $this->sma->decode_html($cln->note) : '')), 'class="form-control" id="ponote" style="margin-top: 10px; height: 100px;"'); ?>
                            </div>
                        </div>
                        <input type="hidden" name="total_items" value="" id="total_items" required="required"/>

                       
                        <div class="col-sm-12">
                            <div
                                class="fprom-group"><?php echo form_submit('edit_challan', $this->lang->line("submit"), 'id="edit_challan" class="btn btn-primary" style="padding: 6px 15px; margin:15px 0;"'); ?>
                                <button type="button" class="btn btn-danger" id="reset"><?= lang('reset') ?></div>
                        </div>
                    </div>
                </div>
               
                <?php echo form_close(); ?>

            </div>

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


