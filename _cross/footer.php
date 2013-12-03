<div class="mtl">
  <div class="bottom-menu bottom-menu-inverse">
    <div class="container">
      <div class="row">
        <div class="col-md-2 navbar-brand">
        	<?php
			if (file_exists($Setlogo)):?>
			<a href="<?php echo RW(0);?>" class="navbar-brand"><img src="<?php echo $Setlogo?>" alt="메인으로" style="width:82px;opacity:70%;"/></a>
			<?php else:?>
			<a href="<?php echo RW(0);?>" class="navbar-brand"><img src="<?php echo $g['img_layout']?>/logo.png" alt="메인으로" style="opacity:70%;"/></a>
			<?php endif?>
        </div>

        <div class="col-md-10">
          <ul class="bottom-links pull-right">
            <li><a href="<?php echo RW('mod=agreement')?>">홈페이지 이용약관</a></li>
            <li><a href="<?php echo RW('mod=private')?>">개인정보 취급방침</a></li>
            <li><a href="<?php echo RW('mod=postrule')?>">게시물 게재원칙</a></li>
          </ul>
          <div class="clearfix"></div>
          <div class="copyright pull-right">
				Copyright &copy; <?php echo $date['year']?> <?php echo $_SERVER['HTTP_HOST']?> All rights reserved.
			</div>
        </div>
      </div>
    </div>
  </div> <!-- /bottom-menu-inverse -->
</div>

<script type="text/javascript">
//<![CDATA[
function showLogCheck(f)
{
	if (f.id.value == '')
	{
		alert('아이디나 이메일을 입력해 주세요.');
		f.id.focus();
		return false;
	}
	if (f.pw.value == '')
	{
		alert('비밀번호를 입력해 주세요.');
		f.pw.focus();
		return false;
	}
	return true;
}
//]]>
</script>