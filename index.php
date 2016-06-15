<?php
include("varseo_views/build/head.php");

class core
{
    public function scanPHP()
    {
        global $pages;
        $pages = array();
        $files = scandir(dirname(__FILE__) . "/varseo_views/");

        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) == "php") { // add to array if file has PHP extension
                $pages[] = $file;
            }
        }
    }

    public function setPHP()
    {
        global $pages, $page;

        if (!empty($_GET["p"])) {
            if (in_array($_GET["p"] . ".php", $pages)) {
                $page = $_GET["p"] . ".php"; // load php file
            } else {
                $page = "error/404.php";
            }
        } else {
            $page = "default.php";
        }
    }
}

$core = new core();

$core->scanPHP();
$core->setPHP();

include("varseo_views/" . $page);

include("varseo_views/build/footer.php");