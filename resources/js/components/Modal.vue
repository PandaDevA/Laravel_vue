<template>
    <div class="modal fade in modal-active" style="margin:auto; margin-top : 150px;">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" @click="$emit('close')" class="close"><span >&times;</span></button>

                <div class="container">
                    <form id = "credit-card-payment-form" class="form-validate is-alter" method = "post">
                        <div class="form-group"> 
                        <label for="transaction type">
                            <h6>Transaction Type</h6>
                            </label> 
                            <select class="form-control " v-model="credit" required id="type">
                                <option name = "type" value="credit">credit</option>
                                <option name = "type" value="debit">debit</option>
                            </select>
                        </div>
                        <div class="form-group"> <label for="balance">
                            <h6>Amount</h6>
                            </label> <input type="number" v-model="balance" placeholder="amount" required class="form-control ">
                        </div>
                        <div class="form-group"> <label for="description">
                            <h6>Description</h6>
                            </label> <input type="text" v-model="description"  required class="form-control ">
                        </div>
                        <input class = 'btn btn-primary' @click="sendData()" value="Add">
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name : 'ModalComponent',
    props: {
        required: true,
        twoWay: true  
    },
    data () {
        return {
            credit : 'credit',
            balance : 0,
            description : ''
        }
    },
    methods : {
        sendData() {
            console.log(this.balance, this.description, this.credit);
            let data = {
                'type' : this.credit,
                'balance' : this.balance,
                'description' : this.description
            }

            axios.post('/api/saveData', data)
                .then(response => {
                    let newData = response.data;
                    this.$emit('addNew', newData);
                    this.$emit('close');
            });
        }
    }
}
</script>

<style >
.modal-active{
	display:block;
}

.fade:not(.show) {
    opacity: 1;
}
</style>