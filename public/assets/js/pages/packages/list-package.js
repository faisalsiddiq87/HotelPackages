"use strict";

// Class Definition
var KTListPackage = function() {
    var grid = "";
    var listPackages = function() {      
        grid = $("#list_data").DataTable({
            "processing": true,
            "ajax": {
                url :  'api/package',
                type : "GET",
                dataSrc: function(data) {
                    let apiData = [];
                    $.each(data.original.data, function(index, entry) {
                        apiData.push({
                            name:entry.name, id:entry.id, hotel_name: entry.hotel.name, 
                            price:entry.price, duration:entry.duration, validity:entry.validity, 
                            action: `<a href="/package/view/${entry.id}" class="editor_edit"><i class="fa fa-eye"></i></a> <a href="/package/create/${entry.id}" class="editor_edit"><i class="fa fa-edit"></i></a> <a href="javascript:void(0);" onClick="return KTListPackage.deleteRow(${entry.id});" class="editor_remove"><i class="fa fa-trash"></i></a>`
                        });
                    });
                    return apiData;
                },
            },
            "columns": [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'hotel_name', name: 'hotel_name'},
                {data: 'price', name: 'price'},
                {data: 'duration', name: 'duration'},
                {data: 'validity', name: 'validity'},    
                {data: 'action', name: 'action', sorting: false},
            ]
        });
    } 

    var deleteRow = function(id) {
        var isConfirmed = confirm("Are you sure you want to delete?");
        if (isConfirmed) {
            $.ajax({
                url: `/api/package/${id}`,
                type: 'DELETE',
                success: function() {
                   alert("Package has been deleted");
                   grid.ajax.reload();
                }
            });
        }
    }

    return {
        init: function() {
            listPackages();
        },
        deleteRow: function(id) {
            deleteRow(id);
        }
    };
}();


$(function() {
    KTListPackage.init();
});