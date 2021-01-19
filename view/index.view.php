
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="view/css/style.css">
    <title>PHP Atsiskaitymas</title>
</head>
<body>

<?php
$flightNo = ['9898', '9797', '9696'];
$from = ['KUN', 'VLN', 'PLQ'];
$to = ['VKO', 'BGO', 'IEV'];
$luggage= [10, 20, 30, 40];
$validation_errors=[];
if (isset($_POST['submit'])) {
    if (!isset($_POST['skrydziai'])) {
        $validation_errors[] = "Flight number must be entered";
    }
    if (!isset($_POST['luggage'])) {
        $validation_errors[] = "Luggage number must be entered";
    }
    if (!preg_match('/\w{1,100}$/',
        trim(htmlspecialchars($_POST['name']))) ){
        $validation_errors[] = "Name can not exceed 100 symbols and be shorter than 1";
    } else {
        $_POST['name'] = trim(htmlspecialchars( $_POST['name']));
    }
    if (!preg_match('/\w{1,100}/',
        trim(htmlspecialchars($_POST['lastName'])))) {
        $validation_errors[] = "Last name can not exceed 100 symbols and be shorter than 1";
    } else {
        $_POST['lastName']= trim(htmlspecialchars($_POST['lastName']));
    }
    if (!preg_match('/^([3-6]\d{10})$/',
        trim(htmlspecialchars($_POST['perscode'])))){
        $validation_errors[] = "asmens kodas netinkamas formatas";
    } else {
        $_POST['perscode'] = trim(htmlspecialchars($_POST['perscode']));
    }
    if (!preg_match('/^(\+3706)?\(?([0-9]{2})\)?([ .-]?)([0-9]{5})/',
        trim(htmlspecialchars($_POST['telno'])))) {
        $validation_errors[] = "Invalid phone number format";
    } else {
        $_POST['telno']= trim(htmlspecialchars($_POST['telno']));
    }
    if (!preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/',
        trim(htmlspecialchars($_POST['email'])))) {
        $validation_errors[] = "Invalid email format";
    } else {
        $_POST['email']= trim(htmlspecialchars($_POST['email']));
    }
    if (!preg_match('/^(?:0|[1-9]\d*)(?:\,\d{2})?$/',
        trim(htmlspecialchars($_POST['price'])))) {
        $validation_errors[] = "Invalid price format";
    } else {
        $_POST['price']= trim(htmlspecialchars($_POST['price']));
    }
    if (!preg_match('/[\w\s{1,500}]/i',
        trim(htmlspecialchars($_POST['note'])))) {
        $validation_errors[] = "invalid note format";
    } else {
        $_POST['note'] = trim(htmlspecialchars($_POST['note']));
    }
}

?>

<?php if($validation_errors) :?>
<div class="errors">
        <?php foreach($validation_errors as $error) :?>
        <div class="alert alert-danger mt-4" role="alert">
            <?=error; ?>
        </div>
    <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="container">

    <div class="container ">
    <div class="row">
        <div class="col-sm text-center ">
            <h2 class="p-5">Air ticket form</h2>
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
                <div class="form-group">
                    <label for="name">Enter passenger's name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="lastName">Enter passenger's last name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName">
                </div>
                <div class="form-group">
                    <label for="perscode">Enter personal code</label>
                    <input type="number" class="form-control" id="perscode" name="perscode">
                </div>
                <div class="form-group">
                    <label for="telno">Enter phone number</label>
                    <input type="number" class="form-control" id="telno" name="telno">
                </div>
                <div class="form-group">
                    <label for="email">Enter your e-mail</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="price">Enter price of a flight</label>
                    <input type="number" class="form-control" id="price" name="price">
                </div>
                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea class="form-control" name="note" id="note" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</div>


<footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
</footer>
</body>
</html>



