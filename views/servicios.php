<?php
session_start();
$tiempo_inactividad = 240;

if (isset($_SESSION['last_activity'])) {
    $inactivo = time() - $_SESSION['last_activity'];
    if ($inactivo > $tiempo_inactividad) {
        session_unset();
        session_destroy();
        header("Location: index.php?action=login&timeout=1");
        exit();
    }
}

$_SESSION['last_activity'] = time();

if (!isset($_SESSION['username']) || !isset($_SESSION['cargo']) || !isset($_SESSION['nombre'])) {
    include_once "login.php";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sistema de Estudiantes</title>
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/color.css">
    <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
    :root {
      --uta-rojo: #8B0000;
      --uta-oscuro: #6b0000;
      --uta-claro: #f9f9f9;
      --sombra: 0 4px 6px rgba(0, 0, 0, 0.1);
      --transicion: all 0.3s ease;
    }
    
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: var(--uta-claro);
      color: #333;
      line-height: 1.6;
    }
    
    /* Estilos mejorados para la navegación */
    nav {
      background-color: var(--uta-oscuro);
      display: flex;
      justify-content: center;
      box-shadow: var(--sombra);
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    
    nav a {
      color: white;
      padding: 1.2rem 2rem;
      text-decoration: none;
      font-weight: 500;
      transition: var(--transicion);
      position: relative;
    }
    
    nav a:hover {
      background-color: var(--uta-rojo);
    }
    
    .main-container {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 2rem;
      background: white;
      border-radius: 8px;
      box-shadow: var(--sombra);
    }
    
    .custom-button {
      background-color: var(--uta-rojo);
      color: white;
      border: none;
      padding: 0.8rem 1.5rem;
      font-size: 1rem;
      border-radius: 5px;
      cursor: pointer;
      margin: 1rem 0.5rem 0 0;
      transition: var(--transicion);
    }
    
    .custom-button:hover {
      background-color: var(--uta-oscuro);
      transform: scale(1.03);
    }
    
    h2 {
      color: var(--uta-oscuro);
      text-align: center;
      margin: 2rem 0;
    }
    </style>
</head>
<body>
    <nav class="custom-nav">
        <a href="index.php?action=inicio">Inicio</a>
        <a href="index.php?action=nosotros">Nosotros</a>
        <a href="index.php?action=servicios">Servicios</a>
        <a href="index.php?action=contactanos">Contáctanos</a>
        <a href="views/logout.php">Cerrar sesión</a>
    </nav>

    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?></h2>
    
    <div class="main-container">
        <table id="dg" title="Listado de Estudiantes" class="easyui-datagrid" style="width:100%;height:400px"
                url="./models/select.php"
                toolbar="#toolbar" pagination="true"
                rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
                <tr>
                    <th field="ID_CED" width="50">Cédula</th>
                    <th field="NOM_EST" width="50">Nombre</th>
                    <th field="APE_EST" width="50">Apellido</th>
                    <th field="TEL_EST" width="50">Teléfono</th>
                    <th field="COR_EST" width="50">Correo</th>
                </tr>
            </thead>
        </table>
        
        <?php if (isset($_SESSION['cargo']) && $_SESSION['cargo'] === 'admin'): ?>
        <div id="toolbar">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addSecre()">Agregar Secretarias</a>
        </div>
        <?php endif; ?>
    </div>
    
    <!-- Diálogo para agregar/editar -->
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
<form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
    <h3>Información del Estudiante</h3>
    
    <div style="margin-bottom:10px">
        <input name="ID_CED" class="easyui-textbox" required="true" label="Cédula:" 
               maxlength="10" validType="length[10,10]" inputmode="numeric"
               oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10);" 
               style="width:100%">
    </div>
    
    <div style="margin-bottom:10px">
        <input name="NOM_EST" class="easyui-textbox" required="true" label="Nombre:" 
               maxlength="50" validType="length[1,50]"
               oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '').slice(0,50);"
               style="width:100%">
    </div>
    
    <div style="margin-bottom:10px">
        <input name="APE_EST" class="easyui-textbox" required="true" label="Apellido:" 
               maxlength="50" validType="length[1,50]"
               oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '').slice(0,50);"
               style="width:100%">
    </div>
    
    <div style="margin-bottom:10px">
        <input name="TEL_EST" class="easyui-textbox" required="true" label="Teléfono:" 
               maxlength="10" validType="length[7,15]" inputmode="numeric"
               oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10);"
               style="width:100%">
    </div>
    
    <div style="margin-bottom:10px">
        <input name="COR_EST" class="easyui-textbox" required="true" label="Correo:" 
               validType="email"
               maxlength="100"
               style="width:100%">
    </div>
