<?php

namespace App\Filament\Pages\Settings;

use Closure;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\RichEditor;
use Outerweb\FilamentSettings\Filament\Pages\Settings as BaseSettings;
use Filament\Forms\Components\FileUpload;

class Settings extends BaseSettings
{
    protected static ?int $navigationSort = 19;
    public static function getNavigationLabel(): string
    {
        return __('Paramètres'); // Use a translation function for localization
    }
    public function getTitle(): string
    {
        return 'Paramètres';
    }
    public function schema(): array|Closure
    {
        return [
            Tabs::make('Paramètres')
                ->schema([
                    Tabs\Tab::make('Général')
                        ->schema([
                            TextInput::make('general.brand_name')
                                ->label('Nom de la marque')
                                ->placeholder('Entrez le nom de la marque')
                                ->required(),
                            FileUpload::make('general.logo')
                                ->label('Logo')
                                ->image()
                                ->required(),
                        ]),
                    Tabs\Tab::make('SEO (Google)')
                        ->schema([
                            TextInput::make('seo.title')
                                ->label('Titre SEO')
                                ->placeholder('Entrez le titre SEO')
                                ->required(),
                            TextInput::make('seo.description')
                                ->label('Description SEO')
                                ->placeholder('Entrez la description SEO')
                                ->required(),
                        ]),
                    Tabs\Tab::make('Téléphone')
                        ->schema([
                            TextInput::make('Tel Chênée')
                                ->label('Tel Chênée')
                                ->placeholder('Entrez le numéro de téléphone pour Chênée')
                                ->required(),
                            TextInput::make('Tel Aye')
                                ->label('Tel Aye')
                                ->placeholder('Entrez le numéro de téléphone pour Aye')
                                ->required(),
                        ]),
                    Tabs\Tab::make('Détails de contact')
                        ->schema([
                            Fieldset::make('Informations de contact')
                                ->schema([
                                    TextInput::make('contact.email')
                                        ->label('Email')
                                        ->placeholder('Entrez l\'email de contact')
                                        ->required(),
                                    TextInput::make('contact.phone')
                                        ->label('Téléphone')
                                        ->placeholder('Entrez le numéro de téléphone de contact')
                                        ->required(),
                                ]),
                            Fieldset::make('Adresse 1')
                                ->schema([
                                    TextInput::make('contact.address1.street')
                                        ->label('Rue')
                                        ->placeholder('Entrez le nom de la rue')
                                        ->required(),
                                    TextInput::make('contact.address1.number')
                                        ->label('Numéro')
                                        ->placeholder('Entrez le numéro de rue')
                                        ->required(),
                                    TextInput::make('contact.address1.postal_code')
                                        ->label('Code postal')
                                        ->placeholder('Entrez le code postal')
                                        ->required(),
                                    TextInput::make('contact.google_map1')
                                        ->label('URL Google Map')
                                        ->placeholder('Entrez l\'URL Google Map pour l\'Adresse 1')
                                        ->url()
                                        ->required(),
                                ]),
                            Fieldset::make('Adresse 2')
                                ->schema([
                                    TextInput::make('contact.address2.street')
                                        ->label('Rue')
                                        ->placeholder('Entrez le nom de la rue')
                                        ->required(),
                                    TextInput::make('contact.address2.number')
                                        ->label('Numéro')
                                        ->placeholder('Entrez le numéro de rue')
                                        ->required(),
                                    TextInput::make('contact.address2.postal_code')
                                        ->label('Code postal')
                                        ->placeholder('Entrez le code postal')
                                        ->required(),
                                    TextInput::make('contact.google_map2')
                                        ->label('URL Google Map')
                                        ->placeholder('Entrez l\'URL Google Map pour l\'Adresse 2')
                                        ->url()
                                        ->required(),
                                ]),
                            Fieldset::make('Réseaux sociaux')
                                ->schema([
                                    TextInput::make('contact.facebook')
                                        ->label('Facebook')
                                        ->placeholder('Entrez l\'URL Facebook')
                                        ->url()
                                        ->required(),
                                    TextInput::make('contact.instagram')
                                        ->label('Instagram')
                                        ->placeholder('Entrez l\'URL Instagram')
                                        ->url()
                                        ->required(),
                                    TextInput::make('contact.linkedin')
                                        ->label('LinkedIn')
                                        ->placeholder('Entrez l\'URL LinkedIn')
                                        ->url()
                                        ->required(),
                                ]),
                        ]),
                    Tabs\Tab::make('Conditions')
                        ->schema([
                            RichEditor::make('conditions.generales')
                                ->label('Conditions Générales')
                                ->placeholder('Entrez les conditions générales')
                                ->required(),
                            RichEditor::make('conditions.vie_privee')
                                ->label('Vie Privée')
                                ->placeholder('Entrez les informations de vie privée')
                                ->required(),
                        ]),
                    Tabs\Tab::make('Horaires')
                        ->schema([
                            TextInput::make('horaires.lundi')
                                ->label('Lundi')
                                ->placeholder('Entrez les horaires pour lundi')
                                ->required(),
                            TextInput::make('horaires.mardi')
                                ->label('Mardi')
                                ->placeholder('Entrez les horaires pour mardi')
                                ->required(),
                            TextInput::make('horaires.mercredi')
                                ->label('Mercredi')
                                ->placeholder('Entrez les horaires pour mercredi')
                                ->required(),
                            TextInput::make('horaires.jeudi')
                                ->label('Jeudi')
                                ->placeholder('Entrez les horaires pour jeudi')
                                ->required(),
                            TextInput::make('horaires.vendredi')
                                ->label('Vendredi')
                                ->placeholder('Entrez les horaires pour vendredi')
                                ->required(),
                            TextInput::make('horaires.samedi')
                                ->label('Samedi')
                                ->placeholder('Entrez les horaires pour samedi')
                                ->required(),
                            TextInput::make('horaires.dimanche')
                                ->label('Dimanche')
                                ->placeholder('Entrez les horaires pour dimanche')
                                ->required(),
                        ]),
                ]),
        ];
    }
}
