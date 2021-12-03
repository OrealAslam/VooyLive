@extends('layouts.adminLayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>Survey Show</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('surveyList') }}" class="btn btn-success">Back</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <table class="table table-bordered bg-white">
        <tbody>
            <tr>
                <th width="70%">Did you do any listing appointments this week?</th>
                <td>
                    @if($dataJ->listing_appointments_this_week == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
            </tr>
            <tr>
                <th width="70%">Did you list a property this week?</th>
                <td>
                    @if($dataJ->property_this_week == 1)
                    Yes
                    @else
                    No
                    @endif
                </td>
            </tr>
            <tr>
                <th width="70%">Did you enter escrow this week?</th>
                <td>
                    @if($dataJ->escrow_this_week == 1)
                    Yes
                    @else
                    No
                    @endif
                </td>
            </tr>
            <tr>
                <th width="70%">Have you had a transaction close this week?</th>
                <td>
                    @if($dataJ->transaction_close_this_week == 1)
                    Yes
                    @else
                    No
                    @endif
                </td>
            </tr>
            <tr>
                <th width="70%">Have you had any clients holding back from selling because of Coronavirus?</th>
                <td>
                    @if($dataJ->coronavirus == 1)
                    Yes
                    @else
                    No
                    @endif
                </td>
            </tr>
            <tr>
                <th width="70%">Were home buyers you interacted with this week expecting lower prices?</th>
                <td>
                    @if($dataJ->expecting_lower_prices == 1)
                    Yes
                    @else
                    No
                    @endif
                </td>
            </tr>
            <tr>
                <th width="70%">Have you had any buyers withdraw an offer this week?</th>
                <td>
                    @if($dataJ->buyers_withdraw == 1)
                    Yes
                    @else
                    No
                    @endif
                </td>
            </tr>
            <tr>
                <th width="70%">Have you seen any sellers remove their home from the market completely this week?</th>
                <td>
                    @if($dataJ->market_completely_this_week == 1)
                    Yes
                    @elseif($dataJ->market_completely_this_week == 2)
                    No
                    @else
                    No Sure
                    @endif
                </td>
            </tr>
            <tr>
                <th width="70%">Have any of your home sellers reduced price to attract buyers this week?</th>
                <td>
                    @if($dataJ->attract_buyers_this_week == 1)
                    Yes
                    @else
                    No
                    @endif
                </td>
            </tr>
            <tr>
                <th width="70%">Have you had a transaction fall out of escrow this week?</th>
                <td>
                    @if($dataJ->transaction_fall_escrow_this_week == 1)
                    Yes
                    @else
                    No
                    @endif
                </td>
            </tr>
            <tr>
                <th width="70%">Was the buyer in your last closed transaction a first-time buyer?</th>
                <td>
                    @if($dataJ->transaction_first_time_buyer == 1)
                    Yes
                    @elseif($dataJ->transaction_first_time_buyer == 2)
                    No
                    @else
                    Don't know/unsure
                    @endif
                </td>
            </tr>
            <tr>
                <th width="70%">Do you think next week listings will go:</th>
                <td>
                    @if($dataJ->next_week_listing_will_go == 1)
                        Up
                    @elseif($dataJ->next_week_listing_will_go == 2)
                        Down
                    @elseif($dataJ->next_week_listing_will_go == 3)
                        Flat
                    @else
                        Unsure
                    @endif
                </td>
            </tr>
            <tr>
                <th width="70%">Do you think next week sales will go:</th>
                <td>
                    @if($dataJ->next_week_sales_will_go == 1)
                        Up
                    @elseif($dataJ->next_week_sales_will_go == 2)
                        Down
                    @elseif($dataJ->next_week_sales_will_go == 3)
                        Flat
                    @else
                        Unsure
                    @endif
                </td>
            </tr>
            <tr>
                <th width="70%">Do you think next week prices will go:</th>
                <td>
                    @if($dataJ->next_week_prices_will_go == 1)
                        Up
                    @elseif($dataJ->next_week_prices_will_go == 2)
                        Down
                    @elseif($dataJ->next_week_prices_will_go == 3)
                        Flat
                    @else
                        Unsure
                    @endif
                </td>
            </tr>
            <tr>
                <th width="70%">How many transactions do you close in a typical year? Please select range.</th>
                <td>
                    {{ numberOfTransactions()[$dataJ->transactions_typical_year] ?? '' }}
                </td>
            </tr>
            <tr>
                <th width="70%">Which of the following constitutes the majority of your business?</th>
                <td>
                    @if($dataJ->constitutes_majority_of_business == 1)
                        Sellers
                    @elseif($dataJ->constitutes_majority_of_business == 2)
                        Buyers
                    @elseif($dataJ->constitutes_majority_of_business == 3)
                        Even mix of both
                    @else
                        Other (please specify) :- {{ $dataJ->constitutes_majority_of_business_other }}
                    @endif
                </td>
            </tr>
            <tr>
                <th width="70%">Are you currently working as a member of a real estate team?</th>
                <td>
                    @if($dataJ->real_estate_team == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
            </tr>
            <tr>
                <th width="70%">What is the size of your brokerage?</th>
                <td>
                    @if($dataJ->size_of_your_brokerage == 2)
                        Unsure
                    @elseif($dataJ->size_of_your_brokerage == 3)
                        Not Applicable
                    @else
                        Brokerage size :- {{ $dataJ->size_of_your_brokerage_other }}
                    @endif
                </td>
            </tr>
            <tr>
                <th width="70%">Select Your City (Canadian Cities Only)</th>
                <td>
                    @if(!empty($dataJ->canadian_city))
                        {{ $dataJ->canadian_city }}
                    @else
                        -
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
@stop