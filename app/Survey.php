<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $table = 'survey';

    protected $fillable = ['userId','listing_appointments_this_week','property_this_week','escrow_this_week','transaction_close_this_week','coronavirus','expecting_lower_prices','buyers_withdraw','market_completely_this_week','attract_buyers_this_week','transaction_fall_escrow_this_week','transaction_first_time_buyer','last_closed_transaction','last_closed_transaction_other','residence_located','next_week_listing_will_go','next_week_sales_will_go','next_week_prices_will_go','transactions_typical_year','constitutes_majority_of_business','constitutes_majority_of_business_other','real_estate_team','size_of_your_brokerage','size_of_your_brokerage_other','canadian_city'];

    public function userName()
    {
    	return $this->hasOne(User::class,'userId','userId');
    }

    public function user()
    {
    	return $this->hasOne(User::class,'userId','userId');
    }
}
