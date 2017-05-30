<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить информацию об устройстве</title>
    <link rel="stylesheet" href="./frontend/bootstrap-3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./frontend/bootstrap-3.3.7/css/bootstrap-theme.css">
    <style>
        a.dismiss {
            display: inline-block;
            background: #f2f1f0;
            color: #333;
        }
        a.dismiss:hover {
            background: #ffffff;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <h1>Добавить описание устройства</h1>
            <h3 style="text-align: center"></h3>
            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Имя</label>
                    <div class="col-10">
                        <input class="form-control" name="name" type="text" placeholder="Название устройства в сети" value="" id="example-text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Модель</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="model" placeholder="" value="" id="example-text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">IP адрес</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="ip" value="<?php echo $unitIP ?>" id="example-text-input" disabled>
                        <input class="form-control" type="hidden" name="ip" value="<?php echo $unitIP ?>" id="example-text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Местоположение</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="location" placeholder="Физическое расположение устройства" value="" id="example-text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-number-input" class="col-2 col-form-label">Количество портов</label>
                    <div class="col-10">
                        <input class="form-control" type="number" min="0" name="ports" value="" id="example-number-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-number-input" class="col-2 col-form-label">Входящий порт</label>
                    <div class="col-10">
                        <input class="form-control" type="number" min="0" name="in" id="example-number-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-number-input" class="col-2 col-form-label">Исходящий порт</label>
                    <div class="col-10">
                        <input class="form-control" type="number" min="0" name="out" id="example-number-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Комментарии</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="comments" value="" id="example-text-input">
                    </div>
                </div>
                <div class="row">
                    <div class="wrap" style="text-align: right">
                        <div class="col-md-6">
                            <a class="dismiss btn btn-secondary" href="<?php echo $hostName ?>" style="display: inline-block">Отмена</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-secondary">Создать</button>
                    </div>
                </div>

            </form>
        </div>
        <div class="col-md-3">
        </div>
    </div>
</div>

<script src="./frontend/bootstrap-3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
