<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Schema org support',
    'description' => '',
    'category' => 'frontend',
    'author' => 'Georg Ringer',
    'author_email' => 'mail@ringer.it',
    'state' => 'beta',
    'clearCacheOnLoad' => true,
    'version' => '0.4.0',
    'constraints' =>
        [
            'depends' => [
                'typo3' => '10.4.99-12.9.99'
            ],
            'conflicts' => [],
            'suggests' => [],
        ]
];
