<?php

require_once __DIR__ . '/../lib/Response.php';
$products = require __DIR__ . '/../data/productsData.php';

function removeAccents($string) {
    return strtr(utf8_decode($string),
        utf8_decode('áàâãäçéèêëíìîïñóòôõöúùûüÁÀÂÃÄÇÉÈÊËÍÌÎÏÑÓÒÔÕÖÚÙÛÜ'),
        'aaaaaceeeeiiiinooooouuuuAAAAACEEEEIIIINOOOOOUUUU'
    );
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
