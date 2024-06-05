<template>
    <div id="home-page">
      <HeaderComponent></HeaderComponent>
      <div class="main-content">
        <h1>Bienvenido a Braille Cat Traducciones</h1>
        <div class="translation-sections">
          <div class="section translation-container">
            <h2>Braille a Español</h2>
            <div class="translation-box">
              <textarea v-model="brailleInput" placeholder="Introducir texto en Braille"></textarea>
              <button @click="translateBrailleToSpanish">Traducir</button>
            </div>
            <div class="result-box">
              <p>{{ brailleToSpanishResult }}</p>
            </div>
          </div>
          <div class="section translation-container">
            <h2>Español a Braille</h2>
            <div class="translation-box">
              <textarea v-model="spanishInput" placeholder="Introducir texto en Español"></textarea>
              <button @click="translateSpanishToBraille">Traducir</button>
            </div>
            <div class="result-box">
              <div>
                <h3>Lectura:</h3>
                <p>{{ spanishToBrailleResult }}</p>
              </div>
              <div>
                <h3>Escritura Manual:</h3>
                <p class="mirror-text">{{ spanishToBrailleResult }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <FooterComponent></FooterComponent>
    </div>
  </template>

<script>

import HeaderComponent from '../Components/HeaderComponet.vue';
import FooterComponent from '../Components/FooterComponent.vue';
import axios from 'axios';


export default {
  name: 'HomePage',
  components: {
    HeaderComponent,
    FooterComponent
  },
  data() {
    return {
      brailleInput: '',
      spanishInput: '',
      brailleToSpanishResult: '',
      spanishToBrailleResult: ''
    };
  },
  methods: {
    translateBrailleToSpanish() {

      this.brailleToSpanishResult = 'Traducción simulada';
    },
    translateSpanishToBraille() {
      axios.post('/translate-to-braille', { text: this.spanishInput })
        .then(response => {
          this.spanishToBrailleResult = response.data.braille;
        })
        .catch(error => {
          console.error(error);
        });
    }
  }
}
</script>
