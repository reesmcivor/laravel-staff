<?php

namespace ReesMcIvor\Staff\View\Components;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use ReesMcIvor\Staff\Models\Staff;

class Grid extends Component
{
    public Collection $staff;

    public function __construct()
    {
        $this->staff = User::staff()->get();
    }

    public function render(): View|Closure|string
    {
        return view('staff::grid', [
            'staff' => $this->staff,
        ]);
    }
}