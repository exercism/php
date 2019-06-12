<?php

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
