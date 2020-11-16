<?php
    require __DIR__ . '/settings.php';

    include APP_PATH . '/includes/htmlhead.php'
?>
<body>
    <?php include APP_PATH . '/includes/header.php' ?>
    <section class="containers section">
        <form action="" method="post">
            <div class="form-group">
                <label for="title">Enter Title</label>
                <input type="text" class="form-control" id="title" placeholder="Enter Title">
            </div>

            <div class="form-group">
                <label for="Create Post">Create Post</label>
                <textarea class="form-control" id="Create Post" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </section>
</body>