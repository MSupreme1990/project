<?php

/*
 * This file is part of Mindy Framework.
 * (c) 2017 Maxim Falaleev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Company\Bundle\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ContactForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Ваше имя',
                'constraints' => [
                    new Assert\NotBlank
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Ваша эл. почта',
                'constraints' => [
                    new Assert\NotBlank,
                    new Assert\Email
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Отправить'
            ]);
    }
}
