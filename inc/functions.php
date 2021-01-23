<?php

$validation=[];
function validate()
{
    global $validation;  //akcentas

        if (empty($_POST['name']) || !preg_match('/\w{1,100}$/', $_POST['name'])) {
            $validation[] = "Name can not exceed 100 symbols and be shorter than 1";
        }
        if (empty($_POST['lastname']) || !preg_match('/\w{1,100}//', $_POST['lastname'])) {
            $validation[] = "Last name can not exceed 100 symbols and be shorter than 1";
        }
        if (empty($_POST['perscode']) || !preg_match('/^([3-6]\d{10})$/', $_POST['perscode'])) {
            $validation[] = "Invalid personal number format";
        }
        if (empty($_POST['telno']) || !preg_match('/^(\+3706)?\(?([0-9]{2})\)?([ .-]?)([0-9]{5})/', $_POST['telno'])) {
            $validation[] = "Invalid phone number format";
        }
        if (empty($_POST['email']) || !preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $_POST['email'])) {
            $validation[] = "Invalid email format";
        }
        if (empty($_POST['price']) || !preg_match('/^(?:0|[1-9]\d*)(?:\,\d{2})?$/', $_POST['price'])) {
            $validation[] = "Invalid price format";
        }
        if (empty($_POST['note']) || !preg_match('/[\w\s{1,500}]/i', $_POST['note'])) {
            $validation[] = "invalid note format";
        }

    return $validation;
}

