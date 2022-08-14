<?php

namespace Modules\Clients\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends User
{
    protected $table="users";

}
