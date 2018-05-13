<?php namespace App\Admin\Widgets;

use App\Models\Notification;
use Arrilot\Widgets\AbstractWidget;

class Notifications extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $notifications = Notification::last(10);
        $unread = Notification::countUnread();
        return view('admin.widgets.header.notifications', [
            'notifications' => $notifications,
            'unread' => $unread,
        ]);
    }
}
