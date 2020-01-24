<?php


    class ProjectController
    {
        private $conn;
        public function __construct($connection)
        {
            $this->conn = $connection;
        }

        function get()
        {
            $selectQuery = "SELECT * FROM vw_ProjectDetails";
            $result = sqlsrv_query($this->conn, $selectQuery);

            $projectResults = [];
            if($result !== false){
                while($obj = sqlsrv_fetch_object($result)){
                    array_push($projectResults, $obj);
                }
            }

            return $projectResults;
        }

        function insert($request)
        {
            $insertQuery = "INSERT INTO tblProject(name, price) VALUES (?,?)";
            $prepQuery = sqlsrv_prepare(
                $this->conn,
                $insertQuery,
                array(&$request['project-name'], &$request['project-price'])
            );

            if (!$prepQuery) {
                die(sqlsrv_errors());
            }

            $result = sqlsrv_execute($prepQuery);
            if ($result === false)
            {
                die(sqlsrv_errors());
            }

            $_SESSION['message'] = 'Success';
            header('Location:/views/form.php');
        }
    }