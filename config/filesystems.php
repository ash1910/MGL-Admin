<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. A "local" driver, as well as a variety of cloud
    | based drivers are available for your choosing. Just store away!
    |
    | Supported: "local", "ftp", "s3", "rackspace"
    |
    */

    'default' => 'local',

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => 's3',

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root'   => storage_path('app'),
        ],

        // 'public' => [
        //     'driver'     => 'local',
        //     'root'       => storage_path('app/public'),
        //     'visibility' => 'public',
        // ],

        // 'public' => [
        //     'driver'     => 'local',
        //     'root'       => public_path(),
        //     'visibility' => 'public',
        // ],

        // 'public' => [
        //     'driver' => 'local',
        //     'root' => storage_path('app/public'),
        //     'url' => env('APP_URL').'/storage',
        //     'visibility' => 'public',
        // ],

        'public' => [
            'driver' => 'local',
            'root'   => public_path(),
            'url' => env('APP_URL'),
            'visibility' => 'public',
        ],

        'uploads' => [ // used for Backpack/CRUD (in elFinder)
            'driver' => 'local',
            'root'   => public_path('uploads'),
        ],

        'backups' => [ // used for Backpack/BackupManager
            'driver' => 'local',
            'root'   => storage_path('backups'), // that's where your backups are stored by default: storage/backups
        ],

        'storage' => [ // used for Backpack/LogManager
            'driver' => 'local',
            'root'   => storage_path(),
        ],

        's3' => [
            'driver' => 's3',
            'key'    => 'your-key',
            'secret' => 'your-secret',
            'region' => 'your-region',
            'bucket' => 'your-bucket',
        ],

    ],

];
