<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Widgets\MosqueTableWidget;
use App\Filament\Pages\MosquePage;
use App\Filament\Pages\Dashboard;
use App\Filament\Mosque\Widgets\MosqueInfoWidget;

class MosquePanelProvider extends PanelProvider
{

    protected static bool $shouldRegisterNavigation = false;
    protected int | string | array $columnSpan = 'full';
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('mosque')
            ->path('mosque')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Mosque/Resources'), for: 'App\\Filament\\Mosque\\Resources')
            ->discoverPages(in: app_path('Filament/Mosque/Pages'), for: 'App\\Filament\\Mosque\\Pages')
            ->pages([
                Pages\Dashboard::class,
                // MosquePage::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Mosque/Widgets'), for: 'App\\Filament\\Mosque\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
                MosqueTableWidget::class,
                MosqueInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                // Authenticate::class,
            ]) ->topNavigation();
    }


    public static function shouldRegisterNavigation(): bool
{
    return false;
}
}
