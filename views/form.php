<?php
    require '../configuration/mssql-config.php';

    require '../helper/session-helper.php';
    require '../helper/mssql-helper.php';

    require '../controller/ProjectController.php';

    $projectController = new ProjectController($conn);

    $projects = $projectController->get();
?>

<form action="/action/insert-project-action.php" method="post">
    <div>
        <div>
            Project Name
        </div>
        <div>
            <input type="text" name="project-name" id="project-name">
        </div>
    </div>
    <div>
        <div>
            Project Price
        </div>
        <div>
            <input type="number" name="project-price" id="project-price">
        </div>
    </div>
    <div>
        <input type="submit" value="Insert" name="insert">
    </div>
</form>

<?php
    if(isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        session_unset();
    }

    if(count($projects) != 0)
    {
        echo '<table>';
        echo '<tr>';
        echo '<th colspan="2">List of Projects</th>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>Name</th>';
        echo '<th>Price</th>';
        echo '</tr>';
        foreach($projects as $project)
        {
            echo '<tr>';
            echo '<td>' . $project->name . '</td>';
            echo '<td>Rp. ' . $project->price . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
?>