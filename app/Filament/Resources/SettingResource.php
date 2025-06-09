<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\EditAction;


class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('label'),
                \Filament\Tables\Columns\TextColumn::make('value')->limit(40),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make()
                    ->form(function (Setting $record) {
                        switch ($record->type) {
                            case 'text':
                                return [
                                    Forms\Components\TextInput::make('value')
                                        ->label($record->label),
                                ];
                            case 'longtext':
                                return [
                                    Forms\Components\RichEditor::make('value')
                                        ->label($record->label)
                                        ->columnSpan('full'),
                                ];
                        }
                        return [];
                    }),
            ])
            ->bulkActions([
                // DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSettings::route('/'),
        ];
    }
}
