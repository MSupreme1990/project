<?php

/*
 * This file is part of Mindy Framework.
 * (c) 2017 Maxim Falaleev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * Created by PhpStorm.
 * User: max
 * Date: 06/10/16
 * Time: 11:01
 */
class AppKernel extends Kernel
{
    /**
     * Returns an array of bundles to register.
     *
     * @return \Symfony\Component\HttpKernel\Bundle\BundleInterface[] An array of bundle instances
     */
    public function registerBundles()
    {
        return [
            // Symfony bundles
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),

            // Extra bundles
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Oneup\FlysystemBundle\OneupFlysystemBundle(),
            new Ivory\CKEditorBundle\IvoryCKEditorBundle(),
            new Misd\PhoneNumberBundle\MisdPhoneNumberBundle(),
            new SymfonyBundles\JsonRequestBundle\SymfonyBundlesJsonRequestBundle(),
            new Liip\ImagineBundle\LiipImagineBundle(),

            // Mindy bundles
            new Mindy\Bundle\SeoBundle\SeoBundle(),
            new Mindy\Bundle\MenuBundle\MenuBundle(),
            new Mindy\Bundle\PaginationBundle\PaginationBundle(),
            new Mindy\Bundle\TemplateBundle\TemplateBundle(),
            new Mindy\Bundle\OrmBundle\OrmBundle(),
            new Mindy\Bundle\FormBundle\FormBundle(),
            new Mindy\Bundle\FileBundle\FileBundle(),
            new Mindy\Bundle\MindyBundle\MindyBundle(),
            new Mindy\Bundle\AdminBundle\AdminBundle(),
            new Mindy\Bundle\MailBundle\MailBundle(),
            new Mindy\Bundle\CKEditorBundle\CKEditorBundle(),
            new Mindy\Bundle\SentryBundle\SentryBundle(),
            new Mindy\Bundle\SitemapBundle\SitemapBundle(),

            // Project bundles
            new Company\Bundle\AppBundle\AppBundle(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheDir()
    {
        return $this->rootDir.'/runtime/cache/'.$this->environment;
    }

    /**
     * {@inheritdoc}
     */
    public function getLogDir()
    {
        return $this->rootDir.'/runtime/logs/'.$this->environment;
    }

    /**
     * Loads the container configuration.
     *
     * @param \Symfony\Component\Config\Loader\LoaderInterface $loader A LoaderInterface instance
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
