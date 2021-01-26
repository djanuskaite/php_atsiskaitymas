<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="view/style.css">
    <title>PHP Atsiskaitymas</title>
</head>
<body>
<?php include "view/header.php"?>



<div class="container">

    <?php
    $validation = [];
    if (isset($_POST['send'])){
        validate($_POST);
        if (empty($validation)){
            printing($_POST);}}?>


    <?php
    if (isset($_POST['prnt'])){
        validate($_POST);
        if (empty($validation)){
            printing($_POST);
            table();}}
    ?>

    <?php if (isset($_POST['send']) & empty($validation)):?>


        <?php printing(); ?>
        <div class="container w-75 mt-5">
            <div class="row p-2 d-flex justify-content-between bg-info p-3"></div>
            <div class="row p-2 grey-light">
                <h4 class="font-weight-bold"><?= $_POST['forward']; ?></h4>
                <i class="fas fa-plane-departure fa-2x mx-4"></i>
                <h4 class="font-weight-bold"><?= $_POST['to']; ?></h4>
            </div>
            <div class="row grey-light">
                <div class="col-8 border-right border-secondary">
                    <div class="row">
                        <div class="col-5 mb-0 font-weight-bold text-secondary">Passenger</div>
                        <div class="col-4 mb-0 font-weight-bold text-secondary">Flight no.</div>
                    </div>
                    <div class="row">
                        <div class="col-5 font-weight-bold"><?= $_POST['name']; ?> <?= $_POST['lastname']; ?></div>
                        <div class="col-4 font-weight-bold"><?= $_POST['flights']; ?></div>
                    </div>

                    <div class="row pl-3 font-weight-bold text-secondary">ID: </div>
                    <div class="row pl-3 font-weight-bold"><?= $_POST['perscode']; ?></div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">Sum:</div>
                        <div class="col-4 font-weight-bold text-right"><?= $_POST['price']; ?> €</div>
                    </div>
                    <div class="row">
                        <div class="col">Luggage:</div>
                        <?php $baggageWeight = $_POST['luggage'];
                        $price = $_POST['price'];
                        if ($baggageWeight > 20): ?>
                            <div class="col-4 font-weight-bold text-right">30.00 €</div>
                        <?php else: ?>
                            <div class="col-4 font-weight-bold text-right">0.00 €</div>
                        <?php endif; ?>
                    </div>
                    <div class="row mt-4 bigger-font">
                        <div class="col font-weight-bold">Total:</div>
                        <?php
                        if ($baggageWeight > 20): ?>
                            <div class="col-4 font-weight-bold text-right"><?= $price + 30; ?> €</div>
                        <?php else: ?>
                            <div class="col-4 font-weight-bold text-right"><?= $price ?> €</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row p-2 d-flex justify-content-between bg-info p-3"></div>
        </div>

        <button type='button' class='btn btn-light mt-4' onclick='history.go(-1);'>Atgal</button>




    <?php elseif(!isset($_POST['prnt'])):?>

    <?php foreach ($validation as $error):?>
    <div class="col alert alert-danger" role="alert">
        <?=$error;?>
    </div>
    <?php endforeach;?>

    <div class="row">
        <div class="col-sm text-center ">
            <h1 class="p-5 text-info">Air ticket form</h1>
            <form method="post" >
                <div class="form-group">
                    <select name="flights" class="form-control">
                        <option selected disabled>--Choose flight number--</option>
                        <?php foreach ($flights as $flight): ?>
                            <option value="<?= $flight; ?>"><?= $flight; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="luggage" class="form-control">
                        <option selected disabled>--Choose luggage weight---</option>
                        <?php foreach ($luggage as $kg): ?>
                            <option value="<?= $kg; ?>"><?= $kg; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="forward" class="form-control">
                        <option selected disabled>---Destination---</option>
                        <?php foreach ($from as $forward): ?>
                            <option value="<?= $forward; ?>"><?= $forward; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="to" class="form-control">
                        <option selected disabled>---Origin----</option>
                        <?php foreach ($to as $back): ?>
                            <option value="<?= $back; ?>"><?= $back; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form row">
                    <div class="form-group col-md-6">
                        <label for="name">Enter passenger's name</label>
                        <input type="text" class="form-control" id="name" name="name">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastname">Enter passenger's last name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname">
                    </div>


                    <div class="form-group col-md-6">
                        <label for="perscode">Enter personal code</label>
                        <input type="number" class="form-control" id="perscode" name="perscode">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telno">Enter phone number</label>
                        <input type="number" class="form-control" id="telno" name="telno">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Enter your e-mail</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Enter price of a flight</label>
                        <input type="number" class="form-control" id="price" name="price">
                    </div>
                </div>
                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea class="form-control" name="note" id="note" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-success mb-4" name="send">Spausdinti bilietą</button>
                <button type="submit" class="btn btn-info mb-4" name="prnt">Spausdinti lentelę</button>
            </form>
        </div>
    </div>
</div>

    <!--        review -->

<?php endif ?>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>
</html>