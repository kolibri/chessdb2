<?php declare(strict_types=1);

namespace App\User\Form;

use App\User\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, ['label' => 'form.user.registration.username'])
            ->add('email', EmailType::class, ['label' => 'form.user.registration.email'])
            ->add('aliases', PlayerAliasType::class, ['label' => 'form.user.registration.aliases'])
            ->add(
                'password',
                RepeatedType::class,
                [
                    'type' => PasswordType::class,
                    'first_options' => ['label' => 'form.user.registration.password.first'],
                    'second_options' => ['label' => 'form.user.registration.password.second'],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => User::class,
                'empty_data' => function (FormInterface $form) {
                    return new User(
                        $form->get('username')->getData(),
                        $form->get('email')->getData(),
                        $form->get('password')->getData(),
                        $form->get('aliases')->getData()
                    );
                },
            ]
        );
    }
}
