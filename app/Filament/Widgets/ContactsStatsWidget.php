<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContactsStatsWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Messages', Contact::count())
                ->description('All contact messages')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('primary'),

            Stat::make('Unread Messages', Contact::where('readed', false)->count())
                ->description('Awaiting response')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('danger'),

            Stat::make('Read Messages', Contact::where('readed', true)->count())
                ->description('Already reviewed')
                ->descriptionIcon('heroicon-m-envelope-open')
                ->color('success'),
        ];
    }
}

