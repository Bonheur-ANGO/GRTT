<?php

namespace App;

use Exception;

class View {
    public static function render(string $filename, string $directory,string $title, $data = [])
    {
        $template = '../views/template/default.php';
        $filePath = '../views/' . $directory . '/';
        $file = $filePath.$filename.'.php';
        if (file_exists($template)) {
            require $template;
        } else {
            throw new Exception("Erreur de dossier ou le fichier demandé n'existe pas", 1);
            
        }
        extract($data);
        ob_start();
        $title;
        require $file;
        ob_end_flush();
    }
}