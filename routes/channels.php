<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


/**
 * Attendance Private Channels
 */
Broadcast::channel('private-attendance.{event}', function ($event) {
    return ['guards' => ['web', 'auth']];
});

// Broadcast::channel('private-attendance.created', function () {
//     return true;
// }, ['guards' => ['web', 'auth']]);

// Broadcast::channel('private-attendance.updated', function () {
//     return true;
// }, ['guards' => ['web', 'auth']]);

// Broadcast::channel('private-attendance.deleted', function () {
//     return true;
// }, ['guards' => ['web', 'auth']]);
