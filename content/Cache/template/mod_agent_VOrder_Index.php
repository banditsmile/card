<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>���ۼ�¼��ѯ</title>
    <link href="../../index/css/common.css" type="text/css" rel="stylesheet" />
    <link href="../../index/css/page.css" type="text/css" rel="stylesheet" />

<body class="mainbg">

<div class="new_qie">

  <div class="new_qie2">

    <h2> ���ۼ�¼��ѯ</h2>

  </div>

  <ul>

    <li><a href="" class="on">���ۼ�¼��ѯ</a></li>

    <li><a href="index.php?m=mod_agent&c=Order">������¼��ѯ</a></li>

    <li><a href="index.php?m=mod_agent&c=trade&tpl=history">�˻��ʽ���ϸ</a></li>

  </ul>

</div>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

	<tr>

	<?php $ptype=request('ptype');$ordstate=request('ordstate'); ?>

	<td class="tableleft">

		<form name="salecardhistory" method="get" action="index.php" id="advsearch">

<table width="100%" cellpadding="2" cellspacing="1" class="table1" style="margin: 0">
		<?php $vhistory=$vd['ishistory']==1?0:1;if($vd['hashistory'] == 1){ ?>

  	<tr>

       <td class="table1_left">       ��ѯ���</td>

      <td width="78%" class="tableright1">

      	<div align="left">

      	  <input type="hidden" name="ishistory" value="<?php echo $vd['ishistory']; ?>" />

      	  <a href="index.php?m=mod_agent&c=VOrder&ordstate=2&ishistory=<?php echo $vhistory; ?>"><font color="#ff0000"><u>

      	    <?php if($vd['ishistory']==0){ ?>

      	    ��ʷ���ݲ�ѯ

      	    <?php }else{ ?>

      	    �ص���ǰ���ݲ�ѯ

      	    <?php } ?>

      	    </u></font></a>    	    </div></td>
    </tr>

    <?php } ?>

		<tr>

		  <td class="table1_left"> ��Ʒ���ͣ�</td>
		  <td width="78%" class="tableright1">

          <div align="left"><select name="ptype" onChange="setk(this)">

              <option value="">ѡ�����Ϳɰ����ܻ�����û�����ѯ</option>

              <option value="km" 

              <?php if($ptype=='km'){ ?>

              selected

              <?php } ?>

              >���⿨��(�ɰ����ܲ�ѯ)

              </option>

              <option value="cz" 

              <?php if($ptype=='cz'){ ?>

              selected

              <?php } ?>

              >���߳�ֵ(�ɰ���ֵ�û�����ѯ)

              </option>

                </select>
            </div></td>
		</tr>

		<tr id="stypetr" style="<?php if($ptype !='km' && $ptype !='cz'){ ?>display:none<?php } ?>">

           <td class="table1_left"> <span id="stypelabel">
            
            <?php if($ptype=='cz'){ ?>
            
            ��ֵ�ʺţ�
            
            <?php }else if($ptype=='km'){ ?>
            
            �������룺
            
            <?php } ?>
            
              </span></td>
		  <td width="78%" class="tableright1">

        <input type="hidden" id="stype" name="stype" value="<?php if($ptype=='cz'){ ?>czaccount<?php }else if($ptype=='km'){ ?>cardnumber<?php }else{ ?>pname<?php } ?>">

        <input type="text" size="22" name="keywords"  id="tkeywords" value="<?php echo $vd['kw']; ?>">

        <span id="stypetip">

          <?php if($ptype=='km'){ ?>

          &nbsp;��ʽ������|����

          <?php } ?>
        </span></div></td>
    </tr>

		<tr>

		  <td class="table1_left"> ����״̬��</td>
		  <td width="78%" class="tableright1">

			<div align="left"><select name="ordstate">

			    <option value="">����</option>

	              <option value="2" 

			    <?php if($ordstate==2){ ?>

			    selected

			    <?php } ?>

			    >�ɹ�����

			    </option>

	              <option value="-1" 

			    <?php if($ordstate==-1){ ?>

			    selected

			    <?php } ?>

			    >ʧ�ܶ���

			    </option>

	              <option value="1" 

			    <?php if($ordstate==1){ ?>

			    selected

			    <?php } ?>

			    >�����ж���

			    </option>

			          </select>
	          </div></td>
		</tr>

		<tr>

		   <td class="table1_left"> ѡ��Ա����</td>
		  <td width="78%" class="tableright1">

			<div align="left"><select name="staffname">

		          <?php if($vd['canseeother'] == 1){ ?>

			        <option value="">����Ա��(�������˺�)</option>

		          <?php } ?>

		          <?php foreach($vd['staff'] as $item){ ?>

		          <?php if($vd['canseeother'] == 1){ ?>

		          <option value="<?php echo $item['staffname']; ?>" 

			    <?php if($vd['staffname']==$item['staffname']){ ?>

			    selected

			    <?php } ?>

			    ><?php echo $item['realname']; ?>(<?php (DisplayCode($item['staffid'],2)); ?>)

			    </option>

		          <?php }else{ ?>

		          <?php if($vd['agent'][9] == $item['staffid']){ ?>

		          <option value="<?php echo $item['staffname']; ?>" 

			    <?php if($vd['staffname']==$item['staffname']){ ?>

			    selected

			    <?php } ?>

			    ><?php echo $item['realname']; ?>(<?php (DisplayCode($item['staffid'],2)); ?>)

			    </option>

		          <?php } ?>

		          <?php } ?>

		          <?php } ?>

			          </select>
	          </div></td>
		</tr>

		<tr>

		  <td class="table1_left"> ��ѯʱ��Σ�</td>
		  <td width="78%" class="tableright1">

          <div align="left">

            <input type="text" name="startdate" size="18" value="<?php echo $vd['startdate']; ?>" style="vertical-align:middle;" id="startdate"/>

                  <strong>��</strong>&nbsp;

            <input type="text" name="enddate" size="18" value="<?php echo $vd['enddate']; ?>" style="vertical-align:middle;" id="enddate"/>
              </div></td>
		</tr>

		<tr>
 <td class="table1_left"> </td>

		  <td width="78%" class="tableright1">

			<div align="left">

			  <input type="hidden" name="m" value="mod_agent" />

			  <input type="hidden" name="c" value="VOrder" />

			  <input type="hidden" id="export" name="export" value="0"/>

			  <input name="btnQuery" type="submit" class="input_s" onClick="setAct(0)" value=" "/>

			  <input name="btnQuery2" type="submit" class="input_d" onClick="setAct(1)" value=" " />
			</div></td>
		</tr>
	</table>

	</form>

	</td>

	</tr>

