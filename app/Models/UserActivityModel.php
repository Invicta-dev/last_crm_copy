<?php

namespace App\Models;

use CodeIgniter\Model;

class UserActivityModel extends Model
{
    protected $table      = 'user_activity';
    protected $primaryKey = 'id';



    protected $allowedFields = ['username', 'browser', 'version', 'date', 'time'];
}
