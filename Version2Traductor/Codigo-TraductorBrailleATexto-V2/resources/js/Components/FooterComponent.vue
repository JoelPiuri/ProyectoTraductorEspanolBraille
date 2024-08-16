<template>
    <footer class="footer">
      <div class="container">
        <p>&copy; 2024 Braille Cat Traducciones. Todos los derechos reservados.</p>
        <nav>
          <ul>
            <li><Link href="/">Home</Link></li>
            <li><Link href="/dictionary">Diccionario</Link></li>
          </ul>
        </nav>
      </div>
    </footer>
  </template>

<script>
import { Link } from '@inertiajs/vue3';
    export default {
        name:"footerComponent",
    components: {
        Link
    }
    }
</script>
