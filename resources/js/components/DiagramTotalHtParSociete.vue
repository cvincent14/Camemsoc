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
            
    </div>

</template>

<script>

    export default {
        props: ['listSociety'],
        data(){
            return{
                form : {
                    selected : 0,
                },
            }
        },  
        methods :{ 
            submitNomSociete(){
                axios.post('/diagram3/' + this.form.selected, {
                    
                })
                    .then(({data}) => {
                        this.form.selected = 0
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors
                    })      
            },

        },   
    }
 
</script>