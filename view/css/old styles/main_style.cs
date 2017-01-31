

body{
	background-image: url(http://localhost/SGAC_v1.0/trunk/view/img/icons/invierno.jpg);
	background-size: 100vw 100vh;
	background-attachment: fixed;
	margin: 0px;	 
}
form{
	width: 450px;
	margin: auto;
	background: rgba(0,0,0,0.4);
	padding: 20px 30px;
	box-sizing:border-box;
	margin-top: 30px;
	border-radius: 7px;
}

h2{
	color: #fff;
	text-align: center;
	margin: 0;
	font-size: 30px;
	margin-bottom: 20px;
}

input{
	width: 100%
	margin-top: 60px;
	margin-left:20px;
	margin-bottom:40px;
	padding: 15px;
	box-sizing:border-box;
	font-size: 17px;
	border: none;
}
#boton{
	background: #31384A;
	color:#fff;
	padding: 20px;
}
#boton:hover{
	cursor:pointer;
}

@media(max-width:480px ){
	form{
		width: 100%;
	}
}