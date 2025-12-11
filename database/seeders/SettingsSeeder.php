<?php

namespace Database\Seeders;

use App\Enums\SettingGroups;
use App\Enums\SettingTypes;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General Settings
            [
                'name' => 'site_name',
                'value' => 'Edges Gate',
                'type' => SettingTypes::TEXT,
                'group' => SettingGroups::GENERAL,
            ],
            [
                'name' => 'site_description',
                'value' => 'Your gate for endless software development',
                'type' => SettingTypes::TEXT,
                'group' => SettingGroups::GENERAL,
            ],
            [
                'name' => 'about_title',
                'value' => 'Solving Problems Through Software Development',
                'type' => SettingTypes::TEXT,
                'group' => SettingGroups::GENERAL,
            ],
            [
                'name' => 'about_description',
                'value' => 'Transform Your Ideas into Digital Solutions. Explore our portfolio of innovative software, web, and mobile projects, and let\'s build the future together.',
                'type' => SettingTypes::TEXT,
                'group' => SettingGroups::GENERAL,
            ],
            [
                'name' => 'cta_title',
                'value' => 'Ready to start?',
                'type' => SettingTypes::TEXT,
                'group' => SettingGroups::GENERAL,
            ],
            [
                'name' => 'cta_description',
                'value' => 'Transform Your Ideas into Digital Solutions. Explore our portfolio of innovative software, web, and mobile projects, and let\'s build the future together.',
                'type' => SettingTypes::TEXT,
                'group' => SettingGroups::GENERAL,
            ],

            // Contact Settings
            [
                'name' => 'email',
                'value' => 'info@edgesgate.com',
                'type' => SettingTypes::EMAIL,
                'group' => SettingGroups::CONTACT,
            ],
            [
                'name' => 'phone',
                'value' => '+2010 123 4567',
                'type' => SettingTypes::PHONE,
                'group' => SettingGroups::CONTACT,
            ],
            [
                'name' => 'address',
                'value' => 'Egypt, Cairo',
                'type' => SettingTypes::TEXT,
                'group' => SettingGroups::CONTACT,
            ],

            // Social Media Settings
            [
                'name' => 'facebook',
                'value' => 'https://facebook.com/edgesgate',
                'type' => SettingTypes::URL,
                'group' => SettingGroups::SOCIAL,
            ],
            [
                'name' => 'linkedin',
                'value' => 'https://linkedin.com/company/edgesgate',
                'type' => SettingTypes::URL,
                'group' => SettingGroups::SOCIAL,
            ],
            [
                'name' => 'twitter',
                'value' => 'https://twitter.com/edgesgate',
                'type' => SettingTypes::URL,
                'group' => SettingGroups::SOCIAL,
            ],
            [
                'name' => 'instagram',
                'value' => 'https://instagram.com/edgesgate',
                'type' => SettingTypes::URL,
                'group' => SettingGroups::SOCIAL,
            ],
            [
                'name' => 'whatsapp',
                'value' => 'https://wa.me/201012345678',
                'type' => SettingTypes::URL,
                'group' => SettingGroups::SOCIAL,
            ],
            [
                'name' => 'telegram',
                'value' => 'https://t.me/edgesgate',
                'type' => SettingTypes::URL,
                'group' => SettingGroups::SOCIAL,
            ],

            // SEO Settings
            [
                'name' => 'meta_title',
                'value' => 'Edges Gate - Your Gate for Endless Software Development',
                'type' => SettingTypes::TEXT,
                'group' => SettingGroups::SEO,
            ],
            [
                'name' => 'meta_description',
                'value' => 'Your gate for endless software development. We craft innovative web, mobile, and software solutions.',
                'type' => SettingTypes::TEXT,
                'group' => SettingGroups::SEO,
            ],
            [
                'name' => 'meta_keywords',
                'value' => 'software development, web design, mobile apps, digital solutions, Egypt, Cairo',
                'type' => SettingTypes::TEXT,
                'group' => SettingGroups::SEO,
            ],
            [
                'name' => 'og_image',
                'value' => '',
                'type' => SettingTypes::IMAGE,
                'group' => SettingGroups::SEO,
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['name' => $setting['name']],
                $setting
            );
        }
    }
}

