 var app = angular.module('LotteryApp', []);

 app.controller('LotteryController',['$scope','$http','$location', function($scope,$http,$location) {
    $scope.balls = Array(6).fill(1);
    $scope.expires = 100;
    $scope.userID = null;
    $scope.flag = "Unknown"
    $scope.won = "Nothing you haven't won"
    $scope.makeGuess = function(){
        $http.post($location.$$absUrl + 'game.php',
            {
                guess: {
                    white:$scope.balls.slice(0,5),
                    red:$scope.balls[5]
                },
                userID: $scope.userID
            }).then(function(data){
                $scope.flag = data.data.flag
                $scope.won = data.data.flag
                console.log($scope.flag);
            },function(error){
                console.log(error);
            })
    }
    $scope.startGame = function(){
        $http.get($location.$$absUrl + 'game.php').then(function(data){
                console.log(data)
                $scope.userID = data.data.userID
                $scope.expires = data.data.expires
            },function(error){
                console.log(error);
            });
    }
    $scope.startGame();//auto start for the player
}]);