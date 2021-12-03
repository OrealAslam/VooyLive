<style type="text/css">
    .colora{
        @if(isset($user->ClientDetail->colora))
        color: {{$user->ClientDetail->colora}} !important;
        @else
        color: #000000 !important;
        @endif;
    }
    .colorb{
        @if(isset($user->ClientDetail->colorb))
        color: {{$user->ClientDetail->colorb}} !important;
        @else
        color: #ffffff !important;
        @endif;
    }
    .colorc{
        @if(isset($user->ClientDetail->colorc))
        color: {{$user->ClientDetail->colorc}} !important;
        @else
        color: #aaaaaa !important;
        @endif;
    }
    .colord{
        @if(isset($user->ClientDetail->colord))
        color: {{$user->ClientDetail->colord}} !important;
        @else
        color: #e06666 !important;
        @endif;
    }
    .colore{
        @if(isset($user->ClientDetail->colore))
        color: {{$user->ClientDetail->colore}} !important;
        @else
        color: #aaaaaa !important;
        @endif;
    }
    .colorf{
        @if(isset($user->ClientDetail->colorf))
        color: {{$user->ClientDetail->colorf}} !important;
        @else
        color: #000000 !important;
        @endif;
    }
    .backgrounda{
        @if(isset($user->ClientDetail->colora))
        background-color: {{$user->ClientDetail->colora}} !important;
        @else
        background-color: #000000 !important;
        @endif;
    }
    .backgroundb{
        @if(isset($user->ClientDetail->colorb))
        background-color: {{$user->ClientDetail->colorb}} !important;
        @else
        background-color: #ffffff !important;
        @endif;
    }
    .backgroundc{
        @if(isset($user->ClientDetail->colorc))
            background-color: {{$user->ClientDetail->colorc}} !important;
        @else
            background-color: #aaaaaa !important;
        @endif;
    }
    .backgroundd{
        @if(isset($user->ClientDetail->colord))
            background-color: {{$user->ClientDetail->colord}} !important;
        @else
            background-color: #e06666 !important;
        @endif;
    }
    .backgrounde{
        @if(isset($user->ClientDetail->colore))
            background-color: {{$user->ClientDetail->colore}} !important;
        @else
            background-color: #aaaaaa !important;
        @endif;
    }
    .backgroundf{
        @if(isset($user->ClientDetail->colorf))
            background-color: {{$user->ClientDetail->colorf}} !important;
        @else
            background-color: #000000 !important;
        @endif;
    }

    .filla, .filla rect, .filla path{
        @if(isset($user->ClientDetail->colora))
        fill: {{$user->ClientDetail->colora}} !important;
        @else
        fill: #000000 !important;
        @endif;
    }
    .fillb, .fillb rect, .fillb path{
        @if(isset($user->ClientDetail->colorb))
        fill: {{$user->ClientDetail->colorb}} !important;
        @else
        fill: #ffffff !important;
        @endif;
    }
    .fillc, .fillc rect, .fillc path{
        @if(isset($user->ClientDetail->colorc))
        fill: {{$user->ClientDetail->colorc}} !important;
        @else
        fill: #aaaaaa !important;
        @endif;
    }   
    .filld, .filld rect, .filld path{
        @if(isset($user->ClientDetail->colord))
        fill: {{$user->ClientDetail->colord}} !important;
        @else
        fill: #e06666 !important;
        @endif;
    }   
    .fille, .fille rect, .fille path{
        @if(isset($user->ClientDetail->colore))
        fill: {{$user->ClientDetail->colore}} !important;
        @else
        fill: #aaaaaa !important;
        @endif;
    }   
    .fillf, .fillf rect, .fillf path{
        @if(isset($user->ClientDetail->colorf))
        fill: {{$user->ClientDetail->colorf}} !important;
        @else
        fill: #000000 !important;
        @endif;
    }   


