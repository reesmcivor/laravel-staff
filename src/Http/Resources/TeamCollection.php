<?php

namespace ReesMcIvor\Staff\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;
use ReesMcIvor\Staff\Http\Resources\Team\MemberResource;

class TeamCollection extends ResourceCollection
{
    public function toArray( $request ) : array
    {
        return [
            'data' => $this->collection->map(function($teamMember) {
                return new MemberResource($teamMember);
            })
        ];
    }
}
