<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 06/12/16
 * Time: 14:12
 */

namespace App\Bundle\AppBundle\Controller;

use Mindy\Bundle\MindyBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomepageController extends Controller
{
    public function homepageAction(Request $request)
    {
        return $this->render('app/homepage.html');
    }
}