<?php
namespace Alura\Cursos\Controller;

abstract class ControllerHtml 
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