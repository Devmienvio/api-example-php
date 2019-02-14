# Implementación de la API de Mienvio en Lumen (php)

En este repo puedes ver un ejemplo muy sencillo de cómo puedes implementar la API de mienvio para poder obtener tarifas y comprar envíos.

> Es importante aclarar que al ser un ejemplo muy básico carece de manejo de errores y otro tipo de mejoras.

El flujo básico para comprar un envío se compone de:

- Crear una dirección de origen
- Crear una dirección de destino
- Crear un envío de tipo `QUOTE` para poder consultar tarifas
- Consultar tarifas
- Actualizar envío creado para añadir la tarifa seleccionada y marcarlo como listo para comprar
- Crear una compra


> Puedes consultar esta aplicación demo en
> https://mienviophpclientdemo.herokuapp.com/

Si tienes dudas o sugerencias sobre cómo mejorar nuestra documentación porfavor escríbenos en dev@mienvio.mx
