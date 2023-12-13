<?php

namespace App\Models\site;

use App\Models\admin\Sectors;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contacts extends Model
{
    /**
     * @var string
     */
    protected $table = 'contacts';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'cnpj',
        'phone_number',
        'city_name',
        'state_uf',
        'subject',
        'message',
        'sector_id'
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function sectors(): BelongsTo
    {
        return $this->belongsTo(Sectors::class, 'sector_id', 'id');
    }
}
