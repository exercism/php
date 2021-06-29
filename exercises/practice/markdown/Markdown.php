<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

function parseMarkdown($markdown)
{
    $lines = explode("\n", $markdown);

    $isInList = false;

    foreach ($lines as &$line) {
        if (preg_match('/^######(.*)/', $line, $matches)) {
            $line = "<h6>" . trim($matches[1]) . "</h6>";
        } elseif (preg_match('/^##(.*)/', $line, $matches)) {
            $line = "<h2>" . trim($matches[1]) . "</h2>";
        } elseif (preg_match('/^#(.*)/', $line, $matches)) {
            $line = "<h1>" . trim($matches[1]) . "</h1>";
        }

        if (preg_match('/\*(.*)/', $line, $matches)) {
            if (!$isInList) {
                $isInList = true;
                $isBold = false;
                $isItalic = false;
                if (preg_match('/(.*)__(.*)__(.*)/', $matches[1], $matches2)) {
                    $matches[1] = $matches2[1] . '<em>' . $matches2[2] . '</em>' . $matches2[3];
                    $isBold = true;
                }

                if (preg_match('/(.*)_(.*)_(.*)/', $matches[1], $matches3)) {
                    $matches[1] = $matches3[1] . '<i>' . $matches3[2] . '</i>' . $matches3[3];
                    $isItalic = true;
                }

                if ($isItalic || $isBold) {
                    $line = "<ul><li>" . trim($matches[1]) . "</li>";
                } else {
                    $line = "<ul><li><p>" . trim($matches[1]) . "</p></li>";
                }
            } else {
                $isBold = false;
                $isItalic = false;
                if (preg_match('/(.*)__(.*)__(.*)/', $matches[1], $matches2)) {
                    $matches[1] = $matches2[1] . '<em>' . $matches2[2] . '</em>' . $matches2[3];
                    $isBold = true;
                }

                if (preg_match('/(.*)_(.*)_(.*)/', $matches[1], $matches3)) {
                    $matches[1] = $matches3[1] . '<i>' . $matches3[2] . '</i>' . $matches3[3];
                    $isItalic = true;
                }

                if ($isItalic || $isBold) {
                    $line = "<li>" . trim($matches[1]) . "</li>";
                } else {
                    $line = "<li><p>" . trim($matches[1]) . "</p></li>";
                }
            }
        } else {
            if ($isInList) {
                $line = "</ul>" . $line;
                $isInList = false;
            }
        }

        if (!preg_match('/<h|<ul|<p|<li/', $line)) {
            $line = "<p>$line</p>";
        }

        if (preg_match('/(.*)__(.*)__(.*)/', $line, $matches)) {
            $line = $matches[1] . '<em>' . $matches[2] . '</em>' . $matches[3];
        }

        if (preg_match('/(.*)_(.*)_(.*)/', $line, $matches)) {
            $line = $matches[1] . '<i>' . $matches[2] . '</i>' . $matches[3];
        }
    }
    $html = join($lines);
    if ($isInList) {
        $html .= '</ul>';
    }
    return $html;
}
