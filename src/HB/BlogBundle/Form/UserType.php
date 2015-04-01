<?php

namespace HB\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email','repeated', array(
                    'type' => 'email',
                    'invalid_message' => 'Les adresses eMail doivent correspondre',
                    'options' => array('required'=>true),
                    'first_options' => array('label'=>'EMail'),
                    'second_options' => array('label'=>'EMail (confirmer)')
                ))
            ->add('login')
            ->add('password','repeated', array(
                    'type' => 'password',
                    'invalid_message' => 'Les mots de passe doivent correspondre',
                    'options' => array('required'=>true),
                    'first_options' => array('label'=>'Password'),
                    'second_options' => array('label'=>'Password (confirmer)')
                ))
            ->add('creationDate','datetime', array('years'=>  range(date('Y')-20, date('Y'))))
            ->add('lastEditDate')
            ->add('enabled', 'checkbox', array('required'=>false))
            ->add('birthDate','birthday')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HB\BlogBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hb_blogbundle_user';
    }
}
