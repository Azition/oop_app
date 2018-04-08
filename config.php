<?php

return [
    'factory' => [
        'commands' => [
            [
                'class' => 'app\Commands\HttpCommand',
                'actions' => [
                    'app\Actions\SumCalculateAction',
                    'app\Actions\MultiplyCalculateAction',
                ]
            ],
            [
                'class' => 'app\Commands\MockCommand',
                'actions' => [
                    'app\Actions\SumCalculateAction',
                    'app\Actions\MultiplyCalculateAction',
                ]
            ],
        ]
    ]
];