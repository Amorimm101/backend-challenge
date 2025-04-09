<?php

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$baseUrl = $protocol . '://' . $host;

return [
    ["id" => 1, "name" => "Camiseta Branca", "description" => "100% algodão, unissex", "amount" => 59.90, "image" => "$baseUrl/images/camiseta-branca.jpeg"],
    ["id" => 2, "name" => "Calça Jeans", "description" => "Azul escura, skinny", "amount" => 119.90, "image" => "$baseUrl/images/calca-jeans.jpeg"],
    ["id" => 3, "name" => "Tênis Esportivo", "description" => "Solado emborrachado", "amount" => 199.90, "image" => "$baseUrl/images/tenis.jpeg"],
    ["id" => 4, "name" => "Jaqueta Couro", "description" => "Couro sintético", "amount" => 249.90, "image" => "$baseUrl/images/jaqueta-couro.jpeg"],
    ["id" => 5, "name" => "Meia Colorida", "description" => "Pacote com 5 pares", "amount" => 39.90, "image" => "$baseUrl/images/meia-colorida.jpeg"],
    ["id" => 6, "name" => "Boné Preto", "description" => "Ajustável, com aba curva", "amount" => 49.90, "image" => "$baseUrl/images/bone.jpeg"],
    ["id" => 7, "name" => "Relógio Digital", "description" => "Resistente à água, pulseira de silicone", "amount" => 149.90, "image" => "$baseUrl/images/relogio.jpeg"],
    ["id" => 8, "name" => "Óculos de Sol", "description" => "Proteção UV400, armação leve", "amount" => 89.90, "image" => "$baseUrl/images/oculos.jpeg"],
    ["id" => 9, "name" => "Mochila Escolar", "description" => "Compartimento para notebook", "amount" => 139.90, "image" => "$baseUrl/images/mochila.jpeg"],
    ["id" => 10, "name" => "Chinelo Slide", "description" => "Confortável, ideal para o verão", "amount" => 34.90, "image" => "$baseUrl/images/chinelo.jpeg"],
    ["id" => 11, "name" => "Camisa Social", "description" => "Algodão egípcio, manga longa", "amount" => 99.90, "image" => "$baseUrl/images/camiseta-social.jpeg"],
    ["id" => 12, "name" => "Bermuda Tactel", "description" => "Secagem rápida, bolsos laterais", "amount" => 64.90, "image" => "$baseUrl/images/bermuda.jpeg"],
    ["id" => 13, "name" => "Pulseira Fitness", "description" => "Monitora batimentos e passos", "amount" => 119.90, "image" => "$baseUrl/images/relogio.jpeg"],
    ["id" => 14, "name" => "Carteira Couro", "description" => "Várias divisórias, acabamento premium", "amount" => 79.90, "image" => "$baseUrl/images/carteira.jpeg"],
    ["id" => 15, "name" => "Cinto de Couro", "description" => "Fivela metálica, cor marrom", "amount" => 69.90, "image" => "$baseUrl/images/cinto.jpeg"],
    ["id" => 16, "name" => "Camiseta Estampada", "description" => "Estilo casual, malha leve", "amount" => 54.90, "image" => "$baseUrl/images/camiseta-branca.jpeg"],
    ["id" => 17, "name" => "Tênis Casual", "description" => "Design urbano, confortável", "amount" => 179.90, "image" => "$baseUrl/images/tenis.jpeg"],
    ["id" => 18, "name" => "Gorro de Lã", "description" => "Ideal para inverno, tamanho único", "amount" => 29.90, "image" => "$baseUrl/images/gorro.jpeg"],
    ["id" => 19, "name" => "Pochete Esportiva", "description" => "Compacta, com zíper resistente", "amount" => 44.90, "image" => "$baseUrl/images/pochete.jpeg"],
    ["id" => 20, "name" => "Blusa Moletom", "description" => "Com capuz, felpada por dentro", "amount" => 134.90, "image" => "$baseUrl/images/camiseta-branca.jpeg"],
];
