<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 3/28/2018
 * Time: 6:07 PM
 */
namespace AppBundle\Form;
use AppBundle\Entity\FosUserRoll;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FosUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('username', 'text', array(
                'required' => true,
                'attr' => array(
                    "class" => "form-control",
                )
            ))
            ->add('email', 'email', array(
                'required' => true,
                'attr' => array(
                    "class" => "form-control",
                )
            ))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'The password fields must match.',
                'first_options' => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeated Password'),
            ))

            ->add('roles', 'entity', array(
                'class' => 'AppBundle\Entity\FosUserRoll',
                'required' => true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('pp')
                        ->andWhere('pp.name <> :name')
                        ->setParameter('name', 'ROLE_USER');

                },
                'property' => 'disname',
                'expanded' => false,
                'multiple' => true,
                'data' => $this->getRoles($options['em'], $builder->getData()),
            ))

        ;

    }
    /**
     * @param EntityManagerInterface $em
     * @return array
     */
    private function getRoles(EntityManagerInterface $em, FosUserRoll $user)
    {
        if (!$em || !$user) return array();

        return $em->getRepository('AppBundle:FosUserRoll')->createQueryBuilder('e')
            ->andWhere('e.name in (:roles)')
            ->setParameter('roles', $user->getRole())
            ->getQuery()
            ->getResult();
    }


    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\FosUser',
            'em' => null,
        ));
    }
}