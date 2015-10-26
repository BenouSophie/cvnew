<?php
namespace Cv\CvBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionResolverInterface;

/**
 * Description of ImageType
 *
 * @author skontomarko
 */
class ImageType 
{
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
       $builder->add('image','image');
    }

    public function getName() {
      
        return 'image';
    }
}

?>
