function indexCtrl($scope) {
	
};

function updateCtrl($scope, $routeParams) {
	$scope.phoneId = $routeParams.phoneId;
};

function backupCtrl($scope, $http) {
	$http.get(OC.filePath('updater', 'ajax', 'list.php')).success(function(data) {
		$scope.entries = data.data;
	});
};
