<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $handler->getUnitProp('name'); ?></title>
    <link rel="stylesheet" href="./frontend/bootstrap-3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./frontend/bootstrap-3.3.7/css/bootstrap-theme.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1 style="margin-bottom:50px; text-align: center"><?php echo $handler->getUnitProp('ip'); ?></h1>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Свойство</th>
                    <th>Значение</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $props = $handler->getUnitProp('all');
                    foreach ($props as $key => $value) {
                ?>
                <tr>
                    <th scope="row"><?php echo $key ?></th>
                    <td> <?php echo $value ?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <div class="wrap" style="text-align: center">
                <button type="button" class="home btn btn-primary">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                </button>
                <button type="button" class="updateUnit btn btn-primary">
                    Правка
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="updateUnitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Обновить информацию об устройстве</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">
                            <div class="modal-body">
                                <h5>IP Адрес <span class="badge badge-default" style="font-size: 20px;"><?php echo $handler->getUnitProp('ip')?></span></h5>
                                <label for="example-text-input" class="col-2 col-form-label">Имя</label>
                                <input class="form-control" type="text" name="name" placeholder="" value="<?php echo $handler->getUnitProp('name')?>" id="example-text-input">
                                <label for="example-text-input" class="col-2 col-form-label">Модель</label>
                                <input class="form-control" type="text" name="model" placeholder="" value="<?php echo $handler->getUnitProp('model')?>" id="example-text-input">
                                <input type="hidden" name="ip" value="<?php echo $handler->getUnitProp('ip')?>">
                                <label for="example-text-input" class="col-2 col-form-label">Местоположение</label>
                                <input class="form-control" type="text" name="location" placeholder="Физическое расположение устройства" value="<?php echo $handler->getUnitProp('location')?>" id="example-text-input">
                                <label for="example-number-input" class="col-2 col-form-label">Количество портов</label>
                                <input class="form-control" type="number" min="0" name="ports" value="<?php echo $handler->getUnitProp('ports')?>" id="example-number-input">
                                <label for="example-number-input" class="col-2 col-form-label">Входящий порт</label>
                                <input class="form-control" type="number" name="in" min="0" value="<?php echo $handler->getUnitProp('in')?>" id="example-number-input">
                                <label for="example-number-input" class="col-2 col-form-label">Исходящий порт</label>
                                <input class="form-control" type="number" name="out" min="0" value="<?php echo $handler->getUnitProp('out')?>" id="example-number-input">
                                <label for="example-number-input" class="col-2 col-form-label">Комментарии </label>
                                <input class="form-control" type="text" name="comments" value="<?php echo $handler->getUnitProp('comments')?>" id="example-text-input">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<script src="./frontend/jquery-3.2.1.min.js"></script>
<script src="./frontend/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script>
    $('.home').click(function () {
        location.href = "<?php echo $hostName; ?>";
    });
    $('button.updateUnit').click(function () {
        $('#updateUnitModal').modal();
    });

</script>
</body>
</html>
