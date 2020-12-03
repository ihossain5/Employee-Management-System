<?php
namespace App\Traits;

/**
 *
 */
trait permissionTrait {
    public function hasPermission() {
        // // for department
        // if (!isset(auth()->user()->role->permission['name']['department']['can-add']
        // ) && \Route::is('departments.create')) {
        //     return abort(401);
        // }
        // if (!isset(auth()->user()->role->permission['name']['department']['can-view']
        // ) && \Route::is('departments.index')) {
        //     return abort(401);
        // }
        // // for role
        // if (!isset(auth()->user()->role->permission['name']['role']['can-add']
        // ) && \Route::is('roles.create')) {
        //     return abort(401);
        // }
        // if (!isset(auth()->user()->role->permission['name']['role']['can-view']
        // ) && \Route::is('roles.index')) {
        //     return abort(401);
        // }
        // // for users
        // if (!isset(auth()->user()->role->permission['name']['user']['can-add']
        // ) && \Route::is('users.create')) {
        //     return abort(401);
        // }
        // if (!isset(auth()->user()->role->permission['name']['user']['can-view']
        // ) && \Route::is('users.index')) {
        //     return abort(401);
        // }
        // // for permission
        // if (!isset(auth()->user()->role->permission['name']['permission']['can-add']
        // ) && \Route::is('permissions.create')) {
        //     return abort(401);
        // }
        // if (!isset(auth()->user()->role->permission['name']['permission']['can-view']
        // ) && \Route::is('permissions.index')) {
        //     return abort(401);
        // }
        // // for approve/reject staff leave
        // if (!isset(auth()->user()->role->permission['name']['leave']['can-view']
        // ) && \Route::is('leaves.index')) {
        //     return abort(401);
        // }
        // // for notice
        // if (!isset(auth()->user()->role->permission['name']['notice']['can-view']
        // ) && \Route::is('leaves.index')) {
        //     return abort(401);
        // }
        // if (!isset(auth()->user()->role->permission['name']['notice']['can-add']
        // ) && \Route::is('leaves.create')) {
        //     return abort(401);
        // }
        // // for mail
        // if (!isset(auth()->user()->role->permission['name']['mail']['can-add']
        // ) && \Route::is('mails.create')) {
        //     return abort(401);
        // }
    }
}
