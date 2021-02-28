<?php

/**
 * Putting this here to help remind you where this came from.
 *
 * I'll get back to improving this and adding more as time permits
 * if you need some help feel free to drop me a line.
 *
 * * Twenty-Years Experience
 * * PHP, JavaScript, Laravel, MySQL, Java, Python and so many more!
 *
 *
 * @author  Simple-Pleb <plebeian.tribune@protonmail.com>
 * @website https://www.simple-pleb.com
 * @source https://github.com/simplepleb/article-module
 *
 * @license Free to do as you please
 *
 * @since 1.0
 *
 */

namespace Modules\Article\Listeners\PostViewed;

use Illuminate\Contracts\Queue\ShouldQueue;
use Log;
use Modules\Article\Events\PostViewed;

class IncrementHitCount implements ShouldQueue
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
     * @param object $event
     *
     * @return void
     */
    public function handle(PostViewed $event)
    {
        $post = $event->post;

        $post->increment('hits');

        $post->view_counter += 1;

        Log::debug('Listeners: IncrementHitCount');
    }
}
