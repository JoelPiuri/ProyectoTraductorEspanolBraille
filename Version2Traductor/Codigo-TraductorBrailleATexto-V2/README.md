# Braille Cat Traducciones

## Descripción del Proyecto
Braille Cat Traducciones es una aplicación web diseñada para traducir texto en español a Braille y viceversa. Utiliza el framework Laravel junto con Inertia.js y Vue.js para ofrecer una interfaz de usuario intuitiva y eficiente. La aplicación maneja caracteres especiales y acentuados, asegurando una traducción precisa y completa.

## Características Principales

### Traducción de Texto
- **Español a Braille:** Traduce texto en español a Braille, incluyendo letras mayúsculas, minúsculas y caracteres acentuados.
- **Braille a Español:** (Pendiente de implementación) Traducción de Braille a español.

### Interfaz de Usuario
- **Input de Texto:** Campo de texto para ingresar el contenido a traducir.
- **Botón de Traducción:** Botón que inicia el proceso de traducción.
- **Visualización de Traducción:** Muestra el resultado de la traducción en la interfaz de usuario.

### Manejo de Caracteres Especiales
- **Mayúsculas:** Indicador de mayúsculas en Braille.
- **Números:** Indicador de números en Braille.
- **Caracteres Acentuados:** Manejo completo de caracteres acentuados como á, é, í, ó, ú.

## Tecnologías Utilizadas
- **Laravel:** Framework de backend para la gestión de la lógica de negocio y las interacciones con la base de datos.
- **Inertia.js:** Herramienta para construir aplicaciones monolíticas utilizando Vue.js y Laravel.
- **Vue.js:** Framework de frontend para construir una interfaz de usuario interactiva y reactiva.
- **Eloquent ORM:** Manejo de la base de datos mediante el ORM de Laravel.
- **MySQL:** Base de datos relacional utilizada para almacenar las traducciones.

## Estructura del Proyecto

```
├── app
│   ├── Http
│   │   └── Controllers
│   │       └── TranslationController.php
│   ├── Models
│   │   └── Translation.php
│   └── Providers
│       └── AppServiceProvider.php
├── database
│   ├── migrations
│   │   └── xxxx_xx_xx_create_translations_table.php
│   └── seeders
│       └── TranslationsTableSeeder.php
├── resources
│   └── js
│       ├── Components
│       │   └── HeaderComponent.vue
│       └── Pages
│           └── Homepage.vue
├── routes
│   └── web.php
└── storage
    └── logs
```

## Instalación y Configuración

### Requisitos Previos
- PHP >= 7.4
- Composer
- Node.js y npm
- MySQL


## Contribuciones

Para contribuir al proyecto, por favor sigue estos pasos:
1. Haz un fork del repositorio.
2. Crea una rama nueva (`git checkout -b feature/nueva-caracteristica`).
3. Realiza tus cambios y haz commit (`git commit -m 'Agregar nueva característica'`).
4. Empuja tus cambios a la rama (`git push origin feature/nueva-caracteristica`).
5. Abre un Pull Request.

## Licencia

Este proyecto está licenciado bajo la Licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más información.

---

Con esta documentación, esperamos que cualquier programador pueda comprender, configurar y contribuir al proyecto "Braille Cat Traducciones" de manera efectiva.

