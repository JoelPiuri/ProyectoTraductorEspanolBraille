<template>
    <header class="header">
      <div class="container">
        <nav>
          <ul>
            <li><Link href="/">Home</Link></li>
            <li><Link href="/dictionary">Diccionario</Link></li>
          </ul>
        </nav>
      </div>
    </header>
  </template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    name: "HeaderComponent",
    components: {
        Link
    }
} 
</script>


