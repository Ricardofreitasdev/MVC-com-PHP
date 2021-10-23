<?php

namespace Alura\Cursos\Helper;

trait HtmlRender
{

    public function render(string $path, array $data): string
    {
        extract($data);

        ob_start();
        require __DIR__ . "/../../view/" . $path . ".php";
        $html = ob_get_clean();
        
        return $html;   
        
    }
    
}
