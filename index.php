<?php
session_start();
$pizzas = [
    [
        'id' => 1,
        'nome' => 'calabresa',
        'img' => './assets/img/calabresa.png'
    ],
    [
        'id' => 2,
        'nome' => 'mussarela',
        'img' => './assets/img/mussarela.png'
    ],
    [
        'id' => 3,
        'nome' => 'marguerita',
        'img' => './assets/img/marguerita.png'
    ],
    [
        'id' => 4,
        'nome' => 'palmito',
        'img' => './assets/img/palmito.png'
    ],
];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzaria</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/pizza.css" rel="stylesheet" />

</head>

<body>
    <div class="container-fluid ps-3 pe-3">
        <div class="me-5 ms-5">
            <div class="row border border-5 border-dark rounded-bottom rounded-pill overflow-hidden bg-pizza">
                <div class="col-12 text-center">
                    <h1 class="fw-bold bg-dark text-light rounded-bottom rounded-pill fs-6  p-3">Escolha sua Pizza</h1>
                </div>
                <form method="POST">
                    <div class="row fw-bold">
                        <div class="col-6">
                            <div class="form-check float-end">
                                <label class="form-check-label" for="broto">
                                    <input class="form-check-input" type="radio" id="broto" value="broto" name="tipo">
                                    Broto
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check float-start">
                                <label class="form-check-label" for="grande">
                                    <input class="form-check-input" type="radio" id="grande" value="grande" name="tipo">
                                    Grande
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-3 mb-3">
                        <button class="btn btn-primary rounded-pill">Selecionar</button>
                    </div>
                </form>
            </div>
            <?php if (@$_POST['tipo'] == 'grande') : ?>
                <div class="row border border-5 border-dark rounded-pill mt-2 bg-burguer">
                    <form method="POST">
                        <div class="row fw-bold">
                            <div class="col-6">
                                <div class="form-check float-end">
                                    <label class="form-check-label" for="sabor1">
                                        <input class="form-check-input" type="radio" value="1" id="sabor1" name="sabor">
                                        1 Sabor
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check float-start">
                                    <label class="form-check-label" for="sabor2">
                                        <input class="form-check-input" type="radio" value="2" id="sabor2" name="sabor">
                                        2 Sabores
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-3 mb-3">
                            <button class="btn btn-primary rounded-pill">Selecionar</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>

            <?php if (@$_POST['tipo'] == 'broto' || @$_POST['sabor'] == 1) : ?>
                <div class="row border border-5 border-dark rounded-top rounded-pill mt-2 bg-pizza">
                    <form method="POST">
                        <div class="row justify-content-center tex-center fw-bold">
                            <div class="col-8">
                                <label class="form-label" for="select1">Sabor:</label>
                                <select class="form-select" name="select1" id="select1">
                                    <option value="0" selected>--Selecione--</option>
                                    <?php foreach ($pizzas as $pizza) : ?>
                                        <option value="<?= $pizza['id'] ?>"><?= ucfirst($pizza['nome']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-3 mb-3">
                            <button class="btn btn-primary rounded-pill">Selecionar</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>

            <?php if (@$_POST['sabor'] == 2) : ?>
                <div class="row border border-5 border-dark rounded-top rounded-pill mt-2 bg-pizza">
                    <form method="POST">
                        <div class="row justify-content-center tex-center">
                            <div class="col-5 col-sm-4">
                                <label class="form-label" for="select1">1º Sabor:</label>
                                <select class="form-select" name="select1" id="select1">
                                    <option value="0" selected>--Selecione--</option>
                                    <?php foreach ($pizzas as $pizza) : ?>
                                        <option value="<?= $pizza['id'] ?>"><?= ucfirst($pizza['nome']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-5 col-sm-4">
                                <label class="form-label" for="select2">2º Sabor:</label>
                                <select class="form-select" name="select2" id="select2">
                                    <option value="0" selected>--Selecione--</option>
                                    <?php foreach ($pizzas as $pizza) : ?>
                                        <option value="<?= $pizza['id'] ?>"><?= ucfirst($pizza['nome']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-3 mb-3">
                            <button class="btn btn-primary rounded-pill">Selecionar</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
            <div class="row justify-content-center mt-5 bg-warning">
                <div class="mt-3" id="tabua">
                    <img src="./assets/img/tabua.png" width="300px" alt="">
                </div>
                <?php if (@$_POST['select1']) :
                    $index1 = @$_POST['select1'] - 1;
                ?>
                    <div class="mt-3" id="pizza">
                        <img src="<?= $pizzas[$index1]['img'] ?>" width="250px" height="250px" alt="" />
                    </div>
                <?php endif; ?>

                <?php if (@$_POST['select2']) :
                    $index2 = @$_POST['select2'] - 1;
                ?>
                    <div class="mt-3" id="pizza1">
                        <img src="<?= $pizzas[$index2]['img'] ?>" width="250px" height="250px" alt="" />
                    </div>
                <?php endif; ?>
            </div>

            <?php
            if (@$_POST['tipo'] == 'broto') {
                $_SESSION['tipo'] = 'broto';
                unset($_SESSION['sabor1']);
                unset($_SESSION['sabor2']);
            } elseif (@$_POST['tipo'] == 'grande') {
                $_SESSION['tipo'] = 'grande';
                unset($_SESSION['sabor1']);
                unset($_SESSION['sabor2']);
            }

            if (@$_POST['select1']) {
                $index = $_POST['select1'] - 1;
                $_SESSION['sabor1'] = $pizzas[$index]['nome'];
            }

            if (@$_POST['select2']) {
                $index = $_POST['select2'] - 1;
                $_SESSION['sabor2'] = $pizzas[$index]['nome'];
            }
            ?>

            <div id="tabela" class="row justify-content-center mt-5">
            <?php if(@$_POST['select1']): ?>
                <table class="table table-striped table-bordered">
                    <thead>    
                        <tr>
                            <th>Tipo Pizza</th>                            
                            <th>Sabor 1</th>
                            <?php if(@$_POST['select2']): ?>
                            <th>Sabor 2</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php if(@$_POST['select1'] || @$_POST['select2']): ?>
                            <td><?= @$_SESSION['tipo'] ?></td>
                            <?php else: ?>
                                <td></td>
                            <?php endif; ?>
                            <?php if(@$_POST['select1']): ?>
                            <td><?= @$_SESSION['sabor1'] ?></td>
                            <?php else: ?>
                                <td></td>
                            <?php endif; ?>
                            <?php if(@$_POST['select2']): ?>
                            <td><?= @$_SESSION['sabor2'] ?></td>
                            <?php endif; ?>
                        </tr>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="./assets//js//bootstrap.bundle.min.js"></script>
    <script src="./assets//js/seguranca.js"></script>
</body>

</html>