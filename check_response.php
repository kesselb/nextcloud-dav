<?php

require 'vendor/autoload.php';

$body = file_get_contents('response_alfresco.xml');

$service = new \Sabre\DAV\Xml\Service();
$multistatus = $service->expect('{DAV:}multistatus', $body);

$result = [];

foreach ($multistatus->getResponses() as $response) {

    $result[$response->getHref()] = $response->getResponseProperties();

}

var_dump($result);