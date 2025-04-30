<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * THIS IS THE IMPORTANT LINE FOR THIS ERROR
     * @var string
     */
    protected $table = 'FACTURE'; // Specify the correct, uppercase table name

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ID_facture'; // Specify the custom primary key

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ID_commande',
        'Montant',
        'Date_facture',
        'Statut',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'Montant' => 'float',
        'Date_facture' => 'date',
    ];

    // Optional: Define relationships if ID_commande links to another model
    // public function commande()
    // {
    //    return $this->belongsTo(Commande::class, 'ID_commande', 'ID_commande_pk');
    // }
}