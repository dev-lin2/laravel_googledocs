<?php

namespace App\Services;

use Google\Client;

class GoogleDocsService {
    protected $service;
    protected $drive;

    public function __construct()
    {
        $client = new Client();
        $client->setApplicationName("Laravel Google Docs");
        $client->setDeveloperKey(env('GOOGLE_API_KEY'));

        $this->drive = new \Google_Service_Drive($client);
    }

    public function getContents($documentId)
    {
        // get document and export it as HTML
        $response = $this->drive->files->export($documentId, 'text/html', array(
            'alt' => 'media'
        ));
        return $response->getBody()->getContents();
    }
}