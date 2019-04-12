<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Schema org support',
    'description' => '',
    'category' => 'frontend',
    'author' => 'Georg Ringer',
    'author_email' => 'mail@ringer.it',
    'state' => 'beta',
    'clearCacheOnLoad' => true,
    'version' => '0.1.0',
    'constraints' =>
        [
            'depends' => [
                'typo3' => '8.7.0-9.5.99'
            ],
            'conflicts' => [],
            'suggests' => [],
        ]
];
