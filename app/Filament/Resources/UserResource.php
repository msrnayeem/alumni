<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getModelLabel(): string
    {
        return 'Student';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Students';
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('role', 'student');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => \Illuminate\Support\Facades\Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->maxLength(255),
                Forms\Components\TextInput::make('student_id')
                    ->maxLength(255),
                Forms\Components\TextInput::make('graduation_year')
                    ->numeric(),
                Forms\Components\TextInput::make('degree')
                    ->maxLength(255),
                Forms\Components\TextInput::make('major')
                    ->maxLength(255),
                Forms\Components\Hidden::make('role')
                    ->default('student'),
                Forms\Components\TextInput::make('username')
                    ->maxLength(255),
                Forms\Components\TextInput::make('registration_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('program')
                    ->maxLength(255),
                Forms\Components\TextInput::make('major_1')
                    ->maxLength(255),
                Forms\Components\TextInput::make('enrolment_semester')
                    ->maxLength(255),
                Forms\Components\TextInput::make('credit_completed')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cgpa')
                    ->maxLength(255),
                Forms\Components\TextInput::make('result_publication_date')
                    ->maxLength(255),
                Forms\Components\TextInput::make('current_status')
                    ->maxLength(255),
                Forms\Components\TextInput::make('certificate_serial')
                    ->maxLength(255),
                Forms\Components\TextInput::make('date_of_birth')
                    ->maxLength(255),
                Forms\Components\TextInput::make('gender')
                    ->maxLength(255),
                Forms\Components\TextInput::make('blood_group')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nationality')
                    ->maxLength(255),
                Forms\Components\TextInput::make('marital_status')
                    ->maxLength(255),
                Forms\Components\TextInput::make('religion')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nid_passport_no')
                    ->maxLength(255),
                Forms\Components\TextInput::make('mobile')
                    ->maxLength(255),
                Forms\Components\TextInput::make('present_address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('permanent_address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('father_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('father_occupation')
                    ->maxLength(255),
                Forms\Components\TextInput::make('mother_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('mother_occupation')
                    ->maxLength(255),
                Forms\Components\TextInput::make('emergency_contact')
                    ->maxLength(255),
                Forms\Components\TextInput::make('guardian_contact')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('profile_photo_path')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('profiles'),
                Forms\Components\FileUpload::make('signature_photo_path')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('signatures'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('student_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('graduation_year')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('degree')
                    ->searchable(),
                Tables\Columns\TextColumn::make('major')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('role')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('username')
                    ->searchable(),
                Tables\Columns\TextColumn::make('registration_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('program')
                    ->searchable(),
                Tables\Columns\TextColumn::make('major_1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('enrolment_semester')
                    ->searchable(),
                Tables\Columns\TextColumn::make('credit_completed')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cgpa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('result_publication_date')
                    ->searchable(),
                Tables\Columns\TextColumn::make('current_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('certificate_serial')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_of_birth')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('blood_group')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nationality')
                    ->searchable(),
                Tables\Columns\TextColumn::make('marital_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('religion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nid_passport_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mobile')
                    ->searchable(),
                Tables\Columns\TextColumn::make('present_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('permanent_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_occupation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_occupation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('emergency_contact')
                    ->searchable(),
                Tables\Columns\TextColumn::make('guardian_contact')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('profile_photo_path')
                    ->disk('public'),
                Tables\Columns\ImageColumn::make('signature_photo_path')
                    ->disk('public')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
