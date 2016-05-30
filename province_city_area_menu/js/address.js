// JavaScript Document
// ÕûÀí£ºyangliu  

var xmlDoc = null;//xmlDocument address
var xmlDocInd = null;//xmlDocument industry
var p;//province element
var c;//city element
var ind; //industry element

window.onload = init;

function init(){
	p = document.getElementById('province');
	c = document.getElementById('city');
	ct = document.getElementById('county');
	p.onchange = getCity;
	c.onchange = getCounty;
	initProvince();
}

function loadXML(xmlFile){
	var xmlDoc;
	if(window.ActiveXObject){//for ie
		xmlDoc = new ActiveXObject('Microsoft.XMLDOM');
	}else if (document.implementation&&document.implementation.createDocument){//for moz
		xmlDoc = document.implementation.createDocument('', '', null);//for moz
	}else{
		alert('xml read ERROR!');
		return null;
	}
	xmlDoc.async = false;  
	xmlDoc.preserveWhiteSpace = false;  
	xmlDoc.load(xmlFile);
	return xmlDoc;
}

function initProvince(){
	if(xmlDoc == null){
		xmlDoc = loadXML('GBT2260-1999.xml');	
	}
	//alert(xmlDoc);
	var provinces = xmlDoc.getElementsByTagName("province");
	while(p.options.length > 1){ 
		p.removeChild(p.options.item(1));	
	}

	for(var i = 0; i<provinces.length; i++){
		var oOption = document.createElement("option");
        //oOption.innerHTML = provinces[i].getAttribute('name');
		oOption.appendChild(document.createTextNode(provinces[i].getAttribute('name')));
        oOption.value = provinces[i].getAttribute('code');
        p.appendChild(oOption);	
	}
}


function getCity(){
	while(c.options.length > 1){
		c.removeChild(c.options.item(1));	
	}
	
	while(ct.options.length > 1){
		ct.removeChild(ct.options.item(1));	
	}
	var name = p.options[p.selectedIndex].value;
	
	var pro = null;
	var provinces = xmlDoc.getElementsByTagName("province");
	for(var k = 0; k < provinces.length; k++){
		if(provinces[k].getAttribute('code') == name){
			pro = provinces[k];
			break;
		}
	}
	
	if(pro!=null){
		var citys = pro.getElementsByTagName("city");
		if(citys != null){
			for(var i = 0; i<citys.length; i++){
				var oOption = document.createElement("option");
				oOption.appendChild(document.createTextNode(citys[i].getAttribute('name')));
				oOption.value = citys[i].getAttribute('code');
				c.appendChild(oOption);	
			}
		}
	}
}


function getCounty(){
	while(ct.options.length > 1){
		ct.removeChild(ct.options.item(1));	
	}
	var name = c.options[c.selectedIndex].value;
	//ie work! but moz fail!
	//var pro = xmlDoc.selectSingleNode("//province[@name='"+name+"']");//xpath
	var pro = null;
	var citys = xmlDoc.getElementsByTagName("city");
	for(var k = 0; k < citys.length; k++){
		if(citys[k].getAttribute('code') == name){
			pro = citys[k];
			break;
		}
	}
	
	if(pro!=null){
		var countys = pro.getElementsByTagName("county");
		if(countys != null){
			for(var i = 0; i<countys.length; i++){
				var oOption = document.createElement("option");
				oOption.appendChild(document.createTextNode(countys[i].getAttribute('name')));
				oOption.value = countys[i].getAttribute('code');
				ct.appendChild(oOption);	
			}
		}
	}
}




