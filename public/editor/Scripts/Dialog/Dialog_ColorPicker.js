var OxO961b=["=","; path=/;"," expires=",";","cookie","length","","#ffffff","CECC","onmouseover","event","srcElement","target","className","colordiv","style","onmouseout","onclick","CheckboxColorNames","checked","cname","backgroundColor","cvalue","colorpicker.php?UC=","Culture","\x26setting=","EditorSetting","dialogWidth:500px;dialogHeight:420px;help:0;status:0;resizable:1","dialogArguments","object","onchange","color","editor","divpreview","value","#","RecentColors","SPAN","ValidColor"];function SetCookie(name,Ox254,Ox255){var Ox256=name+OxO961b[0]+escape(Ox254)+OxO961b[1];if(Ox255){var Ox23d= new Date();Ox23d.setSeconds(Ox23d.getSeconds()+Ox255);Ox256+=OxO961b[2]+Ox23d.toUTCString()+OxO961b[3];} ;document[OxO961b[4]]=Ox256;} ;function GetCookie(name){var Ox258=document[OxO961b[4]].split(OxO961b[3]);for(var i=0;i<Ox258[OxO961b[5]];i++){var Ox259=Ox258[i].split(OxO961b[0]);if(name==Ox259[0].replace(/\s/g,OxO961b[6])){return unescape(Ox259[1]);} ;} ;} ;function GetCookieDictionary(){var Ox25b={};var Ox258=document[OxO961b[4]].split(OxO961b[3]);for(var i=0;i<Ox258[OxO961b[5]];i++){var Ox259=Ox258[i].split(OxO961b[0]);Ox25b[Ox259[0].replace(/\s/g,OxO961b[6])]=unescape(Ox259[1]);} ;return Ox25b;} ;function GetCookieArray(){var arr=[];var Ox258=document[OxO961b[4]].split(OxO961b[3]);for(var i=0;i<Ox258[OxO961b[5]];i++){var Ox259=Ox258[i].split(OxO961b[0]);var Ox256={name:Ox259[0].replace(/\s/g,OxO961b[6]),value:unescape(Ox259[1])};arr[arr[OxO961b[5]]]=Ox256;} ;return arr;} ;var __defaultcustomlist=[OxO961b[7],OxO961b[7],OxO961b[7],OxO961b[7],OxO961b[7],OxO961b[7],OxO961b[7],OxO961b[7]];function GetCustomColors(){var Ox260=__defaultcustomlist.concat();for(var i=0;i<18;i++){var Ox261=GetCustomColor(i);if(Ox261){Ox260[i]=Ox261;} ;} ;return Ox260;} ;function GetCustomColor(Ox263){return GetCookie(OxO961b[8]+Ox263);} ;function SetCustomColor(Ox263,Ox261){SetCookie(OxO961b[8]+Ox263,Ox261,60*60*24*365);} ;var _origincolor=OxO961b[6];document[OxO961b[9]]=function (Ox2fd){Ox2fd=window[OxO961b[10]]||Ox2fd;var Ox285=Ox2fd[OxO961b[11]]||Ox2fd[OxO961b[12]];if(Ox285[OxO961b[13]]==OxO961b[14]){firecolorchange(Ox285[OxO961b[15]].backgroundColor);} ;} ;document[OxO961b[16]]=function (Ox2fd){Ox2fd=window[OxO961b[10]]||Ox2fd;var Ox285=Ox2fd[OxO961b[11]]||Ox2fd[OxO961b[12]];if(Ox285[OxO961b[13]]==OxO961b[14]){firecolorchange(_origincolor);} ;} ;document[OxO961b[17]]=function (Ox2fd){Ox2fd=window[OxO961b[10]]||Ox2fd;var Ox285=Ox2fd[OxO961b[11]]||Ox2fd[OxO961b[12]];if(Ox285[OxO961b[13]]==OxO961b[14]){var Ox3d0=document.getElementById(OxO961b[18])&&document.getElementById(OxO961b[18])[OxO961b[19]];if(Ox3d0){do_select(Ox285.getAttribute(OxO961b[20])||Ox285[OxO961b[15]][OxO961b[21]]);} else {do_select(Ox285.getAttribute(OxO961b[22])||Ox285[OxO961b[15]][OxO961b[21]]);} ;} ;} ;var _editor;function firecolorchange(Ox3d3){} ;function ShowColorDialog(Ox363){var Ox26f=OxO961b[23]+editor.GetScriptProperty(OxO961b[24])+OxO961b[25]+editor.GetScriptProperty(OxO961b[26]);var Ox3d5=OxO961b[27];var Ox271=showModalDialog(Ox26f,null,Ox3d5);if(Ox271!=null&&Ox271!==false){Ox363(Ox271);} ;} ;if(top[OxO961b[28]]){if( typeof (top[OxO961b[28]])==OxO961b[29]){if(top[OxO961b[28]][OxO961b[30]]){firecolorchange=top[OxO961b[28]][OxO961b[30]];_origincolor=top[OxO961b[28]][OxO961b[31]];_editor=top[OxO961b[28]][OxO961b[32]];} ;} ;} ;var _selectedcolor=null;function do_select(Ox261){_selectedcolor=Ox261;firecolorchange(Ox261);var Ox10=document.getElementById(OxO961b[33]);if(Ox10){Ox10[OxO961b[34]]=Ox261;} ;} ;function do_saverecent(Ox261){if(!Ox261){return ;} ;if(Ox261[OxO961b[5]]!=7){return ;} ;if(Ox261.substring(0,1)!=OxO961b[35]){return ;} ;var Ox266=Ox261.substring(1,7);var Ox3d9=GetCookie(OxO961b[36]);if(!Ox3d9){Ox3d9=OxO961b[6];} ;if((Ox3d9[OxO961b[5]]%6)!=0){Ox3d9=OxO961b[6];} ;for(var i=0;i<Ox3d9[OxO961b[5]];i+=6){if(Ox3d9.substr(i,6)==Ox266){Ox3d9=Ox3d9.substr(0,i)+Ox3d9.substr(i+6);i-=6;} ;} ;if(Ox3d9[OxO961b[5]]>31*6){Ox3d9=Ox3d9.substr(0,31*6);} ;Ox3d9=Ox266+Ox3d9;SetCookie(OxO961b[36],Ox3d9,60*60*24*365);} ;function do_insert(){var Ox261;var divpreview=document.getElementById(OxO961b[33]);if(divpreview){Ox261=divpreview[OxO961b[34]];} else {Ox261=_selectedcolor;} ;try{document.createElement(OxO961b[37])[OxO961b[15]][OxO961b[31]]=Ox261;do_saverecent(Ox261);Window_SetDialogReturnValue(window,Ox261);Window_CloseDialog(window);} catch(x){alert(CE_GetStr(OxO961b[38]));divpreview[OxO961b[34]]=OxO961b[6];return false;} ;} ;