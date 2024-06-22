<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GroupTaskResource\Pages;
use App\Filament\Resources\GroupTaskResource\RelationManagers;
use App\Models\GroupTask;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
//php artisan make:filament-resource GroupTask
class GroupTaskResource extends Resource
{
    protected static ?string $model = GroupTask::class;

    protected static ?string $navigationIcon = 'heroicon-c-archive-box';

    protected static ?string $label = 'Grupos de tareas';

    protected static ?string $navigationGroup = 'Tareas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Nombre') 
                ->required(),
                Forms\Components\TextArea::make('description')
                ->label('Descripcion')
                ->minLength(1)
                ->maxLength(191)
                ->autosize()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable()
                ->weight('medium'),

                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->sortable()
                    ->copyable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListGroupTasks::route('/'),
            'create' => Pages\CreateGroupTask::route('/create'),
            'edit' => Pages\EditGroupTask::route('/{record}/edit'),
        ];
    }
}
