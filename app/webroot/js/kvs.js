//JavaScript Relating to KVS
function submitCheckBoxes() {
	
}

function copyOption(newValue, className) {
	var query = "."+className;
	$(query).each(function(index, element){
		$(element).val(newValue);
	});
}

function addNewOutgoingItemRow() {
	$("#itemsTable tbody tr:last-child").clone().appendTo('#itemsTable tbody')
	$("#itemsTable tbody tr:last-child input, #itemsTable tbody tr:last-child select").each(function() { 
		var element = $(this);
		var nameAttr = element.attr('name');
		var idAttr = element.attr('id');
		var newIndex = parseInt(nameAttr.replace(/[^\d+]/g, ''))+1;
		element.attr('name',nameAttr.replace(/\d+/,newIndex));
		element.attr('id',idAttr.replace(/\d+/,newIndex));
		if(element[0]['localName'] == 'input') {
			element.val('');
		}
	});
}

function setOutgoingItemInformation(value, isBarcode, elementId ){
	var requestData;
	var rowNumber = parseInt(elementId.replace(/[^\d+]/g, ''));
	if(isBarcode == true) {
		requestData = { "barcode": value };
	} else {
		requestData = { "inventory_item": value};
	}
	//if(requestData == ""){
		//updateItemRow(rownumber, "");
	//} else {
	$.ajax({
		url: "ajaxGetInventoryItem",
		type: "POST",
		dataType: "JSON",
		data: requestData,
		success: function(data){              
			   updateItemRow(rowNumber, data);
		}
	});
	//}
//InventoryOutgoingItemNew1InventoryItem
//InventoryOutgoingItemNew1Barcode

function updateItemRow(rowNumber, itemInformation){
	var barcodeElement = $("#InventoryOutgoingItemNew" + rowNumber + "Barcode");
	var warehouseElement = $("#InventoryOutgoingItemNew" + rowNumber + "Warehouse");
	
	barcodeElement.val(itemInformation[0]["InventoryItem"]["barcode"]);
	warehouseElement.val(itemInformation[0]["Warehouse"]["id"]);
}

/* Array[1]
0: Object
	Inventory: Object
	InventoryItem: Object
		active: true
		barcode: "94575641"
	Warehouse: Object
		created: "2014-04-02 13:04:56"
		id: "10"
		location: "Jeff's Hall in the country"
		modified: "2014-04-02 13:04:56"
		name: "Hall"
		warehouse_type_id: "1"*/


	
}