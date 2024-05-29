<?php
include("../../bd.php"); 

// Contenido SQL
$sqlContent = <<<SQL
-- Aquí colocas todo el contenido que proporcioné anteriormente o generas dinámicamente
USE cementerio ;

DELIMITER $$

-- Procedimientos para la tabla `canton`
CREATE PROCEDURE `sp_addCanton`(IN `nombre_can` VARCHAR(100))
BEGIN
    INSERT INTO `canton` (`nombre_can`) VALUES (nombre_can);
END$$

CREATE PROCEDURE `sp_getCanton`(IN `id_can` INT)
BEGIN
    SELECT * FROM `canton` WHERE `id_can` = id_can;
END$$

CREATE PROCEDURE `sp_updateCanton`(IN `id_can` INT, IN `nombre_can` VARCHAR(100))
BEGIN
    UPDATE `canton` SET `nombre_can` = nombre_can WHERE `id_can` = id_can;
END$$

CREATE PROCEDURE `sp_deleteCanton`(IN `id_can` INT)
BEGIN
    DELETE FROM `canton` WHERE `id_can` = id_can;
END$$

-- Procedimientos para la tabla `provincia`
CREATE PROCEDURE `sp_addProvincia`(IN `nombre_pro` VARCHAR(100))
BEGIN
    INSERT INTO `provincia` (`nombre_pro`) VALUES (nombre_pro);
END$$

CREATE PROCEDURE `sp_getProvincia`(IN `id_pro` INT)
BEGIN
    SELECT * FROM `provincia` WHERE `id_pro` = id_pro;
END$$

CREATE PROCEDURE `sp_updateProvincia`(IN `id_pro` INT, IN `nombre_pro` VARCHAR(100))
BEGIN
    UPDATE `provincia` SET `nombre_pro` = nombre_pro WHERE `id_pro` = id_pro;
END$$

CREATE PROCEDURE `sp_deleteProvincia`(IN `id_pro` INT)
BEGIN
    DELETE FROM `provincia` WHERE `id_pro` = id_pro;
END$$

-- tabla ubicacion 
CREATE PROCEDURE `sp_addUbicacion`(IN `_id_canton` INT, IN `_id_provincia` INT)
BEGIN
    INSERT INTO `ubicacion` (`id_canton`, `id_provincia`) VALUES (_id_canton, _id_provincia);
END$$

-- Procedimiento para obtener una ubicación por su ID
CREATE PROCEDURE `sp_getUbicacion`(IN `id_ubi` INT)
BEGIN
    SELECT * FROM `ubicacion` WHERE `id_ubi` = id_ubi;
END$$

-- Procedimiento para actualizar una ubicación
CREATE PROCEDURE `sp_updateUbicacion`(IN `id_ubi` INT, IN `_id_canton` INT, IN `_id_provincia` INT)
BEGIN
    UPDATE `ubicacion`
    SET `id_canton` = _id_canton, `id_provincia` = _id_provincia
    WHERE `id_ubi` = id_ubi;
END$$

-- Procedimiento para eliminar una ubicación
CREATE PROCEDURE `sp_deleteUbicacion`(IN `id_ubi` INT)
BEGIN
    DELETE FROM `ubicacion` WHERE `id_ubi` = id_ubi;
END$$

-- Cliente table
CREATE PROCEDURE `sp_addCliente`(
    IN `_id_ubicacion` INT, 
    IN `_ci_clien` VARCHAR(10), 
    IN `_nombre_clien` VARCHAR(100), 
    IN `_apellido_clien` VARCHAR(100), 
    IN `_fecha_nacimiento_clien` DATE, 
    IN `_telefono1` VARCHAR(10), 
    IN `_telefono2` VARCHAR(10))
BEGIN
    INSERT INTO `cliente` (
        `id_ubicacion`, 
        `ci_clien`, 
        `nombre_clien`, 
        `apellido_clien`, 
        `fecha_nacimiento_clien`, 
        `telefono1`, 
        `telefono2`
    ) VALUES (
        _id_ubicacion, 
        _ci_clien, 
        _nombre_clien, 
        _apellido_clien, 
        _fecha_nacimiento_clien, 
        _telefono1, 
        _telefono2
    );
END$$

