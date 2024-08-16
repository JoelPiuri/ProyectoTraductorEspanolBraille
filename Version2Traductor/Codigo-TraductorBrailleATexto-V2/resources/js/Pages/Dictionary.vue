<template>
    <div id="home-page">
        <HeaderComponent></HeaderComponent>
        <div class="main-content">
            <h1>Bienvenido al Diccionario de Cat Traducciones</h1>
            <div class="button-section">
                <div class="button-item" @click="loadTable('lowCase')">
                    <img src="../../image/minusculas.png" alt="Letras Minúsculas">
                    <button>Letras Minúsculas</button>
                </div>
                <div class="button-item" @click="loadTable('upperCase')">
                    <img src="../../image/mayusculas.png" alt="Letras Mayúsculas">
                    <button>Letras Mayúsculas</button>
                </div>
                <div class="button-item" @click="loadTable('number')">
                    <img src="../../image/numeros.png" alt="Números">
                    <button>Números</button>
                </div>
                <div class="button-item" @click="loadTable('specialCaracter')">
                    <img src="../../image/caracteres.png" alt="Caracteres Especiales">
                    <button>Caracteres Especiales</button>
                </div>
            </div>
            <div class="table-section">
                <table v-if="tableData.length">
                    <thead>
                        <tr>
                            <th>Carácter</th>
                            <th>Braille</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in tableData" :key="index">
                            <td>{{ item.caracterEspanol }}</td>
                            <td>{{ item.braille }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <FooterComponent></FooterComponent>
    </div>
</template>

<script>
import HeaderComponent from '../Components/HeaderComponet.vue';
import FooterComponent from '../Components/FooterComponent.vue';
export default {
    name: 'Dictionary',
    components: {
        HeaderComponent,
        FooterComponent,
    },
    data() {
        return {
            tableData: []
        };
    },
    methods: {
        loadTable(type) {
            axios.get(`/dictionary/${type}`)
                .then(response => {
                    this.tableData = response.data;
                })
                .catch(error => {
                    console.error('Error loading table data:', error);
                });
        }
    }
}
</script>
