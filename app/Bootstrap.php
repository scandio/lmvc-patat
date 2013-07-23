<?php

use troba\EQM\EQM;
use Scandio\lmvc\LVC;
use Scandio\lmvc\modules\assetpipeline;
use Scandio\lmvc\modules\upload;

class Bootstrap extends \Scandio\lmvc\Bootstrap
{
    public function initialize()
    {
        EQM::initialize([
            'dsn' => LVC::get()->config->dsn,
            'username' => LVC::get()->config->username,
            'password' => LVC::get()->config->password
        ]);

        ui\UI::registerSnippetDirectory(static::getPath() . '/ui/snippets/');

        assetpipeline\Bootstrap::configure([
            'useFolders'    => true,
            'assetRootDirectory' => static::getPath(),
            'assetDirectories' => [
                'js'    => [
                    'fallbacks'  => ['../bower', '../composer']
                ],
                'coffee'    => [
                    'fallbacks'  => ['../bower', '../composer']
                ],
                'css'    => [
                    'fallbacks'  => ['../bower', '../composer']
                ],
                'sass'    => [
                    'fallbacks'  => ['../bower', '../composer']
                ],
                'less'    => [
                    'fallbacks'  => ['../bower', '../composer']
                ],
                'img'    => [
                    'fallbacks'  => []
                ]
            ]
        ]);

        upload\Bootstrap::configure([
            'root'              => static::getPath(),
            'uploadDirectory'   => 'img/uploads'
        ]);
    }
}