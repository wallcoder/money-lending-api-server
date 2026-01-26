<?php

namespace App\Providers;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Table::configureUsing(function (Table $table): void {
            $table
                ->defaultCurrency('INR')
                ->defaultNumberLocale('en_IN');
        });
        Schema::configureUsing(function (Schema $schema): void {
            $schema
                ->defaultCurrency('INR')
                ->defaultNumberLocale('en_IN');
        });

        EditAction::configureUsing(function(EditAction $action){
            return $action->iconButton();
        });
        ViewAction::configureUsing(function(ViewAction $action){
            return $action->iconButton();
        });
        DeleteAction::configureUsing(function(DeleteAction $action){
            return $action->iconButton();
        });

    }
}
