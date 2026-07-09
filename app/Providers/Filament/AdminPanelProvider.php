<?php

namespace App\Providers\Filament;

use App\Filament\Resources\Posts\PostResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\HtmlString;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->homeUrl(fn (): string => PostResource::getUrl())
            ->colors([
                'primary' => Color::Amber,
            ])
            ->sidebarCollapsibleOnDesktop()
            ->sidebarWidth('15rem')
            ->collapsedSidebarWidth('4rem')
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn (): HtmlString => new HtmlString(
                    // On first visit, start sidebar collapsed (icon-only)
                    '<script>if(localStorage.getItem("isOpenDesktop")===null){localStorage.setItem("isOpenDesktop","false");}</script>'
                ),
            )
            ->renderHook(
                PanelsRenderHook::TOPBAR_END,
                fn (): HtmlString => new HtmlString(
                    '<div style="display:flex;align-items:center;padding-right:1.25rem;">'
                    . '<img src="/images/logo-endocrinologista.png" alt="Dra. Isis Toledo" '
                    . 'style="height:26px;width:auto;filter:brightness(0) invert(1);opacity:0.7;">'
                    . '</div>'
                ),
            )
            ->renderHook(
                PanelsRenderHook::AUTH_LOGIN_FORM_AFTER,
                fn (): HtmlString => new HtmlString(<<<'HTML'
<script>
(function () {
    const syncField = function (field) {
        if (!field) {
            return;
        }

        field.dispatchEvent(new Event('input', { bubbles: true, cancelable: true }));
        field.dispatchEvent(new Event('change', { bubbles: true, cancelable: true }));
    };

    const bindLoginForm = function () {
        document.querySelectorAll('form.fi-sc-form').forEach(function (form) {
            if (form.dataset.autofillSyncBound === '1') {
                return;
            }

            form.dataset.autofillSyncBound = '1';

            const syncForm = function () {
                syncField(form.querySelector('input[wire\\:model="data.email"]'));
                syncField(form.querySelector('input[wire\\:model="data.password"]'));
                syncField(form.querySelector('input[wire\\:model="data.remember"]'));
            };

            form.addEventListener('submit', syncForm, true);

            setTimeout(syncForm, 150);
            setTimeout(syncForm, 600);
            setTimeout(syncForm, 1500);
        });
    };

    document.addEventListener('DOMContentLoaded', bindLoginForm);
    document.addEventListener('livewire:init', bindLoginForm);
    document.addEventListener('livewire:navigated', bindLoginForm);
})();
</script>
HTML),
            )
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                ValidateCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