CREATE PROCEDURE `sp_getCliente`(IN `_id_clien` INT)
BEGIN
    SELECT * FROM `cliente` WHERE `id_clien` = _id_clien;
END$$

CREATE PROCEDURE `sp_updateCliente`(
    IN `_id_clien` INT,
    IN `_id_ubicacion` INT, 
    IN `_ci_clien` VARCHAR(10), 
    IN `_nombre_clien` VARCHAR(100), 
    IN `_apellido_clien` VARCHAR(100), 
    IN `_fecha_nacimiento_clien` DATE, 
    IN `_telefono1` VARCHAR(10), 
    IN `_telefono2` VARCHAR(10))
BEGIN
    UPDATE `cliente` SET 
        `id_ubicacion` = _id_ubicacion, 
        `ci_clien` = _ci_clien, 
        `nombre_clien` = _nombre_clien, 
        `apellido_clien` = _apellido_clien, 
        `fecha_nacimiento_clien` = _fecha_nacimiento_clien, 
        `telefono1` = _telefono1, 
        `telefono2` = _telefono2
    WHERE `id_clien` = _id_clien;
END$$

CREATE PROCEDURE `sp_deleteCliente`(IN `_id_clien` INT)
BEGIN
    DELETE FROM `cliente` WHERE `id_clien` = _id_clien;
END$$
-- causa muerte 
-- Procedimiento para añadir una nueva causa de muerte
CREATE PROCEDURE `sp_addCausaMuerte`(IN `nombre_causa` VARCHAR(100))
BEGIN
    INSERT INTO `causa_muerte` (`nombre_causa_muerte`) VALUES (nombre_causa);
END$$

-- Procedimiento para obtener información de una causa de muerte por su ID
CREATE PROCEDURE `sp_getCausaMuerte`(IN `id_causa` INT)
BEGIN
    SELECT * FROM `causa_muerte` WHERE `id_causa_muerte` = id_causa;
END$$

-- Procedimiento para actualizar el nombre de una causa de muerte
CREATE PROCEDURE `sp_updateCausaMuerte`(IN `id_causa` INT, IN `nombre_causa` VARCHAR(100))
BEGIN
    UPDATE `causa_muerte` SET `nombre_causa_muerte` = nombre_causa WHERE `id_causa_muerte` = id_causa;
END$$

-- Procedimiento para eliminar una causa de muerte por su ID
CREATE PROCEDURE `sp_deleteCausaMuerte`(IN `id_causa` INT)
BEGIN
    DELETE FROM `causa_muerte` WHERE `id_causa_muerte` = id_causa;
END$$

-- Procedimiento para añadir un nuevo difunto
CREATE PROCEDURE `sp_addDifunto`(
    IN `id_causa_muerte` INT,
    IN `nombre_difunto` VARCHAR(100),
    IN `apellido_difunto` VARCHAR(100),
    IN `fecha_nacimiento_difunto` DATE,
    IN `fecha_defuncion_difunto` DATE,
    IN `codigo_acta_difunto` INT
)
BEGIN
    INSERT INTO `difunto` (`id_causa_muerte`, `nombre_difunto`, `apellido_difunto`, `fecha_nacimiento_difunto`, `fecha_defuncion_difunto`, `codigo_acta_difunto`)
    VALUES (id_causa_muerte, nombre_difunto, apellido_difunto, fecha_nacimiento_difunto, fecha_defuncion_difunto, codigo_acta_difunto);
END$$

-- Procedimiento para obtener información de un difunto por su ID
CREATE PROCEDURE `sp_getDifunto`(IN `id_difunto` INT)
BEGIN
    SELECT * FROM `difunto` WHERE `id_difunto` = id_difunto;
END$$

-- Procedimiento para actualizar información de un difunto
CREATE PROCEDURE `sp_updateDifunto`(
    IN `id_difunto` INT,
    IN `id_causa_muerte` INT,
    IN `nombre_difunto` VARCHAR(100),
    IN `apellido_difunto` VARCHAR(100),
    IN `fecha_nacimiento_difunto` DATE,
    IN `fecha_defuncion_difunto` DATE,
    IN `codigo_acta_difunto` INT
)
BEGIN
    UPDATE `difunto` SET
    `id_causa_muerte` = id_causa_muerte,
    `nombre_difunto` = nombre_difunto,
    `apellido_difunto` = apellido_difunto,
    `fecha_nacimiento_difunto` = fecha_nacimiento_difunto,
    `fecha_defuncion_difunto` = fecha_defuncion_difunto,
    `codigo_acta_difunto` = codigo_acta_difunto
    WHERE `id_difunto` = id_difunto;
