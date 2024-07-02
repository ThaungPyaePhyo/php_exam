<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">One Pager Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'admin.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="admin.php">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>