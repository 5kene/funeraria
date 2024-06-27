<?php
include("../../bd.php"); 
// Archivo donde se guardará el SQL generado
$file = 'generar_triggers.sql';

// Contenido inicial del archivo SQL
$sqlContent = <<<SQL
-- Archivo generado automáticamente para la generación de triggers

USE cementerio; 

SQL;

// Definición de las tablas y sus triggers
$tables = [
    'canton' => [
        'id_column' => 'id_can',
        'audit_table' => 'canton',
        'audit_columns' => ['nombre_can']
    ],
    'provincia' => [
        'id_column' => 'id_pro',
        'audit_table' => 'provincia',
        'audit_columns' => ['nombre_pro']
    ],
    'ubicacion' => [
        'id_column' => 'id_ubi',
        'audit_table' => 'ubicacion',
        'audit_columns' => ['id_canton', 'id_provincia']
    ],
    'cliente' => [
        'id_column' => 'id_clien',
        'audit_table' => 'cliente',
        'audit_columns' => ['id_ubicacion', 'ci_clien', 'nombre_clien', 'apellido_clien', 'fecha_nacimiento_clien', 'telefono1', 'telefono2']
    ],
    'causa_muerte' => [
        'id_column' => 'id_causa_muerte',
        'audit_table' => 'causa_muerte',
        'audit_columns' => ['nombre_causa_muerte']
    ],
    'difunto' => [
        'id_column' => 'id_difunto',
        'audit_table' => 'difunto',
        'audit_columns' => ['id_causa_muerte', 'nombre_difunto', 'apellido_difunto', 'fecha_nacimiento_difunto', 'fecha_defuncion_difunto', 'codigo_acta_difunto']
    ],
    'tipo_estructura' => [
        'id_column' => 'id_tipo_estructura',
        'audit_table' => 'tipo_estructura',
        'audit_columns' => ['nombre_tipo_estruc']
    ],
    'estado_estructura' => [
        'id_column' => 'id_estado_estructura',
        'audit_table' => 'estado_estructura',
        'audit_columns' => ['nombre_est_estruc']
    ],
    'lugar_estructura' => [
        'id_column' => 'id_lugar_estructura',
        'audit_table' => 'lugar_estructura',
        'audit_columns' => ['nombre_zona', 'nombre_manzana']
    ],
    'estructura' => [
        'id_column' => 'id_estructura',
        'audit_table' => 'estructura',
        'audit_columns' => ['id_lugar_estructura', 'id_tipo_estructura', 'id_estado_estructura', 'cruces']
    ],
    'tipo_pago' => [
        'id_column' => 'id_tipo_pago',
        'audit_table' => 'tipo_pago',
        'audit_columns' => ['nombre_tipo_pago']
    ],
    'tipo_personal' => [
        'id_column' => 'id_tipo_personal',
        'audit_table' => 'tipo_personal',
        'audit_columns' => ['nombre_tipo_personal']
    ],
    'personal' => [
        'id_column' => 'id_personal',
        'audit_table' => 'personal',
        'audit_columns' => ['id_tipo_personal', 'ci_personal', 'nombre_personal', 'apellido_personal', 'fecha_nacimiento_personal', 'telefono1_personal', 'telefono2_personal']
    ],
    'tipo_incidente' => [
        'id_column' => 'id_tipo_incidente',
        'audit_table' => 'tipo_incidente',
        'audit_columns' => ['nombre_tipo_incidente']
    ],
    'reporte_incidente' => [
        'id_column' => 'id_incidente',
        'audit_table' => 'reporte_incidente',
        'audit_columns' => ['id_tipo_incidente', 'id_personal', 'fecha_reporte_incidente']
    ],
    'tipo_tramite' => [
        'id_column' => 'id_tipo_tramite',
        'audit_table' => 'tipo_tramite',
        'audit_columns' => ['nombre_tipo_tramite']
    ],
    'tramite' => [
        'id_column' => 'id_tramite',
        'audit_table' => 'tramite',
        'audit_columns' => ['id_tipo_tramite', 'id_cliente', 'id_difunto', 'id_estructura', 'id_personal', 'fecha_tramite', 'fecha_cumpli_tramite', 'mensaje_tramite']
    ],
    'certificado' => [
        'id_column' => 'id_certificado',
        'audit_table' => 'certificado',
        'audit_columns' => ['id_tramite']
    ],
    'pago' => [
        'id_column' => 'id_pago',
        'audit_table' => 'pago',
        'audit_columns' => ['id_tipo_pago', 'id_tramite', 'cantidad_pago', 'fecha_pago']
    ]
];

// Generación de triggers para cada tabla
foreach ($tables as $table => $params) {
    $id_column = $params['id_column'];
    $audit_table = $params['audit_table'];
    $audit_columns = $params['audit_columns'];

    // Trigger para INSERT
    $sqlContent .= <<<SQL

-- Trigger para INSERT en la tabla $table
DELIMITER //
CREATE TRIGGER ${table}_INSERT_trigger
AFTER INSERT ON $table
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.$id_column, '$audit_table', CURRENT_TIMESTAMP(), USER(), 'INSERT');
END//
DELIMITER ;

SQL;

    // Trigger para UPDATE
    $sqlContent .= <<<SQL

-- Trigger para UPDATE en la tabla $table
DELIMITER //
CREATE TRIGGER ${table}_UPDATE_trigger
AFTER UPDATE ON $table
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (NEW.$id_column, '$audit_table', CURRENT_TIMESTAMP(), USER(), 'UPDATE');
END//
DELIMITER ;

SQL;

    // Trigger para DELETE
    $sqlContent .= <<<SQL

-- Trigger para DELETE en la tabla $table
DELIMITER //
CREATE TRIGGER ${table}_DELETE_trigger
AFTER DELETE ON $table
FOR EACH ROW
BEGIN
    INSERT INTO auditoria (ID, nombre_tabla, fecha_hora, usuario, detalle_accion)
    VALUES (OLD.$id_column, '$audit_table', CURRENT_TIMESTAMP(), USER(), 'DELETE');
END//
DELIMITER ;

SQL;
}

// Guardar el contenido en el archivo
file_put_contents($file, $sqlContent);

// Establecer el mensaje de éxito en la sesión
$_SESSION['message'] = "¡Triggers generados exitosamente!";

// Redirigir a index.php
header("Location: index.php");
exit(); // Asegura que el script se detenga después de la redirección

?>