</table>

	<br>

	<tr>

</tr>	
    <table cellspacing="1" cellpadding="0" class="table1" style="margin: 0">
  <tr>
    <th width="16%" class="heardertop1">��������</td>
    <th width="24%" class="heardertop1">��Ʒ����</td>
    <th width="8%" class="heardertop1">��Ʒ����</td>
    <th width="6%" class="heardertop1">����</td>
    <th width="6%" class="heardertop1">����</td>
    <th width="6%" class="heardertop1">�ۼ�</td>
    <th width="8%" class="heardertop1">���۽��</td>
    <th width="6%" class="heardertop1">����</td>
    <th width="8%" class="heardertop1">Ա��</td>
    <th width="6%" class="heardertop1">״̬</td>
    <th width="6%" class="heardertop1">��ϸ</td>
  <?php $cprice_sum = 0;$buyerprice_sum = 0;$qty_sum = 0;$profit_sum = 0;foreach($vd['items'] as $item) { ?>
		  	  	    <tr class="trd">
    <td><?php echo $item['orddate']; ?></td>
    <td align="left"><?php echo $item['pname']; ?></td>
    <td><?php (ProductType($item['ptype'])); ?></td>
    <td><strong><?php echo $item['qty']; ?></strong>��</td>
    <td><?php if($vd['canseeprice']){ ?>
      <?php echo $item['cprice']; ?>
        <?php }else{ ?>
      --
      <?php } ?></td>
    <td><?php echo $item['buyerprice']; ?></td>
    <td><?php echo $item['buyerprice']*$item['qty']; ?></td>
    <td><?php if($vd['canseeprice']){echo round($item['staffprofit'], 3);}else{ ?>
      --
        <?php } ?></td>
    <td><?php (Operator($vd['agent'][0], $item['cname'], $vd['agent'][9])); ?></td>
    <td><span class="eff"><?php (OrderState($item['ordstate'],$item['ptype'])); ?></span></td>
    <td><input type="button" name="detail" value="��ϸ" class="buttonnor" onclick="location.href='index.php?m=mod_agent&amp;c=Order&amp;a=detail&amp;in=1&amp;ordno=<?php echo $item['ordno']; ?>';" /></td>
  </tr>
  <?php $cprice_sum=$cprice_sum+$item['cprice']*$item['qty'];$buyerprice_sum=$buyerprice_sum+$item['buyerprice']*$item['qty'];$qty_sum=$qty_sum+$item['qty'];$profit_sum=$profit_sum+$item['staffprofit'];} ?>
  <tr class="thr">
    <td colspan="3">��ҳ�ϼƣ�</td>
    <td><?php echo $qty_sum; ?></td>
    <td colspan="2">&nbsp;</td>
    <td><?php if($vd['canseeprice']){ echo round($buyerprice_sum,3);}else{ ?>
      --
        <?php } ?></td>
    <td><?php if($vd['canseeprice']){ echo round($profit_sum,3);}else{ ?>
      --
        <?php } ?></td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr class="thr">
    <td colspan="3">��ѯ�ϼƣ�</td>
    <td><?php echo $vd['tradedata']['qty_sum']; ?>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td><?php if($vd['canseeprice']){ echo round($vd['tradedata']['buyerprice_sum'],3);}else{ ?>
      --
        <?php } ?></td>
    <td><?php if($vd['canseeprice']){echo round($vd['tradedata']['staffprofit_sum'],3);}else{ ?>
      --
        <?php } ?></td>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
		   <script language="javascript" type="text/javascript" src="../../index/js/jquery.js"></script>
         <script language="javascript" type="text/javascript" src="../../index/js/select.js"></script> 
		<div align="right"><?php widget("fpage");include($path_cache.DS."mod_agent_Shared_fpage.php"); ?>
	      </div>
        </div>