END$$

-- Procedimiento para eliminar un difunto por su ID
CREATE PROCEDURE `sp_deleteDifunto`(IN `id_difunto` INT)
BEGIN
    DELETE FROM `difunto` WHERE `id_difunto` = id_difunto;
END$$
-- Procedimiento para añadir un nuevo tipo de estructura
CREATE PROCEDURE `sp_addTipoEstructura`(IN `nombre_tipo_estruc` VARCHAR(100))
BEGIN
    INSERT INTO `tipo_estructura` (`nombre_tipo_estruc`) VALUES (nombre_tipo_estruc);
END$$

-- Procedimiento para obtener información de un tipo de estructura por su ID
CREATE PROCEDURE `sp_getTipoEstructura`(IN `id_tipo_estructura` INT)
BEGIN
    SELECT * FROM `tipo_estructura` WHERE `id_tipo_estructura` = id_tipo_estructura;
END$$

-- Procedimiento para actualizar el nombre de un tipo de estructura
CREATE PROCEDURE `sp_updateTipoEstructura`(IN `id_tipo_estructura` INT, IN `nombre_tipo_estruc` VARCHAR(100))
BEGIN
    UPDATE `tipo_estructura` SET `nombre_tipo_estruc` = nombre_tipo_estruc WHERE `id_tipo_estructura` = id_tipo_estructura;
END$$

-- Procedimiento para eliminar un tipo de estructura por su ID
CREATE PROCEDURE `sp_deleteTipoEstructura`(IN `id_tipo_estructura` INT)
BEGIN
    DELETE FROM `tipo_estructura` WHERE `id_tipo_estructura` = id_tipo_estructura;
END$$

-- Procedimiento para añadir un nuevo estado de estructura
CREATE PROCEDURE `sp_addEstadoEstructura`(IN `nombre_est_estruc` VARCHAR(100))
BEGIN
    INSERT INTO `estado_estructura` (`nombre_est_estruc`) VALUES (nombre_est_estruc);
END$$

-- Procedimiento para obtener información de un estado de estructura por su ID
CREATE PROCEDURE `sp_getEstadoEstructura`(IN `id_estado_estructura` INT)
BEGIN
    SELECT * FROM `estado_estructura` WHERE `id_estado_estructura` = id_estado_estructura;
END$$

-- Procedimiento para actualizar el nombre de un estado de estructura
CREATE PROCEDURE `sp_updateEstadoEstructura`(IN `id_estado_estructura` INT, IN `nombre_est_estruc` VARCHAR(100))
BEGIN
    UPDATE `estado_estructura` SET `nombre_est_estruc` = nombre_est_estruc WHERE `id_estado_estructura` = id_estado_estructura;
END$$

-- Procedimiento para eliminar un estado de estructura por su ID
CREATE PROCEDURE `sp_deleteEstadoEstructura`(IN `id_estado_estructura` INT)
BEGIN
    DELETE FROM `estado_estructura` WHERE `id_estado_estructura` = id_estado_estructura;
END$$

-- Procedimiento para añadir un nuevo lugar de estructura
CREATE PROCEDURE `sp_addLugarEstructura`(IN `nombre_zona` VARCHAR(100), IN `nombre_manzana` VARCHAR(100))
BEGIN
    INSERT INTO `lugar_estructura` (`nombre_zona`, `nombre_manzana`) VALUES (nombre_zona, nombre_manzana);
END$$

-- Procedimiento para obtener información de un lugar de estructura por su ID
CREATE PROCEDURE `sp_getLugarEstructura`(IN `id_lugar_estructura` INT)
BEGIN
    SELECT * FROM `lugar_estructura` WHERE `id_lugar_estructura` = id_lugar_estructura;
END$$

