<?php

declare(strict_types=1);

namespace App\TrackData;

use App\TrackData\Item;

/**
 * Represents a folding section of thematically connected Items
 */
class Group implements Item
{
    /**
     * PHP_EOL is CRLF on Windows, we always want LF
     * @see https://www.php.net/manual/en/reserved.constants.php#constant.php-eol
     */
    private const LF = "\n";

    /**
     * @param string[] $comments
     */
    private function __construct(
        private InnerGroup $cases,
        private string $description = '',
        private array $comments = [],
        private ?Unknown $unknown = null,
    ) {
    }

    public static function from(mixed $rawData): ?Item
    {
        if (
            ! (
                \is_object($rawData)
                && isset($rawData->cases)
            )
        ) {
            return null;
        }

        $cases = InnerGroup::from($rawData->cases);
        unset($rawData->cases);
        $description = $rawData->description ?? '';
        unset($rawData->description);
        $comments = $rawData->comments ?? [];
        unset($rawData->comments);
        $unknown = empty(\get_object_vars($rawData)) ? null : Unknown::from($rawData);

        return new static($cases, $description, $comments, $unknown);
    }

    public function renderPhpCode(): string
    {
        return \sprintf(
            $this->template(),
            $this->renderTests(),
            $this->renderHeadingComment(),
            $this->renderUnknown(),
        );
    }

    /**
     * %1$s Pre-rendered list of tests
     * %2$s Multiline comment
     */
    private function template(): string
    {
        return \file_get_contents(__DIR__ . '/group.txt');
    }

    private function renderTests(): string
    {
        $tests = $this->cases->renderPhpCode();

        return empty($tests) ? '' : $tests . self::LF . self::LF;
    }

    private function renderHeadingComment(): string
    {
        $lines = [];
        if (!empty($this->description)) {
            $lines[] = $this->description;
        }
        if (!empty($this->description) && !empty($this->comments)) {
            $lines[] = '';
        }
        $lines = [...$lines, ...$this->comments];

        return empty($lines) ? '' : $this->asMultiLineComment($lines);
    }

    private function renderUnknown(): string
    {
        return $this->unknown === null
            ? ''
            : $this->unknown->renderPhpCode() . self::LF
            ;
    }

    private function asMultiLineComment(array $lines): string
    {
        return self::LF
            . '/*' . self::LF
            . ' * ' . implode(self::LF . ' * ', $lines) . self::LF
            . ' */' . self::LF
            ;
    }
}
