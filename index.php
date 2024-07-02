<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>One Pager Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include 'components/navbar.php'; ?>

    <div class="container mt-4">
        <div class="card home">
            <h1 class="card-header bg-dark text-white">Blog Comments</h1>
            <div class="card-body">
                <form id="commentForm" method="POST" action="process.php">
                    <input type="hidden" name="addComment">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Your name" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="comment" rows="3" placeholder="Your comment" required></textarea>
                    </div>
                    <button type="submit" name="addComment" class="btn btn-primary">Submit</button>
                </form>
                <hr>
                <div id="comments">
                    <?php
                    include 'config.php';
                    $result = $conn->query("SELECT * FROM comments ORDER BY created_at DESC");
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='comment card mb-3'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$row['username']}</h5>
                                    <p class='card-text'>{$row['comment']}</p>
                                    <p class='card-text'><small class='text-muted'>{$row['created_at']}</small></p>
                                </div>
                            </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#commentForm").on("submit", function(event) {
                event.preventDefault();
                $.ajax({
                    url: "process.php",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(data) {
                        $("#comments").prepend(data);
                        $("#commentForm")[0].reset();
                    }
                });
            });
        });
    </script>

</body>

</html>