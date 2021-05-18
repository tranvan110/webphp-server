<?php
if (ENVIRONMENT == 'development') {
	echo ('<script>');
	foreach ($GLOBALS['logmsg'] as $logmsg) {
		echo ($logmsg);
	}
	echo ('</script>');
	$GLOBALS['logmsg'] = null;
}

if (RENDERMODE == 'single_page_app') {
	echo ('<script src="/assets/js/index.min.js"></script>');
}
?>
<script src="/assets/js/scripts.min.js"></script>