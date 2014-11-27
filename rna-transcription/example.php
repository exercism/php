<?php

function toRna($strand)
{
    return strtr($strand, 'CGTA', 'GCAU');
}
