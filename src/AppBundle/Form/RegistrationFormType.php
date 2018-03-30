<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\UserBundle\Form\Type;

use AppBundle\Entity\FosUser;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationFormType extends AbstractType
{
    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            ->add('roll','entity', array('class' => 'AppBundle\Entity\FosUserRoll','property'=>'disname',
                'query_builder' =>function(EntityRepository $er){
                    return $er->createQueryBuilder('pp')
                        ->andWhere('pp.name <> :name')
                        ->setParameter('name','ROLE_USER');
                },
                'label'=> 'Хандах эрх',
                'expanded' => false,
                'multiple' => true,
                'data' => $this->getRoles($options['em'], $builder->getData())
                ))
        ;
    }
    /**
     * @param EntityManagerInterface $em
     * @param User $user
     * @return array
     */
    private function getRoles(EntityManagerInterface $em, FosUser $user)
    {
        if (!$em || !$user) return array();

        return $em->getRepository('incentiveAppBundle:Role')->createQueryBuilder('e')
            ->andWhere('e.name in (:roles)')
            ->setParameter('roles', $user->getRoles())
            ->getQuery()
            ->getResult();
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention'  => 'registration',
        ));
    }

    public function getName()
    {
        return 'fos_user_registration';
    }
}
