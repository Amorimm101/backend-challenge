<?php
class Response
{
    public static function json($data, $status = 200)
    {
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');

        $allowedOrigins = [
            'http://localhost:5173',
            'https://frontend-challenge-three-delta.vercel.app'
        ];

        $origin = $_SERVER['HTTP_ORIGIN'] ?? '';
        if (in_array($origin, $allowedOrigins)) {
            header("Access-Control-Allow-Origin: $origin");
            header("Vary: Origin");
        }

        echo json_encode($data);
        exit;
    }
}


