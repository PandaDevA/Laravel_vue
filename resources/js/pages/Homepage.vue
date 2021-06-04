<template>
    <div class="row">
        <div class="col-lg-9 mt-4">
            <ModalComponent v-if="showModal" @close="showModal = false" @addNew = "addNew" >
            </ModalComponent>
            
	        <button class="btn btn-primary" @click="showModal=true"  style = "margin-bottom : 30px;">+Add new Transaction</button>

            <div class="row">
                <table  class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Description</th>
                        <th scope="col">Creidt</th>
                        <th scope="col">Debit</th>
                        <th scope="col">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(trans, key) in transactions" v-bind:key="key"  >
                            <td scope="row">{{trans.created_at}}</td>
                            <td>{{trans.description}}</td>
                            <td>{{trans.credit}}</td>
                            <td scope="row">{{trans.debit}}</td>
                            <td>{{trans.balance}}</td>
                        </tr>
                    </tbody>
                </table>
                <div v-if="transactions.length==0">
                    There is no data to show.
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</template>

<script>
    import ModalComponent from '../components/Modal'
    export default {
        components : {
            ModalComponent
        },
        data() {
            return {
                products: {},
                transactions : {},
                showModal : false
            }
        },
        mounted() {
            axios.get('/api/transactions')
                .then(response => {
                    this.transactions = response.data.data;
                })
        },
        methods : {
            addNew(newData) {
                console.log("aa");
                console.log(newData);
                this.transactions.push(newData);
            }
        }
    }
</script>

<style scoped>

.modal-active{
	display:block;
}
</style>
