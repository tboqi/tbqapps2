<p class="pagination">

	<?php if ($first_page !== false): ?>
		<a class="btn" href="<?php echo HTML::chars($page->url($first_page)); ?>" rel="first">首页</a>
	<?php else: ?>
		首页
	<?php endif;?>

	<?php if ($previous_page !== false): ?>
		<a class="btn" href="<?php echo HTML::chars($page->url($previous_page)); ?>" rel="prev">前一页</a>
	<?php else: ?>
		前一页
	<?php endif;?>

<?php
$start = $current_page - 3;
$end = $current_page + 2;
if ($start < 1) {
    $start = 1;
    $end = $end + (5 - $end);
}
if ($end > $total_pages) {
    $end = $total_pages;
}
?>
	<?php for ($i = $start; $i <= $end; $i++): ?>

		<?php if ($i == $current_page): ?>
			<span class="btn"><strong><?php echo $i; ?></strong></span>
		<?php else: ?>
			<a class="btn" href="<?php echo HTML::chars($page->url($i)); ?>"><?php echo $i; ?></a>
		<?php endif;?>

	<?php endfor;?>

	<?php if ($next_page !== false): ?>
		<a class="btn" href="<?php echo HTML::chars($page->url($next_page)); ?>" rel="next"><?php echo __('Next'); ?></a>
	<?php else: ?>
		<?php echo __('Next'); ?>
	<?php endif;?>

	<?php if ($last_page !== false): ?>
		<a class="btn" href="<?php echo HTML::chars($page->url($last_page)); ?>" rel="last"><?php echo __('Last'); ?></a>
	<?php else: ?>
		<?php echo __('Last'); ?>
	<?php endif;?>

</p><!-- .pagination -->