-- Procedimiento para actualizar la información de un lugar de estructura
CREATE PROCEDURE `sp_updateLugarEstructura`(IN `id_lugar_estructura` INT, IN `nombre_zona` VARCHAR(100), IN `nombre_manzana` VARCHAR(100))
BEGIN
    UPDATE `lugar_estructura` SET `nombre_zona` = nombre_zona, `nombre_manzana` = nombre_manzana WHERE `id_lugar_estructura` = id_lugar_estructura;
END$$

-- Procedimiento para eliminar un lugar de estructura por su ID
CREATE PROCEDURE `sp_deleteLugarEstructura`(IN `id_lugar_estructura` INT)
BEGIN
    DELETE FROM `lugar_estructura` WHERE `id_lugar_estructura` = id_lugar_estructura;
END$$
-- Procedimiento para añadir una nueva estructura
CREATE PROCEDURE `sp_addEstructura`(
    IN `id_lugar_estructura` INT,
    IN `id_tipo_estructura` INT,
    IN `id_estado_estructura` INT,
    IN `cruces` BOOLEAN
)
BEGIN
    INSERT INTO `estructura` (`id_lugar_estructura`, `id_tipo_estructura`, `id_estado_estructura`, `cruces`)
    VALUES (id_lugar_estructura, id_tipo_estructura, id_estado_estructura, cruces);
END$$

-- Procedimiento para obtener información de una estructura por su ID
CREATE PROCEDURE `sp_getEstructura`(IN `id_estructura` INT)
BEGIN
    SELECT * FROM `estructura` WHERE `id_estructura` = id_estructura;
END$$

-- Procedimiento para actualizar información de una estructura
CREATE PROCEDURE `sp_updateEstructura`(
    IN `id_estructura` INT,
    IN `id_lugar_estructura` INT,
    IN `id_tipo_estructura` INT,
    IN `id_estado_estructura` INT,
    IN `cruces` BOOLEAN
)
BEGIN
    UPDATE `estructura` SET
    `id_lugar_estructura` = id_lugar_estructura,
    `id_tipo_estructura` = id_tipo_estructura,
    `id_estado_estructura` = id_estado_estructura,
    `cruces` = cruces
    WHERE `id_estructura` = id_estructura;
END$$

-- Procedimiento para eliminar una estructura por su ID
CREATE PROCEDURE `sp_deleteEstructura`(IN `id_estructura` INT)
BEGIN
    DELETE FROM `estructura` WHERE `id_estructura` = id_estructura;
END$$

-- Procedimiento para añadir un nuevo tipo de pago
CREATE PROCEDURE `sp_addTipoPago`(IN `nombre_tipo_pago` VARCHAR(100))
BEGIN
    INSERT INTO `tipo_pago` (`nombre_tipo_pago`) VALUES (nombre_tipo_pago);
END$$

-- Procedimiento para obtener información de un tipo de pago por su ID
CREATE PROCEDURE `sp_getTipoPago`(IN `id_tipo_pago` INT)
BEGIN
    SELECT * FROM `tipo_pago` WHERE `id_tipo_pago` = id_tipo_pago;
END$$

-- Procedimiento para actualizar el nombre de un tipo de pago
CREATE PROCEDURE `sp_updateTipoPago`(IN `id_tipo_pago` INT, IN `nombre_tipo_pago` VARCHAR(100))
BEGIN
    UPDATE `tipo_pago` SET `nombre_tipo_pago` = nombre_tipo_pago WHERE `id_tipo_pago` = id_tipo_pago;
END$$

-- Procedimiento para eliminar un tipo de pago por su ID
CREATE PROCEDURE `sp_deleteTipoPago`(IN `id_tipo_pago` INT)
BEGIN
    DELETE FROM `tipo_pago` WHERE `id_tipo_pago` = id_tipo_pago;
END$$
-- Procedimiento para añadir un nuevo tipo de personal
CREATE PROCEDURE `sp_addTipoPersonal`(IN `nombre_tipo_personal` VARCHAR(100))
BEGIN
    INSERT INTO `tipo_personal` (`nombre_tipo_personal`) VALUES (nombre_tipo_personal);
END$$

-- Procedimiento para obtener información de un tipo de personal por su ID
CREATE PROCEDURE `sp_getTipoPersonal`(IN `id_tipo_personal` INT)
BEGIN
    SELECT * FROM `tipo_personal` WHERE `id_tipo_personal` = id_tipo_personal;
