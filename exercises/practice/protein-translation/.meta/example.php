<?php

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
