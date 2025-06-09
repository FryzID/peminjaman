<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Milon\Barcode\Facades\DNS1D; // <-- Add this use statement

class Commodity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    /**
     * Generate a barcode SVG for the commodity ID.
     *
     * @return string
     */
    public function getBarcodeAttribute(): string
    {
        // Pad the ID to 8 digits with leading zeros (e.g., 1 becomes 00000001)
        // This ensures consistency for scanning.
        $paddedId = str_pad($this->id, 8, '0', STR_PAD_LEFT);

        // Generate the barcode as an SVG image.
        // Parameters: (data, type, width, height, color, showtext)
        return DNS1D::getBarcodeSVG($paddedId, 'C128', 1, 40, 'black', false);
    }
}