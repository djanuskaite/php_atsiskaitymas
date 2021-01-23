
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

<?php
$flightNo = [9898, 9797, 9696, 9595, 9494, 9393, 9292, 9191];
$from = ['KUN', 'VLN', 'PLQ'];
$to = ['VKO', 'BGO', 'IEV'];
$luggage= [10, 20, 30, 40];
?>

<!--forma-->

<div class="container">

    <?php if (isset($_POST['submit'])): ?>
        <?php validate($_POST); ?>
    <?php endif ?>
    <?php if (empty($validation)):
     ?>

    <div class="row">
        <div class="col-sm text-center ">
            <h1 class="p-5 text-info">Air ticket form</h1>
            <form method="post" >
                <div class="form-group">
                    <select name="flights" class="form-control">
                        <option selected disabled>--Choose flight number--</option>
                        <?php foreach ($flightNo as $flight): ?>
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
                        <label for="lastName">Enter passenger's last name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName">
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

                <button type="submit" class="btn btn-info mb-5" name="submit">Submit</button>
                <button type="button" name="print" class="btn btn-success mb-5" data-toggle="modal" data-target="#ticket">
Print Ticket
                </button>
            </form>
        </div>
    </div>
</div>

        <!--        review -->
        <?php else: ?>
        <?php foreach ($validation as $errors): ?>
            <div class="alert alert-danger m-2" role="alert">
                <?= $errors; ?>
            </div>
        <?php endforeach; ?>
        <div class="modal fade" id = "ticket" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h3 class="modal-title">Printing ticket</h3>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container ticket">
                            <div class="row">
                                <div class=" text-center col-sm-12"><h2 class="text-info">Ticket's info</h2></div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="row">Your flight number: <?= $flightNo ?></div>
                                    <div class="row">Direction: <?=  $from = $_POST['from']; ?></div>
                                    <div class="row">Origin: <?= $to = $_POST['to']; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="row">Pasanger's name: <?=  $name = $_POST['name']; ?></div>
                                        <div class="row">Pasanger's last name: <?=  $lastName = $_POST['lastName']; ?></div>
                                        <div class="row">Pasanger's identity number: <?= $perscode =  $_POST['perscode']; ?></div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col text-center">Review</div>
                                    <div class="col">Price: <?= $price = intval($_POST['price']); ?></div>
                                    <div class="col">Luggage: <?= $kg = intval($_POST['luggage']); ?>kg</div>
                                         <?php if ($kg >= 20) {
                                             $kaina = $price + 30;
                                         } else {$kaina=$price;} ?>
                                    <div class="col">Total: <?= $kaina ?></div>
                                    <div class="col">Notes: <?= $note = $_POST['note']; ?></div>
                                </div>
                                <div class="modal-footer mt-3">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php endif;?>

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