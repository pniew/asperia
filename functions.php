<?php

function getPowerForUser($link, $user_id)
{
    $power_query = mysqli_prepare($link, "SELECT `role_power` FROM `users` JOIN `roles` ON `role` = `roles`.`role_name` WHERE `user_id` = ?");
    mysqli_stmt_bind_param($power_query, 'i', $user_id);
    mysqli_stmt_execute($power_query);
    mysqli_stmt_bind_result($power_query, $power);
    mysqli_stmt_fetch($power_query);
    mysqli_stmt_close($power_query);
    return $power;
}

