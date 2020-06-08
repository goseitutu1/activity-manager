<?php

namespace App\Policies;

use App\Activity;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ActivityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Activity  $activity
     * @return mixed
     */
    public function view(User $user, Activity $activity)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Activity  $activity
     * @return mixed
     */
    public function update(User $user, Activity $activity)
    {
        return $user->name === $activity->user_name
                        ? Response::allow()
                        : Response::deny('You do not own the activity.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Activity  $activity
     * @return mixed
     */
    public function delete(User $user, Activity $activity)
    {
        return $user->name === $activity->user_name
                    ? Response::allow()
                    : Response::deny('You do not own this activity.');

        $response = Gate::inspect('update', $post);

            if ($response->allowed()) {
                        // The action is authorized...
            } 
            else 
            {
                        echo $response->message();
            }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Activity  $activity
     * @return mixed
     */
    public function restore(User $user, Activity $activity)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Activity  $activity
     * @return mixed
     */
    public function forceDelete(User $user, Activity $activity)
    {
        //
    }
}
