<?php

function displayHTMLImage($imageFile)
{
    $type = mime_content_type($imageFile);

    switch ($type) {
        case 'image/jpg':
            echo "<img style=\"object-fit: contain; \" width='400' height='200' src='data:image/jpg;base64," . base64_encode(file_get_contents($imageFile)) . "'/>";
            break;
        case 'image/jpeg':
            echo "<img style=\"object-fit: contain; \" width='400' height='200' src='data:image/jpeg;base64," . base64_encode(file_get_contents($imageFile)) . "'/>";
            break;
        case 'image/png':
            echo "<img style=\"object-fit: contain; \" width='400' height='200' src='data:image/png;base64," . base64_encode(file_get_contents($imageFile)) . "'/>";
            break;
        case 'image/gif':
            echo "<img style=\"object-fit: contain; \" width='400' height='200' src='data:image/gif;base64," . base64_encode(file_get_contents($imageFile)) . "'/>";
            break;
        case 'image/svg+xml':
            libxml_disable_entity_loader(false);
            $doc = new DOMDocument();
            $doc->loadXML(file_get_contents($imageFile), LIBXML_NOENT | LIBXML_DTDLOAD);
            $svg = $doc->getElementsByTagName('svg');
            echo $svg->item(0)->C14N();
            break;
        default:
            echo "Image type not recognized";
    }
}
