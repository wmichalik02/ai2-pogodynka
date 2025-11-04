<?php

namespace App\Form;

use App\Entity\Measurement;
use App\Entity\WeatherStation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateTimeType::class, [
                'label' => 'Date and time',
                'widget' => 'single_text',
            ])
            ->add('celsius', NumberType::class, [
                'label' => 'Temperature (°C)',
                'scale' => 1,
            ])
            ->add('windSpeed', NumberType::class, [
                'label' => 'Wind speed (m/s)',
                'scale' => 1,
            ])
            ->add('precipitation', NumberType::class, [
                'label' => 'Precipitation (mm)',
                'scale' => 1,
            ])
            ->add('station', EntityType::class, [
                'class' => WeatherStation::class,
                'choice_label' => 'name',
                'label' => 'Weather Station',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
            'validation_groups' => ['Default'],
        ]);
    }
}
