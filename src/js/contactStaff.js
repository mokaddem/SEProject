$(function() {

    $("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM 
            // var name = $("input#name").val(); REGARDER COMMENT RECEVOIR TOUT LES DESTINATAIRES
            var sujet = $("input#sujet").val();
            var message = $("textarea#message").val();
             // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "././mail/contact_staff.php",
                type: "POST",
                data: {
                    //name: name,
                    sujet: sujet,
                    message: message
                },
                cache: false,
                success: function() {
                    // Success message
                    $('#contactStaff').html("<div class='alert alert-success'>");
                    $('#contactStaff > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#contactStaff > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#contactStaff > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#conStaff').trigger("reset");
                },
                error: function() {
                    // Fail message
                    $('#contactStaff').html("<div class='alert alert-danger'>");
                    $('#contactStaff > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#contactStaff > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#contactStaff > .alert-danger').append('</div>');
                    //clear all fields
                    $('#conStaff').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});


/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
    $('#contactStaff').html('');
});
