

*{
	margin:0px;
	padding:0px;
	font-family: sans-serif;  
}

div#navbar{
	margin:0px;
	width:100%;
	height: 110px;
	background-color: purple; 
	position: fixed;
	z-index: 1000;
}

.contenedor{
	width:100px;
	height: 130px;
	float:right;
	-webkit-transition: height .4s;
}

.contenedor1{
	width:100px;
	height: 130px;
	float:left;
	-webkit-transition: height .10s;
}

div#uno{
	/*background-color: rgb(208,101,3); */
}

div#dos{
	/*background-color: rgb(233,147,26);*/
	
}

div#tres{
	/*background-color:  rgb(22,145,190);*/
}

div#cuatro{
	/*background-color: rgb(22,107,162);*/
}

div#cinco{
	/*background-color: rgb(27,54,71);*/
}

img.icon{
	display:block;
	margin:10px auto;
	background-color: rgba(255,255,255,.15);
	width: 20px;
	padding: 15px;
	-webkit-border-radius:50%;
	-webkit-box-shadow: 0px 0px 0px 30px rgba(255,255,255,0);
	-webkit-transition:box-shadow .4s;
	
}

p.text{
	font-size: 0.8em;
	color:white;
	text-align:center;
	padding-top:5px;
	opacity:.6; 
	-webkit-transition:padding-top .4s;
}

div.contenedor:hover{
	/*height:250px ;*/
}

div.contenedor:hover p.texto{
	padding-top: 10px;
	opacity: 1; 
}

div.contenedor:hover img.icon{
	-webkit-box-shadow: 0px 0px 0px 0px rgba(255,255,255,.6);
}

div.contenedor1:hover{

}

div.contenedor1:hover p.texto{
	padding-top: 10px;
	opacity: 1;
}

div.contenedor1:hover img.icon{
	-webkit-box-shadow: 0px 0px 0px 0px rgba(255,255,255,.6);
}

div#navegador{
	display: block;
	width: 150px;
	height: 150%;
	position: fixed;
	z-index: 800;
	background-color: #995577;
}

#navegador ul {
	margin-top: 150px;
}

#navegador li{
   display: block;
   text-align: left;
   margin:10px;
}

#navegador li a {
	display: block;
   padding: 7px;
   color: #666;
   background-color: #eeeeee;
   border: 1px solid #ccc;
   text-decoration: none;
}

#navegador li a:hover{
   background-color: #333333;
   color: #ffffff;
}
section{
	text-align: center;
 	background-image: url(http://localhost/SGAC_v1.0/trunk/view/img/icons/ivierno.jpg);
 	background-size: 100vw 100vh;
 	background-attachment: fixed;
 	margin: 0;
	position: absolute;
	margin-top:105px;
	margin-left: 150px;
}
