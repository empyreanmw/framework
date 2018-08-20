<?php
?>
<html>
<head>
<title>
Titula
</title>

<body>

    <h1>Index page</h1>
    <form action="guests" method="POST">
    <input type="text" name="firstname">
        <input type="text" name="lastname">
        <input type="text" name="email">
        <?php echo token(); ?>
        <?php dump($errors); ?>
        <button type="submit">Submit</button>
    </form>

</body>
</html>