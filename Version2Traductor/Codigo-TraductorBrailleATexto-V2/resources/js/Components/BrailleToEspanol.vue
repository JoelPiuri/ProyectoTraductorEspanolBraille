<template>
  <div class="section translation-container">
    <h2>Braille a Español</h2>
    <div class="translation-box">
      <textarea
        v-model="brailleInput"
        placeholder="Introducir texto en Braille"
        @input="validateBrailleInput"
      ></textarea>
      <div class="keyboard-options">
        <button @click="toggleCase" class="otherfuncion">BloqMayús</button>
        <button @click="toggleTilde" class="otherfuncion">Tildes</button>
      </div>
      <TecladoBraille
        :letters="letters"
        :numbers="numbers"
        :specialLetters="specialLetters"
        @key-click="addBrailleCharacter"
        :isUpperCase="isUpperCase"
        :isTilde="isTilde"
        ref="tecladoBraille"
      />
      <ul class="button-list">
        <li class="left-button">
          <button @click="deleteText" class="clear-button">Eliminar texto</button>
        </li>
        <li class="right-button">
          <button @click="translateBrailleToSpanish">Traducir</button>
        </li>
      </ul>
    </div>
    <div class="result-box">
      <p>{{ brailleToSpanishResult }}</p>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import TecladoBraille from './TecladoBraille.vue';

export default {
  name: 'BrailleToEspanol',
  components: {
    TecladoBraille
  },
  data() {
    return {
      brailleInput: '',
      brailleToSpanishResult: '',
      letters: [],
      numbers: [],
      specialLetters: [],
      isUpperCase: false,
      isTilde: false,
      isNumberMode: false,
      brailleCharacters: '⠁⠂⠃⠄⠅⠆⠇⠈⠉⠊⠋⠌⠍⠎⠏⠐⠑⠒⠓⠔⠕⠖⠗⠘⠙⠚⠛⠜⠝⠞⠟⠠⠡⠢⠣⠤⠥⠦⠧⠨⠩⠪⠫⠬⠭⠮⠯⠰⠱⠲⠳⠴⠵⠶⠷⠸⠹⠺⠻⠼⠽⠾⠿ '
    };
  },
  methods: {
    translateBrailleToSpanish() {
      const brailleText = this.brailleInput;

      axios.post('/translate-to-espanol', { text: brailleText })
        .then(response => {
          this.brailleToSpanishResult = response.data.espanol;
        })
        .catch(error => {
          console.error(error);
        });
      this.resetTecladoBraille();
    },
    deleteText() {
      this.brailleInput = '';
      this.brailleToSpanishResult = '';
      this.resetTecladoBraille();
    },
    addBrailleCharacter(brailleCharacter) {
      this.brailleInput += brailleCharacter;
    },
    validateBrailleInput() {
      this.brailleInput = this.brailleInput.split('').filter(char => this.brailleCharacters.includes(char)).join('');
    },
    fetchLetters() {
      let route;
      if (this.isTilde) {
        route = this.isUpperCase ? '/teclado-braille-mayusculaTilde' : '/teclado-braille-minusculaTilde';
      } else {
        route = this.isUpperCase ? '/teclado-braille-mayuscula' : '/teclado-braille';
      }
      axios.post(route)
        .then(response => {
          const allLetters = response.data.concat(response.data.filter(letter => letter.tipoCaracter === 'letraMayuscula'));
          this.letters = allLetters;
        })
        .catch(error => {
          console.error('Error al cargar las letras:', error);
        });
    },
    fetchNumbers() {
      axios.post('/teclado-braille-number')
        .then(response => {
          this.numbers = response.data;
        })
        .catch(error => {
          console.error('Error al cargar los números:', error);
        });
    },
    fetchSpecialLetters() {
      axios.post('/teclado-braille-characterEsp')
        .then(response => {
          this.specialLetters = response.data;
        })
        .catch(error => {
          console.error('Error al cargar los caracteres especiales:', error);
        });
    },
    resetTecladoBraille() {
      if (this.isNumberMode && this.$refs.tecladoBraille && this.$refs.tecladoBraille.resetNumberMode) {
        this.$refs.tecladoBraille.resetNumberMode();
      }
    },
    toggleCase() {
      this.isUpperCase = !this.isUpperCase;
      this.fetchLetters();
    },
    toggleTilde() {
      this.isTilde = !this.isTilde;
      this.fetchLetters();
    },
    toggleNumberMode() {
      this.isNumberMode = !this.isNumberMode;
      if (this.isNumberMode) {
        this.resetTecladoBraille();
      }
      this.fetchLetters();
    }
  },
  mounted() {
    this.fetchLetters();
    this.fetchNumbers();
    this.fetchSpecialLetters();
  }
};
</script>
