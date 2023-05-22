<?php

// Controller som tittar på query string samt agerar på användarens valda action/qs

require_once 'view/student-api.php';
require_once 'model/student-model.php';

$studentModel = new StudentModel();
$studentAPI = new StudentAPI();

if (isset($_GET['action'])) {
    $chosenAction = filter_var($_GET['action'], FILTER_SANITIZE_SPECIAL_CHARS);

    if ($chosenAction == 'students') {
        $studentAPI->outputStudents($studentModel->getStudents());
    }
}
