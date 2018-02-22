jQuery(document).ready(function($) {
    console.log("hello");
    $("#newsletter").submit(function(e) {
        e.preventDefault();

            var email = $('#newsletter input[name="email"]').val();
            $.ajax({
                url: postnewsletter.ajax_url,
                type: "POST",
                dataType: "JSON",
                data : {
                         action : 'saveEmail',
                         email : email,
                     },
                success: function(jsonStr)
                {
                    console.log(jsonStr);
                     if (jsonStr["success"] == "true") {
                        $( "#newsletter .message" ).empty();
                        $( "#newsletter .message" ).append( "Paldies :)" );
                     }
                     if (jsonStr["exists"] == "true") {
                        $( "#newsletter .message" ).empty();
                        $( "#newsletter .message" ).append( "Šis epasts jau tiek izmantots" );
                     }
                }
            });
        
            


    });
    
    
});