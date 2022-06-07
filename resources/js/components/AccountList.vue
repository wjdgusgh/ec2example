<template>
    <div>
       <table id="accountTable" border="1">
           <tr>
                <th>Email<button>▲</button><button>▼</button></th>
                <th>Name<button>▲</button><button>▼</button></th>
                <th>Phonenumber</th>
                <th>Division</th>
                <th>Purpose</th>
                <th>created_at<button>▲</button><button>▼</button></th>
           </tr>
           <tr v-for="account in accountList" :key="account.email">
                <td><a :href="'/account/'+account.email">{{ account.email }}</a></td>
                <td>{{ account.name }}</td>
                <td>{{ account.phonenumber }}</td>
                <td>{{ account.division }}</td>
                <td>{{ account.purpose }}</td>
                <td>{{ account.created_at }}</td>

           </tr>
       </table>
    </div>
</template>

<script>
export default {
    data () {
        return {
            accountList: [],
        }
    },

    methods: {
        getList() {
            axios.get('/api/accountlist')
                .then(({data}) => {
                    console.log(data);
                    this.accountList = data;
                });
        },
    },

    created: function() {
        this.getList();
    }
}
</script>

<style scoped>
table {
    font-family: 'Courier New', Courier, monospace;
    align-content: center;
    justify-content: center;
    min-height: 100vh;
}
</style>
