<?php

return [
    'dev' => [
        'class' => 'common\components\Redis',
        'hosts' => [
            'redis.tomtop.com:7000',
            'redis.tomtop.com:7001',
            'redis.tomtop.com:7002'
        ]
    ],
    'test' => [
        'class' => 'common\components\Redis',
        'hosts' => [
            'redis.tomtop.com:7000',
            'redis.tomtop.com:7001',
            'redis.tomtop.com:7002'
        ]
    ],
    'uat' => [
        'class' => 'common\components\Redis',
        'hosts' => [
            '172.31.36.130:7000',
            '172.31.35.246:7000',
            '172.31.46.224:7000',
            '172.31.45.84:7000',
            '172.31.38.147:7000',
            '172.31.37.227:7000'
        ]
    ],
    'prod' => [
        'class' => 'common\components\Redis',
        'hosts' => [
            '172.31.36.130:7000',
            '172.31.35.246:7000',
            '172.31.46.224:7000',
            '172.31.45.84:7000',
            '172.31.38.147:7000',
            '172.31.37.227:7000'
        ]
    ],
];
?>