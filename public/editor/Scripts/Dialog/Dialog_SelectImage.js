var OxOf01f=["top","dialogArguments","opener","_dialog_arguments","document","value","","uploader1","browse_Frame","height","style","250px","contentWindow","btn_CreateDir","btn_zoom_in","btn_zoom_out","btn_bestfit","btn_Actualsize","divpreview","img_demo","TargetUrl","Button1","Button2","editor","window","src",".aspx","inp","zoom","width","display","none","wrapupPrompt","iepromptfield","body","div","id","IEPromptBox","promptBlackout","border","1px solid #b0bec7","backgroundColor","#f0f0f0","position","absolute","330px","zIndex","100","\x3Cdiv style=\x22width: 100%; padding-top:3px;background-color: #DCE7EB; font-family: verdana; font-size: 10pt; font-weight: bold; height: 22px; text-align:center; background:url(../Images/formbg2.gif) repeat-x left top;\x22\x3E","\x3C/div\x3E","\x3Cdiv style=\x22padding: 10px\x22\x3E","\x3CBR\x3E\x3CBR\x3E","\x3Cform action=\x22\x22 onsubmit=\x22return wrapupPrompt()\x22\x3E","\x3Cinput id=\x22iepromptfield\x22 name=\x22iepromptdata\x22 type=text size=46 value=\x22","\x22\x3E","\x3Cbr\x3E\x3Cbr\x3E\x3Ccenter\x3E","\x3Cinput type=\x22submit\x22 value=\x22\x26nbsp;\x26nbsp;\x26nbsp;","\x26nbsp;\x26nbsp;\x26nbsp;\x22\x3E","\x26nbsp;\x26nbsp;\x26nbsp;\x26nbsp;\x26nbsp;\x26nbsp;","\x3Cinput type=\x22button\x22 onclick=\x22wrapupPrompt(true)\x22 value=\x22\x26nbsp;","\x26nbsp;\x22\x3E","\x3C/form\x3E\x3C/div\x3E","innerHTML","100px","left","offsetWidth","px","block"];function Window_FindDialogArguments(Ox2d4){var Ox369=Ox2d4[OxOf01f[0]];if(Ox369[OxOf01f[1]]){return Ox369[OxOf01f[1]];} ;var Ox36a=Ox369[OxOf01f[2]];if(Ox36a==null){return Ox369[OxOf01f[4]][OxOf01f[3]];} ;var Ox57e=Ox36a[OxOf01f[4]][OxOf01f[3]];if(Ox57e==null){return Window_FindDialogArguments(Ox36a);} ;return Ox57e;} ;setMouseOver();function setMouseOver(){} ;function row_click(Ox4de){TargetUrl[OxOf01f[5]]=Ox4de;Actualsize();} ;function reset_hiddens(){if(TargetUrl[OxOf01f[5]]!=OxOf01f[6]&&TargetUrl[OxOf01f[5]]!=null){do_preview();} ;} ;function ResetFields(){TargetUrl[OxOf01f[5]]=OxOf01f[6];} ;function RequireFileBrowseScript(){} ;RequireFileBrowseScript();var uploader1=Window_GetElement(window,OxOf01f[7],true);var browse_Frame=Window_GetElement(window,OxOf01f[8],true);if(!Browser_IsWinIE()){browse_Frame[OxOf01f[10]][OxOf01f[9]]=OxOf01f[11];} ;browse_Frame=browse_Frame[OxOf01f[12]];var btn_CreateDir=Window_GetElement(window,OxOf01f[13],true);var btn_zoom_in=Window_GetElement(window,OxOf01f[14],true);var btn_zoom_out=Window_GetElement(window,OxOf01f[15],true);var btn_bestfit=Window_GetElement(window,OxOf01f[16],true);var btn_Actualsize=Window_GetElement(window,OxOf01f[17],true);var divpreview=Window_GetElement(window,OxOf01f[18],true);var img_demo=Window_GetElement(window,OxOf01f[19],true);var TargetUrl=Window_GetElement(window,OxOf01f[20],true);var Button1=Window_GetElement(window,OxOf01f[21],true);var Button2=Window_GetElement(window,OxOf01f[22],true);var arg=Window_FindDialogArguments(window);var editor=arg[OxOf01f[23]];var editwin=arg[OxOf01f[24]];var editdoc=arg[OxOf01f[4]];do_preview();function do_preview(){var Ox3b9=TargetUrl[OxOf01f[5]];if(Ox3b9==OxOf01f[6]){return ;} ;img_demo[OxOf01f[25]]=Ox3b9;Ox3b9=Ox3b9.toLowerCase();if(Ox3b9.indexOf(OxOf01f[26])!=-1){} ;} ;function do_insert(){var Ox580=arg[OxOf01f[27]];if(Ox580){try{Ox580[OxOf01f[5]]=TargetUrl[OxOf01f[5]];} catch(x){} ;} ;Window_SetDialogReturnValue(window,TargetUrl.value);Window_CloseDialog(window);} ;function do_Close(){Window_SetDialogReturnValue(window,null);Window_CloseDialog(window);} ;function Zoom_In(){if(divpreview[OxOf01f[10]][OxOf01f[28]]!=0){divpreview[OxOf01f[10]][OxOf01f[28]]*=1.2;} else {divpreview[OxOf01f[10]][OxOf01f[28]]=1.2;} ;} ;function Zoom_Out(){if(divpreview[OxOf01f[10]][OxOf01f[28]]!=0){divpreview[OxOf01f[10]][OxOf01f[28]]*=0.8;} else {divpreview[OxOf01f[10]][OxOf01f[28]]=0.8;} ;} ;function BestFit(){var Ox498=280;var Ox27d=290;divpreview[OxOf01f[10]][OxOf01f[28]]=1/Math.max(img_demo[OxOf01f[29]]/Ox27d,img_demo[OxOf01f[9]]/Ox498);} ;function Actualsize(){divpreview[OxOf01f[10]][OxOf01f[28]]=1;do_preview();} ;if(!Browser_IsWinIE()){} ;if(!Browser_IsWinIE()){btn_zoom_in[OxOf01f[10]][OxOf01f[30]]=btn_zoom_out[OxOf01f[10]][OxOf01f[30]]=btn_bestfit[OxOf01f[10]][OxOf01f[30]]=btn_Actualsize[OxOf01f[10]][OxOf01f[30]]=OxOf01f[31];} ;if(Browser_IsIE7()){var _dialogPromptID=null;function IEprompt(Ox34c,Ox34d,Ox34e){that=this;this[OxOf01f[32]]=function (Ox34f){val=document.getElementById(OxOf01f[33])[OxOf01f[5]];_dialogPromptID[OxOf01f[10]][OxOf01f[30]]=OxOf01f[31];document.getElementById(OxOf01f[33])[OxOf01f[5]]=OxOf01f[6];if(Ox34f){val=OxOf01f[6];} ;Ox34c(val);return false;} ;if(Ox34e==undefined){Ox34e=OxOf01f[6];} ;if(_dialogPromptID==null){var Ox350=document.getElementsByTagName(OxOf01f[34])[0];tnode=document.createElement(OxOf01f[35]);tnode[OxOf01f[36]]=OxOf01f[37];Ox350.appendChild(tnode);_dialogPromptID=document.getElementById(OxOf01f[37]);tnode=document.createElement(OxOf01f[35]);tnode[OxOf01f[36]]=OxOf01f[38];Ox350.appendChild(tnode);_dialogPromptID[OxOf01f[10]][OxOf01f[39]]=OxOf01f[40];_dialogPromptID[OxOf01f[10]][OxOf01f[41]]=OxOf01f[42];_dialogPromptID[OxOf01f[10]][OxOf01f[43]]=OxOf01f[44];_dialogPromptID[OxOf01f[10]][OxOf01f[29]]=OxOf01f[45];_dialogPromptID[OxOf01f[10]][OxOf01f[46]]=OxOf01f[47];} ;var Ox351=OxOf01f[48]+InputRequired+OxOf01f[49];Ox351+=OxOf01f[50]+Ox34d+OxOf01f[51];Ox351+=OxOf01f[52];Ox351+=OxOf01f[53]+Ox34e+OxOf01f[54];Ox351+=OxOf01f[55];Ox351+=OxOf01f[56]+OK+OxOf01f[57];Ox351+=OxOf01f[58];Ox351+=OxOf01f[59]+Cancel+OxOf01f[60];Ox351+=OxOf01f[61];_dialogPromptID[OxOf01f[62]]=Ox351;_dialogPromptID[OxOf01f[10]][OxOf01f[0]]=OxOf01f[63];_dialogPromptID[OxOf01f[10]][OxOf01f[64]]=parseInt((document[OxOf01f[34]][OxOf01f[65]]-315)/2)+OxOf01f[66];_dialogPromptID[OxOf01f[10]][OxOf01f[30]]=OxOf01f[67];var Ox352=document.getElementById(OxOf01f[33]);try{var Ox353=Ox352.createTextRange();Ox353.collapse(false);Ox353.select();} catch(x){Ox352.focus();} ;} ;} ;