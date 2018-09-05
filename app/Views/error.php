<?php
$pageTitle = '404 page not found';

require_once 'layout/header.php';
require_once 'layout/pretty-page-start.php';
?>
    <div class="container text-center">

        <div class="display-1 text-muted mb-5"><i class="si si-exclamation"></i> <?=  $code; ?></div>

        <p class="h4 text-muted font-weight-normal mb-7"><?=  $message; ?></p>

        <a class="btn btn-primary" href="javascript:history.back()">
            <i class="fe fe-arrow-left mr-2"></i>Go back
        </a>
    </div>

<?php
require_once 'layout/page_bottom.php';
?>