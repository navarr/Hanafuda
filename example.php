<?php
	require_once("include.php");
	$i = 0;
	foreach($koikoi->zones as $zoneID => $zone)
	{
		if($zoneID == 0) echo "Player 1's Hand: <br />";
		if($zoneID == 1) echo "Player 1's Prizes: <br />";
		if($zoneID == 2) echo "Table: <br />";
		if($zoneID == 3) echo "Player 2's Hand: <br />";
		if($zoneID == 4) echo "Player 2's Prizes: <br />";

		if(count($zone) < 1)
			echo "None";
		else
			if($zoneID == 0 || $zoneID == 2 || $zoneID == 3)
			{
				$i = 0;
				foreach($zone as $card)
				{
					$i++;
					$file = "img/cards/".($card[0]+1).".png";
					$name = $koikoi->get_card_name($card);
					echo "<img src=\"{$file}\" title=\"{$name[0]} {$name[1]}\" />";
					echo " ";
					if($i == count($zone)) echo "<br /><br />";
					elseif($zoneID == 2 && $i % round(count($zone)/2) == 0) echo "<br />";
				}
			}
			else
				foreach($zone[0] as $card)
					echo "<li>",$koikoi->get_card_name($card),"</li>";
		echo "</ul>";
	}
	echo "Top Card: <br />";
	$top = $koikoi->get_top_card();
	$file = "img/cards/".($top[0]+1).".png";
	echo "<img src=\"{$file}\" /><br /><br />";
	echo "Turn: <br />";
	echo "<ul><li>";
	echo ($koikoi->turn == 1 ? "Player 1" : "Player 2");
	echo "</li></ul>";
	echo "Dealer: <br />";
	echo "<ul><li>";
	echo ($koikoi->dealer == 1 ? "Player 1" : "Player 2");
	echo "</li></ul>";
	echo "Month: <br />";
	$file = "img/cards/".((($koikoi->month+1)*4)-3).".png";
	echo "<img src=\"{$file}\" /><br /><br />";