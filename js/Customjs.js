$(document).ready(function(){  
      $('#location').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"search.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#countryList').fadeIn();  
                          $('#countryList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.app li', function(){  
           $('#location').val($(this).text());  
           $('#countryList').fadeOut();  
      });  


      $('#des').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"search2.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#destinationList').fadeIn();  
                          $('#destinationList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.app2 li', function(){  
           $('#des').val($(this).text());  
           $('#destinationList').fadeOut();  
      });
 
      


     var modalDialog = $(this).find(".modal-dialog");
        /* Applying the top margin on modal dialog to align it vertically center */
        modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 3));
    
    // Align modal when it is displayed
    $(".modal").on("shown.bs.modal", alignModal);
    
    // Align modal when user resize the window
    $(window).on("resize", function(){
        $(".modal:visible").each(alignModal);
    }); 




 });  