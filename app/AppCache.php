<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 13/10/16
 * Time: 17:53
 */

namespace App;

use Mindy\Bundle\FrameworkBundle\HttpCache\HttpCache;

class AppCache extends HttpCache
{
    protected function getOptions()
    {
        return [
            'default_ttl' => 10
        ];
    }
}