END$$

-- Procedimiento para actualizar el nombre de un tipo de personal
CREATE PROCEDURE `sp_updateTipoPersonal`(IN `id_tipo_personal` INT, IN `nombre_tipo_personal` VARCHAR(100))
BEGIN
    UPDATE `tipo_personal` SET `nombre_tipo_personal` = nombre_tipo_personal WHERE `id_tipo_personal` = id_tipo_personal;
END$$

-- Procedimiento para eliminar un tipo de personal por su ID
CREATE PROCEDURE `sp_deleteTipoPersonal`(IN `id_tipo_personal` INT)
BEGIN
    DELETE FROM `tipo_personal` WHERE `id_tipo_personal` = id_tipo_personal;
END$$

-- Procedimiento para añadir un nuevo personal
CREATE PROCEDURE `sp_addPersonal`(
    IN `id_tipo_personal` INT,
    IN `ci_personal` VARCHAR(10),
    IN `nombre_personal` VARCHAR(100),
    IN `apellido_personal` VARCHAR(100),
    IN `fecha_nacimiento_personal` DATE,
    IN `telefono1_personal` VARCHAR(10),
    IN `telefono2_personal` VARCHAR(10)
)
BEGIN
    INSERT INTO `personal` (`id_tipo_personal`, `ci_personal`, `nombre_personal`, `apellido_personal`, `fecha_nacimiento_personal`, `telefono1_personal`, `telefono2_personal`)
    VALUES (id_tipo_personal, ci_personal, nombre_personal, apellido_personal, fecha_nacimiento_personal, telefono1_personal, telefono2_personal);
END$$

-- Procedimiento para obtener información de un personal por su ID
CREATE PROCEDURE `sp_getPersonal`(IN `id_personal` INT)
BEGIN
    SELECT * FROM `personal` WHERE `id_personal` = id_personal;
END$$

-- Procedimiento para actualizar información de un personal
CREATE PROCEDURE `sp_updatePersonal`(
    IN `id_personal` INT,
    IN `id_tipo_personal` INT,
    IN `ci_personal` VARCHAR(10),
    IN `nombre_personal` VARCHAR(100),
    IN `apellido_personal` VARCHAR(100),
    IN `fecha_nacimiento_personal` DATE,
    IN `telefono1_personal` VARCHAR(10),
    IN `telefono2_personal` VARCHAR(10)
)
BEGIN
    UPDATE `personal` SET
    `id_tipo_personal` = id_tipo_personal,
    `ci_personal` = ci_personal,
    `nombre_personal` = nombre_personal,
    `apellido_personal` = apellido_personal,
    `fecha_nacimiento_personal` = fecha_nacimiento_personal,
    `telefono1_personal` = telefono1_personal,
    `telefono2_personal` = telefono2_personal
    WHERE `id_personal` = id_personal;
END$$

-- Procedimiento para eliminar un personal por su ID
CREATE PROCEDURE `sp_deletePersonal`(IN `id_personal` INT)
BEGIN
    DELETE FROM `personal` WHERE `id_personal` = id_personal;
END$$

-- Procedimiento para añadir un nuevo tipo de incidente
CREATE PROCEDURE `sp_addTipoIncidente`(IN `nombre_tipo_incidente` VARCHAR(100))
BEGIN
    INSERT INTO `tipo_incidente` (`nombre_tipo_incidente`) VALUES (nombre_tipo_incidente);
END$$

-- Procedimiento para obtener información de un tipo de incidente por su ID
CREATE PROCEDURE `sp_getTipoIncidente`(IN `id_tipo_incidente` INT)
BEGIN
    SELECT * FROM `tipo_incidente` WHERE `id_tipo_incidente` = id_tipo_incidente;
END$$

-- Procedimiento para actualizar el nombre de un tipo de incidente
CREATE PROCEDURE `sp_updateTipoIncidente`(IN `id_tipo_incidente` INT, IN `nombre_tipo_incidente` VARCHAR(100))
BEGIN
    UPDATE `tipo_incidente` SET `nombre_tipo_incidente` = nombre_tipo_incidente WHERE `id_tipo_incidente` = id_tipo_incidente;
