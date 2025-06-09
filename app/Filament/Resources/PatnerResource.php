<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatnerResource\Pages;
use App\Filament\Resources\PatnerResource\RelationManagers;
use App\Models\Patner;
use Filament\Forms;
use Filament\Forms\Components\Section as FormSection;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class PatnerResource extends Resource
{
    protected static ?string $model = Patner::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-top-right-on-square';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            FormSection::make()->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('thumbnail')
                    ->required()->image()->disk('public'),

                Forms\Components\RichEditor::make('content')
                    ->required(),

                Forms\Components\TextInput::make('link')
                    ->required()
                    ->maxLength(255),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('link')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->after(function (Collection $records){
                        foreach($records as $key => $value){
                            if($value->thumbnail){
                                Storage::disk('public')->delete($value->thumbnail);
                            }
                        }
                    }),
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
            'index' => Pages\ListPatners::route('/'),
            'create' => Pages\CreatePatner::route('/create'),
            'edit' => Pages\EditPatner::route('/{record}/edit'),
        ];
    }
}
