<?php
require_once APP_DIR . DS . 'view' . DS . 'base' . DS .'header.php';
?>
<div class="container">
    <div class="row">
        <?php
        foreach ($params as $book) {
            ?>
            <div class="card col-md-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Название книжки '<?php echo $book['bookName']; ?>'</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Написал ее автор: <?php echo $book['author']; ?></li>
                    <li class="list-group-item">Идентификатор книжки: <?php echo $book['id']; ?></li>
                </ul>

            </div>
            <?php
        }
        ?>
    </div>
</div>
<?php
require_once APP_DIR . DS . 'view' . DS . 'base' . DS . 'footer.php';
?>
