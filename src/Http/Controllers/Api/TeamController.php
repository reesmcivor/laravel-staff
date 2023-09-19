<?php

namespace ReesMcIvor\Staff\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use ReesMcIvor\Staff\Http\Resources\TeamCollection;

class TeamController extends Controller
{
    public function __invoke(Request $request)
    {
        $team = User::has('profile')->with('profile')->whereIn('role_id', [1,2])->get()->filter(function($item) {
            return $item['profile'] && $item['profile']['show_on_app'] == 1;
        });
        return new TeamCollection($team);
    }
}
