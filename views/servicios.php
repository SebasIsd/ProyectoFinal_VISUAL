<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username']) || !isset($_SESSION['cargo']) || !isset($_SESSION['nombre'])) {
    include_once "login.php";
    exit();
}
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/demo/demo.css">
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

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: var(--uta-claro);
      color: #333;
      line-height: 1.6;
    }

        /* Encabezado de la universidad */
        .university-header {
            text-align: center;
            padding: 1rem;
            background-color: white;
            border-bottom: 2px solid var(--uta-rojo);
        }
        
        .university-header h1, 
        .university-header h2 {
            margin: 0.2rem 0;
            color: var(--uta-rojo);
        }

        /* Barra de navegación */
        .custom-nav {
            background-color: var(--uta-oscuro);
            display: flex;
            justify-content: center;
        }

        .custom-nav a {
            color: white;
            padding: 1rem 2rem;
            display: inline-block;
            text-decoration: none;
            font-weight: bold;
        }

        .custom-nav a:hover {
            background-color: rgba(139, 14, 14, 0.838);
        }

        /* Contenedor principal - solo afecta al contenedor, no a su contenido */
        .main-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        /* Pie de página */
        .custom-footer {
            background-color: var(--uta-rojo);
            color: white;
            text-align: center;
            padding: 1rem;
            font-size: 0.9rem;
            position: relative;
            width: 100%;
        }

        /* Estilos específicos para el datagrid de EasyUI */
        .easyui-datagrid {
            margin: 20px auto;
        }

        /* Ajustes responsivos */
        @media screen and (max-width: 768px) {
            .custom-nav {
                flex-direction: column;
            }

            .custom-nav a {
                border-top: 1px solid #aa2222;
                text-align: center;
            }
            
            .main-container {
                padding: 1rem;
                margin: 1rem;
            }
        }
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
      letter-spacing: 0.5px;
      transition: var(--transicion);
      position: relative;
    }

    nav a:hover {
      background-color: var(--uta-rojo);
    }

    nav a::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 3px;
      background: white;
      transition: var(--transicion);
    }

    nav a:hover::after {
      width: 70%;
    }

    footer {
      background-color: var(--uta-rojo);
      color: white;
      text-align: center;
      padding: 2rem;
      font-size: 1rem;
      width: 98,8%;
      margin-top: 3rem;
    }

    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .footer-logo {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 1rem;
    }

    .footer-links {
      display: flex;
      gap: 2rem;
      margin-bottom: 1.5rem;
    }

    .footer-links a {
      color: white;
      text-decoration: none;
      transition: var(--transicion);
    }

    .footer-links a:hover {
      text-decoration: underline;
      opacity: 0.9;
    }

.custom-button {
    background-color: var(--uta-rojo);
    color: white;
    border: none;
    padding: 0.8rem 1.5rem;
    font-size: 1rem;
    font-weight: 500;
    border-radius: 5px;
    cursor: pointer;
    margin: 1rem 0.5rem 0 0;
    transition: background-color 0.3s ease, transform 0.2s ease, opacity 0.3s ease;
    box-shadow: var(--sombra);
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    justify-content: center;
    opacity: 1;
}

.custom-button:hover:enabled {
    background-color: var(--uta-oscuro);
    transform: scale(1.03);
}

/* Botón deshabilitado visualmente */
.custom-button:disabled {
    background-color: transparent;
    color: #ccc;
    cursor: not-allowed;
    opacity: 0.4;
    box-shadow: none;
}
.button-container {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin: 2rem 0;
}

h2{
    color:var(--uta-oscuro);
    display: flex;
    justify-content: center;
    gap: 1rem;
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
    <a href="views/logout.php" class="logout-link">Cerrar sesión</a> <!-- Enlace de logout -->
</nav>

    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?></h2>
    
    <div class="main-container">
        <table id="dg" title="My Users" class="easyui-datagrid" style="width:100%;height:400px"
                url="./models/select.php"
                toolbar="#toolbar" pagination="true"
                rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
                <tr>
                    <th field="id_ced" width="50">CEDULA</th>
                    <th field="nom_est" width="50">NOMBRE</th>
                    <th field="ape_est" width="50">APELLIDO</th>
                    <th field="tel_est" width="50">TELEFONO</th>
                    <th field="cor_est" width="50">CORREO ELECTRONICO</th>
                </tr>
            </thead>
        </table>
     <?php if (isset($_SESSION['cargo']) && $_SESSION['cargo'] === 'admin'): ?>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar</a>
    </div>
<?php endif; ?>

    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>User Information</h3>
            <div style="margin-bottom:10px">
                <input name="id_ced" class="easyui-textbox" required="true" label="Cedula:" style="width:100%" >
            </div>
            <div style="margin-bottom:10px">
                <input name="nom_est" class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="ape_est" class="easyui-textbox" required="true" label="Apellido:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="tel_est" class="easyui-textbox" required="true" label="Telefono:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="cor_est" class="easyui-textbox" required="true" label="Correo:" style="width:100%">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>

    <div class="button-container">
        <button id="botonPDF" class="custom-button" onclick="window.open('reportes/reporteEstudiante.php', '_blank')">
            <i class="fas fa-file-pdf"></i> Ver PDF
        </button>
        <button id="botonCedulaPDF" class="custom-button" disabled>
            <i class="fas fa-id-card"></i> Ver PDF por Cédula
        </button>
    </div>



    <script type="text/javascript">
        var url;
        function newUser(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','New User');
            $('#fm').form('clear');
            url = './models/guardar.php';
        }
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit User');
                $('#fm').form('load',row);
                url = './models/editar.php?id='+row.id_ced;
            }
        }
        function saveUser(){
            $('#fm').form('submit',{
                url: url,
                iframe: false,
                onSubmit: function(){
                    return $(this).form('validate');
                },
                success: function(result){
                    var result = eval('('+result+')');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Se envio correctamente',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlg').dialog('close');        // close the dialog
                        $('#dg').datagrid('reload');    // reload the user data
                    }
                }
            });
        }
        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Are you sure you want to destroy this user?',function(r){
                    if (r){
                        $.post('models/eliminar.php',{id_ced:row.id_ced},function(result){
                            if (result.success){
                                $('#dg').datagrid('reload');    // reload the user data
                            } else {
                                $.messager.show({    // show error message
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        },'json');
                    }
                });
            }
        }
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
        // Desactivar el botón al cargar la página
        $('#botonCedulaPDF').prop('disabled', true);

        // Detectar selección en el datagrid
        $('#dg').datagrid({
            onSelect: function(index, row){
                $('#botonCedulaPDF').prop('disabled', false);
                $('#botonCedulaPDF').data('cedula', row.id_ced);
            },
            onUnselectAll: function(){
                $('#botonCedulaPDF').prop('disabled', true);
                $('#botonCedulaPDF').removeData('cedula');
            }
        });
        // Evento click del botón para generar el PDF
        $('#botonCedulaPDF').click(function () {
                var cedula = $(this).data('cedula');
                if (cedula) {
                    window.open('reportes/reporteCedula.php?cedula=' + encodeURIComponent(cedula), '_blank');
                } else {
                    $.messager.alert('Advertencia', 'Debe seleccionar una fila primero.');
                }
            });


        });

    </script>


</body>
</html>