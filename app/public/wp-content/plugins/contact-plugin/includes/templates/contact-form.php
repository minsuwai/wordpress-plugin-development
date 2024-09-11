<?php if(get_plugin_options('contact_plugin_active')): ?>

<div id="form_success" style="background: green; color: #FFF;"></div>
<div id="form_error" style="background: red; color: #FFF;"></div>

<form id="enquiry_form" method="post">

    <?php wp_nonce_field('wp_rest'); ?>

    <label for="">Name</label><br>
    <input type="text" name="name"><br><br>
    <label for="">Email</label><br>
    <input type="text" name="email"><br><br>
    <label for="">Phone</label><br>
    <input type="text" name="phone"><br><br>
    <label for="">Your Message</label><br>
    <textarea name="message" id=""></textarea><br><br>

    <button type="submit">Submit form</button>
</form>

<!-- Include jQuery before using it -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        $("#enquiry_form").submit(function(event) {

            event.preventDefault();

            var form = $(this);

            console.log(form.serialize());

            $.ajax({
                type: "POST",
                url: "<?php echo get_rest_url(null, 'my-plugin/v1/contact-form/submit'); ?>",
                data: form.serialize(),
                success: function(res) {
                    form.hide();
                     $("#form_success").html(res).fadeIn();
                },
                error: function() {
                    $("#form_error").html("There was an error submitting your form").fadeIn();
                }
            });

        });
    });
</script>

<?php else: ?>

This form is not active

<?php endif; ?>