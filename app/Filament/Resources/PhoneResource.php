<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PhoneResource\Pages;
use App\Filament\Resources\PhoneResource\RelationManagers;
use App\Models\Phone;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PhoneResource extends Resource
{
    protected static ?string $model = Phone::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Basic Information')->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->label('Name'),
    
                        Forms\Components\TextInput::make('brand')
                            ->required()
                            ->label('Brand'),
    
                        Forms\Components\DatePicker::make('release_date')
                            ->label('Release Date'),
                    ]),
                    Forms\Components\FileUpload::make('image_path')
                        ->directory('images')
                        ->label('Image'),
    
                    Forms\Components\Textarea::make('description')
                        ->label('Description'),
                ]),
    
                // Display Specifications
                Forms\Components\Fieldset::make('Display Specifications')->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('display_size')
                        ->label('Display Size')
                        ->placeholder('e.g., 6.1 inches'),
        
                        Forms\Components\TextInput::make('display_resolution')
                            ->label('Display Resolution')
                            ->placeholder('e.g., 1080x2400'),
        
                        Forms\Components\TextInput::make('display_technology')
                            ->label('Display Technology')
                            ->placeholder('e.g., OLED'),
        
                        Forms\Components\TextInput::make('display_refresh_rate')
                            ->numeric()
                            ->label('Display Refresh Rate (Hz)')
                            ->placeholder('e.g., 120'),
        
                        Forms\Components\TextInput::make('display_brightness')
                            ->label('Display Brightness')
                            ->placeholder('e.g., 800 nits'),
                    ]),
                ]),
    
                // Camera Specifications
                Forms\Components\Fieldset::make('Camera Specifications')->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('main_camera_setup')
                        ->label('Main Camera Setup')
                        ->placeholder('e.g., Triple-lens'),
        
                        Forms\Components\Textarea::make('main_camera_features')
                            ->label('Main Camera Features')
                            ->placeholder('e.g., Night Mode, HDR'),
        
                        Forms\Components\TextInput::make('main_camera_video')
                            ->label('Main Camera Video')
                            ->placeholder('e.g., 4K at 30fps'),
        
                        Forms\Components\TextInput::make('selfie_camera')
                            ->label('Selfie Camera')
                            ->placeholder('e.g., 12 MP'),
        
                        Forms\Components\TextInput::make('selfie_camera_video')
                            ->label('Selfie Camera Video')
                            ->placeholder('e.g., 1080p at 30fps'),
                    ]),
                ]),
    
                // Battery Specifications
                Forms\Components\Fieldset::make('Battery Specifications')->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('battery_capacity')
                        ->label('Battery Capacity')
                        ->placeholder('e.g., 4000 mAh'),
    
                        Forms\Components\TextInput::make('battery_type')
                            ->label('Battery Type')
                            ->placeholder('e.g., Li-Ion'),
        
                        Forms\Components\TextInput::make('charging_speed')
                            ->label('Charging Speed')
                            ->placeholder('e.g., 25W'),
        
                        Forms\Components\Toggle::make('wireless_charging')
                            ->label('Wireless Charging'),
                    ]),
                ]),
    
                // Memory and Storage
                Forms\Components\Fieldset::make('Memory and Storage')->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('ram')
                        ->label('RAM')
                        ->placeholder('e.g., 8 GB'),
        
                        Forms\Components\TextInput::make('storage')
                            ->label('Storage')
                            ->placeholder('e.g., 128 GB'),
        
                        Forms\Components\Toggle::make('expandable_storage')
                            ->label('Expandable Storage'),
                    ]),
                ]),
    
                // Operating System and Processor
                Forms\Components\Fieldset::make('Operating System & Processor')->schema([
                    Forms\Components\Grid::make(3)->schema([

                    Forms\Components\TextInput::make('os')
                        ->label('Operating System')
                        ->placeholder('e.g., Android 12'),
    
                    Forms\Components\Select::make('mobilesoc_id')
                        ->relationship('mobileSoc', 'name')
                        ->label('Mobile SOC'),
    
                    Forms\Components\TextInput::make('gpu')
                        ->label('GPU')
                        ->placeholder('e.g., Adreno 660'),
                    ]),
                ]),
    
                // Connectivity
                Forms\Components\Fieldset::make('Connectivity')->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('network_technology')
                        ->label('Network Technology')
                        ->placeholder('e.g., 5G'),
    
                        Forms\Components\TextInput::make('sim_type')
                            ->label('SIM Type')
                            ->placeholder('e.g., Dual SIM (Nano-SIM)'),
        
                        Forms\Components\TextInput::make('usb')
                            ->label('USB')
                            ->placeholder('e.g., USB Type-C'),
        
                        Forms\Components\Toggle::make('wifi')->label('Wi-Fi'),
                        Forms\Components\Toggle::make('bluetooth')->label('Bluetooth'),
                        Forms\Components\Toggle::make('gps')->label('GPS'),
                        Forms\Components\Toggle::make('nfc')->label('NFC'),
                    ]),
                ]),
    
                // Additional Features
                Forms\Components\Fieldset::make('Additional Features')->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('fingerprint_sensor')
                        ->label('Fingerprint Sensor')
                        ->placeholder('e.g., Under Display'),
                        
                    Forms\Components\TextInput::make('speaker')
                        ->label('Speaker')
                        ->placeholder('e.g., Stereo Speakers'),
    
                    Forms\Components\TextInput::make('audio_jack')
                        ->label('Audio Jack')
                        ->placeholder('e.g., 3.5mm'),
                        
                    Forms\Components\Toggle::make('face_recognition')
                        ->label('Face Recognition'),
    
                    Forms\Components\Toggle::make('water_resistance')
                        ->label('Water Resistance'),
                            
                    Forms\Components\Toggle::make('is_featured')
                    ->label('Featured'),
    


                    Forms\Components\Textarea::make('other_features')
                        ->label('Other Features')
                        ->placeholder('Any additional features'),
                    ]),
                  
                ]),
    
                // Specification Description
                Forms\Components\Textarea::make('spec_description')
                    ->label('Specification Description')
                    ->placeholder('Description of specifications or extra details'),
            ]);
    }
    
    


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('brand')
                    ->label('Brand')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('release_date')
                    ->label('Release Date')
                    ->sortable(),

                Tables\Columns\TextColumn::make('is_featured')
                    ->label('Featured'),

                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Image'),

                Tables\Columns\TextColumn::make('display_size')
                    ->label('Display Size')
                    ->sortable(),

                Tables\Columns\TextColumn::make('battery_capacity')
                    ->label('Battery Capacity')
                    ->sortable(),
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
            'index' => Pages\ListPhones::route('/'),
            'create' => Pages\CreatePhone::route('/create'),
            'edit' => Pages\EditPhone::route('/{record}/edit'),
        ];
    }
}
