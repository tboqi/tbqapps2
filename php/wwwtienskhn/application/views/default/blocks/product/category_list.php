<ul class="proList">
	<?php foreach ($category_list as $category) {?>
	<li><a href="<?php echo URL::site('product/cate/' . $category->id);?>"><?php echo $category->name;?></a></li>
	<?php }
?>
	<?php // <li class="borNone"><a href="#">灰砂砖</a></li> ?>
</ul>
