<?php


class ProjectController
{
    function get()
    {
        echo 'get data';
    }

    function insert($request)
    {
        var_dump($request);
    }
}