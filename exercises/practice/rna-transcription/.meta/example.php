<?php

declare(strict_types=1);

function toRna($strand)
{
    return strtr($strand, 'CGTA', 'GCAU');
}
