<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Face</title>
</head>
<body>
    <!--source.php-->
    
    <?php
    class emmm
    {
        public static function checkFile(&$page)
        {
            $whitelist = ["source"=>"source.php","hint"=>"hint.php"];
            if (! isset($page) || !is_string($page)) {
                echo "you can't see it!";
                return false;
            }

            if (in_array($page, $whitelist)) {
                return true;
            }
        }
    }

    if (! empty($_REQUEST['file'])
        && is_string($_REQUEST['file'])
        && emmm::checkFile($_REQUEST['file'])
    ) {
        include $_REQUEST['file'];
        exit;
    } else {
        echo "<br><h1>You can't find the flag!</h1><br><img src=\"asmallface.png\" />";
    }
?>
</body>
</html>