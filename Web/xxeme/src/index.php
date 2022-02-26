<?php
function showAttrs($attrs) {
    $r = [""];
    foreach ($attrs as $k => $v) {
        array_push($r, $k . "=\"" . $v->textContent . "\"");
    }
    return implode(" ", $r);
}

function showNode($n, $pre) {
    if ($n->hasChildNodes()) {
        echo $pre . "<" . $n->nodeName . showAttrs($n->attributes) . ">\n";
        foreach ($n->childNodes as $c) {
            show($c, $pre . " ");
        }
        echo $pre . "</" . $n->nodeName . ">\n";
    } else {
        echo $pre . "<" . $n->nodeName . showAttrs($n->attributes) . "/>\n";
    }
}

function show($n, $pre) {
    switch ($n->nodeType) {
        case XML_ELEMENT_NODE:
            showNode($n, $pre);
            break;

        case XML_TEXT_NODE:
        case XML_CDATA_SECTION_NODE:
        case XML_ENTITY_REF_NODE:
            echo $pre . $n->textContent . "\n";
            break;
        
        case XML_COMMENT_NODE:
            echo $pre . "<!--" . $n->textContent . "-->\n";
            break;

        case XML_DOCUMENT_NODE:
            foreach ($n->childNodes as $c) {
                show($c, $pre);
            }
            break;

        default:
            break;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Content-Type: text/plain");
    $d = new DOMDocument();
    $data = file_get_contents("php://input");
    if(preg_match('/file|rot13/i', $data))
    {
        die('illegal!');
    }
    $d->loadXML($data, LIBXML_BIGLINES | LIBXML_COMPACT | LIBXML_DTDVALID | LIBXML_NOBLANKS | LIBXML_NOERROR | LIBXML_NOWARNING | LIBXML_NOENT);

    if ($d->validate()) {
        show($d, "");
    } else {
        echo "Invalid";
    }

} else {
    highlight_file(__FILE__);
}