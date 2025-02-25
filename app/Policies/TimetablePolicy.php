<?php

namespace App\Policies;

use App\Models\Timetable;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimetablePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return auth()->check() && $user->hasVerifiedEmail();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Timetable $timetable)
    {
        return auth()->check() && $user->id == $timetable->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasVerifiedEmail() && auth()->check() && !$user->is_banned;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Timetable $timetable)
    {
        return $user->hasVerifiedEmail() && auth()->check() && !$user->is_banned && $user->id == $timetable->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Timetable $timetable)
    {
        return $user->hasVerifiedEmail() && auth()->check() && !$user->is_banned && $user->id == $timetable->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Timetable $timetable)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Timetable $timetable)
    {
        //
    }
}
