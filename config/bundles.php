<?php

declare(strict_types=1);

/*
 * This file is part of Mindy Framework.
 * (c) 2018 Maxim Falaleev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Symfony\Bundle\MonologBundle\MonologBundle::class => ['all' => true],
    Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle::class => ['all' => true],
    Symfony\Bundle\SecurityBundle\SecurityBundle::class => ['all' => true],
    Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle::class => ['all' => true],
    Mindy\Bundle\FileBundle\FileBundle::class => ['all' => true],
    Oneup\FlysystemBundle\OneupFlysystemBundle::class => ['all' => true],
    Liip\ImagineBundle\LiipImagineBundle::class => ['all' => true],
    Mindy\Bundle\PaginationBundle\PaginationBundle::class => ['all' => true],
    Mindy\Bundle\TemplateBundle\TemplateBundle::class => ['all' => true],
    Mindy\Bundle\OrmBundle\OrmBundle::class => ['all' => true],
    Mindy\Bundle\FormBundle\FormBundle::class => ['all' => true],
    Mindy\Bundle\MindyBundle\MindyBundle::class => ['all' => true],
    Mindy\Bundle\MailBundle\MailBundle::class => ['all' => true],
    Ivory\CKEditorBundle\IvoryCKEditorBundle::class => ['all' => true],
    Mindy\Bundle\CKEditorBundle\CKEditorBundle::class => ['all' => true],
    Sentry\SentryBundle\SentryBundle::class => ['prod' => true],
    Mindy\Bundle\SitemapBundle\SitemapBundle::class => ['all' => true],
    Mindy\Bundle\SeoBundle\SeoBundle::class => ['all' => true],
    Mindy\Bundle\AdminBundle\AdminBundle::class => ['all' => true],
    Mindy\Bundle\MenuBundle\MenuBundle::class => ['all' => true],
    Symfony\Bundle\WebServerBundle\WebServerBundle::class => ['dev' => true],

    Company\Bundle\AppBundle\AppBundle::class => ['all' => true],
];
