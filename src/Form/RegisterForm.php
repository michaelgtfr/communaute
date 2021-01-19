<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 18/01/2021
 * Time: 18:14
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class RegisterForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Pseudo'
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'présentation'
            ])
            ->add('country', TextType::class, [
                'label' => 'Pays'
            ])
            ->add('address', TextType::class, [
                'label' => 'Ville'
            ])
            ->add('name', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('firstName', TextType::class, [
                'label' => 'prénom'
            ])
            ->add('email', TextType::class)
            ->add('dateBirth', BirthdayType::class, [
                'label' => 'date de naissance'
            ])
            ->add('password', PasswordType::class, [
                'label' => 'mot de passe'
            ])
            ->add('passwordConfirm', PasswordType::class, [
                'label' => 'ré-écrivez le mot de passe'
            ])
        ;
    }
}