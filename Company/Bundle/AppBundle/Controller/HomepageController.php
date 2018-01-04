<?php

declare(strict_types=1);

/*
 * This file is part of Mindy Framework.
 * (c) 2018 Maxim Falaleev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Company\Bundle\AppBundle\Controller;

use Company\Bundle\AppBundle\Form\ContactForm;
use Mindy\Bundle\MindyBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomepageController extends Controller
{
    public function homepage(Request $request)
    {
        $form = $this->createForm(ContactForm::class, [], [
            'method' => 'POST',
            'action' => $this->generateUrl('homepage'),
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isRequired()) {
            $this->addFlash('success', 'Ваш запрос успешно отправлен');

            return $this->redirect($request->getRequestUri());
        }

        return $this->render('app/homepage.html', [
            'form' => $form->createView(),
        ]);
    }
}
