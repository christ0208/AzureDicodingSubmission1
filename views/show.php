<?php
    require '../configuration/mssql-config.php';
    require '../helper/mssql-helper.php';
    require '../controller/ProjectController.php';

    $projectController = new ProjectController($conn);

    $projects = $projectController->get();
    var_dump($projects);