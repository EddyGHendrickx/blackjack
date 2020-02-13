<?php
require 'controller.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <?php foreach ($player->cards as $card): ?>
        <div>
            <p><?php echo $card ?></p>
        </div>
    <?php endforeach; ?>
    <div>
        <p><?php echo $player->totalValue; ?></p>
    </div>

    <p>-----------------------------------------------------------</p>
    <?php

    if (!isset($dealer)) {
        $dealer = [];
    } else {

        foreach ($dealer->cards as $card): ?>
            <div>
                <p><?php echo $card ?></p>
            </div>
        <?php endforeach; } ?>

    <form method='post'>
        <button name='submit' value='0'<?php echo $player->enable ?? ""; ?>>HIT ME</button>
        <button name='submit' value='1'<?php echo $player->enable ?? ""; ?>>STAND</button>
        <button name='submit' value='2'>SURRENDER</button>
    </form>
</head>
<body>

</body>
</html>

