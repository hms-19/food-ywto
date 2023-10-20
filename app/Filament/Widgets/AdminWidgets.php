<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class AdminWidgets extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Today Order', Order::whereDate('created_at', today())->count()),
            Card::make('Pending Order', Order::where('status', 'pending')->count()),
            Card::make('Delivered Order', Order::where('status', 'delivered')->count()),
            Card::make('Total Users', User::count()),
        ];
    }
}
