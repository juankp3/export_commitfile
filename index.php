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
	


	//exec("git log",$output);
	exec("git log --name-status",$output);

	echo "<pre>";
	var_dump($output);
	echo "</pre>";


	$history = array();
	foreach($output as $line){
    if(strpos($line, 'commit')===0){
        if(!empty($commit)){
            array_push($history, $commit);  
            unset($commit);
        }
        $commit['hash']   = substr($line, strlen('commit'));
    }
    else if(strpos($line, 'Author')===0){
    $commit['author'] = substr($line, strlen('Author:'));
    }
    else if(strpos($line, 'Date')===0){
    $commit['date']   = substr($line, strlen('Date:'));
    }
    else{
    	if(!empty($line)){
    		$commit['message'][]= trim($line);	
    	}
   
    }
}

echo "<pre>";
var_dump($history);
echo "</pre>";


exit;

	echo "<pre>";
	var_dump($repo);
	echo "</pre>";
	//echo $repo->git('log --oneline');
	$res = $repo->git('log --name-status');
	echo "<pre>";
	var_dump($res);
	echo "</pre>";

	echo "<h1>---------- A ----------</h1>";

	$r1 = explode('', $res);

	echo "<pre>";
	var_dump($r1);
	echo "</pre>";


?>
	
</body>
</html>