@media print {

    .colora{
        @if(isset($user->ClientDetail->colora))
        color: {{$user->ClientDetail->colora}} !important;
        @else
        color: #000000 !important;
        @endif;
    }
    .colorb{
        @if(isset($user->ClientDetail->colorb))
        color: {{$user->ClientDetail->colorb}} !important;
        @else
        color: #ffffff !important;
        @endif;
    }
    .colorc{
        @if(isset($user->ClientDetail->colorc))
        color: {{$user->ClientDetail->colorc}} !important;
        @else
        color: #aaaaaa !important;
        @endif;
    }
    .colord{
        @if(isset($user->ClientDetail->colord))
        color: {{$user->ClientDetail->colord}} !important;
        @else
        color: #e06666 !important;
        @endif;
    }
    .colore{
        @if(isset($user->ClientDetail->colore))
        color: {{$user->ClientDetail->colore}} !important;
        @else
        color: #aaaaaa !important;
        @endif;
    }
    .colorf{
        @if(isset($user->ClientDetail->colorf))
        color: {{$user->ClientDetail->colorf}} !important;
        @else
        color: #000000 !important;
        @endif;
    }
    .backgrounda{
        @if(isset($user->ClientDetail->colora))
        background-color: {{$user->ClientDetail->colora}} !important;
        @else
        background-color: #000000 !important;
        @endif;
    }
    .backgroundb{
        @if(isset($user->ClientDetail->colorb))
        background-color: {{$user->ClientDetail->colorb}} !important;
        @else
        background-color: #ffffff !important;
        @endif;
    }
    .backgroundc{
        @if(isset($user->ClientDetail->colorc))
            background-color: {{$user->ClientDetail->colorc}} !important;
        @else
            background-color: #aaaaaa !important;
        @endif;
    }
    .backgroundd{
        @if(isset($user->ClientDetail->colord))
            background-color: {{$user->ClientDetail->colord}} !important;
        @else
            background-color: #e06666 !important;
        @endif;
    }
    .backgrounde{
        @if(isset($user->ClientDetail->colore))
            background-color: {{$user->ClientDetail->colore}} !important;
        @else
            background-color: #aaaaaa !important;
        @endif;
    }
    .backgroundf{
        @if(isset($user->ClientDetail->colorf))
            background-color: {{$user->ClientDetail->colorf}} !important;
        @else
            background-color: #000000 !important;
        @endif;
    }

    .filla, .filla rect, .filla path{
        @if(isset($user->ClientDetail->colora))
        fill: {{$user->ClientDetail->colora}} !important;
        @else
        fill: #000000 !important;
        @endif;
    }
    .fillb, .fillb rect, .fillb path{
        @if(isset($user->ClientDetail->colorb))
        fill: {{$user->ClientDetail->colorb}} !important;
        @else
        fill: #ffffff !important;
        @endif;
    }
    .fillc, .fillc rect, .fillc path{
        @if(isset($user->ClientDetail->colorc))
        fill: {{$user->ClientDetail->colorc}} !important;
        @else
        fill: #aaaaaa !important;
        @endif;
    }   
    .filld, .filld rect, .filld path{
        @if(isset($user->ClientDetail->colord))
        fill: {{$user->ClientDetail->colord}} !important;
        @else
        fill: #e06666 !important;
        @endif;
    }   
    .fille, .fille rect, .fille path{
        @if(isset($user->ClientDetail->colore))
        fill: {{$user->ClientDetail->colore}} !important;
        @else
        fill: #aaaaaa !important;
        @endif;
    }   
    .fillf, .fillf rect, .fillf path{
        @if(isset($user->ClientDetail->colorf))
        fill: {{$user->ClientDetail->colorf}} !important;
        @else
        fill: #000000 !important;
        @endif;
    }   
    
}


/*---------------------Edit Report Address start -------------------------*/
@if(Auth::user() && Auth::user()->role=='admin')
    /*#features .container #content td.report-address .text-editable {*/
    #features .text-editable {
        position: relative;
        /*display: inline-block;*/  
    }
    #features .text-editable:hover {
        background: #fff3a5 !important;
        color: black !important;
    }
    #features .text-editable:hover >div.content {
        color: black;
    }
    #features .text-editable:hover .options {
        display: block;
    }

    #features .text-editable .options {
        /*padding-top: 7px;*/
        /*padding-right: 7px;*/
        /*padding-right: 23px;*/
        position: absolute;
        right: 0;
        top: -15px;
        display: none;
        font-size: 20px;
        line-height: initial;
        color: red;
        cursor: pointer;
    }
    #features .editableBackground {
        background: #fff3a5;
        color: black;
    }

    #features .fa-disabled {
      opacity: 0.6;
      cursor: not-allowed;
      color: lightgrey;
    }
@endif;



</style>