<?php

namespace App\Filament\Resources\Dues;

use App\Filament\Resources\Dues\Pages\CreateDue;
use App\Filament\Resources\Dues\Pages\EditDue;
use App\Filament\Resources\Dues\Pages\ListDues;
use App\Filament\Resources\Dues\Pages\ViewDue;
use App\Filament\Resources\Dues\Schemas\DueForm;
use App\Filament\Resources\Dues\Schemas\DueInfolist;
use App\Filament\Resources\Dues\Tables\DuesTable;
use App\Models\Due;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DueResource extends Resource
{
    protected static ?string $model = Due::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'id';

    protected static string|UnitEnum|null $navigationGroup = 'Finance';

    public static function form(Schema $schema): Schema
    {
        return DueForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DueInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DuesTable::configure($table);
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
            'index' => ListDues::route('/'),
            'create' => CreateDue::route('/create'),
            'view' => ViewDue::route('/{record}'),
            'edit' => EditDue::route('/{record}/edit'),
        ];
    }
}
