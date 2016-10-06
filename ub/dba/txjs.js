function tx(strx)
{
alert("tx1");
  // added "/" conversion
  var str_esc=escape(strx);
//alert("tx2 (" + str_esc + ")");
  var res = str_esc.replace(/%/gi, "^");
  // replace / with ^2F
//alert("tx3 (" + res + ")");
  var ss = '';
  var out = '';
  for ( i = 0; i < res.length; i++)
      {
        ss = res.substr(i,1)
        if (ss == '/')
        { 
          out = out + '^2F';
        } else {
          out = out + ss;
        } // endif
  } // forend
// alert("tx4 (" + out + ")");
// convert 0A (cr) to non ascii for storage
var pos = out.indexOf("^0A");
//alert("tx5 (" + pos + ")");
  while (pos != -1) 
  {
     out = out.replace("^0A","^RL");
     pos = out.indexOf("^0A");
  } // wend
//alert("tx6 (" + out + ")");
  return(out);
} 

