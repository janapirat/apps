function indexCtrl($scope) {
	
};

function updateCtrl($scope, $routeParams) {
	$scope.phoneId = $routeParams.phoneId;
};

function backupCtrl($scope, $http) {
	$http.get(OC.filePath('updater', 'ajax', 'backup/list.php'), {headers: {'requesttoken': oc_requesttoken}})
		.success(function(data) {
			$scope.entries = data.data;
		});
	
	$scope.doDelete = function(name){
		$http.get(OC.filePath('updater', 'ajax', 'backup/delete.php'), {
				headers: {'requesttoken': oc_requesttoken},
				params: {'filename': name}
			}).success(function(data) {
				$http.get(OC.filePath('updater', 'ajax', 'backup/list.php'), {headers: {'requesttoken': oc_requesttoken}})
					.success(function(data) {
						$scope.entries = data.data;
					});
			});
	}
	$scope.doDownload = function(name){
		window.open(OC.filePath('updater', 'ajax', 'backup/download.php')
			+ '?requesttoken=' + oc_requesttoken 
			+ '&filename=' + name
		);
	}
};
