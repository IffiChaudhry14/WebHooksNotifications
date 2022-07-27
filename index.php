<?php 
require_once("inc/functions.php");

$shop_url=$_GET['shop'];
$access_token=''

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>WebHooks</title>
</head>

<body>
    <main>
        <section>
            <article>
                <div class="card has-sections">
                    <div class="card-section">
                        <?php
                        require_once("webhooks.php");
                        ?>
                        </div>
</div>
</div>
</article>
</section>

<footer>
    <article class="help">
        <span></span>
        <p>Learn more about <a href="#">this app </a> at <a href="#">WeeklyHow </a>Help Center.</p>
</article>
</footer>

</main>
</body>
</html>
                