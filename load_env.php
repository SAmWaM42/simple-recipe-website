
<?php

/**
 * Loads environment variables from a .env file into $_ENV, $_SERVER, and getenv().
 *
 * @param string $path Path to the .env file. Defaults to ./.env
 * @return void
 */
function loadEnv(string $path = __DIR__ . '/.env'): void
{
    if (!file_exists($path)) {
        // Optional: Throw an exception if the file is mandatory, but for a website,
        // often you just log a warning and use defaults.
        return;
    }

    // Read the file content into an array of lines
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        // 1. Ignore comments (lines starting with #)
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // 2. Ignore lines that don't look like KEY=VALUE
        if (!str_contains($line, '=')) {
            continue;
        }

        // 3. Split into key and value (limit to 2 parts in case the value contains '=')
        list($key, $value) = explode('=', $line, 2);

        $key = trim($key);
        $value = trim($value);

        // 4. Clean up quotes from the value
        if (in_array(substr($value, 0, 1), ['"', "'"]) && substr($value, 0, 1) === substr($value, -1)) {
            $value = substr($value, 1, -1);
        }
        
        // Final cleanup for consistency
        $value = trim($value);

        // 5. CRITICAL STEP: Load into the environment
        
        // This makes it available via getenv('KEY') and putenv()
        if (!getenv($key)) {
            putenv("{$key}={$value}");
        }
        
        // This makes it available via $_ENV['KEY']
        if (!isset($_ENV[$key])) {
            $_ENV[$key] = $value;
        }
        
        // This makes it available via $_SERVER['KEY']
        if (!isset($_SERVER[$key])) {
            $_SERVER[$key] = $value;
        }
    }
}

// Automatically load the environment variables when this file is included
loadEnv();
