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
 * @license MIT For Premium Clients
 *
 * @since 1.0
 *
 */

namespace Modules\Article\Http\Middleware;

use Closure;
use Modules\Modulemanager\Entities\MModule;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if( \Module::has('Article')) {

            \Menu::make('admin_sidebar', function ($menu) {

                    // Articles Dropdown
                    $articles_menu = $menu->add('<i class="c-sidebar-nav-icon fas fa-file-alt"></i> Article', [
                        'class' => 'c-sidebar-nav-dropdown',
                    ])
                        ->data([
                            'order'         => 81,
                            'activematches' => [
                                'admin/posts*',
                                'admin/categories*',
                            ],
                            'permission' => ['view_posts', 'view_categories'],
                        ]);
                    $articles_menu->link->attr([
                        'class' => 'c-sidebar-nav-dropdown-toggle',
                        'href'  => '#',
                    ]);

                    // Submenu: Posts
                    $articles_menu->add('Posts', [
                        'route' => 'backend.posts.index',
                        'class' => 'c-sidebar-nav-item',
                    ])
                        ->data([
                            'order'         => 82,
                            'activematches' => 'admin/posts*',
                            'permission'    => ['edit_posts'],
                        ])
                        ->link->attr([
                            'class' => "c-sidebar-nav-link",
                        ]);
                    // Submenu: Categories
                    $articles_menu->add(' Categories', [
                        'route' => 'backend.categories.index',
                        'class' => 'c-sidebar-nav-item',
                    ])
                        ->data([
                            'order'         => 83,
                            'activematches' => 'admin/categories*',
                            'permission'    => ['edit_categories'],
                        ])
                        ->link->attr([
                            'class' => "c-sidebar-nav-link",
                        ]);
                })->sortBy('order');

        }


        return $next($request);
    }
}
