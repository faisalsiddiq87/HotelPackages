"use strict";

// Class Definition
var KTPackageForm = function() {

   var handleFormSubmit = function() {
      $.validator.addMethod("currency", function (value, element) {   
         return this.optional(element) ||  /^\d{0,4}(\.\d{0,2})?$/.test(value); 
      }, "Please specify a valid amount");

      $('#kt_package_submit').click(function(e) {
         e.preventDefault();
         var btn = $(this);
         var form = $(this).closest('form');     
         form.validate({
            rules: {
               name: {
                  required: true
               },
               hotel_id: {
                  required: true
               },
               price: {
                  required: true,
                  currency: true
               },
               duration: {
                  required: true
               },
               validity: {
                  required: true
               }
            }
         });

         if (!form.valid()) {
            return;
         }

         btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
         var url = `/api/package`;
         var type = `POST`;
         var id = $("#id").val();
         if (id) {
            url += `/${id}`;
            type = `PUT`;
         }

         form.ajaxSubmit({
            url: url,
            type: type,
            data: form.serialize(), 
            success: function(response, status, xhr, $form) {
               // similate 2s delay
               setTimeout(function() {
                  btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                  form.clearForm();
                  form.validate().resetForm();
                  var msg = 'Hotel Package has been Added succesfully.';
                  if (id) {
                     msg = 'Hotel Package has been Updated succesfully.';
                  } 
                  alert(msg);
                  window.location = '/';
               }, 2000);
            }
         });
      });
  }

  var getAllHotels = function() {
     var hotelId =  $("#hotel_key").val(); 
      $.ajax({
         url : "/api/package/hotels",
         type:'GET',
         success: function(response) {
            console.log(response);
            $.each(response.data,function(key, value) {
               setTimeout(function() {
                  var option = '<option value=' + value.id + '>' + value.name + '</option>';
                  if (hotelId == value.id) {
                     option = '<option selected value=' + value.id + '>' + value.name + '</option>'
                  } 
                  $("#hotel_id").append(option);
               }, 500);
            });
         }
      });
  }

   return {
      init: function() {
         handleFormSubmit();
         getAllHotels();
      }
   };

}();


$(function() {
   KTPackageForm.init();
});