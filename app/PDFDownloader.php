<?php

namespace App;

class PDFDownloader
{
    /**
     * Renvoie les bonnes entêtes pour lire les fichiers uploadés.
     *
     * @return void
     */
    public function read(): void
    {
        header("Content-Type: application/octet-stream");

        $file = $_GET['file'];
        header("Content-Disposition: attachment; filename=" . urlencode($file));   
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Description: File Transfer");            
        header("Content-Length: " . filesize($file));
        flush();
        $fp = fopen($file, "r");
        while (!feof($fp))
        {
            echo fread($fp, 65536);
            flush();
        } 
        fclose($fp); 
    }
}