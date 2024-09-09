<form id="enquiry_form" method="post">
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
            alert('Form submitted');
        });
    });
</script>