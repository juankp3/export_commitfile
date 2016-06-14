<?php
require_once dirname(__FILE__) . '/test/vendor/lime.php';
require_once dirname(__FILE__) . '/test/PHPGit_RepoTestHelper.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Git php</title>
</head>
<body>

<?php 
	$repo = new PHPGit_Repository('/Users/kuga/Projects/kuga/export_commitfile');
	
	echo "<pre>";
	var_dump($repo);
	echo "</pre>";
	//echo $repo->git('log --oneline');
	echo $repo->git('log --name-status');


?>
	
</body>
</html>