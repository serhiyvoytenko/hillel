<?php

use JetBrains\PhpStorm\NoReturn;

#[NoReturn] function site_redirect($path = ''): void
{
    header("Location: " . SITE_URL . '/' . $path);
    exit;
}
