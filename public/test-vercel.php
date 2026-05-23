<?php
header('Content-Type: text/plain');

echo "===========================================\n";
echo "VERCEL DEPLOYMENT DIAGNOSTICS SCRIPT\n";
echo "===========================================\n\n";

echo "1. ENVIRONMENT VARIABLES CHECK:\n";
$vars = [
    'VERCEL',
    'APP_ENV',
    'APP_DEBUG',
    'APP_KEY',
    'DB_CONNECTION',
    'DB_HOST',
    'DB_PORT',
    'DB_DATABASE',
    'DB_USERNAME',
    'DB_PASSWORD'
];

foreach ($vars as $var) {
    $val = getenv($var);
    if ($val === false) {
        echo "  [x] $var: NOT DEFINED\n";
    } else {
        // Mask value
        $masked = strlen($val) > 8 ? substr($val, 0, 4) . '...' . substr($val, -4) : 'DEFINED (Short)';
        if ($var === 'DB_PASSWORD' || $var === 'APP_KEY') {
            $masked = '******** (Masked)';
        }
        echo "  [v] $var: $masked\n";
    }
}

echo "\n2. DATABASE CONNECTION TEST:\n";
$host = getenv('DB_HOST');
$db = getenv('DB_DATABASE');
$user = getenv('DB_USERNAME');
$pass = getenv('DB_PASSWORD');
$port = getenv('DB_PORT') ?: '3306';

if (!$host || !$db || !$user) {
    echo "  [x] Connection skipped: Database env variables are missing.\n";
} else {
    try {
        echo "  Connecting to $host:$port...\n";
        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_TIMEOUT => 5 // 5 seconds timeout
        ];
        $pdo = new PDO($dsn, $user, $pass, $options);
        echo "  [v] CONNECTION SUCCESSFUL! Connected to database '$db'.\n";
    } catch (Exception $e) {
        echo "  [x] CONNECTION FAILED! Error: " . $e->getMessage() . "\n";
    }
}

echo "\n3. PHP EXTENSIONS CHECK:\n";
$extensions = ['pdo_mysql', 'mbstring', 'openssl', 'curl', 'json'];
foreach ($extensions as $ext) {
    if (extension_loaded($ext)) {
        echo "  [v] Extension '$ext': LOADED\n";
    } else {
        echo "  [x] Extension '$ext': NOT LOADED\n";
    }
}

echo "\n===========================================\n";
echo "End of Diagnostics\n";
echo "===========================================\n";
