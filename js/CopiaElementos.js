ContadorNumeroFila=1;
function crear(obj) {
	// Aumentamos el 1 el contador de la fila
	ContadorNumeroFila++;
	// Obtenemos el nombre del id donde queremos agregarlo
	CuerpoTabla = document.getElementById('CuerpoTabla');
	// Creamos la fila para agregar al cuerpo de la tabla
	FilaTabla = document.createElement('tr');
	//Agregamos el número de la fila a la fila
	NumeroFila = document.createElement('th');
	NumeroFila.scope = 'row';
	NumeroFila.innerHTML = ContadorNumeroFila;
	// Creamos la primer columna de la fila
	ColumnaFila1 = document.createElement('td');
	DivInputGroup = document.createElement('div');
	DivInputGroup.className = 'input-group input-group-lg';
	SpanSizing = document.createElement('span');
	SpanSizing.id = 'sizing-addon1';
	SpanSizing.className = 'input-group-addon';
	Icono = document.createElement('i');
	Icono.className = 'glyphicon glyphicon-asterisk';
	SelectProducto = document.createElement('select');
	SelectProducto.id = 'Equipo' + ContadorNumeroFila;
	SelectProducto.className = 'form-control';
	SelectProducto.name = 'Equipo' + ContadorNumeroFila;
	 $('#Equipo1 option').clone().appendTo(SelectProducto);
	// Para el select
	SpanSizing.appendChild(Icono);
	DivInputGroup.appendChild(SpanSizing);
	DivInputGroup.appendChild(SelectProducto);
	ColumnaFila1.appendChild(DivInputGroup);
	// Creamos la segunda columna
	ColumnaFila2 = document.createElement('td');
	DivInputGroup2 = document.createElement('div');
	DivInputGroup2.className = 'input-group input-group-lg';
	SpanSizing2 = document.createElement('span');
	SpanSizing2.id = 'sizing-addon1';
	SpanSizing2.className = 'input-group-addon';
	Icono2 = document.createElement('i');
	Icono2.className = 'glyphicon glyphicon-question-sign';
	InputCantidad = document.createElement('input');
	InputCantidad.id = 'CantidadEquipo' + ContadorNumeroFila;
	InputCantidad.className = 'form-control';
	InputCantidad.name = 'CantidadEquipo' + ContadorNumeroFila;
	InputCantidad.placeholder = 'Cantidad';
	InputCantidad.type = 'number';
	SpanSizing2.appendChild(Icono2);
	DivInputGroup2.appendChild(SpanSizing2);
	DivInputGroup2.appendChild(InputCantidad);
	ColumnaFila2.appendChild(DivInputGroup2);
	FilaTabla.appendChild(NumeroFila);
	// Agregamos las dos columnas a la fila
	FilaTabla.appendChild(ColumnaFila1);
	FilaTabla.appendChild(ColumnaFila2);
	// Agregamos la fila al cuerpo de la tabla
	CuerpoTabla.appendChild(FilaTabla);
}
ContadorNumeroFila2=1;
function crearPersonal(obj) {
	// Aumentamos el 1 el contador de la fila
	ContadorNumeroFila2++;
	// Obtenemos el nombre del id donde queremos agregarlo
	CuerpoTabla = document.getElementById('CuerpoTablaPersonal');
	// Creamos la fila para agregar al cuerpo de la tabla
	FilaTabla = document.createElement('tr');
	//Agregamos el número de la fila a la fila
	NumeroFila = document.createElement('th');
	NumeroFila.scope = 'row';
	NumeroFila.innerHTML = ContadorNumeroFila2;
	// Creamos la primer columna de la fila
	ColumnaFila3 = document.createElement('td');
	DivInputGroup = document.createElement('div');
	DivInputGroup.className = 'input-group input-group-lg';
	SpanSizing = document.createElement('span');
	SpanSizing.id = 'sizing-addon1';
	SpanSizing.className = 'input-group-addon';
	Icono = document.createElement('i');
	Icono.className = 'glyphicon glyphicon-asterisk';
	SelectProducto = document.createElement('select');
	SelectProducto.id = 'Empleado' + ContadorNumeroFila2;
	SelectProducto.className = 'form-control';
	SelectProducto.name = 'Empleado' + ContadorNumeroFila2;
	 $('#Empleado1 option').clone().appendTo(SelectProducto);
	// Para el select
	SpanSizing.appendChild(Icono);
	DivInputGroup.appendChild(SpanSizing);
	DivInputGroup.appendChild(SelectProducto);
	ColumnaFila3.appendChild(DivInputGroup);
        FilaTabla.appendChild(NumeroFila);
	// Agregamos las dos columnas a la fila
	FilaTabla.appendChild(ColumnaFila3);
	// Agregamos la fila al cuerpo de la tabla
	CuerpoTablaPersonal.appendChild(FilaTabla);
}
function borrar(obj) {
	field = document.getElementById('field');
	field.removeChild(document.getElementById(obj));
}