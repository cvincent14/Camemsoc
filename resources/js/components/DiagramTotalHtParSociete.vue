<template>
    <div>
        <h2>Graphe circulaire sur les dépenses des 12 derniers mois de la société</h2>
                      
            <form  @submit.prevent="submitNomSociete"> 
                <label for="maliste">Séléctionnez une société : </label> 
                 <select name="maliste" class="border rounded form-control" v-model="selected">
                    <option :key="uneSociete.IDfournisseur" v-for="uneSociete in listSociety" :value="uneSociete.IDfournisseur">{{uneSociete.Societe}}</option>
                </select>
                <div v-if='selected === 0'>
                    <button class="btn btn-primary disabled m-2" >Valider</button>
                </div>
                <div v-if='selected !== 0'>
                    <button class="btn btn-primary m-2" type="submit">Valider</button>
                </div>
            </form>
            <div v-if=' confirmation === true && selected !== 0 '>
                <canvas id="GraphCircDepenseMoisSociete" width="400" height="400"></canvas>
            </div>
            {{ infos }}
            
    </div>

</template>

<script>

    export default {
        props: ['listSociety'],
        data(){
            return{
                selected : 0,
                confirmation : false,
                infos : [],
                ctx: '',
                date: [],
                mois : [],
                annee: [],
                totalHt : [],
            }
        },  
        methods :{ 
            submitNomSociete(){
                axios.get('/diagram3/' + this.selected)
                    .then(
                        response => (this.infos = response.data.detailMonthSociety ),
                        this.infos.forEach(function(info){
                            this.date = info.mois + "/" + info.annee
                            this.totalHt = info.TotalHt
                            console.log(this.date)
                        })
                    )

                this.selected = 0
                this.confirmation = true

                this.ctx = document.getElementById('GraphCircDepenseMoisSociete')
                var GraphCircDepenseMoisSociete = new Chart(this.ctx, {
                    type: 'bar',
                    data:
                    {
                        labels:  this.date ,
                        datasets: [
                        {
                            borderWidth : 1,
                            backgroundColor: tableColor,
                            borderColor: 'rgb(0, 0, 0)',
                            data: this.totalHt,
                        }]
                    },
                    options:
                    {
                        legend:
                        {
                            display: false
                        }
                    }
                });
            },
        },   
    }
 
</script>