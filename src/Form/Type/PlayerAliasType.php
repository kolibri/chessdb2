<?php declare(strict_types=1);

namespace App\Form\Type;

use App\Form\DataTransformer\PlayerAliasTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class PlayerAliasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new PlayerAliasTransformer());
    }

    public function getParent()
    {
        return TextType::class;
    }
}
