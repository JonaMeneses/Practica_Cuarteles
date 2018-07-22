var x;
x=$(document);
x.ready(IniciaEventos);

function IniciaEventos(){
	var x;
	x=$("#titulo");
	x.click(dioclick);
}

function dioclick(){
	var y=$("#titulo");
	y.css("color","#FEA");w
	y.css("font-family","Comic Sans Ms")
}

x=$("#b1");
x.click(obtener);
x=$("#b2");
x.click(modificar);

function obtener(){
	var y=$("#parrafo");
	alert(y.text());

}

function modificar(){
	var y=$("#parrafo");
	y.text("Cleto dice que es fiel")
}

x=$("#b3");
x.click(agregarAtributo);
function agregarAtributo(){
	var y=$("#tabla");
	y.attr("border","1");
}


//eventos arre fierro
/*
var x;
x=$(document);
x.ready(inicializarEventos);

function inicializarEventos()
{
  var x;
  x=$("a");
  x.mouseover(entraMouse);
  x.mouseout(saleMouse);
}


function entraMouse()
{
  $(this).css("background-color","#ff0");
}

function saleMouse()
{
  $(this).css("background-color","#fff");
}
*/
//mouse hover
var x;
x=$(document);
x.ready(inicializarEventos);

function inicializarEventos()
{
  var x;
  x=$("a");
  x.hover(entraMouse,saleMouse);
}


function entraMouse()
{
  $(this).css("background-color","#ff0");
}

function saleMouse()
{
  $(this).css("background-color","#fff");
}