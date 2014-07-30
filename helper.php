<?php

/**
 * Formate date for interval
 * @param  datetime $start
 * @param  datetime $end
 * @return string
 */
function formate_date_interval($start, $end) {

	$start = human_date($start);
	$end   = ($end) ? human_date($end) : null;
	
	if ( ! $end )
		return 'Depuis '.$start;

	return $start.' - '.$end;

}

/**
 * Month Year
 * @param  datetime $start
 * @return string
 */
function human_date($date) {
	return ucfirst( utf8_encode( strftime('%B %Y',strtotime($date)) ) );
}

?>