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
    <?php if ($this->session->flashdata('error')): ?>
        <div style="color: red;">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')): ?>
        <div style="color: green;">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <!-- Registration Form -->
    <form id="register-form" method="POST" action="<?php echo base_url('index.php/User/register_action'); ?>">
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

    
</body>
</html>