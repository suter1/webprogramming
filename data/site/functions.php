<?php
function get_param($var, $default)
{
	if (isset($_GET[$var])) {
		return urldecode($_GET[$var]);
	}
	return $default;
}
