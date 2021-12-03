angular.module('filters',[])
.filter('cmdate', [
    '$filter', function($filter) {
        return function(input, format) {
            return $filter('date')(new Date(input), format);
        };
    }
])
.filter('dateFormater', function() {
    return function(input, scope) {
    if (input!==null){
        //breaks DB date to array
        var parts = input.split(/[-]/).filter(function(str){ return str !== '';});
        //Takes date with time and returns array with date at 0th position
        var date = parts[2].split(/[ ]/).filter(function(str){ return str !== '';});
    }
    var finalDate = date[0]+'/'+parts[1]+'/'+parts[0];
    return finalDate;
    };
});