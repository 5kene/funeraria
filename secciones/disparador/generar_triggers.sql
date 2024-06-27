-- Archivo generado automáticamente para la generación de triggers

USE cementerio; 

-- Trigger para INSERT en la tabla canton
DELIMITER //
CREATE TRIGGER canton_INSERT_trigger
AFTER INSERT ON canton
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_can, 'canton', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla canton
DELIMITER //
CREATE TRIGGER canton_UPDATE_trigger
AFTER UPDATE ON canton
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_can, 'canton', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla canton
DELIMITER //
CREATE TRIGGER canton_DELETE_trigger
AFTER DELETE ON canton
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_can, 'canton', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

-- Trigger para INSERT en la tabla provincia
DELIMITER //
CREATE TRIGGER provincia_INSERT_trigger
AFTER INSERT ON provincia
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_pro, 'provincia', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla provincia
DELIMITER //
CREATE TRIGGER provincia_UPDATE_trigger
AFTER UPDATE ON provincia
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_pro, 'provincia', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla provincia
DELIMITER //
CREATE TRIGGER provincia_DELETE_trigger
AFTER DELETE ON provincia
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_pro, 'provincia', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

-- Trigger para INSERT en la tabla ubicacion
DELIMITER //
CREATE TRIGGER ubicacion_INSERT_trigger
AFTER INSERT ON ubicacion
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_ubi, 'ubicacion', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla ubicacion
DELIMITER //
CREATE TRIGGER ubicacion_UPDATE_trigger
AFTER UPDATE ON ubicacion
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_ubi, 'ubicacion', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla ubicacion
DELIMITER //
CREATE TRIGGER ubicacion_DELETE_trigger
AFTER DELETE ON ubicacion
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_ubi, 'ubicacion', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

-- Trigger para INSERT en la tabla cliente
DELIMITER //
CREATE TRIGGER cliente_INSERT_trigger
AFTER INSERT ON cliente
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_clien, 'cliente', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla cliente
DELIMITER //
CREATE TRIGGER cliente_UPDATE_trigger
AFTER UPDATE ON cliente
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_clien, 'cliente', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla cliente
DELIMITER //
CREATE TRIGGER cliente_DELETE_trigger
AFTER DELETE ON cliente
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_clien, 'cliente', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

-- Trigger para INSERT en la tabla causa_muerte
DELIMITER //
CREATE TRIGGER causa_muerte_INSERT_trigger
AFTER INSERT ON causa_muerte
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_causa_muerte, 'causa_muerte', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla causa_muerte
DELIMITER //
CREATE TRIGGER causa_muerte_UPDATE_trigger
AFTER UPDATE ON causa_muerte
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_causa_muerte, 'causa_muerte', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla causa_muerte
DELIMITER //
CREATE TRIGGER causa_muerte_DELETE_trigger
AFTER DELETE ON causa_muerte
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_causa_muerte, 'causa_muerte', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

-- Trigger para INSERT en la tabla difunto
DELIMITER //
CREATE TRIGGER difunto_INSERT_trigger
AFTER INSERT ON difunto
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_difunto, 'difunto', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla difunto
DELIMITER //
CREATE TRIGGER difunto_UPDATE_trigger
AFTER UPDATE ON difunto
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_difunto, 'difunto', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla difunto
DELIMITER //
CREATE TRIGGER difunto_DELETE_trigger
AFTER DELETE ON difunto
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_difunto, 'difunto', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

-- Trigger para INSERT en la tabla tipo_estructura
DELIMITER //
CREATE TRIGGER tipo_estructura_INSERT_trigger
AFTER INSERT ON tipo_estructura
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_tipo_estructura, 'tipo_estructura', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla tipo_estructura
DELIMITER //
CREATE TRIGGER tipo_estructura_UPDATE_trigger
AFTER UPDATE ON tipo_estructura
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_tipo_estructura, 'tipo_estructura', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla tipo_estructura
DELIMITER //
CREATE TRIGGER tipo_estructura_DELETE_trigger
AFTER DELETE ON tipo_estructura
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_tipo_estructura, 'tipo_estructura', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

-- Trigger para INSERT en la tabla estado_estructura
DELIMITER //
CREATE TRIGGER estado_estructura_INSERT_trigger
AFTER INSERT ON estado_estructura
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_estado_estructura, 'estado_estructura', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla estado_estructura
DELIMITER //
CREATE TRIGGER estado_estructura_UPDATE_trigger
AFTER UPDATE ON estado_estructura
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_estado_estructura, 'estado_estructura', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla estado_estructura
DELIMITER //
CREATE TRIGGER estado_estructura_DELETE_trigger
AFTER DELETE ON estado_estructura
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_estado_estructura, 'estado_estructura', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

-- Trigger para INSERT en la tabla lugar_estructura
DELIMITER //
CREATE TRIGGER lugar_estructura_INSERT_trigger
AFTER INSERT ON lugar_estructura
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_lugar_estructura, 'lugar_estructura', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla lugar_estructura
DELIMITER //
CREATE TRIGGER lugar_estructura_UPDATE_trigger
AFTER UPDATE ON lugar_estructura
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_lugar_estructura, 'lugar_estructura', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla lugar_estructura
DELIMITER //
CREATE TRIGGER lugar_estructura_DELETE_trigger
AFTER DELETE ON lugar_estructura
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_lugar_estructura, 'lugar_estructura', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