</form>

    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>

<!-- Modal para agregar secretaria -->
<div id="dlg-secretaria" class="easyui-dialog" style="width:400px"
     data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-secretaria-buttons'">
    <form id="fm-secretaria" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3>Agregar Secretaria</h3>
        <div style="margin-bottom:10px">
            <input name="usuario" class="easyui-textbox" required="true" label="Usuario:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="nombre" class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="contrasena" type="password" class="easyui-textbox" required="true" label="Clave:" style="width:100%">
        </div>
    </form>
</div>

<div id="dlg-secretaria-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveSecretaria()" style="width:90px">Guardar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="$('#dlg-secretaria').dialog('close')" style="width:90px">Cancelar</a>
</div>

    <!-- Botones para reportes -->
    <div style="text-align:center;margin:20px 0">
        <button class="custom-button" onclick="window.open('reportes/reporteEstudiante.php', '_blank')">
            <i class="fas fa-file-pdf"></i> Generar Reporte General
        </button>
        <button id="btnReporteCedula" class="custom-button" disabled>
            <i class="fas fa-id-card"></i> Reporte por Cédula
        </button>
    </div>

    <script>
    // Variables globales
    var url;
    
    // Función para nuevo estudiante
    function newUser(){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nuevo Estudiante');
        $('#fm').form('clear');
        url = './models/guardar.php';
    }
    
    // Función para editar estudiante
    function editUser(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Estudiante');
            $('#fm').form('load',row);
            url = './models/editar.php?ID_CED='+row.ID_CED;
        }
    }
    
    // Función para guardar (tanto nuevo como editar)
    function saveUser(){
        $('#fm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(response){
                try {
                    var result = JSON.parse(response);
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlg').dialog('close');
                        $('#dg').datagrid('reload');
                        $.messager.show({
                            title: 'Éxito',
                            msg: 'Operación realizada correctamente'
                        });
                    }
                } catch(e) {
                    console.error("Error parsing JSON:", e, response);
                }
            }
        });
    }
    
    // Función para eliminar estudiante
    function destroyUser(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $.messager.confirm('Confirmar','¿Está seguro de eliminar este estudiante?',function(r){
                if (r){
                    $.post('./models/eliminar.php',{ID_CED:row.ID_CED},function(result){
                        if (result.success){
                            $('#dg').datagrid('reload');
                            $.messager.show({
                                title: 'Éxito',
                                msg: 'Estudiante eliminado correctamente'
                            });
                        } else {
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg || 'Error al eliminar'
                            });
                        }
                    },'json');
                }
            });
        }
    }
    
    // Configuración del botón de reporte por cédula
    $(document).ready(function(){
        $('#dg').datagrid({
            onSelect: function(index, row){
                $('#btnReporteCedula').prop('disabled', false);
                $('#btnReporteCedula').data('cedula', row.ID_CED);
            },
            onUnselectAll: function(){
                $('#btnReporteCedula').prop('disabled', true);
            }
        });
        
        $('#btnReporteCedula').click(function(){
            var cedula = $(this).data('cedula');
            if (cedula) {
                window.open('reportes/reporteCedula.php?cedula=' + cedula, '_blank');
            }
        });
    });

    function addSecre() {
    $('#dlg-secretaria').dialog('open').dialog('center').dialog('setTitle', 'Nueva Secretaria');
    $('#fm-secretaria').form('clear');
}

function saveSecretaria() {
    $('#fm-secretaria').form('submit', {
        url: './models/crear_secretaria.php',
        onSubmit: function () {
            return $(this).form('validate');
        },
        success: function (response) {
            try {
                var result = JSON.parse(response);
                if (result.success) {
                    $('#dlg-secretaria').dialog('close');
                    $.messager.show({
                        title: 'Éxito',
                        msg: 'Secretaria creada correctamente'
                    });
                } else {
                    $.messager.alert('Error', result.error || 'No se pudo crear secretaria', 'error');
                }
            } catch (e) {
                console.error("Respuesta no válida:", response);
            }
        }
    });
}

    </script>
</body>
</html>
