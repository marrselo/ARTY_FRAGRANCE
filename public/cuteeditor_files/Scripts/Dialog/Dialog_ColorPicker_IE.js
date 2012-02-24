var OxO2a07=["onerror","onload","onclick","btnCancel","btnOK","onkeyup","txtHSB_Hue","onkeypress","txtHSB_Saturation","txtHSB_Brightness","txtRGB_Red","txtRGB_Green","txtRGB_Blue","txtHex","btnWebSafeColor","rdoHSB_Hue","rdoHSB_Saturation","rdoHSB_Brightness","rdoRGB_Red","rdoRGB_Green","rdoRGB_Blue","onmousemove","onmousedown","onmouseup","{format}","length","\x5C{","\x5C}","BadNumber","A number between {0} and {1} is required. Closest value inserted.","Title","Color Picker","SelectAColor","Select a color:","OKButton","OK","CancelButton","Cancel","AboutButton","About","Recent","WebSafeWarning","Warning: not a web safe color","WebSafeClick","Click to select web safe color","HsbHue","H:","HsbHueTooltip","Hue","HsbHueUnit","%","HsbSaturation","S:","HsbSaturationTooltip","Saturation","HsbSaturationUnit","HsbBrightness","B:","HsbBrightnessTooltip","Brightness","HsbBrightnessUnit","RgbRed","R:","RgbRedTooltip","Red","RgbGreen","G:","RgbGreenTooltip","Green","RgbBlue","RgbBlueTooltip","Blue","Hex","#","RecentTooltip","Recent:","\x0D\x0ALewies Color Pickerversion 1.1\x0D\x0A\x0D\x0AThis form was created by Lewis Moten in May of 2004.\x0D\x0AIt simulates the color picker in a popular graphics application.\x0D\x0AIt gives users a visual way to choose colors from a large and dynamic palette.\x0D\x0A\x0D\x0AVisit the authors web page?\x0D\x0Awww.lewismoten.com\x0D\x0A","UNDEFINED","FFFFFF","value","checked","ColorMode","ColorType","RecentColors","","pnlRecent","all","border","style","0px","backgroundColor","srcElement","display","none","title","innerHTML","backgroundPosition","px ","px","000000","zIndex","01234567879","keyCode","abcdef","01234567879ABCDEF","returnValue","0123456789ABCDEFabcdef","0","id","pnlGradient_Top","pnlVertical_Top","top","opacity","filters","backgroundImage","url(../Images/cpie_GradientPositionDark.gif)","url(../Images/cpie_GradientPositionLight.gif)","cancelBubble","clientX","clientY","className","GradientNormal","button","GradientFullScreen","=","; path=/;"," expires=",";","cookie","00336699CCFF","0x","do_select","frm","__cphex"];var POSITIONADJUSTX=21;var POSITIONADJUSTY=46;var POSITIONADJUSTZ=43;var msg= new Object();window[OxO2a07[0]]=alert;var ColorMode=1;var GradientPositionDark= new Boolean(false);var frm= new Object();window[OxO2a07[1]]=window_load;function initialize(){frm[OxO2a07[3]][OxO2a07[2]]=btnCancel_Click;frm[OxO2a07[4]][OxO2a07[2]]=btnOK_Click;frm[OxO2a07[6]][OxO2a07[5]]=Hsb_Changed;frm[OxO2a07[6]][OxO2a07[7]]=validateNumber;frm[OxO2a07[8]][OxO2a07[5]]=Hsb_Changed;frm[OxO2a07[8]][OxO2a07[7]]=validateNumber;frm[OxO2a07[9]][OxO2a07[5]]=Hsb_Changed;frm[OxO2a07[9]][OxO2a07[7]]=validateNumber;frm[OxO2a07[10]][OxO2a07[5]]=Rgb_Changed;frm[OxO2a07[10]][OxO2a07[7]]=validateNumber;frm[OxO2a07[11]][OxO2a07[5]]=Rgb_Changed;frm[OxO2a07[11]][OxO2a07[7]]=validateNumber;frm[OxO2a07[12]][OxO2a07[5]]=Rgb_Changed;frm[OxO2a07[12]][OxO2a07[7]]=validateNumber;frm[OxO2a07[13]][OxO2a07[5]]=Hex_Changed;frm[OxO2a07[13]][OxO2a07[7]]=validateHex;frm[OxO2a07[14]][OxO2a07[2]]=btnWebSafeColor_Click;frm[OxO2a07[15]][OxO2a07[2]]=rdoHsb_Hue_Click;frm[OxO2a07[16]][OxO2a07[2]]=rdoHsb_Saturation_Click;frm[OxO2a07[17]][OxO2a07[2]]=rdoHsb_Brightness_Click;frm[OxO2a07[18]][OxO2a07[2]]=rdoRgb_Red_Click;frm[OxO2a07[19]][OxO2a07[2]]=rdoRgb_Green_Click;frm[OxO2a07[20]][OxO2a07[2]]=rdoRgb_Blue_Click;pnlGradient_Top[OxO2a07[2]]=pnlGradient_Top_Click;pnlGradient_Top[OxO2a07[21]]=pnlGradient_Top_MouseMove;pnlGradient_Top[OxO2a07[22]]=pnlGradient_Top_MouseDown;pnlGradient_Top[OxO2a07[23]]=pnlGradient_Top_MouseUp;pnlVertical_Top[OxO2a07[2]]=pnlVertical_Top_Click;pnlVertical_Top[OxO2a07[21]]=pnlVertical_Top_MouseMove;pnlVertical_Top[OxO2a07[22]]=pnlVertical_Top_MouseDown;pnlVertical_Top[OxO2a07[23]]=pnlVertical_Top_MouseUp;pnlWebSafeColor[OxO2a07[2]]=btnWebSafeColor_Click;pnlWebSafeColorBorder[OxO2a07[2]]=btnWebSafeColor_Click;pnlOldColor[OxO2a07[2]]=pnlOldClick_Click;lblHSB_Hue[OxO2a07[2]]=rdoHsb_Hue_Click;lblHSB_Saturation[OxO2a07[2]]=rdoHsb_Saturation_Click;lblHSB_Brightness[OxO2a07[2]]=rdoHsb_Brightness_Click;lblRGB_Red[OxO2a07[2]]=rdoRgb_Red_Click;lblRGB_Green[OxO2a07[2]]=rdoRgb_Green_Click;lblRGB_Blue[OxO2a07[2]]=rdoRgb_Blue_Click;pnlGradient_Top.focus();} ;function formatString(Ox3e4){if(!Ox3e4){return OxO2a07[24];} ;for(var i=1;i<arguments[OxO2a07[25]];i++){Ox3e4=Ox3e4.replace( new RegExp(OxO2a07[26]+(i-1)+OxO2a07[27]),arguments[i]);} ;return Ox3e4;} ;function AddValue(Ox3e6,Ox254){Ox254=Ox254.toLowerCase();for(var i=0;i<Ox3e6[OxO2a07[25]];i++){if(Ox3e6[i]==Ox254){return ;} ;} ;Ox3e6[Ox3e6[OxO2a07[25]]]=Ox254;} ;function SniffLanguage(Oxd){} ;function LoadLanguage(){msg[OxO2a07[28]]=OxO2a07[29];msg[OxO2a07[30]]=OxO2a07[31];msg[OxO2a07[32]]=OxO2a07[33];msg[OxO2a07[34]]=OxO2a07[35];msg[OxO2a07[36]]=OxO2a07[37];msg[OxO2a07[38]]=OxO2a07[39];msg[OxO2a07[40]]=OxO2a07[40];msg[OxO2a07[41]]=OxO2a07[42];msg[OxO2a07[43]]=OxO2a07[44];msg[OxO2a07[45]]=OxO2a07[46];msg[OxO2a07[47]]=OxO2a07[48];msg[OxO2a07[49]]=OxO2a07[50];msg[OxO2a07[51]]=OxO2a07[52];msg[OxO2a07[53]]=OxO2a07[54];msg[OxO2a07[55]]=OxO2a07[50];msg[OxO2a07[56]]=OxO2a07[57];msg[OxO2a07[58]]=OxO2a07[59];msg[OxO2a07[60]]=OxO2a07[50];msg[OxO2a07[61]]=OxO2a07[62];msg[OxO2a07[63]]=OxO2a07[64];msg[OxO2a07[65]]=OxO2a07[66];msg[OxO2a07[67]]=OxO2a07[68];msg[OxO2a07[69]]=OxO2a07[57];msg[OxO2a07[70]]=OxO2a07[71];msg[OxO2a07[72]]=OxO2a07[73];msg[OxO2a07[74]]=OxO2a07[75];msg[OxO2a07[39]]=OxO2a07[76];} ;function localize(){} ;function window_load(){frm=frmColorPicker;LoadLanguage();localize();initialize();var Ox266=OxO2a07[77];if(Ox266==OxO2a07[77]){Ox266=OxO2a07[78];} ;if(Ox266[OxO2a07[25]]==7){Ox266=Ox266.substr(1,6);} ;frm[OxO2a07[13]][OxO2a07[79]]=Ox266;Hex_Changed();Ox266=Form_Get_Hex();SetBg(pnlOldColor,Ox266);frm[OxO2a07[82]][ new Number(GetCookie(OxO2a07[81])||0)][OxO2a07[80]]=true;ColorMode_Changed();var Ox3d9=GetCookie(OxO2a07[83])||OxO2a07[84];var Ox3eb=msg[OxO2a07[74]];for(var i=1;i<33;i++){if(Ox3d9[OxO2a07[25]]/6>=i){Ox266=Ox3d9.substr((i-1)*6,6);var Ox3ec=HexToRgb(Ox266);var title=formatString(msg.RecentTooltip,Ox266,Ox3ec[0],Ox3ec[1],Ox3ec[2]);SetBg(document[OxO2a07[86]][OxO2a07[85]+i],Ox266);SetTitle(document[OxO2a07[86]][OxO2a07[85]+i],title);document[OxO2a07[86]][OxO2a07[85]+i][OxO2a07[2]]=pnlRecent_Click;} else {document[OxO2a07[86]][OxO2a07[85]+i][OxO2a07[88]][OxO2a07[87]]=OxO2a07[89];} ;} ;} ;function pnlRecent_Click(){frm[OxO2a07[13]][OxO2a07[79]]=event[OxO2a07[91]][OxO2a07[88]][OxO2a07[90]].substr(1,6).toUpperCase();Hex_Changed();} ;function pnlOldClick_Click(){frm[OxO2a07[13]][OxO2a07[79]]=pnlOldColor[OxO2a07[88]][OxO2a07[90]].substr(1,6).toUpperCase();Hex_Changed();} ;function rdoHsb_Hue_Click(){frm[OxO2a07[15]][OxO2a07[80]]=true;ColorMode_Changed();} ;function rdoHsb_Saturation_Click(){frm[OxO2a07[16]][OxO2a07[80]]=true;ColorMode_Changed();} ;function rdoHsb_Brightness_Click(){frm[OxO2a07[17]][OxO2a07[80]]=true;ColorMode_Changed();} ;function rdoRgb_Red_Click(){frm[OxO2a07[18]][OxO2a07[80]]=true;ColorMode_Changed();} ;function rdoRgb_Green_Click(){frm[OxO2a07[19]][OxO2a07[80]]=true;ColorMode_Changed();} ;function rdoRgb_Blue_Click(){frm[OxO2a07[20]][OxO2a07[80]]=true;ColorMode_Changed();} ;function Hide(){for(var i=0;i<arguments[OxO2a07[25]];i++){arguments[i][OxO2a07[88]][OxO2a07[92]]=OxO2a07[93];} ;} ;function Show(){for(var i=0;i<arguments[OxO2a07[25]];i++){arguments[i][OxO2a07[88]][OxO2a07[92]]=OxO2a07[84];} ;} ;function SetValue(){for(var i=0;i<arguments[OxO2a07[25]];i+=2){arguments[i][OxO2a07[79]]=arguments[i+1];} ;} ;function SetTitle(){for(var i=0;i<arguments[OxO2a07[25]];i+=2){arguments[i][OxO2a07[94]]=arguments[i+1];} ;} ;function SetHTML(){for(var i=0;i<arguments[OxO2a07[25]];i+=2){arguments[i][OxO2a07[95]]=arguments[i+1];} ;} ;function SetBg(){for(var i=0;i<arguments[OxO2a07[25]];i+=2){arguments[i][OxO2a07[88]][OxO2a07[90]]=OxO2a07[73]+arguments[i+1];} ;} ;function SetBgPosition(){for(var i=0;i<arguments[OxO2a07[25]];i+=3){arguments[i][OxO2a07[88]][OxO2a07[96]]=arguments[i+1]+OxO2a07[97]+arguments[i+2]+OxO2a07[98];} ;} ;function ColorMode_Changed(){for(var i=0;i<6;i++){if(frm[OxO2a07[82]][i][OxO2a07[80]]){ColorMode=i;} ;} ;SetCookie(OxO2a07[81],ColorMode,60*60*24*365);Hide(pnlGradientHsbHue_Hue,pnlGradientHsbHue_Black,pnlGradientHsbHue_White,pnlVerticalHsbHue_Background,pnlVerticalHsbSaturation_Hue,pnlVerticalHsbSaturation_White,pnlVerticalHsbBrightness_Hue,pnlVerticalHsbBrightness_Black,pnlVerticalRgb_Start,pnlVerticalRgb_End,pnlGradientRgb_Base,pnlGradientRgb_Invert,pnlGradientRgb_Overlay1,pnlGradientRgb_Overlay2);switch(ColorMode){case 0:Show(pnlGradientHsbHue_Hue,pnlGradientHsbHue_Black,pnlGradientHsbHue_White,pnlVerticalHsbHue_Background);Hsb_Changed();break ;;case 1:Show(pnlVerticalHsbSaturation_Hue,pnlVerticalHsbSaturation_White,pnlGradientRgb_Base,pnlGradientRgb_Overlay1,pnlGradientRgb_Overlay2);SetBgPosition(pnlGradientRgb_Base,0,0);SetBg(pnlGradientRgb_Overlay1,OxO2a07[78],pnlGradientRgb_Overlay2,OxO2a07[99]);pnlGradientRgb_Overlay1[OxO2a07[88]][OxO2a07[100]]=5;pnlGradientRgb_Overlay2[OxO2a07[88]][OxO2a07[100]]=6;Hsb_Changed();break ;;case 2:Show(pnlVerticalHsbBrightness_Hue,pnlVerticalHsbBrightness_Black,pnlGradientRgb_Base,pnlGradientRgb_Overlay1,pnlGradientRgb_Overlay2);SetBgPosition(pnlGradientRgb_Base,0,0);SetBg(pnlGradientRgb_Overlay1,OxO2a07[99],pnlGradientRgb_Overlay2,OxO2a07[78]);pnlGradientRgb_Overlay1[OxO2a07[88]][OxO2a07[100]]=6;pnlGradientRgb_Overlay2[OxO2a07[88]][OxO2a07[100]]=5;Hsb_Changed();break ;;case 3:Show(pnlVerticalRgb_Start,pnlVerticalRgb_End,pnlGradientRgb_Base,pnlGradientRgb_Invert);SetBgPosition(pnlGradientRgb_Base,256,0,pnlGradientRgb_Invert,256,0);Rgb_Changed();break ;;case 4:Show(pnlVerticalRgb_Start,pnlVerticalRgb_End,pnlGradientRgb_Base,pnlGradientRgb_Invert);SetBgPosition(pnlGradientRgb_Base,0,256,pnlGradientRgb_Invert,0,256);Rgb_Changed();break ;;case 5:Show(pnlVerticalRgb_Start,pnlVerticalRgb_End,pnlGradientRgb_Base,pnlGradientRgb_Invert);SetBgPosition(pnlGradientRgb_Base,256,256,pnlGradientRgb_Invert,256,256);Rgb_Changed();break ;;default:break ;;} ;} ;function btnWebSafeColor_Click(){var Ox3ec=HexToRgb(frm[OxO2a07[13]].value);Ox3ec=RgbToWebSafeRgb(Ox3ec);frm[OxO2a07[13]][OxO2a07[79]]=RgbToHex(Ox3ec);Hex_Changed();} ;function checkWebSafe(){var Ox3ec=Form_Get_Rgb();if(RgbIsWebSafe(Ox3ec)){Hide(frm.btnWebSafeColor,pnlWebSafeColor,pnlWebSafeColorBorder);} else {Ox3ec=RgbToWebSafeRgb(Ox3ec);SetBg(pnlWebSafeColor,RgbToHex(Ox3ec));Show(frm.btnWebSafeColor,pnlWebSafeColor,pnlWebSafeColorBorder);} ;} ;function validateNumber(){var Ox401=String.fromCharCode(event.keyCode);if(IgnoreKey()){return ;} ;if(OxO2a07[101].indexOf(Ox401)!=-1){return ;} ;event[OxO2a07[102]]=0;} ;function validateHex(){if(IgnoreKey()){return ;} ;var Ox401=String.fromCharCode(event.keyCode);if(OxO2a07[103].indexOf(Ox401)!=-1){event[OxO2a07[102]]=Ox401.toUpperCase().charCodeAt(0);return ;} ;if(OxO2a07[104].indexOf(Ox401)!=-1){return ;} ;event[OxO2a07[102]]=0;} ;function IgnoreKey(){var Ox401=String.fromCharCode(event.keyCode);var Ox404= new Array(0,8,9,13,27);if(Ox401==null){return true;} ;for(var i=0;i<5;i++){if(event[OxO2a07[102]]==Ox404[i]){return true;} ;} ;return false;} ;function btnCancel_Click(){top.close();} ;function btnOK_Click(){var Ox266= new String(frm[OxO2a07[13]].value);try{window[OxO2a07[105]]=Ox266;} catch(e){} ;recent=GetCookie(OxO2a07[83])||OxO2a07[84];for(var i=0;i<recent[OxO2a07[25]];i+=6){if(recent.substr(i,6)==Ox266){recent=recent.substr(0,i)+recent.substr(i+6);i-=6;} ;} ;if(recent[OxO2a07[25]]>31*6){recent=recent.substr(0,31*6);} ;recent=frm[OxO2a07[13]][OxO2a07[79]]+recent;SetCookie(OxO2a07[83],recent,60*60*24*365);top.close();} ;function SetGradientPosition(Ox332,Ox302){Ox332=Ox332-POSITIONADJUSTX+5;Ox302=Ox302-POSITIONADJUSTY+5;Ox332-=7;Ox302-=27;Ox332=Ox332<0?0:Ox332>255?255:Ox332;Ox302=Ox302<0?0:Ox302>255?255:Ox302;SetBgPosition(pnlGradientPosition,Ox332-5,Ox302-5);switch(ColorMode){case 0:var Ox408= new Array(0,0,0);Ox408[1]=Ox332/255;Ox408[2]=1-(Ox302/255);frm[OxO2a07[8]][OxO2a07[79]]=Math.round(Ox408[1]*100);frm[OxO2a07[9]][OxO2a07[79]]=Math.round(Ox408[2]*100);Hsb_Changed();break ;;case 1:var Ox408= new Array(0,0,0);Ox408[0]=Ox332/255;Ox408[2]=1-(Ox302/255);frm[OxO2a07[6]][OxO2a07[79]]=Ox408[0]==1?0:Math.round(Ox408[0]*360);frm[OxO2a07[9]][OxO2a07[79]]=Math.round(Ox408[2]*100);Hsb_Changed();break ;;case 2:var Ox408= new Array(0,0,0);Ox408[0]=Ox332/255;Ox408[1]=1-(Ox302/255);frm[OxO2a07[6]][OxO2a07[79]]=Ox408[0]==1?0:Math.round(Ox408[0]*360);frm[OxO2a07[8]][OxO2a07[79]]=Math.round(Ox408[1]*100);Hsb_Changed();break ;;case 3:var Ox3ec= new Array(0,0,0);Ox3ec[1]=255-Ox302;Ox3ec[2]=Ox332;frm[OxO2a07[11]][OxO2a07[79]]=Ox3ec[1];frm[OxO2a07[12]][OxO2a07[79]]=Ox3ec[2];Rgb_Changed();break ;;case 4:var Ox3ec= new Array(0,0,0);Ox3ec[0]=255-Ox302;Ox3ec[2]=Ox332;frm[OxO2a07[10]][OxO2a07[79]]=Ox3ec[0];frm[OxO2a07[12]][OxO2a07[79]]=Ox3ec[2];Rgb_Changed();break ;;case 5:var Ox3ec= new Array(0,0,0);Ox3ec[0]=Ox332;Ox3ec[1]=255-Ox302;frm[OxO2a07[10]][OxO2a07[79]]=Ox3ec[0];frm[OxO2a07[11]][OxO2a07[79]]=Ox3ec[1];Rgb_Changed();break ;;} ;} ;function Hex_Changed(){var Ox266=Form_Get_Hex();var Ox3ec=HexToRgb(Ox266);var Ox408=RgbToHsb(Ox3ec);Form_Set_Rgb(Ox3ec);Form_Set_Hsb(Ox408);SetBg(pnlNewColor,Ox266);SetupCursors();SetupGradients();checkWebSafe();} ;function Rgb_Changed(){var Ox3ec=Form_Get_Rgb();var Ox408=RgbToHsb(Ox3ec);var Ox266=RgbToHex(Ox3ec);Form_Set_Hsb(Ox408);Form_Set_Hex(Ox266);SetBg(pnlNewColor,Ox266);SetupCursors();SetupGradients();checkWebSafe();} ;function Hsb_Changed(){var Ox408=Form_Get_Hsb();var Ox3ec=HsbToRgb(Ox408);var Ox266=RgbToHex(Ox3ec);Form_Set_Rgb(Ox3ec);Form_Set_Hex(Ox266);SetBg(pnlNewColor,Ox266);SetupCursors();SetupGradients();checkWebSafe();} ;function Form_Set_Hex(Ox266){frm[OxO2a07[13]][OxO2a07[79]]=Ox266;} ;function Form_Get_Hex(){var Ox266= new String(frm[OxO2a07[13]].value);for(var i=0;i<Ox266[OxO2a07[25]];i++){if(OxO2a07[106].indexOf(Ox266.substr(i,1))==-1){Ox266=OxO2a07[99];frm[OxO2a07[13]][OxO2a07[79]]=Ox266;alert(formatString(msg.BadNumber,OxO2a07[99],OxO2a07[78]));break ;} ;} ;while(Ox266[OxO2a07[25]]<6){Ox266=OxO2a07[107]+Ox266;} ;return Ox266;} ;function Form_Get_Hsb(){var Ox408= new Array(0,0,0);Ox408[0]= new Number(frm[OxO2a07[6]].value)/360;Ox408[1]= new Number(frm[OxO2a07[8]].value)/100;Ox408[2]= new Number(frm[OxO2a07[9]].value)/100;if(Ox408[0]>1||isNaN(Ox408[0])){Ox408[0]=1;frm[OxO2a07[6]][OxO2a07[79]]=360;alert(formatString(msg.BadNumber,0,360));} ;if(Ox408[1]>1||isNaN(Ox408[1])){Ox408[1]=1;frm[OxO2a07[8]][OxO2a07[79]]=100;alert(formatString(msg.BadNumber,0,100));} ;if(Ox408[2]>1||isNaN(Ox408[2])){Ox408[2]=1;frm[OxO2a07[9]][OxO2a07[79]]=100;alert(formatString(msg.BadNumber,0,100));} ;return Ox408;} ;function Form_Set_Hsb(Ox408){SetValue(frm.txtHSB_Hue,Math.round(Ox408[0]*360),frm.txtHSB_Saturation,Math.round(Ox408[1]*100),frm.txtHSB_Brightness,Math.round(Ox408[2]*100));} ;function Form_Get_Rgb(){var Ox3ec= new Array(0,0,0);Ox3ec[0]= new Number(frm[OxO2a07[10]].value);Ox3ec[1]= new Number(frm[OxO2a07[11]].value);Ox3ec[2]= new Number(frm[OxO2a07[12]].value);if(Ox3ec[0]>255||isNaN(Ox3ec[0])||Ox3ec[0]!=Math.round(Ox3ec[0])){Ox3ec[0]=255;frm[OxO2a07[10]][OxO2a07[79]]=255;alert(formatString(msg.BadNumber,0,255));} ;if(Ox3ec[1]>255||isNaN(Ox3ec[1])||Ox3ec[1]!=Math.round(Ox3ec[1])){Ox3ec[1]=255;frm[OxO2a07[11]][OxO2a07[79]]=255;alert(formatString(msg.BadNumber,0,255));} ;if(Ox3ec[2]>255||isNaN(Ox3ec[2])||Ox3ec[2]!=Math.round(Ox3ec[2])){Ox3ec[2]=255;frm[OxO2a07[12]][OxO2a07[79]]=255;alert(formatString(msg.BadNumber,0,255));} ;return Ox3ec;} ;function Form_Set_Rgb(Ox3ec){frm[OxO2a07[10]][OxO2a07[79]]=Ox3ec[0];frm[OxO2a07[11]][OxO2a07[79]]=Ox3ec[1];frm[OxO2a07[12]][OxO2a07[79]]=Ox3ec[2];} ;function SetupCursors(){var Ox408=Form_Get_Hsb();var Ox3ec=Form_Get_Rgb();if(RgbToYuv(Ox3ec)[0]>=0.5){SetGradientPositionDark();} else {SetGradientPositionLight();} ;if(event[OxO2a07[91]]!=null){if(event[OxO2a07[91]][OxO2a07[108]]==OxO2a07[109]){return ;} ;if(event[OxO2a07[91]][OxO2a07[108]]==OxO2a07[110]){return ;} ;} ;var Ox332;var Ox302;var Ox413;if(ColorMode>=0&&ColorMode<=2){for(var i=0;i<3;i++){Ox408[i]*=255;} ;} ;switch(ColorMode){case 0:Ox332=Ox408[1];Ox302=Ox408[2];Ox413=Ox408[0]==0?1:Ox408[0];break ;;case 1:Ox332=Ox408[0]==0?1:Ox408[0];Ox302=Ox408[2];Ox413=Ox408[1];break ;;case 2:Ox332=Ox408[0]==0?1:Ox408[0];Ox302=Ox408[1];Ox413=Ox408[2];break ;;case 3:Ox332=Ox3ec[2];Ox302=Ox3ec[1];Ox413=Ox3ec[0];break ;;case 4:Ox332=Ox3ec[2];Ox302=Ox3ec[0];Ox413=Ox3ec[1];break ;;case 5:Ox332=Ox3ec[0];Ox302=Ox3ec[1];Ox413=Ox3ec[2];break ;;} ;Ox302=255-Ox302;Ox413=255-Ox413;SetBgPosition(pnlGradientPosition,Ox332-5,Ox302-5);pnlVerticalPosition[OxO2a07[88]][OxO2a07[111]]=(Ox413+27)+OxO2a07[98];} ;function SetupGradients(){var Ox408=Form_Get_Hsb();var Ox3ec=Form_Get_Rgb();switch(ColorMode){case 0:SetBg(pnlGradientHsbHue_Hue,RgbToHex(HueToRgb(Ox408[0])));break ;;case 1:var Ox1c= new Array();for(var i=0;i<3;i++){Ox1c[i]=Math.round(Ox408[2]*255);} ;SetBg(pnlGradientHsbHue_Hue,RgbToHex(HueToRgb(Ox408[0])),pnlVerticalHsbSaturation_Hue,RgbToHex(HsbToRgb( new Array(Ox408[0],1,Ox408[2]))),pnlVerticalHsbSaturation_White,RgbToHex(Ox1c));pnlGradientRgb_Overlay1[OxO2a07[113]][0][OxO2a07[112]]=(100-Math.round(Ox408[1]*100));break ;;case 2:SetBg(pnlVerticalHsbBrightness_Hue,RgbToHex(HsbToRgb( new Array(Ox408[0],Ox408[1],1))));pnlGradientRgb_Overlay1[OxO2a07[113]][0][OxO2a07[112]]=(100-Math.round(Ox408[2]*100));break ;;case 3:pnlGradientRgb_Invert[OxO2a07[113]][3][OxO2a07[112]]=100-Math.round((Ox3ec[0]/255)*100);SetBg(pnlVerticalRgb_Start,RgbToHex( new Array(0xFF,Ox3ec[1],Ox3ec[2])),pnlVerticalRgb_End,RgbToHex( new Array(0x00,Ox3ec[1],Ox3ec[2])));break ;;case 4:pnlGradientRgb_Invert[OxO2a07[113]][3][OxO2a07[112]]=100-Math.round((Ox3ec[1]/255)*100);SetBg(pnlVerticalRgb_Start,RgbToHex( new Array(Ox3ec[0],0xFF,Ox3ec[2])),pnlVerticalRgb_End,RgbToHex( new Array(Ox3ec[0],0x00,Ox3ec[2])));break ;;case 5:pnlGradientRgb_Invert[OxO2a07[113]][3][OxO2a07[112]]=100-Math.round((Ox3ec[2]/255)*100);SetBg(pnlVerticalRgb_Start,RgbToHex( new Array(Ox3ec[0],Ox3ec[1],0xFF)),pnlVerticalRgb_End,RgbToHex( new Array(Ox3ec[0],Ox3ec[1],0x00)));break ;;default:;} ;} ;function SetGradientPositionDark(){if(GradientPositionDark){return ;} ;GradientPositionDark=true;pnlGradientPosition[OxO2a07[88]][OxO2a07[114]]=OxO2a07[115];} ;function SetGradientPositionLight(){if(!GradientPositionDark){return ;} ;GradientPositionDark=false;pnlGradientPosition[OxO2a07[88]][OxO2a07[114]]=OxO2a07[116];} ;function pnlGradient_Top_Click(){event[OxO2a07[117]]=true;SetGradientPosition(event[OxO2a07[118]]-5,event[OxO2a07[119]]-5);pnlGradient_Top[OxO2a07[120]]=OxO2a07[121];} ;function pnlGradient_Top_MouseMove(){event[OxO2a07[117]]=true;if(event[OxO2a07[122]]!=1){return ;} ;SetGradientPosition(event[OxO2a07[118]]-5,event[OxO2a07[119]]-5);} ;function pnlGradient_Top_MouseDown(){event[OxO2a07[117]]=true;SetGradientPosition(event[OxO2a07[118]]-5,event[OxO2a07[119]]-5);pnlGradient_Top[OxO2a07[120]]=OxO2a07[123];} ;function pnlGradient_Top_MouseUp(){event[OxO2a07[117]]=true;SetGradientPosition(event[OxO2a07[118]]-5,event[OxO2a07[119]]-5);pnlGradient_Top[OxO2a07[120]]=OxO2a07[121];} ;function Document_MouseUp(){event[OxO2a07[117]]=true;pnlGradient_Top[OxO2a07[120]]=OxO2a07[121];} ;function SetVerticalPosition(Ox413){var Ox413=Ox413-POSITIONADJUSTZ;if(Ox413<27){Ox413=27;} ;if(Ox413>282){Ox413=282;} ;pnlVerticalPosition[OxO2a07[88]][OxO2a07[111]]=Ox413+OxO2a07[98];Ox413=1-((Ox413-27)/255);switch(ColorMode){case 0:if(Ox413==1){Ox413=0;} ;frm[OxO2a07[6]][OxO2a07[79]]=Math.round(Ox413*360);Hsb_Changed();break ;;case 1:frm[OxO2a07[8]][OxO2a07[79]]=Math.round(Ox413*100);Hsb_Changed();break ;;case 2:frm[OxO2a07[9]][OxO2a07[79]]=Math.round(Ox413*100);Hsb_Changed();break ;;case 3:frm[OxO2a07[10]][OxO2a07[79]]=Math.round(Ox413*255);Rgb_Changed();break ;;case 4:frm[OxO2a07[11]][OxO2a07[79]]=Math.round(Ox413*255);Rgb_Changed();break ;;case 5:frm[OxO2a07[12]][OxO2a07[79]]=Math.round(Ox413*255);Rgb_Changed();break ;;} ;} ;function pnlVertical_Top_Click(){SetVerticalPosition(event[OxO2a07[119]]-5);event[OxO2a07[117]]=true;} ;function pnlVertical_Top_MouseMove(){if(event[OxO2a07[122]]!=1){return ;} ;SetVerticalPosition(event[OxO2a07[119]]-5);event[OxO2a07[117]]=true;} ;function pnlVertical_Top_MouseDown(){SetVerticalPosition(event[OxO2a07[119]]-5);event[OxO2a07[117]]=true;} ;function pnlVertical_Top_MouseUp(){SetVerticalPosition(event[OxO2a07[119]]-5);event[OxO2a07[117]]=true;} ;function SetCookie(name,Ox254,Ox255){var Ox256=name+OxO2a07[124]+escape(Ox254)+OxO2a07[125];if(Ox255){var Ox23d= new Date();Ox23d.setSeconds(Ox23d.getSeconds()+Ox255);Ox256+=OxO2a07[126]+Ox23d.toUTCString()+OxO2a07[127];} ;document[OxO2a07[128]]=Ox256;} ;function GetCookie(name){var Ox258=document[OxO2a07[128]].split(OxO2a07[127]);for(var i=0;i<Ox258[OxO2a07[25]];i++){var Ox259=Ox258[i].split(OxO2a07[124]);if(name==Ox259[0].replace(/\s/g,OxO2a07[84])){return unescape(Ox259[1]);} ;} ;} ;function GetCookieDictionary(){var Ox25b={};var Ox258=document[OxO2a07[128]].split(OxO2a07[127]);for(var i=0;i<Ox258[OxO2a07[25]];i++){var Ox259=Ox258[i].split(OxO2a07[124]);Ox25b[Ox259[0].replace(/\s/g,OxO2a07[84])]=unescape(Ox259[1]);} ;return Ox25b;} ;function RgbIsWebSafe(Ox3ec){var Ox266=RgbToHex(Ox3ec);for(var i=0;i<3;i++){if(OxO2a07[129].indexOf(Ox266.substr(i*2,2))==-1){return false;} ;} ;return true;} ;function RgbToWebSafeRgb(Ox3ec){var Ox423= new Array(Ox3ec[0],Ox3ec[1],Ox3ec[2]);if(RgbIsWebSafe(Ox3ec)){return Ox423;} ;var Ox424= new Array(0x00,0x33,0x66,0x99,0xCC,0xFF);for(var i=0;i<3;i++){for(var Ox1f7=1;Ox1f7<6;Ox1f7++){if(Ox423[i]>Ox424[Ox1f7-1]&&Ox423[i]<Ox424[Ox1f7]){if(Ox423[i]-Ox424[Ox1f7-1]>Ox424[Ox1f7]-Ox423[i]){Ox423[i]=Ox424[Ox1f7];} else {Ox423[i]=Ox424[Ox1f7-1];} ;break ;} ;} ;} ;return Ox423;} ;function RgbToYuv(Ox3ec){var Ox426= new Array();Ox426[0]=(Ox3ec[0]*0.299+Ox3ec[1]*0.587+Ox3ec[2]*0.114)/255;Ox426[1]=(Ox3ec[0]*-0.169+Ox3ec[1]*-0.332+Ox3ec[2]*0.500+128)/255;Ox426[2]=(Ox3ec[0]*0.500+Ox3ec[1]*-0.419+Ox3ec[2]*-0.0813+128)/255;return Ox426;} ;function RgbToHsb(Ox3ec){var Ox428= new Array(Ox3ec[0],Ox3ec[1],Ox3ec[2]);var Ox429= new Number(1);var Ox42a= new Number(0);var Ox42b= new Number(1);var Ox408= new Array(0,0,0);var Ox42c= new Array();for(var i=0;i<3;i++){Ox428[i]=Ox3ec[i]/255;if(Ox428[i]<Ox429){Ox429=Ox428[i];} ;if(Ox428[i]>Ox42a){Ox42a=Ox428[i];} ;} ;Ox42b=Ox42a-Ox429;Ox408[2]=Ox42a;if(Ox42b==0){return Ox408;} ;Ox408[1]=Ox42b/Ox42a;for(var i=0;i<3;i++){Ox42c[i]=(((Ox42a-Ox428[i])/6)+(Ox42b/2))/Ox42b;} ;if(Ox428[0]==Ox42a){Ox408[0]=Ox42c[2]-Ox42c[1];} else {if(Ox428[1]==Ox42a){Ox408[0]=(1/3)+Ox42c[0]-Ox42c[2];} else {if(Ox428[2]==Ox42a){Ox408[0]=(2/3)+Ox42c[1]-Ox42c[0];} ;} ;} ;if(Ox408[0]<0){Ox408[0]+=1;} else {if(Ox408[0]>1){Ox408[0]-=1;} ;} ;return Ox408;} ;function HsbToRgb(Ox408){var Ox3ec=HueToRgb(Ox408[0]);var Ox1ff=Ox408[2]*255;for(var i=0;i<3;i++){Ox3ec[i]=Ox3ec[i]*Ox408[2];Ox3ec[i]=((Ox3ec[i]-Ox1ff)*Ox408[1])+Ox1ff;Ox3ec[i]=Math.round(Ox3ec[i]);} ;return Ox3ec;} ;function RgbToHex(Ox3ec){var Ox266= new String();for(var i=0;i<3;i++){Ox3ec[2-i]=Math.round(Ox3ec[2-i]);Ox266=Ox3ec[2-i].toString(16)+Ox266;if(Ox266[OxO2a07[25]]%2==1){Ox266=OxO2a07[107]+Ox266;} ;} ;return Ox266.toUpperCase();} ;function HexToRgb(Ox266){var Ox3ec= new Array();for(var i=0;i<3;i++){Ox3ec[i]= new Number(OxO2a07[130]+Ox266.substr(i*2,2));} ;return Ox3ec;} ;function HueToRgb(Ox431){var Ox432=Ox431*360;var Ox3ec= new Array(0,0,0);var Ox433=(Ox432%60)/60;if(Ox432<60){Ox3ec[0]=255;Ox3ec[1]=Ox433*255;} else {if(Ox432<120){Ox3ec[1]=255;Ox3ec[0]=(1-Ox433)*255;} else {if(Ox432<180){Ox3ec[1]=255;Ox3ec[2]=Ox433*255;} else {if(Ox432<240){Ox3ec[2]=255;Ox3ec[1]=(1-Ox433)*255;} else {if(Ox432<300){Ox3ec[2]=255;Ox3ec[0]=Ox433*255;} else {if(Ox432<360){Ox3ec[0]=255;Ox3ec[2]=(1-Ox433)*255;} ;} ;} ;} ;} ;} ;return Ox3ec;} ;function CheckHexSelect(){if(window[OxO2a07[131]]&&window[OxO2a07[132]]&&frm[OxO2a07[13]]){var Ox261=OxO2a07[73]+frm[OxO2a07[13]][OxO2a07[79]];if(Ox261[OxO2a07[25]]==7){if(window[OxO2a07[133]]!=Ox261){window[OxO2a07[133]]=Ox261;window.do_select(Ox261);} ;} ;} ;} ;setInterval(CheckHexSelect,10);