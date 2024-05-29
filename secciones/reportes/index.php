<?php 
session_start();
include("../../bd.php");
include("../../templates/header.php"); 
?>

<link rel="stylesheet" href="index.css">

<div class="card">
    <div class="card-header">Reporte de Muertes</div>
    <div class="card-body">
        <a
            name=""
            id=""
            class="btn btn-primary"
            href="generate_report.php"
            role="button"
            >Reporte Muertes</a
        >
    </div>
</div>

<div class="card">
    <div class="card-header">Reporte de pagos</div>
    <div class="card-body">
        <a
            name=""
            id=""
            class="btn btn-primary"
            href="generate_report1.php"
            role="button"
            >Reporte Pago</a
        >
    </div>
</div>

<div class="card">
    <div class="card-header">Reporte de Certificados</div>
    <div class="card-body">
        <a
            name=""
            id=""
            class="btn btn-primary"
            href="generate_certificado_report.php"
            role="button"
            >Reporte Certificados</a
        >
    </div>
</div>

<div class="card">
    <div class="card-header">Reporte por tablas</div>
    <div class="card-body">
        <a
            name=""
            id=""
            class="btn btn-primary"
            href="crear.php"
            role="button"
            >Reporte</a
        >
    </div>
</div>

<?php include("../../templates/footer.php"); ?>
