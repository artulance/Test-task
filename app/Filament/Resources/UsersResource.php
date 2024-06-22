<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UsersResource\Pages;
use App\Filament\Resources\UsersResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
//php artisan make:filament-resource Users
class UsersResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $label = 'Usuarios';

    protected static ?string $navigationGroup = 'Configuración';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Nombre') //Necesito poner label porque no lo pilla automaticamente en mayusculas
                ->required(),
                Forms\Components\TextInput::make('email')
                ->label('Email')
                ->unique(table: User::class, ignoreRecord: true)
                ->required(),
                Forms\Components\TextInput::make('password')
                ->label('Contraseña')
                ->required()
                ->revealable()
                ->confirmed()
                ->password()
                ->hiddenOn('view'),
                Forms\Components\TextInput::make('password_confirmation')
                ->label('Confirmar contraseña')
                ->required()
                ->revealable()
                ->password()
                ->hiddenOn('view'),
              
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\Layout\Split::make([
                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('name')
                            ->searchable()
                            ->sortable()
                            ->weight('medium'),

                        Tables\Columns\TextColumn::make('email')
                            ->searchable()
                            ->sortable()
                            ->copyable()
                            ->color('gray'),
                     
                    ]),
                    
                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('email')
                        ->searchable()
                        ->sortable()
                        ->copyable()
                        ->color('gray'),
                     
                    ]),
               
  
                ]),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUsers::route('/create'),
            'edit' => Pages\EditUsers::route('/{record}/edit'),
        ];
    }
}
