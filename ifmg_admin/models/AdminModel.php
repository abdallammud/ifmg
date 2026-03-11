<?php
/**
 * Dummy Admin Model for statistics (temporary)
 */

class AdminModel extends Model
{
    public function getStats()
    {
        return [
            ['title' => 'Publications', 'value' => '24', 'icon' => 'book', 'trend' => '+2 this week', 'color' => 'teal'],
            ['title' => 'Upcoming Events', 'value' => '03', 'icon' => 'calendar', 'trend' => 'Next: Mar 15', 'color' => 'gold'],
            ['title' => 'Announcements', 'value' => '12', 'icon' => 'speakerphone', 'trend' => '4 active', 'color' => 'navy'],
            ['title' => 'Subscribers', 'value' => '1.2k', 'icon' => 'users', 'trend' => '+48 new', 'color' => 'teal'],
        ];
    }
}
