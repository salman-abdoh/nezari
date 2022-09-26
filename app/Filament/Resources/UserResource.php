<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Field;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $label = 'Users';

    protected static ?int $navigationSort = 7;
    public static function getModelLabel(): string
    {
        return __("ar.user");
    }

    public static function getPluralModelLabel(): string
    {
        return __("ar.users");
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->label(__('Name'))->placeholder((__('Write Name'))),
                Forms\Components\TextInput::make('email')->required()->email()->label(__('Email'))->placeholder((__('Write Email')))->unique(table: User::class),
                Forms\Components\TextInput::make('password')->required()->password()->label(__('Password'))->placeholder((__('Write Password')))->autocomplete('new-password')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label(__('ID'))->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable()->label(__('Name')),
                Tables\Columns\TextColumn::make('email')->searchable()->sortable()->label(__('Email'))->limit(50),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

}
