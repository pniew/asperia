<?php
session_start();
require_once "../../config.php";
require_once "../../functions.php";
global $link;
// $posts = mysqli_fetch_all($result, MYSQLI_NUM);    

// if ($posts==NULL) $posts = array();
// echo "<pre>";
// var_dump($posts);

$thread =  mysqli_real_escape_string($link, $_GET["thread"]);

$query2 = "select name from threads where thread_id = " . $thread . "";
if (!$link) die('Connection broken');
else {
    $result = mysqli_query($link, $query2);
    if ($result === false) {
        echo "<p>" . mysqli_error($link) . "</p>";
    }
    $thread_name = mysqli_fetch_row($result);
    $caption = $thread_name[0];
}

?>


<!doctype html>
<html lang="PL_pl">
<html>

<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Fondamento" rel="stylesheet">
    <title> Forum Asperii </title>
    <link href="forum_style.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>

    <script>
        function textin(e, txt) {
            document.getElementById(e).innerHTML = txt;
        }

        function textout(e) {
            document.getElementById(e).innerHTML = '&nbsp;';
        }

        function deletePost(post_id) {
            if (confirm("Czy jesteś pewny że chcesz usunąć wybrany post?")) {
                location.href = `./deletepost.php?post_id=${post_id}`
            }
        }

        function editPost(id, postBtn) {
            document.querySelector('.overlay').classList.add('show')
            const modal = document.querySelector('.modal')
            const post = postBtn.closest('td')
            const text = post.querySelector('.post-text').innerText
            modal.classList.add('show')
            modal.querySelector('input[name=post_id]').value = id
            modal.querySelector('[name=message]').value = text
            console.log(text)
        }

        function stopEditPost() {
            document.querySelector('.overlay').classList.remove('show')
            document.querySelector('.modal').classList.remove('show')
        }
    </script>
</head>

<body>
    <div id="lupa">
        <img id="lupka" src="../../img/img_forum/symbole_lupa_duza.png" />
    </div>

    <div id="logo">
        <a href="../">
            <img class="title" id="t1" onmouseover="hoverTitle()" onmouseout="unhoverTitle()" src="../../img/img_forum/Forum_Asperii1.png" />
        </a>

        <a href="../../">
            <img id="logotyp" src="../../img/logo/logo0.png" />
        </a>

        <a href="../">
            <img class="title" id="t2" onmouseover="hoverTitle()" onmouseout="unhoverTitle()" src="../../img/img_forum/Forum_Asperii2.png" />
        </a>
    </div>


    <div class="tablesdiv">
        <table class="table">

            <thead>
                <caption><?php echo $caption ?></caption>
                <tr>
                    <th class="thLeft" width="150px" nowrap="nowrap" height="26">Autor</th>
                    <th class="thLeft" nowrap="nowrap" height="26">Post</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT post_id, user_id, title, contents, publication_date p_date, users.login author, users.avatar author_avatar, users.join_date author_jdate FROM posts left join users on posts.author = users.user_id where posts.thread = $thread";
                if (!$link) die('Connection broken');
                else {
                    foreach (mysqli_query($link, $query) as $post) {
                        $delete_button = "";
                        $edit_button = "";
                        if (isset($_SESSION['login']) && (getPowerForUser($link, $_SESSION['user_id']) >= 50 || $_SESSION["user_id"] == $post['user_id'])) {
                            $edit_button = "<button class=\"buttons\" onclick='editPost({$post['post_id']}, this)'>✎</button>";
                            $delete_button = "<button class=\"buttons\" onclick='deletePost({$post['post_id']})'>✖</button>";
                        }
                        $message = nl2br($post['contents']);
                        echo "
                <tr>
                  <td class=\"author\">
                    <span>
                    {$post['author']}
                    </span>
                  </td>
                  <td class=\"post\">
                    <div class='options right'>
                        {$edit_button}
                        {$delete_button}
                    </div>
                    <span class='post-text'>
                    {$message}
                    </span>
                  </td>
                </tr>
                <tr class=\"spacerow\">
                <br>
                </tr>";
                    }
                    echo "
              </tbody>
              </table>
              ";
                }
                ?>
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo ("
                        <form method='post' action='addpost.php'>
                            <input type='hidden' name='thread_id' value='{$thread}'/>
                            <textarea name='message' placeholder='Nowy post' rows='10' cols='45'
                                style='width:700px; height:200px; background-color: black; color: gold; text-align: initial;' ></textarea>
                            <button type='submit'>Dodaj post</button>
                        </form>");
                }
                ?>

    </div>
    <div class='overlay' onclick='stopEditPost()'></div>
    <div class='modal'>
        <form class='modal-form' method='post' action='editpost.php'>
            <input type='hidden' name='post_id' value=''/>
            <textarea name='message' rows='10' cols='45' style='width:700px; height:200px; background-color: black; color: gold; text-align: initial;'></textarea>
            <button type='submit'>Edytuj</button>
            <button type='button' onclick='stopEditPost()'>Anuluj</button>
        </form>
    </div>

    <script>
        function hoverTitle() {
            document.getElementById("t1").style.opacity = "70%";
            document.getElementById("t2").style.opacity = "70%";
        }

        function unhoverTitle() {
            document.getElementById("t1").style.opacity = "100%";
            document.getElementById("t2").style.opacity = "100%";
        }
    </script>
</body>

</html>