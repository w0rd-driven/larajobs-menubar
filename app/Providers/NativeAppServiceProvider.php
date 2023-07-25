<?php

namespace App\Providers;

use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Menu\Menu;

class NativeAppServiceProvider
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        $refreshLink = config('nativephp.deeplink_scheme') . '://refresh';

        MenuBar::create()
            ->icon(storage_path('app/menuBarIcon.png'))
            ->withContextMenu(
                Menu::new()
                    ->label('Larajobs Job Monitor')
                    ->separator()
                    ->link('https://larajobs.com', 'Learn more…')
                    ->separator()
                    ->quit()
            );
    }
}
