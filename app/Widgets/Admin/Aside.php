<?php

namespace App\Admin\Widgets;

use App\Models\Catalog\ProductsReviews;
use App\Models\Catalog\ProductsWait;
use App\Models\PagesRole;
use App\Models\UsersRole;
use Illuminate\Support\Facades\URL;
use Route;
use Arrilot\Widgets\AbstractWidget;

class Aside extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    public function __construct(array $config = [])
    {
        $this->addConfigDefaults(['menu' => config('aside')]);
        $this->config['menu'] = $this->prepareMenu();
        parent::__construct($config);
//        dd($this->config['menu']);
    }

    protected function prepareMenu(array $menu = null)
    {
        $userRole = UsersRole::whereAlias(\Auth::user()->role_alias)->first();
        $pagesRoles = PagesRole::whereRoleId($userRole->id)->get();
        $statusArr = [];
        foreach ($pagesRoles as $pagesRole) {
            $statusArr[$pagesRole->page->name] = $pagesRole->status;
        }
        if (sizeof($statusArr) > 0 && isset($statusArr['Список пользователей']) && isset($statusArr['Черный список'])) {
            if ($statusArr['Список пользователей'] == false && $statusArr['Черный список'] == false) {
                $statusArr['Пользователи'] = false;
            }
        }
//        dd($statusArr);

        $menu = $menu ?: $this->config['menu'];
        foreach ($menu AS $key => $element) {
            if (is_array($element)) {
                $element['hasMenu'] = array_key_exists('menu', $element) && is_array($element['menu']) && count($element['menu']) > 0;
                $element['menu'] = $element['hasMenu'] ? $element['menu'] : [];
                $element['hasIcon'] = array_key_exists('icon', $element) && is_string($element['icon']) && $element['icon'];
                $element['icon'] = $element['hasIcon'] ? $element['icon'] : null;
                $element['hasCounter'] = array_key_exists('counter', $element) && is_array($element['counter']) && count($element['counter']) > 0;
                if ($element['hasCounter']) {
                    foreach ($element['counter'] as $name => $color) {
                        $element['counter_value'][$name] = $this->prepareCounter($name);
                    }
                }
                $element['title'] = (array_key_exists('title', $element) && $element['title']) ? $element['title'] : 'No title';
                $element['status'] = array_get($statusArr, $element['title'], true);
                $element['active'] = false;
                if (array_key_exists('route', $element) === false) {
                    $element['route'] = null;
                    if (array_key_exists('url', $element) === false || is_string($element['url']) === false) {
                        $element['url'] = '#';
                    }
                } else {
                    $element['url'] = route($element['route']);
                    $element['active'] = $element['route'] === Route::currentRouteName() || $element['url'] === URL::current();
                }
                if ($element['active'] === false && array_key_exists('routes', $element)) {
                    if (is_array($element['routes']) && in_array(Route::currentRouteName(), $element['routes'])) {
                        $element['active'] = true;
                    } else if (is_string($element['routes']) && Route::currentRouteName() === $element['routes']) {
                        $element['active'] = true;
                    }
                }
                if ($element['active'] === false && $element['hasMenu'] === true) {
                    $element['active'] = $this->checkSubMenuForActivity($element['menu']);
                }
                if ($element['hasMenu'] === true) {
                    $element['menu'] = $this->prepareMenu($element['menu']);
                }
                $menu[$key] = $element;
            }
        }
        return $menu;
    }

    protected function prepareCounter($counter)
    {
        switch ($counter) {
            case 'users':
                return \App\Models\User::where('status', 0)->count();
            case 'customers':
                return \App\Models\User::where('status', 0)->where('role_alias', 'user')->count();
            case 'managers':
                return \App\Models\User::where('status', 0)->where('role_alias', 'manager')->count();
            case 'events':
                return \App\Models\EventsRegistration::where('status', 0)->count();
            case 'rew_articles':
                return \App\Models\Comment::where('status', 2)->where('type', 1)->count();
            case 'rew_news':
                return \App\Models\Comment::where('status', 2)->where('type', 0)->count();
            case 'subscribers':
                return \App\Models\Subscriber::where('status', 0)->count();
            case 'callbacks':
                return \App\Models\Callback::where('status', 0)->count();
            case 'prod_waits':
                return ProductsWait::all()->groupBy('user_id')->where('status', 0)->count();
            case 'orders_new':
                return \App\Models\Order\Order::where('status', 0)->count();
            case 'orders_all':
                return \App\Models\Order\Order::where('status', 0)->count() +
                    ProductsWait::all()->groupBy('user_id')->where('status', 0)->count();
            case 'orders_payed':
                return \App\Models\Order\Order::where('status', 2)->count();
            case 'orders_processed':
                return \App\Models\Order\Order::where('status', 1)->count();
            case 'products':
                return ProductsReviews::whereStatus(2)->count();
            case 'feedback1':
                return \App\Models\Subscriber::where('status', 0)->count() +
                    \App\Models\EventsRegistration::where('status', 0)->count() +
                    \App\Models\Callback::where('status', 0)->count();
            case 'feedback2':
                return \App\Models\Comment::where('status', 2)->where('type', 0)->count() +
                    \App\Models\Comment::where('status', 2)->where('type', 1)->count() +
                    ProductsReviews::whereStatus(2)->count();
            default:
                return null;
        }
    }

    protected function checkSubMenuForActivity(array $menu)
    {
        $active = false;
        foreach ($menu AS $element) {
            if ($active === true) {
                continue;
            }
            if (is_array($element)) {
                $hasMenu = array_key_exists('menu', $element) && is_array($element['menu']) && count($element['menu']) > 0;
                if (array_key_exists('route', $element) === false || is_string($element['route']) === false) {
                    $active = false;
                } else {
                    $url = route($element['route']);
                    $active = $element['route'] === Route::currentRouteName() || $url === URL::current();
                }
                if ($active === false && array_key_exists('routes', $element)) {
                    if (is_array($element['routes']) && in_array(Route::currentRouteName(), $element['routes'])) {
                        $active = true;
                    } else if (is_string($element['routes']) && Route::currentRouteName() === $element['routes']) {
                        $active = true;
                    }
                }
                if ($active === false && $hasMenu === true) {
                    $active = $this->checkSubMenuForActivity($element['menu']);
                }
            }
        }
        return $active;
    }

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        return view('admin.widgets.aside', [
            'config' => $this->config,
        ]);
    }
}
