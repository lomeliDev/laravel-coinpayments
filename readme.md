# LaravelCoinPayments

[![N|Solid](https://lomeli.io/assets/img/logo.png)](https://lomeli.io)

## Introducción

LaravelCoinPayments provee una interfaz sencilla para utilizar el sdk de CoinPayments en proyectos que tienen como base el framework [*Laravel*](https://laravel.

## Instalación y configuración

Instalar el paquete mediante composer:

```bash
composer require toopago/laravel-coinpayments
```

Luego incluir el ServiceProvider en el arreglo de providers en _config/app.php_

```bash
TooPago\Payu\LaravelCoinPaymentsServiceProvider::class,
```

Publicar la configuración para incluir la informacion de la cuenta de CoinPayments:

```bash
php artisan vendor:publish
```

Incluir la informacion de la cuenta y ajustes en el archivo _.env_ ó directamente en
el archivo de configuración _config/coinpayments.php_

```bash
COINPAYMENTS_PRIVATE_KEY=xxxxxxxxxxxxxxxxxxxxx
COINPAYMENTS_PUBLIC_KEY=xxxxxxxxxxxxxxxxxxxxx
COINPAYMENTS_COMISSION=3
```

## Uso del API

Esta versión contiene solo una interfaz para pagos únicos y consultas.
Si necesita usar tokenización y pagos recurrentes debe usar el sdk directamente.

## Errores y contribuciones

Para un error escribir directamente el problema en github issues o enviarlo
al correo miguel@lomeli.io. Si desea contribuir con el proyecto por favor enviar los ajustes siguiendo la guía de contribuciones:

- Usar las recomendaciones de estilos [psr-1](http://www.php-fig.org/psr/psr-1/) y [psr-2](http://www.php-fig.org/psr/psr-2/)

- Preferiblemente escribir código que favorezca el uso de Laravel

- Escribir las pruebas y revisar el código antes de hacer un pull request
