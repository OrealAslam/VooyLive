<style type="text/css">
    @if(isset($user->ClientDetail->colora))
        .colora {
            color: {{$user->ClientDetail->colora}} !important;
        }
        .backgrounda {
            background-color: {{$user->ClientDetail->colora}} !important;
        }
        .filla, .filla rect, .filla path{
            fill: {{$user->ClientDetail->colora}} !important;
        }
    @else
        .colora {
            color: #000000 !important;
        }
        .backgrounda {
            background-color: #000000 !important;
        }
        .filla, .filla rect, .filla path{
            fill: #000000 !important;
        }
    @endif;

    @if(isset($user->ClientDetail->colorb))
        .colorb {
            color: {{$user->ClientDetail->colorb}} !important;
        }
        .backgroundb {
            background-color: {{$user->ClientDetail->colorb}} !important;
        }
        .fillb, .fillb rect, .fillb path{
            fill: {{$user->ClientDetail->colorb}} !important;
        }
    @else
        .colorb {
            color: #ffffff !important;
        }
        .backgroundb {
            background-color: #ffffff !important;
        }
        .fillb, .fillb rect, .fillb path{
            fill: #ffffff !important;
        }
    @endif;

    @if(isset($user->ClientDetail->colorc))
        .colorc {
            color: {{$user->ClientDetail->colorc}} !important;
        }
        .backgroundc {
            background-color: {{$user->ClientDetail->colorc}} !important;
        }
        .fillc, .fillc rect, .fillc path{
            fill: {{$user->ClientDetail->colorc}} !important;
        }
    @else
        .colorc {
            color: #aaaaaa  !important;
        }
        .backgroundc {
            background-color: #aaaaaa  !important;
        }
        .fillc, .fillc rect, .fillc path{
            fill: #aaaaaa  !important;
        }
    @endif;

    @if(isset($user->ClientDetail->colord))
        .colord {
            color: {{$user->ClientDetail->colord}} !important;
        }
        .backgroundd {
            background-color: {{$user->ClientDetail->colord}} !important;
        }
        .filld, .filld rect, .filld path{
            fill: {{$user->ClientDetail->colord}} !important;
        }
    @else
        .colord {
            color: #ff0000 !important;
        }
        .backgroundd {
            background-color: #ff0000 !important;
        }
        .filld, .filld rect, .filld path{
            fill: #ff0000 !important;
        }
    @endif;

    @if(isset($user->ClientDetail->colore))
        .colore {
            color: {{$user->ClientDetail->colore}} !important;
        }
        .backgrounde {
            background-color: {{$user->ClientDetail->colore}} !important;
        }
        .fille, .fille rect, .fille path{
            fill: {{$user->ClientDetail->colore}} !important;
        }
    @else
        .colore {
            color: #cccccc !important;
        }
        .backgrounde {
            background-color: #cccccc !important;
        }
        .fille, .fille rect, .fille path{
            fill: #cccccc !important;
        }
    @endif;

    @if(isset($user->ClientDetail->colorf))
        .colorf {
            color: {{$user->ClientDetail->colorf}} !important;
        }
        .backgroundf {
            background-color: {{$user->ClientDetail->colorf}} !important;
        }
        .fillf, .fillf rect, .fillf path{
            fill: {{$user->ClientDetail->colorf}} !important;
        }
    @else
        .colorf {
            color: #000000 !important;
        }
        .backgroundf {
            background-color: #000000 !important;
        }
        .fillf, .fillf rect, .fillf path{
            fill: #000000 !important;
        }
    @endif;
</style>