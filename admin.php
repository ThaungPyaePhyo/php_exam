<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include 'components/navbar.php'; ?>

    <div class="container mt-4">
        <div class="card admin">
            <h1 class="card-header bg-dark text-white">Admin Panel - Manage Comments</h1>
            <div class="card-body">
                <div id="comments">
                    <?php
                    include 'config.php';
                    $result = $conn->query("SELECT * FROM comments ORDER BY created_at DESC");
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='comment border p-3 mb-3' id='comment-{$row['id']}'>
                                <strong>{$row['username']}:</strong>
                                <p class='mb-0'>{$row['comment']}</p>
                                <small class='text-muted'>{$row['created_at']}</small>
                                <button class='btn btn-warning btn-sm ml-2 edit-comment' data-id='{$row['id']}' data-comment='{$row['comment']}'>Edit</button>
                                <button class='btn btn-danger btn-sm ml-2 delete-comment' data-id='{$row['id']}'>Delete</button>
                              </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editCommentModal" tabindex="-1" role="dialog" aria-labelledby="editCommentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCommentModalLabel">Edit Comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" id="editCommentText" rows="5"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveEditComment">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.edit-comment', function() {
                var commentId = $(this).data('id');
                var currentText = $(this).data('comment');
                $('#editCommentText').val(currentText); 
                $('#editCommentModal').data('comment-id', commentId); 
                $('#editCommentModal').modal('show');
            });

            $('#saveEditComment').click(function() {
                var commentId = $('#editCommentModal').data('comment-id');
                var newText = $('#editCommentText').val();
                $.ajax({
                    url: 'process.php',
                    method: 'POST',
                    data: {
                        editComment: true,
                        id: commentId,
                        comment: newText
                    },
                    success: function() {
                        $('#comment-' + commentId + ' p').text(newText);
                        $('#editCommentModal').modal('hide');
                    }
                });
            });

            $(document).on('click', '.delete-comment', function() {
                var commentId = $(this).data('id');
                $.ajax({
                    url: 'process.php',
                    method: 'POST',
                    data: {
                        deleteComment: true,
                        id: commentId
                    },
                    success: function() {
                        $('#comment-' + commentId).remove(); 
                    }
                });
            });
        });
    </script>
</body>

</html>