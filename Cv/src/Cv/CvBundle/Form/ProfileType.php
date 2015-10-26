<?php

namespace Cv\CvBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Form\ImageType;

class ProfileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreHeader')
            ->add('titreProfession')
            ->add('texteAccueil')
            ->add('backgroundImage')
            ->add('linkedIn')
            ->add('image','file',array(
                'data_class' => null))
            ->add('nom')
            ->add('prenom')
            ->add('sexe','choice', array('choices' => array('Masculin' => 'Masculin', 'Feminin' => 'Feminin')))
            ->add('dateDeNaissance','date',array('years' => range(1920, date('Y')),'format'=>'dd-MM-yyyy'))
            ->add('telephone')
            ->add('email')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cv\CvBundle\Entity\Profile'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cv_cvbundle_profile';
    }
}
