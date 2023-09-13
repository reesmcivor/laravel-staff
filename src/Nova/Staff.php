<?php

namespace ReesMcIvor\Staff\Nova;

use App\Models\User;
use App\Nova\Resource;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Staff extends Resource
{

    public static $model = User::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name'),
            Email::make('Email')
        ];
    }
}
