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

namespace Modules\Article\Listeners\PostUpdated;

use Illuminate\Contracts\Queue\ShouldQueue;
use Log;
use Modules\Article\Events\PostUpdated;

class UpdatePostData implements ShouldQueue
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
    public function handle(PostUpdated $event)
    {
        $post = $event->post;

        Log::debug('Listeners: UpdatePostData');
    }
}
