<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Models\Status;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;
//php artisan make:filament-resource Task
class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-s-document-minus';

    protected static ?string $label = 'Tareas';

    protected static ?string $navigationGroup = 'Tareas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                ->default(
                    auth()->id()
                ),
                Forms\Components\Hidden::make('status')
                ->default(1),
                Forms\Components\TextInput::make('name')
                ->label('Nombre') 
                ->required(),
                Forms\Components\TextArea::make('description')
                ->label('Descripcion')
                ->minLength(1)
                ->maxLength(191)
                ->autosize()
                ->required(),
                Forms\Components\Select::make('group_task_id')
                ->label('Grupo')
                ->relationship('groupTask', 'name')
                ->searchable()
                ->preload()
                ->required(),
                Forms\Components\Select::make('periodicity_id')
                ->label('Perioricidad')
                ->relationship('periodicity', 'name')
                ->searchable()
                ->preload()
                ->required(),

                Forms\Components\DateTimePicker::make('start_date')
                ->label('Fecha de inicio') 
                ->required(),
                Forms\Components\DateTimePicker::make('due_date')
                ->label('Fecha de fin') 
                ->required(),
                Forms\Components\TextInput::make('iteration')
                ->label('Repeticiones') 
                ->numeric()
                ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        $statuses = Status::all()->pluck('name', 'id')->toArray();
        return $table
            ->columns([
         
                    Tables\Columns\TextColumn::make('name')
                        ->searchable()
                        ->sortable()
                        ->label('Nombre'),

                    Tables\Columns\TextColumn::make('groupTask.name') 
                    ->label('Grupo')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\IconColumn::make('status') 
                    ->icon(fn (string $state): string => match ($state) {
                        '1' => 'heroicon-o-pencil',
                        '2' => 'heroicon-o-clock',
                        '3' => 'heroicon-o-check-circle',
                    })
                    // ->color(fn (string $state): string => match ($state) {
                    //     '1' => 'info',
                    //     '2' => 'warning',
                    //     '3' => 'success',
                    //     default => 'gray',
                    // })
                    ->label('Estado')
                    ->color(fn (Model $record) => $record->currentStatus->color)
                    ->sortable(),
                    Tables\Columns\TextColumn::make('due_date')
                    ->view('filament.tables.columns.date')
                    ->label('fecha de vencimiento')
                    ->sortable(),
                   
                    Tables\Columns\SelectColumn::make('status') 
                    // ->options([
                    //     '1' => 'Abierta',
                    //     '2' => 'Pendiente',
                    //     '3' => 'Cerrada',
                    // ])
                    // ->options(fn (Model $record) => [$record->currentStatus->id => $record->currentStatus->name])
                    ->options($statuses)
                    ->label('Estado')
                    ->rules(['required']),

            ])->defaultSort('due_date', 'asc')->defaultSort('status', 'asc')
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
        //Para hacer select modificalbe desactivamos create y edit
        return [
            'index' => Pages\ListTasks::route('/'),
            // 'create' => Pages\CreateTask::route('/create'),
            // 'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }
}