END$$

-- Procedimiento para eliminar un tipo de incidente por su ID
CREATE PROCEDURE `sp_deleteTipoIncidente`(IN `id_tipo_incidente` INT)
BEGIN
    DELETE FROM `tipo_incidente` WHERE `id_tipo_incidente` = id_tipo_incidente;
END$$
-- Procedimiento para añadir un nuevo reporte de incidente
CREATE PROCEDURE `sp_addReporteIncidente`(
    IN `id_tipo_incidente` INT,
    IN `id_personal` INT,
    IN `fecha_reporte_incidente` DATE
)
BEGIN
    INSERT INTO `reporte_incidente` (`id_tipo_incidente`, `id_personal`, `fecha_reporte_incidente`)
    VALUES (id_tipo_incidente, id_personal, fecha_reporte_incidente);
END$$

-- Procedimiento para obtener información de un reporte de incidente por su ID
CREATE PROCEDURE `sp_getReporteIncidente`(IN `id_incidente` INT)
BEGIN
    SELECT * FROM `reporte_incidente` WHERE `id_incidente` = id_incidente;
END$$

-- Procedimiento para actualizar información de un reporte de incidente
CREATE PROCEDURE `sp_updateReporteIncidente`(
    IN `id_incidente` INT,
    IN `id_tipo_incidente` INT,
    IN `id_personal` INT,
    IN `fecha_reporte_incidente` DATE
)
BEGIN
    UPDATE `reporte_incidente` SET
    `id_tipo_incidente` = id_tipo_incidente,
    `id_personal` = id_personal,
    `fecha_reporte_incidente` = fecha_reporte_incidente
    WHERE `id_incidente` = id_incidente;
END$$

-- Procedimiento para eliminar un reporte de incidente por su ID
CREATE PROCEDURE `sp_deleteReporteIncidente`(IN `id_incidente` INT)
BEGIN
    DELETE FROM `reporte_incidente` WHERE `id_incidente` = id_incidente;
END$$

-- Procedimiento para añadir un nuevo tipo de trámite
CREATE PROCEDURE `sp_addTipoTramite`(IN `nombre_tipo_tramite` VARCHAR(100))
BEGIN
    INSERT INTO `tipo_tramite` (`nombre_tipo_tramite`) VALUES (nombre_tipo_tramite);
END$$

-- Procedimiento para obtener información de un tipo de trámite por su ID
CREATE PROCEDURE `sp_getTipoTramite`(IN `id_tipo_tramite` INT)
BEGIN
    SELECT * FROM `tipo_tramite` WHERE `id_tipo_tramite` = id_tipo_tramite;
END$$

-- Procedimiento para actualizar el nombre de un tipo de trámite
CREATE PROCEDURE `sp_updateTipoTramite`(IN `id_tipo_tramite` INT, IN `nombre_tipo_tramite` VARCHAR(100))
BEGIN
    UPDATE `tipo_tramite` SET `nombre_tipo_tramite` = nombre_tipo_tramite WHERE `id_tipo_tramite` = id_tipo_tramite;
END$$

-- Procedimiento para eliminar un tipo de trámite por su ID
CREATE PROCEDURE `sp_deleteTipoTramite`(IN `id_tipo_tramite` INT)
BEGIN
    DELETE FROM `tipo_tramite` WHERE `id_tipo_tramite` = id_tipo_tramite;
END$$
-- Procedimiento para añadir un nuevo trámite
CREATE PROCEDURE `sp_addTramite`(
    IN `id_tipo_tramite` INT,
    IN `id_cliente` INT,
    IN `id_difunto` INT,
    IN `id_estructura` INT,
    IN `id_personal` INT,
    IN `fecha_tramite` DATE,
    IN `fecha_cumpli_tramite` DATE,
    IN `mensaje_tramite` VARCHAR(100)
)
BEGIN
    INSERT INTO `tramite` (`id_tipo_tramite`, `id_cliente`, `id_difunto`, `id_estructura`, `id_personal`, `fecha_tramite`, `fecha_cumpli_tramite`, `mensaje_tramite`)
    VALUES (id_tipo_tramite, id_cliente, id_difunto, id_estructura, id_personal, fecha_tramite, fecha_cumpli_tramite, mensaje_tramite);
