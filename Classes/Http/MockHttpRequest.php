<?php

namespace app\Http;

class MockHttpRequest extends HttpRequest
{
    public function send()
    {
        $resultObj = [
            'data' => [
                [
                    'value' => 8
                ],
                [
                    'value' => 9
                ],
                [
                    'value' => 85,
                    'alt' => 33
                ],
                [
                    'value' => 14,
                    'alt' => 54
                ]
            ]
        ];

        return json_encode($resultObj);
    }
}