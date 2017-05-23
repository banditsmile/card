<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <link href="http://www.elingka.com/css/h_skin1/common.css" type="text/css" rel="stylesheet" />
 <link href="http://www.elingka.com/css/h_skin1/page.css" type="text/css" rel="stylesheet" />
		<form method="post" action="index.php?m=mod_agent&c=underling&a=save">
          <div class="new_qie">
            <div class="new_qie2">
              <h2> 修改下级资料</h2>
            </div>
          </div>
          <table cellspacing="1" cellpadding="2" class="table1" style="margin-bottom: 10px;">
        <tbody><tr>
            <th colspan="2" style="text-align: left; padding-left: 10px">
                基本资料            </th>
    <tr>
      <td class="table1_left"> 下家账号： </td>
      <td width="78%" align="left" class="tableright1"><div align="left"><?php echo $vd['data']['aname']; ?></div></td>
    </tr>
    <tr>
      <td class="table1_left"> 账户状态： </td>
      <td class="tableright1">
        <div align="left">
          <select name="frozen">
            <?php (Option($vd['state'], $vd['data']['frozen'])); ?>
          </select>
        </div></td>
    </tr>
    <tr>
      <td class="table1_left"> 下家级别： </td>
      <td class="tableright1">
      	<div align="left">
      	  <select name="alv">
      	    <?php (Option($vd['ranks'], $vd['data']['alv'], 'name', 'id')); ?>
    	    </select>
        </div></td>
    </tr>
    
    <tr>
      <td class="table1_left"> 最后登陆IP： </td>
      <td class="tableright1"><div align="left"><?php echo $vd['data']['lastip']; ?></div></td>
    </tr>
    <tr>
      <td class="table1_left"> 最后登陆时间： </td>
      <td class="tableright1"><div align="left"><?php echo $vd['data']['lastdate']; ?></div></td>
    </tr>
    <tr>
      <td class="table1_left"> 注册IP： </td>
      <td class="tableright1"><div align="left"><?php echo $vd['data']['regip']; ?></div></td>
    </tr>
    <tr>
      <td class="table1_left"> 注册时间： </td>
      <td class="tableright1"><div align="left"><?php echo $vd['data']['regdate']; ?></div></td>
    </tr>
    <tr style="display:none">
      <td class="table1_left"> 下级权限： </td>
      <td class="tableright1">
        <div align="left">
          <input type="checkbox" value="1" id="rights_0" name="rights_0"/>
          售卡
          <input type="checkbox" value="1" id="rights_1" name="rights_1"/>
          修改价格
          <input type="checkbox" value="1" id="rights_2" name="rights_2"/>
        管理下级      </div></td>
    </tr>
    <tr>
      <td class="table1_left">&nbsp;</td>
      <td class="tableright1"><div align="left">
        <input type="submit" id="mysubmit" value="确认提交" class="tijiao_input"/>
        <input name="reset" type="reset" class="fanhui_input" value="重新填写"/>
      </div></td>
    </tr>
    <input type="hidden" value="<?php echo $vd['data']['rights']; ?>" id="thisright"/>
    <input type="hidden" value="<?php echo $vd['data']['aid']; ?>" name="aid" id="ubzaid"/>
  </table>
  </form> 
  </td>
	</tr>
</table>
</body>
</html>