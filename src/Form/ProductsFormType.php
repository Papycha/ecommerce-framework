<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Products;
use App\Repository\CategoriesRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProductsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, [
                'label' => 'Titre d\'un livre'
            ])
            ->add('categories', EntityType::class, [
                'class' => Categories::class,
                'choice_label' => 'name',
                'label' => 'Catégorie',
                'group_by' => 'parent.name',
                'query_builder' => function (CategoriesRepository $cr) {
                    return $cr->createQueryBuilder('c')
                        // ->where('c.parent IS NOT NULL')
                        ->orderBy('c.name', 'ASC');
                },
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please select a category',
                    ]),
                ],
            ])

            ->add('description')
            ->add('genre')
            ->add('author')
            ->add('editor')
            ->add('pages')
            ->add('isbn')

            ->add('price', MoneyType::class, [
                'label' => 'Prix',
                'divisor' => 100,
                'constraints' => [
                    new Positive([
                        'message' => 'Le prix ne peut être négatif'
                    ])
                ]
            ])
            ->add('inStock', null, [
                'label' => 'Unités en stock'
            ])

            ->add('images', FileType::class, [
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new All(
                        new Image([
                            'maxWidth' => 1280,
                            'maxWidthMessage' => 'L\'image doit faire {{ max_width }} pixels de large au maximum'
                        ])
                    )
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}