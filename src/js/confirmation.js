$(function() {

    $("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var name = $("input#InputNom1").val();
            var email = $("input#InputEmailFirst1").val();
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "././mail/confirmation.php",
                type: "POST",
                data: {
                    name: name,
                    email: email
                },
                cache: false,
                success: function() {
                    // Success message
                    $('#successConfirm').html("<div class='alert alert-success'>");
                    $('#successConfirm > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successConfirm > .alert-success')
                        .append("<strong>Un email de confirmation a été envoyé. </strong>");
                    $('#successConfirm > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#confirmForm').trigger("reset");
                },
                error: function() {
                    // Fail message
                    $('#successConfirm').html("<div class='alert alert-danger'>");
                    $('#successConfirm > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#successConfirm > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#successConfirm > .alert-danger').append('</div>');
                    //clear all fields
                    $('#confirmForm').trigger("reset");
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
$('#InputNom1').focus(function() {
    $('#successConfirm').html('');
});
