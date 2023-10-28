<?php

namespace Domains\Shared\Traits;

use Illuminate\Support\Str;

trait EnumTrait
{
    public static function tryFromName(string $name): ?static
    {
        $inputAsName = Str::replace('-', '_', Str::upper($name));
        foreach (static::cases() as $case) {
            if ($case->name === $inputAsName) {
                return $case;
            }
        }

        return null;
    }

    /**
     * @return array<int, string>
     */
    public static function values(): array
    {
        return array_column(static::cases(), 'value');
    }

    /**
     * @return array<int, string>
     */
    public static function names(): array
    {
        return array_column(static::cases(), 'name');
    }

    /**
     * @return array<string, string>
     */
    public static function toArray(): array
    {
        $cases = [];
        foreach (self::cases() as $case) {
            $cases[$case->name] = $case->value;
        }

        return $cases;
    }

    public static function getTranslationKey(): string
    {
        return Str::snake(class_basename(static::class));
    }
}
