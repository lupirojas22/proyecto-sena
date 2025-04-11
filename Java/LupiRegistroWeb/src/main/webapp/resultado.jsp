<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resultado del Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 50px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        p {
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            display: inline-block;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <h2>Datos Recibidos</h2>
    <p><strong>Nombre:</strong> ${nombre}</p><br>
    <p><strong>Correo:</strong> ${correo}</p>
</body>
</html>
