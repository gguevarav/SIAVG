USE DBSIAVG;

INSERT INTO Rol(NombreRol)
			VALUES('Administrador');
			
INSERT INTO Rol(NombreRol)
			VALUES('EncCovial');
			
INSERT INTO Rol(NombreRol)
			VALUES('EncMunicipal');
			
INSERT INTO TipoEmpleado(NombreTipoEmpleado)
			VALUES('Administrador');
			
INSERT INTO TipoEmpleado(NombreTipoEmpleado)
			VALUES('Encargado de Covial');
			
INSERT INTO TipoEmpleado(NombreTipoEmpleado)
			VALUES('Encargado Municipal');
			
INSERT INTO Trazabilidad(NombreTrazabilidad)
			VALUES('Solicitada');
			
INSERT INTO Trazabilidad(NombreTrazabilidad)
			VALUES('Cancelada');
			
INSERT INTO Trazabilidad(NombreTrazabilidad)
			VALUES('Cotizada');
			
INSERT INTO Trazabilidad(NombreTrazabilidad)
			VALUES('Aprobada');
			
INSERT INTO Trazabilidad(NombreTrazabilidad)
			VALUES('Rechazada');
			
INSERT INTO Prioridad(NombrePrioridad)
			VALUES('1');
			
INSERT INTO Prioridad(NombrePrioridad)
			VALUES('2');
			
INSERT INTO Prioridad(NombrePrioridad)
			VALUES('3');
			
INSERT INTO Prioridad(NombrePrioridad)
			VALUES('4');
			
INSERT INTO Prioridad(NombrePrioridad)
			VALUES('5');
			
INSERT INTO Tamanio(NombreTamanio)
			VALUES('1');
		
INSERT INTO Tamanio(NombreTamanio)
			VALUES('2');
			
INSERT INTO Tamanio(NombreTamanio)
			VALUES('3');
			
INSERT INTO Tamanio(NombreTamanio)
			VALUES('4');
			
INSERT INTO Tamanio(NombreTamanio)
			VALUES('5');
			
INSERT INTO Tamanio(NombreTamanio)
			VALUES('6');
			
INSERT INTO Tamanio(NombreTamanio)
			VALUES('7');
			
INSERT INTO Tamanio(NombreTamanio)
			VALUES('8');
			
INSERT INTO Tamanio(NombreTamanio)
			VALUES('9');
			
INSERT INTO Tamanio(NombreTamanio)
			VALUES('10');
			
INSERT INTO Urgencia(NombreUrgencia)
			VALUES('Alta');
			
INSERT INTO Urgencia(NombreUrgencia)
			VALUES('Media');
			
INSERT INTO Urgencia(NombreUrgencia)
			VALUES('Baja');
			
INSERT INTO Persona(NombrePersona, ApellidoPersona, DireccionPersona,
                    TelefonoPersona, CostoXHoraPersona, idTipoEmpleado, EstadoPersona)
              VALUES('Administrador', 'administrador', 'Ciudad',
                     '1234-5678', 0.0, 1, 'Activo');

INSERT INTO Usuario (NombreUsuario, PasswordUsuario, idPersona, idRol)
              VALUES('admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1);