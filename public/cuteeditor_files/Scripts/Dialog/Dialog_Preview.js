var OxO15fc=["idSource","inc_width","inc_height","onload","availWidth","screen","window","availHeight","contentWindow","outerHTML","documentElement","text/html","replace","onresize","dialogWidth","innerWidth","clientWidth","body","dialogHeight","innerHeight","clientHeight","value","contentDocument","document"];var editor=Window_GetDialogArguments(window);var idSource=Window_GetElement(window,OxO15fc[0],true);var inc_width=Window_GetElement(window,OxO15fc[1],true);var inc_height=Window_GetElement(window,OxO15fc[2],true);var ParentW;var ParentH;window[OxO15fc[3]]=function window_onload(){ParentW=top[OxO15fc[6]][OxO15fc[5]][OxO15fc[4]];ParentH=top[OxO15fc[6]][OxO15fc[5]][OxO15fc[7]];var iframe=idSource[OxO15fc[8]];var editdoc=editor.GetDocument();var Ox578;if(Browser_IsWinIE()){Ox578=editdoc[OxO15fc[10]][OxO15fc[9]];} else {Ox578=outerHTML(editdoc.documentElement);} ;var Ox579=Frame_GetContentDocument(iframe);Ox579.open(OxO15fc[11],OxO15fc[12]);Ox579.write(Ox578);Ox579.close();ShowSizeInfo();} ;window[OxO15fc[13]]=ShowSizeInfo;function ShowSizeInfo(){var Ox49b,Ox46f;if(window[OxO15fc[14]]){Ox49b=window[OxO15fc[14]];} else {if(window[OxO15fc[15]]){Ox49b=window[OxO15fc[15]];} else {if(document[OxO15fc[10]]&&document[OxO15fc[10]][OxO15fc[16]]){Ox49b=document[OxO15fc[10]][OxO15fc[16]];} else {if(document[OxO15fc[17]]){Ox49b=document[OxO15fc[17]][OxO15fc[16]];} ;} ;} ;} ;if(window[OxO15fc[18]]){Ox46f=window[OxO15fc[18]];} else {if(window[OxO15fc[19]]){Ox46f=window[OxO15fc[19]];} else {if(document[OxO15fc[10]]&&document[OxO15fc[10]][OxO15fc[20]]){Ox46f=document[OxO15fc[10]][OxO15fc[20]];} else {if(document[OxO15fc[17]]){Ox46f=document[OxO15fc[17]][OxO15fc[20]];} ;} ;} ;} ;inc_width[OxO15fc[21]]=Ox49b;inc_height[OxO15fc[21]]=Ox46f;} ;function do_Close(){Window_CloseDialog(window);} ;function Frame_GetContentDocument(Ox47d){if(Ox47d[OxO15fc[22]]){return Ox47d[OxO15fc[22]];} ;return Ox47d[OxO15fc[23]];} ;