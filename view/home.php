<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./frontend/bootstrap-3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./frontend/bootstrap-3.3.7/css/bootstrap-theme.css">
    <style>
        .wrapper span {
            position: absolute;
            display: none;
            top: 0px;
            right: -29px;
            font-size: 30px;
            height: 42px;
            color: #3175B0;
            cursor: pointer;
            line-height: 44px;
        }
        .wrapper:hover span {
            display: inline-block;
        }
    </style>
    <title>Список устройств</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1 style="text-align: center; margin-bottom: 30px">Доступные устройства</h1>
            <div class="list-group">
            <?php
                $dir = $_SERVER['DOCUMENT_ROOT']. "/" .$filesPath;
                $units = infoFileHandler::scanForUnits($dir);
                foreach ($units as $value) {
            ?>
                <div class="wrapper" style="position: relative;">
                    <a href="<?php echo $hostName. "?unitIP=" .$value ?>" class="list-group-item"><?php echo $value ?></a>
                    <span class="removeUnit glyphicon glyphicon-remove-circle" aria-hidden="true" title="Удалить устройство"></span>
                </div>
            <?php } ?>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="addUnit btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Добавить устройство
            </button>

            <!-- Modal -->
            <div class="modal fade" id="addUnitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Введите IP адрес устройства</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="GET">
                            <div class="modal-body">
                                <input class="form-control" type="text" name="unitIP" value="" id="example-text-input">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="removeUnitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Удалить информацию об устройстве?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="GET">
                            <div class="modal-body">
                                <h5>IP Адрес <span class="badge badge-default" style="font-size: 20px;"></span></h5>
                                <input type="hidden" id="disabledTextInput" name="removeIP" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                <button type="submit" class="btn btn-primary">Удалить</button>
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
<script src="./frontend/maskedInput/jquery.maskedinput.min.js"></script>
<script>
    $('button.addUnit').click(function () {
        $('#addUnitModal').modal();
    });
    $('span.removeUnit').click(function () {
        $('#removeUnitModal').modal();
        var ip = $(this).siblings('a').html();
        $('#removeUnitModal h5 span').html(ip);
        $('#removeUnitModal input').attr('value', ip);
    });
    $('input[name="unitIP"]').ipmask();
</script>
</body>
</html>