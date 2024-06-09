<?php

$container = new Framework\Container;

// Database example
$container->set(Framework\Database::class, function() {
    return new Framework\Database($_ENV["DB_HOST"], $_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
});

// Viewer example
$container->set(Framework\TemplateViewerInterface::class, function() {
    return new Framework\TemplateViewer;
});

return $container;