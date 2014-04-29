angular.module('routeCalcFormApp', ['routeCalcFormControllers'])
.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{@').endSymbol('@}');
});


angular.module('routeCalcFormControllers', []).controller('routeCalcForm', ['$scope', function($scope) {

    $scope.origin = {};
    $scope.destination = {};

    google.maps.event.addDomListener(window, 'load', function() {

        jQuery(function($) {
            var options = {types: ['(cities)']};
            var originAutocomplete = new google.maps.places.Autocomplete($('.input-origin-point').get(0), options);
            var destinationAutocomplete = new google.maps.places.Autocomplete($('.input-destination-point').get(0), options);

            $('.input-origin-point').change(function() {
                $scope.$apply(function() {
                    $scope.origin = {};
                });
            });
            $('.input-destination-point').change(function() {
                $scope.$apply(function() {
                    $scope.destination = {};
                });
            });

            google.maps.event.addListener(originAutocomplete, 'place_changed', function() {
                var place = originAutocomplete.getPlace();
                console.log(place);
                $scope.$apply(function() {
                    $scope.origin = {id: place.id, name: place.name}
                });
            });

            google.maps.event.addListener(destinationAutocomplete, 'place_changed', function() {
                var place = destinationAutocomplete.getPlace();
                $scope.$apply(function() {
                    $scope.destination = {id: place.id, name: place.name}
                });
            });

        });
    });

}]);
