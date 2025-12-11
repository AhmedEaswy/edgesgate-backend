<?php

namespace App\Enums;

enum SettingGroups: string
{
    case GENERAL = 'general';
    case CONTACT = 'contact';
    case SOCIAL = 'social';
    case SEO = 'seo';
    case APPEARANCE = 'appearance';
    case EMAIL = 'email';
    case API = 'api';

    public function label(): string
    {
        return match ($this) {
            self::GENERAL => 'General',
            self::CONTACT => 'Contact',
            self::SOCIAL => 'Social Media',
            self::SEO => 'SEO',
            self::APPEARANCE => 'Appearance',
            self::EMAIL => 'Email',
            self::API => 'API',
        };
    }
}

