<?php
require_once 'base/header.php';
?>
<div class="container">
<div class="row">
    <?php
        $collection = [
                [
                        'name' => 'Alex',
                        'age' => 48,
                        'job' => 'programmer',
                ],
                [
                        'name' => 'Bob',
                        'age' => 44,
                        'job' => 'lifter',
                ],
                [
                        'name' => 'Jannete',
                        'age' => 21,
                        'job' => 'officeworker',
                ],
        ];
        foreach ($collection as $item) {
            ?>
            <div class="card col-md-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Что-то из БД прилетело например</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Имя: <?php echo $item['name']; ?></li>
                    <li class="list-group-item">Возраст: <?php echo $item['age']; ?></li>
                    <li class="list-group-item">Работа: <?php echo $item['job']; ?></li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
            <?php
        }
    ?>
</div>
</div>
<?php
require_once 'base/footer.php';
?>