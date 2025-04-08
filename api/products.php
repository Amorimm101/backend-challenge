<?php

require_once __DIR__ . '/../lib/Response.php';
$products = require __DIR__ . '/../data/productsData.php';

function removeAccents($string) {
    $map = [
        'á'=>'a','à'=>'a','â'=>'a','ã'=>'a','ä'=>'a',
        'é'=>'e','è'=>'e','ê'=>'e','ë'=>'e',
        'í'=>'i','ì'=>'i','î'=>'i','ï'=>'i',
        'ó'=>'o','ò'=>'o','ô'=>'o','õ'=>'o','ö'=>'o',
        'ú'=>'u','ù'=>'u','û'=>'u','ü'=>'u',
        'ç'=>'c',
        'Á'=>'A','À'=>'A','Â'=>'A','Ã'=>'A','Ä'=>'A',
        'É'=>'E','È'=>'E','Ê'=>'E','Ë'=>'E',
        'Í'=>'I','Ì'=>'I','Î'=>'I','Ï'=>'I',
        'Ó'=>'O','Ò'=>'O','Ô'=>'O','Õ'=>'O','Ö'=>'O',
        'Ú'=>'U','Ù'=>'U','Û'=>'U','Ü'=>'U',
        'Ç'=>'C',
    ];
    return strtr($string, $map);
}


$search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT) ?: 1;
$perPage = filter_input(INPUT_GET, 'per_page', FILTER_VALIDATE_INT) ?: 6;
$sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($search) {
    $search = strtolower(trim($search));
    $search = removeAccents($search);

    $products = array_filter($products, function($product) use ($search) {
        $productName = strtolower($product['name']);
        $productName = removeAccents($productName);
        return strpos($productName, $search) !== false;
    });
    $products = array_values($products);
}

if (in_array($sort, ['asc', 'desc'])) {
    usort($products, function($a, $b) use ($sort) {
        return $sort === 'asc'
            ? $a['amount'] <=> $b['amount']
            : $b['amount'] <=> $a['amount'];
    });
}

$total = count($products);
$start = ($page - 1) * $perPage;
$paginated = array_slice($products, $start, $perPage);

$response = [
    'data' => $paginated,
    'pagination' => [
        'page' => $page,
        'per_page' => $perPage,
        'total' => $total,
        'total_pages' => ceil($total / $perPage),
    ]
];

Response::json($response);
