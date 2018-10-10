<?php
include __DIR__ . '/header.php';
?>
<body>
<div class="flex-center position-ref full-height">
    <div class="top-right links">
        <a href="/home">Home</a>
        <a href="/register">Register</a>
    </div>
    <div class="content">
        <form method="POST" action="login">
            <div class="m-b-md">
                <label for="username">Username</label>
                <input type="text" name="username"><br>
            </div><br>
            <div class="m-b-md">
                <label for="password">Password</label>
                <input type="password" name="password"><br>
                <?php
                echo token();
                ?>
            </div>
            <div class="m-b-md">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</div>
</body>
