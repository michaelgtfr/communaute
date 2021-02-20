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
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
                'label' => 'Pseudo *',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Présentation',
                'required' => false
            ])
            ->add('country', TextType::class, [
                'label' => 'Pays *',
            ])
            ->add('address', TextType::class, [
                'label' => 'Ville',
                'required' => false
            ])
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'required' => false
            ])
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',
                'required' => false
            ])
            ->add('email', TextType::class, [
                'label' => 'Email *'
            ])
            ->add('dateBirth', BirthdayType::class, [
                'label' => 'Date de naissance*( j-m-a )',
                'format' => 'dd_MM_yyyy',
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe *',
            ])
            ->add('passwordConfirm', PasswordType::class, [
                'label' => 'Ré-écrivez le mot de passe *',
            ])
            ->add('completePictureName', FileType::class,[
                    'label' => 'Photo de profil',
                    'attr' => [
                        'lang' => 'fr',
                    ],
                'required' => false
            ])
            ->add('termsOfUse', CheckboxType::class, [
                'label' => 'J\'accepte les conditions d\'utilisation de l\'application *',
            ])
        ;
    }
}