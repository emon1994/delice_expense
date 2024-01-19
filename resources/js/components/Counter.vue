<script setup>
import { ref, reactive } from 'vue';

const clientsFile = reactive([
  { name: '', amount: 0 },
]);

const showClient=ref(false)

const addClient = () => {
  clientsFile.push({ name: '', passport: null , nationality:'', appliedCountry:''});
};

const removeClient = (index)=>{
    clientsFile.splice(index, 1);
}
</script>
 
<template>
    <div class="bg-purple-300 m-4 rounded p-6">
        <form action="">
            <div>
                <h1 class="bg-purple-600 text-center text-3xl text-white">Create Cash-In Entry</h1>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label for="cars">Choose a category</label>

                    <select name="" id="" class="w-full border border-gray-600 rounded">
                        <option value="volvo">Category 1</option>
                        <option value="saab">Category 2</option>
                        <option value="mercedes">Category 3</option>
                        <option value="audi">Category 4</option>
                    </select>
                </div>
                <div>
                    <label for="">Date & Time</label>
                    <input type="date" class="w-full border border-gray-600 rounded">
                </div>
                <div>
                    <label for="">Amount</label>
                    <input type="number" class="w-full border border-gray-600 rounded">
                </div>
                <div>
                    <label for="">Tax</label>
                    <input type="number" class="w-full border border-gray-600 rounded">
                </div>
                <div>
                    <label for="">Contactable Person Name</label>
                    <input type="text" class="w-full border border-gray-600 rounded">
                </div>
                <div>
                    <label for="">Contactable Person Mobile</label>
                    <input type="number" class="w-full border border-gray-600 rounded">
                </div>

                <div>
                    <label for="">Receive Mode</label>
                    <input type="text" class="w-full border border-gray-600 rounded">
                </div>
            </div>
        </form>
        <div>
            <input type="checkbox" v-model="showClient" name="" id="" class="m-2">
            <label for="">File</label>
        </div>

        <hr>
       <div v-if="showClient">
        <div class="mt-4" v-for="(client, index) in clientsFile" :key="index">
            <div class="flex justify-between">
                <div>Form {{ index+1 }}</div>
                <button @click="removeClient(index)">X</button>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <div>
                <label for="">Name</label>
                <input v-model="client.name" type="text" class="w-full border border-gray-600 rounded">
                </div>
                <div>
                    <label for="">Passport No</label>
                    <input v-model="client.passport" type="number" class="w-full border border-gray-600 rounded">
                </div>
                <div>
                    <label for="">Nationality</label>
                    <input v-model="client.nationality" type="text" class="w-full border border-gray-600 rounded">
                </div>
                <div>
                    <label for="">Applied Country</label>
                    <input v-model="client.appliedCountry" type="text" class="w-full border border-gray-600 rounded">
                </div>
                <div>
                    <button @click="addClient">+</button>
                </div>
            </div>
        </div>
       </div>
    </div>
</template>
<style>
label{
    font-size: 15px;
    font-weight: 500 !important;
}
</style>