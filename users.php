<?php 
include('header.php');

define("PAGE_AJAX","ajax_users.php");

?>

<div ng-show="fullPageLoader" class="loadDiv" style="left: 0; z-index: 9999; position:absolute; text-align:center; top:50%; height:200px; width:100%;">
    <i class="fa fa-spinner fa-spin fa-3x fa-fw" aria-hidden="true"></i>
</div>

<div ng-view></div>
 
<script type = "text/ng-template" id="addusers">
   
   <?php include("user_addTemplate.php");?>

</script>
 
 <script type = "text/ng-template" id = "listusers">
    
    <?php include("user_listTemplate.php");?>
 </script>




 <script>
(function(){
    

 angular.module("loanApp").config(['$routeProvider', function($routeProvider) {
        $routeProvider. 
       
            when('/addusers', {
               templateUrl: 'addusers',
               controller: 'addController'
            }).
        
            when('/addusers/:user_id', {
               templateUrl: 'addusers',
               controller: 'addController'
            }).

        
        when('/listusers', {
           templateUrl: 'listusers',
           controller: 'listController'
        }).
        
        when('/listusers/:page', {
           templateUrl: 'listusers',
           controller: 'listController'
        }).
        otherwise({
           redirectTo: '/listusers'
        });
     }]);


    angular.module('loanApp').factory('dataFactoryName',['$http', 'myConfig', '$location', '$routeParams','Upload', function($http, myConfig, $location, $routeParams,Upload) {
        
        var factory = {};
   
        
        factory.getDetailFactory = function(user_id) {
            if(user_id) {
                // list only 1
                var objData = {};
                objData.type = 'getUserDetail';
                objData.user_id = user_id;
                return $http({method: 'POST', url: '<?php echo PAGE_AJAX;?>', data:objData});
            } 
            else 
            {
                var objData = {};
              /*  objData.search_testimonial_ref = $location.search().search_testimonial_ref || "";
                objData.search_testimonial_title = $location.search().search_testimonial_title || "";*/
                
                //objData.search_status = $location.search().search_status || "";
                
                objData.type = 'list_data';
                objData.page = $routeParams.page;
                //console.log(objData);
                return $http({method: 'POST', url: '<?php echo PAGE_AJAX;?>', data:objData});
            }
    
            //return $routeParams.id;
        };
    
        return factory;
    }]);
    
      angular.module('iwsApp').controller('addController', ['$scope', '$http', '$httpParamSerializer', '$location', '$routeParams', 'myConfig', '$timeout', '$filter','$window','$q','dataFactoryName', function($scope, $http, $httpParamSerializer, $location, $routeParams, myConfig, $timeout, $filter,$window,$q,dataFactoryName){
        
        $window.scrollTo(0, 0);

        $scope.submitProcess = 0;
        $scope.submitProcessMsg = '';
        $scope.fullPageLoader = 0;
     
        $scope.dataFrm = {};
        $scope.hTitle="Add";


        if($routeParams.user_id)
        {
            $scope.hTitle = 'Manage';
            
            $scope.user_id = $routeParams.user_id;
            
            var promise = dataFactoryName.getDetailFactory($routeParams.user_id);

            promise.then(
                function(payload) {
                    //console.log(payload);
                    if(parseInt(payload.data.data.length) > parseInt(0))
                    {
                        $scope.dataFrm.user_id=payload.data.data[0].user_id;
                       
                        if(payload.data.data[0].testimonial_title !='')
                        {

                        $scope.dataFrm.title = payload.data.data[0].testimonial_title.replace(/\\/g,'');
                        }

                        if(payload.data.data[0].testimonial_description !='')
                        {

                        $scope.dataFrm.description = payload.data.data[0].testimonial_description.replace(/\\/g,'');
                        }
                        
                       
                        
                        
                        
                        $timeout(function(){
                            $scope.fullPageLoader = 0;
                        }, 10000);
                    }
                    else
                    {
                        location.href = "index.php";
                       // $location.path('/welcome');
                    }


                },
                function(errorPayload) {
                    console.log('failure loading', errorPayload);
                }


            );

        }

        $scope.submit=function()
        {

            $scope.submitProcess = 1;
            
            $scope.dataFrm.type="saveData";
            console.log($scope.dataFrm);return false;
            $http({method:'POST',url:'<?php echo PAGE_AJAX; ?>',data:$scope.dataFrm}).success(function(response){
                
                $scope.submitProcess = 2;
                $scope.submitProcessMsg = response.MSG;


            $timeout(function(){
                
                $scope.submitProcess = 0;
                if (response.SUCCESS == '1') {
                    $location.url("/listTestimonial?m="+Math.random());
                    //$scope.dataFrm=null;
                }
                
            }, 3000);
            })
        }
      
          
    }]); 
     
})();	
</script>
