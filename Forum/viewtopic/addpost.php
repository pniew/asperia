<?php
session_start();
require_once "../../config.php";
require_once "../../functions.php";
global $link;

$thread_id = 0;
if (isset($_SESSION["login"]) && isset($_REQUEST["thread_id"])) {

    if (empty($_REQUEST["message"])) {
        echo "Wiadomość nie może być pusta";
        exit();
    }

    $thread_id = (int) $_REQUEST["thread_id"];

    if (!$link) die("Connection broken");

    $insert_query = mysqli_prepare($link, "INSERT INTO `posts`(`author`, `thread`, `contents`) VALUES(?, ?, ?)");
    mysqli_stmt_bind_param($insert_query, 'iis', $_SESSION["user_id"], $thread_id, $_REQUEST["message"]);
    mysqli_stmt_execute($insert_query);
}

if ($thread_id == 0) {
    echo("Wybrany temat nie istnieje.");
    exit();
}

header("Location: ./?thread={$thread_id}");
exit();
