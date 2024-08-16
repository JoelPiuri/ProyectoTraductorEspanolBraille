<template>
    <div class="keyboard">
        <div class="letters-section">
            <div class="utility-keys">
                <div class="key" @click="handleKeyClick(' ', 'espacio')">Espacio</div>
                <div class="key" @click="handleKeyClick('\n', 'enter')">Enter</div>
                <div class="key" @click="handleKeyClick('\t', 'tab')">Tab</div>
            </div>
            <h3>Letras</h3>
            <div v-for="letter in letters" :key="letter.braille" class="key" @click="handleKeyClick(letter, 'letra')">
                {{ isUpperCase ? getUpperCaseBraille(letter.braille) : letter.braille }}
            </div>
        </div>
        <div class="numbers-section">
            <h3>Números</h3>
            <div v-for="number in numbers" :key="number.braille" class="key" @click="handleKeyClick(number, 'numero')">
                {{ number.braille }}
            </div>
        </div>
        <div class="special-letters-section">
            <h3>Caracteres Especiales</h3>
            <div v-for="specialLetter in specialLetters" :key="specialLetter.braille" class="key"
                @click="handleKeyClick(specialLetter, 'caracterEspecial')">
                {{ specialLetter.braille }}
            </div>
        </div>

    </div>
</template>

<script>
export default {
    props: {
        letters: Array,
        numbers: Array,
        specialLetters: Array,
        isUpperCase: Boolean
    },
    methods: {
        handleKeyClick(character, type) {
            let brailleCharacter;

            if (type === 'letra') {
                brailleCharacter = this.isUpperCase ? this.getUpperCaseBraille(character.braille) : character.braille;
            } else if (type === 'numero') {
                brailleCharacter = this.isNumberMode ? character.braille : '⠼' + character.braille;
                this.isNumberMode = true;
            } else if (type === 'caracterEspecial') {
                brailleCharacter = character.braille;
            } else {
                brailleCharacter = character; // Espacio, Enter, Tab
                this.isNumberMode = false; // Salir del modo número si se hace clic en otra cosa
            }

            this.$emit('key-click', brailleCharacter);
        },
        getUpperCaseBraille(brailleCharacter) {
            const uppercaseEntry = this.letters.find(entry => {
                return entry.tipoCaracter === 'letraMayuscula' && entry.braille.toLowerCase() === brailleCharacter;
            });

            return uppercaseEntry ? uppercaseEntry.braille : brailleCharacter;
        }
    }
};
</script>
