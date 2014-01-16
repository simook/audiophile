<?php

$ch = curl_init("http://echohifi.com/inventory.php");

//curl_setopt($ch, CURLOPT_FILE, $fp);
//curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);

$content = curl_exec($ch);
curl_close($ch);
//var_dump($content);



function parse_array($beg_tag, $close_tag){
	preg_match_all("($beg_tag.*$close_tag)siU", $this->html, $matching_data);
	return $matching_data[0];
}

$items = $content->parse_array('','');

$txt='<a href="/images/product/4516-large.jpg" rel="lightbox" alt="test99" title6="<b>Altec 445A</b><br><br> Vintage stereo tube preamplifier from Altec.  Completely functional.<p class=\'popup-purchase\'><a href=\'/details/4516/Altec_445A\' title=\'Altec 445A\' alt=\'Altec 445A\'><img src=\'/images/details.gif\'></a></p>"><img src="/images/product/4516-small.jpg" width="63" height="50" alt="Altec 445A" /></a>';

  $re1='.*?';	# Non-greedy match on filler
  $re2='((?:\\/[\\w\\.\\-]+)+)';	# Unix Path 1

  if ($c=preg_match_all ("/".$re1.$re2."/is", $txt, $matches))
  {
      $unixpath1=$matches[1][0];
      print "($unixpath1) \n";
  }
?>