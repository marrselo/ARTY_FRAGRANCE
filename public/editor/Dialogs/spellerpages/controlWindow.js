var OxOe445=["_form","windowType","controlWindow","noSuggestionSelection","- No suggestions -","suggestionList","sugg","evaluatedText","misword","replacementText","txtsugg","undoButton","btnUndo","addSuggestion","clearSuggestions","selectDefaultSuggestion","resetForm","setSuggestedText","enableUndo","disableUndo","","text","options","selectedIndex","value","length","selected","sugg_text","disabled"];function controlWindow(Ox1ec){this[OxOe445[0]]=Ox1ec;this[OxOe445[1]]=OxOe445[2];this[OxOe445[3]]=OxOe445[4];this[OxOe445[5]]=this[OxOe445[0]][OxOe445[6]];this[OxOe445[7]]=this[OxOe445[0]][OxOe445[8]];this[OxOe445[9]]=this[OxOe445[0]][OxOe445[10]];this[OxOe445[11]]=this[OxOe445[0]][OxOe445[12]];this[OxOe445[13]]=addSuggestion;this[OxOe445[14]]=clearSuggestions;this[OxOe445[15]]=selectDefaultSuggestion;this[OxOe445[16]]=resetForm;this[OxOe445[17]]=setSuggestedText;this[OxOe445[18]]=enableUndo;this[OxOe445[19]]=disableUndo;} ;function resetForm(){if(this[OxOe445[0]]){this[OxOe445[0]].reset();} ;} ;function setSuggestedText(){var Ox1f1=this[OxOe445[5]];var Ox8=this[OxOe445[9]];var Oxb=OxOe445[20];if((Ox1f1[OxOe445[22]][0][OxOe445[21]])&&Ox1f1[OxOe445[22]][0][OxOe445[21]]!=this[OxOe445[3]]){Oxb=Ox1f1[OxOe445[22]][Ox1f1[OxOe445[23]]][OxOe445[21]];} ;Ox8[OxOe445[24]]=Oxb;} ;function selectDefaultSuggestion(){var Ox1f1=this[OxOe445[5]];var Ox8=this[OxOe445[9]];if(Ox1f1[OxOe445[22]][OxOe445[25]]==0){this.addSuggestion(this.noSuggestionSelection);} else {Ox1f1[OxOe445[22]][0][OxOe445[26]]=true;} ;this.setSuggestedText();} ;function addSuggestion(Ox1f4){var Ox1f1=this[OxOe445[5]];if(Ox1f4){var i=Ox1f1[OxOe445[22]][OxOe445[25]];var Ox1f5= new Option(Ox1f4,OxOe445[27]+i);Ox1f1[OxOe445[22]][i]=Ox1f5;} ;} ;function clearSuggestions(){var Ox1f1=this[OxOe445[5]];for(var Ox1f7=Ox1f1[OxOe445[25]]-1;Ox1f7>-1;Ox1f7--){if(Ox1f1[OxOe445[22]][Ox1f7]){Ox1f1[OxOe445[22]][Ox1f7]=null;} ;} ;} ;function enableUndo(){if(this[OxOe445[11]]){if(this[OxOe445[11]][OxOe445[28]]==true){this[OxOe445[11]][OxOe445[28]]=false;} ;} ;} ;function disableUndo(){if(this[OxOe445[11]]){if(this[OxOe445[11]][OxOe445[28]]==false){this[OxOe445[11]][OxOe445[28]]=true;} ;} ;} ;