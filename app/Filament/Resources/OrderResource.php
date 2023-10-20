<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms;
use Filament\Resources\Form;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-menu';

    protected static ?string $navigationGroup = 'Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Forms\Components\TextInput::make('id')->disabledOn('edit'),
                Forms\Components\TextInput::make('ward')->disabledOn('edit'),
                Forms\Components\TextInput::make('street')->disabledOn('edit'),
                Forms\Components\TextInput::make('number')->disabledOn('edit'),
                Forms\Components\TextInput::make('township')->disabledOn('edit'),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'delivering' => 'Delivering',
                        'done' => 'Done',
                        'cancel' => 'Cancel',
                        'refund' => 'Refund',
                    ])
                    ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('user.name')->label('Username'),
                Tables\Columns\TextColumn::make('user.email')->label('Email'),
                Tables\Columns\TextColumn::make('user.phone')->label('Phone'),
                // Tables\Columns\TextColumn::make('ward'),
                // Tables\Columns\TextColumn::make('number'),
                Tables\Columns\TextColumn::make('township'),
                Tables\Columns\TextColumn::make('street'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                // Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label(false)->tooltip('View')->size('md'),
                Tables\Actions\EditAction::make()->label(false)->tooltip('Edit')->size('md'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }    
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
