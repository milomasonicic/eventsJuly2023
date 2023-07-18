<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\PostCreation;
use App\Notifications\NewPostAlert;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCreationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreation $event): void
    {
        //
        $post = $event->post;

        $users= User::wherehas("role", function($query){
            $query->where("role", "administrator");
        })->get();

        foreach($users as $user){
            $user->notify(new NewPostAlert($post));
        }
    }
}
