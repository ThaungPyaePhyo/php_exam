<?php
include 'config.php';

if (isset($_POST['addComment'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $comment = $conn->real_escape_string($_POST['comment']);
    $conn->query("INSERT INTO comments (username, comment) VALUES ('$username', '$comment')");
    $id = $conn->insert_id;
    echo "<div class='comment'><strong>$username:</strong> <p>$comment</p><small>Just now</small></div><hr>";
} elseif (isset($_POST['deleteComment'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $conn->query("DELETE FROM comments WHERE id = $id");
} elseif (isset($_POST['editComment'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $comment = $conn->real_escape_string($_POST['comment']);
    $conn->query("UPDATE comments SET comment = '$comment' WHERE id = $id");
} else {
    var_dump($_POST);
}
