## Administracion

Es una aplicacion web, desarrollada con laravel 5.4 y nodejs 6.10, para generar escenarios de fallas y practicas de evaluacion:

Esta compuesta por 2 modulos:

- Generar escenario de fallas.
- Mostrar actividad del escenario de fallas.

## Generacion escenario de fallas.

Al generar un escenario de fallas  contiene los siguientes datos:

- Estudiante
- Practica

El <b>estudiante</b> contiene los siguientes datos:

- Nombres
- Apellidos
- Matricula
- Adscripcion
- Grado.

La <b>practica</b> contiene los siguientes datos:

- Nombre
- Duracion
- Fecha Hora
- Tipo de error
- Tipo de unidad
- Material(muchos)
- Instrumento(muchos)
- Herramienta(muchos)
- Conocimientos(muchos)
- Objetivos (muchos)
- Comportamiento del sistema HW o SW(muchos)
- Actividades(muchos)
- Soluciones(Relacionado a la actividad)
- Sensores(muchos)
- Fallas del sedam(muchos)
- Fallas del la moxxa(muchos)


## Acciones

Las acciones permitidas en la aplicacion seran de altas y bajas de practicas y estudiantes.

Tambien se podran dar de alta y baja los catalogos de :

- Tipo de Error.
- Tipo de Unidad.
- Materiales.
- Instrumentos.
- Herramientas.
- Conocimientos.
- Objetivos.
- Comportamientos del sistema HW
- Comportamientos del sistema SW
- Actividades.
- Soluciones.
- Sensores.
- Fallas del sedam.
- Fallas de la moxxa.

-----------------------------------------------------

## Mostrar actividad del escenario de fallas.

Podra iniciar y finalizar los escenarios de fallas.Ademas podra realizar.

- Grabacion de video del SEDAM.
- Grabacion de log del SEDAM.
- Ver en tiempo real lo que sucede en el SEDAM.
