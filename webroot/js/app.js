(function(window, angular, undefined){
 'use strict';
 angular.module('TestApp', [
 ]);
 angular.module('TestApp').controller('testController', testController);
 function testController($scope){

 $scope.fields = {
     "guid": "ddc4b945-c5cd-4ea0-8374-b00853a5d54c",
     "isActive": true,
     "balance": "$3,012.52",
     "picture": "http://placehold.it/32x32",
     "age": 27,
     "eyeColor": "green",
     "name": "Brooke Salas",
     "gender": "female",
     "company": "TROPOLI",
     "email": "brookesalas@tropoli.com",
     "phone": "+1 (914) 411-3339",
     "address": "498 Exeter Street, Neahkahnie, Mississippi, 8057",
     "about": "Elit qui id minim in magna. Duis est laboris commodo dolore nostrud Lorem sunt incididunt cillum aliquip. Consequat et anim adipisicing quis incididunt reprehenderit fugiat adipisicing ut consectetur do. Aliqua adipisicing quis sint duis nostrud sint consectetur fugiat sint. Labore velit aliqua occaecat do nostrud sit eiusmod laborum proident. Irure duis sit dolore adipisicing laborum.\r\n",
     "registered": "2015-04-29T09:54:48 -06:-30",
     "latitude": 46.191052,
     "longitude": -98.416315
 }
 }
})(window, window.angular);
