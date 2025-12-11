<?php

namespace App\Enums;

enum SettingTypes: string
{
    case TEXT = 'text';
    case NUMBER = 'number';
    case BOOLEAN = 'boolean';
    case JSON = 'json';
    case IMAGE = 'image';
    case URL = 'url';
    case EMAIL = 'email';
    case PHONE = 'phone';

    public function label(): string
    {
        return match ($this) {
            self::TEXT => 'Text',
            self::NUMBER => 'Number',
            self::BOOLEAN => 'Boolean',
            self::JSON => 'JSON',
            self::IMAGE => 'Image',
            self::URL => 'URL',
            self::EMAIL => 'Email',
            self::PHONE => 'Phone',
        };
    }
}

