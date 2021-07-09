Recuerda descargar los dll si vas a usar xamp con php 8
ASP.NET Core Web Api
Primero creamos el modelo ( El modelo debe tener uppercase en los nombres de las columnas de las tablas)
Nota: no olvidar usar esta dependencia este "using System.ComponentModel.DataAnnotations;" con la propiedad que sea primary key [Key]
Luego creamos el "controlador de Api  con Accciones que usan Entity Framework" usamos el modelo que acabos de crear y el context que sea el que esta por defecto
En appsettings.json cambiar la ruta de la base de datos que se va usar
por ultimo dentro de properties en launchSettings.json cambiar la url de la api y probarla con postman
