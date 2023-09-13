<?php

namespace ReesMcIvor\Staff\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use ReesMcIvor\Staff\Database\Factories\StaffFactory;

class Staff extends User
{
    use HasFactory;

    protected $fillable = ['name'];

    protected static function newFactory()
    {
        return new StaffFactory();
    }
}
