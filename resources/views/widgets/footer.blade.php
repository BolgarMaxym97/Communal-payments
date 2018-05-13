<?php
$currentYear = date('Y');
$year = '2017';
if ($currentYear !== $year) {
    $year .= '-' . $currentYear;
}
?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.4.0
    </div>
    <strong>Copyright &copy; {{ $year }}</strong> WDS
</footer>
<div class="control-sidebar-bg"></div>