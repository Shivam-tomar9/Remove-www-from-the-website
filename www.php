$actual_link = $_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI'];

if (strpos($actual_link, 'www.') === true) {
    $url = str_replace('www.', '', $actual_link);

    // Redirect to the new URL
    header('Location: https://'.$url);
    exit();
}
