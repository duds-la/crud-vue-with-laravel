<script setup>
    defineProps({
        customers:Object
    })
    import { router } from '@inertiajs/vue3';


    function destroy(id)
    {
        router.delete('/customers/'+id);
    }

    function edit(id)
    {
        router.get('/customers/'+id+'/edit');
    }
</script>
<template >
    <div class="card col-5 offset-3">
        <table class="table table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="customer in customers">
                    <td>{{ customer.name }}</td>
                    <td>
                        <button class="btn btn-outline-warning">View</button>
                        <button @click.prevent="edit(customer.id)" class="btn btn-outline-primary">Edit</button>
                        <button @click.prevent="destroy(customer.id)" class="btn btn-outline-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
