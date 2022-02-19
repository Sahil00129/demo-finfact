$(document).ready(function (e) {

    $('#new_item_master').submit(function(e) {
        //alert('hii');return false;
       e.preventDefault();
       var formData = new FormData(this);
       var myfile = jQuery('#myCsv').val();
       var itype = jQuery('#itype').val();
       var identity = jQuery('#identity').val();
       var client = jQuery('#client').val();
      if (!itype) {
       swal("Error!", "Please select import type", "error");
       return false;
      }
    if (!identity) {
      swal("Error!", "No file, please select identity", "error");
      return false;
    }
    if (!client) {
      swal("Error!", "No file, please select client", "error");
      return false;
    }
    if (!myfile) {
      swal("Error!", "No file, please upload an import file", "error");
      return false;
    }
              //alert (this);
              $.ajax({
                    url: "/import", 
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'POST',  
                    data:new FormData(this),
                    processData: false,
                    contentType: false,
                    beforeSend: function(){
                         $(".indicator-progress").show(); 
                         $(".indicator-label").hide();
                      
                       },
                      success: (data) => {
                          $(".indicator-progress").hide();
                          $(".indicator-label").show();   
                          $('#new_item_master').trigger('reset');
                        //this.reset();
                        //console.log(data.ignoredItems);
                        //console.log(data.ignoredcount);
                        if(data.import_type == 1) { 
                        
                          swal("Success!", "File has been imported successfully", "success");
                          window.location.href = "itemMaster-table";
                        }else if(data.import_type == 2) {
                         
                          swal("Success!", "File has been imported successfully", "success");
                          window.location.href = "saleData-table";
                        }else if(data.import_type == 3) {
                         
                          swal("Success!", "File has been imported successfully", "success");
                          window.location.href = "purchaseData-table";
                        }else if(data.import_type == 4) {
                         
                          swal("Success!", "File has been imported successfully", "success");
                          window.location.href = "import-data";
                        }else if(data.import_type == 5) {
                         
                          swal("Success!", "File has been imported successfully", "success");
                          window.location.href = "import-data";
                         }else{

                          swal("Error", data.messages, "error");
                      }
                      
                      }
              });
          });
///////////////////////////////////////////////////////////////////
          $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
          $('#igroup').on('change', function() {
            $('#ipacking').empty(); 
           var selected = this.value; 
           var fd = new FormData();
           fd.append('group', selected);
            $.ajax({
              type:'POST',
              url: "/filter-items",  
              data: fd,
              cache:false, 
              contentType: false,
              processData: false,
              success: (data) => {
              console.log(data);
              if(data.success === true) {
                //alert(data.messages);
               var sObj = data.messages;
               $.each(data.messages, function (index, value) {
                // APPEND OR INSERT DATA TO SELECT ELEMENT.
                
                $('#ipacking').append('<option value="' + value.pack + '">' + value.pack + '</option>');
                });
              }
              else{
              swal("error!", data.messages, "error");
              }
            }
          });
          });
/////////////////////////////group////////////////////
  //alert('h'); die;
  $('#add-group').submit(function(e) {
    e.preventDefault();
  //alert (this); die;
    $.ajax({
        url: "/add-group", 
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',  
        data:new FormData(this),
        processData: false,
        contentType: false,
                  beforeSend: function(){
                  $(".indicator-progress").show(); 
                  $(".indicator-label").hide();
                   },
        success: (data) => {
                    $(".indicator-progress").hide();
                    $(".indicator-label").show();
                   $('#sender').trigger('reset');
                    //this.reset();
                    //console.log(data.ignoredItems); 
                    //console.log(data.ignoredcount);
                    if(data.success === true) { 
                        swal("Success!", "Data has been Submitted successfully", "success");
                        
                      }
                        else{
                    swal("Error!", data.messages, "error");
                    
                    }
                    }        
    }); 
  });	

  ////////////////Add Identity//////////////
  $('#add-identity').submit(function(e) {
    e.preventDefault();
  //alert (this); die;
    $.ajax({
        url: "/add-identity", 
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',  
        data:new FormData(this),
        processData: false,
        contentType: false,
                  beforeSend: function(){
                  $(".indicator-progress").show(); 
                  $(".indicator-label").hide();
                   },
        success: (data) => {
                    $(".indicator-progress").hide();
                    $(".indicator-label").show();
                   $('#sender').trigger('reset');
                    //this.reset();
                    //console.log(data.ignoredItems); 
                    //console.log(data.ignoredcount);
                    if(data.success === true) { 
                        swal("Success!", "Data has been Submitted successfully", "success");
                        
                      }
                        else{
                    swal("Error!", data.messages, "error");
                    
                     }
                    }
                    
    }); 
  });	
  ////////////Add Identity Client
  $('#add-identity-client').submit(function(e) {
        e.preventDefault(); 
        //alert (this); die;
        $.ajax({
             url: "/add-identity-client", 
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             type: 'POST',  
             data:new FormData(this),
             processData: false,
             contentType: false,
                  beforeSend: function(){
                  $(".indicator-progress").show(); 
                  $(".indicator-label").hide();
                   },
         success: (data) => {
                    $(".indicator-progress").hide();
                    $(".indicator-label").show();
                   $('#sender').trigger('reset');
                    //this.reset();
                    //console.log(data.ignoredItems); 
                    //console.log(data.ignoredcount);
                    if(data.success === true) { 
                        swal("Success!", "Data has been Submitted successfully", "success");
                        
                      }
                        else{
                    swal("Error!", data.messages, "error");
                    
                    }
          }
                    
    }); 
  });	

  ////////////////////////////////////////////////
 $('#client_sites').submit(function(e) {
   // alert('h');
    e.preventDefault();
  
    $.ajax({
        url: "/creat-client", 
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',  
        data:new FormData(this),
        processData: false,
        contentType: false,
                  beforeSend: function(){
                  $(".indicator-progress").show(); 
                  $(".indicator-label").hide();
                   },
               success: (data) => {
                    $(".indicator-progress").hide();
                    $(".indicator-label").show();
                    $('#sender').trigger('reset');
                    //this.reset();
                    //console.log(data.ignoredItems); 
                    //console.log(data.ignoredcount);
                    if(data.success === true) { 
                        swal("Success!", "Data has been Submitted successfully", "success");
                        window.location.href = "/comapny-group";
                      }
                        else{
                    swal("Error!", data.messages, "error");
                    }
                    
                    }       
    }); 
  });  

  $('#identity-client-site').submit(function(e) {
    // alert('h');
     e.preventDefault();
   
     $.ajax({
         url: "/add-identity-sites", 
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         type: 'POST',  
         data:new FormData(this),
         processData: false,
         contentType: false,
                   beforeSend: function(){
                   $(".indicator-progress").show(); 
                   $(".indicator-label").hide();
                    },
         success: (data) => {
                     $(".indicator-progress").hide();
                     $(".indicator-label").show();
                    $('#sender').trigger('reset');
                     //this.reset();
                     //console.log(data.ignoredItems); 
                     //console.log(data.ignoredcount);
                     if(data.success === true) { 
                         swal("Success!", "Data has been Submitted successfully", "success");
                       
                       }
                         else{
                     swal("Error!", data.messages, "error");
                     }
                     
                     }       
     }); 
   });  
});


      