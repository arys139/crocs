<html> 
 <head><title>Remove Attachment</title> 
 <script type="text/javascript">

 function confirmDelete(delUrl) {
   if (confirm("Are you sure you want to delete?")) {
      document.location = delUrl;
      }
   else {
      history.go(-1);
      }
 }

 </script>
 </head> 

 <body> 
 <h2><p> 

 <SCRIPT LANGUAGE="Javascript">

 //Function to get passing parameters
 function GetParam(name)
 {
 var start=location.search.indexOf("?"+name+"=");
 if (start<0) start=location.search.indexOf("&"+name+"=");
 if (start<0) return '';
 start += name.length+2;
 var end=location.search.indexOf("&",start)-1;
 if (end<0) end=location.search.length;
 var result=location.search.substring(start,end);
 var result='';
 for(var i=start;i<=end;i++) {
 var c=location.search.charAt(i);
 result=result+(c=='+'?' ':c);
 }
 return unescape(result);
 }

parm1 = 'ProcessDelAttachment1.php?CE_Hostname=';
parm2 = GetParam('CE_Hostname');
parm3 = GetParam('F');
parm4 = GetParam('V');
parm5 = GetParam('U');
parm  = parm1.concat(parm2).concat('&F=').concat(parm3).concat('&V=').concat(parm4).concat('&U=').concat(parm5);
message1 = 'Removing Attachment : ';
document.write(' Removing Attachment : '.concat(parm3));

Confirmation = confirmDelete(parm);

 </SCRIPT>
 </p></h2>
 </body> 
 </html> 
