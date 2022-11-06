<?php

namespace App\Listeners;

use App\Events\UserAccessed;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogAuthenticated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Authenticated  $event
     * @return void
     */
    public function handle(Authenticated $event)
    {
        $user = $event->user;

        // 最終アクセスが15分より前の場合
        if(!$user->is_online) {
            // ここでイベントを実行しています
            UserAccessed::dispatch();
        }

        // アクセス日時を更新
        $user->last_accessed_at = now();
        $user->save();
    }
}
