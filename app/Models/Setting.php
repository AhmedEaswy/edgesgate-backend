<?php

namespace App\Models;

use App\Enums\SettingGroups;
use App\Enums\SettingTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'value',
        'is_active',
        'type',
        'group',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'type' => SettingTypes::class,
            'group' => SettingGroups::class,
        ];
    }

    /**
     * Scope a query to only include active settings.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to filter by group.
     */
    public function scopeInGroup($query, SettingGroups $group)
    {
        return $query->where('group', $group);
    }

    /**
     * Scope a query to filter by type.
     */
    public function scopeOfType($query, SettingTypes $type)
    {
        return $query->where('type', $type);
    }
}

