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
    <section>
        <h1>Hola</h1>
    </section>
</body>
</html>