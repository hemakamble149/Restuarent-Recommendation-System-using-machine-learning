<?php
    $input= $_GET['UserID'];
    file_put_contents('pythonID.txt',$input);
    $command = escapeshellcmd('SimpleUserCF.py');
    $out = shell_exec($command);
	file_put_contents('output.txt',$out);
	$output = file_get_contents('output.txt');
	$output = explode("\n",$output);
	array_splice($output,0,5);
	$newoutput = implode("\n",$output);
	file_put_contents('output.txt',$newoutput);
	$extra = "These are some Restaurants recommended for you with ratings: ";
    echo "
	<body style='background-image: url(images.jpg); background-repeat: no-repeat;background-size: 100%'></body>
	<body>
	<center><pre>
	<strong><h2><p style= 'font-family:Pristina;font-color: white;font-size: 30px'>$extra</p></h2>
	<table>
	<tr><p style= 'font-family:Arial;font-style:italic;font-size: 20px'>$newoutput</p></tr>
	</table>
	</strong>
	</pre></center>
	</body>";
?>