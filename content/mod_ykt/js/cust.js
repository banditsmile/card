//kbegin
kw = Array();
kv = Array();
//kend

len = kw.length;
for(i = 0; i < len; i++)
{
	str = '<a href="' + kv[i] + '">' + kw[i] + '</a> &nbsp;';
  document.write(str);
}
