<?php

namespace App\Policies\Inventory;

use App\Models\Inventory\InventoryType;
use App\Models\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InventoryTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Models\Inventory\InventoryType  $inventoryType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, InventoryType $inventoryType)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Models\Inventory\InventoryType  $inventoryType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, InventoryType $inventoryType)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Models\Inventory\InventoryType  $inventoryType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, InventoryType $inventoryType)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Models\Inventory\InventoryType  $inventoryType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, InventoryType $inventoryType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Models\Inventory\InventoryType  $inventoryType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, InventoryType $inventoryType)
    {
        //
    }
}
