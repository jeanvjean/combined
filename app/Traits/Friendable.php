<?php

namespace App\Traits;
use App\Follower;
trait Friendable
{
    public function addFriend($id){

        $Friendship = Follower::create([

            'requester' => $this->id, // who is logged in
            'requested' => $id,
        ]);

        if($Friendship)
        {

            return $Friendship;
        }

        return 'failed';

    }



}
