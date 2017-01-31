<?php
    class SCRIPT{
	private $strSQL;

	public function __construct(){
        $this->strSQL = "
                        CREATE DATABASE SGAC;
                        USE SGAC;
                        
                        CREATE TABLE ACTIVIDADES_LUGARES (
                        intId           int(10) NOT NULL AUTO_INCREMENT, 
                        _intIdActividad int(10) NOT NULL, 
                        _intIdLugar     int(10) NOT NULL, 
                        PRIMARY KEY (intId), 
                        UNIQUE INDEX (intId));
                      CREATE TABLE ACTIVIDADES_INSTRUCTORES (
                        intId            int(10) NOT NULL AUTO_INCREMENT, 
                        _intIdActividad  int(10) NOT NULL, 
                        _intIdInstructor int(10) NOT NULL, 
                        PRIMARY KEY (intId), 
                        UNIQUE INDEX (intId));
                      CREATE TABLE ALUMNOS_ACTIVIDADES (
                        intId           int(10) NOT NULL AUTO_INCREMENT, 
                        _intIdActividad int(10) NOT NULL, 
                        _intIdAlumno    int(10) NOT NULL, 
                        PRIMARY KEY (intId), 
                        UNIQUE INDEX (intId));
                      CREATE TABLE CARRERAS (
                        intId            int(10) NOT NULL AUTO_INCREMENT, 
                        strNombreCarrera varchar(50), 
                        PRIMARY KEY (intId), 
                        UNIQUE INDEX (intId));
                      CREATE TABLE CAMPUS (
                        intId           int(10) NOT NULL AUTO_INCREMENT, 
                        strNombreCampus varchar(50), 
                        strDireccion    varchar(200), 
                        strNoTelefono   varchar(50), 
                        PRIMARY KEY (intId), 
                        UNIQUE INDEX (intId));
                      CREATE TABLE LUGARES (
                        intId          int(10) NOT NULL AUTO_INCREMENT, 
                        strNombreLugar varchar(100), 
                        strDireccion   varchar(200), 
                        PRIMARY KEY (intId), 
                        UNIQUE INDEX (intId));
                      CREATE TABLE ACTIVIDADES (
                        intId              int(10) NOT NULL AUTO_INCREMENT, 
                        strNombreActividad varchar(100), 
                        strCategoria       varchar(50), 
                        PRIMARY KEY (intId), 
                        UNIQUE INDEX (intId));
                      CREATE TABLE ALUMNOS (
                        intId         int(10) NOT NULL AUTO_INCREMENT, 
                        strNombre     varchar(50), 
                        strApPaterno  varchar(20), 
                        strApMaterno  varchar(20), 
                        strNoControl  varchar(10), 
                        strDireccion  varchar(200), 
                        _intIdCampus  int(10) NOT NULL, 
                        _intIdCarrera int(10) NOT NULL, 
                        PRIMARY KEY (intId), 
                        UNIQUE INDEX (intId));
                      CREATE TABLE INSTRUCTORES (
                        intId              int(10) NOT NULL AUTO_INCREMENT, 
                        strNombre          varchar(50), 
                        strApPaterno       varchar(20), 
                        strApMaterno       varchar(20), 
                        dtmFechaNacimiento date, 
                        strDireccion       varchar(200), 
                        strTelefono        varchar(50), 
                        PRIMARY KEY (intId), 
                        UNIQUE INDEX (intId));
                      CREATE TABLE ADMINISTRADORES (
                        intId             int(10) NOT NULL AUTO_INCREMENT, 
                        strNombre         varchar(50), 
                        strApPaterno      varchar(20), 
                        strApMaterno      varchar(20), 
                        dtmFehaNacimiento date, 
                        strDireccion      varchar(200), 
                        strTelefono       varchar(50), 
                        PRIMARY KEY (intId), 
                        UNIQUE INDEX (intId));
                      ALTER TABLE ACTIVIDADES_LUGARES ADD INDEX FKACTIVIDADE316460 (_intIdActividad), ADD CONSTRAINT FKACTIVIDADE316460 FOREIGN KEY (_intIdActividad) REFERENCES ACTIVIDADES (intId);
                      ALTER TABLE ACTIVIDADES_LUGARES ADD INDEX FKACTIVIDADE984548 (_intIdLugar), ADD CONSTRAINT FKACTIVIDADE984548 FOREIGN KEY (_intIdLugar) REFERENCES LUGARES (intId);
                      ALTER TABLE ACTIVIDADES_INSTRUCTORES ADD INDEX FKACTIVIDADE996493 (_intIdInstructor), ADD CONSTRAINT FKACTIVIDADE996493 FOREIGN KEY (_intIdInstructor) REFERENCES INSTRUCTORES (intId);
                      ALTER TABLE ACTIVIDADES_INSTRUCTORES ADD INDEX FKACTIVIDADE843094 (_intIdActividad), ADD CONSTRAINT FKACTIVIDADE843094 FOREIGN KEY (_intIdActividad) REFERENCES ACTIVIDADES (intId);
                      ALTER TABLE ALUMNOS_ACTIVIDADES ADD INDEX FKALUMNOS_AC418720 (_intIdActividad), ADD CONSTRAINT FKALUMNOS_AC418720 FOREIGN KEY (_intIdActividad) REFERENCES ACTIVIDADES (intId);
                      ALTER TABLE ALUMNOS_ACTIVIDADES ADD INDEX FKALUMNOS_AC48794 (_intIdAlumno), ADD CONSTRAINT FKALUMNOS_AC48794 FOREIGN KEY (_intIdAlumno) REFERENCES ALUMNOS (intId);
                      ALTER TABLE ALUMNOS ADD INDEX FKALUMNOS315677 (_intIdCarrera), ADD CONSTRAINT FKALUMNOS315677 FOREIGN KEY (_intIdCarrera) REFERENCES CARRERAS (intId);
                      ALTER TABLE ALUMNOS ADD INDEX FKALUMNOS739660 (_intIdCampus), ADD CONSTRAINT FKALUMNOS739660 FOREIGN KEY (_intIdCampus) REFERENCES CAMPUS (intId);
                      ";
    }
    
    public function getStrSQL(){
        return $this->strSQL;
    }
}
?>