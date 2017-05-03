/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    
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
		slitems[item_id].row.qty = parseFloat(slitems[item_id].row.qty) + 1;
	} else {
		slitems[item_id] = item;
	}

	localStorage.setItem('slitems', JSON.stringify(slitems));
	loadItems();
	return true;
}