</body>

</html>

<script type="text/javascript">

function openScript(url,name,width,height)

{

    var Win = window.open(url,name,'width=' + width + ',height=' + height + ',resizable=0,scrollbars=yes,menubar=no,status=no');

}



function dateDialog(idx)

{

  obj = document.getElementById(idx)

  dv=window.showModalDialog("<?php echo $vd['sc']; ?>tools/datedialog.html?date="+obj.value,"44","center:1;help:no;status:no;dialogHeight:240px;dialogWidth:185px;scroll:no")

  if (dv) {if (dv=="null") obj.value='';else obj.value=dv;}

}



function setk(obj)

{

  v = obj.options[obj.selectedIndex].value;

  $("tkeywords").value = "";

  if(v == "")

  {

    $("stypetr").style.display = "none";

    $("stype").value = "pname";

  }

  else if(v == "km")

  {

    $("stypetr").style.display = "";

    $("stype").value = "cardnumber";

    $("stypelabel").innerHTML = "�������룺";

    $("stypetip").innerHTML = "&nbsp;��ʽ������|����";

  }

  else if(v == "cz")

  {

    $("stypetr").style.display = "";

    $("stype").value = "czaccount";

    $("stypelabel").innerHTML = "��ֵ�ʺţ�";

    $("stypetip").innerHTML = "";

  }

}

function setAct(v)

{

	$("export").value = v;

	if(v > 0)

	{

	  $("advsearch").submit();

	}

}



</script>
