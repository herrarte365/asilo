-- -----------------------------------------------------
-- Schema asilosite
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `asilosite` DEFAULT CHARACTER SET utf8 ;
USE `asilosite` ;

-- -----------------------------------------------------
-- Table `asilosite`.`encargado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`encargado` (
  `id_encargado` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `cui_encargado` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  `direccion` VARCHAR(45) NULL,
  `estado_encargado` VARCHAR(45) NULL,
  PRIMARY KEY (`id_encargado`),
  UNIQUE INDEX `id_encargado_UNIQUE` (`id_encargado` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asilosite`.`ficha_interno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`ficha_interno` (
  `id_ficha_interno` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(45) NULL,
  `apellidos` VARCHAR(45) NULL,
  `cui` VARCHAR(45) NULL,
  `fecha_nacimiento` DATE NULL,
  `medico_personal` VARCHAR(45) NULL,
  `telefono_medico` VARCHAR(45) NULL,
  `grupo_sanguineo` VARCHAR(45) NULL,
  `alergias` VARCHAR(255) NULL,
  `enfermedades_cronicas` VARCHAR(255) NULL,
  `receta_medico` VARCHAR(255) NULL,
  `observaciones` VARCHAR(255) NULL,
-- -----------------------------------------------------
-- Schema asilosite
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `asilosite` DEFAULT CHARACTER SET utf8 ;
USE `asilosite` ;

-- -----------------------------------------------------
-- Table `asilosite`.`encargado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`encargado` (
  `id_encargado` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `cui_encargado` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  `direccion` VARCHAR(45) NULL,
  `estado_encargado` VARCHAR(45) NULL,
  PRIMARY KEY (`id_encargado`),
  UNIQUE INDEX `id_encargado_UNIQUE` (`id_encargado` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asilosite`.`ficha_interno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`ficha_interno` (
  `id_ficha_interno` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(45) NULL,
  `apellidos` VARCHAR(45) NULL,
  `cui` VARCHAR(45) NULL,
  `fecha_nacimiento` DATE NULL,
  `medico_personal` VARCHAR(45) NULL,
  `telefono_medico` VARCHAR(45) NULL,
  `grupo_sanguineo` VARCHAR(45) NULL,
  `alergias` VARCHAR(255) NULL,
  `enfermedades_cronicas` VARCHAR(255) NULL,
  `receta_medico` VARCHAR(255) NULL,
  `observaciones` VARCHAR(255) NULL,
  `estado_interno` VARCHAR(45) NULL,
  fecha_ingreso datetime not null,
  fecha_egreso datetime null,
  `encargado_id_encargado` INT NOT NULL,
  PRIMARY KEY (`id_ficha_interno`),
  UNIQUE INDEX `id_ficha_interno_UNIQUE` (`id_ficha_interno` ASC) ,
  INDEX `fk_ficha_interno_encargado_idx` (`encargado_id_encargado` ASC) ,
  CONSTRAINT `fk_ficha_interno_encargado`
    FOREIGN KEY (`encargado_id_encargado`)
    REFERENCES `asilosite`.`encargado` (`id_encargado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asilosite`.`caja`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`caja` (
  `id_caja` INT NOT NULL AUTO_INCREMENT,
  `monto` DECIMAL(12,2) NOT NULL,
  `habia` DECIMAL(12,2) NOT NULL,
  `hay` DECIMAL(12,2) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_caja`),
  UNIQUE INDEX `id_caja_UNIQUE` (`id_caja` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asilosite`.`mensualidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`mensualidad` (
  `id_mensualidad` INT NOT NULL AUTO_INCREMENT,
  `mes` INT NULL,
  `anio` INT NULL,
  `fecha_pago` DATETIME NULL,
  `encargado_id_encargado` INT NOT NULL,
  `caja_id_caja` INT NOT NULL,
  PRIMARY KEY (`id_mensualidad`),
  UNIQUE INDEX `id_mensualidad_UNIQUE` (`id_mensualidad` ASC) ,
  INDEX `fk_mensualidad_encargado1_idx` (`encargado_id_encargado` ASC) ,
  INDEX `fk_mensualidad_caja1_idx` (`caja_id_caja` ASC) ,
  CONSTRAINT `fk_mensualidad_encargado1`
    FOREIGN KEY (`encargado_id_encargado`)
    REFERENCES `asilosite`.`encargado` (`id_encargado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mensualidad_caja1`
    FOREIGN KEY (`caja_id_caja`)
    REFERENCES `asilosite`.`caja` (`id_caja`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asilosite`.`medico_especialista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`medico_especialista` (
  `id_medico_especialista` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  usuario_id_usuario int,
  PRIMARY KEY (`id_medico_especialista`),
  UNIQUE INDEX `id_medico_especialista_UNIQUE` (`id_medico_especialista` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asilosite`.`enfermero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`enfermero` (
  `id_enfermero` INT NOT NULL AUTO_INCREMENT,
  `nombre_enfermero` VARCHAR(45) NULL,
  PRIMARY KEY (`id_enfermero`),
  UNIQUE INDEX `id_enfermero_UNIQUE` (`id_enfermero` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asilosite`.`cita_medica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`cita_medica` (
  `id_cita_medica` INT NOT NULL AUTO_INCREMENT,
  `fecha_solicitud` DATETIME NOT NULL,
  `fecha_visita` DATETIME NULL,
  `motivo_visita` VARCHAR(45) NOT NULL,
  `diagnostico` VARCHAR(255) NULL,
  `observaciones_medicas` VARCHAR(255) NULL,
  `estado` VARCHAR(45) NOT NULL,
  especialidad varchar(45) not null,
  `enfermero_id_enfermero` INT NOT NULL,
  `medico_especialista_id_medico_especialista` INT NULL,
  `ficha_interno_id_ficha_interno` INT NOT NULL,
  PRIMARY KEY (`id_cita_medica`),
  UNIQUE INDEX `id_cita_medica_UNIQUE` (`id_cita_medica` ASC) ,
  INDEX `fk_cita_medica_enfermero1_idx` (`enfermero_id_enfermero` ASC) ,
  INDEX `fk_cita_medica_medico_especialista1_idx` (`medico_especialista_id_medico_especialista` ASC) ,
  INDEX `fk_cita_medica_ficha_interno1_idx` (`ficha_interno_id_ficha_interno` ASC) ,
  CONSTRAINT `fk_cita_medica_enfermero1`
    FOREIGN KEY (`enfermero_id_enfermero`)
    REFERENCES `asilosite`.`enfermero` (`id_enfermero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_medica_medico_especialista1`
    FOREIGN KEY (`medico_especialista_id_medico_especialista`)
    REFERENCES `asilosite`.`medico_especialista` (`id_medico_especialista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_medica_ficha_interno1`
    FOREIGN KEY (`ficha_interno_id_ficha_interno`)
    REFERENCES `asilosite`.`ficha_interno` (`id_ficha_interno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asilosite`.`medicamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`medicamento` (
  `id_medicamento` INT NOT NULL AUTO_INCREMENT,
  `medicina` VARCHAR(45) NOT NULL,
  `cod_medicina` VARCHAR(45) NULL,
  `precio` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  `fecha_caducidad` DATE NOT NULL,
  PRIMARY KEY (`id_medicamento`),
  UNIQUE INDEX `id_medicamento_UNIQUE` (`id_medicamento` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asilosite`.`detalle_cita_medicamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`detalle_cita_medicamento` (
  `id_detalle_cita_medicamento` INT NOT NULL AUTO_INCREMENT,
  `cantidad` VARCHAR(45) NOT NULL,
  `tiempo_aplicacion` VARCHAR(45) NOT NULL,
  `costo` DECIMAL(12,2) NOT NULL,
  `indicaciones` VARCHAR(200) NOT NULL,
  `cita_medica_id_cita_medica` INT NOT NULL,
  `medicamento_id_medicamento` INT NULL,
  estado_medicina varchar(45) NOT NULL,
  nombre_medicamento varchar(200) NOT NULL,
  PRIMARY KEY (`id_detalle_cita_medicamento`),
  INDEX `fk_detalle_cita_medicamento_cita_medica1_idx` (`cita_medica_id_cita_medica` ASC) ,
  INDEX `fk_detalle_cita_medicamento_medicamento1_idx` (`medicamento_id_medicamento` ASC) ,
  CONSTRAINT `fk_detalle_cita_medicamento_cita_medica1`
    FOREIGN KEY (`cita_medica_id_cita_medica`)
    REFERENCES `asilosite`.`cita_medica` (`id_cita_medica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_cita_medicamento_medicamento1`
    FOREIGN KEY (`medicamento_id_medicamento`)
    REFERENCES `asilosite`.`medicamento` (`id_medicamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asilosite`.`especialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`especialidad` (
  `id_especialidad` INT NOT NULL AUTO_INCREMENT,
  `nombre_especialidad` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_especialidad`),
  UNIQUE INDEX `id_especialidad_UNIQUE` (`id_especialidad` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asilosite`.`especialidad_has_medico_especialista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`especialidad_has_medico_especialista` (
  `especialidad_id_especialidad` INT NOT NULL,
  `medico_especialista_id_medico_especialista` INT NOT NULL,
  PRIMARY KEY (`especialidad_id_especialidad`, `medico_especialista_id_medico_especialista`),
  INDEX `fk_especialidad_has_medico_especialista_medico_especialista_idx` (`medico_especialista_id_medico_especialista` ASC) ,
  INDEX `fk_especialidad_has_medico_especialista_especialidad1_idx` (`especialidad_id_especialidad` ASC) ,
  CONSTRAINT `fk_especialidad_has_medico_especialista_especialidad1`
    FOREIGN KEY (`especialidad_id_especialidad`)
    REFERENCES `asilosite`.`especialidad` (`id_especialidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_especialidad_has_medico_especialista_medico_especialista1`
    FOREIGN KEY (`medico_especialista_id_medico_especialista`)
    REFERENCES `asilosite`.`medico_especialista` (`id_medico_especialista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asilosite`.`examen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`examen` (
  `id_examen` INT NOT NULL AUTO_INCREMENT,
  `nombre_examen` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  `precio` DECIMAL(12,2) NOT NULL,
  PRIMARY KEY (`id_examen`),
  UNIQUE INDEX `id_examen_UNIQUE` (`id_examen` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asilosite`.`detalle_cita_examen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`detalle_cita_examen` (
  `id_detalle_cita_examen` INT NOT NULL AUTO_INCREMENT,
  `resultado` VARCHAR(255) NULL,
  `precio` DECIMAL(12,2) NOT NULL,
  `cita_medica_id_cita_medica` INT NOT NULL,
  `examen_id_examen` INT NOT NULL,
  PRIMARY KEY (`id_detalle_cita_examen`),
  INDEX `fk_detalle_cita_examen_cita_medica1_idx` (`cita_medica_id_cita_medica` ASC) ,
  INDEX `fk_detalle_cita_examen_examen1_idx` (`examen_id_examen` ASC) ,
  CONSTRAINT `fk_detalle_cita_examen_cita_medica1`
    FOREIGN KEY (`cita_medica_id_cita_medica`)
    REFERENCES `asilosite`.`cita_medica` (`id_cita_medica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_cita_examen_examen1`
    FOREIGN KEY (`examen_id_examen`)
    REFERENCES `asilosite`.`examen` (`id_examen`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asilosite`.`pago_servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`pago_servicio` (
  `id_pago_servicio` INT NOT NULL AUTO_INCREMENT,
  `medicamento` DECIMAL(12,2) NULL,
  `examen` DECIMAL(12,2) NULL,
  `consulta` DECIMAL(12,2) NULL,
  `total` DECIMAL(12,2) NULL,
  `saldo` DECIMAL(12,2) NULL,
  `cita_medica_id_cita_medica` INT NOT NULL,
  PRIMARY KEY (`id_pago_servicio`),
  UNIQUE INDEX `id_pago_servicio_UNIQUE` (`id_pago_servicio` ASC) ,
  INDEX `fk_pago_servicio_cita_medica1_idx` (`cita_medica_id_cita_medica` ASC) ,
  CONSTRAINT `fk_pago_servicio_cita_medica1`
    FOREIGN KEY (`cita_medica_id_cita_medica`)
    REFERENCES `asilosite`.`cita_medica` (`id_cita_medica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asilosite`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`rol` (
  `id_rol` INT NOT NULL AUTO_INCREMENT,
  `nombre_rol` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_rol`),
  UNIQUE INDEX `id_rol_UNIQUE` (`id_rol` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asilosite`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `rol_id_rol` INT NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `id_usuario_UNIQUE` (`id_usuario` ASC) ,
  INDEX `fk_usuario_rol1_idx` (`rol_id_rol` ASC) ,
  CONSTRAINT `fk_usuario_rol1`
    FOREIGN KEY (`rol_id_rol`)
    REFERENCES `asilosite`.`rol` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asilosite`.`detalle_pago_servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`detalle_pago_servicio` (
  `id_detalle_pago_servicio` INT NOT NULL AUTO_INCREMENT,
  `cantidad` DECIMAL(12,2) NOT NULL,
  `fecha_pago` DATETIME NOT NULL,
  `pago_servicio_id_pago_servicio` INT NOT NULL,
  `encargado_id_encargado` INT NOT NULL,
  PRIMARY KEY (`id_detalle_pago_servicio`),
  UNIQUE INDEX `id_detalle_pago_servicio_UNIQUE` (`id_detalle_pago_servicio` ASC) ,
  INDEX `fk_detalle_pago_servicio_pago_servicio1_idx` (`pago_servicio_id_pago_servicio` ASC) ,
  INDEX `fk_detalle_pago_servicio_encargado1_idx` (`encargado_id_encargado` ASC) ,
  CONSTRAINT `fk_detalle_pago_servicio_pago_servicio1`
    FOREIGN KEY (`pago_servicio_id_pago_servicio`)
    REFERENCES `asilosite`.`pago_servicio` (`id_pago_servicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_pago_servicio_encargado1`
    FOREIGN KEY (`encargado_id_encargado`)
    REFERENCES `asilosite`.`encargado` (`id_encargado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asilosite`.`donacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asilosite`.`donacion` (
  `id_donacion` INT NOT NULL AUTO_INCREMENT,
  `monto` DECIMAL(12,2) NULL,
  `entidad` VARCHAR(45) NULL,
  `detalles` VARCHAR(255) NULL,
  `fecha_creacion` DATETIME NULL,
  `caja_id_caja` INT NOT NULL,
  PRIMARY KEY (`id_donacion`),
  UNIQUE INDEX `id_donacion_UNIQUE` (`id_donacion` ASC) ,
  INDEX `fk_donacion_caja1_idx` (`caja_id_caja` ASC) ,
  CONSTRAINT `fk_donacion_caja1`
    FOREIGN KEY (`caja_id_caja`)
    REFERENCES `asilosite`.`caja` (`id_caja`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- DATOS DE PRUEBA 

INSERT INTO `asilosite`.`encargado` (`nombre`, `cui_encargado`, `telefono`, `direccion`, `estado_encargado`) VALUES ('Pedro', '23029302930', '32394342', 'Mazatenango', 'Solvente');

INSERT INTO rol (nombre_rol) values ('Administrador');
INSERT INTO rol (nombre_rol) values ('Enfermero General');
INSERT INTO rol (nombre_rol) values ('Receptor Fundación');
INSERT INTO rol (nombre_rol) values ('Medico Especialista');
INSERT INTO rol (nombre_rol) values ('Medico Local');
INSERT INTO rol (nombre_rol) values ('Encargado de Farmacia');
INSERT INTO rol (nombre_rol) values ('Encargado de Examenes');





INSERT INTO  usuario (usuario, password, rol_id_rol) VALUES ('administrador', '827ccb0eea8a706c4c34a16891f84e7b', 1); -- 12345
INSERT INTO  usuario (usuario, password, rol_id_rol) VALUES ('enfermeroGeneral', '827ccb0eea8a706c4c34a16891f84e7b', 2);
INSERT INTO  usuario (usuario, password, rol_id_rol) VALUES ('receptorFundacion', '827ccb0eea8a706c4c34a16891f84e7b', 3);
INSERT INTO  usuario (usuario, password, rol_id_rol) VALUES ('medicoEspecialista', '827ccb0eea8a706c4c34a16891f84e7b', 4);
INSERT INTO  usuario (usuario, password, rol_id_rol) VALUES ('medicoLocal', '827ccb0eea8a706c4c34a16891f84e7b', 5);
INSERT INTO  usuario (usuario, password, rol_id_rol) VALUES ('medicoEspecialista2', '827ccb0eea8a706c4c34a16891f84e7b', 4);

INSERT INTO enfermero (nombre_enfermero) VALUES ('Enfermero 1'), ('Enfermero 2'), ('Enfermero 3');
INSERT INTO especialidad (nombre_especialidad) VALUES ('Cardiología'), ('Neumología'), ('Cirugía General'), ('Dermatología');

INSERT INTO medico_especialista(nombre, usuario_id_usuario) VALUES ('Dr. Pedro R.', 4), ('Dr. JR', 6);

INSERT INTO especialidad_has_medico_especialista (especialidad_id_especialidad, medico_especialista_id_medico_especialista)
VALUES (1,1), (2,2), (3,2);


INSERT INTO examen(nombre_examen, descripcion, precio) 
VALUES ('examen 1', 'examen 1 de prueba', '50.00'),
('examen 2', 'examen 2 de prueba', '100.50');



