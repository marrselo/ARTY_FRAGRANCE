var OxOddd7=["value","idSource","length","checked","linebreaks","\x0D\x0A","ig","\x3Cbr /\x3E","\x0D","\x0A"];var editor=Window_GetDialogArguments(window);function cancel(){Window_CloseDialog(window);} ;function insertContent(){var Ox3c9=document.getElementById(OxOddd7[1])[OxOddd7[0]];if(Ox3c9&&Ox3c9[OxOddd7[2]]>0){if(document.getElementById(OxOddd7[4])[OxOddd7[3]]){Ox3c9=Ox3c9.replace(( new RegExp(OxOddd7[5],OxOddd7[6])),OxOddd7[7]);Ox3c9=Ox3c9.replace(( new RegExp(OxOddd7[8],OxOddd7[6])),OxOddd7[7]);Ox3c9=Ox3c9.replace(( new RegExp(OxOddd7[9],OxOddd7[6])),OxOddd7[7]);} ;editor.PasteHTML(Ox3c9);Window_CloseDialog(window);} ;} ;