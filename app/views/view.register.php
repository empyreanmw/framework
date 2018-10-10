<?php
include __DIR__ . '/header.php';
?>
<body>
<div class="flex-center position-ref full-height">
    <div class="top-right links">
        <a href="/home">Home</a>
        <a href="/login">Login</a>
    </div>
<div class="content">
    <form method="POST" action="register">
    <div class="m-b-md">
            <label for="username">Username</label>
            <input type="text" name="username"><br>
        </div><br>
    <div class="m-b-md">
        <label for="password">Password</label>
        <input type="password" name="password"><br>
    </div>
        <div class="m-b-md">
            <label for="password">Email</label>
            <input type="input" name="email"><br>
        </div>
        <?php echo token() ?>
    <div class="m-b-md">
        <button type="submit">Register</button>
    </div><br>
        <?php foreach ($errors as $error){
            echo '<span style="color:red">'.$error.'</span><br>';
        } ?>

</form>
    </div>
</div>
</body>
