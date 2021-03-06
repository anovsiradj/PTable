<?php
require('vendor/autoload.php');

$data = [
	["Data A","Data B","Data C"],
	["Data M","Data N","Data O"],
	["Data F","Data G","Data H"],
	["Data X","Data Y","Data Z"],
	["Data P","Data Q","Data R"],
	["Data S","Data T","Data U"],
	["Data I","Data J","Data K"]
];

$table = new avz\PTable\PTable('<table class="light">');

$thead = $table->thead();
	$tr = $thead->tr();
	$tr->th(['ONE','TWO','THREE'],'<th class="bgblue">');
	$tr->close();
$thead->close();

$index = 0;
$tbody = $table->tbody();
	foreach ($data as $n) {
		$tr = $tbody->tr();
			$custom_td_tag = ($index%2 === 0) ? '<td class="bggreen">' : '<td style="color:#222;">';
			$tr->td($n,$custom_td_tag);
		$tr->close();
		$index++;
	}
$tbody->close();
$mytable = $table->render();

echo <<<HTML
<style>
	body {background-color: #222;color: #fff;font-family: monospace;}
	table {font-size: 32px;max-width:100%;}table.light {background-color: #fff;}
	table td,table th {padding:5px 10px;}table td {border:1px solid red;}table th {border:1px solid blue;}
	.bgblue {background-color: #0099ff;}.bggreen {background-color: #669900;}
</style><pre>
HTML;

echo $mytable;
