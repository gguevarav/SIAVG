// Para agregar una nueva fila de Equipo en la pantalla de generar OT
ContadorNumeroFila = 1;
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
    
    // Creamos la tercer columna
    ColumnaFila3 = document.createElement('td');
    DivInputGroup3 = document.createElement('div');
    DivInputGroup3.className = 'input-group input-group-lg';
    SpanSizing3 = document.createElement('span');
    SpanSizing3.id = 'sizing-addon1';
    SpanSizing3.className = 'input-group-addon';
    Icono3 = document.createElement('i');
    Icono3.className = 'glyphicon glyphicon-question-sign';
    InputHoras = document.createElement('input');
    InputHoras.id = 'CantidadHorasEquipo' + ContadorNumeroFila;
    InputHoras.className = 'form-control';
    InputHoras.name = 'CantidadHorasEquipo' + ContadorNumeroFila;
    InputHoras.placeholder = 'Horas';
    InputHoras.type = 'number';
    SpanSizing3.appendChild(Icono3);
    DivInputGroup3.appendChild(SpanSizing3);
    DivInputGroup3.appendChild(InputHoras);
    ColumnaFila3.appendChild(DivInputGroup3);
    FilaTabla.appendChild(NumeroFila);
    // Agregamos las dos columnas a la fila
    FilaTabla.appendChild(ColumnaFila1);

    FilaTabla.appendChild(ColumnaFila3);
    // Agregamos la fila al cuerpo de la tabla
    CuerpoTabla.appendChild(FilaTabla);
}
// Para agregar una nueva fila de personal en la pantalla de generar OT
ContadorNumeroFila2 = 1;
function crearPersonal(obj) {
    // Aumentamos el 1 el contador de la fila
    ContadorNumeroFila2++;
    // Obtenemos el nombre del id donde queremos agregarlo
    CuerpoTablaPersonal = document.getElementById('CuerpoTablaPersonal');
    // Creamos la fila para agregar al cuerpo de la tabla
    FilaTabla = document.createElement('tr');
    //Agregamos el número de la fila a la fila
    NumeroFila = document.createElement('th');
    NumeroFila.scope = 'row';
    NumeroFila.innerHTML = ContadorNumeroFila2;
    // Creamos la primer columna de la fila
    ColumnaFila2 = document.createElement('td');
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
    ColumnaFila2.appendChild(DivInputGroup);
    // Creamos la tercer columna
    ColumnaFila3 = document.createElement('td');
    DivInputGroup3 = document.createElement('div');
    DivInputGroup3.className = 'input-group input-group-lg';
    SpanSizing3 = document.createElement('span');
    SpanSizing3.id = 'sizing-addon1';
    SpanSizing3.className = 'input-group-addon';
    Icono3 = document.createElement('i');
    Icono3.className = 'glyphicon glyphicon-question-sign';
    InputHoras = document.createElement('input');
    InputHoras.id = 'CantidadHorasPersonal' + ContadorNumeroFila2;
    InputHoras.className = 'form-control';
    InputHoras.name = 'CantidadHorasPersonal' + ContadorNumeroFila2;
    InputHoras.placeholder = 'Horas';
    InputHoras.type = 'number';
    SpanSizing3.appendChild(Icono3);
    DivInputGroup3.appendChild(SpanSizing3);
    DivInputGroup3.appendChild(InputHoras);
    ColumnaFila3.appendChild(DivInputGroup3);
    FilaTabla.appendChild(NumeroFila);
    // Agregamos las dos columnas a la fila
    FilaTabla.appendChild(ColumnaFila2);
    FilaTabla.appendChild(ColumnaFila3);
    // Agregamos la fila al cuerpo de la tabla
    CuerpoTablaPersonal.appendChild(FilaTabla);
}
// Para agregar una nueva fila de materiales en la pantalla de generar OT
ContadorNumeroFila3 = 1;
function crearMaterial(obj) {
    // Aumentamos el 1 el contador de la fila
    ContadorNumeroFila3++;
    // Obtenemos el nombre del id donde queremos agregarlo
    CuerpoTablaMaterial = document.getElementById('CuerpoTablaMaterial');
    // Creamos la fila para agregar al cuerpo de la tabla
    FilaTabla = document.createElement('tr');
    //Agregamos el número de la fila a la fila
    NumeroFila = document.createElement('th');
    NumeroFila.scope = 'row';
    NumeroFila.innerHTML = ContadorNumeroFila3;
    // Creamos la primer columna de la fila
    ColumnaFila4 = document.createElement('td');
    DivInputGroup = document.createElement('div');
    DivInputGroup.className = 'input-group input-group-lg';
    SpanSizing = document.createElement('span');
    SpanSizing.id = 'sizing-addon1';
    SpanSizing.className = 'input-group-addon';
    Icono = document.createElement('i');
    Icono.className = 'glyphicon glyphicon-asterisk';
    SelectProducto = document.createElement('select');
    SelectProducto.id = 'Material' + ContadorNumeroFila3;
    SelectProducto.className = 'form-control';
    SelectProducto.name = 'Material' + ContadorNumeroFila3;
    $('#Material1 option').clone().appendTo(SelectProducto);
    // Para el select
    SpanSizing.appendChild(Icono);
    DivInputGroup.appendChild(SpanSizing);
    DivInputGroup.appendChild(SelectProducto);
    ColumnaFila4.appendChild(DivInputGroup);
    // Creamos la tercer columna
    ColumnaFila5 = document.createElement('td');
    DivInputGroup3 = document.createElement('div');
    DivInputGroup3.className = 'input-group input-group-lg';
    SpanSizing3 = document.createElement('span');
    SpanSizing3.id = 'sizing-addon1';
    SpanSizing3.className = 'input-group-addon';
    Icono3 = document.createElement('i');
    Icono3.className = 'glyphicon glyphicon-question-sign';
    InputCantidadMaterial = document.createElement('input');
    InputCantidadMaterial.id = 'CantidadMaterial' + ContadorNumeroFila3;
    InputCantidadMaterial.className = 'form-control';
    InputCantidadMaterial.name = 'CantidadMaterial' + ContadorNumeroFila3;
    InputCantidadMaterial.placeholder = 'Cantidad de Material';
    InputCantidadMaterial.type = 'number';
    SpanSizing3.appendChild(Icono3);
    DivInputGroup3.appendChild(SpanSizing3);
    DivInputGroup3.appendChild(InputCantidadMaterial);
    ColumnaFila5.appendChild(DivInputGroup3);
    FilaTabla.appendChild(NumeroFila);
    // Agregamos las dos columnas a la fila
    FilaTabla.appendChild(ColumnaFila4);
    FilaTabla.appendChild(ColumnaFila5);
    // Agregamos la fila al cuerpo de la tabla
    CuerpoTablaMaterial.appendChild(FilaTabla);
}
function borrar(obj) {
    field = document.getElementById('field');
    field.removeChild(document.getElementById(obj));
}