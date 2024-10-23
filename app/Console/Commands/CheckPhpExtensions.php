<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\Laravel\Facades\Image;

class CheckPhpExtensions extends Command
{
    protected $signature = 'check:php-extensions';
    protected $description = 'Check if required PHP extensions and libraries are installed';

    public function handle()
    {
        $this->info('Checking PHP extensions and libraries:');

        $this->checkExtension('mbstring', 'Mbstring');
        $this->checkExtension('gd', 'GD (Image Processing)');
        $this->checkExtension('exif', 'Exif');
        $this->checkInterventionImage();
    }

    private function checkExtension($extension, $name)
    {
        if (extension_loaded($extension)) {
            $this->info("$name: Installed");
        } else {
            $this->error("$name: Not installed");
        }
    }

    private function checkInterventionImage()
    {
        try {
            if (class_exists('Composer\InstalledVersions')) {
                $version = \Composer\InstalledVersions::getVersion('intervention/image-laravel');
                $this->info("Intervention Image: Installed (version $version)");
            } else {
                $this->info("Intervention Image: Installed (version unknown)");
            }
        } catch (\Exception $e) {
            $this->error("Intervention Image: Not installed or not properly configured");
        }
    }
}
