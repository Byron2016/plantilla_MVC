rmdir /s public
md public
cd public
echo ^<?php > index.php
echo > .htaccess
rem 9:55 Todo codigo propio aplicacion
md application
rem van los controladores
md controllers
rem van las librerias
md models
rem van las vistas
md views
md libs
rem van hojas de estilo, imagenes y archivos javascript
md public
cd application 
echo ^<?php > Bootstrap.php
echo ^<?php > Config.php
echo ^<?php > Controller.php
echo ^<?php > Model.php
echo ^<?php > Registro.php
echo ^<?php > Request.php
echo ^<?php > View.php
echo ^<?php > DataBase.php
cd ..
cd public
md css
md img
md js
cd ..
cd views
rem van los templates
md layout
cd layout
rem template por defecto
md default
cd default
md css
md img
md js
echo ^<?php > header.php
echo ^<?php > footer.php
cd ..
cd ..
cd ..
pause


