<?php

namespace Laravel\Dusk\Concerns;

use Laravel\Dusk\Browser;

trait InteractsWithAuthentication
{
    /**
     * Log into the application as the default user.
     *
     * @return $this
     */
    public function login()
    {
        return $this->loginAs(call_user_func(Browser::$userResolver));
    }

    /**
     * Log into the application using a given user ID or email.
     *
     * @param  string  $userId
     * @return $this
     */
    public function loginAs($userId)
    {
        $userId = method_exists($userId, 'getKey') ? $userId->getKey() : $userId;

        return $this->visit('/_dusk/login/'.$userId);
    }
}