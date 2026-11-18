<?php

// Usage: php scripts/check-translations.php /path/to/panel/lang/en
declare(strict_types=1);

$source = $argv[1] ?? '';
$target = dirname(__DIR__) . '/lang/ja';
if (!is_dir($source)) {
    fwrite(STDERR, "Usage: php scripts/check-translations.php /path/to/panel/lang/en\n");
    exit(1);
}

function translations(string $directory): array
{
    $result = [];
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    foreach ($iterator as $file) {
        if (!$file->isFile() || $file->getExtension() !== 'php') {
            continue;
        }
        $relative = substr($file->getPathname(), strlen(rtrim($directory, '/')) + 1);
        $values = require $file->getPathname();
        if (!is_array($values)) {
            throw new RuntimeException("$relative must return an array");
        }
        $flatten = function (array $items, string $prefix) use (&$flatten, &$result): void {
            foreach ($items as $key => $value) {
                $name = "$prefix.$key";
                if (is_array($value)) {
                    $flatten($value, $name);
                } elseif (is_string($value)) {
                    $result[$name] = $value;
                } else {
                    throw new RuntimeException("$name must be a string or array");
                }
            }
        };
        $flatten($values, $relative);
    }
    ksort($result);

    return $result;
}

function placeholders(string $value): array
{
    preg_match_all('/:[A-Za-z_][A-Za-z_0-9]*/', $value, $matches);
    $tokens = array_values(array_unique($matches[0]));
    sort($tokens);

    return $tokens;
}

$english = translations($source);
$japanese = translations($target);
$errors = [];
foreach (array_diff_key($english, $japanese) as $key => $_) {
    $errors[] = "Missing: $key";
}
foreach (array_diff_key($japanese, $english) as $key => $_) {
    $errors[] = "Obsolete: $key";
}
foreach (array_intersect_key($english, $japanese) as $key => $value) {
    if (placeholders($value) !== placeholders($japanese[$key])) {
        $errors[] = "Placeholder mismatch: $key";
    }
    if (substr_count($value, '|') !== substr_count($japanese[$key], '|')) {
        $errors[] = "Plural form mismatch: $key";
    }
    preg_match_all('/<\/?[A-Za-z][^>]*>/', $value, $englishTags);
    preg_match_all('/<\/?[A-Za-z][^>]*>/', $japanese[$key], $japaneseTags);
    if (array_count_values($englishTags[0]) != array_count_values($japaneseTags[0])) {
        $errors[] = "HTML tag mismatch: $key";
    }
}
if ($errors !== []) {
    fwrite(STDERR, implode("\n", $errors) . "\n");
    exit(1);
}
printf("OK: %d translation keys; placeholders, plural forms and HTML tags match.\n", count($english));
