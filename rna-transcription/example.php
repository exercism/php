<?php

class Complement
{
    public static function ofDna($strand)
    {
        return strtr($strand, 'CGTA', 'GCAU');
    }

    public static function ofRna($strand)
    {
        return strtr($strand, 'GCAU', 'CGTA');
    }
}
