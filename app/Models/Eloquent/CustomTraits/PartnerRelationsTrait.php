<?php

namespace App\Models\Eloquent\CustomTraits;

use App\Models\Eloquent\Order;

trait PartnerRelationsTrait
{
    /**
     * Partner can have many orders.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(){
        return $this->hasMany(Order::class);
    }

    /**
     * Get the groups associated with the given partner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups() {
//        return $this->belongsToMany(App\Models\PartnerGroup::class)->withTimestamps();
    }

    /**
     * A Partner belongs to a User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
//        return $this->belongsTo(App\Models\User::class);
    }

    /**
     * Get the status associated with the given Partner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function status() {
//        return $this->belongsToMany(App\Models\SharedStat::class)->withTimestamps();
    }

    /**
     * Partner can have many addresses.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses(){
//        return $this->hasMany(App\Models\Address::class);
    }

    /**
     * Partner can have many contacts.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts(){
//        return $this->hasMany(App\Models\Contact::class);
    }

    /**
     * Partner can have many documents.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents(){
//        return $this->hasMany(App\Models\Document::class);
    }

}