-- Trigger para INSERT en la tabla estructura
DELIMITER //
CREATE TRIGGER estructura_INSERT_trigger
AFTER INSERT ON estructura
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_estructura, 'estructura', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla estructura
DELIMITER //
CREATE TRIGGER estructura_UPDATE_trigger
AFTER UPDATE ON estructura
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_estructura, 'estructura', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla estructura
DELIMITER //
CREATE TRIGGER estructura_DELETE_trigger
AFTER DELETE ON estructura
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_estructura, 'estructura', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

-- Trigger para INSERT en la tabla tipo_pago
DELIMITER //
CREATE TRIGGER tipo_pago_INSERT_trigger
AFTER INSERT ON tipo_pago
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_tipo_pago, 'tipo_pago', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla tipo_pago
DELIMITER //
CREATE TRIGGER tipo_pago_UPDATE_trigger
AFTER UPDATE ON tipo_pago
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_tipo_pago, 'tipo_pago', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla tipo_pago
DELIMITER //
CREATE TRIGGER tipo_pago_DELETE_trigger
AFTER DELETE ON tipo_pago
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_tipo_pago, 'tipo_pago', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

-- Trigger para INSERT en la tabla tipo_personal
DELIMITER //
CREATE TRIGGER tipo_personal_INSERT_trigger
AFTER INSERT ON tipo_personal
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_tipo_personal, 'tipo_personal', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla tipo_personal
DELIMITER //
CREATE TRIGGER tipo_personal_UPDATE_trigger
AFTER UPDATE ON tipo_personal
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_tipo_personal, 'tipo_personal', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla tipo_personal
DELIMITER //
CREATE TRIGGER tipo_personal_DELETE_trigger
AFTER DELETE ON tipo_personal
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_tipo_personal, 'tipo_personal', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

-- Trigger para INSERT en la tabla personal
DELIMITER //
CREATE TRIGGER personal_INSERT_trigger
AFTER INSERT ON personal
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_personal, 'personal', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla personal
DELIMITER //
CREATE TRIGGER personal_UPDATE_trigger
AFTER UPDATE ON personal
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_personal, 'personal', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla personal
DELIMITER //
CREATE TRIGGER personal_DELETE_trigger
AFTER DELETE ON personal
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_personal, 'personal', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

-- Trigger para INSERT en la tabla tipo_incidente
DELIMITER //
CREATE TRIGGER tipo_incidente_INSERT_trigger
AFTER INSERT ON tipo_incidente
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_tipo_incidente, 'tipo_incidente', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla tipo_incidente
DELIMITER //
CREATE TRIGGER tipo_incidente_UPDATE_trigger
AFTER UPDATE ON tipo_incidente
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_tipo_incidente, 'tipo_incidente', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla tipo_incidente
DELIMITER //
CREATE TRIGGER tipo_incidente_DELETE_trigger
AFTER DELETE ON tipo_incidente
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_tipo_incidente, 'tipo_incidente', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

-- Trigger para INSERT en la tabla reporte_incidente
DELIMITER //
CREATE TRIGGER reporte_incidente_INSERT_trigger
AFTER INSERT ON reporte_incidente
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_incidente, 'reporte_incidente', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla reporte_incidente
DELIMITER //
CREATE TRIGGER reporte_incidente_UPDATE_trigger
AFTER UPDATE ON reporte_incidente
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_incidente, 'reporte_incidente', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla reporte_incidente
DELIMITER //
CREATE TRIGGER reporte_incidente_DELETE_trigger
AFTER DELETE ON reporte_incidente
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_incidente, 'reporte_incidente', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

-- Trigger para INSERT en la tabla tipo_tramite
DELIMITER //
CREATE TRIGGER tipo_tramite_INSERT_trigger
AFTER INSERT ON tipo_tramite
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_tipo_tramite, 'tipo_tramite', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla tipo_tramite
DELIMITER //
CREATE TRIGGER tipo_tramite_UPDATE_trigger
AFTER UPDATE ON tipo_tramite
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_tipo_tramite, 'tipo_tramite', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla tipo_tramite
DELIMITER //
CREATE TRIGGER tipo_tramite_DELETE_trigger
AFTER DELETE ON tipo_tramite
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_tipo_tramite, 'tipo_tramite', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

-- Trigger para INSERT en la tabla tramite
DELIMITER //
CREATE TRIGGER tramite_INSERT_trigger
AFTER INSERT ON tramite
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_tramite, 'tramite', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla tramite
DELIMITER //
CREATE TRIGGER tramite_UPDATE_trigger
AFTER UPDATE ON tramite
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_tramite, 'tramite', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla tramite
DELIMITER //
CREATE TRIGGER tramite_DELETE_trigger
AFTER DELETE ON tramite
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_tramite, 'tramite', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

-- Trigger para INSERT en la tabla certificado
DELIMITER //
CREATE TRIGGER certificado_INSERT_trigger
AFTER INSERT ON certificado
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_certificado, 'certificado', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla certificado
DELIMITER //
CREATE TRIGGER certificado_UPDATE_trigger
AFTER UPDATE ON certificado
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_certificado, 'certificado', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla certificado
DELIMITER //
CREATE TRIGGER certificado_DELETE_trigger
AFTER DELETE ON certificado
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_certificado, 'certificado', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

-- Trigger para INSERT en la tabla pago
DELIMITER //
CREATE TRIGGER pago_INSERT_trigger
AFTER INSERT ON pago
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_pago, 'pago', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

-- Trigger para UPDATE en la tabla pago
DELIMITER //
CREATE TRIGGER pago_UPDATE_trigger
AFTER UPDATE ON pago
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.id_pago, 'pago', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

-- Trigger para DELETE en la tabla pago
DELIMITER //
CREATE TRIGGER pago_DELETE_trigger
AFTER DELETE ON pago
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.id_pago, 'pago', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;
