<?php

use App\Repositories\SettingsRepositoryEloquent;

class SettingsSeeder extends DatabaseSeeder
{
    private $settingsRepository;

    public function run()
    {


        $this->settingsRepository = new SettingsRepositoryEloquent(app());

        $this->settingsRepository->setKey('site_name', 'Workets');
        $this->settingsRepository->setKey('site_logo', 'logo.png');
        $this->settingsRepository->setKey('site_email', 'hola@workets.com');
        $this->settingsRepository->setKey('allowed_extensions', 'gif,jpg,jpeg,png,pdf,txt');
        $this->settingsRepository->setKey('backup_type', 'local');
        $this->settingsRepository->setKey('email_driver', 'mail');
        $this->settingsRepository->setKey('minimum_characters', 3);
        $this->settingsRepository->setKey('date_format', 'F j,Y');
        $this->settingsRepository->setKey('time_format', 'H:i');
        $this->settingsRepository->setKey('date_time_format', 'F j,Y H:i');
    }
}
