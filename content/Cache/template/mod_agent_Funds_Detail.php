<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head><title>

	�¼��ͻ����Ѽ�¼��1����

</title>

    <link href="/index/css/common.css" type="text/css" rel="stylesheet" />

    <link href="/index/css/page.css" type="text/css" rel="stylesheet" /><body class="mainbg">

<table cellspacing="1" cellpadding="2" class="table1" style="margin-bottom: 10px;">

        <tbody><tr>

            <th colspan="2" style="text-align: left; padding-left: 10px">

                ��������            </th>

    <tr>

	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

	<tr>

	<td class="tableleft">

		<?php $item=$vd['item']; ?>

    <table cellspacing="1" cellpadding="0" class="table1" style="margin: 0">

        <tr>        <th width="8%"><span class="heardertop1">���</span></th>

		<th width="10%"><span class="heardertop1">�û���</span></th>

		<th width="30%"><span class="heardertop1">�̻�����</span></th>

		<th width="10%"><span class="heardertop1">�û�����</span></th>

		<th width="10%"><span class="heardertop1">��ϵ��</span></th>

		<th width="6%"><span class="heardertop1">״̬</span></th>

		<th width="10%"><span class="heardertop1">���</span></th> 

      </tr>

      <tr class="stline" onMouseOver="this.className='nd'" onMouseOut="this.className='stline'">

        <td>

          <?php if($item['aremain'] != ''){ echo round($item['aremain'], 3);} ?></td>

        <td>

          <?php if($item['selffrozenfunds'] != ''){ echo round($item['selffrozenfunds'], 3);} ?></td>

        <td>

          <?php if($item['tradefrozenfunds'] != ''){ echo round($item['tradefrozenfunds'], 3);} ?></td>

        <td>

          <?php if($item['sysfrozenfunds'] != ''){ echo round($item['sysfrozenfunds'], 3);} ?></td>

        <td>

          <?php if($item['bossfrozenfunds'] != ''){ echo round($item['bossfrozenfunds'], 3);} ?></td>

        <td>

          <?php if($item['income'] != ''){ echo round($item['income'], 3);} ?></td> 

        <td>

          <?php if($item['funds'] != ''){ echo round($item['funds'], 3);} ?></td> 

      </tr>

      <tr>

      	<td colspan="7" style="text-align:left;padding:5px">

      		�ʻ��ܽ�� = �ʻ�������� + �Լ������ʽ� + ���׶����ʽ� + ϵͳ�����ʽ� + �ϼ������ʽ� + �������ý�� + ������������

      	</td>

      </tr>

    </table>

	</td>

	</tr>

	</table>

	<br>

	<table cellspacing="1" cellpadding="2" class="table1" style="margin-bottom: 10px;">

        <tbody><tr>

            <th colspan="2" style="text-align: left; padding-left: 10px">

                �ʽ�ת��            </th>

    <tr>



	<?php if($vd['rights'][1]==1){ ?>

	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

	<tr>

	<td class="tableleft">

  <form method="post" action="index.php?m=mod_agent&c=Funds&a=SelfCz" name="cform" id="cform" onSubmit="return checklock()">

    <table width="100%" cellpadding="2" cellspacing="1" class="table5">

      <tr>

        <td width="15%" class="td_left"> �˺ţ�</td>

        <td width="78%" align="left" class="tableright1"><div align="left"><?php echo $item['company']; ?></div></td>

      </tr>

      <tr>

        <td width="15%" class="td_left"> ��������</td>

        <td width="78%" align="left" class="tableright1"><div align="left">

          <select name="fromobject" id="fromobject">

            

        

      	    

      		<?php (Option($vd['funds'])); ?>

      	

    	    

      

          </select>

          </div></td>

      </tr>

      <tr>

        <td width="15%" class="td_left"> ת��Ϊ��</td>

        <td align="left" class="tableright1"><p>

          <label>

          <div align="left">

            <select name="select">

              <option>�˻��������</option>

            </select>

          </div>

          </label>

        </p>

          </td>

      </tr>

      <tr>

        <td width="15%" class="td_left"><p>������</p></td>

        <td align="left" class="tableright1"><div align="left">

          <input type="text" class="input0" style="font-weight:normal" name="dollars" id="dollars" size="24"/>

        <?php echo $vd['lang']['moneyunit']; ?></div></td>

      </tr>

      <tr>

        <td width="15%" class="td_left"> ���뽻�����룺</td>

        <td width="78%" align="left" class="tableright1"><div align="left">

          <input type="password" class="input0" style="font-weight:normal" name="tradepwd" id="tradepwd" size="24"/>

        </div></td>

      </tr>

      <tr>

        <td width="15%" class="td_left"> ����ԭ��</td>

        <td width="78%" align="left" class="tableright1"><div align="left">

          <textarea name="reason" cols="50" rows="5" scrolling="yes" style="padding:5px"></textarea>

        </div></td>

      </tr>



      <tr>

        <td width="15%" class="td_left"></td>

        <td align="left" class="tableright1"><div align="left">

            <input type="submit" name="Submit" value="ȷ������" class="tijiao_input" />

            <input type="reset" name="reset" value="������д" class="fanhui_input" />

        </div></td>

      </tr>

    </table>

  </form>

  </td>

	</tr>

	</table>

  <?php }else{ ?>

  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">

	<tr>

	<td class="tableleft"><table width="100%" cellpadding="2" cellspacing="1" class="table5">

      <tr>

        <td width="15%" class="td_left"> <div align="center">δ��ͨȨ��</div></td>

      </tr>

    </table></td>

  </tr>

  </table>

  <?php } ?>

  <br/>

  <table cellspacing="1" cellpadding="2" class="table1" style="margin-bottom: 10px;">

        <tbody><tr>

            <th colspan="2" style="text-align: left; padding-left: 10px">

                ���˵��           </th>

    <tr>



	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

	<tr>

	<td class="tableleft"><table cellpadding="2" cellspacing="1" class="table1" style="margin-bottom: 10px;">

      <tbody>

        <tr>

          <td width="8%" class="table1_left"> ��ʾ��</td>

          <td width="92%" align="left" class="tableright1"><div align="left"><span style="text-align:left;padding:5px">�˴������Բ鿴�������ʻ������м�¼�������ʺŵ���ϸ�ʽ��������������������ʺ��б������ʽ������������ʾ���в�����������鿴���ʻ��ʽ𱻶����¼�����Բ鵽�����ʽ�Ϊʲô�����ᡣ</span></div></td>

        </tr>

        <tr>

          <td class="table1_left"> A�� </td>

          <td class="tableright1"><div align="left"><span style="text-align:left;padding:5px">�ϼ����ᡪ�����õ绰����QQ�������ϼ���ѯ����ԭ������ⶳ</span></div></td>

        </tr>

        <tr>

          <td class="table1_left"> B�� </td>

          <td class="tableright1"><div align="left"><span style="text-align:left;padding:5px">�Լ����ᡪ���������нⶳ</span></div></td>

        </tr>

        <tr>

          <td class="table1_left"> C�� </td>

          <td class="tableright1"><div align="left"><span style="text-align:left;padding:5px">���׶��ᡪ��������������ĳ��ֱ���Ʒ�����˹������Ʒ�����ڽ���û��˳����ɣ��ñʹ�</span></div></td>

        </tr>

        <tr>

          <td class="table1_left"> ������ </td>

          <td class="tableright1"><div align="left"><span style="text-align:left;padding:5px">�����ʱ�����ˣ������ϲ鿴�Ƿ��й���������Ȼ���ڡ������С�״̬��Ȼ���򹩻��̽���Ͷ�ߣ�Ҫ�������ײ��˿</span></div></td>

        </tr>

      </tbody>

	  <input name="hidden" type="hidden" id="thisright" value="<?php echo $vd['data']['rights']; ?>"/>

      <input type="hidden" value="<?php echo $vd['data']['aid']; ?>" name="aid" id="ubzaid"/>

    </table></td>

	</tr>

	</table>

<script type="text/javascript">

	var ctablenum = 1;

	var helperVal = 2;

	function checklock()

	{

		if($("dollars").value=="")

		{

			alert("����Ϊ��");

			$("dollars").focus();

			return false;

		}

	}

</script>

    </body>

</html>
