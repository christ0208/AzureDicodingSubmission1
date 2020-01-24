<?php
    require '../configuration/mssql-config.php';
    require '../helper/mssql-helper.php';
    require '../helper/session-helper.php';
    require '../controller/ProjectController.php';

    $projectController = new ProjectController($conn);

    if(isset($_POST['insert']))
    {
        $projectController->insert($_POST);
    }
    else
    {
        die('Invalid Request');
    }