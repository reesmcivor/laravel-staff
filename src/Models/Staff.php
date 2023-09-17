<?php

namespace ReesMcIvor\Staff\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use ReesMcIvor\Staff\Database\Factories\StaffFactory;

class Staff extends User
{
    use HasFactory;

    protected $table = 'users';

    protected static function newFactory()
    {
        return new StaffFactory();
    }

    public static function booted()
    {
        static::addGlobalScope('role', function (Builder $builder) {
            $builder->whereHas('role', function (Builder $query) {
                $query->whereIn('name', ['staff', 'admin']);
            });
        });
    }
}