END$$

-- Procedimiento para obtener información de un trámite por su ID
CREATE PROCEDURE `sp_getTramite`(IN `id_tramite` INT)
BEGIN
    SELECT * FROM `tramite` WHERE `id_tramite` = id_tramite;
END$$

-- Procedimiento para actualizar información de un trámite
CREATE PROCEDURE `sp_updateTramite`(
    IN `id_tramite` INT,
    IN `id_tipo_tramite` INT,
    IN `id_cliente` INT,
    IN `id_difunto` INT,
    IN `id_estructura` INT,
    IN `id_personal` INT,
    IN `fecha_tramite` DATE,
    IN `fecha_cumpli_tramite` DATE,
    IN `mensaje_tramite` VARCHAR(100)
)
BEGIN
    UPDATE `tramite` SET
    `id_tipo_tramite` = id_tipo_tramite,
    `id_cliente` = id_cliente,
    `id_difunto` = id_difunto,
    `id_estructura` = id_estructura,
    `id_personal` = id_personal,
    `fecha_tramite` = fecha_tramite,
    `fecha_cumpli_tramite` = fecha_cumpli_tramite,
    `mensaje_tramite` = mensaje_tramite
    WHERE `id_tramite` = id_tramite;
END$$

-- Procedimiento para eliminar un trámite por su ID
CREATE PROCEDURE `sp_deleteTramite`(IN `id_tramite` INT)
BEGIN
    DELETE FROM `tramite` WHERE `id_tramite` = id_tramite;
END$$

-- Procedimiento para añadir un nuevo certificado
CREATE PROCEDURE `sp_addCertificado`(IN `id_tramite` INT)
BEGIN
    INSERT INTO `certificado` (`id_tramite`) VALUES (id_tramite);
END$$

-- Procedimiento para obtener información de un certificado por su ID
CREATE PROCEDURE `sp_getCertificado`(IN `id_certificado` INT)
BEGIN
    SELECT * FROM `certificado` WHERE `id_certificado` = id_certificado;
END$$

-- Procedimiento para eliminar un certificado por su ID
CREATE PROCEDURE `sp_deleteCertificado`(IN `id_certificado` INT)
BEGIN
    DELETE FROM `certificado` WHERE `id_certificado` = id_certificado;
END$$

-- Procedimiento para añadir un nuevo pago
CREATE PROCEDURE `sp_addPago`(
    IN `id_tipo_pago` INT,
    IN `id_tramite` INT,
    IN `cantidad_pago` DECIMAL(6, 2),
    IN `fecha_pago` DATE
)
BEGIN
    INSERT INTO `pago` (`id_tipo_pago`, `id_tramite`, `cantidad_pago`, `fecha_pago`)
    VALUES (id_tipo_pago, id_tramite, cantidad_pago, fecha_pago);
END$$

-- Procedimiento para obtener información de un pago por su ID
CREATE PROCEDURE `sp_getPago`(IN `id_pago` INT)
BEGIN
    SELECT * FROM `pago` WHERE `id_pago` = id_pago;
END$$

-- Procedimiento para actualizar información de un pago
CREATE PROCEDURE `sp_updatePago`(
    IN `id_pago` INT,
    IN `id_tipo_pago` INT,
    IN `id_tramite` INT,
    IN `cantidad_pago` DECIMAL(6, 2),
    IN `fecha_pago` DATE
)
BEGIN
    UPDATE `pago` SET
    `id_tipo_pago` = id_tipo_pago,
    `id_tramite` = id_tramite,
    `cantidad_pago` = cantidad_pago,
    `fecha_pago` = fecha_pago
    WHERE `id_pago` = id_pago;
END$$

-- Procedimiento para eliminar un pago por su ID
CREATE PROCEDURE `sp_deletePago`(IN `id_pago` INT)
BEGIN
    DELETE FROM `pago` WHERE `id_pago` = id_pago;
END$$

-- Reset DELIMITER
DELIMITER ;
SQL;

// Guarda el contenido en un archivo
file_put_contents("procedures.sql", $sqlContent);

// Opcional: Descargar el archivo automáticamente cuando se genera
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename('procedures.sql'));
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize('procedures.sql'));
readfile('procedures.sql');

?>
