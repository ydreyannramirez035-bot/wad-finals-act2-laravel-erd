<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;

class OrderPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'user', 'customer']);
    }

    public function view(User $user, Order $order): bool
    {
        return $user->role === 'admin'
            || ($user->customer && $user->customer->id === $order->customer_id);
    }

    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'customer']);
    }

    public function update(User $user, Order $order): bool
    {
        return $user->role === 'admin'
            || ($user->customer && $user->customer->id === $order->customer_id);
    }

    public function delete(User $user, Order $order): bool
    {
        return $user->role === 'admin'
            || ($user->customer && $user->customer->id === $order->customer_id);
    }

    public function restore(User $user, Order $order): bool
    {
        return false;
    }

    public function forceDelete(User $user, Order $order): bool
    {
        return false;
    }
}