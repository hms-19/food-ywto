<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Closure;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestOrders extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
 
    protected function getTableQuery(): Builder
    {
        return Order::query()->latest();
    }
 
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('user.name')->label('Username'),
            Tables\Columns\TextColumn::make('user.email')->label('Email'),
            Tables\Columns\TextColumn::make('user.phone')->label('Phone'),
            Tables\Columns\TextColumn::make('township'),
            Tables\Columns\TextColumn::make('street'),
            Tables\Columns\TextColumn::make('status'),
            Tables\Columns\TextColumn::make('created_at')
        ];
    }
}
