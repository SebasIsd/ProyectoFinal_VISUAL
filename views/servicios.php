<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?action=login");
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
    <style>
        :root {
            --uta-rojo: #8B0000;
            --uta-oscuro: #6b0000;
            --uta-claro: #f9f9f9;
        }

        /* Estilos solo para elementos fuera de EasyUI */
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--uta-claro);
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
    </style>
</head>
<body>
    <nav class="custom-nav">
        <a href="index.php?action=inicio">Inicio</a>
        <a href="index.php?action=nosotros">Nosotros</a>
        <a href="index.php?action=servicios">Servicios</a>
        <a href="index.php?action=contactanos">Contáctanos</a>
    </nav>  
    <h3>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?></h3>
    
    <div class="main-container">
        <table id="dg" title="My Users" class="easyui-datagrid" style="width:100%;height:400px"
                url="./models/select.php"
                toolbar="#toolbar" pagination="true"
                rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
                <tr>
                    <th field="ID_CED" width="50">CEDULA</th>
                    <th field="NOM_EST" width="50">NOMBRE</th>
                    <th field="APE_EST" width="50">APELLIDO</th>
                    <th field="TEL_EST" width="50">TELEFONO</th>
                    <th field="COR_EST" width="50">CORREO ELECTRONICO</th>
                </tr>
            </thead>
        </table>
        <div id="toolbar">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar</a>
        </div>
    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>User Information</h3>
            <div style="margin-bottom:10px">
                <input name="ID_CED" class="easyui-textbox" required="true" label="Cedula:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="NOM_EST" class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="APE_EST" class="easyui-textbox" required="true" label="Apellido:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="TEL_EST" class="easyui-textbox" required="true" label="Telefono:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="COR_EST" class="easyui-textbox" required="true" label="Correo:" style="width:100%">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>
    
    <footer class="custom-footer">
        Derechos Reservados © Cuarto Software
    </footer>

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
                url = 'editar.php?id='+row.id;
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
                        $.post('models/eliminar.php',{id:row.ID_CED},function(result){
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
</body>
</html>