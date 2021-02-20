<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 01/02/2021
 * Time: 17:29
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            $builder
                ->add('email', EmailType::class, [
                    'label' => 'Email'
                ])
                ->add('username', TextType::class, [
                    'label' => 'Nom/Pseudo'
                ])
                ->add('content', TextareaType::class, [
                    'label' => 'Message'
                ])
            ;
    }
}