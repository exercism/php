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

class ProteinTranslation
{
    public function getProteins(string $rnaSequence): array
    {
        if (!$rnaSequence) {
            return [];
        }

        $translatedProteins = [];

        foreach (str_split($rnaSequence, 3) as $rna) {
            $protein = $this->translateRna($rna);

            if (!$protein) {
                throw new InvalidArgumentException('Invalid codon');
            }

            if ($protein === 'STOP') {
                break;
            }

            $translatedProteins[] = $protein;
        }

        return $translatedProteins;
    }

    private function translateRna(string $rna): ?string
    {
        switch ($rna) {
            case 'AUG':
                return 'Methionine';
            case 'UUU':
            case 'UUC':
                return 'Phenylalanine';
            case 'UUA':
            case 'UUG':
                return 'Leucine';
            case 'UCU':
            case 'UCC':
            case 'UCA':
            case 'UCG':
                return 'Serine';
            case 'UAU':
            case 'UAC':
                return 'Tyrosine';
            case 'UGU':
            case 'UGC':
                return 'Cysteine';
            case 'UGG':
                return 'Tryptophan';
            case 'UAA':
            case 'UAG':
            case 'UGA':
                return 'STOP';
            default:
                return null;
        }
    }
}
