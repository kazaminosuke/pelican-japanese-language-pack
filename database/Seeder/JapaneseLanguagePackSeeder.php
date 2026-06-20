<?php

namespace Kazaminosuke\JapaneseLanguagePack\Database\Seeder;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class JapaneseLanguagePackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Copies vendor package translation overrides (e.g. filament-panels)
     * from the plugin's lang/ja/vendor directory into the panel's
     * base lang/vendor directory, so they get picked up by Laravel's
     * translation loader.
     */
    public function run(): void
    {
        $source = __DIR__.'/../../lang/ja/vendor';
        $destination = base_path('lang/vendor');

        if (! File::exists($source)) {
            return;
        }

        File::ensureDirectoryExists($destination);

        // Copy each vendor package folder (e.g. filament-panels) individually
        // so we don't overwrite unrelated vendor translations.
        foreach (File::directories($source) as $packageDir) {
            $packageName = basename($packageDir);
            $packageDestination = $destination.'/'.$packageName.'/ja';

            File::ensureDirectoryExists(dirname($packageDestination));
            File::copyDirectory($packageDir.'/ja', $packageDestination);
        }
    }
}
