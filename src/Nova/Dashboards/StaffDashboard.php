<?php

namespace ReesMcIvor\Staff\Nova\Dashboards;

use Laravel\Nova\Dashboard;
use App\Nova\Metrics\TotalUsers;
use App\Nova\Metrics\UsersOverTime;

class StaffDashboard extends Dashboard
{
    
    public function cards()
    {
        return [
            
        ];
    }
}