<html>
<head>
    <style>
        :root {
            --uta-rojo: #8B0000;
            --uta-oscuro: #6b0000;
            --uta-claro: #f9f9f9;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--uta-claro);
        }

        nav {
            background-color: var(--uta-oscuro);
            display: flex;
            justify-content: center;
        }

        nav a {
            color: white;
            padding: 1rem 2rem;
            display: inline-block;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            background-color: rgba(139, 14, 14, 0.838);
        }

        main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h1, h2 {
            color: var(--uta-rojo);
            text-align: center;
        }

        .grid {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            margin-top: 2rem;
        }

        .grid > div {
            flex: 1 1 45%;
            background: #f0f0f0;
            padding: 1rem;
            border-left: 5px solid var(--uta-rojo);
            border-radius: 6px;
        }

        .valores {
            text-align: center;
            margin-top: 2rem;
        }

        .valores ul {
            list-style: none;
            padding: 0;
        }

        .valores li {
            margin: 0.5rem 0;
        }

        footer {
            background-color: var(--uta-rojo);
            color: white;
            text-align: center;
            padding: 1rem;
            font-size: 0.9rem;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        @media screen and (max-width: 768px) {
            .grid {
                flex-direction: column;
            }

            nav {
                flex-direction: column;
            }

            nav a {
                border-top: 1px solid #aa2222;
            }
        }
    </style>
</head>
<body>
    <nav>
        <a href="index.php?action=inicio">Inicio</a>
        <a href="index.php?action=nosotros">Nosotros</a>
        <a href="index.php?action=servicios">Servicios</a>
        <a href="index.php?action=contactanos">Contáctanos</a>
    </nav>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="bg-light">

<div class="container mt-5">
    <button class="btn btn-primary mb-3" onclick="showModal()">Nuevo Estudiante</button>
    <table class="table table-bordered table-hover" id="studentsTable">
        <thead class="table-dark">
            <tr>  
                <th>CÉDULA</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>TELÉFONO</th>
                <th>EMAIL</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>
</div>

<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="studentForm" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Nuevo Estudiante</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id" name="id">
        <div class="mb-3">
          <label for="ID_CED" class="form-label">Cédula</label>
          <input type="text" class="form-control" id="ID_CED" name="ID_CED" required>
        </div>
        <div class="mb-3">
          <label for="NOM_EST" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="NOM_EST" name="NOM_EST" required>
        </div>
        <div class="mb-3">
          <label for="APE_EST" class="form-label">Apellido</label>
          <input type="text" class="form-control" id="APE_EST" name="APE_EST" required>
        </div>
        <div class="mb-3">
          <label for="TEL_EST" class="form-label">Teléfono</label>
          <input type="text" class="form-control" id="TEL_EST" name="TEL_EST" required>
        </div>
        <div class="mb-3">
          <label for="COR_EST" class="form-label">Correo Electrónico</label>
          <input type="email" class="form-control" id="COR_EST" name="COR_EST" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", loadStudents);

function loadStudents() {
    fetch('models/select.php')
    .then(res => res.json())
    .then(data => {
        const tbody = document.querySelector("#studentsTable tbody");
        tbody.innerHTML = '';
        if (Array.isArray(data)) {
            data.forEach(est => {
                tbody.innerHTML += `
                    <tr>
                        <td>${est.ID_CED}</td>
                        <td>${est.NOM_EST}</td>
                        <td>${est.APE_EST}</td>
                        <td>${est.TEL_EST}</td>
                        <td>${est.COR_EST}</td>
                        <td>
                            <button class="btn btn-sm btn-warning me-1" onclick='editStudent(${JSON.stringify(est)})'>Editar</button>
                            <button class="btn btn-sm btn-danger" onclick='deleteStudent("${est.ID_CED}")'>Eliminar</button>
                        </td>
                    </tr>`;
            });
        } else {
            tbody.innerHTML = `<tr><td colspan="6" class="text-center">${data}</td></tr>`;
        }
    });
}

function showModal() {
    document.getElementById("studentForm").reset();
    document.getElementById("id").value = "";
    new bootstrap.Modal(document.getElementById('studentModal')).show();
}

function editStudent(estudiante) {
    for (const key in estudiante) {
        if (document.getElementById(key)) {
            document.getElementById(key).value = estudiante[key];
        }
    }
    new bootstrap.Modal(document.getElementById('studentModal')).show();
}

document.getElementById("studentForm").addEventListener("submit", function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    fetch('models/guardar.php', {
        method: 'POST',
        body: formData
    }).then(res => res.json())
      .then(result => {
        if (result.success) {
            bootstrap.Modal.getInstance(document.getElementById('studentModal')).hide();
            loadStudents();
        } else {
            alert(result.message || "Error al guardar.");
        }
    });
});

function deleteStudent(id) {
    if (confirm("¿Seguro que quieres eliminar este estudiante?")) {
        fetch('models/delete.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'id=' + encodeURIComponent(id)
        }).then(res => res.json())
          .then(result => {
            if (result.success) {
                loadStudents();
            } else {
                alert(result.message || "No se pudo eliminar.");
            }
        });
    }
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
