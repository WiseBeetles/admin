<?php

namespace Framework;

class TemplateViewer implements TemplateViewerInterface
{
    public function render(string $template, array $data = []): string
    {
        $views_dir = dirname(__DIR__, 2) . VIEWS_PATH;
        extract($data, EXTR_SKIP);

        ob_start();

        require $views_dir . $template;

        return ob_get_clean();
    }
}
