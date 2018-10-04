DROP DATABASE DBSIAVG;

CREATE DATABASE DBSIAVG;

ALTER DATABASE DBSIAVG CHARSET=utf8;

ALTER DATABASE DBSIAVG COLLATE=utf8_spanish_ci;

USE DBSIAVG;

CREATE TABLE Rol(
    idRol                   TINYINT             NOT NULL                PRIMARY KEY             AUTO_INCREMENT,
    NombreRol               VARCHAR(45)         NOT NULL
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE TipoEmpleado(
    idTipoEmpleado          TINYINT             NOT NULL                PRIMARY KEY             AUTO_INCREMENT,
    NombreTipoEmpleado      VARCHAR(50)         NOT NULL
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Persona(
    idPersona               INTEGER             NOT NULL                PRIMARY KEY             AUTO_INCREMENT,
    NombrePersona           VARCHAR(75)         NOT NULL,
    ApellidoPersona         VARCHAR(45)         NOT NULL,
    DireccionPersona        VARCHAR(45)         NOT NULL,
    TelefonoPersona         VARCHAR(45)         NOT NULL,
	EstadoPersona			VARCHAR(20)			NOT NULL,
    idTipoEmpleado          TINYINT             NOT NULL,
    INDEX (idTipoEmpleado),
    FOREIGN KEY (idTipoEmpleado)
            REFERENCES TipoEmpleado(idTipoEmpleado)
            ON DELETE CASCADE
            ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Usuario(
    idUsuario               INTEGER             NOT NULL                PRIMARY KEY             AUTO_INCREMENT,
    NombreUsuario           VARCHAR(50)         NOT NULL,
    PasswordUsuario         VARCHAR(80)         NOT NULL,
    IdPersona                INTEGER             NOT NULL,
    idRol                   TINYINT             NOT NULL,
    INDEX (IdPersona),
    FOREIGN KEY (IdPersona)
            REFERENCES Persona(idPersona)
            ON DELETE CASCADE
            ON UPDATE NO ACTION,
    INDEX (idRol),
    FOREIGN KEY (idRol)
            REFERENCES Rol(idRol)
            ON DELETE CASCADE
            ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Prioridad(
    idPrioridad             TINYINT             NOT NULL            PRIMARY KEY                 AUTO_INCREMENT,
    NombrePrioridad         VARCHAR(45)         NOT NULL
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Trazabilidad(
    idTrazabilidad          TINYINT             NOT NULL            PRIMARY KEY                 AUTO_INCREMENT,
    NombreTrazabilidad     VARCHAR(45)         NOT NULL
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Urgencia(
    idUrgencia              TINYINT             NOT NULL            PRIMARY KEY                 AUTO_INCREMENT,
    NombreUrgencia          VARCHAR(45)         NOT NULL
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Tamanio(
    idTamanio               TINYINT             NOT NULL            PRIMARY KEY                 AUTO_INCREMENT,
    NombreTamanio           VARCHAR(45)         NOT NULL
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Averia(
    idAveria                INTEGER             NOT NULL            PRIMARY KEY                 AUTO_INCREMENT,
    UbicacionAveria         VARCHAR(100)        NOT NULL,
    FechaReporteAveria      TIMESTAMP		NOT NULL,
    ImagenAveria            VARCHAR(100)        NOT NULL,
    idPrioridad             TINYINT             NOT NULL,
    idTrazabilidad          TINYINT             NOT NULL,
    idUrgencia              TINYINT             NOT NULL,
    idTamanio               TINYINT             NOT NULL,
	idUsuario				INTEGER				NOT NULL,
    INDEX (idPrioridad),
    FOREIGN KEY (idPrioridad)
            REFERENCES Prioridad(idPrioridad)
            ON DELETE CASCADE
            ON UPDATE NO ACTION,
    INDEX (idTrazabilidad),
    FOREIGN KEY (idTrazabilidad)
            REFERENCES Trazabilidad(idTrazabilidad)
            ON DELETE CASCADE
            ON UPDATE NO ACTION,
    INDEX (idUrgencia),
    FOREIGN KEY (idUrgencia)
            REFERENCES Urgencia(idUrgencia)
            ON DELETE CASCADE
            ON UPDATE NO ACTION,
    INDEX (idTamanio),
    FOREIGN KEY (idTamanio)
            REFERENCES Tamanio(idTamanio)
            ON DELETE CASCADE
            ON UPDATE NO ACTION,
    INDEX (idUsuario),
    FOREIGN KEY (idUsuario)
            REFERENCES Usuario(idUsuario)
            ON DELETE CASCADE
            ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Equipo(
    idEquipo                INTEGER             NOT NULL            PRIMARY KEY                 AUTO_INCREMENT,
    NombreEquipo            VARCHAR(100)        NOT NULL,
    CodigoEquipo            VARCHAR(20)         NOT NULL,
    CostoPorHora            DECIMAL             NOT NULL,
    EstadoEquipo            VARCHAR(20)         NOT NULL
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE UnidadMedida(
    idUnidadMedida          TINYINT             NOT NULL            PRIMARY KEY                 AUTO_INCREMENT,
    NombreUnidadMedida      VARCHAR(10)         NOT NULL
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Material(
    idMaterial              INTEGER             NOT NULL            PRIMARY KEY                 AUTO_INCREMENT,
    NombreMaterial          VARCHAR(100)        NOT NULL,
    CodigoMaterial          VARCHAR(20)         NOT NULL,
    idUnidadMedida          TINYINT             NOT NULL,
    PrecioxUnidad           DECIMAL             NOT NULL,
    EstadoMaterial          VARCHAR(20)         NOT NULL,
    INDEX (idUnidadMedida),
    FOREIGN KEY (idUnidadMedida)
            REFERENCES UnidadMedida(idUnidadMedida)
            ON DELETE CASCADE
            ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE ListadoEquipo(
    idListadoEquipo         INTEGER             NOT NULL            PRIMARY KEY                 AUTO_INCREMENT,
    idEquipo                INTEGER             NOT NULL,
    CantidadEquipo          DECIMAL             NOT NULL,
    INDEX (idEquipo),
    FOREIGN KEY (idEquipo)
            REFERENCES Equipo(idEquipo)
            ON DELETE CASCADE
            ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE ListadoMaterial(
    idListadoMaterial       INTEGER             NOT NULL            PRIMARY KEY                 AUTO_INCREMENT,
    idMaterial              INTEGER             NOT NULL,
    CantidadMaterial        DECIMAl             NOT NULL,
    INDEX (idMaterial),
    FOREIGN KEY (idMaterial)
            REFERENCES Material(idMaterial)
            ON DELETE CASCADE
            ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE ListadoPersonal(
    idListadoPersonal       INTEGER             NOT NULL            PRIMARY KEY                 AUTO_INCREMENT,
    idPersona               INTEGER             NOT NULL,
    CantidadPersona         INTEGER             NOT NULL,
    INDEX (idPersona),
    FOREIGN KEY (idPersona)
            REFERENCES Persona(idPersona)
            ON DELETE CASCADE
            ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE OrdenTrabajo(
    idOrdenTrabajo          INTEGER             NOT NULL            PRIMARY KEY                 AUTO_INCREMENT,
    FechaOrdenTrabajo       DATE                NOT NULL,
    CostoTotalOrdenTrabajo  DECIMAL             NOT NULL,
    idAveria                INTEGER             NOT NULL,
    idListadoEquipo         INTEGER             NOT NULL,
    idListadoMaterial       INTEGER             NOT NULL,
    idListadoPersonal       INTEGER             NOT NULL,
    EncargadoMunicipal      INTEGER             NOT NULL,
    EncargadoCovial         INTEGER             NOT NULL,
	Estado					INTEGER				NOT NULL,
    INDEX (idAveria),
    FOREIGN KEY (idAveria)
            REFERENCES Averia(idAveria)
            ON DELETE CASCADE
            ON UPDATE NO ACTION,
    INDEX (idListadoEquipo),
    FOREIGN KEY (idListadoEquipo)
            REFERENCES ListadoEquipo(idListadoEquipo)
            ON DELETE CASCADE
            ON UPDATE NO ACTION,
    INDEX (idListadoMaterial),
    FOREIGN KEY (idListadoMaterial)
            REFERENCES ListadoMaterial(idListadoMaterial)
            ON DELETE CASCADE
            ON UPDATE NO ACTION,
    INDEX (idListadoPersonal),
    FOREIGN KEY (idListadoPersonal)
            REFERENCES ListadoPersonal(idListadoPersonal)
            ON DELETE CASCADE
            ON UPDATE NO ACTION,
    INDEX (EncargadoMunicipal),
    FOREIGN KEY (EncargadoMunicipal)
            REFERENCES Persona(idPersona)
            ON DELETE CASCADE
            ON UPDATE NO ACTION,
    INDEX (EncargadoCovial),
    FOREIGN KEY (EncargadoCovial)
            REFERENCES Persona(idPersona)
            ON DELETE CASCADE
            ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;