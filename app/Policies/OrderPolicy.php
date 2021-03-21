<?php

namespace App\Policies;

use App\Order;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any orders.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }


    //  論理消去
    public function forceDelete(User $user, Order $order)
    {
        return $user->id===$order->user_id;
    }
}
