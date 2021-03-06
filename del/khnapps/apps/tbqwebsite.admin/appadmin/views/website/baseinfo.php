<div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3>网站基本信息管理</h3>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <form id="websiteBaseinfoForm" action="<?php echo url::site('website/baseinfo'); ?>" method="post">
            <fieldset>
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <p>
              <label>网站标题</label>
              <input class="text-input small-input" type="text" id="title" name="title" value="<?php echo $baseinfo->title; ?>" />
              <span class="input-notification information png_bg">Successful message</span>
              <!-- Classes for input-notification: success, error, information, attention -->
              <br />
              <small>title</small> </p>
            <p>
              <label>描述</label>
              <input class="text-input large-input" type="text" id="description" name="description" value="<?php echo $baseinfo->description; ?>" />
              <br />
              <small>description</small>
            </p>
            <p>
              <label>关键字</label>
              <input class="text-input small-input" type="text" id="keywords" name="keywords" value="<?php echo $baseinfo->keywords; ?>" />
              <br />
              <small>keywords</small></p>
            <p>
              <input class="button" type="submit" value="Submit" />
            </p>
            </fieldset>
            <input type="hidden" name="id" value="<?php echo $baseinfo->id; ?>" />
            <div class="clear"></div>
            <!-- End .clear -->
          </form>
        </div>
      </div>
      <!-- End .content-box-content -->
    </div>
<script type="text/javascript" src="<?php echo Resource::js_common('jquery.form.js'); ?>"></script>
<script type="text/javascript" src="<?php echo Resource::js_common('yuqi_utils.js'); ?>"></script>
<script type="text/javascript">
$(function(){
	$('#websiteBaseinfoForm').ajaxForm( {
		dataType :'json',
		beforeSubmit :beforeSubmit,
		success :function(data) {
			if (data.status == 1) {
				$('.notification').html('<div>添加成功</div>');
				location.href = data.url;
			} else {
				var errorsHtml = '';
				$.each(data.errors, function(field, msg) {
					errorsHtml += '<div>' + msg + '</div>';
				});
				$('.notification').html(errorsHtml);
				$b = $(":submit");
				$b[0].disabled = false;
			}
		}
	});
	$('tbody a.edit').click(function(){
		alert('此功能未完成');
		return false;
	});
});
</script>