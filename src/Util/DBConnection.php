<?php


namespace App\Util;


class DBConnection
{
    public function __construct()
    {
        //
    }


    public function save($entity): bool
    {
        echo $entity;

        return true;
    }
}
