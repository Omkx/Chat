<?php
include("config.php");
$sql=$dbh->prepare("SELECT * FROM messages ORDER BY posted DESC;
");
$sql->execute();
// $fecha = date('Y-m-j H:i:s');
// $segundos=strtotime($fecha) - strtotime('now');
$conteo = 0;
// $coloresXpersona = [];
// $colorXpersona = [];
// $personas = [];
while($r=$sql->fetch()){
$tiempo= strtotime('now') - strtotime($r['posted']);
$minutos = intval((($tiempo) / 60) - 300);

if($minutos > 60){
	$minutos = round($minutos / 60);
	if ($minutos >= 48)
	{
		$minutos = "";
		// $format = $r['posted'];
		$format = date("d M Y H:i",strtotime($r['posted']));
	}
	elseif($minutos > 24 and $minutos < 48)
	{
		$minutos = "";
		$format = "Yesterday";
	}
	else
	{
		$format = "hours ago";
	}
}
elseif($minutos >= 1)
{
	$format = "minutes ago";
}
else
{
	$minutos = "Just";
	$format = "now";
}

$letra = strtoupper(substr($r['name'] , 0 ,1));
$nombre = ucwords($r['name']);

// if(in_array($r['name'], $personas))
// {
// 	// $indice = array_search($colorXpersona, $coloresXpersona);
// 	// $color = $coloresXpersona[$indice,1];
// 	$indice = array_search($colorXpersona, $coloresXpersona);
// 	$color = $coloresXpersona[$indice][1];
// 	// echo json_encode($coloresXpersona);
// }else{
// 	$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
// 	$color = $rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
// 	$personas[] = $r['name'];
// 	$colorXpersona = array($r['name'],$color);
// 	$coloresXpersona[] = $colorXpersona;
// 	// echo json_encode($colorXpersona);
// 	// $coloresXpersona[] = $colorXpersona;
// 	echo json_encode($coloresXpersona);
// }

// $colorXpersona = array($r['nombre'],$color);
// $coloresXpersona[] = $colorXpersona;

// $key = array_search($colorXpersona, array_column($coloresXpersona, 'uid'));

// if(in_array($colorXpersona, $coloresXpersona)){
// 	$indice = array_search($colorXpersona, $coloresXpersona);
// 	$color = $coloresXpersona[$indice,1];
// }else{
// 	$coloresXpersona[] = $colorXpersona;

// 	$colores[] = $color;
// }

// $nombres[] = $r['name'];

// $colores[] = $color;


if($conteo % 2 == 0)
{
 echo <<<_END
        <li class="left clearfix"><span class="chat-img pull-left">
            <img src="http://placehold.it/50/4CAF50/fff&text={$letra}" alt="User Avatar" class="img-circle" />
                </span>
                    <div class="chat-body clearfix">
                        <div class="header">
                            <strong class="primary-font">{$nombre}</strong> 
                            <small class="pull-right text-muted">
                                <span class="glyphicon glyphicon-time"></span>{$minutos} {$format}
                             </small>
                        </div>
 						<span class='msgc'>{$r['msg']}</span>
                    </div>
        </li>
_END;
$conteo++;
}
else
{
	echo <<<_END
        <li class="right clearfix"><span class="chat-img pull-right">
            <img src="http://placehold.it/50/E0F2F1/fff&text={$letra}" alt="User Avatar" class="img-circle" />
                </span>
                    <div class="chat-body clearfix">
                        <div class="header">
                        	<small class=" text-muted">
                        		<span class="glyphicon glyphicon-time"></span>
                        		{$minutos} {$format}
                            </small>
                            <strong class="pull-right primary-font">{$r['name']}</strong>
                        </div>
 						<p class='msg' title='{$r['posted']}'></p><span class='msgc'>{$r['msg']}</span>
                    </div>
        </li>
_END;
$conteo++;
}

}
if(!isset($_SESSION['user']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'){
 echo "<script>window.location.reload()</script>";
}
?>