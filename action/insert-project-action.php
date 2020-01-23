<?php
    require '../controller/ProjectController.php';

    $projectController = new ProjectController();

    if(isset($_POST['insert']))
    {
        $projectController->insert($_POST);
    }
    else
    {
        die('Invalid Request');
    }