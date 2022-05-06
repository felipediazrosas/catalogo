<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Ciudades;
use Illuminate\Auth\Access\HandlesAuthorization;

class CiudadesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the ciudades can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the ciudades can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Ciudades  $model
     * @return mixed
     */
    public function view(User $user, Ciudades $model)
    {
        return true;
    }

    /**
     * Determine whether the ciudades can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the ciudades can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Ciudades  $model
     * @return mixed
     */
    public function update(User $user, Ciudades $model)
    {
        return true;
    }

    /**
     * Determine whether the ciudades can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Ciudades  $model
     * @return mixed
     */
    public function delete(User $user, Ciudades $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Ciudades  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the ciudades can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Ciudades  $model
     * @return mixed
     */
    public function restore(User $user, Ciudades $model)
    {
        return false;
    }

    /**
     * Determine whether the ciudades can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Ciudades  $model
     * @return mixed
     */
    public function forceDelete(User $user, Ciudades $model)
    {
        return false;
    }
}
