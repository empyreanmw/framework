<?php
include __DIR__ . '/header.php';
?>
<body>
<div class="flex-center position-ref full-height">
    <?php if (auth()->loggedIn()) {?>

    <div class="top-right links">
        <a href="home">Home</a>
        <a href="users/list">List all users</a>
        <a href="logout">Logout</a>
    </div>
    <?php } ?>

    <div class="content">
        <div class="title m-b-md">
            Hello <?php echo session()->get('user')->attributes['username']."!"; ?>
        </div>
    </div>
</div>
</body>