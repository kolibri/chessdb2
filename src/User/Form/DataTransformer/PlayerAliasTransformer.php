<?php declare(strict_types=1);

namespace App\User\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class PlayerAliasTransformer implements DataTransformerInterface
{
    public function transform($value): string
    {
        if (empty($value)) {
            return '';
        }

        return implode(',', $value);
    }

    public function reverseTransform($value): array
    {
        return array_map(
            function ($item) {
                return trim($item);
            },
            explode(',', $value)
        );
    }
}
