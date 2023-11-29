<?php
namespace App\Models;

use TypeRocket\Models\WPPost;

class Workshop extends WPPost
{
    public const POST_TYPE = 'workshop';

    // public function workshop_taxonomy()
    // {
    //     return $this->belongsToTaxonomy(TaxonomySample::class, TaxonomySample::TAXONOMY);
    // }
}