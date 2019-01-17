<?php

function sqlStrNull($str){ if (is_null($str)) {return("NULL"); } else{return("'".$str."'");}}
function sqlStrVide($str){ if (is_null($str)) {return("''"); } else{return("'".$str."'");}}
function sqlDateNull($date){ if (is_null($date)) {return("NULL"); } else{return("'".$date."'");}}
function sqlIntNull($int){ if (is_null($int)) {return("NULL"); } else{return($int);}}
function sqlIntVide($int){ if (is_null($int)) {return("''"); } else{return($int);}}
function sqlIntZero($int){ if (is_null($int)) {return("'0'"); } else{return($int);}}
function sqlFloatNull($float){ if (is_null($float)) {return("NULL"); } else{return($float);}}
function sqlFloatVide($float){ if (is_null($float)) {return("''"); } else{return($float);}}
function sqlFloatZero($float){ if (is_null($float)) {return("'0'"); } else{return($float);}}
?>