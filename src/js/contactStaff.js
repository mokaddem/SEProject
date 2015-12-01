$(function() {

    $("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var dest = $("input#dest").val();
            var sujet = $("input#sujet").val();
            var message = $("textarea#message").val();
             // For Success/Failure Message
            $.ajax({
                url: "././mail/contact_staff.php",
                type: "POST",
                data: {
                    dest: dest,
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
                        .append("<strong>Votre message à été envoyé. </strong>");
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
$('#dest').focus(function() {
    $('#contactStaff').html('');
});
