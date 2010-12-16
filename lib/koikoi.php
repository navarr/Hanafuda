<?php
	require_once(dirname(__FILE__)."/hanafuda.php");

	class Koikoi extends Hanafuda
	{
		// See Hanafuda::$STANDARD_DECK
		public $deck;
		/* Zones
			0 => Player 1's Hand
			1 => Player 1's Prizes
			2 => Discard Pile
			3 => Player 2's Hand
			4 => Player 2's Prizes

			1 & 4 are Arrays:
			
			0 => Raw Card Arrays
			1 => Point Array
				[20],[10],[5],[1]
			2 => Flag Array
				[1],[2],[4],[8],[16],[32],[64]
		*/
		public $zones;

		public $dealer = 1; // 1 or 2
		public $turn = 1; // 1 or 2

		public $month = 0;
		
		/*
			Basic Constructor
		*/
		function __construct($deck = null)
		{
			if($deck === null)
			{
				// Create the Deck, Shuffle, Check for Who Goes First
					foreach($this->STANDARD_DECK as $v)
						$this->deck[] = $v;

					$this->_shuffle();

					if($this->_deck_sort_by_earliest_month($this->get_top_card(true),$this->get_top_card(true)))
						$this->dealer = $this->turn = 1;
					else
						$this->dealer = $this->turn = 2;

				// Recreate the Deck, Shuffle, Deal
					$this->deck = array();

					foreach($this->STANDARD_DECK as $v)
						$this->deck[] = $v;

					$this->_shuffle();

					$this->_first_deal();
			}
		}

		public function get_card_name($array,$lang = "EN")
		{
			$name = array();
			switch($lang)
			{
				case "EN":
				default:
					switch($array[1])
					{
						case  0: $name[0] = "Pine";break;
						case  1: $name[0] = "Plum Blossom";break;
						case  2: $name[0] = "Cherry Blossom";break;
						case  3: $name[0] = "Wisteria";break;
						case  4: $name[0] = "Iris";break;
						case  5: $name[0] = "Peony";break;
						case  6: $name[0] = "Clover";break;
						case  7: $name[0] = "Pampas";break;
						case  8: $name[0] = "Chrysanthemum";break;
						case  9: $name[0] = "Maple";break;
						case 10: $name[0] = "Willow";break;
						case 11: $name[0] = "Paulownia";break;
					}
					switch($array[2])
					{
						case  1: $name[1] = "Basic";break;
						case  5: $name[1] = "Ribbon";break;
						case 10: $name[1] = "Animal";break;
						case 20: $name[1] = "Bright";break;
					}
					$name[2] = "";
					$name[3] = $array[2];
					for($i = 1;$i <= 64;$i *= 2)
					{
						if($array[3] & $i)
						{
							switch($i)
							{
								case  1: $name[2] = "Akatan";break;
								case  2: $name[2] = "Aotan";break;
								case  4: $name[2] = "Viewing Card";break;
								case  8: $name[2] = "Sake Cup";break;
								case 16: $name[2] = "Ino Shika Chou";break;
								case 32: $name[2] = "Rainman";break;
								case 64: $name[2] = "Lightning";break;
							}
						}
					}
					break;
			}
			ksort($name);
			return $name;
		}

		private function _first_deal()
		{
			for($a = 0;$a < 2;$a++)
			{
				for($i = 0;$i < 4;$i++)
					$this->zones[0][] = $this->get_top_card(true);
				for($i = 0;$i < 4;$i++)
					$this->zones[2][] = $this->get_top_card(true);
				for($i = 0;$i < 4;$i++)
					$this->zones[3][] = $this->get_top_card(true);
			}
			usort($this->zones[0],array($this,"_deck_sort_by_earliest_month"));
			usort($this->zones[2],array($this,"_deck_sort_by_earliest_month"));
			usort($this->zones[3],array($this,"_deck_sort_by_earliest_month"));			
		}

		public function get_top_card($delete = false)
		{
			$i = count($this->deck)-1;
			$card = $this->deck[$i];
			if($delete) unset($this->deck[$i]);
			return $card;
		}

		private function _increment_month()
		{
			$this->month++;
			if($this->month > 12)
				$this->month -= 12;
		}

		/*
			Shuffle Function.
			Shuffles all cards left in the current deck.
		*/
		private function _shuffle()
		{
			$cards = array();
			foreach($this->deck as $v)
			{
				$cards[] = $v;
			}
			$this->deck = array();
			while(count($cards) > 0)
			{
				$i = rand(0,count($cards)-1);
				$this->deck[] = $cards[$i];
				unset($cards[$i]);
				usort($cards,array($this,"_deck_sort_by_id"));
			}
		}

		/*
			Deck Sort (by ID)
			Called in PHP's usort for sorting a deck.
		*/
		private function _deck_sort_by_id($a,$b)
		{
			if($a[0] > $b[0])
				return 1;
			else if($a[0] < $b[0])
				return -1;
			else
				return 0;
		}
	
		/*
			Deck Sort (by Value)
			Called in PHP's usort for sorting the prizes.
		*/
		private function _deck_sort_by_value($a,$b)
		{
			if($a[2] > $b[2] || ($a[2] == $b[2] && $a[1] > $b[1]))
				return 1;
			else if($a[2] == $b[2] && $a[1] == $b[1])
				return 0;
			else
				return -1;
		}

		private function _deck_sort_by_earliest_month($a,$b)
		{
			if($a[1] < $b[1])
				return -1;
			else if($b[1] < $a[1])
				return 1;
			else
				return 0;
		}
	}