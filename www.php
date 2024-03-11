//do the changes in your htacess file


RewriteEngine On

# Force HTTPS and non-www
RewriteCond %{HTTPS} !=on [OR]
RewriteCond %{HTTP_HOST} ^www\.greatinflux\.com [NC]
RewriteRule ^ https://greatinflux.com%{REQUEST_URI} [L,R=301]

# Remove trailing slash
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.+)/$ /$1 [L,R=301]

# Rewrite everything to index.php
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]

//for removing public 
$requestUri = $_SERVER['REQUEST_URI'];
if (strpos($requestUri, '/public/') !== false) {
    // Remove "public" from the URI
    $newUri = str_replace('/public', '', $requestUri);

    // Redirect to the new URL
    header('Location: https://greatinflux.com' . $newUri, true, 301);
    exit();
}
