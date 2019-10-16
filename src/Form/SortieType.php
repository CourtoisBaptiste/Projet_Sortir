<?php

namespace App\Form;

use App\Entity\Sortie;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('dateHeureDebut', DateTimeType::class)
            ->add('dateLimiteInscription', DateTimeType::class)
            ->add('duree', IntegerType::class)
            ->add('nbInscriptionsMax', IntegerType::class)
            ->add('descriptionSortie', TextType::class)
            ->add('idEtat')
            ->add('idLieu')
            ->add('idCampus')
            ->add('idOrganisateur')
            ->add('dateInscription')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}
