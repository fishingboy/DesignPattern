<?php

header("Content-Type:text/html; charset=utf-8");

$dir = opendir("samples");
while ($f = readdir($dir)) {
    if ($f == '.' || $f == '..') {
        continue;
    }
    echo  "<li><a href='/samples/$f'>$f</a></li>";
}