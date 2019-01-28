<template>
    <div>
        <h2>Graphe circulaire sur les dépenses des 12 derniers mois de la société</h2>
                      
            <form  @submit.prevent="submitNomSociete"> 
                <label for="maliste">Séléctionnez une société : </label> 
                 <select name="maliste" class="border rounded form-control" v-model="form.selected">
                    <option :key="uneSociete.IDfournisseur" v-for="uneSociete in listSociety" :value="uneSociete.IDfournisseur">{{uneSociete.Societe}}</option>
                </select>
                <button class="btn btn-primary" type="submit">Valider</button>
            </form>
            <div v-if=' confirmation === true '>
                <div :key="mois.id" v-for="mois in test">
                </div>
                <div class="chart-container" style="position: relative; height:30vh; width:40vw">
                    <canvas id="Diagram3"></canvas>
                </div>
            </div>
            
    </div>

</template>

<script>

    export default {
        data(){
            return{
                form : {
                    selected : 0,
                },
                confirmation : false,
            }
        },  
        methods :{ 
            submitNomSociete(){
                axios.post('/diagram3', {
                    idNomSociete : this.form.selected
                })
                    .then(({data}) => {
                        this.form.selected = 0
                        this.confirmation = true
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors
                    })      
            },

        },   
    }
 
</script>