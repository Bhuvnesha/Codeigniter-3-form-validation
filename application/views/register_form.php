<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Register</h1>
    <!-- Flash message container -->
    <div id="flash-message"></div>

    <!-- Registration Form -->
    <form id="register-form">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <button type="submit">Register</button>
    </form>

    <script>
        $(document).ready(function() {
            // Handle form submission
            $('#register-form').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                // Send AJAX request
                $.ajax({
                    url: '<?php echo site_url("index.php/user/register_ajax"); ?>',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            // Display success message
                            $('#flash-message').html('<div style="color: green;">' + response.message + '</div>');
                            $('#username, #password, #email').val('');
                        } else {
                            // Display error messages
                            $('#flash-message').html('<div style="color: red;">' + response.message + '</div>');
                        }
                    },
                    error: function() {
                        $('#flash-message').html('<div style="color: red;">An error occurred. Please try again.</div>');
                    }
                });
            });
        });
    </script>
</body>
</html>