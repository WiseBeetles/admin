<?php

namespace App\Models;

use Framework\Model;
use Framework\Database;

class User extends Model
{
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getUser()
    {
        return 'test';
    }
}