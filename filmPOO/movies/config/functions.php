<?php
function flash_in($type, $mess)
{
    if (empty($_SESSION['message']))
        $_SESSION['message'] = [];

    array_push($_SESSION['message'], [$type, $mess]);
}

function flash_out()
{
    if (isset($_SESSION["message"]))
        foreach ($_SESSION['message'] as $m)
            echo '<p class="message-' . $m[0] . '" > ' . $m[1] . '</p>';

    $_SESSION['message'] = [];
}

function addMovie()
{ ?>

    <?php
}