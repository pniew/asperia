<?php
session_start();
require_once "../../config.php";
require_once "../../functions.php";
global $link;

if (isset($_SESSION["login"]) && isset($_REQUEST["post_id"])) {
    if (!$link) die("Connection broken");

    $user_id_query = mysqli_prepare($link, "SELECT `author`, `thread` FROM `posts` WHERE `post_id` = ?");
    mysqli_stmt_bind_param($user_id_query, 'i', $_REQUEST["post_id"]);
    mysqli_stmt_execute($user_id_query);
    mysqli_stmt_bind_result($user_id_query, $post_author_id, $thread_id);
    mysqli_stmt_fetch($user_id_query);
    mysqli_stmt_close($user_id_query);
    echo($post_author_id);
    echo($thread_id);

    if (getPowerForUser($link, $_SESSION["user_id"]) >= 50 || $_SESSION["user_id"] == $post_author_id) {
        $delete_query = mysqli_prepare($link, "DELETE FROM `posts` WHERE `post_id` = ?");
        mysqli_stmt_bind_param($delete_query, 'i', $_REQUEST["post_id"]);
        mysqli_stmt_execute($delete_query);
        mysqli_stmt_close($delete_query);
    }

    header("Location: ./?thread={$thread_id}");
    exit();
} else {
    // set error to certain string
    header("Location: /error.php");
    exit();
}
